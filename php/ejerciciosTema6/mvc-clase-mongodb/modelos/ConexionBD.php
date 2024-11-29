<?php

namespace ModulosMG\modelos;

require_once './vendor/autoload.php';
use MongoDB\Client;
use MongoDB\Driver\Manager;

class ConexionBD {

    private static $conexion;
    private static $mangaer;

    public static function conectar($bd="") {

        try {
            //CONEXIÓN A MONGODB CLOUD ATLAS. Comentar esta línea para conectar en local.
            //$host = "mongodb+srv://admin:rYuEG2NUGn0hpl4o@cluster0.qmwhh.mongodb.net/?retryWrites=true&w=majority";
            $host = "mongodb://root:toor@mongo:27017/"; //MongoDB en Docker
            self::$conexion = (new Client($host))->selectDatabase('GestionProf');;
        } catch (Exception $e){
            echo $e->getMessage();
        }
        return self::$conexion;

    }

    public static function getManager() {
        $manager = new Manager("mongodb://root:toor@mongo:27017/");
        return $manager;
    }

    public static function cerrarConexion() {
        self::$conexion = null;
    }


    /**
     * Get the value of conexion
     */ 
    public function getConexion()
    {
        return self::$conexion;
    }

}