<?php
session_start();

/**
 * Función para buscar un email en los usuarios de la sesión y comprobar el password
 */
function buscar($email, $password) {

    foreach($_SESSION['usuarios'] as $usuario) {
        if (strcmp($usuario['email'],$email) == 0) {
            //Encontrado
            if (strcmp($usuario['password'], $password) == 0) {
                return 1; //Encontrado y con mismo password
            }
        }
    }
    return 0; //No encontrado
}

/**
 * Función para añadir el producto con el id al carro de la compra
 */
function addCarro($idProducto) {

    //Buscar el id en los productos de la sesión 
    foreach($_SESSION['productos'] as $producto) {
        //Buscar el id en los productos de la sesión
        if ($producto['id'] == $idProducto) {
            //Si el carrito está vacío lo creamos y añadimos el producto
            if (!isset($_SESSION['carro'])) {
                $_SESSION['carro'] = array();
                $producto['cantidad'] = 1;
                array_unshift($_SESSION['carro'], $producto);
            } else {
                //Si el carrito ya existe, solo añadimos el producto

                //Si el producto no está en el carro
                if (!in_array($producto['id'], array_column($_SESSION['carro'], 'id'))) {
                    $producto['cantidad'] = 1;
                    array_unshift($_SESSION['carro'], $producto);
                } else {
                    $posicion = array_search($producto['id'], array_column($_SESSION['carro'], 'id'));
                    $_SESSION['carro'][$posicion]['cantidad']++;
                }
                //Si no incrementamos la cantidad
            }
        }
    }

}







?>