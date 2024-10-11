<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiEmpresa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body class="d-flex flex-column h-100">
    
    <div class="container">

        <form action="controlador.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-10 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="nombre" maxlength="50" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-10 mb-3">
                    <label for="nombre" class="form-label">Fichero</label>
                    <div class="input-group">
                        <input type="file" class="form-control" name="fichero" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <input type="submit" class="btn btn-success" value="Enviar" name="upload">
                    <input type="reset" class="btn btn-warning" value="Limpiar">
                </div>
            </div>
        </form>

    </div>

</body>
</html>