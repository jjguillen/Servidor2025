<?php

    //STRCMP
    $cadena1 = "caballo";
    $cadena2 = "camello";

    echo strcmp($cadena1, $cadena2);

    $cadena1 = "casa";
    $cadena2 = "camello";

    echo strcmp($cadena1, $cadena2);

    $cadena1 = "casa";
    $cadena2 = "casa";

    if (strcmp($cadena1, $cadena2) == 0) {
        echo "<br>Son iguales";
    }

    //STRLEN
    $nombre = "Javier";
    echo "<br>".strlen($nombre);
    for($i=0; $i<strlen($nombre); $i++) {
        echo $nombre[$i] . " - ";              //Las cadenas las puedo acceder como arrays
    }

    //SUBSTR
    $texto = "Hola Mundo";
    echo "<br>".substr($texto, 5);

    //EXPLODE
    $ip = "192.168.1.10";
    $datos = explode(".", $ip);
    foreach($datos as $dato) {
        echo "<br>".$dato;
    }

    //IMPLODE
    $gustos = array("rock", "rockabilly", "garaje");
    $gustos_str = implode("#", $gustos);
    echo "<br>".$gustos_str;

    //STRPOS
    $texto = "En un lugar de la Mancha de cuyo nombre no me acuerdo";
    echo "<br>".strpos($texto, "de");

    if (strpos($texto, "Mancho") > 0) {
        echo "<br>Lo has encontrado";
    }

    //STROTOLOWER STRTOUPPER
    $nombre = "Javier";
    echo "<br>".strtoupper($nombre);

    echo "hola mundo";
?>
