<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if (isset($_POST['Entrada'])) {
  $url ="http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Entrada.php?op=Insert";

  $data = array(
    'Fecha_Salida' => $_POST['Fecha_Salida'],
    'Nombre_Empleado' => $_POST['Nombre_Empleado'],
    'Nombre_Cliente' => $_POST['Nombre_Cliente'],
    'Fecha_Entrada' => $_POST['Fecha_Entrada'],
    'Hora_Entrada' => $_POST['Hora_Entrada'],
    'Observaciones' => $_POST['Observaciones']
  );

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

  $response = curl_exec($ch);
  curl_close($ch);

  echo "<script>alert('Datos Guardados');document.location='entrada'</script>";

}

$url="http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Cliente.php?op=GetAll";
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
$result=json_decode(curl_exec($curl));

$url2="http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Alquiler.php?op=GetAll";
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,$url2);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
$results=json_decode(curl_exec($curl));

$url3="http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Empleado.php?op=GetAll";
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,$url3);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
$results2=json_decode(curl_exec($curl));

?>
<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Crear Entrada
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Entrada</h1>
        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body text-left">
        <form action="" method="post">
        <div>
                <label for="">Fecha Salida</label>
                <select name="Fecha_Salida" class="form-control">
                  <?php foreach ($results as $key => $value){?>
                    <option value="<?php echo $value->Alquiler_ID; ?>"><?php echo $value->Fecha_Salida; ?></option>
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
                <label for="">Cliente</label>
                <select name="Nombre_Cliente" class="form-control">
                  <?php foreach ($result as $key => $value){?>
                    <option value="<?php echo $value->Cliente_ID; ?>"><?php echo $value->Nombre_Cliente; ?></option>
                 <?php }?>
                </select>
            </div>
            <div>
                <label for="">Fecha Entrada </label>
                <input class="form-control" type="date" name="Fecha_Entrada">
            </div>
            <div>
                <label for="">Hora Entrada</label>
                <input class="form-control" type="time" name="Hora_Entrada">
            </div>
            <div>
                <label for="">Observaciones</label>
                <input class="form-control" type="text" name="Observaciones">
            </div>
            
             <input type="submit" value="Crear Entrada" name="Entrada" class="btn btn-dark mt-3">
        </form>
      </div>
    </div>
  </div>
</div>