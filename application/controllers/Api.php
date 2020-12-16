<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MGeneral','mg');
        
    } 

    //  ini get input type select di form laporan gatur lalin
    public function get()
    {
        $status = false;
        $msg = "Gagal Mendapatkan List Kegiatan";
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method === 'GET') {
            $get = $this->mg->get();
            
        }elseif ($method === 'POST') {
            # code...
        }elseif ($method === 'PUT') {
            # code...
        }elseif ($method === 'DELETE') {
            # code...
        }else{
            $method = "Method Tidak Diketahui";
        }

        
        

        if ($get) {
            $status = true;
            $msg = "Berhasil Mendapatkan List Kegiatan";
        }
        $dt = [
            'data' => $get->result(),
			'msg' => $msg,
			'status' => $status
		];

		echo json_encode($dt);
    }

    // public function get_kegiatan()
    // {
    //     $status = false;
    //     $msg = "Gagal Mendapatkan List Kegiatan";
        
    //     $get = $this->mg->get('kegiatan');

    //     if ($get) {
    //         $status = true;
    //         $msg = "Berhasil Mendapatkan List Kegiatan";
    //     }
    //     $dt = [
    //         'data' => $get->result(),
	// 		'msg' => $msg,
	// 		'status' => $status
	// 	];

	// 	echo json_encode($dt);
    // }

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