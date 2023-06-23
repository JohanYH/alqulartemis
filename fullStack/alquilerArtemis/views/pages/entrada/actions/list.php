<?php
$url = "http://localhost/SkylAb-113/alqulartemis/fullStack/apiRest/controllers/Entrada.php?op=GetAll";
$curl = curl_Init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$output = json_decode(curl_exec($curl));
curl_close($curl);

function Alquileres()
{
  try {
    $conectar = new PDO("mysql:host=localhost;dbname=AlquilerArtemis", "campus", "campus2023");
    $sql = ("SELECT Entrada.Entrada_ID, Alquiler.Fecha_Salida, Empleado.Nombre_Empleado, Cliente.Nombre_Cliente FROM Entrada
    INNER JOIN Alquiler ON Entrada.Alquiler_ID = Alquiler.Alquiler_ID
    INNER JOIN Empleado ON Entrada.Empleado_ID = Empleado.Empleado_ID 
    INNER JOIN Cliente ON Entrada.Cliente_ID = Cliente.Cliente_ID");
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
  $employe = array();
  $client = array();
  foreach($results as $row){ 
    array_push($alquiler, $row['Fecha_Salida']);
  
  }
  $x=1;

  foreach($results as $rowsw){ 
    array_push($employe, $rowsw['Nombre_Empleado']);
  
  }
  $a=1;

  foreach($results as $roww){ 
    array_push($client, $roww['Nombre_Cliente']);
  
  }
  $b=1;

  
?>
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Alquiler</th>
                      <th>Empleado</th>
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

                          $alquileres = $x-1;
                          $x++;

                          $employes = $a-1;
                          $a++;

                          $clients = $b-1;
                          $b++;
                    ?>
                    <tr>
                      <td><?php echo $out->Entrada_ID; ?></td>
                      <td><?php echo $alquiler[$alquileres]; ?></td>
                      <td><?php echo $employe[$employes]; ?></td>
                      <td><?php echo $client[$clients]; ?></td>
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