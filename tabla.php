<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./styles/stylesTabla.css" rel="stylesheet">
    <?php
        require 'import-bootstrap.php'
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Luckiest+Guy&display=swap" rel="stylesheet">
    <title>Tabla Productos</title>

    <div class="menu">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        Menu
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a href="./cerrar-sesion.php"><button type="button" class="btn btn-danger"><i class="bi bi-x-circle-fill"></i> Cerrar sesion</button></a></li><br>
        <li><a href="./html/form-nuevo-producto.html"><button type="button" class="btn btn-success"><i class="bi bi-plus-circle-fill"></i> Nuevo Producto</button></a></li>
        <li><a href="./html/form-nuevo-empleado.html"><button type="button" class="btn btn-success"><i class="bi bi-plus-circle-fill"></i> Nuevo Empleado</button></a></li>
        <li><a href="tabla.php"><button type="button" class="btn btn-success"><i class="bi bi-plus-circle-fill"></i> Productos</button></a></li>
        <li><a href="empleado.php"><button type="button" class="btn btn-success"><i class="bi bi-plus-circle-fill"></i> Empleados</button></a></li>
        <li><a href="inicio-gerente.php"><button type="button" class="btn btn-success" ><i class="bi bi-plus-circle-fill"></i> Menu Cliente</button></a></li>
      </ul>
    </div>

    <title>Tabla Productos</title>
</head>
<body class="fondito">
    <h1 class="text-center bebas-neue-regular">Panel de Productos</h1>
    <div class="container w-50">
      <form class="d-flex" method="GET" action="">
          <input name="search" class="form-control me-2" type="search" placeholder="Buscar producto" aria-label="Buscar producto">
          <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>

      <table class="table caption-top">
      <caption>Lista de Productos</caption>
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Comidas</th>
          <th scope="col">Descripcion</th>
          <th scope="col">Precio</th>
          <th scope="col">Imagen</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody class="table-group-divider table-secondary table table-bordered">
        <?php
        require 'conexion.php';
        $rol_requerido = 'gerente';
        if (isset($_SESSION['id']) && $_SESSION['rol'] == $rol_requerido) {
          print("Bienvenido {$_SESSION['rol']}, {$_SESSION['nombre']}");

          
          $search = isset($_GET['search']) ? $_GET['search'] : '';
          if ($search) {
            $query = $cnx->prepare("SELECT * FROM producto WHERE nombre LIKE :search");
            $query->bindValue(':search', "%$search%", PDO::PARAM_STR);
          } else {
            $query= $cnx->prepare("SELECT * FROM producto");
          }
          $query->execute();
          $filas= $query->fetchALL(PDO::FETCH_ASSOC);
          
          foreach($filas as $producto){
              print "<tr>";
              print'<th scope="row">'.$producto['codigo'] .'</th>';
              print"<td>{$producto['nombre']}</td>";
              print"<td>{$producto['descrip']}</td>";
              print"<td>{$producto['precio']}</td>";
              print"<td>{$producto['imagen']}</td>";
              print"<td><a href= 'modificar.php?codigo={$producto['codigo']}'><i class='bi bi-pencil-square'></i></a>";
              
              echo "
              <form method='POST' action=''>
                <input type='hidden' name='codigo' value='{$producto['codigo']}'>
                <button type='submit' name='eliminar' ><i class='bi bi-trash-fill'></i> </button>
              </form>
              </td>";
              print"</tr>";
          }
          if (isset($_POST['eliminar'])) {
              $codigo = $_POST['codigo'];
              echo "
              <div class='confirmacion-eliminacion'>
                <h2>¿Estás seguro de que deseas eliminar este producto?</h2>
                <form method='POST' action='eliminar.php'>
                  <input type='hidden' name='codigo' value='{$codigo}'>
                  <button type='submit' name='confirmar' value='yes' class='btn btn-success'>Yes</button>
                  <button type='submit' name='confirmar' value='no' class='btn btn-danger'>No</button>
                </form>
              </div>";
          }
        } else {
          ?>
          <p><a class="link-opacity-25" href="./html/form-login.html">Debe Iniciar Sesion</a></p>
          <?php
        }
        ?>
      </tbody>
      </table>
    </div>
</body>
</html>
