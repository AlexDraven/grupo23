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
        Simple Tables
        <small>preview of simple tables</small>
      </h1>

         <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Simple</li>
      </ol>
    </section>

  <!-- Main content -->
    <section class="content">
      




      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Usuarios [<a href='prestador.php'>Agregar</a>]</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Prestador</th>
                  <th>Domicilio</th>
                  <th>Telefono</th>
                  
                  <th>Rubro</th>
                </tr>

                <?php
                $consulta = "select * from usuarios order by upper(nombre)";
$query = mysql_query($consulta);
while ($registro = mysql_fetch_array($query)){
  $id = $registro['id'];
  $nombre = $registro['nombre'];
  $email= $registro['email'];
  $domicilio = $registro['domicilio'];
  
  $lnk = "<a href='usuario.php?id=$id'>";
  echo "<tr><td>$id</td><td>$lnk $nombre </a></td><td>$email</td><td>$domicilio</td></tr>";
}
  ?>
    
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->
     <?php
include_once("_footer.php");
?>