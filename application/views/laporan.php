<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
	<div class="col-lg-12">
		<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
		Hi <?php echo $session['nama']?> @ <?php echo $session['unit']?>, silakan pilih laporan anda</div>
	</div>
</div>

<!-- Row -->
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Form Kegiatan <?php echo $session['unit']?> (<?php echo date("D, d M Y")?>)</h3>
				<div class="card-options ">
					<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
					<!--a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a-->
				</div>
			</div>
			<div class="card-body"><form id="myf">
			
			<!--hidden-->
			<input type="hidden" name="rowid" id="rowid" value="0" />
			<input type="hidden" name="nrp" value="<?php echo $session['nrp']?>">
			<input type="hidden" name="polda" value="<?php echo $session['polda']?>">
			<input type="hidden" name="polres" value="<?php echo $session['polres']?>">
			
				<div class="row">
					<div class="col-sm-6 col-md-3">
						<div class="form-group">
							<label class="form-label">Direktorat</label>
							<?php
							$direktorat['']='---pilih direktorat---';
							$opt=array('class'=>'form-control','id'=>'direktorat','onchange'=>"getSubQ('laporan/get_subdit',this.value,'#subdit','','---pilih subdit---');");
							echo form_dropdown('direktorat', array_reverse($direktorat), '',$opt);
							?>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="form-group">
							<label class="form-label">Subdit</label>
							<select id="subdit" name="subdit" class="form-control" onchange="getSubQ('laporan/get_sie',this.value,'#sie','','---pilih sie---');">
								<option value="">---pilih subdit---</option>
								
							</select>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="form-group">
							<label class="form-label">Sie</label>
							<select id="sie" name="sie" class="form-control">
								<option value="">---pilih sie---</option>
								
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 col-md-3">
						<div class="form-group">
							<label class="form-label">RO</label>
							<select id="ro" name="ro" class="form-control" onchange="getSubQ('laporan/get_bag',this.value,'#bag','','---pilih bagian---');">
								<option value="">---pilih ro---</option>
								
							</select>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="form-group">
							<label class="form-label">Bagian</label>
							<select id="bag" name="bag" class="form-control" onchange="getSubQ('laporan/get_subbag',this.value,'#subbag','','---pilih subbag---');">
								<option value="">---pilih bagian---</option>
								
							</select>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="form-group">
							<label class="form-label">Sub Bagian</label>
							<select id="subbag" name="subbag" class="form-control">
								<option value="">---pilih subbag---</option>
								
							</select>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="form-group">
							<label class="form-label">&nbsp;</label>
							<button type="button" class="btn btn-success" onclick="ambil_form();">Ambil Form</button>
							<button type="button" class="btn btn-danger" onclick="reset_form();">Reset Form</button>
						</div>
					</div>
				</div>
				<hr />
				<div class="row">
					<div class="col-sm-6 col-md-4">
						<div class="form-group">
							<label class="form-label">Formulir</label>
							<select class="form-control" id="formulir" name="formulir" onchange="ambil_isi(this.value);">
								<option value="">---pilih formulir---</option>
								<option value="tmc_monitoring_lalin">Monitoring Lalin</option>
								<option value="tmc_gatur_lalin">Gatur Lalin</option>
							</select>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="form-group">
							<label class="form-label">Dasar</label>
							<select id="dasar" name="dasar" class="form-control">
								<option value="">---pilih dasar---</option>
								
							</select>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="form-group">
							<label class="form-label">Nomor</label>
							<input type="text" id="nomor" name="nomor" class="form-control" placeholder="" >
							<input type="hidden" name="tgl" value="<?php echo date('Y-m-d')?>">
						</div>
					</div>
					
				</div>
				<hr />
				<div class="dimmer active ldr hidden">
					<div class="sk-cube-grid">
						<div class="sk-cube sk-cube1"></div>
						<div class="sk-cube sk-cube2"></div>
						<div class="sk-cube sk-cube3"></div>
						<div class="sk-cube sk-cube4"></div>
						<div class="sk-cube sk-cube5"></div>
						<div class="sk-cube sk-cube6"></div>
						<div class="sk-cube sk-cube7"></div>
						<div class="sk-cube sk-cube8"></div>
						<div class="sk-cube sk-cube9"></div>
					</div>
				</div>
				<div id="isilaporan"></div>
			</form></div>
			<div class="card-footer text-right">
				<button type="button" id="btn_save" class="btn btn-primary hidden" onclick="sendData();">Simpan Laporan</button>
			</div>
		</div>
	</div>
</div>
<!-- End Row-->

<script>
function ambil_isi(v){
	if(v==''){
		//alrt("Please select a value for formulir","error");
		return;
	}
	get_content('laporan/get_content',{id:v},'.ldr','#isilaporan');
}
function ambil_form(){
	//at least direktorat is selected
	if($("#direktorat").val()==""){
		alrt("Please select a value for direktorat","error");
		return;
	}
	
	var url=base_url+'laporan/get_form';
	var mtd='POST';
	var frmdata=getFormData($('#myf'));
	var tgt='#formulir';
	var dv='';
	var blnk='---pilih formulir---';
	
	//alert(frmdata);
	
	$.ajax({
		type: mtd,
		url: url,
		data: frmdata,
		success: function(data){
			var json=JSON.parse(data);
			console.log(json);
			$(tgt).find('option').remove();
			var s='<option value="">'+blnk+'</option>';
			if(json['code']=="200"){
				for(i=0;i<json['msgs'].length;i++){
					v="";t="";
					$.each(json['msgs'][i],function (key,val){
						if(key=='v'){v=val;}
						if(key=='t'){t=val;}
					});
					if(v==dv){
						s+='<option selected value="'+v+'">'+t+'</option>';
					}else{
						s+='<option value="'+v+'">'+t+'</option>';
					}
				}
				//log(s);
			}
			$(tgt).append(s);
		},
		error: function(xhr){
			console.log("Error:"+xhr);
		}
	});
}

</script>
