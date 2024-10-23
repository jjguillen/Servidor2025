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
        $dsn = "mysql:host=mariadb:3306;dbname=ejemplo;charset=utf8mb4";
        $dbh = new PDO($dsn, "usuario", "usuario");
        //$dsn = "mysql:host=database-1.cqfkabeyeaab.us-east-1.rds.amazonaws.com:3306;dbname=tienda;charset=utf8mb4";
        //$dbh = new PDO($dsn, "admin", "BKH32Tx6iUM9O4noQn5y");
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
    
    $stmt = $dbh->prepare("SELECT rol,password,id FROM usuarios WHERE email=:email");
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

    //En lugar de guardar password en claro, guardamos un hash del password
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
    
    $id = $dbh->lastInsertId();

    $dbh = null;

    return $id;
}

/**
 * Devuelve en un array asociativo todos los productos que haya
 */
function consultarProductos() {
    $dbh = conectarBD();
    
    $stmt = $dbh->prepare("SELECT * FROM productos");
    $stmt->execute(); //La ejecución de la consulta
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC); //array

    $dbh = null;

    return $productos;
}

/**
 * Borra un producto dado por su id
 */
function borrarProducto($id) {
    $dbh = conectarBD();
    
    $stmt = $dbh->prepare("DELETE FROM productos WHERE id = ?");
    $stmt->bindParam(1, $id);
    $stmt->execute(); //La ejecución del delete

    $dbh = null;
}


/**
 * Insertar producto, la imagen la generamos como img<id>.jpg
 */
function insertarProducto($nombre, $precio, $categoria, $descripcion, $extension) {
    $dbh = conectarBD();
    $imagen = " ";

    $stmt = $dbh->prepare("INSERT INTO productos (nombre, precio, imagen, categoria, descripcion)
        VALUES (?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $nombre);
    $stmt->bindParam(2, $precio);
    $stmt->bindParam(3, $imagen);  //img<id>.jpg
    $stmt->bindParam(4, $categoria);
    $stmt->bindParam(5, $descripcion);
    $stmt->execute(); //La ejecución del insert

    $id = $dbh->lastInsertId();
    $imagen = "img".$id.".".$extension;
    $stmt = $dbh->prepare("UPDATE productos SET imagen=? WHERE id=?");
    $stmt->bindParam(1, $imagen);
    $stmt->bindParam(2, $id);
    $stmt->execute();

    $dbh = null;

    return $id; //Para luego subir la imagen a la carpeta img con el nombre (con id) correspondiente
}

/**
 * Devuelve un producto consultado por id
 */
function consultarProducto($id) {
    $dbh = conectarBD();
    
    $stmt = $dbh->prepare("SELECT * FROM productos WHERE id=?");
    $stmt->bindParam(1, $id);
    $stmt->execute(); //La ejecución de la consulta

    $producto = $stmt->fetch();
    
    $dbh = null;

    return $producto;
}


function modificarProducto($nombre, $precio, $categoria, $descripcion, $id) {
    $dbh = conectarBD();
    
    $stmt = $dbh->prepare("UPDATE productos SET nombre=?, precio=?, categoria=?, descripcion=?
    WHERE id=?");
    $stmt->bindParam(1, $nombre);
    $stmt->bindParam(2, $precio);
    $stmt->bindParam(3, $categoria);
    $stmt->bindParam(4, $descripcion);
    $stmt->bindParam(5, $id);
    $stmt->execute(); //La ejecución de la consulta
    
    $dbh = null;
}

function modificarProductoImagen($nombre, $precio, $categoria, $descripcion, $extension, $id) {
    $dbh = conectarBD();
    
    $stmt = $dbh->prepare("UPDATE productos SET nombre=?, precio=?, categoria=?, descripcion=?, imagen=? 
    WHERE id=?");
    $stmt->bindParam(1, $nombre);
    $stmt->bindParam(2, $precio);
    $stmt->bindParam(3, $categoria);
    $stmt->bindParam(4, $descripcion);
    $imagen = "img".$id.".".$extension;
    $stmt->bindParam(5, $imagen);
    $stmt->bindParam(6, $id);
    $stmt->execute(); //La ejecución de la consulta
    
    $dbh = null;
}


function realizarPedido($carro, $idUsuario) {
    //Calcular total del carro
    $total = 0;
    foreach($carro as $lineaCarro) {
        $total += $lineaCarro['precio'] * $lineaCarro['cantidad'];
    }

    //Fecha actual
    $fecha = date("Y-m-d");

    $dbh = conectarBD();

    //Iniciamos transacción para añadir pedido y las líneas de pedido correspondientes
    $dbh->beginTransaction();

    try {
        //Insertar el pedido
        $stmt = $dbh->prepare("INSERT INTO pedidos (id_usuario, fecha, total)
            VALUES (?, ?, ?)");
        $stmt->bindParam(1, $idUsuario);
        $stmt->bindParam(2, $fecha);
        $stmt->bindParam(3, $total); 
        $stmt->execute();
        $idPedido = $dbh->lastInsertId();
        
        //Insertar lineas de pedido
        foreach($carro as $lineaCarro) {
            $stmt = $dbh->prepare("INSERT INTO lineas_pedido (id_pedido, id_producto, cantidad)
            VALUES (?, ?, ?)");
            $stmt->bindParam(1, $idPedido);
            $stmt->bindParam(2, $lineaCarro['id']);
            $stmt->bindParam(3, $lineaCarro['cantidad']); 
            $stmt->execute();
        }

        //Confirmar la transacción
        $dbh->commit();

    } catch (Exception $e){
        $dbh->rollback();
        $dbh = null;
        return true; //error en el insert con transacción
    }


    $dbh = null;
    return false; //no error
}


/**
 * Devuelve en un array asociativo con todos los pedidos
 */
function consultarPedidos() {
    $dbh = conectarBD();
    
    $stmt = $dbh->prepare("SELECT p.id, p.fecha, p.total, u.email 
                           FROM pedidos AS p JOIN usuarios AS u WHERE u.id = p.id_usuario");
    $stmt->execute(); //La ejecución de la consulta
    $pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC); //array

    $dbh = null;

    return $pedidos;
}

/**
 * Devuelve en un array asociativo con todos los pedidos
 */
function consultarPedido($id) {
    $dbh = conectarBD();
    
    $stmt = $dbh->prepare("SELECT p.id, p.fecha, p.total, u.email 
                           FROM pedidos AS p JOIN usuarios AS u WHERE u.id = p.id_usuario 
                           AND p.id = ?");
    $stmt->bindParam(1, $id);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute(); //La ejecución de la consulta
    $pedido = $stmt->fetch(); //un elemento

    $dbh = null;

    return $pedido;
}

/**
 * Devuelve en un array asociativo con todos los pedidos
 */
function consultarLineasPedidos($id) {
    $dbh = conectarBD();
    
    $stmt = $dbh->prepare("SELECT p.nombre, p.precio, lp.cantidad
                        FROM lineas_pedido as lp JOIN productos as p 
                        WHERE id_pedido = ? AND p.id = lp.id_producto");
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $lineas = $stmt->fetchAll(PDO::FETCH_ASSOC); //array

    $dbh = null;

    return $lineas;
}
?>