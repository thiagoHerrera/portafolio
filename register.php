<?php
require 'conexion.php';

$nombre = $_GET['nombre'];
$apellido = $_GET['apellido'];
$gmail = $_GET['gmail'];
$password = $_GET['password'];

$query = $cnx->prepare("INSERT INTO usuario (nombre, apellido,gmail, password, rol) VALUES (:nombre, :apellido,:gmail, :password, 'cliente')"); // esto lo que hace es que con el VALUES agrega el rol automaticamento para que sea cliente
$query->bindValue(':nombre', $nombre);
$query->bindValue(':apellido', $apellido);
$query->bindValue(':gmail', $gmail);
$query->bindValue(':password', $password);

if ($query->execute()) {
    header('Location: ./html/form-login.html');
} else {
    echo "Error al registrar el usuario.";
}
?>
