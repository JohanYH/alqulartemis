<?php

require_once("../config/Conectar.php");

class Entrada extends Conectar{

    private $Entrada_ID;
    private $Alquiler_ID;
    private $Empleado_ID;
    private $Cliente_ID;
    private $Fecha_Entrada;
    private $Hora_Entrada;
    private $Observaciones;


    public function __construct($Entrada_ID = 0,$Alquiler_ID = "",$Empleado_ID= "", $Cliente_ID = "", $Fecha_Entrada = "", $Hora_Entrada = "", $Observaciones = "")
    {
        $this->Entrada_ID = $Entrada_ID;
        $this->Alquiler_ID = $Alquiler_ID;
        $this->Empleado_ID = $Empleado_ID;
        $this->$Cliente_ID = $Cliente_ID;
        $this->Fecha_Entrada = $Fecha_Entrada;
        $this->Hora_Entrada = $Hora_Entrada;
        $this-> Observaciones = $Observaciones;
    }

    // Funciones

    public function get_Entrada()
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = $conectar->prepare("SELECT * FROM Entrada");
        $stm -> execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_Entrada_ID($Entrada_ID)
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = $conectar->prepare("SELECT * FROM Entrada WHERE Entrada_ID = ?");
        $stm ->bindValue(1,$Entrada_ID);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function InsertEntrada($Alquiler_ID, $Empleado_ID,$Cliente_ID, $Fecha_Entrada, $Hora_Entrada, $Observaciones)
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = "INSERT INTO Entrada (Alquiler_ID, Empleado_ID,Cliente_ID, Fecha_Entrada, Hora_Entrada, Observaciones) VALUES(?,?,?,?,?,?)";
        $stm = $conectar->prepare($stm);
        $stm->bindValue(1,$Alquiler_ID);
        $stm->bindValue(2,$Empleado_ID);
        $stm->bindValue(3,$Cliente_ID);
        $stm->bindValue(4,$Fecha_Entrada);
        $stm->bindValue(5,$Hora_Entrada);
        $stm->bindValue(6,$Observaciones);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function DeleteEntrada($Entrada_ID)
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm= $conectar->prepare("DELETE FROM Entrada WHERE Entrada_ID=?");
        $stm->bindValue(1,$Entrada_ID);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_Entrada($Entrada_ID, $Alquiler_ID, $Empleado_ID, $Cliente_ID, $Fecha_Entrada, $Hora_Entrada, $Observaciones){
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = $conectar->prepare("UPDATE Entrada SET Alquiler_ID=?, Empleado_ID=?, Cliente_ID=?, Fecha_Entrada=?, Hora_Entrada=?, Observaciones=? WHERE Entrada_ID=?");
        $stm->bindValue(1, $Alquiler_ID);
        $stm->bindValue(2, $Empleado_ID);
        $stm->bindValue(3, $Cliente_ID);
        $stm->bindValue(4, $Fecha_Entrada);
        $stm->bindValue(5, $Hora_Entrada);
        $stm->bindValue(6, $Observaciones);
        $stm->bindValue(7, $Entrada_ID);
        $stm->execute();
    }

    

}

?>