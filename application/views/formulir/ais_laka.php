<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

$cols="nrp,unit,polda,polres,dinas,subdinas,tgl,dasar,nomor,";
$cols.="da,res,thn,jml,md,lb,lr,rumat";
?>

<input type="hidden" name="tablename" value="ais_laka">
<input type="hidden" name="fieldnames" value="<?php echo $cols?>">

<div class="row">
	<div class="col-sm-6 col-md-4">
		<div class="form-group">
			<label class="form-label">Polda</label>
		<?php
$polda['']='';
//print_r(array_reverse($polda,true));
$opt=array('class'=>'form-control','id'=>'da','onchange'=>"getSubQ('profile/get_polres',this.value,'#res');");
echo form_dropdown('da', array_reverse($polda,true), '',$opt);
	?>
		</div>
	</div>
	<div class="col-sm-6 col-md-4">
		<div class="form-group">
			<label class="form-label">Polres</label>
			<select name="res" id="res" class="form-control">
				<option value=""></option>
			</select>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-6 col-md-2">
		<div class="form-group">
			<label class="form-label">Tahun</label>
			<input type="text" name="thn" class="form-control yearpicker">
		</div>
	</div>
	<div class="col-sm-6 col-md-2">
		<div class="form-group">
			<label class="form-label">Kejadian</label>
			<input type="text" name="jml" class="form-control">
		</div>
	</div>
	<div class="col-sm-6 col-md-2">
		<div class="form-group">
			<label class="form-label">Meninggal</label>
			<input type="text" name="md" class="form-control">
		</div>
	</div>
	<div class="col-sm-6 col-md-2">
		<div class="form-group">
			<label class="form-label">Luka Berat</label>
			<input type="text" name="lb" class="form-control">
		</div>
	</div>
	<div class="col-sm-6 col-md-2">
		<div class="form-group">
			<label class="form-label">Luka Ringan</label>
			<input type="text" name="lr" class="form-control">
		</div>
	</div>
	<div class="col-sm-6 col-md-2">
		<div class="form-group">
			<label class="form-label">Kerugian Materi</label>
			<input type="text" name="rumat" class="form-control">
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
$(".yearpicker").yearpicker({});

$(".is-invalid").removeClass("is-invalid");
$(".is-valid").removeClass("is-valid");

</script>