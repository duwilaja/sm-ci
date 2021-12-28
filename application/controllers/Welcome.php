<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	function __construct() {
        parent::__construct();
        // Load the captcha helper
        $this->load->helper('captcha');
    }

	public function sendmail($to,$sub,$msg){
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'smart.mgmt.mmt@gmail.com',
			'smtp_pass' => 'Bismillah3x!.',
			'smtp_crypto'  => 'ssl', 
			'mailtype'  => 'html', 
			'charset'   => 'iso-8859-1',
			'newline'   => "\r\n",
			'wordwrap'  => TRUE
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		
		$this->email->from('smart.mgmt.mmt@gmail.com', 'Smart Management App');
		$this->email->to($to);
		$this->email->subject("Smart Management : $sub");
		$this->email->message($msg);
		
		$ok = [
			'rsp' => $this->email->send(),
			'error' => $this->email->print_debugger()
		];
		return $ok;
	}

	public function cek_mail()
	{
		var_dump($this->sendmail('sahrulrizal22@gmail.com','Test','Gua cuman test aja ya'));
	}

	public function index()
	{
		$data['pangkat'] = comboopts($this->db->select('pang_id as v,pang_nam as t')->get('pangkat')->result());
		
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
	
	public function refresh(){
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
        
        // Display captcha image
        echo $captcha['image'];
    }
	
	public function blank()
	{
		$data['title'] = "Blank Page";
		$this->template->load('blank', $data);
	}
}
