<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de la compra</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class='container'> 

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
            }
            echo "</tr>";
        }

?>        
        </tbody>
    </table>

    </div>   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>