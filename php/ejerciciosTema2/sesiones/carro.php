<?php
    include("cabecera.php");

    if (isset($_SESSION['cosa'])) {
        echo $_SESSION['cosa'];
    }
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
                </tr>
<?php
    foreach($_SESSION['carro'] as $producto) {
            echo "<tr>";
            echo "<td>{$producto['nombre']}</td>";
            echo "<td>{$producto['precio']}</td>";
            echo "<td>{$producto['cantidad']}</td>";
            echo "<td>". ($producto['precio'] * $producto['cantidad']) ."</td>";
            echo "</tr>";
    }

?>

            </table>
        </div>
    </main>

<?php
    include("pie.php");
?>