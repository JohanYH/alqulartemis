<?php
if (isset($_POST['Eliminar'])) {
    $url = "http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Cliente.php?op=Delete";
    $data = array(
        'Cliente_ID' => $_POST['Cliente_ID']
    );

    $customer = curl_init();
    curl_setopt($customer, CURLOPT_URL, $url);
    curl_setopt($customer, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($customer, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($customer, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($customer, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    

    $response = curl_exec($customer);
    curl_close($customer);
    print $response;
    print_r($data);

    echo "<script>alert('Cliente eliminado');document.location='cliente'</script>";
}
?>