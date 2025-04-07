<?php
    require 'conexion.php';
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $gmail = $_POST['gmail'];
    $password = $_POST['password'];
    //1. Especificamos la consulta
    $query = $cnx->prepare('UPDATE usuario SET nombre =:nombre, apellido =:apellido, gmail =:gmail, password =:password WHERE id = :id');
    $query->bindValue(":id",$id );
    $query->bindValue(":nombre",$nombre );
    $query->bindValue(":gmail",$gmail );
    $query->bindValue(":apellido",$apellido );
    $query->bindValue(":password",$password );
    // 2. Ejecutamos la consulta y la enviamos a MySQL
    $query->execute();
    //3. Redirige a la pagina principal
    header('Location: empleado.php')
?>