<?php
$wallet=$conec->consultarWallet($id);
$idWallet=$wallet["idw"];
$cantidadW=$wallet["cantidad"];
$codigoW=$wallet["codigo"];
$idC=$conec->consultarIdCriptomoneda($idWallet);
$cripto=$conec->consultarCriptomoneda($idC);
$nombreC=$cripto["nombre"];
$precioC=$cripto["precio"];
$logoC=$cripto["logo"];
$precio=$cantidadW*$precioC;

