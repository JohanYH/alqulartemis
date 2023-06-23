<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if (isset($_POST['Obra'])) {
  $url ="http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Obra.php?op=Insert";

  $data = array(
    'Nombre_Cliente' => $_POST['Nombre_Cliente'],
    'Nombre_Obra' => $_POST['Nombre_Obra']
  );

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

  $response = curl_exec($ch);
  curl_close($ch);

  echo "<script>alert('Datos Guardados');document.location='obra'</script>";

}

$url="http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Cliente.php?op=GetAll";
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
$result=json_decode(curl_exec($curl));

?>
<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Crear Alquiler
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
                <label for="">Cliente</label>
                <select name="Nombre_Cliente" class="form-control">
                  <?php foreach ($result as $key => $value){?>
                    <option value="<?php echo $value->Cliente_ID; ?>"><?php echo $value->Nombre_Cliente; ?></option>
                 <?php }?>
                </select>
            </div>
            <div>
                <label for="">Nombre Obra</label>
                <input class="form-control" type="text" name="Nombre_Obra">
            </div>
             <input type="submit" value="Crear Producto" name="Obra" class="btn btn-dark mt-3">
        </form>
      </div>
    </div>
  </div>
</div>