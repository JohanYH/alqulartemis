<?php

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

$url = "http://localhost/SkylAb-113/alqulartemis/fullStack/apiRest/controllers/Alquiler.php?op=GetAll";
$curl = curl_Init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$output = json_decode(curl_exec($curl));
curl_close($curl);


function Alquileres()
{
  try {
    $conectar = new PDO("mysql:host=localhost;dbname=AlquilerArtemis", "campus", "campus2023");
    $sql = ("SELECT Alquiler.Alquiler_ID, Cliente.Nombre_Cliente, Empleado.Nombre_Empleado FROM Alquiler 
    INNER JOIN Cliente ON Alquiler.Cliente_ID = Cliente.Cliente_ID
    INNER JOIN Empleado ON Alquiler.Empleado_ID = Empleado.Empleado_ID");
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

  $nombres = array();
  $employe = array();
  foreach($results as $row){ //Error checking
    array_push($nombres, $row['Nombre_Cliente']);
  
  }
  $x=1;

  foreach($results as $rows){
    array_push($employe, $rows['Nombre_Empleado']);
  }
  $e=1;
  
  ?>
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Cliente</th>
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
                          $nombre = $x-1;
                          $x++;

                          $employes = $e-1;
                          $e++;
                    ?>
                    <tr>
                      <td><?php echo $out->Alquiler_ID; ?></td>
                      <td><?php echo $nombres[$nombre]; ?></td> 
                      <td><?php echo $out->Fecha_Salida; ?></td>
                      <td><?php echo $out->Hora_Salida; ?></td>
                      <td><?php echo $out->SubtotalPeso; ?></td>
                      <td><?php echo $employe[$employes]; ?></td>
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