<?php
$url = "http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Producto.php?op=GetAll";
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
                      <th>Productos</th>
                      <th>Descripcion</th>
                      <th>Precio</th>
                      <th>Stock</th>
                      <th>Categoria</th>
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
                      <td><?php echo $out->Productos_ID; ?></td>
                      <td><?php echo $out->Nombre_Productos; ?></td>
                      <td><?php echo $out->Descripcion; ?></td>
                      <td><?php echo $out->Precio; ?></td>
                      <td><?php echo $out->Stock; ?></td>
                      <td><?php echo $out->Categoria; ?></td>
                      <td>
                            <form action="" method="POST">
                                <input type="hidden" name="Productos_ID" value="<?php echo $out->Productos_ID;?>">
                                <input type="submit" value="Eliminar" name="Eliminar" class="btn btn-danger">
                            </form>
                        </td>
                      <td>
                      <form action="" method="POST">
                                <input type="hidden" name="edit" value="<?php echo $out->Productos_ID;?>">
                                <input type="submit" value="Editar" name="Editar" class="btn btn-warning">
                            </form>
                      </td>
                    </tr>
                    <?php
                        }
                    ?>
                  </tbody>
</table>