<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
  
  class Api {
    
    public function __construct() {
        
      $this->CI = &get_instance();
      $this->CI->load->model('MGeneral','mg');
    
    }
    public function get($table='',$where='',$select='')
    {
        $status = false;
        $msg = "Gagal Mendapatkan Data";
        $data = [];

        $method = $_SERVER['REQUEST_METHOD'];
        if ($method === 'GET') {
            $q = $this->CI->mg->get($table,$where,$select);
            if($q->num_rows() > 0){
                $status = true;
                $data = $q->result();
                $msg = "Data berhasil didapatkan";
            } 
        }else{
            $msg = "Method Tidak Diketahui";
        }
        $rsp = [
            'data' => $data,
			'msg' => $msg,
			'status' => $status
        ];
        return $rsp;
    }

  }    