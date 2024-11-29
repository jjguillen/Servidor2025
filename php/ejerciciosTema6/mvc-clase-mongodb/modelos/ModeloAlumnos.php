<?php

    namespace ModulosMG\modelos;


    use MongoDB\BSON\ObjectId;
    use MongoDB\Driver\Query;
    use \PDO;

    class ModeloAlumnos {


        /**
         * Consulta todos los alumnos de la BBDD
         * @return array de objetos Alumno
         */
        public static function getAll() {
            $conexion = ConexionBD::conectar();

            //Hacer consulta BBDD para obtener todos los módulos
            $alumnosJson = $conexion->alumnos->find();
            $alumnos = array();
            foreach ($alumnosJson as $alumno) {
                array_unshift($alumnos, new Alumno($alumno->_id, $alumno->nombre, $alumno->apellidos,
                    $alumno->email, $alumno->edad, $alumno->localidad, $alumno->telefono));
            }

            ConexionBD::cerrarConexion();

            return $alumnos;
        }


        public static function insertAlumno($alumno) {
            $conexion = ConexionBD::conectar();

            $conexion->alumnos->insertOne(['nombre' => $alumno->getNombre(), 'apellidos' => $alumno->getApellidos(),
                'email' => $alumno->getEmail(), 'edad' => $alumno->getEdad(), 'localidad' => $alumno->getLocalidad(),
                'telefono' => $alumno->getTelefono()]);

            ConexionBD::cerrarConexion();
        }

        public static function deleteAlumno($id) {
            $conexion = ConexionBD::conectar();

            $objectId = new ObjectId($id);
            $conexion->alumnos->deleteOne(['_id' => $objectId]);

            ConexionBD::cerrarConexion();
        }

        public static function getById($id) {
            $conexion = ConexionBD::conectar();
            $objectId = new ObjectId($id);
            $alumnoJson = $conexion->alumnos->findOne(['_id' => $objectId]);
            $alumno = new Alumno($alumnoJson->_id, $alumnoJson->nombre, $alumnoJson->apellidos,
                $alumnoJson->email, $alumnoJson->edad, $alumnoJson->localidad, $alumnoJson->telefono);

            ConexionBD::cerrarConexion();

            return $alumno;
        }

        public static function updateAlumno($alumno) {
            $conexion = ConexionBD::conectar();

            $objectId = new ObjectId($alumno->getId());
            $conexion->alumnos->updateOne(['_id' => $objectId], ['$set' => ["nombre" => $alumno->getNombre(),
                "apellidos" => $alumno->getApellidos(), "email" => $alumno->getEmail(),
                "edad" => $alumno->getEdad(), "localidad" => $alumno->getLocalidad(),
                "telefono" => $alumno->getTelefono()]]);

            ConexionBD::cerrarConexion();
        }

        public static function getMatriculas($idAlumno) {

            $conexion = ConexionBD::conectar();

            //Sacamos todos los módulos donde se ha matriculado ese alumno
            $modulosCursor = $conexion->matriculas->find(['alumno_id' => $idAlumno]);

            $modulosIds = [];
            foreach ($modulosCursor as $matricula) {
                $modulosIds[] = new ObjectId($matricula->modulo_id);
            }

            //Sacamos todos los módulos cuyo id esté en el array de módulos matriculados
            $modulosMatriculados = $conexion->modulos->find(['_id' => ['$in' => $modulosIds]]);

            //Lo pasamos a objetos Modulo
            $modulos = array();
            foreach ($modulosMatriculados as $moduloObj) {
                array_unshift($modulos, new Modulo($moduloObj->_id, $moduloObj->nombre,
                    $moduloObj->ciclo, $moduloObj->curso, $moduloObj->horas));
            }

            return $modulos;
        }

        public static function getModulosNoMatriculados($idAlumno) {

            $conexion = ConexionBD::conectar();

            //Sacamos todos los módulos donde se ha matriculado ese alumno
            $modulosCursor = $conexion->matriculas->find(['alumno_id' => $idAlumno]);

            $modulosIds = [];
            foreach ($modulosCursor as $matricula) {
                $modulosIds[] = new ObjectId($matricula->modulo_id);
            }

            //Sacamos todos los módulos cuyo id NO esté en el array de módulos matriculados
            $modulosMatriculados = $conexion->modulos->find(['_id' => ['$nin' => $modulosIds]]);

            //Lo pasamos a objetos Modulo
            $modulos = array();
            foreach ($modulosMatriculados as $moduloObj) {
                array_unshift($modulos, new Modulo($moduloObj->_id, $moduloObj->nombre,
                    $moduloObj->ciclo, $moduloObj->curso, $moduloObj->horas));
            }

            return $modulos;
        }

        public static function matricular($moduloId, $alumnoId) {
            $conexion = ConexionBD::conectar();

            $conexion->matriculas->insertOne(['alumno_id' => $alumnoId, 'modulo_id' => $moduloId]);

            ConexionBD::cerrarConexion();
        }

        public static function deleteMatricula($idAlumno, $idModulo) {
            $conexion = ConexionBD::conectar();

            $conexion->matriculas->deleteOne(['alumno_id' => $idAlumno, 'modulo_id' => $idModulo]);

            ConexionBD::cerrarConexion();
        }


    }
