<?php
session_start();
require 'conexion.php';

$nombre = $_GET['nombre'];
$gmail = $_GET['gmail'];
$password = $_GET['password'];
$rol = $_GET['rol'];

$query = $cnx->prepare("SELECT * FROM usuario WHERE nombre = :nombre AND gmail = :gmail AND password = :password");
$query->bindValue(":nombre", $nombre);
$query->bindValue(":gmail", $gmail);
$query->bindValue(":password", $password);

$query->execute(); 

if ($query->rowCount() == 1) {
    $usuario = $query->fetch(PDO::FETCH_ASSOC);

    if ($usuario['rol'] == $rol) {
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['gmail'] = $usuario['gmail'];
        $_SESSION['rol'] = $usuario['rol'];
        
        if ($rol == 'cajero') {
            $_SESSION['id_cajero'] = $usuario['id']; 
        }
        if ($rol == 'gerente') {
            header('Location: tabla.php');
        } elseif ($rol == 'cliente') {
            header('Location: inicio-cliente.php');
        } elseif ($rol == 'cajero') {
            header('Location: inicio-empleado.php'); 
        }elseif ($rol == 'chef') {
            header('Location: inicio-chef.php');
        }
    } else {
        header('Location: ./html/form-login.html?error=rol_incorrecto');
    }
} else {
    header('Location: ./html/form-login.html?error=credenciales_incorrectas');
}
?>
