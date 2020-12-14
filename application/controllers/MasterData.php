<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MasterData extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MGeneral','mg');
        
    } 

    // public function smd_dash()
    // {
    //     $d = [
	// 		'title' => 'Social Media Dashboard',
	// 		'linkView' => 'page/smd/social_media_dashboard',
	// 		'fileScript' => 'social_media_dashboard.js',
	// 		'bread' => [
	// 			'nama' => 'SMD',
	// 			'data' => [
	// 				//['nama' => 'Karyawan','link' => site_url('main/karyawan'),'active' => 'active']
	// 			]
    //         ]
	// 	];
	// 	$this->load->view('_main',$d);
    // }

    public function get_konstruksi()
    {

        $konstruksi = 
        [
            [
                'nilai' => 1,
                'nama' => 'Tanah'
            ],
            [
                'nilai' => 2,
                'nama' => 'Batu'
            ],
            [
                'nilai' => 3,
                'nama' => 'Aspal'
            ],
            [
                'nilai' => 4,
                'nama' => 'Beton'
            ],
        ];
         echo json_encode($konstruksi);
    }

    public function kondisi_alam()
    {
        $arr = [
            'tabel' => 'kondisi_alam',
            'field_in' =>[
                srlen('ka_id') => 'ID',
                srlen('kondisi') => 'NAMA'
            ],
            'field_up' =>[
                'rowid' => 'hidden',
                'ka_id' => 'ID',
                'kondisi' => 'NAMA'
            ],
            'field_se' =>[
                'ka_id' => 'ID',
                'kondisi' => 'NAMA'
            ],
            'dt' => [
                'order' => [
                    'ka_id',
                    'kondisi'
                ],
                'search' => [
                    'ka_id',
                    'kondisi'
                ],
                'view' => [
                    'ka_id',
                    'kondisi'
                ]
            ]
        ];
        
        $this->mg->crud($arr);
    }

    public function kondisi_jalan()
    {
        $arr = [
            'tabel' => 'kondisi_jalan',
            'field_in' =>[
                srlen('kj_id') => 'ID',
                srlen('nama_jalan') => 'NAMA JALAN',
                srlen('kelas_jalan') => 'KELAS JALAN',
                srlen('status_jalan') => 'STATUS JALAN',
                srlen('konstruksi_jalan') => 'KONSTRUKSI JALAN|select|get_konstruksi'
            ],
            'field_up' =>[
                'rowid' => 'hidden',
                'kj_id' => 'ID',
                'nama_jalan' => 'NAMA JALAN',
                'kelas_jalan' => 'KELAS JALAN',
                'status_jalan' => 'STATUS JALAN',
                'konstruksi_jalan' => 'KONSTRUKSI JALAN|select|get_konstruksi'
                
            ],
            'field_se' =>[
                'kj_id' => 'ID',
                'nama_jalan' => 'NAMA JALAN',
                'kelas_jalan' => 'KELAS JALAN',
                'status_jalan' => 'STATUS JALAN',
                'konstruksi_jalan' => 'KONSTRUKSI JALAN'
                
            ],
            'dt' => [
                'order' => [
                    'kj_id',
                    'nama_jalan'
                ],
                'search' => [
                    'kj_id',
                    'nama_jalan'
                ],
                'view' => [
                    'kj_id',
                    'nama_jalan',
                    'kelas_jalan',
                    'status_jalan',
                    'konstruksi_jalan'
                ]
            ]
        ];
        
        $this->mg->crud($arr);
    }

    public function kondisi_lalin()
    {
        $arr = [
            'tabel' => 'kondisi_lalin',
            'field_in' =>[
                srlen('kl_id') => 'ID',
                srlen('kondisi') => 'NAMA'
            ],
            'field_up' =>[
                'rowid' => 'hidden',
                'kl_id' => 'ID',
                'kondisi' => 'NAMA'
            ],
            'field_se' =>[
                'kl_id' => 'ID',
                'kondisi' => 'NAMA'
            ],
            'dt' => [
                'order' => [
                    'kl_id',
                    'kondisi'
                ],
                'search' => [
                    'kl_id',
                    'kondisi'
                ],
                'view' => [
                    'kl_id',
                    'kondisi'
                ]
            ]
        ];
        
        $this->mg->crud($arr);
    }

   

}

/* End of file MasterData.php */
