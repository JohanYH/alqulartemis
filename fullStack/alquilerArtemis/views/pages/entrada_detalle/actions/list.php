<?php
$url = "http://localhost/SkylAb-147/alqulartemis/fullStack/apiRest/controllers/Entrada_Detalle.php?op=GetAll";
$curl = curl_Init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$output = json_decode(curl_exec($curl));
curl_close($curl);

function Alquileres()
{
  try {
    $conectar = new PDO("mysql:host=localhost;dbname=AlquilerArtemis", "campus", "campus2023");
    $sql = ("SELECT Entrada_Detalle.Entrada_Detalle_ID, Entrada.Hora_Entrada, Productos.Nombre_Productos, Obra.Nombre_Obra FROM Entrada_Detalle
    INNER JOIN Entrada ON  Entrada_Detalle.Entrada_ID = Entrada.Entrada_ID
    INNER JOIN Productos ON Entrada_Detalle.Productos_ID = Productos.Productos_ID 
    INNER JOIN Obra ON  Entrada_Detalle.Obra_ID = Obra.Obra_ID");
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
  
  $results = Alquileres();

  $entrada = array();
  $product = array();
  $obra = array();
  foreach($results as $row){ 
    array_push($entrada, $row['Hora_Entrada']);
  
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

  
?>
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
                          $entradas = $x-1;
                          $x++;

                          $products = $a-1;
                          $a++;

                          $obras = $b-1;
                          $b++;
                    ?>
                    <tr>
                      <td><?php echo $out->Entrada_Detalle_ID; ?></td>
                      <td><?php echo $entrada[$entradas]; ?></td>
                      <td><?php echo $product[$products]; ?></td>
                      <td><?php echo $obra[$obras]; ?></td>
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