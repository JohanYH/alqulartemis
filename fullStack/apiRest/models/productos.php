<?php

require_once("../config/Conectar.php");

class Productos extends Conectar{

    private $Productos_ID;
    private $Nombre_Productos;
    private $Descripcion;
    private $Precio;
    private $Stock;
    private $Categoria;


    public function __construct($Productos_ID = 0,$Nombre_Productos = "",$Descripcion= "", $Precio = "", $Stock = "", $Categoria = "")
    {
        $this->Productos_ID = $Productos_ID;
        $this->Nombre_Productos = $Nombre_Productos;
        $this->Descripcion = $Descripcion;
        $this->$Precio = $Precio;
        $this->Stock = $Stock;
        $this->Categoria = $Categoria;

    }

    // Funciones

    public function get_Productos()
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = $conectar->prepare("SELECT * FROM Productos");
        $stm -> execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_Productos_ID($Productos_ID)
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = $conectar->prepare("SELECT * FROM Productos WHERE Productos_ID = ?");
        $stm ->bindValue(1,$Productos_ID);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function InsertProductos($Nombre_Productos, $Descripcion,$Precio, $Stock, $Categoria)
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = "INSERT INTO Productos (Nombre_Productos, Descripcion,Precio, Stock, Categoria) VALUES(?,?,?,?,?)";
        $stm = $conectar->prepare($stm);
        $stm->bindValue(1,$Nombre_Productos);
        $stm->bindValue(2,$Descripcion);
        $stm->bindValue(3,$Precio);
        $stm->bindValue(4,$Stock);
        $stm->bindValue(5,$Categoria);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function DeleteProductos($Productos_ID)
    {
        $conectar = $this->Conexion();
        $this->set_name();
        $stm= $conectar->prepare("DELETE FROM Productos WHERE Productos_ID=?");
        $stm->bindValue(1,$Productos_ID);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_Productos($Productos_ID, $Nombre_Productos, $Descripcion, $Precio, $Stock, $Categoria){
        $conectar = $this->Conexion();
        $this->set_name();
        $stm = $conectar->prepare("UPDATE Productos SET Nombre_Productos=?, Descripcion=?, Precio=?, Stock=?, Categoria=? WHERE Productos_ID=?");
        $stm->bindValue(1, $Nombre_Productos);
        $stm->bindValue(2, $Descripcion);
        $stm->bindValue(3, $Precio);
        $stm->bindValue(4, $Stock);
        $stm->bindValue(5, $Categoria);
        $stm->bindValue(6, $Productos_ID);
        $stm->execute();
    }

    

}

?>