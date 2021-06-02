<?php 
$restrict_lvl=array("Korlantas");
$restrict_grp=array("Bag TIK");

include "inc.common.php";
include "inc.session.php";

$page_icon="fa fa-table";
$page_title="Target Laka";
$modal_title="Target Laka";
$card_title="Master $page_title";

$menu="targetlaka";

$breadcrumb="Master/$page_title";

include "inc.head.php";
include "inc.menutop.php";
include "inc.db.php";

$conn=connect();
$poldas=fetch_all(exec_qry($conn,"select da_id,da_nam from polda"));
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
							<!--a href="#" title="Batch" class=""><i class="fe fe-upload"></i></a-->
							<a href="#" onclick="openForm(0);" data-toggle="modal" data-target="#myModal" title="Add" class=""><i class="fe fe-plus"></i></a>
							<a href="#" title="Expand/Collapse" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
							<!--a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a-->
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="mytbl" class="table table-striped table-bordered w-100">
								<thead>
									<tr>
										<th>Thn</th>
										<th>Polda</th>
										<th>Polres</th>
										<th>Jml</th>
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
  <div role="document" class="modal-dialog">
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
<input type="hidden" name="cols" value="thn,da,res,jml" />
<input type="hidden" name="tname" value="target_laka" />
		
		  <div class="row">
			<div class="form-group col-md-12">
				<label>Polda</label>
				<select id="da" name="da" placeholder="..." class="form-control" onchange="getSubQ('dataget.php',this.value,'#resx','','-- pilih polres --','cmbres');">
				<option value="">-- pilih polda --</option>
				<?php echo options($poldas)?>
				</select>
			</div>
		  </div>
		  <div class="row">
			<div class="form-group col-md-12">
				<label>Polres</label>
				<select id="resx" name="res" placeholder="..." class="form-control">
				</select>
				<input type="hidden" id="res" value="">
			</div>
		  </div>
		  <div class="row">
			<div class="form-group col-md-12">
				<label>Thn</label>
				<input type="text" id="thn" name="thn" placeholder="..." class="form-control yearpicker">
			</div>
		  </div>
		  <div class="row">
			<div class="form-group col-md-12">
				<label>Jml</label>
				<input type="text" id="jml" name="jml" placeholder="..." class="form-control">
			</div>
		  </div>
		</form>
	  </div>
	  <div class="modal-footer">
	    <button type="button" class="btn btn-danger" id="bdel"  onclick="confirmDelete();">Delete</button>
		<button type="button" class="btn btn-success" onclick="saveData();">Save</button>
		<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
		
	  </div>
	</div>
  </div>
</div>

<?php 
include "inc.foot.php";
include "inc.js.php";

$tname="target_laka d left join polda p on d.da=p.da_id left join polres r on r.res_id=d.res";
$cols="thn,concat(da,'-',da_nam) as dada,concat(res,'-',res_nam) as rere,jml,d.rowid";
$csrc="da_nam,res_nam,thn";

?>

<script>
var base_url='';
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
        "unit" : {
            required : true
        },
		"nama_laporan" : {
			required : true
		},
		"view_laporan" : {
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
	//$(".yearpicker").yearpicker();
});

function reloadtbl(){
	mytbl.ajax.reload();
}

function datagetcallback(q){
	getSubQ('dataget.php',$("#da").val(),'#resx',$('#res').val(),'-- pilih polres --','cmbres');
}
</script>

  </body>
</html>