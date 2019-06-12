<?php
require_once("header.php");
$idc = $_GET["idc"] ? $_GET["idc"] : null;
if (!(isset($idc))) {
    header("location:Index.php?button='registrar'");
    exit();
} else {
    require_once("BD/Conexion.php");
    $conect = new Conexion();
    $wallet= $conect->consultarWallet($_SESSION["id"]);
    $cripto = $conect->consultarCriptomoneda($idc);
    $idc = $_SESSION["id"];
    $cuenta = $conect->consultarCuenta($idc);
}
$cwallet= $wallet["cantidad"];
$nombreC = $cripto["nombre"];
$precioC = $cripto["precio"];
$logoC = $cripto["logo"];; ?>
<div class="container">
    <div class="card-body">
        <div class="text-center">
            <?php echo "<h2>Vender $nombreC</h2>" ?> <hr>
            <h5>Seleccione la cuenta donde depositar el dinero: </h5>
        </div>
        <div class='table-responsive-sm'>

            <form method="post" action="procesarVenta.php">
                <table class='table'>
                    <?php while($t=mysqli_fetch_array($cuenta)){ ?>

                        <tr>
                            <td><img src='img/paypal-curved-64px.png' style="height: 60px"></td>
                            <td><?php echo $t['alias']; ?></td>
                            <td><?php echo $t['email']; ?></td>
                            <td><input name="cuenta"<?php echo "value='$t[email]'" ?>
                                       type='radio' required></td>
                        </tr>
                    <?php } ?>
                </table>
                <div class="form-group justify-content-center">
                    <label>Ingrese cantidad de <?php echo $nombreC ?> a vender: </label>
                    <input class="form-control" style="max-width:300px" type="number"
                           name="cantidad" id="cantidadcv" max="<?php echo $cwallet; ?>"
                           required>
                </div>
                <table class="table">
                    <tr>
                        <td>Cantidad de criptomonedas disponibles: </td>
                     <?php echo "<td id='cantidadw' value='$cwallet'> $cwallet</td>";?>
                    </tr>
                    <tr>
                        <td>Precio Unitario: </td>
                        <?php echo"<td>USD$$precioC</td>";?>
                    </tr>
                    <tr>
                        <td>Comisión CoinBank (0.001%): </td>
                        <td id="comision"></td>
                    </tr>
                    <tr>
                        <td>Total: </td>
                        <td id="totalv"></td>

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
                            style="max-width: 200px; margin: 10px">Confirmar venta</button>
                    <a href="consulta.php" class="btn btn-primary" style="max-width:
                    200px; margin: 10px">
                        Cancelar venta</a>
                </div>
            </form>

        </div>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/codejq.js"></script>
</html>