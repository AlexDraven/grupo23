<?php
include ("comun.php");
include ("menu.php");


echo "<br>[<a href='publicacion.php'>Agregar</a>]<br><h1>Publicaciones</h1>";
echo "<table>";
echo "<tr><td>#id</td><td>Nombre</a></td><td>telefonos</td></tr>";
$consulta = "select * from publicaciones order by upper(nombre)";
$query = mysql_query($consulta);
while ($registro = mysql_fetch_array($query)){
	$id = $registro['id'];
	$nombre = $registro['nombre'];
	$telefonos = $registro['telefonos'];
	$lnk = "<a href='prestador.php?id=$id'>";
	echo "<tr><td>$id</td><td>$lnk $nombre </a></td><td>$telefonos</td></tr>";
}
echo "</table>";
?>
