<?php

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

header ('Contet-Type: application/json');

require_once("../config/Conectar.php");
require_once("../models/entradas.php");

$entradas = new Entrada();

$body = json_decode(file_get_contents("php://input"),true);

switch ($_GET["op"]){
    case 'GetAll':
        $datos = $entradas->get_Entrada();
        echo json_encode($datos);
        break;

    case 'GetId':
        $datos = $entradas->get_Entrada_ID($body["Entrada_ID"]);
        echo json_encode($datos);
        break;
       
    case 'Insert':
        $datos = $entradas->InsertEntrada($body["Fecha_Salida"],$body["Nombre_Empleado"],$body["Nombre_Cliente"],$body["Fecha_Entrada"],$body["Hora_Entrada"],$body["Observaciones"]);
        echo json_encode("Entrada insertado correctamente..");
        break;
         
    case 'Delete':
        $datos = $entradas->DeleteEntrada($body["Entrada_ID"]);
        echo json_encode("Entrada Borrada correctamente..");
        break;
         
    case 'Update':
        $datos = $entradas->update_Entrada($body['Entrada_ID'],$body['Alquiler_ID'], $body['Empleado_ID'], $body['Cliente_ID'], $body['Fecha_Entrada'], $body['Hora_Entrada'], $body['Observaciones']);
        echo json_encode("Entrada actualizado");
        break;
        
    default:
        break;



}















?>