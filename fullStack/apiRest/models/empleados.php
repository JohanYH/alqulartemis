<?php


require_once("../config/Conectar.php");

class Empleado extends Conectar{

    private $Empleado_ID;
    private $Nombre_Empleado;
    private $Telefono_Empleado;


    public function __construct($Empleado_ID = 0, $Nombre_Empleado = "", $Telefono_Empleado = "")
    {
        $this->Empleado_ID = $Empleado_ID;
        $this->$Nombre_Empleado = $Nombre_Empleado;
        $this->Telefono_Empleado = $Telefono_Empleado;
    }


    // Funciones

    public function selectAll()
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = $conectar->prepare("SELECT * FROM Empleado");
        $stm -> execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectOne($Empleado_ID)
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = $conectar->prepare("SELECT * FROM Empleado WHERE Empleado_ID = ?");
        $stm ->bindValue(1,$Empleado_ID);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function InsertEmpleado($Nombre_Empleado, $Telefono_Empleado)
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = "INSERT INTO Empleado (Nombre_Empleado, Telefono_Empleado) VALUES(?,?)";
        $stm = $conectar->prepare($stm);
        $stm->bindValue(1,$Nombre_Empleado);
        $stm->bindValue(2,$Telefono_Empleado);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function DeleteEmpleado($Empleado_ID)
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm= $conectar->prepare("DELETE FROM Empleado WHERE Empleado_ID=?");
        $stm->bindValue(1,$Empleado_ID);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_Empleado($Empleado_ID, $Nombre_Empleado, $Telefono_Empleado){
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = $conectar->prepare("UPDATE Empleado SET Nombre_Empleado=?, Telefono_Empleado=? WHERE Empleado_ID=?");
        $stm->bindValue(1, $Nombre_Empleado);
        $stm->bindValue(2, $Telefono_Empleado);
        $stm->bindValue(3, $Empleado_ID);
        $stm->execute();
    }


    

}

?>