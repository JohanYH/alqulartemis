<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);


$url = "http://localhost/SkylAb-147/alqulartemis/fullStack/apiRest/controllers/Obra.php?op=GetAll";
$curl = curl_Init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$output = json_decode(curl_exec($curl));
curl_close($curl);

function Alquileres()
{
  try {
    $conectar = new PDO("mysql:host=localhost;dbname=AlquilerArtemis", "campus", "campus2023");
    $sql = ("SELECT Alquiler.Alquiler_ID, Cliente.Nombre_Cliente FROM Alquiler 
    INNER JOIN Cliente ON Alquiler.Cliente_ID = Cliente.Cliente_ID");
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


<table class="table table-head-fixed text-nowrap">
<?php
  
  $results = Alquileres();

  $nombres = array();
  foreach($results as $row){ //Error checking
    array_push($nombres, $row['Nombre_Cliente']);
  }
  $x=1;
  
?>
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
                          $nombre = $x-1;
                          $x++;
                    ?>
                    <tr>
                      <td><?php echo $out->Obra_ID; ?></td>
                      <td><?php echo $nombres[$nombre]; ?></td>
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