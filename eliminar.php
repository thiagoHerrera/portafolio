<?php
require 'conexion.php';

if (isset($_POST['confirmar']) && $_POST['confirmar'] === 'yes') {
    $codigo = $_POST['codigo'];

    $query = $cnx->prepare("DELETE FROM producto WHERE codigo = :codigo");
    $query->bindValue(":codigo", $codigo);
    $query->execute();

    echo "Producto eliminado. Se eliminaron " . $query->rowCount() . " registros.";
    header('Location: tabla.php');  
    exit();
} else {
    header('Location: tabla.php');
    exit();
}
?>
