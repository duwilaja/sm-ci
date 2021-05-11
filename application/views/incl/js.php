<?php
$page_title = isset($title)?$title:"";
$base_url = base_url();
?>
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


		<!-- Jquery js-->
		<script src="<?php echo $base_url;?>aronox/assets/js/vendors/jquery-3.4.0.min.js"></script>

		<!-- Bootstrap4 js-->
		<script src="<?php echo $base_url;?>aronox/assets/plugins/bootstrap/popper.min.js"></script>
		<script src="<?php echo $base_url;?>aronox/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!--Othercharts js-->
		<script src="<?php echo $base_url;?>aronox/assets/plugins/othercharts/jquery.sparkline.min.js"></script>

		<!-- Circle-progress js-->
		<script src="<?php echo $base_url;?>aronox/assets/js/vendors/circle-progress.min.js"></script>

		<!-- Jquery-rating js-->
		<script src="<?php echo $base_url;?>aronox/assets/plugins/rating/jquery.rating-stars.js"></script>

		<!--Horizontal js-->
		<script src="<?php echo $base_url;?>aronox/assets/plugins/horizontal-menu/horizontal.js"></script>

		<!-- P-scroll js-->
		<script src="<?php echo $base_url;?>aronox/assets/plugins/p-scroll/perfect-scrollbar.js"></script>

		<!-- ECharts js -->
		<script src="<?php echo $base_url;?>aronox/assets/plugins/echarts/echarts.js"></script>

		<!-- CHARTJS CHART -->
		<script src="<?php echo $base_url;?>aronox/assets/plugins/chart/chart.bundle.js"></script>
		<script src="<?php echo $base_url;?>aronox/assets/plugins/chart/utils.js"></script>

		<!-- Peitychart js-->
		<script src="<?php echo $base_url;?>aronox/assets/plugins/peitychart/jquery.peity.min.js"></script>
		<script src="<?php echo $base_url;?>aronox/assets/plugins/peitychart/peitychart.init.js"></script>

		<!-- Index js-->
		<script src="<?php echo $base_url;?>aronox/assets/js/index1.js"></script>

		<!-- Apexchart js-->
		<script src="<?php echo $base_url;?>aronox/assets/js/apexcharts.js"></script>

		<!-- Custom js-->
		<script src="<?php echo $base_url;?>aronox/assets/js/custom.js"></script>
			
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


		
	<?php if(@$fileScript){ ?>
		<script src="<?= base_url('my/js_local/'.$fileScript);?>"></script>
	<?php } ?>



	
    

  </body>
</html>
