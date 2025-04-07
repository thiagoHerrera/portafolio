<?php
    require 'conexion.php';
    $codigo = $_GET['codigo'];
    $query = $cnx->prepare("SELECT * FROM producto WHERE codigo = :codigo");
    $query->bindValue(":codigo", $codigo);
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
        <h1>Modificar Producto</h1>
        <form action="./form-modificar.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="codigo" value="<?php echo $producto['codigo']; ?>">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input class="form-control" type="text" codigo="nombre" name="nombre" value="<?php echo $producto['nombre']; ?>" required>
            </div>
            <div class="form-group">
                <label for="descrip">Descripción:</label>
                <input class="form-control" type="text" codigo="descrip" name="descrip" value="<?php echo $producto['descrip']; ?>" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input class="form-control" type="number" codigo="precio" name="precio" value="<?php echo $producto['precio']; ?>" required>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen:</label>
                <input class="form-control-file" type="file" codigo="imagen" name="imagen">
            </div>
            <button type="submit" class="btn btn-primary">Modificar</button>
        </form>
        <a href="tabla.php" class="btn btn-secondary">Ver la tabla actualizada</a>
    </div>
</body>
</html>
