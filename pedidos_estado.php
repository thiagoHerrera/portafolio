<?php
session_start();
require 'conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Estado De Pedidos</title>
    <link rel="stylesheet" href="./styles/tarjetas.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .container {
            display: flex;
            gap: 20px;
            padding: 20px;
            flex-grow: 1; 
        }
        .column {
            width: 45%; 
        }
        .column h3 {
            text-align: center;
            margin-bottom: 20px;
        }
        .card {
            margin-bottom: 20px;
            width: 100%;
        }
        .card-content {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
        }
        .derechos {
            padding: 10px;
            background-color: #333;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <img src="./img/logo.png" alt="Mc King">
        </div>
        <ul class="menu-items">
            <?php
            $rol_requerido = 'cliente';

            if (isset($_SESSION['id']) && $_SESSION['rol'] == $rol_requerido) {
            print("Bienvenido {$_SESSION['rol']}, {$_SESSION['nombre']}");
            } else {
                ?>
                <p><a class="link-opacity-25" href="./html/form-login.html">Debe Iniciar Sesion</a></p>
                <?php
            }
            ?>
        </ul>
        <div class="promo">
            <a href="cerrar-sesion.php" class="promo-link bi bi-x-circle-fill">Cerrar Sesion</a>
        </div>
    </nav>

    <div class="container">
        <div class="column">
            <h1 class="display-3">Pendiente</h1>
            <?php
            $pendienteQuery = $cnx->prepare("SELECT * FROM pedido WHERE estado = 'Pendiente'");
            $pendienteQuery->execute();

            while ($pedido = $pendienteQuery->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="card">';
                echo '<div class="card-content">';
                echo '<h4>N° Orden  <span class="badge text-bg-danger">' . $pedido['id_pedido'] . '</span></h4>';
                echo '<p>Estado: ' . $pedido['estado'] . '</p>';
                echo '</div>'; 
                echo '</div>'; 
            }
            ?>
        </div>

        <div class="column">
            <h1 class="display-3">Terminado</h1>
            <?php
            $terminadoQuery = $cnx->prepare("SELECT * FROM pedido WHERE estado = 'Terminado'");
            $terminadoQuery->execute();

            while ($pedido = $terminadoQuery->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="card">';
                echo '<div class="card-content">';
                echo '<h4>N° Orden  <span class="badge text-bg-info">' . $pedido['id_pedido'] . '</span></h4>';
                echo '<p>Estado: ' . $pedido['estado'] . '</p>';
                echo '</div>'; 
                echo '</div>'; 
            }
            ?>
        </div>
    </div>

    <div class="derechos">
        <h2>© 2024 MC KING Company. Todos los derechos reservados.</h2>
    </div>
</body>
</html>
