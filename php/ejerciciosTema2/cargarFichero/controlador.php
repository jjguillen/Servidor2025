<?php

$nombre = $_POST['nombre'];

$directorioSubida = "files/";
//$max_file_size = "51200";
$extensionesValidas = array("jpg", "png", "gif", "pdf");

if(isset($_POST["upload"]) && isset($_FILES['fichero'])){

    $nombreArchivo = $_FILES['fichero']['name'];
    $directorioTemp = $_FILES['fichero']['tmp_name'];
    $tipoArchivo = $_FILES['fichero']['type'];

    $arrayArchivo = pathinfo($nombreArchivo);
    $extension = $arrayArchivo['extension'];
    // Comprobamos la extensión del archivo
    if(!in_array($extension, $extensionesValidas)){
        echo "La extensión del archivo no es válida o no se ha subido ningún archivo";
    }

    //Seguridad para asegurar que es un pdf por mime type
    if (! es_pdf($directorioTemp)) {
        echo "No es un pdf";
    } else {
        $nombreCompleto = $directorioSubida.$nombre.".".$extension;
        move_uploaded_file($directorioTemp, $nombreCompleto);
        echo "El archivo se ha subido correctamente";
    }

}

function es_pdf($archivo){
    $mimeinfo = finfo_open(FILEINFO_MIME);
    if(!$mimeinfo){
        return false;
    } else {
        $mimereal = finfo_file($mimeinfo, $archivo);
        if(strpos($mimereal, 'application/pdf') !== 0) {
            return false;
        }else{
            return true;
        }
    }
}

?>

