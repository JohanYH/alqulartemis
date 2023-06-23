<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if (isset($_POST['Alquiler'])) {
  $url ="http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Alquiler_Detalle.php?op=Insert";

  $data = array(
    'Fecha_Salida' => $_POST['Fecha_Salida'],
    'Nombre_Productos' => $_POST['Nombre_Productos'],
    'Nombre_Empleado' => $_POST['Nombre_Empleado'],
    'Nombre_Obra' => $_POST['Nombre_Obra'],
    'Cantidad_Salida' => $_POST['Cantidad_Salida'],
    'Cantidad_Propia' => $_POST['Cantidad_Propia'],
    'Cantidad_Subalquilada' => $_POST['Cantidad_Subalquilada'],
    'ValorUnida' => $_POST['ValorUnida'],
    'Fecha_StanBye' => $_POST['Fecha_StanBye'],
    'Estado' => $_POST['Estado']
  );

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

  $response = curl_exec($ch);
  curl_close($ch);

  echo "<script>alert('Datos Guardados');document.location='alquiler_detalle'</script>";

}

$url="http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Alquiler.php?op=GetAll";
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
$result=json_decode(curl_exec($curl));

$url2="http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Producto.php?op=GetAll";
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,$url2);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
$results=json_decode(curl_exec($curl));

$url2="http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Obra.php?op=GetAll";
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,$url2);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
$results1=json_decode(curl_exec($curl));

$url2="http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Empleado.php?op=GetAll";
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,$url2);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
$results2=json_decode(curl_exec($curl));

  
?>
<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Crear Alquiler
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Alquiler Detalle</h1>
        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body text-left">
        <form action="" method="post">
            <div>
                <label for="">Fecha Salida</label>
                <select name="Fecha_Salida" class="form-control">
                  <?php foreach ($result as $key => $value){?>
                    <option value="<?php echo $value->Alquiler_ID; ?>"><?php echo $value->Fecha_Salida; ?></option>
                 <?php }?>
                </select>
            </div>
            <div>
                <label for="">Productos</label>
                <select name="Nombre_Productos" class="form-control">
                  <?php foreach ($results as $key => $value){?>
                    <option value="<?php echo $value->Productos_ID; ?>"><?php echo $value->Nombre_Productos; ?></option>
                 <?php }?>
                </select>
            </div>
            <div>
                <label for="">Empleado</label>
                <select name="Nombre_Empleado" class="form-control">
                  <?php foreach ($results2 as $key => $value){?>
                    <option value="<?php echo $value->Empleado_ID; ?>"><?php echo $value->Nombre_Empleado; ?></option>
                 <?php }?>
                </select>
            </div>
            <div>
                <label for="">Obra</label>
                <select name="Nombre_Obra" class="form-control">
                  <?php foreach ($results1 as $key => $value){?>
                    <option value="<?php echo $value->Obra_ID; ?>"><?php echo $value->Nombre_Obra; ?></option>
                 <?php }?>
                </select>
            </div>
            <div>
                <label for="">Cantidad Salida</label>
                <input class="form-control" type="text" name="Cantidad_Salida">
            </div>
            <div>
                <label for="">Cantidad Propia</label>
                <input class="form-control" type="text" name="Cantidad_Propia">
            </div>
            <div>
                <label for="">Cantidad SubAlquilada</label>
                <input class="form-control" type="text" name="Cantidad_Subalquilada">
            </div>
            
            <div>
                <label for="">ValorUnida</label>
                <input class="form-control" type="text" name="ValorUnida">
            </div>
            <div>
              <label for="">Fecha_StanBye</label>
              <input class="form-control" type="date" name="Fecha_StanBye">
            </div>
            <div>
              <label for="">Estado</label>
              <input class="form-control" type="text" name="Estado">
            </div>
             <input type="submit" value="Crear Alquiler" name="Alquiler" class="btn btn-dark mt-3">
        </form>
      </div>
    </div>
  </div>
</div>