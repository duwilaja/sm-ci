<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
if(isset($incomplete_profile)){
?>
<div class="row">
	<div class="col-lg-12">
		<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
		Welcome <?php echo $session['nama']?> , please complete below forms before continue</div>
	</div>
</div>
<?php
}
?>
<!-- Row -->
<div class="row">
	<div class="col-lg-3">
	

		<div class="card">
			<div class="card-header">
				<h3 class="card-title">My Profile</h3>
				<div class="card-options ">
					<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
					<!--a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a-->
				</div>
			</div>
			<div class="card-body">
					<div class="row mb-2">
						<div class="col-auto preset">
							<img src="<?php echo $base_url?>my/images/sm.png" class="avatar brround avatar-xl" alt="img">
						</div>
						<div class="col">
							<h3 class="mb-1 "><?php echo $session["nama"]?></h3>
							<p class="mb-4 ">NRP : <?php echo $session["nrp"]?></p>
						</div>
					</div>
					<form id="myfxx">
					<input type="hidden" name="preset" id="preset" value="">
					<div class="form-group">
						<input type="file" class="form-control" name="foto" accept="image/*">
					</div>
					</form>
					<div class="form-footer row">
					<div class="col-6">
						<button type="button" class="btn btn-danger btn-block" onclick="$('#preset').val('Y');sendData('#myfxx','profile/avatar');">Reset</button>
					</div><div class="col-6">
					<button type="button" class="btn btn-primary btn-block" onclick="$('#preset').val('N');sendData('#myfxx','profile/avatar');">Save</button>
					</div>
					</div>
			</div>
		</div>
		
	
	
		<div class="card card-collapsed">
			<div class="card-header">
				<div class="card-title">Change Password</div>
				<div class="card-options ">
					<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
				</div>
			</div>
			<div class="card-body">
				<form id="myfx" class="form-horizontal">										
					<div class="row">
						<div class="form-group">
							<label class="form-label">Old Password</label>
							<input type="password" id="op" name="op" placeholder="..." class="form-control">
						</div>
						<div class="form-group">
							<label class="form-label">New Password</label>
							<input type="password" id="np" name="np" placeholder="..." class="form-control">
						</div>
						<div class="form-group">
							<label class="form-label">Retype New Password</label>
							<input type="password" id="rp" name="rp" placeholder="..." class="form-control">
						</div>
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="pull-right">
					<button type="button" class="btn btn-success" onclick="sendData('#myfx','profile/chgpwd');">Change Password</button>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-9">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Edit Profile</h3>
				<div class="card-options ">
					<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
					<!--a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a-->
				</div>
			</div>
			<div class="card-body"><form id="myf">
			
<!--hidden-->
<input type="hidden" name="rowid" id="rowid" value="<?php echo $session['rowid']?>">
<input type="hidden" name="nrp" id="nrp" value="<?php echo $session['nrp']?>" class="form-control"  placeholder="NRP" >

				<div class="row">
					<div class="col-sm-6 col-md-4">
						<div class="form-group">
							<label class="form-label">Nama</label>
							<input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" value="<?php echo $session['nama']?>">
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="form-group">
							<label class="form-label">Pangkat</label>
							<?php
							$pangkat['']='';
							$opt=array('class'=>'form-control','id'=>'pangkat');
							echo form_dropdown('pangkat', array_reverse($pangkat,true), $session['pangkat'],$opt);
							?>
							
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="form-group">
							<label class="form-label">Telp.</label>
							<input type="text" name="telp" id="telp" class="form-control" placeholder="Telp" value="<?php echo $session['telp']?>">
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="form-group">
							<label class="form-label">Email</label>
							<input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo $session['email']?>">
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="form-group">
							<label class="form-label">Unit</label>
							<?php
							$unit['']='';
							$opt=array('class'=>'form-control','id'=>'unit');
							echo form_dropdown('unit', array_reverse($unit,true), $session['unit'],$opt);
							?>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="form-group">
							<label class="form-label">Polda</label>
							<?php
$polda['']='';
//print_r(array_reverse($polda,true));
$opt=array('class'=>'form-control','id'=>'polda','onchange'=>"getSubQ('profile/get_polres',this.value,'#polres','".$session['polres']."');");
echo form_dropdown('polda', array_reverse($polda,true), $session['polda'],$opt);
							?>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="form-group">
							<label class="form-label">Polres</label>
							<select name="polres" id="polres" class="form-control">
								<option value=""></option>
							</select>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="form-group">
							<label class="form-label">Dinas</label>
							<?php
$dinas['']='';
$opt=array('class'=>'form-control','id'=>'dinas','onchange'=>"getSubQ('profile/get_subdin',this.value,'#subdinas','".$session['subdinas']."');");
echo form_dropdown('dinas', array_reverse($dinas,true), $session['dinas'],$opt);
							?>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="form-group">
							<label class="form-label">Subdinas</label>
							<select name="subdinas" id="subdinas" class="form-control">
								<option value=""></option>
							</select>
						</div>
					</div>
					
				</div>
			</form></div>
			<div class="card-footer text-right">
				<button type="button" class="btn btn-primary" onclick="sendData('#myf','profile/save');">Update Profile</button>
			</div>
		</div>
	</div>
</div>
<!-- End Row-->

<script>
var jvalidate,jvalidatex;
function thispage_ready(){
	getSubQ('profile/get_polres',$('#polda').val(),'#polres','<?php echo $session['polres']?>');
	getSubQ('profile/get_subdin',$('#dinas').val(),'#subdinas','<?php echo $session['subdinas']?>');
	//getSubQ('profile/get_subbag',$('#bagian').val(),'#subbag','<?php echo $session['subbag']?>');
	
	get_content('profile/ravatar',{},'.ldr','.preset');
	
	jvalidate = $("#myf").validate({
    rules :{
        "nrp" : {
            required : true
        },
		"nama" : {
            required : true
        },
		"pangkat" : {
            required : true
        },
		"unit" : {
            required : true
        },
		"email" : {
			required : true,
			email: true
		}
    }});
	jvalidatex = $("#myfx").validate({
    ignore: ":hidden:not(.selectpicker)",
	rules :{
        "op" : {
			required : true
		},
		"np" : {
			required : true,
			notEqualTo : "#op"
		},
		"rp" : {
			required : true,
			equalTo : "#np"
		}
    }});
}
function senddatacallback(f){
<?php if(isset($incomplete_profile)){?>
		if(f=='#myf')document.location.href=base_url+'laporan';
<?php }?>

	if(f=='#myfxx'){
		$("#foto").val("");
		//get_content('profile/ravatar',{},'.ldr','.preset');
		//$(".avatar").attr("")
	}

}
</script>