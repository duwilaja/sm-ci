<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
	}

	public function index()
	{
		$retval=array("404","Failed","Wrong user/password","error");
		$loggedin=false;
		
		$nrp=$this->input->post("user");
		$pwd=$this->input->post("passwd");
		$rahasia = md5('rahasia').get_cookie('rahasia');
		$rahasia = '';
		foreach ($_POST as $v) {
			$rahasia = $v;
		}

		if (base64_decode($rahasia) != get_cookie('rahasia')) {
			show_404();
		}
		
		$this->db->where('uid',$nrp);
		$this->db->where('upwd',md5($pwd));
		$acc=$this->db->get_where("core_user",['usts' => '1'])->result_array();
			
		if(count($acc)>0){
			$this->db->where('nrp',$nrp);
			$this->db->where('isactive','Y');
			$retval=$this->db->get("persons")->result_array();
			if(count($retval) > 0){
				$loggedin=true;
				$this->session->set_userdata('user_data',$retval[0]);
				$data['session']=$retval[0];
				if($retval[0]['unit']==''){
					redirect(base_url().'profile');
				}else{
					redirect(base_url().'laporan');
				}
			}
			$retval=array("404","Failed","Person not found","error");
		}
		if(!$loggedin){
			$data['retval']=$retval;
			$data['pangkat'] = comboopts($this->db->select('pang_id as v,pang_nam as t')->get('pangkat')->result());
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
	
	public function out()
	{
		session_destroy();
		$retval=array("200","OK","Logged out","success");
		$data['retval']=$retval;
		$data['pangkat'] = comboopts($this->db->select('pang_id as v,pang_nam as t')->get('pangkat')->result());
		$data['rahasia'] = mt_rand(100000,999999);
		$arr = [
        'name'   => 'rahasia',
        'value'  => $data['rahasia'],                            
        'expire' => '3000',                                                                                   
        'secure' => TRUE
        ];

        set_cookie($arr);
		$this->load->view("login",$data);
	}
	
	public function get_pangkat()
	{
		$ret=$this->db->select('pang_id as v,pang_nam as t')->get('pangkat')->result();
		$retval=array('code'=>"200",'ttl'=>"OK",'msgs'=>$ret);
		echo json_encode($retval);
	}
	
}
