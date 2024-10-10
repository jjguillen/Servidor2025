<?php
    include("cabecera.php");

    //Ejemplo de simular que los usuarios están en la sesión, pero deberían venir de BBDD
    $_SESSION['usuarios'] = array(
        array("nombre" => "Luis", "email" => "luis@gmail.com", "password" => "12345678"),
        array("nombre" => "Javi", "email" => "javi@gmail.com", "password" => "12345678"),
        array("nombre" => "Ana", "email" => "ana@gmail.com", "password" => "12345678"),
        array("nombre" => "Cati", "email" => "cati@gmail.com", "password" => "12345678"),
        array("nombre" => "Gregorio", "email" => "gregor@gmail.com", "password" => "12345678")
    );

    $_SESSION['productos'] = array(
        array("id" => 1, "nombre" => "Reloj Garmin", "categoria" => "relojes", "precio" => 250, "img" => "img1.jpg"),
        array("id" => 2,"nombre" => "Nintendo Switch Oled", "categoria" => "consolas", "precio" => 350, "img" => "img2.jpg"),
        array("id" => 3,"nombre" => "Iphone 16", "categoria" => "moviles", "precio" => 950, "img" => "img3.jpg"),
        array("id" => 4,"nombre" => "Teclado Logitech", "categoria" => "teclados", "precio" => 150, "img" => "img4.jpg"),
        array("id" => 5,"nombre" => "Google Pixel 9", "categoria" => "moviles", "precio" => 850, "img" => "img5.jpg"),
        array("id" => 6,"nombre" => "Reloj Amazfit", "categoria" => "relojes", "precio" => 250, "img" => "img6.jpg"),
        array("id" => 7,"nombre" => "Iphone 15", "categoria" => "moviles", "precio" => 750, "img" => "img7.jpg"),
        array("id" => 8,"nombre" => "Ratón Logitech", "categoria" => "ratones", "precio" => 50, "img" => "img8.jpg")
    );

    
?>

    <main class="flex-shrink-0">
        <div class="container">

            <h1>Home</h1>

    

        </div>
    </main>

<?php
    include("pie.php");
?>
