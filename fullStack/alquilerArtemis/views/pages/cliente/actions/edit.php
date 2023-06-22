<?php 
if (isset($_POST['Editar'])) {
  $url = "http://localhost/Alquilartemis/apirest/controllers/Cliente.php?op=GetId";
  $data = array(
      'Cliente_ID' => $_POST['EditarCliente']
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
                <label for="">Cliente</label>
                <input type="text" name="Nombre_Cliente" value="<?php echo $cliente['Nombre_Cliente']; ?>">
            </div>
            <div>
                <label for="">Telefono</label>
                <input type="number" name="Telefono_Cliente" value="<?php echo $cliente['Telefono_Cliente']; ?>">
            </div>
           
            <input type="hidden" name="editar_id" value="<?php echo $cliente['Cliente_ID']; ?>">
            <input type="submit" value="Editar Cliente" name="editarCliente">
        </form>
<?php } ?>
<?php
if (isset($_POST['editarCliente'])) {
    $url = "http://localhost/Alquilartemis/apirest/controllers/Cliente.php?op=Update";
    $data = array(
        'Cliente_ID' => $_POST['editar_id'],
        'Nombre_Cliente' => $_POST['Nombre_Cliente'], 
        'Telefono_Cliente' => $_POST['Telefono_Cliente'],
    );

    $customer = curl_init();
    curl_setopt($customer, CURLOPT_URL, $url);
    curl_setopt($customer, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($customer, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($customer, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($customer, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $response = curl_exec($customer);
    curl_close($customer);
    print $response;

    echo "<script>alert('alquiler editado');document.location='cliente'</script>";
}


?>
