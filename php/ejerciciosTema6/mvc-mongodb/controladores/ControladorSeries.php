<?php

    namespace Pelis\controladores;
    use Pelis\modelos\ModeloSeries;

    class ControladorSeries {

        public static function mostrarSeriesAPI() {
            include("vistas/cabecera.php");
            include("vistas/pie.php");
        }

        public static function addFav($id, $name, $image) {
            ModeloSeries::addFav($id,$name, $image);
        }

        public static function getMisSeries() {
            echo ModeloSeries::getMisSeries();
        }




    }
