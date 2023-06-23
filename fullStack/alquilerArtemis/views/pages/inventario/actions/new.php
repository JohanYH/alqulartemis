<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if (isset($_POST['Obra'])) {
  $url ="http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Inventario.php?op=Insert";

  $data = array(
    'Nombre_Productos' => $_POST['Nombre_Productos'],
    'CantidadInicial' => $_POST['CantidadInicial'],
    'CantidadIngresos' => $_POST['CantidadIngresos'],
    'CantidadSalidas' => $_POST['CantidadSalidas'],
    'CantidadFinal' => $_POST['CantidadFinal'],
    'FechaInventario' => $_POST['FechaInventario'],
    'TipoOperancion' => $_POST['TipoOperancion']
  );

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

  $response = curl_exec($ch);
  curl_close($ch);

  echo "<script>alert('Datos Guardados');document.location='inventario'</script>";

}

$url2="http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Producto.php?op=GetAll";
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,$url2);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
$results=json_decode(curl_exec($curl));

?>
<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Crear Inventario
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Inventario</h1>
        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body text-left">
        <form action="" method="post">
            <div>
                <label for="">Productos</label>
                <select name="Nombre_Productos" class="form-control">
                  <?php foreach ($results as $key => $value){?>
                    <option value="<?php echo $value->Productos_ID; ?>"><?php echo $value->Nombre_Productos; ?></option>
                 <?php }?>
                </select>
            </div>
            <div>
                <label for="">Cantidad Inicial</label>
                <input class="form-control" type="text" name="CantidadInicial">
            </div>
            <div>
                <label for="">Cantidad Ingresos</label>
                <input class="form-control" type="text" name="CantidadIngresos">
            </div>
            <div>
                <label for="">Cantidad Salidas</label>
                <input class="form-control" type="text" name="CantidadSalidas">
            </div>
            <div>
                <label for="">Cantidad Final</label>
                <input class="form-control" type="text" name="CantidadFinal">
            </div>
            <div>
                <label for="">Fecha Inventario</label>
                <input class="form-control" type="date" name="FechaInventario">
            </div>
            <div>
                <label for="">Operancion</label>
                <input class="form-control" type="text" name="TipoOperancion">
            </div>
             <input type="submit" value="Crear Producto" name="Obra" class="btn btn-dark mt-3">
        </form>
      </div>
    </div>
  </div>
</div>