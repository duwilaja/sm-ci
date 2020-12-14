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
		
		$this->db->where('uid',$nrp);
		$this->db->where('upwd',md5($pwd));
		$acc=$this->db->get("core_user")->result_array();
			
		if(count($acc)>0){
			$this->db->where('nrp',$nrp);
			$retval=$this->db->get("persons")->result_array();
			if(count($retval)>0){
				$loggedin=true;
				$this->session->set_userdata('user_data',$retval[0]);
				$data['session']=$retval[0];
				$this->template->load("home",$data);
			}
		}
		if(!$loggedin){
			$data['retval']=$retval;
			$this->load->view('login',$data);
		}
	}
	
	public function out()
	{
		session_destroy();
		$retval=array("200","OK","Logged out","success");
		$data['retval']=$retval;
		$this->load->view("login",$data);
	}
	
}
