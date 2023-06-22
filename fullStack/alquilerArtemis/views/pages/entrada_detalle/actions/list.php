<?php
$url = "http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Entrada_Detalle.php?op=GetAll";
$curl = curl_Init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$output = json_decode(curl_exec($curl));
curl_close($curl);

?>
<?php
    include_once("new.php");
?>

<table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Entrada</th>
                      <th>Productos</th>
                      <th>Obra</th>
                      <th>Entrada Cantidad</th>
                      <th>Entrada Cantidad Propia</th>
                      <th>Entrada Cantidad SubAlquilada</th>
                      <th>Estado</th>
                      <th>Borrar</th>
                      <th>Editar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($output as $out)
                        {
                    ?>
                    <tr>
                      <td><?php echo $out->Entrada_Detalle_ID; ?></td>
                      <td><?php echo $out->Entrada_ID; ?></td>
                      <td><?php echo $out->Productos_ID; ?></td>
                      <td><?php echo $out->Obra_ID; ?></td>
                      <td><?php echo $out->Entrada_Cantidad; ?></td>
                      <td><?php echo $out->Entrada_Cantidad_Propia; ?></td>
                      <td><?php echo $out->Entrada_Cantidad_Subaquilada; ?></td>
                      <td><?php echo $out->Estado; ?></td>
                      <td>
                            <form action="" method="POST">
                                <input type="hidden" name="Entrada_Detalle_ID" value="<?php echo $out->Entrada_Detalle_ID;?>">
                                <input type="submit" value="Eliminar" name="Eliminar" class="btn btn-danger">
                            </form>
                            <?php
                              include ("delete.php")
                            ?>
                        </td>
                      <td>
                      <form action="" method="POST">
                                <input type="hidden" name="Edit" value="<?php echo $out->Entrada_Detalle_ID;?>">
                                <input type="submit" value="Editar" name="Editar" class="btn btn-warning">
                            </form>
                      </td>
                    </tr>
                    <?php
                        }
                    ?>
                  </tbody>
</table>