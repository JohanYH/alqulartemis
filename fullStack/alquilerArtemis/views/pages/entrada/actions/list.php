<?php
$url = "http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Entrada.php?op=GetAll";
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
                      <th>Alquiler</th>
                      <th>Entrada</th>
                      <th>Cliente</th>
                      <th>Fecha Entrada</th>
                      <th>Hora Entrada</th>
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
                      <td><?php echo $out->Entrada_ID; ?></td>
                      <td><?php echo $out->Alquiler_ID; ?></td>
                      <td><?php echo $out->Empleado_ID; ?></td>
                      <td><?php echo $out->Cliente_ID; ?></td>
                      <td><?php echo $out->Fecha_Entrada; ?></td>
                      <td><?php echo $out->Hora_Entrada; ?></td>
                      <td><?php echo $out->Observaciones; ?></td>
                      <td>
                            <form action="" method="POST">
                                <input type="hidden" name="Entrada_ID" value="<?php echo $out->Entrada_ID;?>">
                                <input type="submit" value="Eliminar" name="Eliminar" class="btn btn-danger">
                            </form>
                            <?php
                              include ("delete.php")
                            ?>
                        </td>
                      <td>
                      <form action="" method="POST">
                                <input type="hidden" name="Edit" value="<?php echo $out->Entrada_ID;?>">
                                <input type="submit" value="Editar" name="Editar" class="btn btn-warning">
                            </form>
                      </td>
                    </tr>
                    <?php
                        }
                    ?>
                  </tbody>
</table>