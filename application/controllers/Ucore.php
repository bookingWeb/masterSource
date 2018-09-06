<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ucore extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Ucore_model');
	}
	
	public function index()
	{
		$data['themes_url'] = base_url() . $this->config->item('theme_backend');
		$data['e'] = $this->input->get('e',TRUE);
		$this->load->view('backend/ucore_signin',$data);
	}

	// public function signin()
	// {
	// 	$data['themes_url'] = base_url() . $this->config->item('theme_backend');
	// 	$data['e'] = $this->input->get('e',TRUE);
	// 	$this->load->view('backend/ucore_signin',$data);
	// }
	
	public function anti_sql_injection($string)
	{
		$string = strip_tags(trim(addslashes(htmlspecialchars(stripslashes($string)))));
		var_dump($string);die;
		return $string;
	}
	
	public function submit()
	{

		$data['themes_url'] = base_url() . $this->config->item('theme_backend');
		
		$tombol = $this->input->post("tombol",true);
		if ($tombol!="") {
			$uname 	= 	$this->input->post('uname',TRUE); 
			$upass 	= 	$this->input->post('password',TRUE);
			
			if (($uname!="") && ($upass!="")) {
				$mpasswd = hash('sha256', $upass);
				$data_login = $this->Ucore_model->get_login($uname,$mpasswd);
				
				if (sizeof($data_login)>0) {
					
					$id = $data_login[0]["id"];
					$nama = $data_login[0]["nama_lengkap"];
					$email = $data_login[0]["email"];
					$telepon = $data_login[0]["telepon"];
					$foto = $data_login[0]["foto"];
					$agent_id = $data_login[0]["agent_id"];
					$nama_agent = $data_login[0]["nama_agent"];
					$nama_perusahaan = $data_login[0]["nama_perusahaan"];
					$logo = $data_login[0]["logo"];
					$agent_level = $data_login[0]["agent_level"];
					$agent_status = $data_login[0]["status_agent"];
					$user_status = $data_login[0]["user_status"];
					
					if ($agent_status==1) {
						$sessdata = array(
							'id' => $id,
							'nama' => $nama,
							'email' => $email,
							'telepon' => $telepon,
							'foto' => $foto,
							'agent_id' => $agent_id,
							'nama_agent' => $nama_agent,
							'nama_perusahaan' => $nama_perusahaan,
							'logo' => $logo,
							'user_status' => $user_status,
							'agent_status' => $agent_status,
							'agent_level' => $agent_level
						);
						$this->session->set_userdata($sessdata);
						redirect(site_url("home"));						
					} else {
						redirect(site_url("ucore/signin?e=3"));
					}
				} else {
					redirect(site_url("ucore/signin?e=2"));
				}
			} else {
				redirect(site_url("ucore/signin?e=1"));
			}
		}
	}
	
	public function logout() 
	{
		$this->session->sess_destroy();
		redirect(site_url("ucore"));
	}
}
