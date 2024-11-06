<?php

include_once "Empleado.php";
include_once "Empresa.php";


$empresa = new Empresa("Cosentino", "Cantoria", "www.cosentino.com", "info@cosentino.es");
echo "Empresa: " . $empresa->getNombre() . "\n";

$empleado = new Empleado("Javier", "Guillén", 30, "jjavierguillen@gmail.com", "jefazo", $empresa);
echo "Empleado: " . $empleado->getNombre() . "<br>";
echo "pertenece a: " . $empleado->getEmpresa()->getWebsite() . "<br>";
echo "tiene de vacaciones: " . Empleado::$diasVacaciones . " días" . "<br>";

$empleado2 = clone $empleado;
echo "Empleado2: " . $empleado2->getNombre() . "<br>";
echo "pertenece a: " . $empleado2->getEmpresa()->getWebsite() . "<br>";
echo "tiene de vacaciones: " . Empleado::$diasVacaciones . " días" . "<br>";





?>