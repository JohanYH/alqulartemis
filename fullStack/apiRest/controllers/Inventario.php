<?php

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

header ('Contet-Type: application/json');

require_once("../config/Conectar.php");
require_once("../models/inventarios.php");

$inventarios = new Inventario();

$body = json_decode(file_get_contents("php://input"),true);

switch ($_GET["op"]){
    case 'GetAll':
        $datos = $inventarios->get_Inventario();
        echo json_encode($datos);
        break;

    case 'GetId':
        $datos = $inventarios->get_Inventario_ID($body["Inventario_ID"]);
        echo json_encode($datos);
        break;
       
    case 'Insert':
        $datos = $inventarios->InsertInventario($body["Nombre_Productos"],$body["CantidadInicial"],$body["CantidadIngresos"],$body["CantidadSalidas"],$body["CantidadFinal"],$body["FechaInventario"],$body["TipoOperancion"]);
        echo json_encode("Inventario insertado correctamente..");
        break;
         
    case 'Delete':
        $datos = $inventarios->DeleteInventario($body["Inventario_ID"]);
        echo json_encode("Inventario Borrada correctamente..");
        break;
         
    case 'Update':
        $datos = $inventarios->update_Invetario($body['Inventario_ID'],$body['Nombre_Productos'], $body['CantidadInicial'], $body['CantidadIngresos'], $body['CantidadSalidas'], $body['CantidadFinal'], $body['FechaInventario'],$body['TipoOperancion']);
        echo json_encode("Inventario actualizado");
        break;
        
    default:
        break;



}

?>