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

	public function sendmail($to,$sub,$msg){
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp-pulse.com',
			'smtp_port' => 465,
			'smtp_user' => 'matrik.mmt@gmail.com',
			'smtp_pass' => 'DcNbPQF9PsQ',
			'smtp_crypto'   => 'ssl',
			'mailtype'  => 'html', 
			'charset'   => 'iso-8859-1',
			'priority'  => 1
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		
		$this->email->from('info@matrik.co.id', 'Smart Management App');
		$this->email->to($to);
		$this->email->subject("Smart Management : $sub");
		$this->email->message($msg);
		
		return $this->email->send();
	}

	public function cek_mail()
	{
		var_dump($this->sendmail('sahrulrizal22@gmail.com','Test','Gua cuman test aja ya'));
	}

	public function index()
	{
		$data['pangkat'] = comboopts($this->db->select('pang_id as v,pang_nam as t')->get('pangkat')->result());
		$this->load->view('login',$data);
	}
	
	public function blank()
	{
		$data['title'] = "Blank Page";
		$this->template->load('blank', $data);
	}
}
