<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo Form $_POST</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <div class="container">

        <h1 class="text-primary">Ejemplo de Formulario con POST</h1>

<?php
    if (isset($_GET['error'])) {
        if (strcmp($_GET['error'],"menor18") == 0) {
            echo "<p class='text-danger'>Eres menor de 18 años</p>";
        }
    }
?>

        <form action="procesarForm.php" method="POST">
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
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="apellidos" maxlength="50" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-10 mb-3">
                    <label for="telefono" class="form-label">Teléfono (9 dígitos seguidos)</label>
                    <div class="input-group">
                        <input type="tel" class="form-control" name="telefono" pattern="[0-9]{9}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-10 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" name="email" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-10 mb-3">
                    <label for="passwd" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="passwd" maxlength="20" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-10 mb-3">
                    <label for="edad" class="form-label">Edad</label>
                    <div class="input-group">
                        <input type="number" class="form-control" name="edad" min="10" max="120" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-10 mb-3">
                    <label for="fechaAlta" class="form-label">Fecha Alta</label>
                    <div class="input-group">
                        <input type="date" class="form-control" name="fechaAlta">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4 mb-3 form-check">
                    <div class="form-check">
                        <input class="form-check-input" checked type="radio" name="comunicacion" value="email">
                        <label class="form-check-label" for="comunicacion">
                          Por email
                        </label>
                    </div>
                </div>
                <div class="col-4 mb-3 form-check">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="comunicacion" value="telefono">
                        <label class="form-check-label" for="comunicacion">
                          Por teléfono
                        </label>
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
                <div class="col-10 mb-3">
                    <label for="fechaAlta" class="form-label">Comentarios</label>
                    <div class="input-group">
                        <textarea name="comentarios" class="form-control"></textarea>
                    </div>
                </div>
            </div>

            <div class="row"></div>
                <div class="col-10 mb-3">
                    <select name="sistOperativo" class="form-select" aria-label="Sistema Operativo">
                        <option selected value="W10">Windows 11</option>
                        <option value="W10">Windows 10"</option>
                        <option value="Linux">Linux</option>
                        <option value="Mac">Mac</option>
                      </select>
                </div>
            </div>


            <input type="hidden" name="datosOcultos" value="Chorpresa">

            <div class="row">
                <div class="col-6">
                    <input type="submit" class="btn btn-success" value="Enviar" name="registro">
                    <input type="reset" class="btn btn-warning" value="Limpiar">
                </div>
            </div>
        </form>

    </div>

    <script src="./js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>