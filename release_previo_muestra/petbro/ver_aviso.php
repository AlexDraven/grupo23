<?php
include_once("_header.php");
include_once("_aside.php");
include ("_comun.php");
$id = intval($_GET['id']);
if ($id > 0){
  $consulta =" select *  from publicaciones where id = $id";
  $query = mysql_query($consulta);
  if (mysql_num_rows($query)==1){
    $nombre = mysql_result($query,0,'nombre');
    $fecha = mysql_result($query,0,'fecha');
    $hora = mysql_result($query,0,'hora');
    $lat_long = mysql_result($query,0,'lat_long');
    $extra = mysql_result($query,0,'extra');
    $tipo = mysql_result($query,0,'tipo');
    $estado = mysql_result($query,0,'estado');

    $imagen = "data/public_$id.jpg";
    
    if (file_exists($imagen)){
        $logo = "<br><img src='$imagen' width='500px'>";
    }else{
        $logo="";
    }
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Aviso
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <?php
      print ("<h1>$nombre</h1>");
      print ("<h2>
        Fecha:$fecha<br>
        Hora:$hora<br>
Extra:$extra<br>
Tipo:$tipo<br>
Estado:$estado<br><hr>$logo</h2><hr>





<form role='form' name='pdf' method='post' action='generador.php'>
<input type='hidden' name='id' value ='$id'>
       
<input type='hidden' name='fecha' value ='$fecha'>
<input type='hidden' name='nombre' value ='$nombre'>
<input type='hidden' name='hora' value ='$hora'>
<input type='hidden' name='extra' value ='$extra'>
<input type='hidden' name='tipo' value ='$tipo'>

        <!-- Button -->
        <button type='submit' value='generar' class=''>Descargar folleto</button>
      </form> 


        ");
      //print ("<h2>Fecha:$fecha</h2>");
     ?>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <?php
 }
}
include_once("_footer.php");
?>