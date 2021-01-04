<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

$cols="nrp,unit,polda,polres,dinas,subdinas,tgl,dasar,nomor,";
$cols.="jenis,jalan,lat,lng";
?>

<input type="hidden" name="tablename" value="intan_analytic">
<input type="hidden" name="fieldnames" value="<?php echo $cols?>">

<div class="row">
	<div class="col-sm-6 col-md-3">
		<div class="form-group">
			<label class="form-label">Jenis</label>
			<select name="jenis" class="form-control" placeholder="" >
			<option value="Kemacetan">Kemacetan</option>
			<option value="Kecelakaan">Kecelakaan</option>
			<!--option value="Kondisi Jalur">Kondisi Jalur</option-->
			</select>
		</div>
		<div class="form-group">
			<label class="form-label">Jalan</label>
			<input type="text" id="jalan" name="jalan" class="form-control" placeholder="" >
		</div>
		<div class="row">
			<div class="col-sm-6 col-md-6">
				<div class="form-group">
					<label class="form-label">Latitude</label>
					<input type="text" id="lat" name="lat" class="form-control" placeholder="" >
				</div>
			</div>
			<div class="col-sm-6 col-md-6">
				<div class="form-group">
					<label class="form-label">Longitude</label>
					<input type="text" id="lng" name="lng" class="form-control" placeholder="" >
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
			  <ul class="list-group">
				<li class="list-group-item justify-content-between">Faskes <span class="badgetext badge badge-primary bg-green badge-pill"><?php echo count($faskes)?></span></li>
				<li class="list-group-item justify-content-between">Ambulance <span class="badgetext badge badge-primary bg-orange badge-pill"><?php echo count($ambulance)?></span></li>
				<li class="list-group-item justify-content-between">Pos Polisi <span class="badgetext badge badge-primary bg-lime badge-pill"><?php echo count($pospol)?></span></li>
				<li class="list-group-item justify-content-between">Pos PJR <span class="badgetext badge badge-info badge-pill"><?php echo count($pospjr)?></span></li>
				<li class="list-group-item justify-content-between">Ambang Gangguan <span class="badgetext badge badge-primary bg-red badge-pill"><?php echo count($koordinasi)?></span></li>
			  </ul>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-md-9">
		<div id="map" style="width: 100%; height: 450px;"></div>
	</div>
</div>

<script>
var ambulance=<?php echo json_encode($ambulance)?>;
var faskes=<?php echo json_encode($faskes)?>;
var pospjr=<?php echo json_encode($pospjr)?>;
var pospol=<?php echo json_encode($pospol)?>;
var koordinasi=<?php echo json_encode($koordinasi)?>;

jvalidate = $("#myf").validate({
    rules :{
        "formulir" : {
            required : true
        },
		"dasar" : {
            required : true
        },
		"nomor" : {
			required : true
		},
		"jalan" : {
			required : true
		},
		"lat" : {
			required : true
		},
		"lng" : {
			required : true
		}
    }});

$("#btn_save").show();
$(".dasar").show();
$(".nomor").show();

datepicker(true);
timepicker();

$(".is-invalid").removeClass("is-invalid");
$(".is-valid").removeClass("is-valid");

var map, popup, marker;

function okclick(){
}
function onMapClick(e) {
	/*popup
		.setLatLng(e.latlng)
		.setContent("You clicked the map at " + e.latlng.toString())
		.openOn(map);*/
		
	marker.setLatLng(e.latlng).addTo(map);
	
	$("#lat").val(e.latlng.lat);
	$("#lng").val(e.latlng.lng);
	map.panTo([e.latlng.lat,e.latlng.lng]);
}

function preparemap(){
	map = L.map('map').setView([-6.175540717418276,106.82719230651857], 12);

	L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
	attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(map);

	/*new L.Control.GeoSearch({
		provider: new L.GeoSearch.Provider.OpenStreetMap()
	}).addTo(map);*/

	popup = L.popup();
	marker = L.marker();

	map.on('click', onMapClick);
	
	draw_pointers("Ambulance","orange","ambulance",ambulance);
	draw_pointers("Faskes","green","hospital-o",faskes);
	draw_pointers("Pos Polisi","cadetblue","user-secret",pospol);
	draw_pointers("Pos PJR","blue","taxi",pospjr);
	draw_pointers("Koordinasi","red","",koordinasi);
}
function contentcallback(){
	preparemap();
}

function draw_pointers(title,color,icon,data){
	//var markers = L.markerClusterGroup();
		var ttl=title;
		var icn=icon;
		for (var i = 0; i < data.length; i++) {
			var a = data[i];
			//var title = a['name'];
			//var color = a['onoff']>0?"green":"red";
			if(a['lat'].trim()!=""&&a['lng'].trim()!=""){
				if(icon==""){
					ttl=a["giat"];
					switch(ttl){
						case "Pembangunan Jalan" : icn="road";  break;
						case "Olahraga" : icn="futbol-o";  break;
						case "Keagamaan" : icn="users";  break;
						case "Pameran" : icn="fort-awesome";  break;
						case "Konser" : icn="child";  break;
						default : icn = "slideshare"; break;
					}
				}
				var myicon = new L.AwesomeMarkers.icon({icon: icn, prefix: 'fa', markerColor: color});
				L.marker(new L.LatLng(a['lat'], a['lng']), { title: ttl, icon: myicon }).addTo(map);
			}
			//var marker = L.marker(new L.LatLng(a['lat'], a['lng']), { title: title, icon: icon });
			
			//var fn=markerClickFunction(a['locid']);
			//marker.on('click', fn);
			
			//markers.addLayer(marker);
		}

		//map.addLayer(markers);
}

</script>