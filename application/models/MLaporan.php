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
                    $dt->no_sprint,
                    $dt->kegiatan,
                    $dt->kejadian,
                    $dt->tanggal,
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

        public function api_lap_gatur_lalin()
        { 
            $ax = $this->input->get('api');
            $table = 'lap_gatur_lalin';
            $where = 'rowid='.$this->input->post('rowid');
            $select = '*';
    
            $data = [
                'kegiatan' => $this->input->post('kegiatan'),
                'no_sprint' => $this->input->post('no_sprint'),
                'tanggal' => $this->input->post('tanggal'),
                'jam' => $this->input->post('jam'),
                'pos_simpang' => $this->input->post('pos_simpang'),
                'kordinat' => $this->input->post('kordinat'),
                'kejadian' => $this->input->post('kejadian'),
                'status_lalin' => $this->input->post('status_lalin'),
                'a_timur' => $this->input->post('a_timur'),
                'a_barat' => $this->input->post('a_barat'),
                'a_utara' => $this->input->post('a_utara'),
                'a_selatan' => $this->input->post('a_selatan'),
                'penyebab' => $this->input->post('penyebab'),
    
            ];
          
            if ($ax == "get") {
                $rsp = $this->_api->get($table,$where,$select);
                echo json_encode($rsp);
            }elseif ($ax == "in") {
                $this->db->insert($table, $data);
                // $id = $this->db->insert_id();
                //  tinggal insert foto
                echo json_encode(['msg' => 'Sukses','status' => true]);
            }elseif ($ax == "up") {
                $this->db->set($data);
                $this->db->where('rowid', $this->input->post('rowid'));
                $this->db->update($table);
                 //  tinggal upd foto
                echo json_encode(['msg' => 'Sukses','status' => true]);
            }else{
                echo json_encode(['msg' => 'Gagal Akes Api','status' => false]);
            }
        }

}   
