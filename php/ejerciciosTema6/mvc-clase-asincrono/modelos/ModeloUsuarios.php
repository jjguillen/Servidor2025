<?php

    namespace Modulos\modelos;

    use Modulos\modelos\Usuario;
    use \PDO;

    class ModeloUsuarios {


        public static function getPassword($email) {

            $conexion = new ConexionBD();

            $stmt = $conexion->getConexion()->prepare("SELECT * FROM usuarios 
                        WHERE email = ?");
            $stmt->bindValue(1, $email);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Modulos\modelos\Usuario');
            $stmt->execute(); //La ejecución de la consulta
            $usuario = $stmt->fetch();

            $conexion->cerrarConexion();

            return $usuario;
        }






    }
