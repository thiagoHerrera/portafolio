<?php
    require 'conexion.php';
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $descrip = $_POST['descrip'];
    $precio = $_POST['precio'];
    $imagen = $_FILES['imagen']['nombre'];
    //1. Especificamos la consulta
    $query = $cnx->prepare('UPDATE producto SET nombre =:nombre, descrip =:descrip ,precio =:precio, imagen =:imagen WHERE codigo = :codigo');
    $query->bindValue(":codigo",$codigo );
    $query->bindValue(":nombre",$nombre );
    $query->bindValue(":descrip",$descrip );
    $query->bindValue(":precio",$precio );
    $query->bindValue(":imagen",$_FILES['imagen']['name']);
    // 2. Ejecutamos la consulta y la enviamos a MySQL
    $query->execute();
    //3. Redirige a la pagina principal
    header('Location: tabla.php')
?>