<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MLaporan extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('dt');
    }

}   
