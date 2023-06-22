<?php
if (isset($_POST['Eliminar'])) {
    $url = "http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Inventario.php?op=Delete";
    $data = array(
        'Inventario_ID' => $_POST['Inventario_ID']
    );

    $inventory = curl_init();
    curl_setopt($inventory, CURLOPT_URL, $url);
    curl_setopt($inventory, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($inventory, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($inventory, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($inventory, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    

    $response = curl_exec($inventory);
    curl_close($inventory);
    print $response;
    print_r($data);

    echo "<script>alert('Cliente eliminado');document.location='inventario'</script>";
}
?>