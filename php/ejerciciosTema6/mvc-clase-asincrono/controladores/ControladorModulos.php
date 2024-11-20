<?php

    namespace Modulos\controladores;

    use Modulos\vistas\VistaLogin;
    use Modulos\vistas\VistaModulos;
    use Modulos\modelos\ModeloModulos;
    use Modulos\vistas\VistaModulosFormUpdate;

    class ControladorModulos
    {

        /**
         * Método que muestra todos los módulos
         */
        public static function mostrarModulos()
        {
            //Llamar modelo para pedir los módulos
            $modulos = ModeloModulos::getAll(); //array de objetos

            //Llamar a la vista pasándole los módulos a pintar
            VistaModulos::render($modulos);
        }

        public static function mostrarInicio()
        {
            //Llamar modelo para pedir los módulos
            $modulos = ModeloModulos::getAll(); //array de objetos

            //Llamar a la vista pasándole los módulos a pintar
            VistaModulos::renderInicio($modulos);
        }

        /**
         * Inserta un objeto Modulo en la BBDD
         * @param $modulo
         * @return void
         */
        public static function nuevoModulo($modulo) {
            //Insertar BBDD
            ModeloModulos::insertModulo($modulo);

            //Volver a pintar todos los móoulos
            header("Location: index.php");
        }

        public static function borrarModulo($id) {
            //Borrar Modulo por id BBDD
            ModeloModulos::deleteModulo($id);

            //Mostrar de nuevo todos los módulos
            $modulos = ModeloModulos::getAll(); //array de objetos
            VistaModulos::render($modulos);
        }

        public static function mostrarFormUpdateModulo($id) {
            //Obtener modulo por id
            $modulo = ModeloModulos::getById($id);

            VistaModulosFormUpdate::render($modulo);
        }

        public static function modificarModulo($modulo) {
            //Insertar BBDD
            ModeloModulos::updateModulo($modulo);

            //Volver a pintar todos los móoulos
            header("Location: index.php?accion=mostrarModulos");
        }



    }
