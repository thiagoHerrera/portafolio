<?php
    require 'conexion.php';
    $id = $_GET['id'];

    $query = $cnx->prepare("DELETE FROM usuario WHERE id = :id");
    $query->bindValue(":id", $id);
    $query->execute();
    print "Se eliminaron".$query->rowCount();
    header('Location: empleado.php')
    
?>