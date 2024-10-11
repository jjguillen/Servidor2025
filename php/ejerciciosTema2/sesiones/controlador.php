<?php
    include("lib.php");

    //Formularios
    if ($_POST) {
        //Cada formulario se distingue por su name del botón submit 

        //Formulario de login --------------------------------------------
        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            //Verificar que el usuario con ese email existe y esa es su contraseña (BBDD)
            if (buscar($email, $password) == 1) {
                $_SESSION['usuario'] = array("email" => $email, "password" => $password);
                header("Location: index.php");
            } else {
                header("Location: formularioLogin.php?error=Error en login");
            }
        }


    }


    //Botones o links
    if ($_GET) {
        //Los botones/links se distingues por un parámetro llamado 'accion'

        if (isset($_GET['accion'])) {

            //Cerrar sesión
            if (strcmp($_GET['accion'], "cerrarSesion") == 0) {
                session_destroy();
                //unset($_SESSION['usuario']);
                header("Location: index.php");
            } 

            //Añadir al carro
            if (strcmp($_GET['accion'], "addCarro") == 0) {
                $id = $_GET['id'];
                addCarro($id);
                header("Location: productos.php");

            } 

            //Eliminar producto del carro
            if (strcmp($_GET['accion'], "eliminarCarro") == 0) {
                $posicion = $_GET['posicion'];
                unset($_SESSION['carro'][$posicion]);
                $_SESSION['carro'] = array_values($_SESSION['carro']); //Para solucionar que unset deja las posiciones
                header("Location: carro.php");

            } 

            //Incrementar cantidad de producto del carro
            if (strcmp($_GET['accion'], "incremento") == 0) {
                $posicion = $_GET['posicion'];
                $_SESSION['carro'][$posicion]['cantidad']++;
                header("Location: carro.php");
            } 

            //Decrementar cantidad de producto del carro
            if (strcmp($_GET['accion'], "decremento") == 0) {
                $posicion = $_GET['posicion'];
                if ($_SESSION['carro'][$posicion]['cantidad'] > 1) {
                    $_SESSION['carro'][$posicion]['cantidad']--;
                } else if ($_SESSION['carro'][$posicion]['cantidad'] == 1) {
                    unset($_SESSION['carro'][$posicion]);
                    $_SESSION['carro'] = array_values($_SESSION['carro']);
                }
                header("Location: carro.php");
            } 
        }

    }





?>