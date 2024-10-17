<?php
    include("cabecera.php");

?>

    <main class="flex-shrink-0">
        <div class="container">

            <h1>Login</h1>

<?php
        if (isset($_GET['error'])) {
            echo "<p class='text-danger'>".$_GET['error']."</p>";
        }

?>
            <form action="controlador.php" method="POST">
                <div class="row">
                    <div class="col-10 mb-3">
                        <label for="nombre" class="form-label">Email</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="email" maxlength="50" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 mb-3">
                        <label for="apellidos" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" minlength="8" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <input type="submit" class="btn btn-success" value="Entrar" name="login">
                        <input type="reset" class="btn btn-warning" value="Limpiar">
                    </div>
                </div>
            </form>


        </div>
    </main>

<?php
    include("pie.php");
?>