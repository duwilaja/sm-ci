<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
?>

						<!-- Row -->
						<div class="row">
							<div class="col-lg-12">
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
									
										<div class="row">
											<div class="col-sm-6 col-md-4">
												<div class="form-group">
													<label class="form-label">NRP</label> <?php echo $session['nrp']?>
													<input type="hidden" readonly name="nrp" id="nrp" value="<?php echo $session['nrp']?>" class="form-control"  placeholder="NRP" >
												</div>
											</div>
											<div class="col-sm-6 col-md-4">
												<div class="form-group">
													<label class="form-label">Nama</label>
													<input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" value="<?php echo $session['nama']?>">
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
													<label class="form-label">Pangkat</label>
													<?php
													$opt=array('class'=>'form-control','id'=>'pangkat');
													echo form_dropdown('pangkat', $pangkat, $session['pangkat'],$opt);
													?>
													
												</div>
											</div>
											<div class="col-sm-6 col-md-4">
												<div class="form-group">
													<label class="form-label">Polda</label>
													<?php
													$opt=array('class'=>'form-control','id'=>'polda','onchange'=>"getSubQ('profile/get_polres',this.value,'#cmbpolres');");
													echo form_dropdown('polda', $polda, $session['polda'],$opt);
													?>
												</div>
											</div>
											<div class="col-sm-6 col-md-4">
												<div class="form-group">
													<label class="form-label">Polres</label>
													<input type="hidden" id="polres">
													<select name="polres" id="cmbpolres" class="form-control">
													</select>
												</div>
											</div>
											<div class="col-sm-6 col-md-4">
												<div class="form-group">
													<label class="form-label">Unit</label>
													<?php
													$opt=array('class'=>'form-control','id'=>'unit');
													echo form_dropdown('unit', $unit, $session['unit'],$opt);
													?>
												</div>
											</div>
											<div class="col-sm-6 col-md-4">
												<div class="form-group">
													<label class="form-label">Telp.</label>
													<input type="text" name="telp" id="telp" class="form-control" placeholder="Telp" value="<?php echo $session['telp']?>">
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

						<!-- Row -->
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header ">
										<h3 class="card-title ">Pendidikan</h3>
										<div class="card-options">
											<button id="add__new__list" onclick="openForm('didik',0,'#fdidik','#drowid');" type="button" class="btn btn-sm btn-success " data-toggle="modal" data-target="#didik"><i class="fa fa-plus"></i> Add</button>
										</div>
									</div>
									<div class="card-body table-responsive">
										<table id="tbldidik" class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
											<thead>
												<tr>
													<th scope="col">Institusi</th>
													<th scope="col">Tahun</th>
													<th scope="col">Image</th>
												</tr>
											</thead>
											<tbody>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<!-- End row -->

						<!-- Row -->
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header ">
										<h3 class="card-title ">Sertifikasi</h3>
										<div class="card-options">
											<button id="add__new__list" type="button" onclick="openForm('sertif',0,'#fsertif','#srowid');" class="btn btn-sm btn-success " data-toggle="modal" data-target="#sertif"><i class="fa fa-plus"></i> Add </button>
										</div>
									</div>
									<div class="card-body table-responsive">
										<table id="tblsertik" class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
											<thead>
												<tr>
													<th scope="col">Nama Sertifikasi</th>
													<th scope="col">Institusi</th>
													<th scope="col">Tahun</th>
													<th scope="col">Image</th>
												</tr>
											</thead>
											<tbody>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<!-- End row -->
						
					</div>
				</div><!-- end app-content-->
				
<!-- Modal-->
<div id="didik" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true" class="modal fade text-left modal_form">
  <div role="document" class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header"><strong id="exampleModalLabel1" class="modal-title">Pendidikan</strong>
		<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">x</span></button>
	  </div>
	  <div class="modal-body">
		<!--p>Lorem ipsum dolor sit amet consectetur.</p-->
		<form id="fdidik" class="form-horizontal">
		  <div class="row">
			<div class="form-group col-md-12">
				<label>Institusi</label>
				<input type="text" id="institusi" name="institusi" placeholder="..." class="form-control">
			</div>
		  </div>
		  <div class="row">
			<div class="form-group col-md-12">
				<label>Tahun</label>
				<input type="text" id="th" name="th" placeholder="..." class="form-control">
			</div>
		  </div>
		  <div class="row">
			<div class="form-group col-md-12">
				<label>Image</label>
				<input type="file" name="dimg" placeholder="..." class="form-control">
			</div>
		  </div>
		</form>
	  </div>
	  <div class="modal-footer">
	    <button type="button" class="btn btn-danger" id="bdel"  onclick="bklik('didik');confirmDelete('#fdidik','#dsv');">Delete</button>
		<button type="button" class="btn btn-success" onclick="bklik('didik');saveData('#fdidik','#dsv','#drowid');">Save</button>
		<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
		
	  </div>
	</div>
  </div>
</div>
				
<!-- Modal-->
<div id="sertif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true" class="modal fade text-left modal_form">
  <div role="document" class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header"><strong id="exampleModalLabel1" class="modal-title">Sertifikasi</strong>
		<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">x</span></button>
	  </div>
	  <div class="modal-body">
		<!--p>Lorem ipsum dolor sit amet consectetur.</p-->
		<form id="fsertif" class="form-horizontal">
		  <div class="row">
			<div class="form-group col-md-12">
				<label>Sertifikasi</label>
				<input type="text" id="sertifikasi" name="sertifikasi" placeholder="..." class="form-control">
			</div>
		  </div>
		  <div class="row">
			<div class="form-group col-md-12">
				<label>Institusi</label>
				<input type="text" id="institusis" name="institusi" placeholder="..." class="form-control">
			</div>
		  </div>
		  <div class="row">
			<div class="form-group col-md-12">
				<label>Tahun</label>
				<input type="text" id="ths" name="th" placeholder="..." class="form-control">
			</div>
		  </div>
		  <div class="row">
			<div class="form-group col-md-12">
				<label>Image</label>
				<input type="file" name="simg" placeholder="..." class="form-control">
			</div>
		  </div>
		</form>
	  </div>
	  <div class="modal-footer">
	    <button type="button" class="btn btn-danger" id="bdel"  onclick="bklik('sertif');confirmDelete('#fsertif','#ssv');">Delete</button>
		<button type="button" class="btn btn-success" onclick="bklik('sertif');saveData('#fsertif','#ssv','#srowid');">Save</button>
		<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
		
	  </div>
	</div>
  </div>
</div>

<script>
function thispage_ready(){
	getSubQ('profile/get_polres',$('#polda').val(),'#cmbpolres','<?php echo $session['polres']?>');
}
</script>