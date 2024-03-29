<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MMDash extends CI_Controller {

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
	private $tname = "v_media";
	
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
			
			$this->db->select("tgl,jam,j,media,jenis");
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
			$this->db->order_by("tgl");
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
			$this->db->order_by("tgljam");
			$data = $this->db->get()->result_array();
		}
		
		echo json_encode($data);
	}
	public function tot(){
		$auth=$this->input->get_request_header('X-token', TRUE);
		$data=array();
		if($auth==$this->token){
			$df=$this->input->post('from');
			$dt=$this->input->post('to');
			$df=trim($df)==''?date('Y-m-d'):$df;
			$dt=trim($dt)==''?date('Y-m-d'):$dt;
			$this->db->select("j,count(j) as cnt");
			$this->db->from($this->tname);
			$this->db->where("tgl >=",$df);
			$this->db->where("tgl <=",$dt);
			$this->db->group_by("j");
			$data = $this->db->get()->result_array();
		}
		
		echo json_encode($data);
	}
	public function publikasi_by_media(){
		$auth=$this->input->get_request_header('X-token', TRUE);
		$data=array();
		if($auth==$this->token){
			$df=$this->input->post('from');
			$dt=$this->input->post('to');
			$df=trim($df)==''?date('Y-m-d'):$df;
			$dt=trim($dt)==''?date('Y-m-d'):$dt;
			$this->db->select("media,count(media) as cnt");
			$this->db->from("tmc_publikasi");
			$this->db->where("tgl >=",$df);
			$this->db->where("tgl <=",$dt);
			$this->db->group_by("media");
			$data = $this->db->get()->result_array();
		}
		
		echo json_encode($data);
	}
	public function publikasi_by_category(){
		$auth=$this->input->get_request_header('X-token', TRUE);
		$data=array();
		if($auth==$this->token){
			$df=$this->input->post('from');
			$dt=$this->input->post('to');
			$df=trim($df)==''?date('Y-m-d'):$df;
			$dt=trim($dt)==''?date('Y-m-d'):$dt;
			$this->db->select("jenis,count(jenis) as cnt");
			$this->db->from("tmc_publikasi");
			$this->db->where("tgl >=",$df);
			$this->db->where("tgl <=",$dt);
			$this->db->group_by("jenis");
			$data = $this->db->get()->result_array();
		}
		
		echo json_encode($data);
	}
	public function interaksi_by_media(){
		$auth=$this->input->get_request_header('X-token', TRUE);
		$data=array();
		if($auth==$this->token){
			$df=$this->input->post('from');
			$dt=$this->input->post('to');
			$df=trim($df)==''?date('Y-m-d'):$df;
			$dt=trim($dt)==''?date('Y-m-d'):$dt;
			$this->db->select("media,count(media) as cnt");
			$this->db->from("tmc_interaksi");
			$this->db->where("tgl >=",$df);
			$this->db->where("tgl <=",$dt);
			$this->db->group_by("media");
			$data = $this->db->get()->result_array();
		}
		
		echo json_encode($data);
	}
	public function interaksi_by_category(){
		$auth=$this->input->get_request_header('X-token', TRUE);
		$data=array();
		if($auth==$this->token){
			$df=$this->input->post('from');
			$dt=$this->input->post('to');
			$df=trim($df)==''?date('Y-m-d'):$df;
			$dt=trim($dt)==''?date('Y-m-d'):$dt;
			$this->db->select("jenis,count(jenis) as cnt");
			$this->db->from("tmc_interaksi");
			$this->db->where("tgl >=",$df);
			$this->db->where("tgl <=",$dt);
			$this->db->group_by("jenis");
			$data = $this->db->get()->result_array();
		}
		
		echo json_encode($data);
	}
}
