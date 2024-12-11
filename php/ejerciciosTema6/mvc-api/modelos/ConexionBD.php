<?php

namespace Race\modelos;

use \PDO;
use \PDOException;

class ConexionBD {

    private $conexion;

    public function __construct() {
    
        $host = 'mariadb:3306'; //La IP del contenedor Mysql, y el puerto interno del contenedor
    
            try {
                if ($this->conexion == null) {
                    $this->conexion = new PDO("mysql:host=" . $host . ";dbname=" . "races", "root", "toor");
                    $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $this->conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                } 
                
            } catch (PDOException $e){
                echo $e->getMessage();
            }

    }


    /**
     * Get the value of conexion
     */ 
    public function getConexion()
    {
        return $this->conexion;
    }

    public function cerrarConexion() {
        $this->conexion = null;
    }
}