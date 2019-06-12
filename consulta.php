<?php
require_once("header.php");
require_once("BD/Conexion.php");
$conec= new Conexion();
$id=$_SESSION["id"];
require("consultaDeCrypto.php");

?>

<div class="container">
    <div class="card-body">
        <?php
        echo "<div class='row justify-content-center'><img src='img/$logoC' style='max-height: 100px'></div>
        <div class='text-center'>
        <h2>$cantidadW <b>$nombreC</b> (USD$$precio)</h2>
        <h6>Precio unitario: USD$$precioC</h6>
        </div>
        "; ?>
        <div class="row justify-content-center">
            <?php echo "<a class='btn btn-primary btn-link linkconsulta' href='comprar.php?idc=$idC'>Comprar</a>
            <a class='btn btn-primary btn-link linkconsulta' href='vender.php?idc=$idC'>Vender</a>
            <a class='btn btn-primary btn-link linkconsulta' href='#'>Transferir</a>" ?>
        </div>
        <div class="table-responsive-sm">
            <table class="table">
                <tr>
                    <td><img src="img/down.png" class="updown"> </td>
                    <td>Recibido</td>
                    <td>De 1x99CF69R...0F87</td>
                    <td><b>+3 PataConde</b></td>
                </tr>
                <tr>
                    <td><img src="img/up.png" class="updown"> </td>
                    <td>Enviado</td>
                    <td>A 45xHD01F6J...H9L7</td>
                    <td><b>-3 PataConde</b></td>
                </tr>
                <tr>
                    <td><img src="img/down.png" class="updown"> </td>
                    <td>Recibido</td>
                    <td>De 799xGFF9R...0R81</td>
                    <td><b>+7 PataConde</b></td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>