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

        public static function deleteFavorito($id) {
            ModeloSeries::delete($id);
        }

        public static function getComentarios($id) {
            echo ModeloSeries::getComentarios($id);
        }

        public static function addComentario($nick, $texto, $idSerie) {
            ModeloSeries::addComentario($nick, $texto, $idSerie);
        }


    }
