<?php
    include("cabecera.php");

    if (isset($_SESSION['cosa'])) {
        echo $_SESSION['cosa'];
    }
?>

    <main class="flex-shrink-0">
        <div class="container">

            <h1>Servicios</h1>


        </div>
    </main>

<?php
    include("pie.php");
?>