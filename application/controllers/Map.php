<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
	}
	
	public function index()
	{
		$data['lat'] = $this->input->get("lat");
		$data['lng'] = $this->input->get("lng");
		$this->load->view('map',$data);
	}
}