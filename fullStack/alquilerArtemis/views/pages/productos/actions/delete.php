<?php
if (isset($_POST['Eliminar'])) {
    $url = "http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Producto.php?op=Delete";
    $data = array(
        'Productos_ID' => $_POST['Productos_ID']
    );

    $product = curl_init();
    curl_setopt($product, CURLOPT_URL, $url);
    curl_setopt($product, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($product, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($product, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($product, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    

    $response = curl_exec($product);
    curl_close($product);
    print $response;
    print_r($data);

    echo "<script>alert('Cliente eliminado');document.location='producto'</script>";
}
?>