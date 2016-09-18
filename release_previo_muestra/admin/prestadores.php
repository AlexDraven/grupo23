<?php
include ("comun.php");
include ("menu.php");


echo "<br>[<a href='prestador.php'>Agregar</a>]<br><h1>Prestadores</h1>";
echo "<table>";
echo "<tr><td>#id</td><td>Nombre</a></td><td>telefonos</td><td>Rubro</td></tr>";
$consulta = "select a.*,b.nombre as rubro from prestadores as a left join rubros as b on a.rubro_id = b.id  order by upper(a.nombre)";
$query = mysql_query($consulta);
while ($registro = mysql_fetch_array($query)){
	$id = $registro['id'];
	$nombre = $registro['nombre'];
	$telefonos = $registro['telefonos'];
	$rubro = $registro['rubro'];
	$lnk = "<a href='prestador.php?id=$id'>";
	echo "<tr><td>$id</td><td>$lnk $nombre </a></td><td>$telefonos</td><td>$rubro</td></tr>";
}
echo "</table>";
?>
