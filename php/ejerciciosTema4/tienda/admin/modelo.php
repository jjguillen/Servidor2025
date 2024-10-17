<?php
//Funciones relativas a BBDD ---------------------------------

/**
 * Crear una conexión a BBDD y devolverla
 */
function conectarBD() {
    $dbh = null;
    //Metemos en la sesión la conexión a BBDD
    try {
        //host->nombre del contenedor mariadb y el puerto interno entre contenedores de mariadb
        $dsn = "mysql:host=mariadb:3306;dbname=ejemplo";
        $dbh = new PDO($dsn, "usuario", "usuario");
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e){
        echo "ERROR CONEXION " . $e->getMessage();
    }
        
    return $dbh;
}

/**
 * Consultar si un email está registrado ya
 */
function consultarUsuarioPorEmail($email) {
    $dbh = conectarBD();
    
    $stmt = $dbh->prepare("SELECT * FROM usuarios WHERE email=:email");
    $stmt->bindParam(":email", $email);
    $stmt->setFetchMode(PDO::FETCH_ASSOC); //Nos devuelve los resultados como array asociativo
    $stmt->execute(); //La ejecución de la consulta
    
    $dbh = null;

    // Mostramos los resultados, fetch() devuelve una fila cada vez que lo llamamos
    if ($row = $stmt->fetch()){  //Select es sobre un campo UNIQUE solo va a devolver 1 o nada
        return 1;
    } else {
        return 0;
    }
}

/**
 * Devolver rol y el hash de un usuario por email
 */
function consultarRolHash($email) {
    $dbh = conectarBD();
    
    $stmt = $dbh->prepare("SELECT rol,password FROM usuarios WHERE email=:email");
    $stmt->bindParam(":email", $email);
    $stmt->setFetchMode(PDO::FETCH_ASSOC); //Nos devuelve los resultados como array asociativo
    $stmt->execute(); //La ejecución de la consulta
    
    $dbh = null;

    // Devuelve el password como hash del usuario con ese email
    if ($row = $stmt->fetch()){  
        return $row;
    } else {
        return 0;
    }
}


function registrarUsuario($email, $password, $nombre, $apellidos, $movil, $ciudad, $fechaN) {

    $dbh = conectarBD();
    
    $stmt = $dbh->prepare("INSERT INTO usuarios (email, password, nombre, apellidos, ciudad, movil, fecha_nacimiento, rol)
     VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    if (strcmp($fechaN, "") == 0) {
        $fechaN = "2000-01-01";
    }

    $rol = "user"; 

    $passwordHash = password_hash($password, PASSWORD_BCRYPT);
    $stmt->bindParam(1, $email);
    $stmt->bindParam(2, $passwordHash);
    $stmt->bindParam(3, $nombre);
    $stmt->bindParam(4, $apellidos);
    $stmt->bindParam(5, $ciudad);
    $stmt->bindParam(6, $movil);
    $stmt->bindParam(7, $fechaN);
    $stmt->bindParam(8, $rol);
    $stmt->execute(); //La ejecución de la consulta
    
    $dbh = null;
}




?>