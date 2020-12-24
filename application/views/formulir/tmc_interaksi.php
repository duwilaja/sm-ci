<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

$cols="nrp,unit,polda,polres,dinas,subdinas,tgl,dasar,nomor,";
$cols.="media,jenis,jenisd,ket";
?>

<input type="hidden" name="tablename" value="tmc_interaksi">
<input type="hidden" name="fieldnames" value="<?php echo $cols?>">

<div class="row">
	<div class="col-sm-6 col-md-2">
		<div class="form-group">
			<label class="form-label">Media</label>
			<select name="media" class="form-control" placeholder="">
				<option value="Facebook">Facebook</option>
				<option value="Tweeter">Tweeter</option>
				<option value="Website">Website</option>
				<option value="Center">Center</option>
			</select>
		</div>
	</div>
	<div class="col-sm-6 col-md-3">
		<div class="form-group">
			<label class="form-label">Jenis</label>
			<select name="jenis" class="form-control" placeholder="" onchange="jenischanged(this.value)">
				<option value="Komplain">Komplain</option>
				<option value="Konsultasi">Konsultasi</option>
				<option value="Apresiasi">Apresiasi</option>
				<option value="Saran">Saran</option>
				<option value="Yan Aduan">Yan Aduan</option>
			</select>
		</div>
	</div>
	<div class="col-sm-6 col-md-3 aduan hidden">
		<div class="form-group">
			<label class="form-label">Aduan...</label>
			<select name="jenisd" id="jenisd" class="form-control" placeholder="">
				<option value=""></option>
				<option value="Kemacetan">Kemacetan</option>
				<option value="Kecelakaan">Kecelakaan</option>
				<option value="Tindak Pidana">Tindak Pidana</option>
				<option value="Kebakaran">Kebakaran</option>
				<option value="Bencana Alam">Bencana Alam</option>
				<option value="Gangguan APLL">Gangguan APLL</option>
			</select>
		</div>
	</div>
	<div class="col-sm-6 col-md-4">
		<div class="form-group">
			<label class="form-label">Ket.</label>
			<textarea name="ket" class="form-control"></textarea>
		</div>
	</div>
</div>


<script>
function jenischanged(tv){
	if(tv=='Yan Aduan'){
		$(".aduan").show();
	}else{
		$("#jenisd").val("");
		$(".aduan").hide();
	}
}
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
		"media" : {
			required : true
		},
		"jenis" : {
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

</script>