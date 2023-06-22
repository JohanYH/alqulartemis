<?php
if (isset($_POST['Eliminar'])) {
    $url = "http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Empleado.php?op=Delete";
    $data = array(
        'Empleado_ID' => $_POST['Empleado_ID']
    );

    $employe = curl_init();
    curl_setopt($employe, CURLOPT_URL, $url);
    curl_setopt($employe, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($employe, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($employe, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($employe, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    

    $response = curl_exec($employe);
    curl_close($employe);
    print $response;
    print_r($data);

    echo "<script>alert('Cliente eliminado');document.location='empleado'</script>";
}
?>