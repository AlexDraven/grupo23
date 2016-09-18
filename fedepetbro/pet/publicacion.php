<?php
include_once("_header.php");
include_once("_aside.php");
include ("_comun.php");
@$id = intval($_GET['id']);
if ($id > 0){
  $consulta =" select *  from prestadores where id = $id";
  $query = mysql_query($consulta);
  if (mysql_num_rows($query)==1){
    $nombre = mysql_result($query,0,'nombre');
    $domicilio = mysql_result($query,0,'domicilio');
    $lat_long = mysql_result($query,0,'lat_long');
    if (strlen(trim($lat_long))>1){
      $mapa = explode(",",$lat_long);
      $lat = $mapa[0];
      $long = $mapa[1];
    }else{
      $lat =-32.9476362;
      $long =-60.6297235;
    }
    $telefonos = mysql_result($query,0,'telefonos');
    $horarios = mysql_result($query,0,'horarios');
    $extra = mysql_result($query,0,'extra');
    $rubro_id = mysql_result($query,0,'rubro_id');
  }
}else{
  $lat =-32.9476362;
      $long =-60.6297235;
}
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        General Form Elements
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
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Prestador</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method='post' action='prestador_updt.php'>
              <?php
              print ("<input type='hidden' name='id' value='$id'>
              
              <div class='box-body'>
                <div class='form-group'>
                  <label for='exampleInputEmail1'>Nombre</label>
                  <input type='text' name='nombre' class='form-control' id='exampleInputEmail1' placeholder='Ingrese Nombre del Prestador' value='$nombre'>
                </div>

                <!-- textarea -->
                <div class='form-group'>
                  <label>Domicilio</label>
                  <textarea class='form-control' name='domicilio'  rows='3' placeholder='Enter ...'>$domicilio</textarea>
                </div>

                <!-- textarea -->
                <div class='form-group'>
                  <label>Telefonos</label>
                  <textarea class='form-control' name='telefonos'  rows='3' placeholder='Enter ...'>$telefonos</textarea>
                </div>

                 <!-- textarea -->
                <div class='form-group'>
                  <label>Horarios</label>
                  <textarea class='form-control' name='horarios'  rows='3' placeholder='Enter ...'>$horarios</textarea>
                </div>

                <!-- textarea -->
                <div class='form-group'>
                  <label>Datos Extra</label>
                  <textarea class='form-control' name='extra'  rows='3' placeholder='Enter ...'>$extra</textarea>
                </div>

                
                
                ");
                ?>
              </div>
              <!-- /.box-body -->

              <div class='box-footer'>
                <button type='submit' class='btn btn-primary'>Procesar</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

          

        </div>
        <!--/.col (left) -->
        
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <?php
include_once("_footer.php");
?>