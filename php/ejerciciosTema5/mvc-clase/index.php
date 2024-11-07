<?php

    namespace Modulos;

    session_start();

    use Modulos\controladores\ControladorModulos;
    use Modulos\controladores\ControladorAlumnos;
    use Modulos\modelos\Modulo;
    use Modulos\modelos\Alumno;

    /**
     * AUTOLOAD
     */
    spl_autoload_register(function ($class) {
        //echo $class."<br>";
        //echo substr($class, strpos($class,"\\")+1);
        $ruta = substr($class, strpos($class,"\\")+1);
        $ruta = str_replace("\\", "/", $ruta);
        include_once "./" . $ruta . ".php";
    });



    //ENRUTADOR - CONTROLADOR BASE

    //Tratamiento de botones, links
    if (isset($_REQUEST["accion"])) {

        //Mostrar modulos
        if (strcmp($_REQUEST["accion"], "mostrarModulos") == 0) {
            ControladorModulos::mostrarModulos();
        }

        //Borrar modulo
        if (strcmp($_REQUEST["accion"], "borrarModulo") == 0) {
            $id = $_REQUEST['id'];
            ControladorModulos::borrarModulo($id);
        }

        //Modificar modulo
        if (strcmp($_REQUEST["accion"], "modifModulo") == 0) {
            $id = $_REQUEST['id'];
            ControladorModulos::mostrarFormUpdateModulo($id);
        }

        //Mostrar alumnos
        if (strcmp($_REQUEST["accion"], "mostrarAlumnos") == 0) {
            ControladorAlumnos::mostrarAlumnos();
        }

        //Borrar alumno
        if (strcmp($_REQUEST["accion"], "borrarAlumno") == 0) {
            $id = $_REQUEST['id'];
            ControladorAlumnos::borrarAlumno($id);
        }

        //Modificar alumno
        if (strcmp($_REQUEST["accion"], "modifAlumno") == 0) {
            $id = $_REQUEST['id'];
            ControladorAlumnos::mostrarFormUpdateAlumno($id);
        }


    //Tratamiento de forms
    } else if ($_POST != null) {
        if (isset($_POST['nuevoModulo'])) {
            //Recoger datos y llamar al controlador
            $modulo = new Modulo(0,$_POST['nombre'], $_POST['ciclo'],
                $_POST['curso'],$_POST['horas']);
            ControladorModulos::nuevoModulo($modulo);
        }
        if (isset($_POST['modificarModulo'])) {
            //Recoger datos y llamar al controlador
            $modulo = new Modulo($_POST['id'],$_POST['nombre'], $_POST['ciclo'],
                $_POST['curso'],$_POST['horas']);
            ControladorModulos::modificarModulo($modulo);
        }
        if (isset($_POST['nuevoAlumno'])) {
            //Recoger datos y llamar al controlador
            $alumno = new Alumno(0,$_POST['nombre'], $_POST['apellidos'],
                $_POST['email'],$_POST['edad'],$_POST['localidad'],$_POST['telefono']);
            ControladorAlumnos::nuevoAlumno($alumno);
        }
        if (isset($_POST['modificarAlumno'])) {
            //Recoger datos y llamar al controlador
            $alumno = new Alumno($_POST['id'],$_POST['nombre'], $_POST['apellidos'],
                $_POST['email'],$_POST['edad'],$_POST['localidad'],$_POST['telefono']);
            ControladorAlumnos::modificarAlumno($alumno);
        }


    } else {
        //Página de inicio
        if (isset($_SESSION['usuario'])) {
            //Inicio de la app
            ControladorModulos::mostrarModulos();
        } else {
            //Formulario de login
            //ControladorModulos::mostrarLoginView();
            ControladorModulos::mostrarModulos();
        }

    }

