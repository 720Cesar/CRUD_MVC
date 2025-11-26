<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/659e177ab2.js" crossorigin="anonymous"></script>

    <title>Registro</title>
</head>
<body>
    <div class="container p-5 my-5 border">
        <center><h1><i class="fa-solid fa-user"></i>REGISTRO</h1></center>
        <br>
        <form action="index.php?action=insert" method="post">
            <div class="form-group">
                <input type="text" name="nombre" class="form-control" placeholder="Nombre"><br><br>
            </div>
            
            <input type="number" name="edad"class="form-control" placeholder="Edad">
            <br><br>

            <label for="fecha">Fecha de nacimiento: </label>
            <input type="date" name="fecha" class="form-control">
            <br><br>

            <input type="password" name="pass" class="form-control" placeholder="Contraseña">
            <br><br>

            <input type="submit" value="ENVIAR" name="enviar" class="btn btn-primary">
        </form>

        <br><br>

        <a href="index.php?action=consult">
            <button class="btn btn-outline-secondary"><i class="fa-solid fa-list"></i> Ir a registros</button>
        </a>

        <a href="index.php?controller=product&action=insertProduct">
            <button class="btn btn-outline-secondary"><i class="fa-solid fa-box-open"></i> Productos</button>
        </a>

        <a href="index.php?controller=user&action=backup">
            <button class="btn btn-outline-secondary"><i class="fa-solid fa-database"></i> Respaldo de BD</button>
        </a>
        <a href="index.php?controller=user&action=restore">
            <button class="btn btn-outline-secondary"><i class="fa-solid fa-file-arrow-up"></i> Restaurar BD</button>
        </a>

        <a href="index.php?controller=report&action=pdf_report">
            <button class="btn btn-outline-secondary"><i class="fa-solid fa-file-pdf"></i> Reporte </button>
        </a>

        <a href="index.php?controller=report&action=graphReport">
            <button class="btn btn-outline-secondary"><i class="fa-solid fa-file-pdf"></i> Gráfica </button>
        </a>
        <a href="index.php?controller=report&action=pieReport">
            <button class="btn btn-outline-secondary"><i class="fa-solid fa-chart-area"></i> Pastel </button>
        </a>

        <?php if(isset($restore)){ ?>
            <br><br>
            <div class="alert alert-success">
                <!-- Se imprime en pantalla el mensaje-->
                <?php echo $restore ?>
            </div>
            <script>
            // Función para enviar a otra ruta después de 3 segundos     
            setTimeout(function() {
                    window.location.href = 'index.php?controller=user&action=insert'; 
                }, 3000);
            </script>
        <?php } ?>

    </div>
    

</body>
</html>

