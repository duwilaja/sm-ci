<?php
//$lat=$_GET['lat'];
//$lng=$_GET['lng'];
$z="15";
$latlng=$lat.",".$lng;
if($lat==""||$lng==""){$z="12";$latlng="-6.175540717418276,106.82719230651857";} //monas
?>
<!DOCTYPE html>
<html>
<head>
	<title>Please Choose Your Location</title>
	<meta charset="utf-8" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="<?php echo base_url();?>my/vendor/leaflet/leaflet.css" />
	<!--[if lte IE 8]><link rel="stylesheet" href="leaflet/leaflet.ie.css" /><![endif]-->
	
	<script src="<?php echo base_url();?>my/vendor/leaflet/leaflet.js"></script>
	<!--script src="leaflet/geo/l.control.geosearch.js"></script>
	<script src="leaflet/geo/l.geosearch.provider.openstreetmap.js"></script>
	<link rel="stylesheet" href="leaflet/geo/l.geosearch.css" /-->
		
</head>
<body>
	<div id="map" style="position: absolute; top: 40px; left: 0; width: 100%; height: 91%;"></div>

	<script>

	var latfld="<?php echo $latfld?>";
	var lngfld="<?php echo $lngfld?>";
		var map = L.map('map').setView([<?php echo $latlng;?>], <?php echo $z;?>);

		L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
		}).addTo(map);
		
		/*new L.Control.GeoSearch({
			provider: new L.GeoSearch.Provider.OpenStreetMap()
		}).addTo(map);*/

		var popup = L.popup();
		var marker = L.marker();
		
<?php if($z=="15"){?>
			var latlon=L.latLng(<?php echo $latlng;?>);
			//popup.setLatLng(latlon).setContent("Here.").openOn(map);
			marker.setLatLng(latlon).addTo(map);
<?php } ?>
		function onMapClick(e) {
			/*popup
				.setLatLng(e.latlng)
				.setContent("You clicked the map at " + e.latlng.toString())
				.openOn(map);*/
				
			marker.setLatLng(e.latlng).addTo(map);
			
			document.mapfrm.lat.value=e.latlng.lat;
			document.mapfrm.lng.value=e.latlng.lng;
			map.panTo([e.latlng.lat,e.latlng.lng]);
		}

		map.on('click', onMapClick);

	function okclick(){
		latfld=latfld==""?"lat":latfld;
		lngfld=lngfld==""?"lng":lngfld;
		parent.window.opener.document.getElementsByName(latfld)[0].value=document.mapfrm.lat.value;
		parent.window.opener.document.getElementsByName(lngfld)[0].value=document.mapfrm.lng.value;
		parent.window.close();
	}
	</script>
	<form name="mapfrm">
	<input type="text" name="lat" value="<?php echo $lat;?>">
	<input type="text" name="lng" value="<?php echo $lng;?>">
	<input type="button" onclick="okclick();" value="OK">
	<input type="button" onclick="parent.window.close();" value="Close">
	</form>
	
</body>
</html>
