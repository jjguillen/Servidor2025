<?php

    namespace Modulos\modelos;

    use Modulos\modelos\Alumno;
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


    }
