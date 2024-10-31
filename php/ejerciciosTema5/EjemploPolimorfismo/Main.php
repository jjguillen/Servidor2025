<?php
    session_start();

    spl_autoload_register(function ($clase) {
        $ruta = './' . $clase . '.php';
        if (file_exists($ruta)){
            include_once $ruta;
            return true;
        }

        $ruta = './modelos/' . $clase . '.php';
        if (file_exists($ruta)){
            include_once $ruta;
            return true;
        }

        //Repetir si hubiera otra carpeta donde buscar las clases
    });

    $usuario = new UsuarioBanco("Pepe", "209209348024");
    $tarD1 = new TarjetaDebito("0001-D", 100, 200);
    $tarD2 = new TarjetaDebito("0001-D", 2000, 200);
    $tarC1 = new TarjetaCredito("0001-D", 200, 10);
    $usuario->addTarjeta($tarD1);
    $usuario->addTarjeta($tarD2);
    $usuario->addTarjeta($tarC1);

    $tarC1->retirarSaldo(300);
    $tarD1->retirarSaldo(20);
    $tarD1->retirarSaldo(120);
    $tarD2->retirarSaldo(200);

    $usuario->mostrarInfoTarjetas();

    $_SESSION['usuario'] = $usuario;

    echo $_SESSION['usuario'];






