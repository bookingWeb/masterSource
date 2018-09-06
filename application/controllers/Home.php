<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ucore_model');
    }
	
	public function index()
	{
		$this->general->session_check();
		$data['user_id']	= $this->user_id;
		$data['user_nama']	= $this->user_nama;
		$data['user_agentid']	= $this->user_agentid;
		$data['user_namaagent']	= $this->user_namaagent;
		$data['user_namaperusahaan']	= $this->user_namaperusahaan;
		$data['user_logo']	= $this->user_logo;
		$data['menu'] 		= "home";
		$data['submenu']	= ""; 
		
		$url1 = "http://free.currencyconverterapi.com/api/v5/convert?q=USD_IDR&compact=y";
		$data['kurs_usdidr'] = $this->curl($url1);
		$url2 = "http://free.currencyconverterapi.com/api/v5/convert?q=SAR_IDR&compact=y";
		$data['kurs_saridr'] = $this->curl($url2);
		
		$tahun = date("Y");
		$data['tahun'] = $tahun;
		$data['themes_url'] = base_url() . $this->config->item('theme_backend');
		$data['data_jamaah'] = $this->Ucore_model->get_jmljamaah_tahun($this->user_agentid,$tahun);
		$data['data_jadwal'] = $this->Ucore_model->get_jadwal_tahun($this->user_agentid,$tahun);
		
		$this->load->view('backend/ucore_siteheader',$data);
		$this->load->view('backend/ucore_sitemenu',$data);
		$this->load->view('backend/ucore_sitesubheader',$data);
		$this->load->view('backend/ucore_home',$data);
		$this->load->view('backend/ucore_sitefooter',$data);
	} 
	
  public function curl($url) {
    $ch = curl_init();  
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_REFERER,'portal-swamedia');
    $output=curl_exec($ch);
    curl_close($ch);
    return $output;
  }	
}
