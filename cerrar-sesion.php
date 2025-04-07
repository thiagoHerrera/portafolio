<?php
session_start();

// Elimina todas las variables de sesión
$_SESSION = [];

// Si deseas eliminar la cookie de sesión
if (ini_get("session.use_cookies")) {
    session_unset();
}

// Redirige a otra página o muestra un mensaje
header("Location: ./html/form-login.html");

?>