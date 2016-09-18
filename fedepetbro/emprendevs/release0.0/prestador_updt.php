<?php
include ("comun.php");
//include ("menu.php");
$id = intval($_POST['id']);
$nombre = $_POST['nombre'];
$domicilio = $_POST['domicilio'];
$lat_long = $_POST['latitud'].",".$_POST['longitud'];
$telefonos = $_POST['telefonos'];
$horarios = $_POST['horarios'];
$extra = $_POST['extra'];

if($id==0){
	//alta
	$consulta = "insert into prestadores (nombre, domicilio,lat_long,telefonos,horarios,extra) values  ('$nombre', '$domicilio','$lat_long','$telefonos','$horarios','$extra') ";
}else{
	//update
	$consulta = "update prestadores set nombre='$nombre', domicilio='$domicilio',lat_long='$lat_long',telefonos='$telefonos',horarios='$horarios',extra='$extra' where id =$id";
}
$query = mysql_query($consulta);
header("location:prestadores.php");
?>