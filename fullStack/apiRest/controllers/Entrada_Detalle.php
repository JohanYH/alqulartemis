<?php

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

header ('Contet-Type: application/json');

require_once("../config/Conectar.php");
require_once("../models/entrada_detalles.php");

$detalles = new Detalles();

$body = json_decode(file_get_contents("php://input"),true);

switch ($_GET["op"]){
    case 'GetAll':
        $datos = $detalles->get_Entrada_Detalle();
        echo json_encode($datos);
        break;

    case 'GetId':
        $datos = $detalles->get_Entrada_Detalle_ID($body["Entrada_Detalle_ID"]);
        echo json_encode($datos);
        break;
       
    case 'Insert':
        $datos = $detalles->InsertEntrada_Detalle($body["Fecha_Entrada"],$body["Nombre_Productos"],$body["Nombre_Obra"],$body["Entrada_Cantidad"],$body["Entrada_Cantidad_Propia"],$body["Entrada_Cantidad_Subaquilada"],$body["Estado"]);
        echo json_encode("Entrada detalle insertado correctamente..");
        break;
         
    case 'Delete':
        $datos = $detalles->DeleteEntrada_Detalle($body["Entrada_Detalle_ID"]);
        echo json_encode("Entrada detalle Borrada correctamente..");
        break;
         
    case 'Update':
        $datos = $detalles->update_Entrada_Detalle($body['Entrada_Detalle_ID'],$body['Entrada_ID'], $body['Productos_ID'], $body['Obra_ID'], $body['Entrada_Cantidad'], $body['Entrada_Cantidad_Propia'], $body['Entrada_Cantidad_Subaquilada'],$body['Estado']);
        echo json_encode("Entrada Detalle actualizado");
        break;
        
    default:
        break;



}















?>