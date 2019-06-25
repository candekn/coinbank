<?php require_once("header.php");
$idc=$_GET["idc"]?$_GET["idc"]:null;
if(!(isset($idc))){
    header("location:Index.php?button='ingresar'");
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
                                       type='radio' required></td>
                        </tr>
                    <?php } ?>
                </table>
                <div class="form-group justify-content-center">
                    <label>Ingrese cantidad de <?php echo $nombreC ?> a comprar: </label>
                    <input class="form-control" style="max-width:300px" type="number" step="any"
                           min="0.1" name="cantidad" id="cantidadc"required>
                </div>
                    <table class="table">
                        <tr>
                            <td>Precio Unitario: </td>
                            <?php echo"<td>USD$$precioC</td>";?>
                        </tr>
                        <tr>
                            <td>Comisión CoinBank (0.01%): </td>
                            <td id="comision"></td>
                        </tr>
                        <tr>
                            <td>Total: </td>
                            <td id="total"></td>

                        </tr>
                    </table>

                <input type="number" step="any" name="precio" id="precioc" style="display:
                none"
                <?php
                echo "value='$precioC'"
                ?> >
                <input type="text" name="nombrec" style="display: none" <?php echo "value='$nombreC'"
                ?> >


                <div class="form-group row justify-content-center">
                    <button type="submit" class="btn btn-primary"
                            style="max-width: 200px; margin: 10px">Confirmar compra</button>
                    <a href="consulta.php" class="btn btn-primary" style="max-width:
                    200px; margin: 10px">
                        Cancelar compra</a>
                </div>
            </form>

        </div>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/codejq.js"></script>
</html>