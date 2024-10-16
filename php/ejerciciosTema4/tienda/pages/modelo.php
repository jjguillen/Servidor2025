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


function consultarUsuarioPorEmamil($email) {
    $dbh = conectarBD();
    
    $stmt = $dbh->prepare("SELECT * FROM usuarios WHERE email=:email");
    $stmt->bindParam(":email", $email);
    $stmt->setFetchMode(PDO::FETCH_ASSOC); //Nos devuelve los resultados como array asociativo
    $stmt->execute(); //La ejecución de la consulta
    
    // Mostramos los resultados, fetch() devuelve una fila cada vez que lo llamamos
    if ($row = $stmt->fetch()){  //Select es sobre un campo UNIQUE solo va a devolver 1 o nada
        echo "Nombre: {$row["nombre"]} <br>";
        echo "Ciudad: {$row["ciudad"]} <br><br>";
    } else {
        echo "No encontrado";
    }

    $dbh = null;

}















?>