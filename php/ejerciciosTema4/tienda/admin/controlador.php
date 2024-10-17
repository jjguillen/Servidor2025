<?php
    session_start();
    include("modelo.php");

    //Formularios
    if ($_POST) {
        //Cada formulario se distingue por su name del botón submit 

        //Formulario de registro --------------------------------------------
        if (isset($_POST['registro'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $movil = $_POST['movil'];
            $ciudad = $_POST['ciudad'];
            $fechaN = $_POST['fechaN'];

            //Consultar si el email está ya registrado
            if (consultarUsuarioPorEmail($email)) {
                header("Location: registro.php?error=yaRegistrado");
            } else {
                //Registrar el usuario en BBDD
                registrarUsuario($email, $password, $nombre, $apellidos, $movil, $ciudad, $fechaN);

                //Si ha funcionado bien lo metemos en la sesión
                $_SESSION['usuario'] = array("email" => $email, "rol" => "user");
                header("Location: ../web/index.php"); //Usuario nuevo registrado
            } 
        }

        //Formulario de login --------------------------------------------
        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            //Consultar si el email está registrado
            if (consultarUsuarioPorEmail($email)) {
                //Comprobar password
                $datos = consultarRolHash($email);
                $passwordHash = $datos['password'];
                if (password_verify($password, $passwordHash)) {
                    //Verificar rol
                    if (strcmp($datos['rol'],"admin") == 0) {
                        $_SESSION['usuario'] = array("email" => $email, "rol" => "admin");
                        header("Location: index.php"); //Usuario admin logueado
                    } else {
                        $_SESSION['usuario'] = array("email" => $email, "rol" => "user");
                        header("Location: ../web/index.php"); //Usuario web logueado
                    }
                } else {
                    header("Location: login.php?error=errorLogin");
                }

            } else {
                header("Location: login.php?error=errorLogin");
            }
        }
    }

    if ($_GET) {
        if (isset($_GET['accion'])) {

            //Cerrar sesión
            if (strcmp($_GET['accion'],'cerrar') == 0) {
                session_destroy();
                header("Location: index.php");
            }




        }
    }