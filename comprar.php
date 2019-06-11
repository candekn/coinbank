<?php require_once("header.php");
$idc=$_GET["idc"]?$_GET["idc"]:null;
if(!(isset($idc))){
    header("location:Index.php?button='registrar'");
    exit();
}else{
    require_once("BD/Conexion.php");
    $conect= new Conexion();
    $cripto=$conect->consultarCriptomoneda($idc);
    $idc=$_SESSION["id"];
    $tarjeta=$conect->consultarTarjetas($idc);
}
$nombreC=$cripto["nombre"];
$precioC=$cripto["precio"];
$logoC=$cripto["logo"];

;?>
<div class="container">
    <div class="card-body">
        <div class="text-center">
           <?php echo "<h2>Comprar $nombreC</h2>" ?> <hr>
            <h5>Seleccione la tarjeta de crédito desde donde realizar la compra: </h5>
        </div>

        <div class='table-responsive-sm'>

            <form method="post" action="procesarCompra.php">
                <table class='table'>
                    <?php while($t=mysqli_fetch_array($tarjeta)){ ?>

                        <tr>
                            <td><img src='img/credit-card.png' style="height: 60px"></td>
                            <td><?php echo $t['nombre']; ?></td>
                            <td><?php echo $t['numeroTarjeta']; ?></td>
                            <td><input name="tarjetadecred"<?php echo "value='$t[numeroTarjeta]'" ?>
                                       type='radio'></td>
                        </tr>
                    <?php } ?>
                </table>
                <div class="form-group">
                    <label>Ingrese cantidad de <?php echo $nombreC ?> a comprar: </label>
                    <input class="form-control" style="max-width:300px" type="number"
                    name="cantidad">
                </div>
                <input type="number" step="any" name="precio" style="display: none" <?php echo "value='$precioC'"
                ?> >
                <input type="text" name="nombrec" style="display: none" <?php echo "value='$nombreC'"
                ?> >
                <div class="form-group row justify-content-center">
                    <button type="submit" class="btn btn-primary"
                            style="max-width: 200px; margin: 10px">Vista previa de
                        compra</button>
                    <a href="consulta.php" class="btn btn-primary" style="max-width:
                    200px; margin: 10px">
                        Cancelar compra</a>
                </div>
            </form>

        </div>
    </div>
</div>
</html>