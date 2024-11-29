<?php

    namespace ModulosMG\modelos;

    use ModulosMG\modelos\ConexionBD;

    class ModeloUsuarios {


        public static function getPassword($email) {

            $conexion = ConexionBD::conectar();


            //Select * from usuarios where email = ?

            $usuarioJson = $conexion->usuarios->findOne(['email' => $email]);
            if (!is_null($usuarioJson)) {
                $usuario = new Usuario($usuarioJson->id, $usuarioJson->email, $usuarioJson->password, $usuarioJson->nombre);
            } else {
                return new Usuario();
            }

            ConexionBD::cerrarConexion();

            return $usuario;
        }






    }
