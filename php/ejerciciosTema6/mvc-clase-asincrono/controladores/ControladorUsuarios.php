<?php
    namespace Modulos\controladores;

    use Modulos\modelos\ModeloUsuarios;
    use Modulos\vistas\VistaLogin;

    class ControladorUsuarios {

        public static function login($email, $password) {
            $usuario = ModeloUsuarios::getPassword($email);
            if (password_verify($password, $usuario->getPassword())) {
                $_SESSION['usuario'] = $usuario->getEmail();
                header("Location: index.php");
            } else {
                ControladorUsuarios::mostrarLogin("Error login");
            }
        }



        public static function mostrarLogin($error) {
            VistaLogin::render($error);
        }

    }
