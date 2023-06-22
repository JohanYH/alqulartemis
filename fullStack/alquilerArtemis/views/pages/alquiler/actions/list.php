<?php
$url = "http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Alquiler.php?op=GetAll";
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
                      <th>Cliente Nombre</th>
                      <th>Fecha Salida</th>
                      <th>Hora Salida</th>
                      <th>Subtotal Peso</th>
                      <th>Empleado</th>
                      <th>Placa Transporte</th>
                      <th>Observaciones</th>
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
                      <td><?php echo $out->Alquiler_ID; ?></td>
                      <td><?php echo $out->Nombre_Cliente; ?></td>
                      <td><?php echo $out->Fecha_Salida; ?></td>
                      <td><?php echo $out->Hora_Salida; ?></td>
                      <td><?php echo $out->SubtotalPeso; ?></td>
                      <td><?php echo $out->Empleado_ID; ?></td>
                      <td><?php echo $out->PlacaTransporte; ?></td>
                      <td><?php echo $out->Observaciones; ?></td>
                      <td>
                            <form action="" method="POST">
                                <input type="hidden" name="Alquiler_ID" value="<?php echo $out->Alquiler_ID;?>">
                                <input type="submit" value="Eliminar" name="Eliminar" class="btn btn-danger">
                            </form>
                            <?php
                              include ("delete.php")
                            ?>
                        </td>
                      <td>
                      <form action="" method="POST">
                                <input type="hidden" name="Edit" value="<?php echo $out->Alquiler_ID;?>">
                                <input type="submit" value="Editar" name="Editar" class="btn btn-warning">
                            </form>
                      </td>
                    </tr>
                    <?php
                        }
                    ?>
                  </tbody>
</table>