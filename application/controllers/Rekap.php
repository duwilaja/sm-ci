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
			$data['formulir'] = comboopts($this->db->select('view_laporan as v,nama_laporan as t')->where("unit",$user['unit'])->or_where("unit",$user["subdinas"])->get('formulir')->result());
			
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
		$data=array();
		if(isset($user)){
			$tname=base64_decode($this->input->post('tname')); //tablename
			$cols=base64_decode($this->input->post('cols')); //tablename
			
			//build where polda/polres
			if ($this->input->post('tgl') != '') {
				$where['tgl'] = $this->input->post('tgl'); //date('Y-m-d');
			}
			$d=$user['polres'];
			//if($d!='')
				$where[$tname.'.polres']=$d;
			$d=$user['polda'];
			//if($d!='')
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
				$data[]=array_values($data_assoc[$i]);
			}
		}
		$output = array(
                        "draw" => 0,
                        "recordsTotal" => count($data),
                        "recordsFiltered" => count($data),
                        "data" => $data
                );
        //output to json format
        echo json_encode($output);
	}
	
	public function save()
	{
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			$msgs="No data has been saved";
			$tname=$this->input->post('tablename');
			$fname=$this->input->post('fieldnames');
			$data=$this->input->post(explode(",",$fname));
			$this->db->insert($tname,$data);
			$ret=$this->db->affected_rows();
			if($ret>0){
				$msgs="$ret record(s) saved";
			}
			$retval=array('code'=>"200",'ttl'=>"OK",'msgs'=>$msgs);
			echo json_encode($retval);
		}else{
			$retval=array('code'=>"403",'ttl'=>"Session closed",'msgs'=>array());
			echo json_encode($retval);
		}
	}
	

}