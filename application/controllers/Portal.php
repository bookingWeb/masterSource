<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portal extends CI_Controller {

	public function index()
	{
		$data['themes_url'] = base_url() . $this->config->item('theme_portal');
		$this->load->view('portal/home',$data);
	}
}
