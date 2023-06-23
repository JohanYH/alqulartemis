<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if (isset($_POST['Cliente'])) {
  $url ="http://localhost/SkylAb-113/alqulartemis/fullStack/apiRest/controllers/Cliente.php?op=Insert";

  $data = array(
    'Nombre_Cliente' => $_POST['Nombre_Cliente'],
    'Telefono_Cliente' => $_POST['Telefono_Cliente']
  );

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

  $response = curl_exec($ch);
  curl_close($ch);

  echo "<script>alert('Datos Guardados');document.location='cliente'</script>";

}
?>
<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Crear Cliente
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo cliente</h1>
        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body text-left">
        <form action="" method="post">
            <div>
                <label for="">Nombre</label>
                <input class="form-control" type="text" name="Nombre_Cliente">
            </div>
            <div>
                <label for="">Telefono</label>
                <input class="form-control" type="text" name="Telefono_Cliente">
            </div>
             <input type="submit" value="Crear Cliente" name="Cliente" class="btn btn-dark mt-3">
        </form>
      </div>
    </div>
  </div>
</div>
