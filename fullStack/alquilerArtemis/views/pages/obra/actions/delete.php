<?php
if (isset($_POST['Eliminar'])) {
    $url = "http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Obra.php?op=Delete";
    $data = array(
        'Obra_ID' => $_POST['Obra_ID']
    );

    $obrar = curl_init();
    curl_setopt($obrar, CURLOPT_URL, $url);
    curl_setopt($obrar, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($obrar, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($obrar, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($obrar, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    

    $response = curl_exec($obrar);
    curl_close($obrar);
    print $response;
    print_r($data);

    echo "<script>alert('Cliente eliminado');document.location='obra'</script>";
}
?>