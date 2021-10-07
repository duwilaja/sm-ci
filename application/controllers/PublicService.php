<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PublicService extends CI_Controller {
	
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
			$data['dasargiat'] = comboopts($this->db->select('dg_id as v,dg_nam as t')->get('dasargiat')->result());
			$data['formulir'] = comboopts($this->db->select('view_laporan as v,nama_laporan as t')->where("unit",$user['unit'])->or_where("unit",$user["subdinas"])->get('formulir')->result());
			$data['title'] = "Formulir";
			
			$this->template->load('laporan',$data);
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
	
	private function uplot($fld,$path){
		if ( $this->upload->do_upload($fld)){
				return $path.$this->upload->data('file_name');
			}else{
		return '';
			}
	}
	
	public function save()
	{
		$user=$this->session->userdata('user_data');
		$auth=$this->input->get_request_header('X-token', TRUE);
		if(isset($user)||$auth=='45fd595dcb1cdb51293fee28335c43487f4eaa2e940db4f589bec08cfae723a2'){
			$msgs="No data has been saved";
			$kategori=$this->input->post('kategori');
			$tname=$this->input->post('tablename');
			$fname=$this->input->post('fieldnames');
			$data=$this->input->post(explode(",",$fname));
			//upload here
			$path="./uploads/publicservice/$kategori/";
			$config['upload_path'] = $path;
			$config['allowed_types'] = '*';//'gif|jpg|jpeg|png';//all
			//$config['file_name'] = $user['nrp'];
			$config['file_ext_tolower'] = true;
			//$config['overwrite'] = false;
			$m="";
			$this->load->library('upload', $config);
			
			$data['uploadedfile'] =  $this->uplot('uploadedfile',$path);
			
			$this->db->insert($tname,$data);
			$ret=$this->db->affected_rows();
			if($ret>0){
				$msgs="$ret record(s) saved";
			}
			$retval=array('code'=>"200",'ttl'=>"OK",'msgs'=>$msgs.$m);
			echo json_encode($retval);
		}else{
			$retval=array('code'=>"403",'ttl'=>"Session closed",'msgs'=>"Please login");
			echo json_encode($retval);
		}
	}
}