<?php
include ("comun.php");
include ("menu.php");


echo "<br>[<a href='usuario.php'>Agregar</a>]<br><h1>Usuarios</h1>";
echo "<table>";
echo "<tr><td>#id</td><td>Nombre</a></td><td>datoscontacto</td></tr>";
$consulta = "select * from usuarios order by upper(nombre)";
$query = mysql_query($consulta);
while ($registro = mysql_fetch_array($query)){
	$id = $registro['id'];
	$nombre = $registro['nombre'];
	$datoscontacto = $registro['datoscontacto'];
	$lnk = "<a href='prestador.php?id=$id'>";
	echo "<tr><td>$id</td><td>$lnk $nombre </a></td><td>$datoscontacto</td></tr>";
}
echo "</table>";
?>
