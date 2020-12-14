<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Setup extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MGeneral','mg');
    } 
    
    // Get All Direktorat
    public function get_direktorat()
    {

        $q = $this->mg->get('direktorat','','dit_id as nilai,dit_nam as nama');
        echo json_encode($q->result());
    }

    // Get All Direktorat
    public function get_subdit()
    {

        $q = $this->mg->get('subdit','','sub_id as nilai,sub_nam as nama');
        echo json_encode($q->result());
    }

    public function dasargiat()
    {
        $arr = [
            'tabel' => 'dasargiat',
            'field_in' =>[
                srlen('dg_id') => 'ID',
                srlen('dg_nam') => 'NAMA',
            ],
            'field_up' =>[
                'rowid' => 'hidden',
                'dg_id' => 'ID',
                'dg_nam' => 'NAMA',
            ],
            'field_se' =>[
                'dg_id' => 'ID',
                'dg_nam' => 'NAMA',
            ],
            'dt' => [
                'order' => [
                    'dg_id',
                    'dg_nam',
                ],
                'search' => [
                    'dg_id',
                    'dg_nam'
                ],
                'view' => [
                    'dg_id',
                    'dg_nam',
                ]
            ]
        ];
        
        $this->mg->crud($arr);
       
    }

    public function pangkat()
    {
        $arr = [
            'tabel' => 'pangkat',
            'field_in' =>[
                srlen('pang_id') => 'ID',
                srlen('pang_nam') => 'NAMA',
            ],
            'field_up' =>[
                'rowid' => 'hidden',
                'pang_id' => 'ID',
                'pang_nam' => 'NAMA',
            ],
            'field_se' =>[
                'pang_id' => 'ID',
                'pang_nam' => 'NAMA',
            ],
            'dt' => [
                'order' => [
                    'pang_id',
                    'pang_nam',
                ],
                'search' => [
                    'pang_id',
                    'pang_nam'
                ],
                'view' => [
                    'pang_id',
                    'pang_nam',
                ]
            ]
        ];
        
        $this->mg->crud($arr);
       
    }

    public function unit()
    {
        $arr = [
            'tabel' => 'unit',
            'field_in' =>[
                srlen('unit_id') => 'ID',
                srlen('unit_nam') => 'NAMA',
            ],
            'field_up' =>[
                'rowid' => 'hidden',
                'unit_id' => 'ID',
                'unit_nam' => 'NAMA',
            ],
            'field_se' =>[
                'unit_id' => 'ID',
                'unit_nam' => 'NAMA',
            ],
            'dt' => [
                'order' => [
                    'unit_id',
                    'unit_nam',
                ],
                'search' => [
                    'unit_id',
                    'unit_nam'
                ],
                'view' => [
                    'unit_id',
                    'unit_nam',
                ]
            ]
        ];
        
        $this->mg->crud($arr);
       
    }

    public function subag()
    {
        $arr = [
            'tabel' => 'bagian',
            'field_in' =>[
                srlen('bag_id') => 'ID',
                srlen('bag_nam') => 'NAMA',
                srlen('subdit') => 'Subdit|select|get_subdit',
            ],
            'field_up' =>[
                'rowid' => 'hidden',
                'bag_id' => 'ID',
                'bag_nam' => 'NAMA',
                'subdit' => 'Subdit|select|get_subdit',
            ],
            'field_se' =>[
                'bag_id' => 'ID',
                'bag_nam' => 'NAMA',
                'subdit' => 'Direkotrat'
            ],
            'dt' => [
                'order' => [
                    'bag_id',
                    'bag_nam',
                    'subdit'
                ],
                'search' => [
                    'bag_id',
                    'bag_nam'
                ],
                'view' => [
                    'bag_id',
                    'bag_nam',
                    'subdit'
                ]
            ]
        ];
        
        $this->mg->crud($arr);
       
    }

    public function subdit()
    {
        $arr = [
            'tabel' => 'subdit',
            'field_in' =>[
                srlen('sub_id') => 'ID',
                srlen('sub_nam') => 'NAMA',
                srlen('direktorat') => 'Direkotrat|select|get_direktorat',
            ],
            'field_up' =>[
                'rowid' => 'hidden',
                'sub_id' => 'ID',
                'sub_nam' => 'NAMA',
                'direktorat' => 'Direkotrat|select|get_direktorat',
            ],
            'field_se' =>[
                'sub_id' => 'ID',
                'sub_nam' => 'NAMA',
                'direktorat' => 'Direkotrat'
            ],
            'dt' => [
                'order' => [
                    'sub_id',
                    'sub_nam',
                    'direktorat'
                ],
                'search' => [
                    'sub_id',
                    'sub_nam'
                ],
                'view' => [
                    'sub_id',
                    'sub_nam',
                    'direktorat'
                ]
            ]
        ];
        
        $this->mg->crud($arr);
       
    }

    public function polda()
    {
        $arr = [
            'tabel' => 'polda',
            'field_in' =>[
                srlen('da_id') => 'ID',
                srlen('da_nam') => 'NAMA'
            ],
            'field_up' =>[
                'rowid' => 'hidden',
                'da_id' => 'ID',
                'da_nam' => 'NAMA'
            ],
            'field_se' =>[
                'da_id' => 'ID',
                'da_nam' => 'NAMA'
            ],
            'dt' => [
                'order' => [
                    'da_id',
                    'da_nam'
                ],
                'search' => [
                    'da_id',
                    'da_nam'
                ],
                'view' => [
                    'da_id',
                    'da_nam'
                ]
            ]
        ];
        
        $this->mg->crud($arr);
       
    }

    public function polres()
    {
        $arr = [
            'tabel' => 'polres',
            'field_in' =>[
                srlen('res_id') => 'ID',
                srlen('res_nam') => 'NAMA'
            ],
            'field_up' =>[
                'rowid' => 'hidden',
                'res_id' => 'ID',
                'res_nam' => 'NAMA'
            ],
            'field_se' =>[
                'res_id' => 'ID',
                'res_nam' => 'NAMA'
            ],
            'dt' => [
                'order' => [
                    'res_id',
                    'res_nam'
                ],
                'search' => [
                    'res_id',
                    'res_nam'
                ],
                'view' => [
                    'res_id',
                    'res_nam'
                ]
            ]
        ];
        
        $this->mg->crud($arr);
    }

    public function direktorat()
    {
        $arr = [
            'tabel' => 'direktorat',
            'field_in' =>[
                srlen('dit_id') => 'ID',
                srlen('dit_nam') => 'NAMA'
            ],
            'field_up' =>[
                'rowid' => 'hidden',
                'dit_id' => 'ID',
                'dit_nam' => 'NAMA'
            ],
            'field_se' =>[
                'dit_id' => 'ID',
                'dit_nam' => 'NAMA'
            ],
            'dt' => [
                'order' => [
                    'dit_id',
                    'dit_nam'
                ],
                'search' => [
                    'dit_id',
                    'dit_nam'
                ],
                'view' => [
                    'dit_id',
                    'dit_nam'
                ]
            ]
        ];
        
        $this->mg->crud($arr);
       
    }

}

/* End of file MasterData.php */
