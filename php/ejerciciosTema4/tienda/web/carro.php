<?php
    include("cabecera.php");

?>

    <main class="flex-shrink-0">
        <div class="container">

            <h1>Carro de la compra</h1>

            <table class="table table-striped">
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
<?php
    $total = 0;
    $contador = 0;
    foreach($_SESSION['carro'] as $producto) {
        echo "<tr>";
        echo "<td>{$producto['nombre']}</td>";
        echo "<td>{$producto['precio']}</td>";
        echo "<td>
            <a href='controlador.php?accion=decremento&posicion={$contador}' class='btn'>-</a>
            {$producto['cantidad']}
             <a href='controlador.php?accion=incremento&posicion={$contador}' class='btn'>+</a>
            </td>";
        echo "<td>". ($producto['precio'] * $producto['cantidad']) ." €</td>";
        echo "<td>
         <a href='controlador.php?accion=eliminarCarro&posicion={$contador}' class='btn btn-danger'>X</a>
        </td>";
        echo "</tr>";
        $total += ($producto['precio'] * $producto['cantidad']);
        $contador++;
    }
    echo "<tr><td colspan='3'>Total</td><td colspan='2'>{$total} €</td></tr>";

    //var_dump($_SESSION['carro']);


?>

            </table>
        </div>
    </main>

<?php
    include("pie.php");
?>