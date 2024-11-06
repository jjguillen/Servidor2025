<?php

    namespace Modulos;

    session_start();

    use Modulos\controladores\ControladorModulos;

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



    //ENRUTADOR - CONTROLADOR BASE


    //Tratamiento de botones, forms, ...
    if (isset($_REQUEST["accion"])) {





    } else {
        //Página de inicio
        if (isset($_SESSION['usuario'])) {
            //Inicio de la app
            ControladorModulos::mostrarInicioView();
        } else {
            //Formulario de login
            //ControladorModulos::mostrarLoginView();
            ControladorModulos::mostrarInicioView();
        }

    }

