<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if (isset($_POST['guardar'])) {
    $url = "http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Producto.php?op=Insert";
    $data = array(
        'Nombre_Cliente' => $_POST['Nombre_Cliente'], 
        'Telefono_Cliente' => $_POST['Telefono_Cliente'],
    );

    $customer = curl_init();
    curl_setopt($customer, CURLOPT_URL, $url);
    curl_setopt($customer, CURLOPT_POST,true);
    curl_setopt($customer, CURLOPT_POSTFIELDS, json_encode($data)); 
    curl_setopt($customer, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $response = curl_exec ($customer);
    curl_close($customer);
    print $response;

    echo "<script>alert('Cliente Guardado');document.location='cliente'</script>";
}
?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#new" data-bs-whatever="@mdo">Crear Producto</button>


<div class="modal fade" id="new" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>