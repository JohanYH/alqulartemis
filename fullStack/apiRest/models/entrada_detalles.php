<?php

require_once("../config/Conectar.php");

class Detalles extends Conectar{

    private $Entrada_Detalle_ID;
    private $Entrada_ID;
    private $Productos_ID;
    private $Obra_ID;
    private $Entrada_Cantidad;
    private $Entrada_Cantidad_Propia;
    private $Entrada_Cantidad_Subaquilada;
    private $Estado;


    public function __construct($Entrada_Detalle_ID = 0,$Entrada_ID = "",$Productos_ID= "", $Obra_ID = "", $Entrada_Cantidad = "", $Entrada_Cantidad_Propia = "", $Entrada_Cantidad_Subaquilada = "", $Estado= "")
    {
        $this->Entrada_Detalle_ID = $Entrada_Detalle_ID;
        $this->Entrada_ID = $Entrada_ID;
        $this->Productos_ID = $Productos_ID;
        $this->$Obra_ID = $Obra_ID;
        $this->Entrada_Cantidad = $Entrada_Cantidad;
        $this->Entrada_Cantidad_Propia = $Entrada_Cantidad_Propia;
        $this->Entrada_Cantidad_Subaquilada = $Entrada_Cantidad_Subaquilada;
        $this->Estado = $Estado;

    }

    // Funciones

    public function get_Entrada_Detalle()
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = $conectar->prepare("SELECT * FROM Entrada_Detalle");
        $stm -> execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_Entrada_Detalle_ID($Entrada_Detalle_ID)
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = $conectar->prepare("SELECT * FROM Entrada_Detalle WHERE Entrada_Detalle_ID = ?");
        $stm ->bindValue(1,$Entrada_Detalle_ID);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function InsertEntrada_Detalle($Entrada_ID, $Productos_ID,$Obra_ID, $Entrada_Cantidad, $Entrada_Cantidad_Propia, $Entrada_Cantidad_Subaquilada, $Estado)
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = "INSERT INTO Entrada_Detalle (Entrada_ID, Productos_ID,Obra_ID, Entrada_Cantidad, Entrada_Cantidad_Propia, Entrada_Cantidad_Subaquilada,Estado) VALUES(?,?,?,?,?,?,?)";
        $stm = $conectar->prepare($stm);
        $stm->bindValue(1,$Entrada_ID);
        $stm->bindValue(2,$Productos_ID);
        $stm->bindValue(3,$Obra_ID);
        $stm->bindValue(4,$Entrada_Cantidad);
        $stm->bindValue(5,$Entrada_Cantidad_Propia);
        $stm->bindValue(6, $Entrada_Cantidad_Subaquilada);
        $stm->bindValue(7, $Estado);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function DeleteEntrada_Detalle($Entrada_Detalle_ID)
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm= $conectar->prepare("DELETE FROM Entrada_Detalle WHERE Entrada_Detalle_ID=?");
        $stm->bindValue(1,$Entrada_Detalle_ID);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_Entrada_Detalle($Entrada_Detalle_ID, $Entrada_ID, $Productos_ID, $Obra_ID, $Entrada_Cantidad, $Entrada_Cantidad_Propia, $Entrada_Cantidad_Subaquilada, $Estado){
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = $conectar->prepare("UPDATE Entrada_Detalle SET Entrada_ID=?, Productos_ID=?, Obra_ID=?, Entrada_Cantidad=?, Entrada_Cantidad_Propia=?, Entrada_Cantidad_Subaquilada=?, Estado = ? WHERE Entrada_Detalle_ID=?");
        $stm->bindValue(1, $Entrada_ID);
        $stm->bindValue(2, $Productos_ID);
        $stm->bindValue(3, $Obra_ID);
        $stm->bindValue(4, $Entrada_Cantidad);
        $stm->bindValue(5, $Entrada_Cantidad_Propia);
        $stm->bindValue(6, $Entrada_Cantidad_Subaquilada);
        $stm->bindValue(7, $Estado);
        $stm->bindValue(8, $Entrada_Detalle_ID);
        $stm->execute();
    }

    

}

?>