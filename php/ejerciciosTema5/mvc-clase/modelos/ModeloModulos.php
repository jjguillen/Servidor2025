<?php

    namespace Modulos\modelos;

    use Modulos\modelos\Modulo;
    use \PDO;

    class ModeloModulos {


        /**
         * Consulta todos los modulos de la BBDD
         * @return array de objetos Modulo
         */
        public static function getAll() {
            $conexion = new ConexionBD();

            //Hacer consulta BBDD para obtener todos los módulos
            $stmt = $conexion->getConexion()->prepare("SELECT * FROM modulos");
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Modulos\modelos\Modulo');
            $stmt->execute(); //La ejecución de la consulta
            $modulos = $stmt->fetchAll();

            $conexion->cerrarConexion();

            return $modulos;
        }


    }
