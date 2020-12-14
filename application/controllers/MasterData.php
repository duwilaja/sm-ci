<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MasterData extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MGeneral','mg');
        
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
