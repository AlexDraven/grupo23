<?php
include_once("_header.php");
include_once("_aside.php");
include ("_comun.php");
?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <h1>Status<br>
      <?php

$consulta = "select count(*) from prestadores";
$query = mysql_query($consulta);
$cantidad = mysql_result($query,0,0);

echo "#Prestadores: $cantidad <br>";


$consulta = "select count(*) from usuarios ";
$query = mysql_query($consulta);
$cantidad = mysql_result($query,0,0);

echo "#Usuarios: $cantidad <br>";


$consulta = "select count(*) from publicaciones ";
$query = mysql_query($consulta);
$cantidad = mysql_result($query,0,0);

echo "#Publicaciones: $cantidad <br>";
      ?>
      </h1>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
include_once("_footer.php");
?>