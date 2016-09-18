<?php
include ("comun.php");
include ("menu.php");

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

echo "<form name='formulario1' id='formulario1' method='post' action='prestador_updt.php'>";
echo "<input type='hidden' name='id' value='$id'>";
echo "<br>Ficha de Prestador<br>";
echo "<table>";
echo "<tr><td>Nombre</td><td><input type='text' name='nombre' value='$nombre'></td></tr>";

echo "<tr><td>Rubro:</td><td>";
echo "<select name='rubro_id'>";
$selected1 = ($rubro_id == 1)? "selected ":"";
$selected2 = ($rubro_id == 2)? "selected ":"";
$selected3 = ($rubro_id == 3)? "selected ":"";
echo "<option value='1' $selected1 >Guarderias</option>";
echo "<option value='2' $selected2 >Veterinarias</option>";
echo "<option value='3' $selected3 >Shop</option>";
echo "</select>";
echo "</td></tr>";
echo "<tr><td>Domicilio</td><td><textarea name='domicilio'>$domicilio</textarea></td></tr>";
echo "<tr><td>lat_long</td><td><input type='text' name='lat_long' value='$lat_long'></td></tr>";
echo "<tr><td>Telefonos</td><td><textarea name='telefonos'>$telefonos</textarea></td></tr>";
echo "<tr><td>Horarios</td><td><textarea name='horarios'>$horarios</textarea></td></tr>";
echo "<tr><td>Extra</td><td><textarea name='extra'>$extra</textarea></td></tr>";
?>

<tr><td colspan='4'><div id="gmap" ></div></td></tr>
<?php
echo "		    	<tr><td></td><td><input type='text' id='lat' name='latitud' value='$lat'>-
				<input type='text' id='lon' name='longitud' value='$long'></td></tr>
	";			
			

echo "<tr><td></td><td><input type='submit' ></td></tr>";
echo "</table>";
echo "</form>";
?>
