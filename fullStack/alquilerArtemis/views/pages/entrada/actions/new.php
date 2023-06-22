<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if (isset($_POST['Cliente'])) {
    $url = "http://localhost/SkylAb-147/alqulartemis/fullStack/apiRest/controllers/Cliente.php?op=Insert";
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
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Crear Cliente
</button>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Detalles
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
            <div>
                <label for="">Cliente</label>
                <input type="text" name="Nombre_Cliente">
            </div>
            <div>
                <label for="">Telefono</label>
                <input type="number" name="Telefono_Cliente">
            </div>
           
            <input type="submit" value="enviar" name="Cliente">
        </form>
      </div>
    </div>
  </div>
</div>