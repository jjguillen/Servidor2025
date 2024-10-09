<?php

//Leer el formulario
if ($_POST) {
    if (isset($_POST['crearCookie'])) {


        //Leer el valor actual
        if (isset($_COOKIE['TestCookie'])) {
            $valorCookie = $_COOKIE['TestCookie'];
        } else {
            $valorCookie = "";
            $nombre = $_REQUEST['nombre'];
            $valorCookie .= $nombre."#";
        }

        //Leer un checkbox - varias opciones
        if (isset($_POST['aficiones'])) {
            foreach($_POST['aficiones'] as $aficion) {
                $valorCookie .= $aficion . "#";
            }
        }
    }
}

//Creación de la cookie
setcookie("TestCookie", $valorCookie, (time() + (3600*3)), "/ejerciciosTema2/cookies", "localhost", 0, 1);
header("Location: tienda.php");

?>