<?php
    namespace ModulosMG\controladores;

    use ModulosMG\modelos\ModeloUsuarios;
    use ModulosMG\vistas\VistaLogin;

    class ControladorUsuarios {

        public static function login($email, $password) {
            $usuario = ModeloUsuarios::getPassword($email);
            if (strcmp($password, $usuario->getPassword()) == 0) {
                $_SESSION['usuario'] = $usuario->getEmail();
                header("Location: index.php?accion=mostrarModulos");
            } else {
                ControladorUsuarios::mostrarLogin("Error login");
            }
        }



        public static function mostrarLogin($error) {
            VistaLogin::render($error);
        }

    }
