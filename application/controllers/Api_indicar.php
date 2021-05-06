<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_indicar extends CI_Controller {
	
	public function __construct()
	{
        date_default_timezone_set("Asia/Jakarta");
		parent::__construct();
        $this->load->helper('string');
        $this->load->model('Mindicar','mic');
		// Your own constructor code
	}
    
    function dt_pengaduan()
    {
        echo $this->mic->dt_pengaduan();
    }
    function dt_list_petugas()
    {
        echo $this->mic->dt_list_petugas();
    }
    function dt_kendaraan()
    {
        // $token = "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy93cy8yMDA1LzA1L2lkZW50aXR5L2NsYWltcy9uYW1laWRlbnRpZmllciI6IjE3MyIsImh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3dzLzIwMDUvMDUvaWRlbnRpdHkvY2xhaW1zL25hbWUiOiJJT1QuS09STEFOVEFTQEdNQUlMLkNPTSIsIkFzcE5ldC5JZGVudGl0eS5TZWN1cml0eVN0YW1wIjoiYTZhNjI0YzMtZDhmYi00NzI4LTdlN2MtMzlmYjJlNjdkNjQyIiwiaHR0cDovL3NjaGVtYXMubWljcm9zb2Z0LmNvbS93cy8yMDA4LzA2L2lkZW50aXR5L2NsYWltcy9yb2xlIjoiQWRtaW5HcnVwIiwic3ViIjoiMTczIiwianRpIjoiMTMyYTMyOWQtMzFkNi00NmVmLWI0NTMtNjgxM2U1ZWNkMzhmIiwiaWF0IjoxNjIwMTg0MTQ5LCJ1c2VybmFtZSI6IklPVC5LT1JMQU5UQVNAR01BSUwuQ09NIiwiZnVsbG5hbWUiOiJJbmRpY2FyIERlbW8gIiwic3RhdHVzIjoiQWN0aXZlIiwicm9sZV9uYW1lIjoiQWRtaW5HcnVwLEFkbWluR3J1cCIsImV4cGlyZWQiOiIwNS8wNi8yMDIxIDAzOjA5OjA5IiwidHlwZV91c2VyIjoiQ3VzdG9tZXIiLCJ0ZW5hbnQiOiJEZWZhdWx0IiwiZ3JvdXAiOiJpb3Qua29ybGFudGFzQGdtYWlsLmNvbSxpb3Qua29ybGFudGFzQGdtYWlsLmNvbSIsImN1c3RvbWVyY29kZSI6IjhhYzhiYjY5MWI4OWFkNDk1Y2Q5NTkzZWZhMWZhMmRhIiwidGVuYW50Y29kZSI6IiIsInVzZXJjb2RlIjoiOTg5MDIzZDIwMTAxODU3ZjE4ZWU0OWU3NmYzNGRmZmUiLCJuYmYiOjE2MjAxODQxNDksImV4cCI6MTYyMDI3MDU0OSwiaXNzIjoiSW5kaUNhckJhY2tlbmQiLCJhdWQiOiJJbmRpQ2FyQmFja2VuZCJ9.KGWS3ZxGeHXErqm54TZq-wGClwfd8dq1P9dnWESgpPY";
        // $url  = "http://api.solo.indicar.id/kendaraan/list";
        // $search = json_encode(array(
        //     "search"  => ""
        // ));
        // $data = $this->mic->get_http($url,$search);
        // $result = $data['dataset'];
        // $insert =[];
        // foreach ($result as $rs) {
        //     array_push($insert, array(
        //         'rowid' => md5(random_string('alnum',11)),
        //         'kendaraanid' => $rs['kendaraanid'],
        //         'kendaraannama' => $rs['kendaraannama'],
        //         'kendaraannopol' => $rs['kendaraannopol'],
        //         'latitude' => $rs['latitude'],
        //         'longitude' => $rs['longitude'],
        //         'ctddate' => date('Y-m-d H:i:s'),

        //     ));
        // }
        // $this->db->insert_batch('indicar_data_kendaraan', $insert);
        echo $this->mic->dt_kendaraan();

    }
    function detail_kendaraan()
    {
        $kendaraanid = $this->input->post('kendaraanid');
        echo $this->mic->detail_kendaraan($kendaraanid);
    }
    function refresh_pengaduan()
    {
        echo $this->mic->refresh_pengaduan();
    }

    function proses_tambah()
    {
        $rowid = md5(random_string('alnum',11));
        $kendaraanid = '';
        $kendaraannama = $this->input->post('t_nama');
        $kendaraannopol= $this->input->post('t_nopol');
        $latitude= $this->input->post('t_latitude');
        $longitude= $this->input->post('t_longitude');
        echo $this->mic->proses_tambah($rowid,$kendaraanid,$kendaraannama,$kendaraannopol,$latitude,$longitude);
    }

    function proses_edit()
    {
        $kendaraanid = $this->input->post('kendaraanid');
        $kendaraannama = $this->input->post('kendaraannama');
        echo $this->mic->proses_edit($kendaraanid,$kendaraannama);
    }

    function proses_delete()
    {
        $kendaraanid = $this->input->post('kendaraanid');
        echo $this->mic->proses_delete($kendaraanid);
    }
  

}