<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General {

	public function session_check()
	{
		$CI =& get_instance();
		$CI->user_id		= $CI->session->userdata('id');
		$CI->user_nama		= $CI->session->userdata('nama');
		$CI->user_email		= $CI->session->userdata('email');
		$CI->user_telepon	= $CI->session->userdata('telepon');
		$CI->user_tgllahir	= $CI->session->userdata('tgllahir');
		$CI->user_foto		= $CI->session->userdata('foto');
		$CI->user_agentid	= $CI->session->userdata('agent_id');
		$CI->user_namaagent	= $CI->session->userdata('nama_agent');
		$CI->user_namaperusahaan	= $CI->session->userdata('nama_perusahaan');
		$CI->user_logo		= $CI->session->userdata('logo');
		$CI->user_status	= $CI->session->userdata('user_status');
		$CI->user_level		= $CI->session->userdata('agent_level'); 
		
		if ($CI->user_id=="") {
			redirect(site_url("ucore/logout")); 
		}

	}
		
}