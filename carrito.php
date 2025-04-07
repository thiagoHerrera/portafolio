<?php
session_start();
require 'conexion.php';

// Verificación si el carrito está vacío
if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    echo 'El carrito se encuentra vacío, No se puede realizar el pedido :(';
    exit;
}

// Verificación de ID del cajero
if (!isset($_SESSION['id_cajero'])) {
    echo('El ID del cajero no está definido en la sesión.');
} else {
    $id_cajero = $_SESSION['id_cajero'];
}

// Verificación de ID del pedido
if (!isset($_SESSION['id_pedido'])) {
    echo('El ID del pedido no está definido en la sesión.');
} else {
    $id_pedido = $_SESSION['id_pedido'];
}

$total = isset($_GET['total']) ? $_GET['total'] : 0;
$fecha_hora = date("Y-m-d H:i:s");
$estado = "pendiente";

// Calculando el total del pedido
foreach ($_SESSION['carrito'] as $codigo => $producto) {
    $cantidad = $producto['cantidad'];
    $precio = $producto['precio'];
    $total += $cantidad * $precio;
}

// Inserción del pedido en la base de datos
$query = $cnx->prepare("
    INSERT INTO pedido (fecha_hora, estado, total, id_cajero, id_pedido)
    VALUES (:fecha_hora, :estado, :total, :id_cajero, :id_pedido)");

$query->bindValue(":fecha_hora", $fecha_hora);
$query->bindValue(":estado", $estado);
$query->bindValue(":total", $total);
$query->bindValue(":id_cajero", $id_cajero);
$query->bindValue(":id_pedido", $id_pedido);

if ($query->execute()) {
    $id_pedido = $cnx->lastInsertId();

    // Inserción de productos en el pedido
    foreach ($_SESSION['carrito'] as $codigo => $producto) {
        $cantidad = $producto['cantidad'];
        $precio = $producto['precio'];

        $query_producto = $cnx->prepare(
            "INSERT INTO pedido_producto (id_pedido, id_producto, cantidad, precio) VALUES (:id_pedido, :codigo, :cantidad, :precio)"
        );
        
        $query_producto->bindValue(':id_pedido', $id_pedido);
        $query_producto->bindValue(':codigo', $codigo);
        $query_producto->bindValue(':cantidad', $cantidad);
        $query_producto->bindValue(':precio', $precio);
        $query_producto->execute();

        unset($_SESSION['carrito'][$codigo]);
    }

    if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'cajero') {
        header('Location: inicio-empleado.php'); 
        exit;
    }
    header('Location: menu-cliente.php');
    exit;
} else {
    print("Error");
}
?>
