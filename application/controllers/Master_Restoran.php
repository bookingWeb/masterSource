<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_Restoran extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('restoran_model');
	}
	
	public function index() {
		$this->general->session_check();
		$data['user_id']			= $this->user_id;
		$data['user_nama']			= $this->user_nama;
		$data['user_agentid']		= $this->user_agentid;
		$data['user_namaagent']		= $this->user_namaagent;
		$data['user_logo']			= $this->user_logo;
		$agentid					= $this->session->userdata('agent_id');
		
		$data['themes_url']			= base_url() . $this->config->item('theme_backend');
		$data['site_form'] 			= "list";

		$this->load->view('backend/Layouts/Header',$data);
		$this->load->view('backend/Layouts/SiteMenu',$data);
		$this->load->view('backend/Layouts/SubHeader',$data);
		$this->load->view('backend/master/restoran',$data);
		$this->load->view('backend/Layouts/Footer',$data);
	}

	public function GetDataRestoran(){
		$dataRestoran = $this->restoran_model->get_restoran();
		$data['restoran'] = $dataRestoran;
		if(count($dataRestoran) > 0){
			$data['limit'] = 10;
			$data['msg'] = 'success';
		}else {
			$data['msg'] = 'failed';
		}

		echo json_encode($data);
	}

	public function getSingleDataRestoran(){
		$input = $this->input->post();
		$dataRestoran = $this->restoran_model->get_single_restoran($input['valIdMenu']);
		if(count($dataRestoran) > 0){
			$data['restoran'] = $dataRestoran[0];
			$data['msg'] = 'success';
		}else {
			$data['msg'] = 'failed';
		}

		echo json_encode($data);
	}

	public function SimpanDataRestoran(){
		$input = $this->input->post();
		$data['msg'] = $this->restoran_model->insertRestoran($input['valNamaMenu'],$input['valKategori'],$input['valSatuan'],$input['valHarga']);
		echo json_encode($data);
	}

	public function simpanEditData(){
		$input = $this->input->post();
		$data['msg'] = $this->restoran_model->updateRestoran($input['valIdMenu'],$input['valNamaMenu'],$input['valKategori'],$input['valSatuan'],$input['valHarga']);
		echo json_encode($data);
	}

	public function deleteData(){
		$input = $this->input->post();
		$data['msg'] = $this->restoran_model->deleteRestoran($input['valIdMenu']);
		echo json_encode($data);
	}
}