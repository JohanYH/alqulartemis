<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if (isset($_POST['Productos'])) {
  $url ="http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Producto.php?op=Insert";

  $data = array(
    'Nombre_Productos' => $_POST['Nombre_Productos'],
    'Descripcion' => $_POST['Descripcion'],
    'Precio' => $_POST['Precio'],
    'Stock' => $_POST['Stock'],
    'Categoria' => $_POST['Categoria']
  );

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

  $response = curl_exec($ch);
  curl_close($ch);

  echo "<script>alert('Datos Guardados');document.location='productos'</script>";

}



?>
<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Crear Producto
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Producto</h1>
        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body text-left">
        <form action="" method="post">
            <div>
                <label for="">Nombre Producto</label>
                <input class="form-control" type="text" name="Nombre_Productos">
            </div>
            <div>
                <label for="">Descripcion</label>
                <input class="form-control" type="text" name="Descripcion">
            </div>
            <div>
                <label for="">Precio</label>
                <input class="form-control" type="number" name="Precio">
            </div>
            
            <div>
                <label for="">Stock</label>
                <input class="form-control" type="number" name="Stock">
            </div>
            <div>
              <label for="">Categoria</label>
              <input class="form-control" type="text" name="Categoria">
            </div>
             <input type="submit" value="Crear Producto" name="Productos" class="btn btn-dark mt-3">
        </form>
      </div>
    </div>
  </div>
</div>