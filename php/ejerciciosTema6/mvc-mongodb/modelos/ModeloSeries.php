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
            $json = array();
            foreach ($series as $serie) {
                array_push($json, $serie);
            }
            return json_encode($json);
        }


    }
