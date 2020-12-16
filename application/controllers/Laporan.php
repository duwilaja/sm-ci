<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MLaporan','ml');
        
    } 

    //Éntry Laporan Gatur Lalin
    public function lap_gat_lin()
    {
        $d = [
			'title' => 'Entry Laporan Gatur Lalin',
			'linkView' => 'page/laporan/lap_gat_lin',
			'fileScript' => 'lap_gat_lin.js',
			'bread' => [
				'nama' => 'Laporan Gatur Lalin',
				'data' => [
					//['nama' => 'Karyawan','link' => site_url('main/karyawan'),'active' => 'active']
                    ]
                ]
            ];
        $this->load->view('_main',$d);
    }

}   