<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	
	public function __construct()
	{
        parent::__construct();
        $this->load->model('MLaporan','ml');
		// Your own constructor code
	}
	
	public function index()
	{
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			$data['session'] = $user;
			$data['direktorat'] = comboopts($this->db->select('dit_id as v,dit_nam as t')->get('direktorat')->result());
			
			$this->template->load('laporan',$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']=$retval;
			$this->load->view('login',$data);
		}
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
    

	
	public function get_subdit()
	{
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			$id=$this->input->post('id');
			$ret=$this->db->select('sub_id as v,sub_nam as t')->where(array('direktorat'=>$id))->get('subdit')->result();
			$retval=array('code'=>"200",'ttl'=>"OK",'msgs'=>$ret);
			echo json_encode($retval);
		}else{
			$retval=array('code'=>"403",'ttl'=>"Session closed",'msgs'=>array());
			echo json_encode($retval);
		}
	}
	
	public function get_sie()
	{
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			$id=$this->input->post('id');
			$ret=$this->db->select('si_id as v,si_nam as t')->where(array('subdit'=>$id))->get('sie')->result();
			$retval=array('code'=>"200",'ttl'=>"OK",'msgs'=>$ret);
			echo json_encode($retval);
		}else{
			$retval=array('code'=>"403",'ttl'=>"Session closed",'msgs'=>array());
			echo json_encode($retval);
		}
	}
	
	public function get_form()
	{
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			$d=$this->input->post('direktorat');
			if($d!='')$where['direktorat']=$d;
			$d=$this->input->post('sie');
			if($d!='')$where['sie']=$d;
			$d=$this->input->post('subdit');
			if($d!='')$where['subdit']=$d;
			$ret=$this->db->select('view_laporan as v,nama_laporan as t')->where($where)->get('formulir')->result();
			$retval=array('code'=>"200",'ttl'=>"OK",'msgs'=>$ret);
			echo json_encode($retval);
		}else{
			$retval=array('code'=>"403",'ttl'=>"Session closed",'msgs'=>array());
			echo json_encode($retval);
		}
	}
	public function get_content()
	{
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			$id=$this->input->post('id');
			$data['dummy']="this is dummy data";
			//$retval=
			$this->load->view("formulir/$id",$data);
			//echo $retval;
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']=$retval;
			$this->load->view('login',$data);
		}
	}
	
}
