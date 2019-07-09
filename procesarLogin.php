<?php
require_once("BD/Conexion.php");
session_start();
$email=$_POST["email"];
$pass=$_POST["pass"];
$conexion = new Conexion();
$consulta=$conexion->verificarLogin($email,$pass);
var_dump($consulta);

$_SESSION["nombre"]=$consulta["nombre"];
$_SESSION["apellido"]=$consulta["apellido"];
$_SESSION["id"] = $consulta["id"];
$_SESSION["imagen"]=$consulta["imagen"];

header("location:consulta.php");
exit();