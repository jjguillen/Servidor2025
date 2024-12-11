<?php
    namespace Race\modelos;

    use \PDO;

    class ModeloRace {

        public static function getPilotos() {
            $conexion = new ConexionBD();

            //Hacer consulta BBDD para obtener todos los módulos
            $stmt = $conexion->getConexion()->prepare("SELECT * FROM races");
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Race\modelos\Piloto');
            $stmt->execute(); //La ejecución de la consulta
            $pilotos = $stmt->fetchAll();

            $conexion->cerrarConexion();

            return $pilotos;
        }

        public static function addPiloto($piloto) {

            $conexion = new ConexionBD();

            //Hacer consulta BBDD para obtener todos los módulos
            $stmt = $conexion->getConexion()->prepare("INSERT INTO races  
                (nombre, escuderia) VALUES (?,?)");
            $stmt->bindValue(1, $piloto->getNombre());
            $stmt->bindValue(2, $piloto->getEscuderia());

            $stmt->execute();

            $conexion->cerrarConexion();
        }


    }