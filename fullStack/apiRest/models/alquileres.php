<?php


require_once("../config/Conectar.php");

class Alquiler extends Conectar{

    private $Alquiler_ID;
    private $Cliente_ID;
    private $Empleado_ID;
    private $Fecha_Salida;
    private $Hora_Salida;
    private $SubtotalPeso;
    private $PlacaTransporte;
    private $Observaciones;


    public function __construct($Alquiler_ID = 0,$Cliente_ID = "",$Empleado_ID= "", $Fecha_Salida = "", $Hora_Salida = "", $SubtotalPeso = "", $PlacaTransporte = "", $Observaciones = "")
    {
        $this->Alquiler_ID = $Alquiler_ID;
        $this->Cliente_ID = $Cliente_ID;
        $this->Empleado_ID = $Empleado_ID;
        $this->$Fecha_Salida = $Fecha_Salida;
        $this->Hora_Salida = $Hora_Salida;
        $this->SubtotalPeso = $SubtotalPeso;
        $this->PlacaTransporte = $PlacaTransporte;
        $this-> Observaciones = $Observaciones;
    }

    // Funciones

    public function get_Alquiler()
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = $conectar->prepare("SELECT * FROM Alquiler");
        $stm -> execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_Alquiler_ID($Alquiler_ID)
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = $conectar->prepare("SELECT * FROM Alquiler WHERE Alquiler_ID = ?");
        $stm ->bindValue(1,$Alquiler_ID);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function InsertAlquiler($Cliente_ID, $Empleado_ID,$Fecha_Salida, $Hora_Salida, $SubtotalPeso,$PlacaTransporte, $Observaciones)
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = "INSERT INTO Alquiler (Cliente_ID, Empleado_ID,Fecha_Salida, Hora_Salida, SubtotalPeso, PlacaTransporte, Observaciones) VALUES(?,?,?,?,?,?,?)";
        $stm = $conectar->prepare($stm);
        $stm->bindValue(1,$Cliente_ID);
        $stm->bindValue(2,$Empleado_ID);
        $stm->bindValue(3,$Fecha_Salida);
        $stm->bindValue(4,$Hora_Salida);
        $stm->bindValue(5,$SubtotalPeso);
        $stm->bindValue(6,$PlacaTransporte);
        $stm->bindValue(7,$Observaciones);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function DeleteAlquiler($Alquiler_ID)
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm= $conectar->prepare("DELETE FROM Alquiler WHERE Alquiler_ID=?");
        $stm->bindValue(1,$Alquiler_ID);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_Alquiler($Alquiler_ID, $Cliente_ID, $Empleado_ID, $Fecha_Salida, $Hora_Salida, $SubtotalPeso, $PlacaTransporte, $Observaciones){
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = $conectar->prepare("UPDATE Alquiler SET Cliente_ID=?, Empleado_ID=?, Fecha_Salida=?, Hora_Salida=?, SubtotalPeso=?, PlacaTransporte=?, Observaciones=? WHERE Alquiler_ID=?");
        $stm->bindValue(1, $Cliente_ID);
        $stm->bindValue(2, $Empleado_ID);
        $stm->bindValue(3, $Fecha_Salida);
        $stm->bindValue(4, $Hora_Salida);
        $stm->bindValue(5, $SubtotalPeso);
        $stm->bindValue(6, $PlacaTransporte);
        $stm->bindValue(7, $Observaciones);
        $stm->bindValue(8, $Alquiler_ID);
        $stm->execute();
    }

    

}

?>