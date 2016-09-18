<?php
include ("comun.php");
include ("menu.php");

@$id = intval($_GET['id']);
if ($id > 0){
	$consulta =" select *  from publicaciones where id = $id";
	$query = mysql_query($consulta);
	if (mysql_num_rows($query)==1){
		$nombre = mysql_result($query,0,'nombre');
		$fecha = mysql_result($query,0,'fecha');
		$hora = mysql_result($query,0,'hora');
		$extra = mysql_result($query,0,'extra');
		$tipo = mysql_result($query,0,'tipo');
		$estado = mysql_result($query,0,'estado');
		$lat_long = mysql_result($query,0,'lat_long');
		if (strlen(trim($lat_long))>1){


			$mapa = explode(",",$lat_long);
			$lat = $mapa[0];
			$long = $mapa[1];
		}else{
			$lat =-32.9476362;
			$long =-60.6297235;
		}
	}
	$imagen = "data/public_$id.jpg";
	if (file_exists($imagen)){
		$logo = "<img src='$imagen' width='300px'>";
	}else{
		$logo="";
	}
}else{
	$fecha = date('Y-m-d');
	$hora = date('H:i:s');
	$lat =-32.9476362;
	$long =-60.6297235;
	$tipo = "perdida";
	$estado = "activa";
}

?>
<style type="text/css">
		
				div#bd {
					position: relative;
				}
				div#gmap {
					width: 500px;
					height: 500px;
				}
			</style>







<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>

<script type="text/javascript">
var map;
var marker=false;
function initialize() {
	<?php
	  echo "var myLatlng = new google.maps.LatLng($lat,$long);";
   ?>
  var myOptions = {
    zoom: 14,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  
  map = new google.maps.Map(document.getElementById("gmap"), myOptions);
  
  marker = new google.maps.Marker({
      	position: myLatlng, 
      	map: map
  	});
	
  google.maps.event.addListener(map, 'center_changed', function() {
  	var location = map.getCenter();
	document.getElementById("lat").innerHTML = location.lat();
	document.getElementById("lon").innerHTML = location.lng();
    placeMarker(location);
    document.formulario1.lat.value = location.lat();
    document.formulario1.lon.value = location.lng();
  });
  google.maps.event.addListener(map, 'zoom_changed', function() {
  	zoomLevel = map.getZoom();
	document.getElementById("zoom_level").innerHTML = zoomLevel;
  });
  google.maps.event.addListener(marker, 'dblclick', function() {
    zoomLevel = map.getZoom()+1;
    if (zoomLevel == 20) {
     zoomLevel = 10;
   	}    
	document.getElementById("zoom_level").innerHTML = zoomLevel; 
	map.setZoom(zoomLevel);
	 
  });
  
  document.getElementById("zoom_level").innerHTML = 17; 
  
  document.getElementById('lat').innerHTML = $latitud;
  document.getElementById('lon').innerHTML = $longitud;
  
}
  
function placeMarker(location) {
  var clickedLocation = new google.maps.LatLng(location);
  marker.setPosition(location);
}
window.onload = function(){initialize();};

</script>




<?php

echo "<form name='formulario1' id='formulario1' method='post' action='publicacion_updt.php' enctype='multipart/form-data'>";
echo "<input type='hidden' name='id' value='$id'>";
echo "<br>Ficha de Publicaciones<br>";
echo "<table>";
echo "<tr><td>Nombre</td><td><input type='text' name='nombre' value='$nombre'></td></tr>";
echo "<tr><td>Fecha</td><td><input type='text' name='fecha' value='$fecha'></td></tr>";
echo "<tr><td>Hora</td><td><input type='text' name='hora' value='$hora'></td></tr>";
echo "<tr><td>Datos Extra</td><td><textarea name='extra'>$extra</textarea></td></tr>";
echo "<tr><td>tipo</td><td><input type='text' name='tipo' value='$tipo'>(perdida / encontrada) </td></tr>";
echo "<tr><td>estado</td><td><input type='text' name='estado' value='$estado'>(activa/finalizada)</td></tr>";

echo "<tr><td>Foto</td><td><input type='file' name='imagen' ></td><td>$logo</td></tr>";
?>
<tr><td colspan='4'><div id="gmap" ></div></td></tr>
<?php
echo "<tr><td></td><td><input type='text' id='lat' name='latitud' value='$lat'>-
				<input type='text' id='lon' name='longitud' value='$long'></td></tr>
	";			
echo "<tr><td></td><td><input type='submit' ></td></tr>";
echo "</table>";
echo "</form>";
?>
