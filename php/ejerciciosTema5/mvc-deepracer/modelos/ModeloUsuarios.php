<?php

    namespace DeepRacer\modelos;
    use DeepRacer\modelos\ConexionBaseDeDatos;
    use DeepRacer\modelos\Usuario;
    use \PDO;

    class ModeloUsuarios {


        public static function checkLogin($email) {

            $conexionObject = new ConexionBaseDeDatos();
            $conexion = $conexionObject->getConexion();
            $consulta = $conexion->prepare("SELECT * FROM usuarios WHERE email=?");
            $consulta->bindValue(1,$email);
            $consulta->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'DeepRacer\modelos\Usuario'); //Nombre de la clase
            $consulta->execute();
    
            $resultado = $consulta->fetch();

            $conexionObject->cerrarConexion();

            return $resultado;

        }

      

    }