<?php
include ("comun.php");
//include ("menu.php");
$id = intval($_POST['id']);
$nombre = $_POST['nombre'];
$fecha = $_POST['fecha'];
$lat_long = $_POST['latitud'].",".$_POST['longitud'];
$hora = $_POST['hora'];
$extra = $_POST['extra'];
$tipo = $_POST['tipo'];
$estado = $_POST['estado'];

if($id==0){
	//alta
	$consulta = "insert into publicaciones (nombre, fecha,hora,lat_long,extra,tipo,estado) values  ('$nombre', '$fecha','$hora','$lat_long','$extra','$tipo','$estado') ";
	$query = mysql_query($consulta);
//echo "<hr>";
//echo mysql_insert_id();
	$id = mysql_insert_id();
}else{
	//update
	$consulta = "update publicaciones set nombre='$nombre', fecha='$fecha',hora='$hora' ,lat_long='$lat_long',extra='$extra',tipo='$tipo',estado='$estado' where id =$id";
	$query = mysql_query($consulta);
}
//print ($consulta);

//imagen
$destino = "data/public_$id.jpg";
//print ($destino);


//grabar logo
$archivo_n = $_FILES["imagen"]["tmp_name"];
if (strlen(trim($archivo_n)) > 0) {
	$extension = $_FILES["imagen"]["type"];
	if ($extension == "image/jpeg" || $extension == "image/jpg") {
		
		
	}
	if (file_exists($destino)) {//me fijo si existe el archivo y lo borro
		unlink($destino);
	}
	
	copy ($archivo_n,$destino);
}


header("location:publicaciones.php");
?>