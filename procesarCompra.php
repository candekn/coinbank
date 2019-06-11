<?php
require_once("header.php");
require_once("BD/Conexion.php");
$nombreC=$_POST['nombrec'];
$precioC=$_POST['precio'];
$numeroT=$_POST['tarjetadecred'];
$cantidad=$_POST['cantidad'];
$precioTotal=$precioC*$cantidad;
$comision=$precioTotal*0.001;
$total= $precioTotal+$comision;
?>
<div class="container">
<div class="card-body">
    <div class="text-center">
        <h2>Confirmar compra</h2>
        <h1 class="text-dark"><?php echo "$cantidad $nombreC" ?></h1>
    </div>
    <hr>
    <div class="table" >
        <table style="min-width: 600px; margin: auto">
             <?php echo "<td >Precio de $nombreC:</td> 
        <td style='text-align: right'>USD$$precioC</td>
        <tr>
         <td >Tarjeta seleccionada:</td> 
         <td style='text-align: right'>$numeroT</td>
        </tr>
        <tr>
            <td >Dinero a invertir en la compra:</td> 
            <td style='text-align: right'>USD$$precioTotal</td>
        </tr>
        <tr>
            <td >Comisión de CoinBank:</td> 
            <td style='text-align: right'>USD$$comision</td>
        </tr>
        <tr>
           <td >Total:</td> 
           <td style='text-align: right'>USD$$total</td>"; ?>
        </tr>
        </table>
       <div class="row justify-content-center">
           <a href="confirmarCompra.php" class="btn btn-primary" style="max-width:
                    200px; margin: 10px">Confirmar compra</a>
           <a href="consulta.php" class="btn btn-primary" style="max-width:
                    200px; margin: 10px">Cancelar compra</a>
       </div>

    </div>

</div>
</div>