<?php

    if (isset($_GET['nombre']) && isset($_GET['trabajo'])) {
        echo $_GET['nombre'] . " - " . $_GET['trabajo'] . "<br>";
        echo $_REQUEST['nombre'] . " - " . $_REQUEST['trabajo'];
    }

    
    //Comprobar que esa variable ha sido enviada
    if (isset($_REQUEST['accion'])) {
        echo "<br>Has pinchado en " . $_REQUEST['accion'];
    }




?>