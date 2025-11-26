<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/consult.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/659e177ab2.js" crossorigin="anonymous"></script>
    <title>Usuarios</title>
</head>
<body>

    <div class="sidenav">
        
        <a href="index.php?controller=user&action=insert">
            <i class="fa-solid fa-user"></i> REGISTRO
        </a>
        <a href="index.php?controller=product&action=insertProduct">
            <i class="fa-solid fa-box"></i> PRODUCTO
        </a>
    </div>
    
    <div class="principal">

        <h1>LISTA USUARIOS</h1>

        <table border="1">
        <thead>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>EDAD</th>
            <th>FECHA</th>
            <th>ACCIONES</th>
        </thead>
        <tbody>
            <?php
                while($row = $usuarios -> fetch_assoc()){
            ?>
                <tr>
                    <td><?php echo $row['id_list']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['edad']; ?></td>
                    <td><?php echo $row['fecha']; ?></td>
                    <td>
                        <a href="index.php?action=update&id=<?php echo $row['id_list']; ?>">
                            <button class="btn success">Editar</button>
                        </a>
                        <a href="index.php?action=delete&id=<?php echo $row['id_list']; ?>">
                            <button onclick="return confirm('¿Desea eliminar al usuario?')" class="btn danger">Eliminar</button>
                        </a>
                    </td>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>

    <br>
    <a href="index.php?controller=user&action=insert">
        <button>Registrarse</button>
    </a>


    </div>
    
</body>
</html>