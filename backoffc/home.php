<?php 
include "inc.common.php";
include "inc.session.php";

$page_icon="fa fa-home";
$page_title="Home";
$modal_title="Title of Modal";
$menu="home";

$breadcrumb="Home/$page_title";

include "inc.head.php";
include "inc.menutop.php";
?>

				<div class="app-content page-body">
					<div class="container">

						<!--Page header--
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title"><?php echo ""//$page_title ?></h4>
								<ol class="breadcrumb pl-0">
									<?php echo ""//breadcrumb($breadcrumb)?>
								</ol>
							</div>

						</div>
						<!--End Page header-->
						
						<div class="row">
							<div class="col-lg-12">
								<div class="alert alert-info" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Welcome <?php echo $s_NAME?> @ <?php echo $s_GRP?> <?php echo $s_POLDA?> <?php echo $s_POLRES?></div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-4">
								<img src="../my/images/infos/rain.jpg" />
							</div>
							<div class="col-md-4">
								<img src="../my/images/infos/tip.jpg" />
							</div>
							<div class="col-md-4">
								<img src="../my/images/infos/rst.jpg" />
							</div>
						</div>
						
					</div>
				</div><!-- end app-content-->
				
<?php 
include "inc.foot.php";
include "inc.js.php";
?>
<script>
$(document).ready(function(){
	page_ready();
})
</script>

  </body>
</html>