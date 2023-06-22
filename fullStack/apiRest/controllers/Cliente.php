<?php

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

header ('Content-Type: application/json');

include_once("../config/Conectar.php");
include_once("../models/clientes.php");

$clientes = new Cliente();

$body = json_decode(file_get_contents("php://input"),true);

switch ($_GET["op"]){
    case 'GetAll':
        $datos = $clientes->selectAll();
        echo json_encode($datos);
        break;

    case 'GetId':
        $datos = $clientes->selectOne($body["Cliente_ID"]);
        echo json_encode($datos);
        break;
       
    case 'Insert':
        $datos = $clientes->InsertCliente($body["Nombre_Cliente"], $body["Telefono_Cliente"]);
        echo json_encode("Cliente insertado correctamente..");
        break;
         
    case 'Delete':
        $datos = $clientes->DeleteCliente($body["Cliente_ID"]);
        echo json_encode("Cliente Borrado correctamente..");
        break;
         
    case 'Update':
        $datos = $clientes->update_Cliente($body['Cliente_ID'],$body['Nombre_Cliente'], $body['Telefono_Cliente']);
        echo json_encode("Cliente actualizado");
        break;
        
    default:
        break;



}

?>