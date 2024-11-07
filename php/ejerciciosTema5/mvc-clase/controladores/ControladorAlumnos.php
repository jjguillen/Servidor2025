<?php

    namespace Modulos\controladores;

    use Modulos\vistas\VistaAlumnos;
    use Modulos\modelos\ModeloAlumnos;
    use Modulos\vistas\VistaAlumnosFormUpdate;

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


    }
