<?php

namespace Race;

use Race\controladores\ControladorRace;

session_start();
//session_destroy();


/**
 * AUTOLOAD
 */
spl_autoload_register(function ($class) {
    //echo $class."<br>";
    //echo substr($class, strpos($class,"\\")+1);
    $ruta = substr($class, strpos($class,"\\")+1);
    $ruta = str_replace("\\", "/", $ruta);
    include_once "./" . $ruta . ".php";
});

if (isset($_REQUEST["accion"])) {
    if (strcmp($_REQUEST["accion"], "addPiloto") == 0) {
        $pn = $_REQUEST["pn"];
        $ps = $_REQUEST["ps"];

        ControladorRace::addPiloto($ps, $pn);
    }
    if (strcmp($_REQUEST["accion"], "verFavoritos") == 0) {
        ControladorRace::getFavoritos();
    }

} else {
    //Página de inicio
    ControladorRace::mostrarPilotos();

}





