<?php


require_once("../config/Conectar.php");

class Cliente extends Conectar{

    private $Cliente_ID;
    private $Nombre_Cliente;
    private $Telefono_Cliente;


    public function __construct($Cliente_ID = 0, $Nombre_Cliente = "", $Telefono_Cliente = "")
    {
        $this->Cliente_ID = $Cliente_ID;
        $this->Nombre_Cliente = $Nombre_Cliente;
        $this->Telefono_Cliente = $Telefono_Cliente;
    }

    // Funciones

    public function selectAll()
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = $conectar->prepare("SELECT * FROM Cliente");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectOne($Cliente_ID)
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = $conectar->prepare("SELECT * FROM Cliente WHERE Cliente_ID = ?");
        $stm ->bindValue(1,$Cliente_ID);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function InsertCliente($Nombre_Cliente, $Telefono_Cliente)
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = "INSERT INTO Cliente (Nombre_Cliente, Telefono_Cliente) VALUES(?,?)";
        $stm = $conectar->prepare($stm);
        $stm->bindValue(1,$Nombre_Cliente);
        $stm->bindValue(2,$Telefono_Cliente);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function DeleteCliente($Cliente_ID)
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm= $conectar->prepare("DELETE FROM Cliente WHERE Cliente_ID=?");
        $stm->bindValue(1,$Cliente_ID);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_Cliente($Cliente_ID, $Nombre_Cliente, $Telefono_Cliente){
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = $conectar->prepare("UPDATE Cliente SET Nombre_Cliente=?, Telefono_Cliente=? WHERE Cliente_ID=?");
        $stm->bindValue(1, $Nombre_Cliente);
        $stm->bindValue(2, $Telefono_Cliente);
        $stm->bindValue(3, $Cliente_ID);
        $stm->execute();
    }

    

}

?>