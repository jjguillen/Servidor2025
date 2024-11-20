<?php

    namespace Modulos\modelos;

    use Modulos\modelos\Alumno;
    use Modulos\modelos\Modulo;
    use \PDO;

    class ModeloAlumnos {


        /**
         * Consulta todos los alumnos de la BBDD
         * @return array de objetos Alumno
         */
        public static function getAll() {
            $conexion = new ConexionBD();

            //Hacer consulta BBDD para obtener todos los módulos
            $stmt = $conexion->getConexion()->prepare("SELECT * FROM alumnos");
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Modulos\modelos\Alumno');
            $stmt->execute(); //La ejecución de la consulta
            $modulos = $stmt->fetchAll();

            $conexion->cerrarConexion();

            return $modulos;
        }


        public static function insertAlumno($alumno) {
            $conexion = new ConexionBD();

            //Hacer consulta BBDD para obtener todos los módulos
            $stmt = $conexion->getConexion()->prepare("INSERT INTO alumnos  
                (nombre, apellidos, email, edad, localidad, telefono) VALUES (?,?,?,?,?,?)");
            $stmt->bindValue(1, $alumno->getNombre());
            $stmt->bindValue(2, $alumno->getApellidos());
            $stmt->bindValue(3, $alumno->getEmail());
            $stmt->bindValue(4, $alumno->getEdad());
            $stmt->bindValue(5, $alumno->getLocalidad());
            $stmt->bindValue(6, $alumno->getTelefono());
            $stmt->execute();

            $conexion->cerrarConexion();
        }

        public static function deleteAlumno($id) {
            $conexion = new ConexionBD();

            //Hacer consulta BBDD para obtener todos los módulos
            $stmt = $conexion->getConexion()->prepare("DELETE FROM alumnos
                        WHERE id = ?");
            $stmt->bindValue(1, $id);
            $stmt->execute();

            $conexion->cerrarConexion();
        }

        public static function getById($id) {
            $conexion = new ConexionBD();

            //Hacer consulta BBDD para obtener todos los módulos
            $stmt = $conexion->getConexion()->prepare("SELECT * FROM alumnos 
                        WHERE id = ?");
            $stmt->bindValue(1, $id);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Modulos\modelos\Alumno');
            $stmt->execute(); //La ejecución de la consulta
            $modulo = $stmt->fetch();

            $conexion->cerrarConexion();

            return $modulo;
        }

        public static function updateAlumno($alumno) {
            $conexion = new ConexionBD();

            //Hacer consulta BBDD para obtener todos los módulos
            $stmt = $conexion->getConexion()->prepare("UPDATE alumnos
                SET nombre=?, apellidos=?, email=?, edad=?, localidad=?, telefono=?  WHERE id=?");
            $stmt->bindValue(1, $alumno->getNombre());
            $stmt->bindValue(2, $alumno->getApellidos());
            $stmt->bindValue(3, $alumno->getEmail());
            $stmt->bindValue(4, $alumno->getEdad());
            $stmt->bindValue(5, $alumno->getLocalidad());
            $stmt->bindValue(6, $alumno->getTelefono());
            $stmt->bindValue(7, $alumno->getId());
            $stmt->execute();

            $conexion->cerrarConexion();
        }

        public static function getMatriculas($idAlumno) {

            $conexion = new ConexionBD();

            //Hacer consulta BBDD para obtener todos los módulos
            $stmt = $conexion->getConexion()->prepare("SELECT mo.* FROM matriculas as ma  
                        JOIN modulos as mo
                        WHERE mo.id = ma.modulo_id AND alumno_id = ?");
            $stmt->bindValue(1, $idAlumno);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Modulos\modelos\Modulo');
            $stmt->execute(); //La ejecución de la consulta
            $modulos = $stmt->fetchAll();

            $conexion->cerrarConexion();

            return $modulos;
        }

        public static function getModulosNoMatriculados($idAlumno) {

            $conexion = new ConexionBD();

            //Hacer consulta BBDD para obtener todos los módulos
            $stmt = $conexion->getConexion()->prepare("SELECT mo.* FROM modulos as mo
                        WHERE mo.id NOT IN (
                                SELECT mo.id FROM matriculas as ma  
                                JOIN modulos as mo
                                WHERE mo.id = ma.modulo_id AND ma.alumno_id = ?
                            )
                        ");
            $stmt->bindValue(1, $idAlumno);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Modulos\modelos\Modulo');
            $stmt->execute(); //La ejecución de la consulta
            $modulos = $stmt->fetchAll();

            $conexion->cerrarConexion();

            return $modulos;
        }

        public static function matricular($moduloId, $alumnoId) {
            $conexion = new ConexionBD();

            //Hacer consulta BBDD para obtener todos los módulos
            $stmt = $conexion->getConexion()->prepare("INSERT INTO matriculas  
                (alumno_id, modulo_id, convocatoria) VALUES (?,?)");
            $convocatoria = 1;
            $stmt->bindValue(1, $alumnoId);
            $stmt->bindValue(2, $moduloId);
            $stmt->bindValue(3, $convocatoria);

            $stmt->execute();

            $conexion->cerrarConexion();
        }

        public static function deleteMatricula($idAlumno, $idModulo) {
            $conexion = new ConexionBD();

            //Hacer consulta BBDD para obtener todos los módulos
            $stmt = $conexion->getConexion()->prepare("DELETE FROM matriculas
                        WHERE alumno_id = ? AND modulo_id = ?");
            $stmt->bindValue(1, $idAlumno);
            $stmt->bindValue(2, $idModulo);
            $stmt->execute();

            $conexion->cerrarConexion();
        }


    }
