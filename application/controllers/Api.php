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
    public function api_kegiatan()
    { 
        $table = 'kegiatan';
        $where = '';
        $select = '*';
        $rsp = $this->_api->get($table,$where,$select);
        echo json_encode($rsp);
    }

    public function api_kejadian_ditemukan()
    { 
        $table = 'kejadian_ditemukan';
        $where = '';
        $select = '*';
        $rsp = $this->_api->get($table,$where,$select);
        echo json_encode($rsp);
    }
    
    public function api_parameter_antrian()
    { 
        $table = 'parameter_antrian';
        $where = '';
        $select = '*';
        $rsp = $this->_api->get($table,$where,$select);
        echo json_encode($rsp);
    }

    public function api_penyebab()
    { 
        $table = 'penyebab';
        $where = '';
        $select = '*';
        $rsp = $this->_api->get($table,$where,$select);
        echo json_encode($rsp);
    }

    public function api_lap_gatlin(Type $var = null)
    {
        # code...
    }

    
    // end get input type select di form laporan gatur 
}