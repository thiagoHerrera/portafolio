<?php
    require 'conexion.php';
    $query= $cnx->prepare("
    INSERT INTO producto
        (nombre,precio,imagen,descrip)
    VALUES
        (:nombre, :precio, :imagen, :descrip)");
    $query->bindValue(":nombre", $_POST['nombre']);
    $query->bindValue(":precio", $_POST['precio']);
    $query->bindValue(":imagen", $_FILES['imagen']['name']);
    $query->bindValue(":descrip", $_POST['descrip']);
    if($query->execute()){
        print "Datos agregados, El codigo es ".$cnx -> lastInsertId();
    } else{
        print "Error en la consulta";
    }
    header('Location: ./html/form-nuevo-producto.html')
?>