<?php
    require 'conexion.php';
    $query= $cnx->prepare("
    INSERT INTO usuario
        (nombre,apellido,gmail,password,rol)
    VALUES
        (:nombre ,:apellido,:gmail,:password , :rol)");
    $query->bindValue(":nombre", $_POST['nombre']);
    $query->bindValue(":apellido", $_POST['apellido']);
    $query->bindValue(":gmail", $_POST['gmail']);
    $query->bindValue(":password", $_POST['password']);
    $query->bindValue(":rol", $_POST['rol']);
    if($query->execute()){
        print "Datos agregados, El codigo es ".$cnx -> lastInsertId();
    } else{
        print "Error en la consulta";
    }
    header('Location: ./html/form-nuevo-empleado.html')
?>