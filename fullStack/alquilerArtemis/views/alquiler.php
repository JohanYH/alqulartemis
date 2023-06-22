<?php

    $alquilerArray = explode("/", $_SERVER["REQUEST_URI"]);
    $alquilerArray = array_filter($alquilerArray);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AlquilaArtemis | Simple Tables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="views/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="views/assets/plugins/admintle/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- jQuery -->
<script src="views/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="views/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="views/assets/plugins/admintle/js/adminlte.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-lightblue navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <?php include "views/modules/navbar.php"?>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php  include "views/modules/sidebar.php";?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    
    <!-- Main content -->
    <?php

    if (!empty($alquilerArray[5])) {  
      if ($alquilerArray[5]== "alquiler" ||
      $alquilerArray[5]=="alquiler_detalle" ||
      $alquilerArray[5]=="cliente" || 
      $alquilerArray[5]=="empleado" || 
      $alquilerArray[5]=="entrada" || 
      $alquilerArray[5]=="entrada_detalle" || 
      $alquilerArray[5]=="inventario" || 
      $alquilerArray[5]=="obra" || 
      $alquilerArray[5]=="productos") {
        include "views/pages/".$alquilerArray[5]."/".$alquilerArray[5].".php";
      }
    }else {
      include "views/pages/home/home.php";
    }
    
    ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include "views/modules/footer.php"?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


</body>
</html>
