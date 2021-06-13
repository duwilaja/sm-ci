<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
		
		$this->load->helper('string');
		
	}
	
	public function index()
	{
		/*$user=$this->session->userdata('user_data');
		if(isset($user)){
			$data['session'] = $user;
			$data['pangkat'] = comboopts($this->db->select('pang_id as v,pang_nam as t')->get('pangkat')->result());
			$data['polda'] = comboopts($this->db->select('da_id as v,da_nam as t')->get('polda')->result());
			$data['unit'] = comboopts($this->db->select('unit_id as v,unit_nam as t')->get('unit')->result());
			
			$this->template->load('profile',$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']=$retval;
			$this->load->view('login',$data);
		}*/
	}
	
	public function sendmail($to,$sub,$msg){
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'smart.mgmt.mmt@gmail.com',
			'smtp_pass' => 'Bismillah3x!.',
			'mailtype'  => 'html', 
			'charset'   => 'iso-8859-1'
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		
		$this->email->from('smart.mgmt.mmt@gmail.com', 'Smart Management App');
		$this->email->to($to);
		$this->email->subject("Smart Management : $sub");
		$this->email->message($msg);
		
		return $this->email->send();
	}
	
	public function register(){
		$code="403";
		$ttl="Error";
		$msgs="Account exist, please use reset password to gain your access";
		//$tname=$this->input->post('tablename');
		//$fname=$this->input->post('fieldnames');
		
		$nrp=$this->input->post('nrp');
		$tname='persons';
		$usr=$this->db->where("nrp",$nrp)->get($tname)->result();
		if(count($usr)<1){
			$data=$this->input->post(array('nama','email','nrp','telp','pangkat'));//(explode(",",$fname));
			$this->db->insert($tname,$data);
			$ret=$this->db->affected_rows();
			if($ret>0){
				$pwd=random_string();
				$nama=$this->input->post('nama');
				$email=$this->input->post('email');
				$akun=array('nrp'=>$nrp,'upwd'=>md5($pwd),'usts' => 1,'ulvl' => 1);
				$this->db->insert("core_usr",$akun);
				$ret=$this->db->affected_rows();
				if($ret>0){
					$msgs="Account successfully created. ";
					$code="200";
					$ttl="Success";
					$content="Hi $nama, terima kasih sudah mendaftar.<br /><br />Akun anda adalah $nrp<br />Password anda adalah $pwd <br /><br /><br />rgds<br />admin";
					$sen=$this->sendmail($email,"New Account",$content);
					if($sen) { $msgs.="Password sent to $email"; }else{ $msgs.="Failed sending mail to $email"; }
				}else{
					$msgs="Password creation failed. Please use reset password to gain your access.";
				}
			}
		}
		$retval=array('code'=>$code,'ttl'=>$ttl,'msgs'=>$msgs);
		echo json_encode($retval);
	}
	
	public function forgot(){
		$code="403";
		$ttl="Error";
		$msgs="Account does not exist, please register";
		//$tname=$this->input->post('tablename');
		//$fname=$this->input->post('fieldnames');
		
		$nrp=$this->input->post('rnip');
		$email=$this->input->post('remail');
		$tname='persons';
		$usr=$this->db->where(array('nrp'=>$nrp,'email'=>$email))->get($tname)->result();
		if(count($usr)>0){
			$nama=$usr[0]->nama;
			$pwd=random_string();
			$usr=$this->db->where("nrp",$nrp)->get("accounts")->result();
			if(count($usr)>0){
				$this->db->where("nrp",$nrp)->update("accounts",array("pwd"=>md5($pwd)));
			}else{
				$akun=array('nrp'=>$nrp,'pwd'=>md5($pwd));
				$this->db->insert("accounts",$akun);
			}
			$ret=$this->db->affected_rows();
			if($ret>0){
				$msgs="New password sent to $email";
				$content="Hi $nama, <br /><br />Password baru anda adalah $pwd <br /><br /><br />rgds<br />admin";
				$sen=$this->sendmail($email,"Reset Password",$content);
				if(!$sen){ $msgs="Failed sending mail to $email , please try again."; }
				
				$code="200";
				$ttl="Done";
			}else{
				$msgs="Reset password failed. Please contact admin.";
			}
		}
		$retval=array('code'=>$code,'ttl'=>$ttl,'msgs'=>$msgs);
		echo json_encode($retval);
	}
}