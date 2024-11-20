<?php

    namespace Modulos;

    session_start();
    //session_destroy();

    use DeepRacer\modelos\ModeloUsuarios;
    use Modulos\controladores\ControladorModulos;
    use Modulos\controladores\ControladorAlumnos;
    use Modulos\controladores\ControladorUsuarios;
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

        //Borrar modulo - AHORA SE QUITA
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

        //Login
        if (strcmp($_REQUEST["accion"], "login") == 0) {
            ControladorUsuarios::mostrarLogin("");
        }

        //Cerrar
        if (strcmp($_REQUEST["accion"], "cerrar") == 0) {
            unset($_SESSION['usuario']);
            ControladorUsuarios::mostrarLogin("");
        }

        //verMatriculas
        if (strcmp($_REQUEST["accion"], "verMatriculas") == 0) {
            $id = $_REQUEST['id'];
            ControladorAlumnos::verMatriculas($id);
        }

        //Matricular alumno en módulos
        if (strcmp($_REQUEST["accion"], "matricular") == 0) {
            $idAlumno = $_REQUEST['idAlumno'];
            ControladorAlumnos::verModulosNoMatriculado($idAlumno);
        }

        //Matricular alumno en módulos
        if (strcmp($_REQUEST["accion"], "borrarMatricula") == 0) {
            $idAlumno = $_REQUEST['idAlumno'];
            $idModulo = $_REQUEST['idModulo'];
            ControladorAlumnos::borrarMatricula($idAlumno, $idModulo);
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
        if (isset($_POST['login'])) {
            ControladorUsuarios::login($_POST['email'], $_POST['password']);
        }
        if (isset($_POST['matricular'])) {
            //Recoger ids de módulos en los que no está matriculado
            $modulosIds = $_POST['matriculas'];
            $idAlumno = $_POST['idAlumno'];
            ControladorAlumnos::matricular($modulosIds, $idAlumno);
        }


    } else {
        //Página de inicio
        if (isset($_SESSION['usuario'])) {
            //Inicio de la app
            ControladorModulos::mostrarInicio();
        } else {
            //Formulario de login
            ControladorUsuarios::mostrarLogin("");
        }

    }

