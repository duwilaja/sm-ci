<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DCDash extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	private $token = "bb96f81f2ffdf59bd15a97d5bf5aca9541d4e5c36f10464202b4049dd40540d0";
	private $tname = "v_datacoll";
	
	public function index()
	{
	
	}
	
	public function datatable_all()
	{
		$auth=$this->input->get_request_header('X-token', TRUE);
		$data=array();
		if($auth==$this->token){
			$df=$this->input->post('from');
			$dt=$this->input->post('to');
			$df=trim($df)==''?date('Y-m-d'):$df;
			$dt=trim($dt)==''?date('Y-m-d'):$dt;
			
			//$s=$this->input->post('search');
			//$ss=isset($s['value'])?$s['value']:'';
			
			$this->db->select("tgl,jam,j,k,l");
			$this->db->from($this->tname);
			$this->db->where("tgl >=",$df);
			$this->db->where("tgl <=",$dt);
			
			//$total=$this->db->count_all_results($this->tname,FALSE);
			
			//if($ss!=''){
			//	$this->db->group_start()->like("j",$ss)->or_like("")->group_end();
			//}
			//$this->db->order_by($acol[$this->input->post('order')[0]['column']], $this->input->post('order')[0]['dir']);
			//$this->db->limit($this->input->post('length'),$this->input->post('start'));
			
			$data_assoc=$this->db->get()->result_array();
			
			for($i=0;$i<count($data_assoc);$i++){
				$data[] = array_values($data_assoc[$i]);
			}
		}
		$output = array(
                        "draw" => 0, //$this->input->post('draw'),
                        "recordsTotal" => count($data),
                        "recordsFiltered" => count($data),
                        "data" => $data
                );
        //output to json format
        echo json_encode($output);
	}
	
	public function by_date(){
		$auth=$this->input->get_request_header('X-token', TRUE);
		$data=array();
		if($auth==$this->token){
			$df=$this->input->post('from');
			$dt=$this->input->post('to');
			$df=trim($df)==''?date('Y-m-d'):$df;
			$dt=trim($dt)==''?date('Y-m-d'):$dt;
			$this->db->select("tgl,count(tgl) as cnt");
			$this->db->from($this->tname);
			$this->db->where("tgl >=",$df);
			$this->db->where("tgl <=",$dt);
			$this->db->group_by("tgl");
			$data = $this->db->get()->result_array();
		}
		
		echo json_encode($data);
	}
	
	public function by_datetime(){
		$auth=$this->input->get_request_header('X-token', TRUE);
		$data=array();
		if($auth==$this->token){
			$df=$this->input->post('from');
			$dt=$this->input->post('to');
			$df=trim($df)==''?date('Y-m-d'):$df;
			$dt=trim($dt)==''?date('Y-m-d'):$dt;
			$this->db->select("concat(tgl,' ',time_format(jam,'%H:00:00')) as tgljam,count(*) as cnt");
			$this->db->from($this->tname);
			$this->db->where("tgl >=",$df);
			$this->db->where("tgl <=",$dt);
			$this->db->group_by("tgljam");
			$data = $this->db->get()->result_array();
		}
		
		echo json_encode($data);
	}
	
	
	public function status_jalan(){
		$auth=$this->input->get_request_header('X-token', TRUE);
		$data=array();
		if($auth==$this->token){
			$df=$this->input->post('from');
			$dt=$this->input->post('to');
			$df=trim($df)==''?date('Y-m-d'):$df;
			$dt=trim($dt)==''?date('Y-m-d'):$dt;
			$this->db->select("jenis,status,count(*) as cnt");
			$this->db->from("tmc_data_statusjalan");
			$this->db->where("tgl >=",$df);
			$this->db->where("tgl <=",$dt);
			$this->db->group_by("jenis,status");
			$data = $this->db->get()->result_array();
		}
		
		echo json_encode($data);
	}
	
	public function wilayah_rawan(){
		$auth=$this->input->get_request_header('X-token', TRUE);
		$data=array();
		if($auth==$this->token){
			$df=$this->input->post('from');
			$dt=$this->input->post('to');
			$df=trim($df)==''?date('Y-m-d'):$df;
			$dt=trim($dt)==''?date('Y-m-d'):$dt;
			$this->db->select("jenis,status,count(*) as cnt");
			$this->db->from("tmc_data_rawan");
			$this->db->where("tgl >=",$df);
			$this->db->where("tgl <=",$dt);
			$this->db->group_by("jenis,status");
			$data = $this->db->get()->result_array();
		}
		
		echo json_encode($data);
	}
	public function pengemudi(){
		$auth=$this->input->get_request_header('X-token', TRUE);
		$data=array();
		if($auth==$this->token){
			$df=$this->input->post('from');
			$dt=$this->input->post('to');
			$df=trim($df)==''?date('Y-m-d'):$df;
			$dt=trim($dt)==''?date('Y-m-d'):$dt;
			$this->db->select("jenis,sum(jumlah) as jml");
			$this->db->from("tmc_data_pengemudi");
			$this->db->where("tgl >=",$df);
			$this->db->where("tgl <=",$dt);
			$this->db->group_by("jenis");
			$data = $this->db->get()->result_array();
		}
		
		echo json_encode($data);
	}
	public function kendaraan(){
		$auth=$this->input->get_request_header('X-token', TRUE);
		$data=array();
		if($auth==$this->token){
			$df=$this->input->post('from');
			$dt=$this->input->post('to');
			$df=trim($df)==''?date('Y-m-d'):$df;
			$dt=trim($dt)==''?date('Y-m-d'):$dt;
			$this->db->select("jenis,sum(jumlah) as jml");
			$this->db->from("tmc_data_kendaraan");
			$this->db->where("tgl >=",$df);
			$this->db->where("tgl <=",$dt);
			$this->db->group_by("jenis");
			$data = $this->db->get()->result_array();
		}
		
		echo json_encode($data);
	}
	public function fas_darurat(){
		$auth=$this->input->get_request_header('X-token', TRUE);
		$data=array();
		if($auth==$this->token){
			$df=$this->input->post('from');
			$dt=$this->input->post('to');
			$df=trim($df)==''?date('Y-m-d'):$df;
			$dt=trim($dt)==''?date('Y-m-d'):$dt;
			$this->db->select("jenis,count(jenis) as cnt");
			$this->db->from("tmc_data_darurat");
			$this->db->where("tgl >=",$df);
			$this->db->where("tgl <=",$dt);
			$this->db->group_by("jenis");
			$data = $this->db->get()->result_array();
		}
		
		echo json_encode($data);
	}
	public function jalan(){
		$auth=$this->input->get_request_header('X-token', TRUE);
		$data=array();
		if($auth==$this->token){
			$df=$this->input->post('from');
			$dt=$this->input->post('to');
			$df=trim($df)==''?date('Y-m-d'):$df;
			$dt=trim($dt)==''?date('Y-m-d'):$dt;
			$this->db->select("jenis,sum(panjang) as panjang");
			$this->db->from("tmc_data_jalan");
			$this->db->where("tgl >=",$df);
			$this->db->where("tgl <=",$dt);
			$this->db->group_by("jenis");
			$data = $this->db->get()->result_array();
		}
		
		echo json_encode($data);
	}
	
	public function fas_public(){
		$auth=$this->input->get_request_header('X-token', TRUE);
		$data=array();
		if($auth==$this->token){
			$df=$this->input->post('from');
			$dt=$this->input->post('to');
			$df=trim($df)==''?date('Y-m-d'):$df;
			$dt=trim($dt)==''?date('Y-m-d'):$dt;
			$this->db->select("fasilitas,count(fasilitas) as cnt");
			$this->db->from("tmc_data_fas_public");
			$this->db->where("tgl >=",$df);
			$this->db->where("tgl <=",$dt);
			$this->db->group_by("fasilitas");
			$data = $this->db->get()->result_array();
		}
		echo json_encode($data);
	}
	public function gangguan(){
		$auth=$this->input->get_request_header('X-token', TRUE);
		$data=array();
		if($auth==$this->token){
			$df=$this->input->post('from');
			$dt=$this->input->post('to');
			$df=trim($df)==''?date('Y-m-d'):$df;
			$dt=trim($dt)==''?date('Y-m-d'):$dt;
			$this->db->select("status,count(status) as cnt");
			$this->db->from("tmc_data_gangguan");
			$this->db->where("tgl >=",$df);
			$this->db->where("tgl <=",$dt);
			$this->db->group_by("status");
			$data = $this->db->get()->result_array();
		}
		echo json_encode($data);
	}
	
	//rengiat publik
	public function perbaikan(){ //perbaikan
		$auth=$this->input->get_request_header('X-token', TRUE);
		$data=array();
		if($auth==$this->token){
			$df=$this->input->post('from');
			$dt=$this->input->post('to');
			$df=trim($df)==''?date('Y-m-d'):$df;
			$dt=trim($dt)==''?date('Y-m-d'):$dt;
			$this->db->select("giat,if(tglsampai<date(now()),'Selesai','On Schedule') as stt,count(giat) as cnt");
			$this->db->from("tmc_data_giatpublik");
			$this->db->group_start()->where("tgldari >=",$df)->where("tgldari <=",$dt)->like("giat",'perbaikan')->group_end();
			$this->db->or_group_start()->where("tglsampai >=",$df)->where("tglsampai <=",$dt)->like("giat",'perbaikan')->group_end();
			$this->db->group_by("giat,stt");
			$data = $this->db->get()->result_array();
		}
		echo json_encode($data);
	}
	public function rutin(){ //rutin
		$auth=$this->input->get_request_header('X-token', TRUE);
		$data=array();
		if($auth==$this->token){
			$df=$this->input->post('from');
			$dt=$this->input->post('to');
			$df=trim($df)==''?date('Y-m-d'):$df;
			$dt=trim($dt)==''?date('Y-m-d'):$dt;
			$this->db->select("giat,if(tglsampai<date(now()),'Selesai','On Schedule') as stt,count(giat) as cnt");
			$this->db->from("tmc_data_giatpublik");
			$this->db->group_start()->where("tgldari >=",$df)->where("tgldari <=",$dt)->where_in("giat",array('Sispam Kota','SIMLing','SAMLing'))->group_end();
			$this->db->or_group_start()->where("tglsampai >=",$df)->where("tglsampai <=",$dt)->where_in("giat",array('Sispam Kota','SIMLing','SAMLing'))->group_end();
			$this->db->group_by("giat,stt");
			$data = $this->db->get()->result_array();
		}
		echo json_encode($data);
	}
	public function non_rutin(){ //rutin
		$auth=$this->input->get_request_header('X-token', TRUE);
		$data=array();
		if($auth==$this->token){
			$df=$this->input->post('from');
			$dt=$this->input->post('to');
			$df=trim($df)==''?date('Y-m-d'):$df;
			$dt=trim($dt)==''?date('Y-m-d'):$dt;
			$this->db->select("giat,if(tglsampai<date(now()),'Selesai','On Schedule') as stt,count(giat) as cnt");
			$this->db->from("tmc_data_giatpublik");
			$this->db->group_start()->where("tgldari >=",$df)->where("tgldari <=",$dt)->where_not_in("giat",array('Sispam Kota','SIMLing','SAMLing'))->not_like("giat",'perbaikan')->group_end();
			$this->db->or_group_start()->where("tglsampai >=",$df)->where("tglsampai <=",$dt)->where_not_in("giat",array('Sispam Kota','SIMLing','SAMLing'))->not_like("giat",'perbaikan')->group_end();
			$this->db->group_by("giat,stt");
			$data = $this->db->get()->result_array();
		}
		echo json_encode($data);
	}
	
	//giat umum pol
	public function pengawalan(){ //pengawalan
		$auth=$this->input->get_request_header('X-token', TRUE);
		$data=array();
		if($auth==$this->token){
			$df=$this->input->post('from');
			$dt=$this->input->post('to');
			$df=trim($df)==''?date('Y-m-d'):$df;
			$dt=trim($dt)==''?date('Y-m-d'):$dt;
			$this->db->select("jenis,if(tglsampai<date(now()),'Selesai','On Schedule') as stt,count(jenis) as cnt");
			$this->db->from("tmc_rengiat");
			$this->db->group_start()->where("tgldari >=",$df)->where("tgldari <=",$dt)->like("jenis",'pengawalan')->group_end();
			$this->db->or_group_start()->where("tglsampai >=",$df)->where("tglsampai <=",$dt)->like("jenis",'pengawalan')->group_end();
			$this->db->group_by("jenis,stt");
			$data = $this->db->get()->result_array();
		}
		echo json_encode($data);
	}
	public function operasi(){ //operasi
		$auth=$this->input->get_request_header('X-token', TRUE);
		$data=array();
		if($auth==$this->token){
			$df=$this->input->post('from');
			$dt=$this->input->post('to');
			$df=trim($df)==''?date('Y-m-d'):$df;
			$dt=trim($dt)==''?date('Y-m-d'):$dt;
			$this->db->select("jenis,if(tglsampai<date(now()),'Selesai','On Schedule') as stt,count(jenis) as cnt");
			$this->db->from("tmc_rengiat");
			$this->db->group_start()->where("tgldari >=",$df)->where("tgldari <=",$dt)->like("jenis",'operasi')->group_end();
			$this->db->or_group_start()->where("tglsampai >=",$df)->where("tglsampai <=",$dt)->like("jenis",'operasi')->group_end();
			$this->db->group_by("jenis,stt");
			$data = $this->db->get()->result_array();
		}
		echo json_encode($data);
	}
	public function roadsavety(){ //PAM Road Savety
		$auth=$this->input->get_request_header('X-token', TRUE);
		$data=array();
		if($auth==$this->token){
			$df=$this->input->post('from');
			$dt=$this->input->post('to');
			$df=trim($df)==''?date('Y-m-d'):$df;
			$dt=trim($dt)==''?date('Y-m-d'):$dt;
			$this->db->select("sasaran,if(tglsampai<date(now()),'Selesai','On Schedule') as stt,count(jenis) as cnt");
			$this->db->from("tmc_rengiat");
			$this->db->group_start()->where("tgldari >=",$df)->where("tgldari <=",$dt)->where("jenis",'PAM Road Savety')->group_end();
			$this->db->or_group_start()->where("tglsampai >=",$df)->where("tglsampai <=",$dt)->where("jenis",'PAM Road Savety')->group_end();
			$this->db->group_by("sasaran,stt");
			$data = $this->db->get()->result_array();
		}
		echo json_encode($data);
	}
	public function rekayasa_lalin(){ //PAM Road Savety
		$auth=$this->input->get_request_header('X-token', TRUE);
		$data=array();
		if($auth==$this->token){
			$df=$this->input->post('from');
			$dt=$this->input->post('to');
			$df=trim($df)==''?date('Y-m-d'):$df;
			$dt=trim($dt)==''?date('Y-m-d'):$dt;
			$this->db->select("sasaran,if(tglsampai<date(now()),'Selesai','On Schedule') as stt,count(jenis) as cnt");
			$this->db->from("tmc_rengiat");
			$this->db->group_start()->where("tgldari >=",$df)->where("tgldari <=",$dt)->where("jenis",'Rekayasa Lalin')->group_end();
			$this->db->or_group_start()->where("tglsampai >=",$df)->where("tglsampai <=",$dt)->where("jenis",'Rekayasa Lalin')->group_end();
			$this->db->group_by("sasaran,stt");
			$data = $this->db->get()->result_array();
		}
		echo json_encode($data);
	}
	
}
