<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <title>KML Layers</title>
        <style>
            html, body, #map-canvas {
                height: 100%;
                margin: 0px;
                padding: 0px
            }
        </style>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
        <script>
            function initialize() {
                var myLatlng = new google.maps.LatLng(-33.898722222222,-64.674833333333);
                
                var mapOptions = {
                    zoom : 5,
                    center : myLatlng,
                    mapTypeId : google.maps.MapTypeId.ROADMAP
                }
                var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
<?php
include ("comun.php");
$consulta = "select * from prestadores order by upper(nombre)";
$query = mysql_query($consulta);
$cuento = 0;
while ($registro = mysql_fetch_array($query)){
	$cuento++;
	$id = $registro['id'];
	$nombre = $registro['nombre'];
	$telefonos = $registro['telefonos'];
	$lat_long = $registro['lat_long'];






    }


?>



            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
    </head>
    <body>
        <div id="map-canvas"></div>
    </body>
</html>