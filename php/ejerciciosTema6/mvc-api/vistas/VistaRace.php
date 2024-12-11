<?php

namespace Race\vistas;

class VistaRace {

    public static function render() {

        include "cabecera.php";

        echo '<div id="principal"></div>';

        include "pie.php";
        include "script.php";
    }

    public static function renderPilotos($pilotos) {

        include "cabecera.php";

        echo '<div id="principal">';

        echo "
            <h2>Mis Pilotos</h2>
                <div class='table-responsive small'>
                    <table class='table table-striped table-sm'>
                        <thead>
                        <tr>
                            <th scope='col'>Nombre</th>
                            <th scope='col'>Escudería</th>
                            <th scope='col'>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
        ";

        foreach ($pilotos as $piloto) {
            echo "<tr>";
            echo "<td>" . $piloto->getNombre() . "</td>";
            echo "<td>" . $piloto->getEscuderia() . "</td>";
            echo "<td></td>";
            echo "</tr>";
        }

        echo "</tbody></table></div>";

        echo '</div>';

        include "pie.php";
    }

}
