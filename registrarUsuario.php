<?php
// echo json_encode(["dniFront" => $_FILES, "nombre" => $_POST]);

include_once "./BD/Conexion.php";

$conexion = new Conexion();

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];
$pass = $_POST["contraseña"];
$dni = $_POST["dni"];
$dniFrente = $_FILES["dniFront"]["name"];
// $dniDorso = $_FILES["dniBack"]["name"];

$servername = "localhost";
$dbname = "coinbank";
$username = "root";
$password = "19881607";

try{
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); 

    // Activar notificaciones de errores
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  

} catch(Exception $e){
    
    echo 'Connection failed: ' . $e->getMessage();
}

$insertCliente = "INSERT INTO Cliente (nombre, apellido, email, telefono, direccion, pass, dni, imagendnifrente)";
$insertCliente .= " VALUES (:nombre, :apellido, :email, :telefono, :direccion, :pass, :dni, :dniFrente)";


try{
    $queryInsert = $pdo->prepare($insertCliente);
    $queryInsert->execute([":nombre" => $nombre, ":apellido" => $apellido, ":email" => $email, ":telefono" => intval($telefono),
    ":direccion" => $direccion, ":pass" => $pass, ":dni" => intval($dni), ":dniFrente" => $dniFrente]);
    
    $lastId = $pdo->lastInsertId();

    try{
        $createWallet = "INSERT INTO Wallets (cantidad, tipo, codigo, idCliente) VALUES (:cantidad, :nombre, :codigo ,:idCliente)";
        $queryWallet = $pdo->prepare($createWallet);
        $queryWallet->execute([":cantidad" => 0, ":nombre" => "PataConde", ":codigo" => "XCZXASD3423DSFSDF", ":idCliente" => $lastId]);

        $idWallet = $pdo->lastInsertId();

        try{
            $connectCripto = "INSERT INTO WalletsCriptomonedas(idWallets,idCriptomoneda) VALUES (:idWallet, :idCripto)";
            $queryBind = $pdo->prepare($connectCripto);
            $queryBind->execute([":idWallet" => $idWallet, ":idCripto" => 111]);
        
        } catch (Exception $e){
            echo json_encode(["error" => $e->getMEssage()]);    
        }

    } catch (Exception $e){
        echo json_encode(["error" => $e->getMEssage()]);
    }

    if($queryInsert->rowCount() > 0){
        echo json_encode(["resp" => "registro exitoso"]);

    } else {
        echo json_encode(["resp" => "error"]);
    }

} catch (Exception $e){
    echo json_encode(["error" => $e]);
}
// include_once "./BD/Conexion.php";

// $conexion = new Conexion();

// $conexion->registrarUsuario($nombre, $apellido, $email, $telefono, $direccion, $pass, $dni, $dniFrente);