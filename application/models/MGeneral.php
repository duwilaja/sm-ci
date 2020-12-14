<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MGeneral extends CI_Model {

    public function crud($arr=[])
    {
        $ax = $this->input->get('ax');
        
        $tabel = 'polres';
        $tabel = $arr['tabel'];
        $field_in = $arr['field_in'];
        $field_up = $arr['field_up'];
        $field_se = $arr['field_se'];
        
        if($ax == 'dt'){
            if (isset($arr['dt2'])) {
                $x = $this->dt2($arr);
            }else{
                $x = $this->dt($arr['tabel'],$arr['dt']['order'],$arr['dt']['search'],$arr['dt']['view']);
            }
            echo $x;
        }else if($ax == "get"){
            $x = $this->get_data_id($tabel,array_keys($field_up));
            echo json_encode($x);
        }else if($ax == "in"){
            $x = $this->in($tabel,$field_in);
            echo json_encode(['msg' => 'Sukses','status' => true]);
        }else if($ax == "up"){
            $x = $this->up($tabel,array_keys($field_up));
            echo json_encode(['msg' => 'Sukses','status' => true]);
        }else if($ax == "de"){
            $x = $this->de($tabel,array_keys($field_up));
            echo json_encode(['msg' => 'Sukses','status' => true]);
        }else{
            $data = [
                'js_local' => 'master_data/master_data.js',
                'var' => [
                    'in' => $field_in,
                    'up' => $field_up,
                    'se' => $field_se,
                ]
            ];
            $this->template->load('page/master_data/master_data', $data);
        }
    }

    // Digunakan untuk mengambil data berdasarkan id
    public function get_data_id($tabel,$obj)
    {
        $x = implode(',',$obj);
        $this->db->select($x);
        $q = $this->db->get_where($tabel,[$obj[0] => $this->input->get('u_'.$obj[0])]);
        return $q->row();
    }

    // Digunakan untuk mengambil semua data
    public function get($tabel,$where='',$x='*')
    {
        $this->db->select($x);
        if ($where != '') {
            $q = $this->db->get_where($tabel,$where);
        }else{
            $q = $this->db->get($tabel);
        }
        return $q;
    }

    // DataTable general tidak dperuntukan untuk tabel join
    public function dt($table='',$order=[],$search=[],$view=[])
    {
        // Definisi
        $condition = [];
        $data = [];
        $field = [];

        // if(!empty($view) && !empty($table) && !empty($order) && !empty($search)) return false;

        $CI = &get_instance();
        $CI->load->model('DataTable', 'dt');
        
        // Set table name
        $CI->dt->table = $table;
        // Set orderable column fields
        $CI->dt->column_order = $order;
        // Set searchable column fields
        $CI->dt->column_search = $search;
        // Set select column fields
        $CI->dt->select = '*';
        // Set default order
        $CI->dt->order = [$table.'.rowid' => 'desc'];
        
        // $con2 = ['where','l.status',$status];
        // array_push($condition,$con2);

        // Fetch member's records
        $dataTabel = $this->dt->getRows($_POST, $condition);
        
        $i = $this->input->post('start');
        foreach ($dataTabel as $dt) {
            $field = [];
            $arr = json_decode(json_encode($dt), true);
            foreach ($view as $x) {
               array_push($field,$arr[$x]);
            }
            $f = $this->select_dt($table,$field,$dt);
            array_push($data,$f);
        }
        // echo json_encode($data);
        // die;
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->dt->countAll($condition),
            "recordsFiltered" => $this->dt->countFiltered($_POST, $condition),
            "data" => $data,
        );
        
        // Output to JSON format
        return json_encode($output);
    }

    public function select_dt($t='',$field,$dt='')
    {
        $field[0] = '<a href="#" data-toggle="modal" data-target="#myModal2" onclick="get_data_id('.$dt->rowid.')">'.$field[0].'</a>';
        return $field;
    }

    // DataTable general versi 2
    public function dt2($arrx=[])
    {
        // Definisi
        $dtx = $arrx['dt'];
        $table = $arrx['tabel'];

        $condition = [];
        $data = [];
        $field = [];

        // if(!empty($view) && !empty($table) && !empty($order) && !empty($search)) return false;

        $CI = &get_instance();
        $CI->load->model('DataTable', 'dt');
        
        // Set table name
        $CI->dt->table = $table;
        // Set orderable column fields
        $CI->dt->column_order = $dtx['order'];
        // Set searchable column fields
        $CI->dt->column_search = $dtx['search'];
        // Set select column fields
        $CI->dt->select = '*';
        // Set default order
        $CI->dt->order = [$table.'.rowid' => 'desc'];
        
        // $con2 = ['where','l.status',$status];
        // array_push($condition,$con2);
        
        if (isset($dtx['join'])) {
            $con3 = ['join','jabatan j','j.id = karyawan.jabatan_id','left'];
            array_push($condition,$con3);
        }

        // Fetch member's records
        $dataTabel = $this->dt->getRows($_POST, $condition);
        
        $i = $this->input->post('start');
        foreach ($dataTabel as $dt) {
            $field = [];
            $arr = json_decode(json_encode($dt), true);
            foreach ($dtx['view'] as $x) {
               array_push($field,$arr[$x]);
            }
            $field[0] = '<a href="#" data-toggle="modal" data-target="#myModal2" onclick="get_data_id('.$dt->rowid.')">'.$field[0].'</a>';
            array_push($data,$field);
        }
        // echo json_encode($data);
        // die;
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->dt->countAll($condition),
            "recordsFiltered" => $this->dt->countFiltered($_POST, $condition),
            "data" => $data,
        );
        
        // Output to JSON format
        return json_encode($output);
    }

    public function in($tabel,$object)
    {
        $data_tmp = [];
        if($tabel == '') return [false];

        foreach ($object as $k => $v) {
            $data_tmp[srlde($k)] = $this->input->post('i_'.$k);
        }

        if(@count($data_tmp) > 0){
            $q = $this->db->insert($tabel, $data_tmp);
            if ($this->db->affected_rows() > 0) {
                $id = $this->db->insert_id();
                return [true,$id];
            }
        }
        
        return [false];
    }

    public function up($tabel,$object)
    {
        $data_tmp = [];
        if($tabel == '') return [false];
        
        foreach ($object as $k => $v) {
           $data_tmp[$object[$k]] = $this->input->post('u_'.$object[$k]);
        }
        $where = [
            $object[0] => $this->input->post('u_'.$object[0])
        ];

        if(@count($data_tmp) > 0){
            $q = $this->db->update($tabel, $data_tmp,$where);
            if ($this->db->affected_rows() > 0) {
                return [true];
            }
        }

        return [false];
    }

    public function de($tabel,$object)
    {
        $where = [
            $object[0] => $this->input->post('u_'.$object[0])
        ];

        $q = $this->db->delete($tabel,$where);
        if ($this->db->affected_rows() > 0) {
            return [true];
        }

        return [false];
    }

}

/* End of file MGeneral.php */
