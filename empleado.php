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
    <style>
      .bebas-neue-regular {
        font-family: "Bebas Neue", sans-serif;
        font-weight: 400;
        font-style: normal;
      }
      
    </style>
    <title>Tabla De Empleados</title>
</head>
<body class="fondito">
<!-- Menu de usuario -->  
<div class="menu">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Menu
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a href="cerrar-sesion.php"><button type="button" class="btn btn-danger" ><i class="bi bi-x-circle-fill"></i> Cerrar sesion</button></a></li><br>
    <li><a href="./html/form-nuevo-producto.html"><button type="button" class="btn btn-success" ><i class="bi bi-plus-circle-fill"></i> Nuevo Producto</button></a></li>
    <li><a href="./html/form-nuevo-empleado.html"><button type="button" class="btn btn-success"><i class="bi bi-plus-circle-fill"></i> Nuevo Empleado</button></a></li>
    <li><a href="tabla.php"><button type="button" class="btn btn-success" ><i class="bi bi-plus-circle-fill"></i> Productos</button></a></li>
    <li><a href="empleado.php"><button type="button" class="btn btn-success" ><i class="bi bi-plus-circle-fill"></i> Empleados</button></a></li>
    <li><a href="inicio-gerente.php"><button type="button" class="btn btn-success" ><i class="bi bi-plus-circle-fill"></i> Menu Cliente</button></a></li>
  </ul>
</div>


  <h1 class="text-center bebas-neue-regular">Panel de Empleados</h1>
<div class="container w-50">

  
  <form class="d-flex" method="GET" action="">
      <input name="search" class="form-control me-2" type="search" placeholder="Buscar Empleado" aria-label="Buscar producto">
      <button class="btn btn-outline-success" type="submit">Buscar</button>
    </form>

  <div class="input-group rounded">
</div>
<table class="table caption-top">
<caption>Lista de Empleados</caption>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Password</th>
      <th scope="col">Rol</th>
      <th scope="col">Acciones</th>
    </tr>
  </tad>
<tbody class="table-group-divider table-secondary table table-bordered">
<?php
require 'conexion.php';
$rol_requerido = 'gerente';

if (isset($_SESSION['id']) && $_SESSION['rol'] == $rol_requerido) {
  print("Bienvenido {$_SESSION['rol']}, {$_SESSION['nombre']}");
  // En el caso que el valor de la busqueda esta presente:
  $search = isset($_GET['search']) ? $_GET['search'] : '';

  if ($search) { // Este $search verifica si hay algun valor en la variable especificada
    $query = $cnx->prepare("SELECT * FROM usuario WHERE nombre or apellido LIKE :search"); // Se hace la consulta la cual desiganara la busqueda en cuestion
    $query->bindValue(':search', "%$search%", PDO::PARAM_STR); // Con el bindvalue se le da un valor a $search
  } else {
    $query= $cnx->prepare("SELECT * FROM usuario"); // Si no se ingreso nada o no se encuentra el valor, se muestran todos los valores que existen
  }
  
  $query->execute();
  $filas= $query->fetchALL(PDO::FETCH_ASSOC);

  foreach($filas as $usuario){
      print "<tr>";
        print"<td>{$usuario['id']}</td>";
        print"<td>{$usuario['nombre']}</td>";
        print"<td>{$usuario['apellido']}</td>";
        print"<td>{$usuario['password']}</td>";
        print"<td>{$usuario['rol']}</td>";
        print"<td><a href= 'eliminar-empleado.php?id={$usuario['id']}'><i class='bi bi-archive-fill me-2'></i></a>";
        print"<a href= 'modificar-empleado.php?id={$usuario['id']}'><i class='bi bi-pencil-square'></i></a></td>";
      print"</tr>";
  }
}else{
  ?>
  <p><a class="link" href="./html/form-login.html">Debe Iniciar Sesion</a></p>
  <?php
}
?>
</tbody>
</table>
</div>
</body>
</html>