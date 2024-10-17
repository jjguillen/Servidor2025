<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiEmpresa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body class="d-flex flex-column h-100">
    
<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="index.php" class="nav-link px-2 link-dark">Home</a></li>
        <li><a href="productos.php" class="nav-link px-2 link-dark">Productos</a></li>
        <li><a href="carro.php" class="nav-link px-2 link-dark">Carro</a></li>
        <li><a href="acerca.php" class="nav-link px-2 link-dark">Acerca</a></li>
      </ul>

      <div class="col-md-3 text-end">
<?php
    if (isset($_SESSION['usuario']['email'])) {
      echo "<span>".$_SESSION['usuario']['email']."</span>";
    } else {
      echo '<a href="../admin/login.php" class="btn btn-primary active me-1" role="button" aria-pressed="true">Login</a>';
      echo '<a href="../admin/registro.php" class="btn btn-primary active" role="button" aria-pressed="true">Registro</a>';
    }
?>
        <a href="controlador.php?accion=cerrarSesion" class="btn btn-primary active" role="button" aria-pressed="true">Cerrar</a>
      </div>
    </header>