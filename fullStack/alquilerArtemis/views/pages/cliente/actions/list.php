<?php
$url = "http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Cliente.php?op=GetAll";
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
                      <th>Cliente Nombre</th>
                      <th>Telefono Cliente</th>
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
                      <td><?php echo $out->Cliente_ID; ?></td>
                      <td><?php echo $out->Nombre_Cliente; ?></td>
                      <td><?php echo $out->Telefono_Cliente; ?></td>
                      <td>
                            <form action="" method="POST">
                                <input type="hidden" name="Cliente_ID" value="<?php echo $out->Cliente_ID;?>">
                                <input type="submit" value="Eliminar" name="Eliminar" class="btn btn-danger">
                            </form>
                            <?php
                              include("delete.php");
                            ?>
                      </td>
                      <td>
                      <form action="" method="POST">
                        <input type="hidden" name="edit" value="<?php echo $out->Cliente_ID; ?>">
                        <input type="submit" value="Editar" name="editCliente" class="btn btn-warning">  
                      </form>
                      </td>
                    </tr>
                    <?php
                        }
                    ?>
                  </tbody>
                  
</table>


