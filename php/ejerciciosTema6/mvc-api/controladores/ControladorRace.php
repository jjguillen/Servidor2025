<?php

namespace Race\controladores;

use Race\vistas\VistaRace;
use Race\modelos\ModeloRace;
use Race\modelos\Piloto;

class ControladorRace
{
    public static function mostrarPilotos() {
        VistaRace::render();
    }

    public static function addPiloto($pn, $ps) {
        $piloto = new Piloto(0, $pn, $ps);
        ModeloRace::addPiloto($piloto);
        //Pintar favoritos
        $pilotos = ModeloRace::getPilotos();
        VistaRace::renderPilotos($pilotos);
    }

    public static function getFavoritos() {
        $pilotos = ModeloRace::getPilotos();
        VistaRace::renderPilotos($pilotos);
    }




}