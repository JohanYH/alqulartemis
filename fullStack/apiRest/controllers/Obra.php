<?php

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

header ('Contet-Type: application/json');

require_once("../config/Conectar.php");
require_once("../models/obras.php");

$obra = new Obras();

$body = json_decode(file_get_contents("php://input"),true);

switch ($_GET["op"]){
    case 'GetAll':
        $datos = $obra->get_Obra();
        echo json_encode($datos);
        break;

    case 'GetId':
        $datos = $obra->get_Obras_ID($body["Obra_ID"]);
        echo json_encode($datos);
        break;
       
    case 'Insert':
        $datos = $obra->InsertObra($body["Cliente_ID"],$body["Nombre_Obra"]);
        echo json_encode("Obra insertado correctamente..");
        break;
         
    case 'Delete':
        $datos = $obra->DeleteObra($body["Obra_ID"]);
        echo json_encode("Obra Borrada correctamente..");
        break;
         
    case 'Update':
        $datos = $obra->update_Obra($body['Obra_ID'],$body['Cliente_ID'], $body['Nombre_Obra'], $body['Obra_ID']);
        echo json_encode("Obra actualizado");
        break;
        
    default:
        break;



}

?>
