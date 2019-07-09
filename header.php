<?php
session_start();
$nombre = $_SESSION["nombre"] ? $_SESSION["nombre"] : null;

if(!(isset($nombre))){
    header("location:index.php?button='registrar'");
    exit();
}else{
    $apellido=$_SESSION["apellido"];
    $img=$_SESSION["imagen"];
}

?>
<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coinbank</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<?php $button= isset($_GET["button"]) ? $_GET["button"] : null; ?>
<div class="card-header chch">
    <div class="float-left">
        <div class="img-fluid logo">
            <img src="img/descarga.png">
        </div>
    </div>
    <div class="float-right">
        <?php echo"<span id='na'>$nombre $apellido</span>"?>
        <div class="img-fluid">
            <img id="perfil" src="img/perfil.PNG">
        </div>
        <div class="btn btn-primary salir float-right"><a class="btn-link"
                                             href="cerrarSesion.php">Salir</a></div>
    </div>
</div>
