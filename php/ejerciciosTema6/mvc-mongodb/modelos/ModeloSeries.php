<?php

    namespace Pelis\modelos;

    class ModeloSeries {

        public static function addFav($id,$name, $image) {
            $conexion = ConexionBD::conectar();
            //Comprobar que no hemos insertado esa serie antes
            $serie = $conexion->series->findOne(['id' => $id]);
            if (!isset($serie)) {
                $result = $conexion->series->insertOne(['id' => $id, 'name' => $name, 'image' => $image]);
            }
            //$conexion::cerrar();
        }

        public static function getMisSeries() {
            $conexion = ConexionBD::conectar();
            $series = $conexion->series->find();
            return json_encode($series->toArray());
        }

        public static function delete($id) {
            $conexion = ConexionBD::conectar();
            $conexion->series->deleteOne(['id' => $id]);
        }

        public static function getComentarios($id) {
            $conexion = ConexionBD::conectar();
            $comentarios = $conexion->comentarios->find(['id_serie' => intval($id)]);
            return json_encode($comentarios->toArray());
        }


    }
