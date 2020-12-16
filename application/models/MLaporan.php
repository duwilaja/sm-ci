<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MLaporan extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('dt');
    }

        // model master data laporan gatur lalu lintas
        public function dt_lap_gat_lin()
        {
            // Definisi
            $condition = '';
            $data = [];
    
            $CI = &get_instance();
            $CI->load->model('DataTable', 'dt');
    
            // Set table name
            $CI->dt->table = 'lap_gatur_lalin';
            // Set orderable column fields
            $CI->dt->column_order = ['rowid','no_sprint','kegiatan','kejadian','tanggal'];
            // Set searchable column fields
            $CI->dt->column_search = ['no_sprint', 'kegiatan','kejadian'];
            // Set select column fields
            $CI->dt->select = 'rowid,no_sprint,kegiatan,kejadian,tanggal';
            // Set default order
            $CI->dt->order = ['rowid' => 'asc'];
    
            // $condition = [
            //     ['where',$this->t.'.pnjm_nip_pengajuan',$this->session->userdata('nip')],
            // ];
            // Fetch member's records
            $dataTabel = $this->dt->getRows($_POST, $condition);
    
            $i = $_POST['start'];
            foreach ($dataTabel as $dt) {
                $i++;
                $data[] = array(
                    //$i,
                    $dt->no_sprint,
                    $dt->kegiatan,
                    $dt->kejadian,
                    $dt->tgl,
                    '<button class="btn btn-sm btn-outline-primary badge" type="button" data-toggle="modal" data-target="#user-form-modal">Edit</button><button class="btn btn-sm btn-outline-primary badge" type="button"><i class="fa fa-eye"></i></button>',
                );
            }
    
            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->dt->countAll($condition),
                "recordsFiltered" => $this->dt->countFiltered($_POST, $condition),
                "data" => $data,
            );
    
            // Output to JSON format
            return json_encode($output);
        }

}   
