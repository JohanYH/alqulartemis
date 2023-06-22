<?php

require_once("../config/Conectar.php");

class Inventario extends Conectar{

    private $Inventario_ID;
    private $Productos_ID;
    private $CantidadInicial;
    private $CantidadIngresos;
    private $CantidadSalidas;
    private $CantidadFinal;
    private $FechaInventario;
    private $TipoOperancion;


    public function __construct($Inventario_ID = 0,$Productos_ID = "",$CantidadInicial= "", $CantidadIngresos = "", $CantidadSalidas = "", $CantidadFinal = "", $FechaInventario = "", $TipoOperancion = "")
    {
        $this->Inventario_ID = $Inventario_ID;
        $this->Productos_ID = $Productos_ID;
        $this->CantidadInicial = $CantidadInicial;
        $this->$CantidadIngresos = $CantidadIngresos;
        $this->CantidadSalidas = $CantidadSalidas;
        $this->CantidadFinal = $CantidadFinal;
        $this->FechaInventario = $FechaInventario;
        $this->TipoOperancion = $TipoOperancion;

    }

    // Funciones

    public function get_Inventario()
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = $conectar->prepare("SELECT * FROM Inventario");
        $stm -> execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_Inventario_ID($Inventario_ID)
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = $conectar->prepare("SELECT * FROM Inventario WHERE Inventario_ID = ?");
        $stm ->bindValue(1,$Inventario_ID);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function InsertInventario($Productos_ID, $CantidadInicial,$CantidadIngresos, $CantidadSalidas, $CantidadFinal, $FechaInventario, $TipoOperancion)
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = "INSERT INTO Inventario (Productos_ID, CantidadInicial,CantidadIngresos, CantidadSalidas, CantidadFinal, FechaInventario, TipoOperancion) VALUES(?,?,?,?,?,?,?)";
        $stm = $conectar->prepare($stm);
        $stm->bindValue(1,$Productos_ID);
        $stm->bindValue(2,$CantidadInicial);
        $stm->bindValue(3,$CantidadIngresos);
        $stm->bindValue(4,$CantidadSalidas);
        $stm->bindValue(5,$CantidadFinal);
        $stm->bindValue(6,$FechaInventario);
        $stm->bindValue(7,$TipoOperancion);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function DeleteInventario($Inventario_ID)
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm= $conectar->prepare("DELETE FROM Inventario WHERE Inventario_ID=?");
        $stm->bindValue(1,$Inventario_ID);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    public function update_Invetario($Inventario_ID, $Productos_ID, $CantidadInicial, $CantidadIngresos, $CantidadSalidas, $CantidadFinal, $FechaInventario, $TipoOperancion){
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = $conectar->prepare("UPDATE Inventario SET Productos_ID=?, CantidadInicial=?, CantidadIngresos=?, CantidadSalidas=?, CantidadFinal=?, FechaInventario=?, TipoOperancion=? WHERE Inventario_ID=?");
        $stm->bindValue(1, $Productos_ID);
        $stm->bindValue(2, $CantidadInicial);
        $stm->bindValue(3, $CantidadIngresos);
        $stm->bindValue(4, $CantidadSalidas);
        $stm->bindValue(5, $CantidadFinal);
        $stm->bindValue(6, $FechaInventario);
        $stm->bindValue(7, $TipoOperancion);
        $stm->bindValue(8, $Inventario_ID);
        $stm->execute();
    }

    

}

?>