<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_Inventory extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('inventory_model');
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
		$this->load->view('backend/master/inventory',$data);
		$this->load->view('backend/Layouts/Footer',$data);
	}

	public function GetDataInventory(){
		$dataRestoran = $this->inventory_model->get_inventory();
		$data['inventory'] = $dataRestoran;
		if(count($dataRestoran) > 0){
			$data['limit'] = 10;
			$data['msg'] = 'success';
		}else {
			$data['msg'] = 'failed';
		}

		echo json_encode($data);
	}

	public function getSingleDataInventory(){
		$input = $this->input->post();
		$dataRestoran = $this->inventory_model->get_single_inventory($input['valIdInventory']);
		if(count($dataRestoran) > 0){
			$data['inventory'] = $dataRestoran[0];
			$data['msg'] = 'success';
		}else {
			$data['msg'] = 'failed';
		}

		echo json_encode($data);
	}

	public function SimpanDataInventory(){
		$input = $this->input->post();
		$data['msg'] = $this->inventory_model->insertInventory($input['valNamaInventory'],$input['valKategori'],$input['valJenis'],$input['valSatuan']);
		echo json_encode($data);
	}

	public function simpanEditData(){
		$input = $this->input->post();
		$data['msg'] = $this->inventory_model->updateInventory($input['valIdInventory'],$input['valNamaInventory'],$input['valKategori'],$input['valJenis'],$input['valSatuan']);
		echo json_encode($data);
	}

	public function deleteData(){
		$input = $this->input->post();
		$data['msg'] = $this->inventory_model->deleteInventory($input['valIdInventory']);
		echo json_encode($data);
	}
}