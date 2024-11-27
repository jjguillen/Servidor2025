<?php

namespace Pelis;

use Pelis\modelos\ConexionBD;
use Pelis\controladores\ControladorSeries;

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
    if (strcmp($_REQUEST["accion"], "addfav") == 0) {
        $id = $_REQUEST["id"];
        $name = $_REQUEST["name"];
        $image = $_REQUEST["image"];
        ControladorSeries::addFav($id, $name, $image);
    }
    if (strcmp($_REQUEST["accion"], "misSeries") == 0) {
        ControladorSeries::getMisSeries();
    }
    if (strcmp($_REQUEST["accion"], "deleteFav") == 0) {
        $id = $_REQUEST["id"];
        ControladorSeries::deleteFavorito($id);
    }
    if (strcmp($_REQUEST["accion"], "getComentarios") == 0) {
        $id = $_REQUEST["id"];
        ControladorSeries::getComentarios($id);
    }
} else {
    //Página de inicio
    ControladorSeries::mostrarSeriesAPI();

    /*
    if (isset($_SESSION['usuario'])) {
        //Inicio de la app
        ControladorModulos::mostrarModulos();
    } else {
        //Formulario de login
        ControladorUsuarios::mostrarLogin("");
    }
    */

}



