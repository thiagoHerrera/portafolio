<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require 'import-bootstrap.php';
    ?>
    <title>Pagar con Tarjeta</title>
    <link rel="stylesheet" href="./styles/pago.css">
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <img src="./img/logo.png" alt="Mc King">
        </div>
        <ul class="menu-items">
            <?php
            require 'conexion.php';
            $rol_requerido = 'cliente';

            if (isset($_SESSION['id']) && $_SESSION['rol'] == $rol_requerido) {
                print("Bienvenido {$_SESSION['rol']}, {$_SESSION['nombre']}");
            } else {
                ?>
                <p><a class="link-opacity-25" href="./html/form-login.html">Debe Iniciar Sesion</a></p>
                <?php
            }
            ?>

            <li><a href="inicio-cliente.php">Menú</a></li>
        </ul>
        <div class="promo">
            <a href="cerrar-sesion.php" class="promo-link bi bi-x-circle-fill">Cerrar Sesion</a>
        </div>
    </nav>

    <div class="payment-form">
    <div class="credit-card">
        <div class="card-details">
            <span class="card-holder-label">DUEÑO</span>
            <span class="expires-label">EXPIRA</span>
            <span class="card-type">VISA</span>
        </div>
    </div>
    <form action="carrito.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="card-number">NUM TARJETA</label>
            <div class="input-group">
                <input type="text" id="card-number" maxlength="4" class="form-control" required>
                <input type="text" maxlength="4" class="form-control" required>
                <input type="text" maxlength="4" class="form-control" required>
                <input type="text" maxlength="4" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label for="card-holder">DUEÑO</label>
            <input type="text" id="card-holder" class="form-control" required>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="expiration-date">FECHA DE EXPIRACIÓN</label>
                <select id="expiration-month" class="form-control">
                    <option>MM</option>
                    <option>01</option>
                    <option>02</option>
                    <option>03</option>
                    <option>04</option>
                    <option>05</option>
                    <option>06</option>
                    <option>07</option>
                    <option>08</option>
                    <option>09</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                </select>
                <select id="expiration-year" class="form-control">
                    <option>YYYY</option>
                    <option>2023</option>
                    <option>2024</option>
                    <option>2025</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ccv">CCV</label>
                <input type="text" id="ccv" maxlength="3" class="form-control" required>
            </div>
        </div>
        <button type="submit" class="btn-submit">SUBMIT</button>
    </form>
</div>

    <div class="derechos">
        <h2>© 2024 MC KING Company. Todos los derechos reservados.</h2>
    </div>
</body>
</html>
