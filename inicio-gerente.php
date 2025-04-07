<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require 'import-bootstrap.php'
    ?>
    <link href="./styles/inicio.css" rel="stylesheet">
    <title>Inicio Gerente</title>
    <style>
        .nav-item {
            list-style: none;
        }

        .dropdown-menu {
            margin-top: 30px;
        }

        .nav-item:hover .submenu {
            display: block;
        }

        .submenu {
            display: none;
            position: absolute;
            left: 0;
            margin-top: 0;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="logo">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="./img/logo.png" alt="Mc King" width="60px">
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item bi bi-star-fill" href="./menu-cliente.php">Burgers</a></li>
                    <li><a href="./html/form-nuevo-producto.html" class="dropdown-item"><i class="bi bi-plus-circle-fill"></i> Nuevo Producto</a></li>
                    <li><a href="./html/form-nuevo-empleado.html" class="dropdown-item"><i class="bi bi-plus-circle-fill"></i> Nuevo Empleado</a></li>
                    <li><a href="tabla.php" class="dropdown-item"><i class="bi bi-plus-circle-fill"></i> Productos</a></li>
                    <li><a href="empleado.php" class="dropdown-item"><i class="bi bi-person-circle"></i> Empleados</a></li>
                </ul>
            </li>
        </div>
        <ul class="menu-items">
            <?php
            require 'conexion.php';
            $rol_requerido = 'gerente';
                if (isset($_SESSION['id']) && $_SESSION['rol'] == $rol_requerido) {
                    print("Bienvenido {$_SESSION['rol']}, {$_SESSION['nombre']}");
                } else {
                    ?>
                    <p><a class="link-opacity-25" href="./html/form-login.html">Debe Iniciar Sesion</a></p>
                    <?php
                }
                ?>
            <li><a href="inicio-gerente.php">Menú</a></li>
            <li class="nav-item dropdown position-relative">
                <a class="nav-link dropdown-toggle" href="#" id="contactDropdown" role="button" aria-expanded="true">Contacto</a>
                <ul class="submenu">
                    <li><a class="dropdown-item" href="https://www.instagram.com/mckingburguers/?hl=es">Instagram</a></li>
                    <li><a class="dropdown-item" href="https://www.facebook.com/mckingburguers/?locale=es_LA">Facebook</a></li>
                </ul>
            </li>
        </ul>
        <div class="promo">
            <a href="cerrar-sesion.php" class="promo-link bi bi-x-circle-fill">Cerrar Sesion</a>
        </div>
    </nav>

    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2500" data-bs-pause="hover">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./img/carousel/pikaso_text-to-image_Candid-image-photography-natural-textures-highly-r (1).jpeg" class="imagenes d-block" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./img/carousel/pikaso_text-to-image_Candid-image-photography-natural-textures-highly-r (2).jpeg" class="imagenes d-block" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./img/carousel/pikaso_text-to-image_Candid-image-photography-natural-textures-highly-r (3).jpeg" class="imagenes d-block" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./img/carousel/pikaso_text-to-image_Candid-image-photography-natural-textures-highly-r (4).jpeg" class="imagenes d-block" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./img/carousel/pikaso_text-to-image_Candid-image-photography-natural-textures-highly-r (5).jpeg" class="imagenes d-block" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./img/carousel/pikaso_text-to-image_Candid-image-photography-natural-textures-highly-r (6).jpeg" class="imagenes d-block" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./img/carousel/pikaso_text-to-image_Candid-image-photography-natural-textures-highly-r (7).jpeg" class="imagenes d-block" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./img/carousel/pikaso_text-to-image_Candid-image-photography-natural-textures-highly-r.jpeg" class="imagenes d-block" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="derechos">
        <h1>© 2024 MC KING Company. Todos los derechos reservados.</h1>
    </div>

</body>
</html>