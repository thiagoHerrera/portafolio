<?php
session_start();
require 'conexion.php';

//al momento de que se apriete el boton de terminado este pasara de esa manera a la base de datos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['terminar_pedido'])) {
    $pedido_id = $_POST['pedido_id'];
    
    $updateQuery = $cnx->prepare("UPDATE pedido SET estado = 'Terminado' WHERE id_pedido = :id_pedido");
    $updateQuery->bindParam(':id_pedido', $pedido_id, PDO::PARAM_INT);
    $updateQuery->execute();
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
    <title>Comida Chef</title>
    <link rel="stylesheet" href="./styles/tarjetas.css">
    <style>
        .derechos{
            background-color: #333;
            width: 100%;
            height: 50px;
            margin-top: 437px;
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
            $rol_requerido = 'chef';

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

    <div class="card-container">
        <?php
        $query = $cnx->prepare("SELECT * FROM producto INNER JOIN pedido_producto ON producto.codigo = pedido_producto.id_producto INNER JOIN pedido ON pedido_producto.id_pedido = pedido.id_pedido WHERE pedido.estado = 'Pendiente'");
        $query->execute(); //se obtienen los pedidos que estan pendientes

        $pedidos = []; //obtiene los pedidos 

        while ($pedido_producto = $query->fetch(PDO::FETCH_ASSOC)) {
            $id_pedido = $pedido_producto['id_pedido'];
            if (!isset($pedidos[$id_pedido])) {
                $pedidos[$id_pedido] = [
                    'id_pedido' => $id_pedido,
                    'productos' => []
                ];
            }
            $pedidos[$id_pedido]['productos'][] = $pedido_producto;
        }
        //este foreach agarra los pedidos que estan pendientes
        foreach ($pedidos as $pedido) {
            echo '<div class="card">';
            echo '<div class="card-content">';
            echo '<h3>Pedido <span class="badge text-bg-warning">' . $pedido['id_pedido'] . '</span></h3>';
            
            $totalCantidad = 0; 
            
            foreach ($pedido['productos'] as $producto) {
                echo '<div class="producto">';
                echo '<h4>' . $producto['nombre'] . ' <span class="badge text-bg-info">X' . $producto['cantidad'] .  '</span></h4>';
                echo '<p>' . $producto['descrip'] . '</p>';
                $totalCantidad += $producto['cantidad']; 
                echo '</div>';
            }

        echo '<p><strong>Total Productos: ' . $totalCantidad . '</strong></p>';

        echo '
        <form method="POST" action="">
            <input type="hidden" name="pedido_id" value="' . $pedido['id_pedido'] . '">
            <button type="submit" name="terminar_pedido" class="btn btn-secondary">Terminado</button>
        </form>';
        
        echo '</div>'; 
        echo '</div>';
    }
?>

    </div>
    <div class="derechos">
        <h2>© 2024 MC KING Company. Todos los derechos reservados.</h2>
    </div>
</body>
</html>
