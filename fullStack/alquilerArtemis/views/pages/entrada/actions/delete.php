<?php
if (isset($_POST['Eliminar'])) {
    $url = "http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Entrada.php?op=Delete";
    $data = array(
        'Entrda_ID' => $_POST['Entrada_ID']
    );

    $open = curl_init();
    curl_setopt($open, CURLOPT_URL, $url);
    curl_setopt($open, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($open, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($open, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($open, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    

    $response = curl_exec($open);
    curl_close($open);
    print $response;
    print_r($data);

    echo "<script>alert('Cliente eliminado');document.location='entrada'</script>";
}
?>