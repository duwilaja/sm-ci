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
			$data['jumlah'] = comboopts($this->db->select('id as v, status as t')->where("status",0)->get('patwal_permohonan')->result());
			$data['dasargiat'] = comboopts($this->db->select('dg_id as v,dg_nam as t')->get('dasargiat')->result());
			$data['formulir'] = comboopts($this->db->select('view_laporan as v,nama_laporan as t')->where("unit",$user['unit'])->or_where("unit",$user["subdinas"])->get('formulir')->result());
			$data['title'] = "Formulir";
			
			$this->template->load('laporan',$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']=$retval;
			$data['rahasia'] = mt_rand(100000,999999);
			$arr = [
			'name'   => 'rahasia',
			'value'  => $data['rahasia'],                            
			'expire' => '3000',                                                                                   
			'secure' => TRUE
			];

			set_cookie($arr);
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
			$data['session'] = $user;
			$id=$this->input->post('id');//this is the view
			
			//put all masterdatas needed here
			$data['dummy']="this is dummy data";
			
			if($id=='tmc_info_lalin' || $id=='ais_laka'){  //tmc info lalin
				$data['penyebab'] = comboopts($this->db->select('sebab as v,sebab as t')->get('penyebab_macet')->result());
			}
			if($id=='eri_kendaraan'||$id=='ais_laka'){  //eri kendaraan
				$data['polda'] = comboopts($this->db->select('da_id as v,da_nam as t')->get('polda')->result());
			}
			if($id=='intan_analytic'){
				if($user["polda"]!=""){ $this->db->where("polda",$user["polda"]); }
				if($user["polres"]!=""){ $this->db->where("polres",$user["polres"]); }
				$data['ambulance']=$this->db->select("nama,lat,lng")->where("yan","Ambulance")->get('ssc_yan_darurat')->result();
				$data['faskes']=$this->db->select("nama,lat,lng")->where("yan","Faskes")->get('ssc_yan_publik')->result();
				$data['pospol']=$this->db->select("nama,lat,lng")->where("pos","Pos Polisi")->get('ssc_jalan')->result();
				$data['pospjr']=$this->db->select("nama,lat,lng")->where("pos","Pos PJR")->get('ssc_jalan')->result();
				$data['koordinasi']=$this->db->select("giat,lat,lng")->get('tmc_koordinasi')->result();
			}
			if($id=='tar_data'){
				$data['pelanggaran']=array(
				"Kamtibmas"=>"Kamtibmas",
				"Lampu Utama"=>"Lampu Utama",
				"Jalur/lajur lalu lintas"=>"Jalur/lajur lalu lintas",
				"Belokan/simpangan"=>"Belokan/simpangan",
				"Kecepatan"=>"Kecepatan",
				"Berhenti"=>"Berhenti",
				"Parkir"=>"Parkir",
				"Kendaraan Tidak Bermotor"=>"Kendaraan Tidak Bermotor");
			}
			
			$this->load->view("formulir/$id",$data); //load the view
			
		}else{
			echo "<script>alrt('Session Closed, please login','error','Error');</script>";
		}
	}
	
	public function save()
	{
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			$msgs="No data has been saved";
			$tname=$this->input->post('tablename');
			$fname=$this->input->post('fieldnames');
			$data=$this->input->post(explode(",",$fname));
			$this->db->insert($tname,$data);
			$ret=$this->db->affected_rows();
			if($ret>0){
				$msgs="$ret record(s) saved";
			}
			$retval=array('code'=>"200",'ttl'=>"OK",'msgs'=>$msgs);
			echo json_encode($retval);
		}else{
			$retval=array('code'=>"403",'ttl'=>"Session closed",'msgs'=>array());
			echo json_encode($retval);
		}
	}
	
	public function get_subq()
	{
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			$id=$this->input->post('id');
			$cols=$this->input->post('cols');
			$tname=$this->input->post('tname');
			$where=$this->input->post('where');
			$ret=$this->db->select($cols)->where(array($where=>$id))->get($tname)->result();
			$retval=array('code'=>"200",'ttl'=>"OK",'msgs'=>$ret);
			echo json_encode($retval);
		}else{
			$retval=array('code'=>"403",'ttl'=>"Session closed",'msgs'=>array());
			echo json_encode($retval);
		}
	}
}
