<?php

function pintar($array) {
    echo "<br>";
    foreach($array as $valor) {
        echo " ".$valor;
    }
}

$comb = array();
for($i=0; $i<6; $i++) {
    do {
        $num = rand(1,49);
    } while( in_array($num, $comb) );
    $comb[] = $num; //array_push($comb, $num);

}

sort($comb);
pintar($comb);


?>