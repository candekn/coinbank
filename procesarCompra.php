<?php
require_once("header.php");
require_once("BD/Conexion.php");
$nombreC=isset($_POST['nombrec'])?$_POST['nombrec']:header("location:consulta.php");
$precioC=$_POST['precio'];
$numeroT=$_POST['tarjetadecred'];
$cantidad=$_POST['cantidad'];
$precioTotal=$precioC*$cantidad;
$comision=$precioTotal*0.001;
$total= $precioTotal+$comision;
$idc=$_SESSION['id'];
$texto="";
$conect= new Conexion();
$texto=$conect->realizarCompra($idc,$cantidad,$nombreC);



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