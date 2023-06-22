<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);


$url = "http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Obra.php?op=GetAll";
$curl = curl_Init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$output = json_decode(curl_exec($curl));
curl_close($curl);

?>


<table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Cliente</th>
                      <th>Nombre Obra</th>
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
                      <td><?php echo $out->Obra_ID; ?></td>
                      <?php $url = "http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Cliente.php?op=GetId";
                        $data = array(
                            'Cliente_ID' => $out->Cliente_ID
                        );
                        $ch = curl_Init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                        $response = curl_exec($ch);
                        curl_close($ch);
                        $clientes = json_decode($response, true);
                        $cliente = $clientes[0];?>
                      <td><?php echo $cliente['Nombre_Cliente']; ?></td>
                      <td><?php echo $out->Nombre_Obra; ?></td>
                      <td>
                            <form action="" method="POST">
                                <input type="hidden" name="Obra_ID" value="<?php echo $out->Obra_ID;?>">
                                <input type="submit" value="Eliminar" name="Eliminar" class="btn btn-danger">
                            </form>
                        </td>
                      <td>
                      <form action="" method="POST">
                                <input type="hidden" name="edit" value="<?php echo $out->Obra_ID;?>">
                                <input type="submit" value="Editar" name="Editar" class="btn btn-warning">
                            </form>
                      </td>
                    </tr>
                    <?php
                        }
                    ?>
                  </tbody>
</table>