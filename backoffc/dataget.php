<?php
$redirect=false;
include 'inc.common.php';
include 'inc.db.php';

if(substr(post('q'),0,3)!="cmb"){
	include 'inc.session.php';
}

$conn = connect();

$q=post('q',$conn);
$id=post('id',$conn,'0');
$q=$q==""?post('tname',$conn):$q;

$sql="";
$code="200";
$ttl="OK";

switch($q){
	case 'user': $sql="select p.*,da_nam,res_nam from persons p left join polda d on d.da_id=p.polda left join polres r on p.polres=r.res_id where p.rowid='$id'"; break;
	case 'polda': $sql="select * from polda where rowid='$id'"; break;
	case 'polres': $sql="select * from polres where rowid='$id'"; break;
	case 'dit': $sql="select * from dinas where rowid='$id'"; break;
	case 'subdit': $sql="select * from subdinas where rowid='$id'"; break;
	case 'bag': $sql="select * from bagian where rowid='$id'"; break;
	case 'unit': $sql="select * from unit where rowid='$id'"; break;
	case 'dg': $sql="select * from dasargiat where rowid='$id'"; break;
	case 'pang': $sql="select * from pangkat where rowid='$id'"; break;
	case 'spec': $sql="select * from spesialisasi where rowid='$id'"; break;
	case 'formulir': $sql="select * from formulir where rowid='$id'"; break;
	case 'penduduk': $sql="select * from data_penduduk where rowid='$id'"; break;
	case 'targetlaka': $sql="select * from target_laka where rowid='$id'"; break;
	case 'lov': $sql="select * from lov where rowid='$id'"; break;
	
	case 'pmacet': $sql="select * from penyebab_macet where rowid='$id'"; break;
	case 'pmacetd': $sql="select * from penyebab_macet_d where rowid='$id'"; break;
	
	case 'myprofile': $sql="select * from persons where nrp='$id'"; break;
	case 'didik': $sql="select * from pendidikan where rowid='$id'"; break;
	case 'sertif': $sql="select *,institusi as institusis, th as ths, img as imgs from sertifikat where rowid='$id'"; break;
	
	case 'profile': $sql="select * from core_user where uid='$id'"; break;
	
	case 'home1': $sql="select count(host) as tdev, sum(status) as tdup, count(host)-sum(status) as tdon from core_status"; break;
	
	case 'map': $tname="core_location l join core_node n on l.locid=n.loc join core_status s on n.host=s.host";
			$grpby="lat,lng,concat(l.name,'\n',l.addr),locid";
		$sql="select lat,lng,concat(l.name,'\n',l.addr) as name,locid,sum(s.status) as onoff from $tname where lat<>'' and lng<>'' group by $grpby"; break;
	
	//combobox requests
	case 'cmbres': $sql="select res_id as v, res_nam as t from polres where polda='$id'"; break;
	
}

//echo $sql;
if($sql==""){
	$code="404";
	$ttl="Error";
	$output="Query not found";
}else{
	$result = exec_qry($conn,$sql);
	if(db_error($conn)==''){
		$output = fetch_alla($result);
	}else{
		$output = db_error($conn);
		if($production){$output="System Error. Please contact admin.";}
		$ttl = "Error";
		$code= "505";
	}
}

disconnect($conn);

echo json_encode(array('code'=>$code,'ttl'=>$ttl,'msgs'=>$output));
?>