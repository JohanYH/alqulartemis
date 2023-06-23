<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if (isset($_POST['guardar'])) {
    $url = "http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Cliente.php?op=Insert";
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
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#new" data-bs-whatever="@mdo">Crear Cliente</button>


<div class="modal fade" id="new" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Nuevo Cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="Nombre_Cliente" class="col-form-label">Nombre Cliente </label>
            <input 
            type="text" 
            class="form-control" 
            id="Nombre_Cliente"
            name="Nombre_Cliente">
          </div>
          <div class="mb-3">
            <label for="Telefono_Cliente" class="col-form-label">Telefono </label>
            <input 
            type="text" 
            class="form-control" 
            id="Telefono_Cliente"
            name="Telefono_Cliente">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="guardar" name="guardar">Guardar</button>
      </div>
    </div>
  </div>
</div>
