<?php
$url = "http://localhost/SkylAb-147/alqulartemis/fullStack/apiRest/controllers/Alquiler_Detalle.php?op=GetAll";
$curl = curl_Init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$output = json_decode(curl_exec($curl));
curl_close($curl);

function Alquileres()
{
  try {
    $conectar = new PDO("mysql:host=localhost;dbname=AlquilerArtemis", "campus", "campus2023");
    $sql = ("SELECT Alquiler_Detalle.Alquiler_Detalle_ID, Alquiler.Fecha_Salida, Productos.Nombre_Productos, Obra.Nombre_Obra, Empleado.Nombre_Empleado FROM Alquiler_Detalle 
    INNER JOIN Alquiler ON Alquiler_Detalle.Alquiler_ID = Alquiler.Alquiler_ID
    INNER JOIN Productos ON Alquiler_Detalle.Productos_ID = Productos.Productos_ID
    INNER JOIN Obra ON Alquiler_Detalle.Obra_ID = Obra.Obra_ID
    INNER JOIN Empleado ON Alquiler_Detalle.Empleado_ID = Empleado.Empleado_ID");
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
    include("new.php");
?>

<table class="table table-head-fixed text-nowrap">
<?php
  
  $results = Alquileres();

  $alquiler = array();
  $product = array();
  $obra = array();
  $employe = array();
  foreach($results as $row){ 
    array_push($alquiler, $row['Fecha_Salida']);
  
  }
  $x=1;

  foreach($results as $rowsw){ 
    array_push($product, $rowsw['Nombre_Productos']);
  
  }
  $a=1;

  foreach($results as $roww){ 
    array_push($obra, $roww['Nombre_Obra']);
  
  }
  $b=1;

  foreach($results as $rows){
    array_push($employe, $rows['Nombre_Empleado']);
  }
  $e=1;

  
  
?>
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Alquiler</th>
                      <th>Productos</th>
                      <th>Obra</th>
                      <th>Empleado</th>
                      <th>Cantidad Salida</th>
                      <th>Cantidad Propia</th>
                      <th>Cantidad SubAlquilada</th>
                      <th>ValorUnida</th>
                      <th>Fecha StanBye</th>
                      <th>Estado</th>
                      <th>Borrar</th>
                      <th>Editar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($output as $out)
                        {
                          $alquileres = $x-1;
                          $x++;

                          $products = $a-1;
                          $a++;

                          $obras = $b-1;
                          $b++;

                          $employes = $e-1;
                          $e++;
                    ?>
                    <tr>
                      <td><?php echo $out->Alquiler_Detalle_ID; ?></td>
                      <td><?php echo $alquiler[$alquileres];?></td>
                      <td><?php echo $product[$products]; ?></td>
                      <td><?php echo $obra[$obras]; ?></td>
                      <td><?php echo $employe[$employes]; ?></td>
                      <td><?php echo $out->Cantidad_Salida; ?></td>
                      <td><?php echo $out->Cantidad_Propia; ?></td>
                      <td><?php echo $out->Cantidad_Subalquilada; ?></td>
                      <td><?php echo $out->ValorUnida; ?></td>
                      <td><?php echo $out->Fecha_StanBye; ?></td>
                      <td><?php echo $out->Estado; ?></td>
                      <td>
                            <form action="" method="POST">
                                <input type="hidden" name="Alquiler_Detalle_ID" value="<?php echo $out->Alquiler_Detalle_ID;?>">
                                <input type="submit" value="Eliminar" name="Eliminar" class="btn btn-danger">
                            </form>
                            <?php
                              include ("delete.php")
                            ?>
                        </td>
                      <td>
                      <form action="" method="POST">
                                <input type="hidden" name="Edit" value="<?php echo $out->Alquiler_Detalle_ID;?>">
                                <input type="submit" value="Editar" name="Editar" class="btn btn-warning">
                            </form>
                      </td>
                    </tr>
                    <?php
                        }
                    ?>
                  </tbody>
</table>