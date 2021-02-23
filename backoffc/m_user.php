<?php 
$restrict_lvl=array("Korlantas","Ditlantas","Satlantas");
$restrict_grp=array("Bag TIK");

include "inc.common.php";
include "inc.session.php";

$page_icon="fa fa-table";
$page_title="User";
$modal_title="User";
$card_title="Master $page_title";

$menu="user";

$breadcrumb="Master/$page_title";

include "inc.head.php";
include "inc.menutop.php";

include "inc.db.php";

$conn=connect();

//$rs=exec_qry($conn,"select id,nama from adm_info_usr order by nama");
//$persons=fetch_all($rs);

disconnect($conn);
?>

<div class="app-content page-body">
	<div class="container">

		<!--Page header-->
		<div class="page-header">
			<div class="page-leftheader">
				<h4 class="page-title"><?php echo $page_title ?></h4>
				<ol class="breadcrumb pl-0">
					<?php echo breadcrumb($breadcrumb)?>
				</ol>
			</div>
			<!--div class="page-rightheader">
				<a href="#" class="btn btn-primary" onclick="" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Create</a>
			</div-->
		</div>
		<!--End Page header-->
		
				<div class="card">
					<div class="card-header">
						<div class="card-title"><?php echo $card_title ?></div>
						<div class="card-options ">
							<!--a href="#" title="Batch" class=""><i class="fe fe-upload"></i></a>
							<a href="#" onclick="openForm(0);" data-toggle="modal" data-target="#myModal" title="Add" class=""><i class="fe fe-plus"></i></a-->
							<a href="#" title="Expand/Collapse" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
							<!--a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a-->
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="mytbl" class="table table-striped table-bordered w-100">
								<thead>
									<tr>
										<th>NRP</th>
										<th>Name</th>
										<th>Email</th>
										<th>Dinas</th>
										<th>Subdinas</th>
										<th>Polda</th>
										<th>Polres</th>
										<th>ADM</th>
										<th>DASH</th>
										<th>Aktif</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>

	</div>
</div><!-- end app-content-->

<!-- Modal-->
<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left modal_form">
  <div role="document" class="modal-dialog modal-lg">
	<div class="modal-content">
	  <div class="modal-header"><strong id="exampleModalLabel" class="modal-title"><?php echo $modal_title?></strong>
		<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">x</span></button>
	  </div>
	  <div class="modal-body">
		<!--p>Lorem ipsum dolor sit amet consectetur.</p-->
		<form id="myf" class="form-horizontal">
<!--hidden-->
<input type="hidden" name="rowid" id="rowid" value="0">
<input type="hidden" name="mnu" value="<?php echo $menu?>">
<input type="hidden" id="sv" name="sv" />
<input type="hidden" name="cols" value="email,isactive,das,adm" />
<input type="hidden" name="tname" value="persons" />
		
		  <div class="row">
			<div class="form-group col-md-6">
				<label>NRP</label>
				<input type="text" id="nrp" name="nrp" placeholder="..." class="form-control">
			</div>
			<div class="form-group col-md-6">
				<label>Nama</label>
				<input type="text" id="nama" name="nama" placeholder="..." class="form-control">
			</div>
		  </div>
		  <div class="row">
			<div class="form-group col-md-6">
				<label>Pangkat</label>
				<input type="text" id="pangkat" name="pangkat" placeholder="..." class="form-control">
			</div>
			<div class="form-group col-md-6">
				<label>Email</label>
				<input type="text" id="email" name="email" placeholder="..." class="form-control">
			</div>
		  </div>
		  <div class="row">
			<div class="form-group col-md-6">
				<label>Dinas</label>
				<input type="text" id="dinas" name="dinas" placeholder="..." class="form-control">
			</div>
			<div class="form-group col-md-6">
				<label>Subdinas</label>
				<input type="text" id="subdinas" name="subdinas" placeholder="..." class="form-control">
			</div>
		  </div>
		  <div class="row">
			<div class="form-group col-md-6">
				<label>Polda</label>
				<input type="text" id="da_nam" name="da_nam" placeholder="..." class="form-control">
			</div>
			<div class="form-group col-md-6">
				<label>Polres</label>
				<input type="text" id="res_nam" name="res_nam" placeholder="..." class="form-control">
			</div>
		  </div>
		  <div class="row">
			<div class="form-group col-md-6">
				<label>Telp</label>
				<input type="text" id="telp" name="telp" placeholder="..." class="form-control">
			</div>
			<div class="form-group col-md-6">
				<label>Aktif</label>
				<select class="form-control selectpicker" id="isactive" name="isactive">
					<?php echo options($o_yn)?>
				</select>
			</div>
		  </div>
		  <div class="row">
			<div class="form-group col-md-6">
				<label>ADM</label>
				<select class="form-control selectpicker" id="adm" name="adm">
					<?php echo options($o_yn)?>
				</select>
			</div>
			<div class="form-group col-md-6">
				<label>DASH</label>
				<select class="form-control selectpicker" id="das" name="das">
					<?php echo options($o_yn)?>
				</select>
			</div>
		  </div>
		</form>
	  </div>
	  <div class="modal-footer">
	    <!--button type="button" class="btn btn-danger" id="bdel"  onclick="confirmDelete();">Delete</button-->
		<button type="button" class="btn btn-success" onclick="saveData();">Save</button>
		<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
		
	  </div>
	</div>
  </div>
</div>

<?php 
include "inc.foot.php";
include "inc.js.php";

$tname="persons p left join polda d on d.da_id=p.polda left join polres r on p.polres=r.res_id";
$cols="nrp,nama,email,dinas,subdinas,da_nam,res_nam,adm,das,isactive,p.rowid";
$csrc="nama,nrp,email,subdinas,dinas,da_nam,res_nam";
$where="nrp<>'$s_ID'";
if($s_LVL=='Ditlantas'){
	$where="polda='$s_POLDA'";
}
if($s_LVL=='Satlantas'){
	$where="polres='$s_POLRES'";
}
?>

<script>
var mytbl, jvalidate;
$(document).ready(function(){
	page_ready();
	mytbl = $("#mytbl").DataTable({
		serverSide: true,
		processing: true,
		searching: true,
		buttons: ['copy', 'csv'],
		ajax: {
			type: 'POST',
			url: 'datatable<?php echo $ext?>',
			data: function (d) {
				d.cols= '<?php echo base64_encode($cols); ?>',
				d.tname= '<?php echo base64_encode($tname); ?>',
				d.csrc= '<?php echo base64_encode($csrc); ?>',
				d.where= '<?php echo base64_encode($where); ?>',
				d.x= '<?php echo $menu?>';
			}
		},
		initComplete: function(){
			//dttbl_buttons(); //for ajax call
		}
	});
	//dttbl_buttons(); //remark this if ajax dttbl call
	jvalidate = $("#myf").validate({
    ignore: ":hidden:not(.selectpicker)",
	rules :{
        "email" : {
            required : true
        },
		"pwd" : {
			required : function(){
				if($("#id").val()=="0"){
					return true;
				}else{
					return false;
				}
			}
		}
    }});
	
	//datepicker();
	//timepicker();
	selectpicker(true);
});

function reloadtbl(){
	mytbl.ajax.reload();
}
</script>

  </body>
</html>