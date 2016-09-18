<?php
include ("comun.php");
include ("menu.php");


$consulta = "select count(*) from prestadores";
$query = mysql_query($consulta);
$cantidad = mysql_result($query,0,0);

echo "#prestadores: $cantidad <br>";


$consulta = "select count(*) from usuarios ";
$query = mysql_query($consulta);
$cantidad = mysql_result($query,0,0);

echo "#Usuarios: $cantidad <br>";


$consulta = "select count(*) from publicaciones ";
$query = mysql_query($consulta);
$cantidad = mysql_result($query,0,0);

echo "#Publicaciones: $cantidad <br>";
?>