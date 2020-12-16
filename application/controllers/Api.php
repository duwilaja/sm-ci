<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MGeneral','mg');
        
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    } 

    //  ini get input type select di form laporan gatur lalin
    public function kegiatan()
    { 
        $table = 'kegiatan';
        $where = '';
        $select = '*';
        $rsp = $this->Api->get($table,$where,$select);
        echo json_encode($rsp);
	
    }



    public function get_kejadian($table,$where)
    {
        $status = false;
        $msg = "Gagal Mendapatkan List Kejadian";
        
        $get = $this->ml->get($table,$where);

        if ($get) {
            $status = true;
            $msg = "Berhasil Mendapatkan List Kejadian";
        }
        $dt = [
			'msg' => $msg,
			'status' => $status
		];

		echo json_encode($dt);
    }

    public function get_parameter_antrian($table,$where)
    {
        $status = false;
        $msg = "Gagal Mendapatkan List Parameter Antrian";
        
        $get = $this->ml->get($table,$where);

        if ($get) {
            $status = true;
            $msg = "Berhasil Mendapatkan List Parameter Antrian";
        }
        $dt = [
			'msg' => $msg,
			'status' => $status
		];

		echo json_encode($dt);
    }

    public function get_penyebab($table,$where)
    {
        $status = false;
        $msg = "Gagal Mendapatkan List Penyabab";
        
        $get = $this->ml->get($table,$where);

        if ($get) {
            $status = true;
            $msg = "Berhasil Mendapatkan List Penyabab";
        }
        $dt = [
			'msg' => $msg,
			'status' => $status
		];

		echo json_encode($dt);
    }



    // end get input type select di form laporan gatur 
}