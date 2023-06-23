<?php
$url = "http://localhost/ArTeM01-043/alqulartemis/fullStack/apiRest/controllers/Inventario.php?op=GetAll";
$curl = curl_Init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$output = json_decode(curl_exec($curl));
curl_close($curl);

function Productos()
{
  try {
    $conectar = new PDO("mysql:host=localhost;dbname=AlquilerArtemis", "campus", "campus2023");
    $sql = ("SELECT Inventario.Inventario_ID, Productos.Nombre_Productos FROM Inventario 
    INNER JOIN Productos ON Inventario.Productos_ID = Productos.Productos_ID");
    $stm = $conectar->prepare($sql);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    $conectar = null;
    return $result;
  } catch (Exception $e) {
    return $e->getMessage();
  }
}

?>
<?php
    include_once("new.php");
?>

<table class="table table-head-fixed text-nowrap">
<?php
  
  $results = Productos();

  $nombres = array();
  foreach($results as $row){ //Error checking
    array_push($nombres, $row['Nombre_Productos']);
  }
  $x=1;
  
?>
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Productos</th>
                      <th>Cantidad Inicial</th>
                      <th>Cantidad Ingresos</th>
                      <th>Cantidad Salidas</th>
                      <th>Cantidad Final</th>
                      <th>Fecha</th>
                      <th>Operacion</th>
                      <th>Borrar</th>
                      <th>Editar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($output as $out)
                        {
                          $nombre = $x-1;
                          $x++;
                    ?>
                    <tr>
                      <td><?php echo $out->Inventario_ID; ?></td>
                      <td><?php echo $nombres[$nombre];?></td>
                      <td><?php echo $out->CantidadInicial; ?></td>
                      <td><?php echo $out->CantidadIngresos; ?></td>
                      <td><?php echo $out->CantidadSalidas; ?></td>
                      <td><?php echo $out->CantidadFinal; ?></td>
                      <td><?php echo $out->FechaInventario; ?></td>
                      <td><?php echo $out->TipoOperancion; ?></td>
                      <td>
                            <form action="" method="POST">
                                <input type="hidden" name="Inventario_ID" value="<?php echo $out->Inventario_ID;?>">
                                <input type="submit" value="Eliminar" name="Eliminar" class="btn btn-danger">
                            </form>
                            <?php
                              include ("delete.php")
                            ?>
                        </td>
                      <td>
                      <form action="" method="POST">
                                <input type="hidden" name="Edit" value="<?php echo $out->Inventario_ID;?>">
                                <input type="submit" value="Editar" name="Editar" class="btn btn-warning">
                            </form>
                      </td>
                    </tr>
                    <?php
                        }
                    ?>
                  </tbody>
</table>