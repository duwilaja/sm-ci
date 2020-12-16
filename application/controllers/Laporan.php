<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MLaporan','ml');
        
    } 

    //Éntry Laporan Gatur Lalin
    public function dt_lap_gat_lin()
    {
        echo ($this->ml->dt_lap_gat_lin());
    }

    public function lap_gat_lin()
    {
        $data = [
            'title' => 'Laporan Giat Lalin',
            'js_local' => 'laporan/lap_gat_lin.js',
        ];
        $this->template->load('page/laporan/lap_gat_lin', $data);
    }

}   