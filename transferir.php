<?php
require_once("header.php");
$idc = $_GET["idc"] ? $_GET["idc"] : null;
if (!(isset($idc))) {
    header("location:Index.php?button='ingresar'");
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
            <?php echo "<h2>Transferir $nombreC</h2>" ?> <hr>
        </div>
        <div class='table-responsive-sm'>

            <form method="post" action="procesarTransferencia.php">
                <div class="form-group">
                    <label>Ingrese el código identificatorio de la cuenta destino: </label>
                    <input type="text" name="cuentaT" class="form-control"><hr>
                </div>
                <div class="form-group justify-content-center">
                    <label>Ingrese cantidad de <?php echo $nombreC ?> a transferir: </label>
                    <input class="form-control" style="max-width:300px" type="number" step="any"
                           name="cantidad" id="cantidadcv" min="0.0" max="<?php echo $cwallet;
                           ?>"
                           required>
                </div>
                <table class="table">
                    <tr>
                        <td>Cantidad de criptomonedas disponibles: </td>
                        <?php echo "<td id='cantidadw' value='$cwallet'> $cwallet</td>";?>
                    </tr>

                </table>

                <input type="text" name="nombrec" style="display: none" <?php echo "value='$nombreC'"
                ?> >


                <div class="form-group row justify-content-center">
                    <button type="submit" class="btn btn-primary"
                            style="max-width: 200px; margin: 10px">Confirmar
                        transferencia</button>
                    <a href="consulta.php" class="btn btn-primary" style="max-width:
                    200px; margin: 10px">
                        Cancelar transferencia</a>
                </div>
            </form>

        </div>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/codejq.js"></script>
</html>