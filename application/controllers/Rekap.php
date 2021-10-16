<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
	}
	
	public function index()
	{
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			$data['session'] = $user;
			$data['title'] = "Rekap";
			$data['formulir'] = comboopts($this->db->select('view_laporan as v,nama_laporan as t')->where(array("unit"=>$user['unit'],"isactive"=>"Y"))->or_where("unit",$user["subdinas"])->order_by("nama_laporan")->get('formulir')->result());
			
			$this->template->load('rekap',$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']=$retval;
			$data['rahasia'] = mt_rand(100000,999999);
			$arr = [
			'name'   => 'rahasia',
			'value'  => $data['rahasia'],                            
			'expire' => '3000',                                                                                   
			'secure' => TRUE
			];

			set_cookie($arr);
			$this->load->view('login',$data);
		}
	}
	
	public function get_form()
	{
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			$d=$this->input->post('direktorat');
			if($d!='')$where['direktorat']=$d;
			$d=$this->input->post('sie');
			if($d!='')$where['sie']=$d;
			$d=$this->input->post('subdit');
			if($d!='')$where['subdit']=$d;
			$ret=$this->db->select('view_laporan as v,nama_laporan as t')->where($where)->get('formulir')->result();
			$retval=array('code'=>"200",'ttl'=>"OK",'msgs'=>$ret);
			echo json_encode($retval);
		}else{
			$retval=array('code'=>"403",'ttl'=>"Session closed",'msgs'=>array());
			echo json_encode($retval);
		}
	}
	public function get_content()
	{
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			$id=$this->input->post('id');//this is the view
			
			//put all masterdatas needed here
			$data['dummy']="this is dummy data";
			
			$this->load->view("rekap/$id",$data); //load the view
			
		}else{
			echo "<script>alrt('Session Closed, please login','error','Error');</script>";
		}
	}
	
	public function datatable_all(){
		$user=$this->session->userdata('user_data');
		$data=array(); $data_assoc=array();
		if(isset($user)){
			$tname=base64_decode($this->input->post('tname')); //tablename
			$cols=base64_decode($this->input->post('cols')); //column
			
			$ismap=base64_decode($this->input->post('ismap')); //is map button active?
			$isverify=base64_decode($this->input->post('isverify')); //is verify button active?
			$isfile=base64_decode($this->input->post('isfile')); //is files active?
			
			$where=array();
			//build where polda/polres
			if ($this->input->post('tgl') != '') {
				$where['tgl'] = $this->input->post('tgl'); //date('Y-m-d');
			}
			$d=$user['polres'];
			if($d!='')
				$where[$tname.'.polres']=$d;
			$d=$user['polda'];
			if($d!='')
				$where[$tname.'.polda']=$d;
			
			$this->db->select($cols);
			$this->db->from($tname);
			if($tname=="ais_laka"||$tname=="eri_kendaraan"){
				$this->db->join("polda","polda.da_id=$tname.da","left");
				$this->db->join("polres","polres.res_id=$tname.res","left");
			}
			$this->db->where($where);
			$data_assoc=$this->db->get()->result_array();
			
			for($i=0;$i<count($data_assoc);$i++){
				$lnk='';
				if($ismap){
					$lnk.='<button type="button" class="btn btn-icon btn-info" onclick="mapview('.$data_assoc[$i]['lat'].','.$data_assoc[$i]['lng'].
					');"><i class="fa fa-map-marker"></i></button>';
				}
				if($isverify){
					$lnk.=' <button type="button" class="btn btn-icon btn-warning" onclick="openmodal('.$data_assoc[$i]['rowid'].');"><i class="fa fa-check"></i></button>';
				}
				if($isfile){
					$myfiles=explode(",",$this->input->post('filefields'));
					for($z=0;$z<count($myfiles);$z++){
						$data_assoc[$i][$myfiles[$z]]=$this->make_link($data_assoc[$i][$myfiles[$z]]);
					}
				}
				if($lnk!=''){
					$data_assoc[$i]['btnset']=$lnk;
				}
				$data[]=array_values($data_assoc[$i]);
			}
		}
		$output = array(
                        "draw" => 0,//$this->input->post('draw'),
                        "recordsTotal" => count($data),
                        "recordsFiltered" => count($data),
                        "data" => $data,
						"assoc" => $data_assoc
                );
        //output to json format
        echo json_encode($output);
	}
	
	private function make_link($links){
		$ret="";
		$alink=explode(";",$links);
		for($j=0;$j<count($alink);$j++){
			//$ret.='<a target="_blank" href="'.$alink[$j].'">Attachment '.($j+1).'</a>';
			if(trim($alink[$j])!=""){
				$ret.='<a href="JavaScript:;" data-fancybox="" data-type="iframe" data-src="'.$alink[$j].'">Attachment '.($j+1).'</a><br />';
			}
		}
		return $ret;
	}
	
	public function save()
	{
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			$msgs="No data has been saved";
			$tname=$this->input->post('tablename');
			$fname=$this->input->post('fieldnames');
			$rowid=$this->input->post('rowid');
			$dispatch=$this->input->post('dispatch');
			
			$data=$this->input->post(explode(",",$fname));
			
			$this->db->update($tname,$data,"rowid=$rowid");
			$ret=$this->db->affected_rows();
			if($ret>0){
				$msgs="$ret record(s) saved";
				if($dispatch=='yes' && $this->input->post("verifikasi")=='Y'){
					$select=base64_decode($this->input->post('dispatched'));
					$datadis=$this->db->select($select)->where(array("rowid"=>$rowid))->get($tname)->result_array();
					$otherdb = $this->load->database('db_intan', TRUE);
					$otherdb->insert_batch('pengaduan',$datadis);
					$msgs.=" & DIPATCHED";
				}
			}
			$retval=array('code'=>"200",'ttl'=>"OK",'msgs'=>$msgs);
			echo json_encode($retval);
		}else{
			$retval=array('code'=>"403",'ttl'=>"Session closed",'msgs'=>array());
			echo json_encode($retval);
		}
	}
	

}