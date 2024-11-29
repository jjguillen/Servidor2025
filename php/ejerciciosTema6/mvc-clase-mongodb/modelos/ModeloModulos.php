<?php

    namespace ModulosMG\modelos;

    use ModulosMG\modelos\Modulo;
    use MongoDB\BSON\ObjectId;

    class ModeloModulos {


        /**
         * Consulta todos los modulos de la BBDD
         * @return array de objetos Modulo
         */
        public static function getAll() {
            $conexion = ConexionBD::conectar();

            //Hacer consulta BBDD para obtener todos los módulos
            $modulosJson = $conexion->modulos->find();
            $modulos = array();
            foreach ($modulosJson as $modulo) {
                array_unshift($modulos, new Modulo($modulo->_id, $modulo->nombre, $modulo->ciclo,
                    $modulo->curso, $modulo->horas));
            }

            ConexionBD::cerrarConexion();

            return $modulos;
        }

        public static function insertModulo($modulo) {
            $conexion = ConexionBD::conectar();

            $conexion->modulos->insertOne(['nombre' => $modulo->getNombre(), 'ciclo' => $modulo->getCiclo(),
                'curso' => $modulo->getCurso(), 'horas' => $modulo->getHoras()]);

            ConexionBD::cerrarConexion();
        }

        public static function deleteModulo($id) {
            $conexion = ConexionBD::conectar();

            $objectId = new ObjectId($id);
            $conexion->modulos->deleteOne(['_id' => $objectId]);

            ConexionBD::cerrarConexion();
        }

        public static function getById($id) {
            $conexion = ConexionBD::conectar();
            $objectId = new ObjectId($id);
            $moduloJson = $conexion->modulos->findOne(['_id' => $objectId]);
            $modulo = new Modulo($moduloJson->_id, $moduloJson->nombre, $moduloJson->ciclo,
                                 $moduloJson->curso, $moduloJson->horas);

            ConexionBD::cerrarConexion();

            return $modulo;
        }

        public static function updateModulo($modulo) {
            $conexion = ConexionBD::conectar();

            $objectId = new ObjectId($modulo->getId());
            $conexion->modulos->updateOne(['_id' => $objectId], ['$set' => ["nombre" => $modulo->getNombre(),
                'ciclo' => $modulo->getCiclo(), "curso" => $modulo->getCurso(), "horas" => $modulo->getHoras()]]);

            ConexionBD::cerrarConexion();
        }


    }
