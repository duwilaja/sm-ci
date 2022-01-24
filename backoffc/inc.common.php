<?php
$ext=".php";
date_default_timezone_set("Asia/Jakarta");

$theme="hor-skin/horizontal-dark.css"; //hor-skin/hor-skin1.css
$theme="hor-skin/hor-skin1.css";

$company="Matrik, PT";
$about=array(base64_encode("SM"), base64_encode("Licensed to $company"));

/*common values*/
$array_nologin=array("reset","register");
$o_ugrp=array(
	array("","All")
);
$o_ulvl=array(
	array("0","Super"),
	array("1","Admin"),
	array("9","User")
);
$o_uprof=array(
	array("","Welcome page"),
	array("laporan","Form Giat"),
	array("dashboard","Dashboard")
);

$o_days=array(
	array("","-"),
	array("0","Mon"),
	array("1","Tue"),
	array("2","Wed"),
	array("3","Thu"),
	array("4","Fri"),
	array("5","Sat"),
	array("6","Sun")
);
$o_yn=array(
	array("Y","Y"),
	array("N","N")
);


/*common php functions*/
function getVal($k,$kv){
	$ret="";
	for($i=0;$i<count($kv);$i++){
		if($kv[$i][0]==$k) $ret=$kv[$i][1];
	}
	return $ret;
}
function options($kv){
	$ret="";
	for($i=0;$i<count($kv);$i++){
		$ret.='<option value="'.$kv[$i][0].'">'.$kv[$i][1].'</option>';
	}
	return $ret;
}
function multiple_select($f){
	$return="";
	for($i=0;$i<count($_POST[$f]);$i++){
		$return.=$return==""?"":";";
		$return.=$_POST[$f][$i];
	}
	return $return;
}
function breadcrumb($bread,$s='/'){
	$a=explode($s,$bread);
	$r="";
	for($i=0;$i<count($a);$i++){
		$r.='<li class="breadcrumb-item">'.$a[$i].'</li>';
	}
	return $r;
}
function rnd(){
	$chars = '1234567890abcdefghjklmnopqrstuvwxyz'; //Kombinasi huruf dan angka yang diacak
	$string = ''; $len = 6;
	for ($i = 0; $i < $len; $i++) {
		$pos = rand(0, strlen($chars)-1);
		$string .= $chars[$pos];
	}
	return $string;
}


function lib_api($lib_token,$lib_url){
    $curl = curl_init();
    curl_setopt ($curl, CURLOPT_URL, $lib_url);
	curl_setopt ($curl, CURLOPT_HEADER, false);
	curl_setopt ($curl, CURLOPT_HTTPHEADER, array('X-Auth-Token: '.$lib_token));
	curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
    $out=curl_exec ($curl);
    curl_close ($curl);
	return $out;
}

function compare($o,$n,$fix,$highlow=true){
	$ret="0%$fix";
	$d=$o==0?$n:$o;
	if($o>$n){
		$hl=$highlow?" lower ":"";
		$ret=round(($o-$n)/$o*100,2)."%$hl$fix";
	}
	if($o<$n){
		$hl=$highlow?" higher ":"";
		$ret=round(($n-$o)/$d*100,2)."%$hl$fix";
	}
	return $ret;
}
function compare_class($o,$n,$dclass,$hclass,$lclass){
	$ret=$dclass;
	if($n>$o){
		$ret=$hclass;
	}
	if($n<$o){
		$ret=$lclass;
	}
	return $ret;
}
function progress_bar($o,$fix,$t=-1){
	if($t==-1){
		$ret=ceil($o/10)*10;
	}else{
		$ret=ceil(($o/$t*100)/10)*10;
	}
	return '<div class="progress-bar '.$fix.' w-'.$ret.' " role="progressbar"></div>';
}
function random_string($type = 'alnum', $len = 8)
{
	switch ($type)
	{
		case 'basic':
			return mt_rand();
		case 'alnum':
		case 'numeric':
		case 'nozero':
		case 'alpha':
			switch ($type)
			{
				case 'alpha':
					$pool = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					break;
				case 'alnum':
					$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					break;
				case 'numeric':
					$pool = '0123456789';
					break;
				case 'nozero':
					$pool = '123456789';
					break;
			}
			return substr(str_shuffle(str_repeat($pool, ceil($len / strlen($pool)))), 0, $len);
		case 'unique': // todo: remove in 3.1+
		case 'md5':
			return md5(uniqid(mt_rand()));
		case 'encrypt': // todo: remove in 3.1+
		case 'sha1':
			return sha1(uniqid(mt_rand(), TRUE));
	}
}