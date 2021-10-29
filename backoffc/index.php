<?php
include "inc.common.php";
include 'inc.db.php';

$user=post('user');
$passwd=post('passwd');
$loggedin=false;
$m=get('m');
$x=get('x');
$conn=connect();

$grp="";
$hom="";
if($user!=''&&$passwd!=''){
	$sql="select a.uid, nama, dinas, subdinas, unit, '', polda, polres from core_user a join persons p on a.uid=p.nrp where isactive='Y' and adm='Y' and (a.uid='$user') and upwd=MD5('$passwd')";
	//echo $sql;
	$rs = exec_qry($conn,$sql);
	if ($row = fetch_row($rs)) {
		session_start();
		
		$_SESSION['s_ID'] = $user;
		$_SESSION['s_NAME'] = $row[1];
		$_SESSION['s_LVL'] = $row[2];
		$_SESSION['s_GRP'] = $row[3];
		$_SESSION['s_PROF'] = $row[4];
		$_SESSION['s_AVATAR'] = $row[5];
		$_SESSION['s_POLDA'] = $row[6];
		$_SESSION['s_POLRES'] = $row[7];
		
		$loggedin=true;
	}else{
		$m='Wrong username/password or invalid authorization';
		$x='error';
	}
}
disconnect($conn);
if($loggedin){
	header("Location: home$ext");
}

include "inc.head.php";
$menu="";
$pangkats=[]; $satwils=[]; $units=[];
?>
				<div class="container text-center single-page single-pageimage construction-body">
				    <div class="row justify-content-center">
						<div class="col-xl-7 col-lg-6 col-md-12">
							<!--img src="aronox/assets/images/sm_img/gambar-logo.png" class="construction-img mb-7 h-480  mt-5 mt-xl-0" alt=""-->
							<img src="../aronox/assets/images/svgs/lg-2.svg" class="construction-img mb-7 h-480  mt-5 mt-xl-0" alt="">
						</div>
						<div class="col-xl-5 col-lg-6 col-md-12 ">
							<div class="col-lg-12">
							    <img src="../my/images/logo.png" class=" light-view mb-4" alt="Aronox logo">
								<div class="wrapper wrapper2">
									<form id="login" method="post" class="card-body" tabindex="500">
										<h2 class="mb-1 font-weight-semibold">Login</h2>
										<p class="mb-6">Sign In to your account</p>
										<div class="input-group mb-3">
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="user" class="form-control" placeholder="NRP" value="<?php echo $user?>">
										</div>
										<div class="input-group mb-4">
											<span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
											<input type="password" name="passwd" class="form-control" placeholder="Password" value="<?php echo $passwd?>">
										</div>
										<div class="row mb-0">
											<div class="col-12">
												<button type="submit" onclick="if($('#login').valid()){this.form.submit();}" class="btn btn-primary btn-block">Login</button>
											</div>
											<!--div class="col-12 mb-0">
												<a href="#" onclick="openForm('',0,'#reset_form');" data-toggle="modal" data-target="#modal_reset" class="btn btn-link box-shadow-0 px-0">Forgot password?</a>
												<p class=" mb-0">Don't have account?<a href="#" onclick="openForm('',0,'#register_form');" data-toggle="modal" data-target="#modal_register" class="text-primary ml-1">Sign UP</a></p>
											</div-->
										</div>
									</form>
									<div class="card-body social-icons border-top">
										<!--a class="btn  btn-social btn-fb mr-2"><i class="fa fa-facebook"></i> </a>
										<a class="btn  btn-social btn-googleplus mr-2"><i class="fa fa-google-plus"></i></a>
										<a class="btn  btn-social btn-twitter-transparant  "><i class="fa fa-twitter"></i></a-->
										Smart Management Admin
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
						<?php echo options($pangkats)?>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label>Polda</label>
						<select name="polda" placeholder="..." class="form-control" onchange="getSubQ('cmbres',this.value,'#polres');">
						<option value=""></option>
						<?php echo options($satwils)?>
						</select>
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
						<?php echo options($units)?>
						</select>
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
	  
<?php
include "inc.foot.php";
include "inc.js.php";
?>
<script>
var x="<?php echo $x?>";
var m="<?php echo $m?>";
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