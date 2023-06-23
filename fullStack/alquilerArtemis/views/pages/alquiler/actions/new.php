<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if (isset($_POST['Alquiler'])) {
  $url ="http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Alquiler.php?op=Insert";

  $data = array(
    'Nombre_Cliente' => $_POST['Nombre_Cliente'],
    'Fecha_Salida' => $_POST['Fecha_Salida'],
    'Hora_Salida' => $_POST['Hora_Salida'],
    'SubtotalPeso' => $_POST['SubtotalPeso'],
    'Nombre_Empleado' => $_POST['Nombre_Empleado'],
    'PlacaTransporte' => $_POST['PlacaTransporte'],
    'Observaciones' => $_POST['Observaciones']
  );

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

  $response = curl_exec($ch);
  curl_close($ch);

  echo "<script>alert('Datos Guardados');document.location='alquiler'</script>";

}

$url="http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Cliente.php?op=GetAll";
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
$result=json_decode(curl_exec($curl));

$url2="http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Empleado.php?op=GetAll";
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,$url2);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
$results=json_decode(curl_exec($curl));

  
?>
<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Crear Alquiler
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Alquiler</h1>
        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body text-left">
        <form action="" method="post">
            <div>
                <label for="">Cliente</label>
                <select name="Nombre_Cliente" class="form-control">
                  <?php foreach ($result as $key => $value){?>
                    <option value="<?php echo $value->Cliente_ID; ?>"><?php echo $value->Nombre_Cliente; ?></option>
                 <?php }?>
                </select>
            </div>
            <div>
                <label for="">Fecha Salida</label>
                <input class="form-control" type="date" name="Fecha_Salida">
            </div>
            <div>
                <label for="">Hora Salida</label>
                <input class="form-control" type="time" name="Hora_Salida">
            </div>
            <div>
                <label for="">Sub total Peso</label>
                <input class="form-control" type="text" name="SubtotalPeso">
            </div>
            <div>
                <label for="">Empleado</label>
                <select name="Nombre_Empleado" class="form-control">
                  <?php foreach ($results as $key => $value){?>
                    <option value="<?php echo $value->Empleado_ID; ?>"><?php echo $value->Nombre_Empleado; ?></option>
                 <?php }?>
                </select>
            </div>
            <div>
                <label for="">Placa Transporte </label>
                <input class="form-control" type="text" name="PlacaTransporte">
            </div>
            <div>
              <label for="">Observaciones</label>
              <input class="form-control" type="text" name="Observaciones">
            </div>
             <input type="submit" value="Crear Alquiler" name="Alquiler" class="btn btn-dark mt-3">
        </form>
      </div>
    </div>
  </div>
</div>


