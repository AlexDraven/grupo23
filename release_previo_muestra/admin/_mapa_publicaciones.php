<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
        <title>Mapa de mascotas perdidas</title>
        <meta name="Description" content="Mapa elemental de Google Maps para usarlo desde la PC, que se muestra a todo lo ancho y alto del navegador con targets.">
        <meta name ="author" content ="emprendevs">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style type="text/css" media="screen">
            <!--
            html,body{height:100%;margin:0;padding:0;}
            #map1{width:100%;height:100%;}
            -->
        </style>
    </head>
    <body>
        <script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false&language=es"></script>
        <div id="map1"></div>
        <script>
            function cargarm() {
                
                var mapOptions = {
                    center : new google.maps.LatLng(-32.9478019,-60.6345572),
                    zoom : 14,
                    mapTypeId : google.maps.MapTypeId.ROADMAP
                };
                var map = new google.maps.Map(document.getElementById("map1"), mapOptions);



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

$imagen = "data/public_$id.jpg";
    if (file_exists($imagen)){
        $logo = "<br><img src='$imagen' width='100px'>";
    }else{
        $logo="";
    }

    print ("
    var myLatlng$cuento = new google.maps.LatLng($lat_long);
    var marker$cuento = new google.maps.Marker({
      position: myLatlng$cuento,
      map: map,
      title: 'Hola'
    });

var infowindow$cuento = new google.maps.InfoWindow({
    content: \"$nombre$logo\"
  });

marker$cuento.addListener('click', function() {
    infowindow$cuento.open(map, marker$cuento);
  });


    ");
}
?>
           }


            window.onload = cargarm()
        </script>
    </body>
</html>