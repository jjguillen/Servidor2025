<?php

    namespace Modulos\controladores;

    use Modulos\vistas\VistaModulos;
    use Modulos\modelos\ModeloModulos;

    class ControladorModulos
    {

        /**
         * Método que muestra la página principal de bienvenida
         */
        public static function mostrarInicioView()
        {
            //Llamar modelo para pedir los módulos
            $modulos = ModeloModulos::getAll();

            //Llamar a la vista pasándole los módulos a pintar
            VistaModulos::render($modulos);
        }

    }
