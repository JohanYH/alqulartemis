<?php
$url = "http://localhost/SkylAb-113/alqulartemis/fullStack/apiRest/controllers/Empleado.php?op=GetAll";
$curl = curl_Init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$output = json_decode(curl_exec($curl));
curl_close($curl);

?>

<?php
    include_once("new.php");
    include_once("edit.php")
    
?>


<table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Empleado</th>
                      <th>Telefono Empleado</th>
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
                      <td><?php echo $out->Empleado_ID; ?></td>
                      <td><?php echo $out->Nombre_Empleado; ?></td>
                      <td><?php echo $out->Telefono_Empleado; ?></td>
                      <td>
                            <form action="" method="POST">
                                <input type="hidden" name="Empleado_ID" value="<?php echo $out->Empleado_ID;?>">
                                <input type="submit" value="Eliminar" name="Eliminar" class="btn btn-danger">
                            </form>
                            <?php 
                            include ("delete.php");
                            ?>
                        </td>
                      <td>
                      <form action="" method="POST">
                                
                                <input type="hidden" name="edit" value="<?php echo $out->Empleado_ID;?>">
                                <input type="submit" value="Editar" name="Editar" class="btn btn-warning">
                            </form>
                      </td>
                    </tr>
                    <?php
                        }
                    ?>
                  </tbody>
</table>