<?php

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

header ('Contet-Type: application/json');

include_once("../config/Conectar.php");
require_once("../models/productos.php");

$productos = new Productos();

$body = json_decode(file_get_contents("php://input"),true);

switch ($_GET["op"]){
    case 'GetAll':
        $datos = $productos->get_Productos();
        echo json_encode($datos);
        break;

    case 'GetId':
        $datos = $productos->get_Productos_ID($body["Productos_ID"]);
        echo json_encode($datos);
        break;
       
    case 'Insert':
        $datos = $productos->InsertProductos($body["Nombre_Productos"],$body["Descripcion"],$body["Precio"],$body["Stock"],$body["Categoria"]);
        echo json_encode("Productos insertado correctamente..");
        break;
         
    case 'Delete':
        $datos = $productos->DeleteProductos($body["Productos_ID"]);
        echo json_encode("Productos Borrada correctamente..");
        break;
         
    case 'Update':
        $datos = $productos->update_Productos($body['Productos_ID'],$body['Nombre_Productos'], $body['Descripcion'], $body['Precio'], $body['Stock'], $body['Categoria']);
        echo json_encode("Productos actualizado");
        break;
        
    default:
        break;



}

?>