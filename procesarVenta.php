<?php
require_once("header.php");
require_once("BD/Conexion.php");
$nombreC=isset($_POST['nombrec'])?$_POST['nombrec']:header("location:consulta.php");
$precioC=$_POST['precio'];
$numeroT=$_POST['cuenta'];
$cantidad=$_POST['cantidad'];

$idc=$_SESSION['id'];
$texto="";
$conect= new Conexion();
$texto=$conect->realizarVenta($idc,$cantidad,$nombreC);



?>
<div class="container">
    <div class="alert-info text-center">
        <h1 class="card-title" >
            <?php echo "$texto" ?>
        </h1>
        <hr>
        <a href="consulta.php">Volver a Wallet</a>
    </div>


</div>