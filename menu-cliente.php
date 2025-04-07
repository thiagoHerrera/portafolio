<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre']) && isset($_POST['precio'])) {
    $nombre = $_POST['nombre'];
    $costo = $_POST['precio'];
    $id = $_POST['codigo'];
    $cantidad = $_POST['cantidad'];

    if ($cantidad > 0) {
        $_SESSION['carrito'][$id] = [
            'nombre' => $nombre,
            'precio' => $costo,
            'cantidad' => $cantidad
        ];
    }
}

if (isset($_POST['eliminar'])) {
    $indice = $_POST['indice'];
    unset($_SESSION['carrito'][$indice]);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require 'import-bootstrap.php'
    ?>
    <title>Comida</title>
    <link rel="stylesheet" href="./styles/tarjetas.css">
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <img src="./img/logo.png" alt="Mc King">
        </div>
        <ul class="menu-items">
            <?php
            require 'conexion.php';
            $rol_requerido = 'cliente';

                if (isset($_SESSION['id']) && $_SESSION['rol'] == $rol_requerido) {
                    print("Bienvenido {$_SESSION['rol']}, {$_SESSION['nombre']}");
                } else {
                    ?>
                    <p><a class="link-opacity-25" href="./html/form-login.html">Debe Iniciar Sesion</a></p>
                    <?php
                }
                ?>

            <li><a href="inicio-cliente.php">Menú</a></li>

        </ul>
        <div class="promo">
            <a href="cerrar-sesion.php" class="promo-link bi bi-x-circle-fill">Cerrar Sesion</a>
        </div>
    </nav>

    <div class="card-container">
        <?php
        require 'conexion.php';  
        $query = $cnx->prepare("SELECT * FROM producto");
        $query->execute();
        
        while ($producto = $query->fetch(PDO::FETCH_ASSOC)) { 
            $rutaImagen = 'img/burguer/' . $producto['imagen'];  

            echo '
            <form method="POST" action="">
                <div class="card">
                    <img src="' . $rutaImagen . '" alt="Imagen de ' . $producto['nombre'] . '">
                    <div class="card-content">

                        <h3>' . ($producto['nombre']) . '</h3>
                        <p>' . ($producto['descrip']) . '</p>
                        <p>Precio: $' . number_format($producto['precio'], 2) . '</p>
                        <input type="hidden" name="codigo" value="' . $producto['codigo'] . '">
                        <input type="hidden" name="nombre" value="' . ($producto['nombre']) . '">
                        <input type="hidden" name="precio" value="' . $producto['precio'] . '">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Cantidad</span>
                            <input type="number" class="form-control" name = "cantidad" value="1" min="1" max="100" aria-label="Dollar amount (with dot and two decimal places)">
                        </div>
                        
                        <button class="btn btn-primary" type="submit">Agregar al carrito</button>
                    </div>
                </div>
            </form>';
        }
        ?>
    </div>
    <input type="checkbox" id="cart-toggle" class="cart-toggle-checkbox">
    <label for="cart-toggle" class="cart-icon">
        <img src="./img/carro-de-la-carretilla.png" alt="Carrito de Compras">
    </label>

    <div id="cart-sidebar" class="cart-sidebar">
        <h1 class="display-6">Tu Carrito</h1>
        <ul>
        <?php
            $total = 0; 
            
            if (!empty($_SESSION['carrito'])) { 
                foreach ($_SESSION['carrito'] as $indice => $producto) {
                    $total += $producto['precio'] * $producto['cantidad']; 
                    echo '
                    <li>
                        ' . $producto['nombre'] . ' - $' .number_format( $producto['precio']) .  '
                        <form method="POST" action="" style="display:inline;">
                            <input type="hidden" name="indice" value="' . $indice . '">
                            <button class="btn btn-warning" type="number" name="cantidad">'.$producto['cantidad'].'</button>
                            <button class="btn btn-warning" type="submit" name="eliminar"><i class="bi bi-trash"></i></button>
                        </form>
                    </li>';
                }
            } else {
                echo '<li>El carrito está vacío.</li>';
            }
        ?>
        </ul>
        
        <?php
            echo '<label class="btn btn-success"> Total : $' .number_format( $total ). '</label>';
        ?>
        <form action="pago.php" method="POST" enctype="multipart/form-data">
            <input class="btn btn-success w-100 mt-3" type="submit" value="Pagar"><br>
        </form>
        <label for="cart-toggle" class="close-btn mt-">Cerrar</label>
    </div>

    <div class="derechos">
        <h2>© 2024 MC KING Company. Todos los derechos reservados.</h2>
    </div>
</body>
</html>
