<?php
    include("cabecera.php");

   
?>

    <main class="flex-shrink-0">
        <div class="container">

            <h1>Home</h1>

<?php
    if (isset($_GET['error'])) {
        if (strcmp($_GET['error'],"errorTransaccion")) {
            echo "<h5 class='text-danger'>Error realizando pedido, no se ha completado</h5>";
        }
        if (strcmp($_GET['error'],"errorConexionBD")) {
            echo "<h5 class='text-danger'>Error conexión Base de Datos</h5>";
        }
    }
?>

        </div>
    </main>

<?php
    include("pie.php");
?>
