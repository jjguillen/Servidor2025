<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba Cookies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
    <div class="container">

        <h2>Quiero saber algo más de ti</h2>
        <form action="crearCookie.php" method="POST">
            <div class="row">
                <div class="col-10 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="nombre" maxlength="50" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="form-label">Aficiones</label>
                <div class="col-12 form-check">
                    <input class="form-check-input" type="checkbox" value="musica" name="aficiones[]">
                    <label class="form-check-label" for="aficiones">
                        Música
                    </label>
                </div>
                <div class="col-12 form-check">
                    <input class="form-check-input" type="checkbox" value="cine" name="aficiones[]">
                    <label class="form-check-label" for="aficiones">
                        Cine
                    </label>
                </div>
                <div class="col-12 mb-4 form-check">
                    <input class="form-check-input" type="checkbox" value="deporte" name="aficiones[]">
                    <label class="form-check-label" for="aficiones">
                        Deporte
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <input type="submit" class="btn btn-success" value="Enviar" name="crearCookie">
                    <input type="reset" class="btn btn-warning" value="Limpiar">
                </div>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>