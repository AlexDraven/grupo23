<?php
include ("_comun.php");
//include ("menu.php");
$id = intval($_POST['id']);
$nombre = $_POST['nombre'];
$domicilio = $_POST['domicilio'];
$lat_long = $_POST['latitud'].",".$_POST['longitud'];
$telefonos = $_POST['telefonos'];
$horarios = $_POST['horarios'];
$rubro_id = $_POST['rubro_id'];

$extra = $_POST['extra'];

if($id==0){
	//alta
	//$consulta = "insert into prestadores (nombre, domicilio,lat_long,telefonos,horarios,extra,rubro_id) values  ('$nombre', '$domicilio','$lat_long','$telefonos','$horarios','$extra','$rubro_id') ";

	$consulta = "insert into prestadores (nombre, domicilio,telefonos,horarios,extra) values  ('$nombre', '$domicilio','$telefonos','$horarios','$extra') ";
	//print ($consulta);
}else{
	//update
	//$consulta = "update prestadores set nombre='$nombre', domicilio='$domicilio',lat_long='$lat_long',telefonos='$telefonos',horarios='$horarios',extra='$extra',rubro_id='$rubro_id' where id =$id";
	$consulta = "update prestadores set nombre='$nombre', domicilio='$domicilio',telefonos='$telefonos',horarios='$horarios',extra='$extra' where id =$id";
}
$query = mysql_query($consulta);
header("location:prestadores.php");
?>