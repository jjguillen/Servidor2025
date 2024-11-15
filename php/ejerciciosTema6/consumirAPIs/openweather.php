<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APIs</title>

</head>
<body>
    <div class='container'>

        <h3 class='mb-3'>Predicción tiempo Cuevas de Almanzora</h3>

        <div class='row'>
    
<?php

//$uri = "https://www.googleapis.com/books/v1/volumes?q=".urlencode($_GET['titulo']); 
//$uri = "https://api.openweathermap.org/data/3.0/onecall?lat=37.296944&lon=-1.879722&appid=f222971d012d14db362d4b5ca00c754f";
$uri = "https://api.openweathermap.org/data/2.5/weather?lat=37.29223804597023&lon=-1.8773787801395931&units=metric&appid=f222971d012d14db362d4b5ca00c754f";
$reqPrefs['http']['method'] = 'GET';
//$reqPrefs['http']['header'] = 'X-Auth-Token: ';
$stream_context = stream_context_create($reqPrefs);
$resultado = file_get_contents($uri, false, $stream_context);

//Pasar de json a objeto php y recorrer los resultados
if ($resultado != false) {
    $respPHP = json_decode($resultado);

    echo $respPHP->main->temp . "<br>";
    echo $respPHP->name . "<br>";
    echo "<img width='100px' src='https://openweathermap.org/img/wn/".$respPHP->weather[0]->icon."@2x.png'>";


}


?>
        
        </div>

    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</body>
</html>

