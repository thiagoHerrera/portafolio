<?php
    require 'conexion.php';
    $id = $_GET['id'];
    $query = $cnx->prepare("SELECT * FROM usuario WHERE id = :id");
    $query->bindValue(":id", $id);
    $query->execute();
    $producto = $query->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./styles/stylesTabla.css" rel="stylesheet">
    <?php require 'import-bootstrap.php'; ?>
    <title>Modificar Producto</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #8ca0c9;
            margin: 0;
        }
        .container {
            width: 100%;
            max-width: 500px;
            padding: 2rem;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
            text-align: center;
        }
        h1 {
            color: #333;
            font-weight: 500;
            margin-bottom: 1.5rem;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-control {
            border: 1px solid #ced4da;
            padding: 0.75rem;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 0.5rem 2rem;
            font-size: 1rem;
            margin-bottom: 1rem;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            color: #fff;
            padding: 0.5rem 2rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Modificar Empleado</h1>
        <form action="./form-modificar-empleado.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo $producto['nombre']; ?>" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Apellido:</label>
                <input class="form-control" type="text" id="apellido" name="apellido" value="<?php echo $producto['apellido']; ?>" required>
            </div>
            <div class="form-group">
                <label for="gmail">Email:</label>
                <input class="form-control" type="email" id="gmail" name="gmail" value="<?php echo $producto['gmail']; ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input class="form-control" type="password" id="password" name="password" value="<?php echo $producto['password']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Modificar</button>
        </form>
        <a href="tabla.php" class="btn btn-secondary">Ver la tabla actualizada</a>
    </div>
</body>
</html>
