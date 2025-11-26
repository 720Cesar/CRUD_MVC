<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h1>REGISTRAR PRODUCTO</h1>
    <hr>

    <form action="" method="POST">

    <input type="text" name="nombre" placeholder="Nombre del producto">
    <br><br>

    <input type="number" step="0.01" name="precio" placeholder="Precio ($0.00)">
    <br><br>

    <input type="text" name="marca" placeholder="Marca">
    <br><br>

    <input type="submit" name="enviar" value="Enviar">

    </form>

    <br><br>

    <a href="index.php?controller=user&action=insert">
        <button>Usuarios</button>
    </a>
</body>
</html>