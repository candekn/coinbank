<?php


class Conexion
{
    private $host = "";
    private $usuario = "";
    private $clave="";
    private $bd = "";
    private $msq="";


    public function __construct()
    {
        $archivoConfig = "config.ini";
        $confi = parse_ini_file($archivoConfig, true);

        $this->host = $confi["bd"]["host"];
        $this->usuario = $confi["bd"]["usuario"];
        $this->clave=$confi["bd"]["clave"];
        $this->bd = $confi["bd"]["bd"];
        $this->msq = new mysqli($this->host, $this->usuario, $this->clave, $this->bd);

    }

    public function verificarLogin($email, $pass){
        $consulta=$this->msq->prepare("SELECT id, nombre, apellido, imagenPerfil FROM Cliente WHERE email=? AND pass=?");
        $consulta->bind_param("ss",$email,$pass);
        $consulta->execute();
        $consulta->store_result();
        $id=""; $nombre=""; $apellido=""; $img="";
        $consulta->bind_result($id,$nombre,$apellido,$img);
        $consulta->fetch();
        $array=array(
            "id" => $id,
            "nombre" =>$nombre,
            "apellido" =>$apellido,
            "imagen" => $img
        );
        return $array;
    }

    public function consultarWallet($idc){
        $consulta=$this->msq->prepare("SELECT id, cantidad, codigo FROM Wallets WHERE idCliente=?");
        $consulta->bind_param('i',$idc);
        $consulta->execute();
        $consulta->store_result();
        $idW=""; $cantidad="";$codigo="";
        $consulta->bind_result($idW,$cantidad,$codigo);
        $consulta->fetch();
        $array=array(
            "idw" => $idW,
            "cantidad" => $cantidad,
            "codigo"=>$codigo
        );
        return $array;
    }

    public function consultarIdCriptomoneda($idw){
        $consulta=$this->msq->prepare("SELECT idCriptomoneda FROM WalletsCriptomonedas WHERE idWallets=?");
        $consulta->bind_param("i",$idw);
        $consulta->execute();
        $consulta->store_result();
        $idC="";
        $consulta->bind_result($idC);
        $consulta->fetch();
        return $idC;

    }
    public function consultarCriptomoneda($idC){
        $consulta2=$this->msq->prepare("SELECT nombre, precio, logo FROM Criptomoneda WHERE id=?");
        $consulta2->bind_param('i',$idC);
        $consulta2->execute();
        $consulta2->store_result();
        $nombre=""; $precio=""; $logo="";
        $consulta2->bind_result($nombre,$precio,$logo);
        $consulta2->fetch();
        $array=array(
            "nombre"=>$nombre,
            "precio"=>$precio,
            "logo"=>$logo,
            "idc"=>$idC
        );
        return $array;
    }
    public function consultarTarjetas($id){
        $consulta=$this->msq->query("SELECT id, nombre, numeroTarjeta FROM TarjetaDeCredito WHERE idCliente=$id");
        return $consulta;
    }

}