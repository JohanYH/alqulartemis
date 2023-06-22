<?php

require_once("../config/Conectar.php");

class Alquiler_Detalles extends Conectar{

    private $Alquiler_Detalle_ID;
    private $Alquiler_ID;
    private $Productos_ID;
    private $Obra_ID;
    private $Empleado_ID;
    private $Cantidad_Salida;
    private $Cantidad_Propia;
    private $Cantidad_Subalquilada;
    private $ValorUnida;
    private $Fecha_StanBye;
    private $Estado;


    public function __construct($Alquiler_Detalle_ID = 0,$Alquiler_ID = "",$Productos_ID= "", $Obra_ID = "", $Empleado_ID = "", $Cantidad_Salida = "", $Cantidad_Propia = "", $Cantidad_Subalquilada= "", $ValorUnida = "", $Fecha_StanBye = "", $Estado = "")
    {
        $this->Alquiler_Detalle_ID = $Alquiler_Detalle_ID;
        $this->Alquiler_ID = $Alquiler_ID;
        $this->Productos_ID = $Productos_ID;
        $this->$Obra_ID = $Obra_ID;
        $this->Empleado_ID = $Empleado_ID;
        $this->Cantidad_Salida = $Cantidad_Salida;
        $this->Cantidad_Propia = $Cantidad_Propia;
        $this->Cantidad_Subalquilada = $Cantidad_Subalquilada;
        $this->ValorUnida = $ValorUnida;
        $this->Fecha_StanBye = $Fecha_StanBye;
        $this->Estado = $Estado;

    }

    // Funciones

    public function get_Alquiler_Detalle()
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = $conectar->prepare("SELECT * FROM Alquiler_Detalle");
        $stm -> execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_Alquiler_Detalle_ID($Alquiler_Detalle_ID)
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = $conectar->prepare("SELECT * FROM Alquiler_Detalle WHERE Alquiler_Detalle_ID = ?");
        $stm ->bindValue(1,$Alquiler_Detalle_ID);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function InsertAlquiler_Detalle($Alquiler_ID, $Productos_ID,$Obra_ID, $Empleado_ID, $Cantidad_Salida, $Cantidad_Propia, $Cantidad_Subalquilada, $ValorUnida, $Fecha_StanBye, $Estado)
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = "INSERT INTO Alquiler_Detalle (Alquiler_ID, Productos_ID,Obra_ID, Empleado_ID, Cantidad_Salida, Cantidad_Propia,Cantidad_Subalquilada, ValorUnida, Fecha_StanBye, Estado) VALUES(?,?,?,?,?,?,?,?,?,?)";
        $stm = $conectar->prepare($stm);
        $stm->bindValue(1,$Alquiler_ID);
        $stm->bindValue(2,$Productos_ID);
        $stm->bindValue(3,$Obra_ID);
        $stm->bindValue(4,$Empleado_ID);
        $stm->bindValue(5,$Cantidad_Salida);
        $stm->bindValue(6,$Cantidad_Propia);
        $stm->bindValue(7,$Cantidad_Subalquilada);
        $stm->bindValue(8,$ValorUnida);
        $stm->bindValue(9,$Fecha_StanBye);
        $stm->bindValue(10,$Estado);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function DeleteAlquiler_Detalle($Alquiler_Detalle_ID)
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm= $conectar->prepare("DELETE FROM Alquiler_Detalle WHERE Alquiler_Detalle_ID=?");
        $stm->bindValue(1,$Alquiler_Detalle_ID);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_Alquiler_Detalle($Alquiler_Detalle_ID, $Alquiler_ID, $Productos_ID, $Obra_ID, $Empleado_ID, $Cantidad_Salida, $Cantidad_Propia, $Cantidad_Subalquilada, $ValorUnida, $Fecha_StanBye, $Estado){
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = $conectar->prepare("UPDATE Alquiler_Detalle SET Alquiler_ID=?, Productos_ID=?, Obra_ID=?, Empleado_ID=?, Cantidad_Salida=?, Cantidad_Propia=?, Cantidad_Subalquilada=?, ValorUnida = ?, Fecha_StanBye = ?, Estado = ? WHERE Alquiler_Detalle_ID=?");
        $stm->bindValue(1, $Alquiler_ID);
        $stm->bindValue(2, $Productos_ID);
        $stm->bindValue(3, $Obra_ID);
        $stm->bindValue(4, $Empleado_ID);
        $stm->bindValue(5, $Cantidad_Salida);
        $stm->bindValue(6, $Cantidad_Propia);
        $stm->bindValue(7, $Cantidad_Subalquilada);
        $stm->bindValue(8, $ValorUnida);
        $stm->bindValue(9, $Fecha_StanBye);
        $stm->bindValue(10, $Estado);
        $stm->bindValue(11, $Alquiler_Detalle_ID);
        $stm->execute();
    }

    

}

?>