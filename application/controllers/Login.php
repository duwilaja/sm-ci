<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct($language = "")
	{
		parent::__construct();
		$language = ($language != "") ? $language : "indo";
        $this->session->set_userdata('site_lang', $language);
		// Your own constructor code
		// Load the captcha helper
        $this->load->helper('captcha');
	}

	public function index()
	{
		$retval=array("404","Failed","Wrong user/password","error");
		$loggedin=false;
		
		$nrp=trim($this->input->post("user"));
		$pwd=trim($this->input->post("passwd"));
		$rahasia = md5('rahasia').get_cookie('rahasia');
		$rahasia = '';
		foreach ($_POST as $v) {
			$rahasia = $v;
		}

		if (base64_decode($rahasia) != get_cookie('rahasia')) {
			//show_404();
			//redirect('login/out/1');
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
			
			// Captcha configuration
			$config = array(
				'img_path'      => 'captcha_images/',
				'img_url'       => base_url().'captcha_images/',
				'img_width'     => 150,
				'img_height'    => 50,
				'word_length'   => 8,
				'font_size'     => 16
			);
			$captcha = create_captcha($config);
			
			// Unset previous captcha and store new captcha word
			$this->session->unset_userdata('captchaCode');
			$this->session->set_userdata('captchaCode',$captcha['word']);
			
			// Send captcha image to view
			$data['captchaImg'] = $captcha['image'];
			
			$this->load->view('login',$data);
		}
	}
	
	public function das(){
		$retval=array("msgs"=>"User/Password salah","data"=>[]);
		$nrp=trim($this->input->post("user"));
		$pwd=trim($this->input->post("passwd"));
		$this->db->where('uid',$nrp);
		$this->db->where('upwd',md5($pwd));
		$acc=$this->db->get_where("core_user",['usts' => '1'])->result_array();
		if(count($acc)>0){
			$retval=array("msgs"=>"Anda tidak diijinkan mengakses. Silakan kontak admin untuk menambahkan akses anda","data"=>[]);
			$this->db->where('nrp',$nrp);
			$this->db->where('isactive','Y');
			$this->db->where('das','Y');
			$rs=$this->db->get("persons")->result_array();
			if(count($rs) > 0){
				$retval=array("msgs"=>"OK","data"=>$rs);
			}
		}
		
		echo json_encode($retval);
	}
	
	public function out($re=0)
	{
		session_destroy();
		$msg=$re==0?"Logged out":"Session reloaded, please re enter your credential";
		$retval=array("200","OK",$msg,"success");
		$data['retval']=$retval;
		
		// Captcha configuration
        $config = array(
            'img_path'      => 'captcha_images/',
            'img_url'       => base_url().'captcha_images/',
            'img_width'     => 150,
            'img_height'    => 50,
            'word_length'   => 8,
            'font_size'     => 16
        );
        $captcha = create_captcha($config);
        
        // Unset previous captcha and store new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode',$captcha['word']);
        
        // Send captcha image to view
        $data['captchaImg'] = $captcha['image'];
		
		$this->load->view("login",$data);
	}
	
	public function get_pangkat()
	{
		$ret=$this->db->select('pang_id as v,pang_nam as t')->get('pangkat')->result();
		$retval=array('code'=>"200",'ttl'=>"OK",'msgs'=>$ret);
		echo json_encode($retval);
	}
	
}
