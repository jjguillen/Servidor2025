<?php
    include("cabecera.php");

?>

    <main class="flex-shrink-0">
        <div class="container">

            <h1>Productos</h1>

            <div class='row'>

<?php
    foreach($_SESSION['productos'] as $producto) {
                echo "<div class='col'>";
            
                echo '
                <div class="card" style="width: 18rem;">
                    <img src="img/'.$producto['img'].'" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">'.$producto['nombre'].'</h5>
                        <p class="card-text">'.$producto['precio'].'</p>
                        <a href="controlador.php?accion=addCarro&id='.$producto['id'].'" class="btn btn-primary">Añadir</a>
                    </div>
                </div>';

                echo "</div>";
    }

?>
            </div>

        </div>
    </main>

<?php
    include("pie.php");
?>