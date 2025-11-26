
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    <h1>EDITAR USUARIO - <?php echo $row['nombre']; ?></h1>
    <form action="index.php?action=update" method="POST">

        <input type="hidden" name="id" value="<?php echo $row['id_list']; ?>">

        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>">
        <br><br>

        <label for="edad">Edad: </label>
        <input type="number" name="edad" value="<?php echo $row['edad']; ?>">
        <br><br>

        <label for="fecha">Fecha de nacimiento: </label>
        <input type="date" name="fecha" value="<?php echo $row['fecha']; ?>">
        <br><br>

        <button name="editar">Enviar</button>
    </form>

</body>
</html>