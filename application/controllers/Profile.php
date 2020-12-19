<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
	}
	
	public function index()
	{
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			$data['session'] = $user;
			$data['pangkat'] = comboopts($this->db->select('pang_id as v,pang_nam as t')->order_by("pang_nam","DESC")->get('pangkat')->result());
			$data['polda'] = comboopts($this->db->select('da_id as v,da_nam as t')->order_by("da_id","DESC")->get('polda')->result());
			$data['unit'] = comboopts($this->db->select('unit_id as v,unit_nam as t')->order_by("unit_id","DESC")->get('unit')->result());
			$data['direktorat'] = comboopts($this->db->select('dit_id as v,dit_nam as t')->get('direktorat')->result());
			$data['bagian'] = comboopts($this->db->select('bag_id as v,bag_nam as t')->get('bagian')->result());
			
			if($user['unit']==''){
				$data['incomplete_profile']=true;
			}
			$this->template->load('profile',$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']=$retval;
			$this->load->view('login',$data);
		}
	}
	
	public function save()
	{
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			$this->db->where('rowid',$this->input->post('rowid'));
			$this->db->update('persons',$_POST);
			if($this->db->affected_rows()>0){
				$msgs="Data updated";
				$this->db->where('rowid',$this->input->post('rowid'));
				$u=$this->db->get("persons")->result_array();
				$this->session->set_userdata('user_data',$u[0]);
			}else{
				$msgs="No update has been made";
			}
			$retval=array('code'=>"200",'ttl'=>"OK",'msgs'=>$msgs);
			echo json_encode($retval);
		}else{
			$retval=array('code'=>"403",'ttl'=>"Session closed",'msgs'=>array());
			echo json_encode($retval);
		}
	}
	public function chgpwd()
	{
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			$msgs="Invalid old password";
			$code="404";
			$where=array('nrp'=>$user['nrp'],'pwd'=>md5($this->input->post('op')));
			$this->db->where($where)->update('accounts',array("pwd"=>md5($this->input->post('np'))));
			if($this->db->affected_rows()>0){
				$msgs="Password changed"; $code="200";
			}
			$retval=array('code'=>$code,'ttl'=>"",'msgs'=>$msgs);
			echo json_encode($retval);
		}else{
			$retval=array('code'=>"403",'ttl'=>"Session closed",'msgs'=>array());
			echo json_encode($retval);
		}
	}
	
	public function get_polres()
	{
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			$id=$this->input->post('id');
			$ret=$this->db->select('res_id as v,res_nam as t')->where(array('polda'=>$id))->get('polres')->result();
			$retval=array('code'=>"200",'ttl'=>"OK",'msgs'=>$ret);
			echo json_encode($retval);
		}else{
			$retval=array('code'=>"403",'ttl'=>"Session closed",'msgs'=>array());
			echo json_encode($retval);
		}
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
	public function get_subbag()
	{
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			$id=$this->input->post('id');
			$ret=$this->db->select('subbag_id as v,subbag_nam as t')->where(array('bagian'=>$id))->get('subbag')->result();
			$retval=array('code'=>"200",'ttl'=>"OK",'msgs'=>$ret);
			echo json_encode($retval);
		}else{
			$retval=array('code'=>"403",'ttl'=>"Session closed",'msgs'=>array());
			echo json_encode($retval);
		}
	}
}