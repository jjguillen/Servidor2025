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

        public static function insertModulo($modulo) {
            $conexion = new ConexionBD();

            //Hacer consulta BBDD para obtener todos los módulos
            $stmt = $conexion->getConexion()->prepare("INSERT INTO modulos  
                (nombre, ciclo, curso, horas) VALUES (?,?,?,?)");
            $stmt->bindValue(1, $modulo->getNombre());
            $stmt->bindValue(2, $modulo->getCiclo());
            $stmt->bindValue(3, $modulo->getCurso());
            $stmt->bindValue(4, $modulo->getHoras());
            $stmt->execute();

            $conexion->cerrarConexion();
        }

        public static function deleteModulo($id) {
            $conexion = new ConexionBD();

            //Hacer consulta BBDD para obtener todos los módulos
            $stmt = $conexion->getConexion()->prepare("DELETE FROM modulos
                        WHERE id = ?");
            $stmt->bindValue(1, $id);
            $stmt->execute();

            $conexion->cerrarConexion();
        }

        public static function getById($id) {
            $conexion = new ConexionBD();

            //Hacer consulta BBDD para obtener todos los módulos
            $stmt = $conexion->getConexion()->prepare("SELECT * FROM modulos 
                        WHERE id = ?");
            $stmt->bindValue(1, $id);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Modulos\modelos\Modulo');
            $stmt->execute(); //La ejecución de la consulta
            $modulo = $stmt->fetch();

            $conexion->cerrarConexion();

            return $modulo;
        }

        public static function updateModulo($modulo) {
            $conexion = new ConexionBD();

            //Hacer consulta BBDD para obtener todos los módulos
            $stmt = $conexion->getConexion()->prepare("UPDATE modulos
                SET nombre=?, ciclo=?, curso=?, horas=? WHERE id=?");
            $stmt->bindValue(1, $modulo->getNombre());
            $stmt->bindValue(2, $modulo->getCiclo());
            $stmt->bindValue(3, $modulo->getCurso());
            $stmt->bindValue(4, $modulo->getHoras());
            $stmt->bindValue(5, $modulo->getId());
            $stmt->execute();

            $conexion->cerrarConexion();
        }


    }
