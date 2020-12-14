<?php
$page_title = isset($title)?$title:"";
$base_url = base_url();
$avatar=$session['unit']!=''?$session['unit'].'.png':'sm.png';
$avatar=$base_url.'my/images/'.$avatar;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>

		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		
		<!-- Title -->
		<title>Smart Manajemen : <?php echo $page_title?></title>

		<!--Favicon -->
		<link rel="icon" href="<?php echo $base_url;?>aronox/assets/images/brand/favicon.ico" type="image/x-icon"/>

		<!-- Style css -->
		<link href="<?php echo $base_url;?>aronox/assets/css/style.css" rel="stylesheet" />

		<!--Horizontal css -->
        <link id="effect" href="<?php echo $base_url;?>aronox/assets/plugins/horizontal-menu/dropdown-effects/fade-up.css" rel="stylesheet" />
        <link href="<?php echo $base_url;?>aronox/assets/plugins/horizontal-menu/horizontal.css" rel="stylesheet" />

		<!-- P-scroll bar css-->
		<link href="<?php echo $base_url;?>aronox/assets/plugins/p-scroll/perfect-scrollbar.css" rel="stylesheet" />

		<!---Icons css-->
		<link href="<?php echo $base_url;?>aronox/assets/plugins/iconfonts/icons.css" rel="stylesheet" />
		<link href="<?php echo $base_url;?>aronox/assets/plugins/iconfonts/font-awesome/font-awesome.min.css" rel="stylesheet">
		<link href="<?php echo $base_url;?>aronox/assets/plugins/iconfonts/plugin.css" rel="stylesheet" />
		
		<!-- WYSIWYG Editor css -->
		<link href="<?php echo $base_url;?>aronox/assets/plugins/wysiwyag/richtext.css" rel="stylesheet" />
		
		<!-- Select2 css -->
		<link href="<?php echo $base_url;?>aronox/assets/plugins/select2/select2.min.css" rel="stylesheet" />

		<!-- Skin css-->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="<?php echo $base_url;?>aronox/assets/skins/hor-skin/hor-skin1.css" />
		
		<!-- datatables CSS-->
		<!--link rel="stylesheet" href="my/vendor/datatables/datatables.min.css"-->
		<link rel="stylesheet" href="<?php echo $base_url;?>my/vendor/datatables.net-bs4/dataTables.bootstrap4.css">
		<link rel="stylesheet" href="<?php echo $base_url;?>my/vendor/datatables-buttons/css/buttons.bootstrap4.min.css">
		
		<!-- bootstrap CSS-->
		<link rel="stylesheet" href="<?php echo $base_url;?>my/vendor/bootstrap/css/bootstrap-select.min.css">
		<link rel="stylesheet" href="<?php echo $base_url;?>my/vendor/bootstrap/css/bootstrap-datetimepicker.min.css">
		
		<!-- fancybox CSS-->
		<link rel="stylesheet" href="<?php echo $base_url;?>my/vendor/jquery-fancybox/jquery.fancybox.min.css">
		
		<!-- overwrite css -->
		<link href="<?php echo $base_url;?>my/css/custom.css" rel="stylesheet" />

	</head>

	<body class="app"><!-- Start Switcher -->
		
		<!---Global-loader-->
		<div id="global-loader" >
			<img src="<?php echo $base_url;?>aronox/assets/images/svgs/loader.svg" alt="loader">
		</div>

		<div class="page">
			<div class="page-main">
							<div class="header top-header">
					<div class="container">
						<div class="d-flex">
							<a id="horizontal-navtoggle" class="animated-arrow hor-toggle"><span></span></a><!-- sidebar-toggle-->
							<a class="header-brand" href="<?php echo $base_url;?>home">
								<img src="<?php echo $base_url;?>my/images/logo.png" class="header-brand-img desktop-lgo" alt="Aronox logo">
								<img src="<?php echo $base_url;?>my/images/sm.png" class="header-brand-img mobile-logo" alt="Aronox logo">
							</a>

							<!--div class="mt-1">
								<form class="form-inline" method="POST" action="n_device.php">
									<div class="search-element">
										<input name="cari" type="search" class="form-control header-search" placeholder="Search..." aria-label="Search" tabindex="1">
										<button class="btn btn-primary-color" type="submit"><i class="fa fa-search"></i></button>
									</div>
								</form>
							</div><!-- SEARCH -->

							<div class="d-flex order-lg-2 ml-auto">
								<!--a href="#" data-toggle="search" class="nav-link nav-link-lg d-md-none navsearch"><i class="fa fa-search"></i></a-->
								<div class="dropdown   header-fullscreen" >
									<a  class="nav-link icon full-screen-link"  id="fullscreen-button">
										<i class="mdi mdi-arrow-collapse"></i>
									</a>
								</div>
								<!--div class="dropdown d-md-flex message hidden">
									<a class="nav-link icon text-center" data-toggle="dropdown">
										<i class="mdi mdi-email-outline"></i>
										<span class="nav-unread bg-warning-1 pulse"></span>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<a href="#" class="dropdown-item d-flex mt-2 pb-3">
											<div class="avatar avatar-md brround mr-3 d-block cover-image" data-image-src="aronox/assets/images/users/5.jpg">
												<span class="avatar-status bg-green"></span>
											</div>
											<div>
												<strong>Madeleine</strong>
												<p class="mb-0 fs-13">Hey! there I' am available</p>
												<div class="small">3 hours ago</div>
											</div>
										</a>
										<a href="#" class="dropdown-item d-flex pb-3">
											<div class="avatar avatar-md brround mr-3 d-block cover-image" data-image-src="aronox/assets/images/users/8.jpg">
												<span class="avatar-status bg-red"></span>
											</div>
											<div>
												<strong>Anthony</strong>
												<p class="mb-0 fs-13 ">New product Launching</p>
												<div class="small">5  hour ago</div>
											</div>
										</a>
										<a href="#" class="dropdown-item d-flex pb-3">
											<div class="avatar avatar-md brround mr-3 d-block cover-image" data-image-src="aronox/assets/images/users/11.jpg">
												<span class="avatar-status bg-yellow"></span>
											</div>
											<div>
												<strong>Olivia</strong>
												<p class="mb-0 fs-13 ">New Schedule Realease</p>
												<div class="small">45 mintues ago</div>
											</div>
										</a>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item text-center">See all Messages</a>
									</div>
								</div><!-- MESSAGE-BOX -->

								<!--div class="dropdown header-notify">
									<a class="nav-link icon" data-toggle="dropdown">
										<i class="mdi mdi-bell-outline"></i>
										<span class="pulse bg-danger hidden"></span>
									</a>
									<div id="lonceng" class="hidden">
									<div id="isilonceng" class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
									
									</div>
									</div>
								</div-->
								
								<div class="dropdown ">
									<a class="nav-link pr-0 leading-none" href="#" data-toggle="dropdown" aria-expanded="false">
									    <div class="profile-details mt-2">
											<span class="mr-3 font-weight-semibold"><?php echo isset($session)?$session['nrp']:""?></span>
											<small class="text-muted mr-3"><?php echo isset($session)?$session['unit']:""?></small>
										</div>
										<img class="avatar avatar-md brround" src="<?php echo $avatar?>" alt="image">
									 </a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
										<a class="dropdown-item" href="<?php echo $base_url?>account">
											<i class="dropdown-icon mdi mdi-account-outline "></i> My Account
										</a>
										<a class="dropdown-item" href="<?php echo $base_url?>login/out">
											<i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign out
										</a>
									<!--div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?php echo $base_url?>users">
											<i class="dropdown-icon mdi  mdi-account-multiple"></i> Users
										</a-->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Horizontal-menu -->
				<div class="horizontal-main hor-menu clearfix">
					<div class="horizontal-mainwrapper container clearfix">
						<nav class="horizontalMenu clearfix">
							<ul class="horizontalMenu-list">
								<li aria-haspopup="true"><a href="<?php echo $base_url?>home" class=""><i class="fa fa-at"></i> Home</a>
								</li>
								<li aria-haspopup="true"><a href="<?php echo $base_url?>profile" class=""><i class="fa fa-address-card-o"></i> Profil</a>
								</li>
								<li aria-haspopup="true"><a href="<?php echo $base_url?>laporan" class="sub-icon"><i class="fa fa-pencil-square-o"></i> Laporan</a>
								</li>
								<li aria-haspopup="true"><a href="<?php echo $base_url?>rekap" class="sub-icon"><i class="fa fa-file-text-o"></i> Rekap</a>
								</li>
								<li aria-haspopup="true"><a href="<?php echo $base_url?>dashboard" class="sub-icon"><i class="fa fa-dashboard"></i> Dashboard</a>
								</li>
								<!--li aria-haspopup="true"><a href="#" class="sub-icon"><i class="fa fa-dashboard"></i> Overview <i class="fa fa-angle-down horizontal-icon"></i></a>
									<ul class="sub-menu">
										<li aria-haspopup="true" class="home"><a class="home" href="home.php">Summary</a></li>
										<li aria-haspopup="true" class="home"><a class="home" href="home2.php">Dash Pusat</a></li>
										<li aria-haspopup="true" class="home"><a class="home" href="home3.php">Dash Polda</a></li>
										<li aria-haspopup="true" class="home"><a class="home" href="home4.php">Dash Polres</a></li>
									</ul>
								</li-->
								<li aria-haspopup="true"><a href="#" class="sub-icon"><i class="fa fa-cogs"></i> Setup <i class="fa fa-angle-down horizontal-icon"></i></a>
									<ul class="sub-menu">
										<!--li aria-haspopup="true"><a href="m_user.php">User</a></li-->
										<li aria-haspopup="true"><a href="<?php echo $base_url?>polda">Polda</a></li>
										<li aria-haspopup="true"><a href="<?php echo $base_url?>polres">Polres</a></li>
										<li aria-haspopup="true"><a href="<?php echo $base_url?>dir">Direktorat</a></li>
										<li aria-haspopup="true"><a href="<?php echo $base_url?>subdit">Subdit</a></li>
										<li aria-haspopup="true"><a href="<?php echo $base_url?>bag">Bagian</a></li>
										<li aria-haspopup="true"><a href="<?php echo $base_url?>subbag">Sub Bagian</a></li>
										<li aria-haspopup="true"><a href="<?php echo $base_url?>unit">Unit</a></li>
										<li aria-haspopup="true"><a href="<?php echo $base_url?>pangkat">Kepangkatan</a></li>
										<li aria-haspopup="true"><a href="<?php echo $base_url?>dasargiat">Dasar Giat</a></li>
									</ul>
								</li>
							</ul>
						</nav>
						<!--Nav end -->
					</div>
				</div>
				<!-- Horizontal-menu end -->

				<div class="app-content page-body">
					<div class="container">
<?php if(isset($title)){?>
						<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title"><?php echo $page_title?></h4>
							</div>

						</div>
						<!--End Page header-->
						
						<?php echo $contents;?>
						
					</div>
				</div><!-- end app-content-->
				
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
		<script src="<?php echo $base_url;?>aronox/assets/js/vendors/jquery-3.4.0.min.js"></script>

		<!-- Bootstrap4 js-->
		<script src="<?php echo $base_url;?>aronox/assets/plugins/bootstrap/popper.min.js"></script>
		<script src="<?php echo $base_url;?>aronox/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!--Othercharts js-->
		<script src="<?php echo $base_url;?>aronox/assets/plugins/othercharts/jquery.sparkline.min.js"></script>

		<!-- Circle-progress js-->
		<script src="<?php echo $base_url;?>aronox/assets/js/vendors/circle-progress.min.js"></script>

		<!--Horizontal js-->
		<script src="<?php echo $base_url;?>aronox/assets/plugins/horizontal-menu/horizontal.js"></script>

		<!-- P-scroll js-->
		<script src="<?php echo $base_url;?>aronox/assets/plugins/p-scroll/perfect-scrollbar.js"></script>
		
		<!-- Peitychart js-->
		<script src="<?php echo $base_url;?>aronox/assets/plugins/peitychart/jquery.peity.min.js"></script>
		
		<!-- Custom js-->
		<script src="<?php echo $base_url;?>aronox/assets/js/custom.js"></script>
		
		<!-- WYSIWYG Editor js -->
		<script src="<?php echo $base_url;?>aronox/assets/plugins/wysiwyag/jquery.richtext.js"></script>
		
		<!--Select2 js -->
		<script src="<?php echo $base_url;?>aronox/assets/plugins/select2/select2.full.min.js"></script>
			
	<script src="<?php echo $base_url;?>my/vendor/bootstrap/js/moment.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/bootstrap/js/bootstrap-select.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/bootstrap/js/bootstrap-datetimepicker.min.js"></script>
    
	<script src="<?php echo $base_url;?>my/vendor/datatables/datatables.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/datatables-buttons/js/buttons.html5.min.js"></script>
	
    <script src="<?php echo $base_url;?>my/vendor/swal2/sweetalert.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/jquery-fancybox/jquery.fancybox.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/chart.js/Chart.min.js"></script>

	<?php if(@$js_local){ ?>
		<script src="<?= base_url('my/js_local/'.$js_local);?>"></script>
	<?php } ?>
    
	<!-- global vars -->
	<script>
	var ext='';
	var page='';
	var base_url='<?php echo $base_url;?>';
	</script>
	
	<!-- my own custom js -->
	<script src="<?php echo $base_url;?>my/js/custom_dw.js"></script>
	
<!-- this page's JavaScript -->
<script>
$(document).ready(function(){
	page_ready();
	if(typeof(thispage_ready)=='function'){
		thispage_ready();
	}
});
</script>

  </body>
</html>