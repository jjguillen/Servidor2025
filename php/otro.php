<?php
    if (isset($_GET['id'])) {
        echo "ID: " . $_GET['id'];
    }

    echo "<br>";
    //empty significa que tiene valor vacío, no nulo
    echo empty($_GET['nombre']) ? "Está vacío" : $_GET['nombre'];

?>