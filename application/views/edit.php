<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

$base_url=base_url();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>

		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		
		<!-- Title -->
		<title>Smart Manajemen : <?php echo $page_title?></title>

		<!--Favicon --
		<link rel="icon" href="<?php echo $base_url;?>aronox/assets/images/brand/favicon.ico" type="image/x-icon"/-->
		
		<!--Favicon -->
		<link rel="icon" href="<?php echo $base_url;?>my/images/sm.png" type="image/png"/>
		
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
		<link rel="stylesheet" href="<?php echo $base_url;?>my/vendor/bootstrap/css/yearpicker.css">
		
		<!-- fancybox CSS-->
		<link rel="stylesheet" href="<?php echo $base_url;?>my/vendor/jquery-fancybox/jquery.fancybox.min.css">
		
		<link rel="stylesheet" href="<?php echo $base_url;?>my/vendor/leaflet/leaflet.css" />
		<link rel="stylesheet" href="<?php echo $base_url;?>my/vendor/leaflet/leaflet.awesome-markers.css" />
		
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
				<div class="app-content page-body" style="margin-top:20px;">
					<div class="container">


					
<!-- Row -->
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Edit</h3>
				
			</div>
			<div class="card-body"><form name="myf" id="myf">
						
<!--hidden-->
<input type="hidden" name="rowid" id="rowid" value="0" />
<input type="hidden" name="nrp" value="<?php echo $session['nrp']?>">
<input type="hidden" name="polda" value="<?php echo $session['polda']?>">
<input type="hidden" name="polres" value="<?php echo $session['polres']?>">
<input type="hidden" name="dinas" value="<?php echo $session['dinas']?>">
<input type="hidden" name="subdinas" value="<?php echo $session['subdinas']?>">
<input type="hidden" name="unit" value="<?php echo $session['unit']?>">
<input type="hidden" name="tgl" value="<?php echo date('Y-m-d')?>">

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
				<div id="isilaporan">

				</div>
			</form></div>
			<div class="card-footer text-right">
				<button type="button" id="btn_save" class="btn btn-primary" onclick="simpanlah();">Simpan Laporan</button>
			</div>
		</div>
	</div>
</div>
<!-- End Row-->



					</div>
				</div><!-- end app-content-->
				
			</div>

		</div>
	
		<!-- Back to top -->
		<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

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
			
		<!-- FIREBASE -->
		<script src="https://www.gstatic.com/firebasejs/8.4.2/firebase-app.js"></script>

		<script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-messaging.js"></script>
		<script src="<?= base_url('my/js_local/local.js');?>"></script>

	<script src="<?php echo $base_url;?>my/vendor/bootstrap/js/moment.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/bootstrap/js/bootstrap-select.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/bootstrap/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/bootstrap/js/yearpicker.js"></script>
    
	<script src="<?php echo $base_url;?>my/vendor/datatables/datatables.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/datatables-buttons/js/buttons.html5.min.js"></script>
	<script src="<?php echo $base_url;?>my/vendor/datatables-buttons/js/jszip.min.js"></script>
	
    <script src="<?php echo $base_url;?>my/vendor/swal2/sweetalert.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/jquery-fancybox/jquery.fancybox.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/chart.js/Chart.min.js"></script>

	<script src="<?php echo base_url();?>my/vendor/leaflet/leaflet.js"></script>
	<script src="<?php echo base_url();?>my/vendor/leaflet/leaflet.awesome-markers.min.js"></script>

	<?php if(@$js_local){ ?>
		<script src="<?= base_url('my/js_local/'.$js_local);?>"></script>
	<?php } ?>
    
	<!-- global vars -->
	<script>
	var ext='';
	var page='';
	var base_url='<?php echo $base_url;?>';
	var recid=<?php echo $i;?>;
	var view='<?php echo $t;?>';
	</script>
	
	<!-- my own custom js -->
	<script src="<?php echo $base_url;?>my/js/custom_dw.js"></script>
	
<!-- this page's JavaScript -->
<script>
var jvalidate=null;
$(document).ready(function(){
	page_ready();
	if(typeof(thispage_ready)=='function'){
		thispage_ready();
	}
});

function simpanlah(){
	if(typeof(safeform)=="function"){
		safeform('#myf'); //sendData to the specific controller/function
	}else{
		sendData('#myf','laporan/save');
	}
}
function thispage_ready(){
	get_contentx('laporan/get_content',{id:view},'.ldr','#isilaporan');
}
function get_contentx(url,data,ldr,target,mthd='POST'){
	$(target).hide();
	$(ldr).show();
	$.ajax({
		type: mthd,
		url: base_url+url,
		data: data,
		success: function(result){
			$(ldr).hide();
			$(target).html(result).show();
			getRec();
			if(typeof(contentcallback)=='function') contentcallback(true);
		},
		error: function(xhr){
			$(ldr).hide();
			alrt('Error loading content','error','Error');
			if(typeof(contentcallback)=='function') contentcallback(false);
		}
	});
}
function getRec(){
	$.ajax({
		type: 'POST',
		url: base_url+'edit/get',
		data: {q:view,id:recid},
		success: function(data){
			var json = JSON.parse(data);
			if(json['code']=='200'){
				$.each(json['msgs'][0],function (key,val){
					$("[name='"+key+"']").val(val);
				});
				subQ(json['msgs'][0]);
			}else{
				log(json['msgs']);
			}
		},
		error: function(xhr){
			log('Please check your connection'+xhr);
		}
	});
}
function subQ(dat){
	if(view=='tmc_ops_pol'||view=='tmc_ops_macet'){
		getSubQ('laporan/get_subq',$("#penyebab").val(),'#penyebabd',dat['penyebabd'],'','penyebab_macet_d','detil as v,detil as t','sebab');
	}
}
</script>

  </body>
</html>
