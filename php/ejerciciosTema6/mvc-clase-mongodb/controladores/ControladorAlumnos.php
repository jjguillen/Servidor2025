<?php

    namespace ModulosMG\controladores;

    use ModulosMG\vistas\VistaAlumnos;
    use ModulosMG\vistas\VistaMatriculas;
    use ModulosMG\modelos\ModeloAlumnos;
    use ModulosMG\vistas\VistaAlumnosFormUpdate;
    use ModulosMG\vistas\VistaModulos;
    use ModulosMG\vistas\VistaModulosMatricular;

    class ControladorAlumnos
    {

        /**
         * Método que muestra todos los módulos
         */
        public static function mostrarAlumnos()
        {
            $alumnos = ModeloAlumnos::getAll();
            VistaAlumnos::render($alumnos);
        }


        /**
         * Inserta un objeto Alumno en la BBDD
         * @param $modulo
         * @return void
         */
        public static function nuevoAlumno($alumno) {
            //Insertar BBDD
            ModeloAlumnos::insertAlumno($alumno);

            //Volver a pintar todos los móoulos
            header("Location: index.php?accion=mostrarAlumnos");
        }

        public static function borrarAlumno($id) {
            ModeloAlumnos::deleteAlumno($id);
            ControladorAlumnos::mostrarAlumnos();
        }

        public static function mostrarFormUpdateAlumno($id) {
            //Obtener modulo por id
            $alumno = ModeloAlumnos::getById($id);

            VistaAlumnosFormUpdate::render($alumno);
        }

        public static function modificarAlumno($alumno) {
            ModeloAlumnos::updateAlumno($alumno);
            header("Location: index.php?accion=mostrarAlumnos");
        }

        public static function verMatriculas($id) {
            $alumno = ModeloAlumnos::getById($id);
            $modulosMatric = ModeloAlumnos::getMatriculas($id);
            VistaMatriculas::render($modulosMatric, $alumno);
        }

        public static function verModulosNoMatriculado($id) {
            $alumno = ModeloAlumnos::getById($id);
            $modulosNoMatric = ModeloAlumnos::getModulosNoMatriculados($id);
            VistaModulosMatricular::render($modulosNoMatric, $alumno);
        }

        public static function matricular($modulosIds, $idAlumno) {
            foreach($modulosIds as $moduloId) {
                ModeloAlumnos::matricular($moduloId, $idAlumno);
            }
            header("Location: index.php?accion=verMatriculas&id=".$idAlumno);
        }

        public static function borrarMatricula($idAlumno, $idModulo) {
            ModeloAlumnos::deleteMatricula($idAlumno, $idModulo);
            header("Location: index.php?accion=verMatriculas&id=".$idAlumno);
        }



    }
