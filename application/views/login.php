<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>

		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		
		<!-- Title -->
		<title>Smart Manajemen</title>

		<!--Favicon -->
		<link rel="icon" href="aronox/assets/images/brand/favicon.ico" type="image/x-icon"/>

		<!-- Style css -->
		<link href="aronox/assets/css/style.css" rel="stylesheet" />

		<!--Horizontal css -->
        <link id="effect" href="aronox/assets/plugins/horizontal-menu/dropdown-effects/fade-up.css" rel="stylesheet" />
        <link href="aronox/assets/plugins/horizontal-menu/horizontal.css" rel="stylesheet" />

		<!-- P-scroll bar css-->
		<link href="aronox/assets/plugins/p-scroll/perfect-scrollbar.css" rel="stylesheet" />

		<!---Icons css-->
		<link href="aronox/assets/plugins/iconfonts/icons.css" rel="stylesheet" />
		<link href="aronox/assets/plugins/iconfonts/font-awesome/font-awesome.min.css" rel="stylesheet">
		<link href="aronox/assets/plugins/iconfonts/plugin.css" rel="stylesheet" />
		
		<!-- WYSIWYG Editor css -->
		<link href="aronox/assets/plugins/wysiwyag/richtext.css" rel="stylesheet" />
		
		<!-- Select2 css -->
		<link href="aronox/assets/plugins/select2/select2.min.css" rel="stylesheet" />

		<!-- Skin css-->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="aronox/assets/skins/hor-skin/hor-skin1.css" />
		
		<!-- datatables CSS-->
		<!--link rel="stylesheet" href="my/vendor/datatables/datatables.min.css"-->
		<link rel="stylesheet" href="my/vendor/datatables.net-bs4/dataTables.bootstrap4.css">
		<link rel="stylesheet" href="my/vendor/datatables-buttons/css/buttons.bootstrap4.min.css">
		
		<!-- bootstrap CSS-->
		<link rel="stylesheet" href="my/vendor/bootstrap/css/bootstrap-select.min.css">
		<link rel="stylesheet" href="my/vendor/bootstrap/css/bootstrap-datetimepicker.min.css">
		
		<!-- leaflet CSS-->
		<link rel="stylesheet" href="my/vendor/leaflet/leaflet.css">
		<link rel="stylesheet" href="my/vendor/leaflet/MarkerCluster.css">
		<link rel="stylesheet" href="my/vendor/leaflet/MarkerCluster.Default.css">
		<link rel="stylesheet" href="my/vendor/leaflet/leaflet.awesome-markers.css">
		
		<!-- fancybox CSS-->
		<link rel="stylesheet" href="my/vendor/jquery-fancybox/jquery.fancybox.min.css">
		
		<!-- overwrite css -->
		<link href="my/css/custom.css" rel="stylesheet" />

	</head>

	<body class="app"><!-- Start Switcher -->
		
		<!---Global-loader-->
		<div id="global-loader" >
			<img src="aronox/assets/images/svgs/loader.svg" alt="loader">
		</div>

		<div class="page">
			<div class="page-main">
							<div class="container text-center single-page single-pageimage construction-body">
				    <div class="row justify-content-center">
						<div class="col-xl-7 col-lg-6 col-md-12">
							<!--img src="aronox/assets/images/sm_img/gambar-logo.png" class="construction-img mb-7 h-480  mt-5 mt-xl-0" alt="">
							<img src="aronox/assets/images/svgs/login.svg" class="construction-img mb-7 h-480  mt-5 mt-xl-0" alt=""-->
							<img src="my/images/gambar-login.png" class="construction-img mb-7 mt-5 mt-xl-0" alt="">
						</div>
						<div class="col-xl-5 col-lg-6 col-md-12 ">
							<div class="col-lg-12">
							    <img src="my/images/logo.png" class=" light-view mb-4" alt="Aronox logo">
								<div class="wrapper wrapper2">
									<form id="login" method="post" class="card-body" tabindex="500">
										<h2 class="mb-1 font-weight-semibold">Login</h2>
										<p class="mb-6">Sign In to your account</p>
										<div class="input-group mb-3">
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="user" class="form-control" placeholder="NRP" value="">
										</div>
										<div class="input-group mb-4">
											<span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
											<input type="password" name="passwd" class="form-control" placeholder="Password" value="">
										</div>
										<div class="row mb-0">
											<div class="col-12">
												<button type="submit" onclick="if($('#login').valid()){this.form.submit();}" class="btn btn-primary btn-block">Login</button>
											</div>
											<div class="col-12 mb-0">
												<a href="#" onclick="openForm('',0,'#reset_form');" data-toggle="modal" data-target="#modal_reset" class="btn btn-link box-shadow-0 px-0">Forgot password?</a>
												<p class=" mb-0">Don't have account?<a href="#" onclick="openForm('',0,'#register_form');" data-toggle="modal" data-target="#modal_register" class="text-primary ml-1">Sign UP</a></p>
											</div>
										</div>
									</form>
									<div class="card-body social-icons border-top">
										<!--a class="btn  btn-social btn-fb mr-2"><i class="fa fa-facebook"></i> </a>
										<a class="btn  btn-social btn-googleplus mr-2"><i class="fa fa-google-plus"></i></a>
										<a class="btn  btn-social btn-twitter-transparant  "><i class="fa fa-twitter"></i></a-->
										Smart Manajemen
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

	  <div class="modal fade" id="modal_register">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Register</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
				<form id="register_form">
					<input type="hidden" name="rowid" value="0">
					<input type="hidden" name="mnu" value="register">
				  <div class="row">
					<div class="form-group col-md-6">
						<label>NRP</label>
						<input type="text" name="nrp" placeholder="..." class="form-control">
					</div>
				    <div class="form-group col-md-6">
						<label>Nama</label>
						<input type="text" name="nama" placeholder="..." class="form-control">
					</div>
				  </div>
				  <div class="row">
					<div class="form-group col-md-6">
						<label>Pangkat</label>
						<select name="pangkat" placeholder="..." class="form-control">
						<option value="AKBP">AKBP</option>						</select>
					</div>
					<div class="form-group col-md-6">
						<label>Polda</label>
						<select name="polda" placeholder="..." class="form-control" onchange="getSubQ('cmbres',this.value,'#polres');">
						<option value=""></option>
						<option value="METRO">Pola Metro Jaya</option>						</select>
					</div>
				  </div>
				  <div class="row">
					<div class="form-group col-md-6">
						<label>Polres</label>
						<select id="polres" name="polres" placeholder="..." class="form-control">
						<option value=""></option>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label>Unit</label>
						<select name="unit" placeholder="..." class="form-control">
						<option value="ETLE">ETLE</option><option value="SDC">SDC</option><option value="TMC">TMC</option>						</select>
					</div>
				  </div>
				  <div class="row">
					<div class="form-group col-md-6">
						<label>Email</label>
						<input type="text" name="email" placeholder="..." class="form-control">
					</div>
					<div class="form-group col-md-6">
						<label>Telp.</label>
						<input type="text" name="telp" placeholder="..." class="form-control">
					</div>
				  </div>
				  
				</form>
            </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" onclick="saveData('#register_form');">Register</button>
			</div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
	  <div class="modal fade" id="modal_reset">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Reset Password</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			<form id="reset_form">
				<input type="hidden" name="rowid" value="0">
				<input type="hidden" name="mnu" value="reset">
			  <div class="row">
				<div class="form-group col-md-12">
					<label>NRP</label>
					<input type="text" name="rnip" placeholder="..." class="form-control">
				</div>
			  </div>
			  <div class="row">
				<div class="form-group col-md-12">
					<label>Email</label>
					<input type="text" name="remail" placeholder="..." class="form-control">
				</div>
			  </div>
			</form>
            </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" onclick="saveData('#reset_form');">Reset My Password</button>
			</div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
	  
			</div>

			<!--Footer-->
			<footer class="footer">
				<div class="container">
					<div class="row align-items-center flex-row-reverse">
						<div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
							Copyright ©2020 <a target="_blank" href="http://www.matrik.co.id">Matrik</a>. All rights reserved.
						</div>
					</div>
				</div>
			</footer>
			<!-- End Footer-->

		</div>
	
		<!-- Back to top -->
		<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

	  <div class="modal fade" id="modal_delete">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Delete this data?</p>
            </div>
			<div class="modal-footer justify-content-between">
				
				<button type="button" class="btn btn-danger" onclick="deleteData();">Delete</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				
			</div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
	  
	  <div class="modal fade" id="modal_process">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="process_title">Process</h4>
              <!--button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button-->
            </div>
            <div class="modal-body" id="process_result">
              <p>Processing, please wait ...</p>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
		<!-- Jquery js-->
		<script src="aronox/assets/js/vendors/jquery-3.4.0.min.js"></script>

		<!-- Bootstrap4 js-->
		<script src="aronox/assets/plugins/bootstrap/popper.min.js"></script>
		<script src="aronox/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!--Othercharts js-->
		<script src="aronox/assets/plugins/othercharts/jquery.sparkline.min.js"></script>

		<!-- Circle-progress js-->
		<script src="aronox/assets/js/vendors/circle-progress.min.js"></script>

		<!--Horizontal js-->
		<script src="aronox/assets/plugins/horizontal-menu/horizontal.js"></script>

		<!-- P-scroll js-->
		<script src="aronox/assets/plugins/p-scroll/perfect-scrollbar.js"></script>
		
		<!-- Peitychart js-->
		<script src="aronox/assets/plugins/peitychart/jquery.peity.min.js"></script>
		
		<!-- Custom js-->
		<script src="aronox/assets/js/custom.js"></script>
		
		<!-- WYSIWYG Editor js -->
		<script src="aronox/assets/plugins/wysiwyag/jquery.richtext.js"></script>
		
		<!--Select2 js -->
		<script src="aronox/assets/plugins/select2/select2.full.min.js"></script>
			
	<script src="my/vendor/bootstrap/js/moment.min.js"></script>
    <script src="my/vendor/bootstrap/js/bootstrap-select.min.js"></script>
    <script src="my/vendor/bootstrap/js/bootstrap-datetimepicker.min.js"></script>
    
	<script src="my/vendor/datatables/datatables.min.js"></script>
    <script src="my/vendor/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="my/vendor/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="my/vendor/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="my/vendor/datatables-buttons/js/buttons.html5.min.js"></script>
	
    <script src="my/vendor/swal2/sweetalert.min.js"></script>
    <script src="my/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="my/vendor/jquery-fancybox/jquery.fancybox.min.js"></script>
    <script src="my/vendor/chart.js/Chart.min.js"></script>
    
	<script src="my/vendor/leaflet/leaflet.js"></script>
    <script src="my/vendor/leaflet/leaflet.markercluster.js"></script>
	<script src="my/vendor/leaflet/leaflet.awesome-markers.js"></script>
    
	<!-- global vars -->
	<script>
	var ext='.php';
	var page='';
	</script>
	<!-- my own custom js -->
	<script src="my/js/custom_dw.js"></script>
	
	<!-- this page's JavaScript -->
	<script>
var x="";
var m="";
var jvalidate, jvalidate2, jvalidate3;
$(document).ready(function (){
	$(".page-main").addClass("page-single");
	jvalidate = $("#login").validate({
    rules :{
        "user" : {
            required : true
        },
		"passwd" : {
			required : true
		}
    }});
	showAlert();
	
	jvalidate2 = $("#reset_form").validate({
    rules :{
        "rnip" : {
            required : true
        },
		"remail" : {
			required : true,
			email: true
		}
    }});
	
	jvalidate3 = $("#register_form").validate({
    rules :{
        "nrp" : {
            required : true
        },
		"nama" : {
            required : true
        },
		"polda" : {
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
});

function showAlert(){
	if(m!=""){
		alrt(m,x);
	}
}


</script>
  </body>
</html>
