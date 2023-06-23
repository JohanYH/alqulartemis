<?php 
if (isset($_POST['editCliente'])) {
  $url = "http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Cliente.php?op=GetId";
  $data = array(
      'Cliente_ID' => $_POST['edit']
  );
  
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
  
  $response = curl_exec($ch);
  curl_close($ch);
  
  $clientes = json_decode($response, true);
  $cliente = $clientes[0];

?>
<form action="" method="post">
            <div>
                <label for="">nombre</label>
                <input type="text" name="nombre_editado" value="<?php echo $clientes['Nombre_Cliente']; ?>">
            </div>
            <div>
                <label for="">telefono</label>
                <input type="number" name="telefono_editado" value="<?php echo $clientes['Telefono_Cliente']; ?>">
            </div>
           
            <input type="hidden" name="editando_id" value="<?php echo $clientes['Cliente_ID']; ?>">
            <input type="submit" value="Editar Cliente" name="editarCliente">
</form>
<?php } ?>
<?php
if (isset($_POST['editarCliente'])) {
    $url = "http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Cliente.php?op=Update";
    $data = array(
        'Cliente_ID' => $_POST['editando_id'],
        'nombre' => $_POST['nombre_editado'], 
        'direccion' => $_POST['direccion_editado'],
        'telefono' => $_POST['telefono_editado'],
        'email' => $_POST['email_editado'],
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $response = curl_exec($ch);
    curl_close($ch);
    print $response;

    echo "<script>alert('alquiler editado');document.location='cliente'</script>";
}


?>


?>
