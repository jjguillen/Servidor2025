<?php include "cabecera.php"; ?>

    <?php
        $compra = array(
            array("nombre" => "Caja Galletas", "Cantidad" => 1),
            array("nombre" => "Manzanas", "Cantidad" => "1 kilo"),
            array("nombre" => "Leche", "Cantidad" => "3 litros")
        );

    ?>

    <h2 class='text-primary'>Lista de la compra</h2>
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
<?php

        foreach($compra as $producto) {
            echo "<tr>";
            foreach($producto as $valor) {
                echo "<td>{$valor}</td>";
                /*
                list($prod, $cantid) = $producto;
                $prod = $producto["nombre"];
                $cantid = $producto["Cantidad"];
                */
            }
            echo "</tr>";
        }

?>        

<?php include "pie.php" ?>