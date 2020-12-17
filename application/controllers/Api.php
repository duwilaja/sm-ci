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
        $rsp = $this->_api->get($table,$where,$select);
        echo json_encode($rsp);
    }

    public function kejadian()
    { 
        $table = 'kejadian_ditemukan';
        $where = '';
        $select = '*';
        $rsp = $this->_api->get($table,$where,$select);
        echo json_encode($rsp);
    }
    
    public function parameter_antrian()
    { 
        $table = 'parameter_antrian';
        $where = '';
        $select = '*';
        $rsp = $this->_api->get($table,$where,$select);
        echo json_encode($rsp);
    }

    public function penyebab()
    { 
        $table = 'penyebab';
        $where = '';
        $select = '*';
        $rsp = $this->_api->get($table,$where,$select);
        echo json_encode($rsp);
    }

    public function lap_gatlin()
    {
        // Delakarasi
        $inp = [
            'kegiatan' => 'kegiatan',
            'no_sprint' => 'no_sprint',
            'tanggal' => 'tanggal',
            'jam' => 'jam',
            'pos_simpang' => 'pos_simpang',
            'kordinat' => 'kordinat',
            'kejadian' => 'kejadian',
            'status_lalin' => 'status_lalin',
            'a_timur' => 'a_timur',
            'a_barat' => 'a_barat',
            'a_utara' => 'a_utara',
            'a_selatan' => 'a_selatan',
            'penyebab' => 'penyebab',
        ];
        $status = false;
        $table = 'lap_gatur_lalin';
        $msg = "Gagal Input Data";
        $data = [];
        $where = [];
        $obj = [];
        $i = inp();

        foreach ($i as $k => $v) {
            $obj[$k] = $v;
        }
        
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method == "GET") {
            $rsp = $this->_api->get($table);
            echo json_encode($rsp);
        }elseif ($method == "POST") {
            $q =  $this->mg->in($table, $obj);
            if($q[0]){
                $status = true;
                $msg = "Data berhasil di input";
            }
        }elseif ($method == "PUT") {
            $where = ['rowid' =>  $i['rowid']];
            foreach ($i as $k => $v) {
                $obj[$k] = $v;
            }
            
            $q =  $this->mg->up($table,$obj,$where);
            if($q[0]){
                $status = true;
                $msg = "Data berhasil di update";
            }
        }

        $rsp = [
            'data' => $data,
            'msg' => $msg,
            'status' => $status
        ];

        echo json_encode($rsp);
    }

    
    // end get input type select di form laporan gatur 
}