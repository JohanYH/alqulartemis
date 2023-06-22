<?php

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

header ('Contet-Type: application/json');

require_once("../config/Conectar.php");
require_once("../models/alquileres.php");

$alquileres = new Alquiler();

$body = json_decode(file_get_contents("php://input"),true);

switch ($_GET["op"]){
    case 'GetAll':
        $datos = $alquileres->get_Alquiler();
        echo json_encode($datos);
        break;

    case 'GetId':
        $datos = $alquileres->get_Alquiler_ID($body["Alquiler_ID"]);
        echo json_encode($datos);
        break;
       
    case 'Insert':
        $datos = $alquileres->InsertAlquiler($body["Cliente_ID"],$body["Empleado_ID"],$body["Fecha_Salida"],$body["Hora_Salida"],$body["SubtotalPeso"],$body["PlacaTransporte"],$body["Observaciones"]);
        echo json_encode("Alquiler insertado correctamente..");
        break;
         
    case 'Delete':
        $datos = $alquileres->DeleteAlquiler($body["Alquiler_ID"]);
        echo json_encode("Cliente Borrado correctamente..");
        break;
         
    case 'Update':
        $datos = $alquileres->update_Alquiler($body['Alquiler_ID'],$body['Cliente_ID'],$body['Empleado_ID'],$body['Fecha_Salida'],$body['Hora_Salida'],$body['SubtotalPeso'],$body['PlacaTransporte'],$body['Observaciones']);
        echo json_encode("Alquiler actualizado");
        break;
        
    default:
        break; 



}















?>