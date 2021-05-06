<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Mindicar extends CI_Model {

    private $t = '';
    public $see = '*';

    public function __construct()
    {
        parent::__construct();
    }

    function get_http($url,$search)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            ),
        CURLOPT_POSTFIELDS => $search,    
        ));

        $response = curl_exec($curl);
        $data = json_decode($response, true);
        return $data;
    }

    function get_https($url,$token)
    {

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://api.solo.indicar.id/kendaraan/list",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",    
            // "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy93cy8yMDA1LzA1L2lkZW50aXR5L2NsYWltcy9uYW1laWRlbnRpZmllciI6IjE3MyIsImh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3dzLzIwMDUvMDUvaWRlbnRpdHkvY2xhaW1zL25hbWUiOiJJT1QuS09STEFOVEFTQEdNQUlMLkNPTSIsIkFzcE5ldC5JZGVudGl0eS5TZWN1cml0eVN0YW1wIjoiYTZhNjI0YzMtZDhmYi00NzI4LTdlN2MtMzlmYjJlNjdkNjQyIiwiaHR0cDovL3NjaGVtYXMubWljcm9zb2Z0LmNvbS93cy8yMDA4LzA2L2lkZW50aXR5L2NsYWltcy9yb2xlIjoiQWRtaW5HcnVwIiwic3ViIjoiMTczIiwianRpIjoiYTY0NDZkM2ItNzcxNS00YWFlLWFjYzAtMGRkN2RmYTIwNjgyIiwiaWF0IjoxNjIwMTA1MzA4LCJ1c2VybmFtZSI6IklPVC5LT1JMQU5UQVNAR01BSUwuQ09NIiwiZnVsbG5hbWUiOiJJbmRpY2FyIERlbW8gIiwic3RhdHVzIjoiQWN0aXZlIiwicm9sZV9uYW1lIjoiQWRtaW5HcnVwLEFkbWluR3J1cCIsImV4cGlyZWQiOiIwNS8wNS8yMDIxIDA1OjE1OjA4IiwidHlwZV91c2VyIjoiQ3VzdG9tZXIiLCJ0ZW5hbnQiOiJEZWZhdWx0IiwiZ3JvdXAiOiJpb3Qua29ybGFudGFzQGdtYWlsLmNvbSxpb3Qua29ybGFudGFzQGdtYWlsLmNvbSIsImN1c3RvbWVyY29kZSI6IjhhYzhiYjY5MWI4OWFkNDk1Y2Q5NTkzZWZhMWZhMmRhIiwidGVuYW50Y29kZSI6IiIsInVzZXJjb2RlIjoiOTg5MDIzZDIwMTAxODU3ZjE4ZWU0OWU3NmYzNGRmZmUiLCJuYmYiOjE2MjAxMDUzMDgsImV4cCI6MTYyMDE5MTcwOCwiaXNzIjoiSW5kaUNhckJhY2tlbmQiLCJhdWQiOiJJbmRpQ2FyQmFja2VuZCJ9.RcuRItz7NOeN8CJppet7C35e-k__e1hQ_cmut-iyaJU"
            // $token
        ),
        ));

        $response = curl_exec($curl);
        $data = json_decode($response, true);
        return $data;
    }

    public function dt_pengaduan()
    {
        $url = "http://api.solo.indicar.id/pengaduan/list";
        $search = array("limit" => "", "page" => "");
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6NiwibmFtYSI6InVzZXIyIiwiZW1haWwiOiJ1c2VyMkBnbWFpbC5jb20iLCJub2hwIjoiIiwicm9sZSI6IiIsInZhbGlkYXRlIjoiIiwiaWF0IjoxNjIwMjg0Mjc0LCJleHAiOjE2MjAzNzA2NzR9.ns2rM6pwNB59oQ3Z9h9sRmkNwadX2KyUHMf1Dzngrt0"
            ),
        CURLOPT_POSTFIELDS => json_encode($search),    
        ));

        $response = curl_exec($curl);
        $api = json_decode($response, true);
        $apis = $api['dataset'];
        foreach ($apis as $key => $val) {
            $data[] = array(
                $val['pengaduanid'],
                $val['judul'],
                $val['nama_kategori'],
                $val['latitude'],
                $val['longitude'],
                $val['nama_status'],
                '<div class="btn-group align-top">
                </div>',
                // '<div class="btn-group align-top">
                //    <a href="javascript:void(0)" title="Edit" onclick="f_edit('. $val['pengaduanid'].')"  class="btn btn-sm btn-outline-primary badge" ><i class="fa fa-edit"></i> Edit </a>
                //    <button class="btn btn-sm btn-outline-primary badge" type="button" data-toggle="modal" data-target="#f_detail"><i class="fa fa-eye"></i></button>
                //    <button class="btn btn-sm btn-outline-primary badge" onclick="f_delete('. $val['pengaduanid'].')" type="button"><i class="fa fa-trash"></i></button>
                // </div>',
            );
        }

        $output = array(
            "data" => $data
        );
        return json_encode($output);
    }
    public function dt_list_petugas()
    {
        $url = "http://api.solo.indicar.id/users/list/petugas";
        $search = array("search" => "", "=status" => "");
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6NiwibmFtYSI6InVzZXIyIiwiZW1haWwiOiJ1c2VyMkBnbWFpbC5jb20iLCJub2hwIjoiIiwicm9sZSI6IiIsInZhbGlkYXRlIjoiIiwiaWF0IjoxNjIwMjg0Mjc0LCJleHAiOjE2MjAzNzA2NzR9.ns2rM6pwNB59oQ3Z9h9sRmkNwadX2KyUHMf1Dzngrt0"
            ),
        CURLOPT_POSTFIELDS => json_encode($search),    
        ));

        $response = curl_exec($curl);
        $api = json_decode($response, true);
        $apis = $api['dataset'];
        foreach ($apis as $key => $val) {
            $data[] = array(
                $val['userid'],
                $val['nama'],
                $val['kendaraannama'],
                $val['kendaraannopol'],
                $val['nama_status'],
                '<div class="btn-group align-top">
                </div>',
                // '<div class="btn-group align-top">
                //    <a href="javascript:void(0)" title="Edit" onclick="f_edit('. $val['userid'].')"  class="btn btn-sm btn-outline-primary badge" ><i class="fa fa-edit"></i> Edit </a>
                //    <button class="btn btn-sm btn-outline-primary badge" type="button" data-toggle="modal" data-target="#f_detail"><i class="fa fa-eye"></i></button>
                //    <button class="btn btn-sm btn-outline-primary badge" onclick="f_delete('. $val['userid'].')" type="button"><i class="fa fa-trash"></i></button>
                // </div>',
            );
        }

        $output = array(
            "data" => $data
        );
        return json_encode($output);
    }

    public function dt_kendaraan()
    {
         // Definisi
         $condition = [];
         $data = [];
         
         $CI = &get_instance();
         $CI->load->model('DataTable', 'dt');
         
         // Set table name
         $CI->dt->table = 'indicar_data_kendaraan';
         // Set orderable column fields
         $CI->dt->column_order = ['kendaraanid','kendaraannama','kendaraannopol','latitude','longitude','ctddate'];
         // Set searchable column fields
         $CI->dt->column_search = ['kendaraanid','kendaraannama','kendaraannopol','latitude','longitude','ctddate',];
         // Set select column fields
         $CI->dt->select = 'kendaraanid,kendaraannama,kendaraannopol,latitude,longitude,ctddate,ctdupd';
         // Set default order
         $CI->dt->order = ['kendaraanid' => 'ASC'];

        //  $pp_id = $this->input->post('id');

        //  if ($pp_id != '') {
        //    $con1t = ['where','pp_id',$pp_id];
        //    array_push($condition,$con1t);
        //   }
         
   

        //  $cons = ['join','polda p','p.rowid = e.da','inner'];
        //  array_push($condition,$cons);
         
         // Fetch member's records
         $dataTabel = $this->dt->getRows($_POST, $condition);
         $i = $this->input->post('start');
         foreach ($dataTabel as $dt) {
             $i++;
             $data[] = array(
                $dt->kendaraanid,
                $dt->kendaraannama,
                $dt->kendaraannopol,
                $dt->latitude,
                $dt->longitude,
                '<div class="btn-group align-top">
                    <a href="javascript:void(0)" title="Edit" onclick="f_edit('.$dt->kendaraanid.')"  class="btn btn-sm btn-outline-primary badge" ><i class="fa fa-edit"></i> Edit </a>
                    <button class="btn btn-sm btn-outline-primary badge" type="button" data-toggle="modal" data-target="#f_detail"><i class="fa fa-eye"></i></button>
                    <button class="btn btn-sm btn-outline-primary badge" onclick="f_delete('.$dt->kendaraanid.')" type="button"><i class="fa fa-trash"></i></button>
                </div>',
            );
         }
         
         $output = array(
             "draw" =>  $this->input->post('draw'),
             "recordsTotal" => $this->dt->countAll($condition),
             "recordsFiltered" => $this->dt->countFiltered($_POST, $condition),
             "data" => $data
         );
         
         // Output to JSON format
         return json_encode($output);
    } 

    public function refresh_pengaduan()
    {
        $url = "http://api.solo.indicar.id/pengaduan/update/status";
        $search = array("pengaduanid\r" => "any", "status\r" => "any");
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6NiwibmFtYSI6InVzZXIyIiwiZW1haWwiOiJ1c2VyMkBnbWFpbC5jb20iLCJub2hwIjoiIiwicm9sZSI6IiIsInZhbGlkYXRlIjoiIiwiaWF0IjoxNjIwMjg0Mjc0LCJleHAiOjE2MjAzNzA2NzR9.ns2rM6pwNB59oQ3Z9h9sRmkNwadX2KyUHMf1Dzngrt0"
            ),
        CURLOPT_POSTFIELDS => json_encode($search),    
        ));

        $response = curl_exec($curl);
        $api = json_decode($response, true);
        return json_encode($api);
    }


    function detail_kendaraan($kendaraanid)
    {
        $this->db->select('kendaraannama');
        $this->db->from('indicar_data_kendaraan');
        $this->db->where('kendaraanid', $kendaraanid);
        $data = $this->db->get()->result();

        return json_encode($data);
    }

    function proses_tambah($rowid,$kendaraanid,$kendaraannama,$kendaraannopol,$latitude,$longitude)
    {
        $data = array(
                'rowid' => $rowid,
                'kendaraanid' => $kendaraanid,
                'kendaraannama' => $kendaraannama,
                'kendaraannopol' => $kendaraannopol,
                'latitude' => $latitude,
                'longitude' => $longitude
        );
    
        $rs = $this->db->insert('indicar_data_kendaraan', $data);

        return json_encode($rs);
    }

    function proses_edit($kendaraanid,$kendaraannama)
    {
        $data = array(
                'kendaraannama' => $kendaraannama
        );
    
        $this->db->where('kendaraanid', $kendaraanid);
        $rs = $this->db->update('indicar_data_kendaraan', $data);

        return json_encode($rs);
    }

    public function proses_delete($kendaraanid)
    {
       $rs = $this->db->delete('indicar_data_kendaraan', array('kendaraanid' => $kendaraanid));

       return json_encode($rs);
    }

    
    
}