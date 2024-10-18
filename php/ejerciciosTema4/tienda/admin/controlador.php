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

        //Formulario de insertar producto --------------------------------------------
        if (isset($_POST['nuevoProducto'])) {
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $categoria = $_POST['categoria'];
            $descripcion = $_POST['descripcion'];
            
            //Subir imagen 
            $directorioSubida = "../web/img/";
            $extensionesValidas = array("jpg", "png", "gif"); 
            $nombreArchivo = $_FILES['imagen']['name'];
            $directorioTemp = $_FILES['imagen']['tmp_name'];
            $tipoArchivo = $_FILES['imagen']['type'];
            $arrayArchivo = pathinfo($nombreArchivo);
            $extension = $arrayArchivo['extension'];
            // Comprobamos la extensión del archivo
            if(!in_array($extension, $extensionesValidas)){
                header("Location: index.php?error=ImagenIncorrecta");
            }

            //Insertar producto en BBDD
            $id = insertarProducto($nombre, $precio, $categoria, $descripcion, $extension);

            //Una vez insertado el producto ya puedo generar el nombre de la
            //imagen y moverla a la carpeta adecuada
            $nombre = "img".$id;
            $nombreCompleto = $directorioSubida.$nombre.".".$extension;
            move_uploaded_file($directorioTemp, $nombreCompleto);

            header("Location: index.php");
        }
    }

    if ($_GET) {
        if (isset($_GET['accion'])) {

            //Cerrar sesión
            if (strcmp($_GET['accion'],'cerrar') == 0) {
                session_destroy();
                header("Location: index.php");
            }

            //Borrar producto
            if (strcmp($_GET['accion'],'borrarProducto') == 0) {
                $id = $_GET['id'];
                borrarProducto($id);
                header("Location: index.php");
            }

            //Modificar producto
            if (strcmp($_GET['accion'],'modifProducto') == 0) {
                $id = $_GET['id'];
                header("Location: modificarProducto.php?id=".$id);
            }



        }
    }