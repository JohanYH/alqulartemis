<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if (isset($_POST['Entrada'])) {
  $url ="http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Entrada_Detalle.php?op=Insert";

  $data = array(
    'Fecha_Entrada' => $_POST['Fecha_Entrada'],
    'Nombre_Productos' => $_POST['Nombre_Productos'],
    'Nombre_Obra' => $_POST['Nombre_Obra'],
    'Entrada_Cantidad' => $_POST['Entrada_Cantidad'],
    'Entrada_Cantidad_Propia' => $_POST['Entrada_Cantidad_Propia'],
    'Entrada_Cantidad_Subaquilada' => $_POST['Entrada_Cantidad_Subaquilada'],
    'Estado' => $_POST['Estado']
  );

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

  $response = curl_exec($ch);
  curl_close($ch);

  echo "<script>alert('Datos Guardados');document.location='entrada_detalle'</script>";

}

$url="http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Entrada.php?op=GetAll";
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
$result=json_decode(curl_exec($curl));

$url2="http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Producto.php?op=GetAll";
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,$url2);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
$results=json_decode(curl_exec($curl));

$url3="http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Obra.php?op=GetAll";
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo cliente</h1>
        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body text-left">
        <form action="" method="post">
            <div>
                <label for="">Fecha Entrada</label>
                <select name="Fecha_Entrada" class="form-control">
                  <?php foreach ($result as $key => $value){?>
                    <option value="<?php echo $value->Entrada_ID; ?>"><?php echo $value->Fecha_Entrada; ?></option>
                 <?php }?>
                </select>
            </div>
            <div>
                <label for="">Producto</label>
                <select name="Nombre_Productos" class="form-control">
                  <?php foreach ($results as $key => $value){?>
                    <option value="<?php echo $value->Productos_ID; ?>"><?php echo $value->Nombre_Productos; ?></option>
                 <?php }?>
                </select>
            </div>
            <div>
                <label for="">Obra</label>
                <select name="Nombre_Obra" class="form-control">
                  <?php foreach ($results2 as $key => $value){?>
                    <option value="<?php echo $value->Obra_ID; ?>"><?php echo $value->Nombre_Obra; ?></option>
                 <?php }?>
                </select>
            </div>
            <div>
                <label for="">Entrada Cantidad</label>
                <input class="form-control" type="text" name="Entrada_Cantidad">
            </div>
            <div>
                <label for="">Entrada_Cantidad_Propia</label>
                <input class="form-control" type="text" name="Entrada_Cantidad_Propia">
            </div>
            <div>
                <label for="">Entrada_Cantidad_Subaquilada</label>
                <input class="form-control" type="text" name="Entrada_Cantidad_Subaquilada">
            </div>
            <div>
                <label for="">Estado</label>
                <input class="form-control" type="text" name="Estado">
            </div>
            
             <input type="submit" value="Crear Entrada" name="Entrada" class="btn btn-dark mt-3">
        </form>
      </div>
    </div>
  </div>
</div>