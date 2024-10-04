<?php

    if ($_POST) {

        //Leer form registro
        if (isset($_POST['registro'])) {
            
            echo $_POST['nombre'] . "<br>";
            echo $_POST['apellidos'] . "<br>";
            echo $_POST['email'] . "<br>";
            echo $_POST['telefono'] . "<br>";
            echo $_POST['passwd'] . "<br>";
            echo $_POST['edad'] . "<br>";
            echo $_POST['datosOcultos'] . "<br>";
            
            echo $_POST['comunicacion'] . "<br>";

            if (isset($_POST['fechaAlta'])) {
                echo $_POST['fechaAlta'] . "<br>";
            }

            echo $_POST['sistOperativo'] . "<br>";
            
            //Leer un checkbox - varias opciones
            if (isset($_POST['aficiones'])) {
                foreach($_POST['aficiones'] as $aficion) {
                    echo $aficion . ", ";
                }
                echo "<br>";
            }

            //Check que la edad sea mayor que 18
            $edad = intval($_POST['edad']);
            if ($edad < 18) {
                header('Location: index.php?error=menor18'); //Redireccionar a otra página
            }

        }

        //Leer form login
        if (isset($_POST['login'])) {

            

        }

    }


?>