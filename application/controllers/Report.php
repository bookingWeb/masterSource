<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ucore_model');
    }

    public function index()
    {
        $this->general->session_check();
        $data['user_nama'] = $this->user_nama;
        $data['user_namaagent'] = $this->user_namaagent;
        $data['user_namaperusahaan'] = $this->user_namaperusahaan;
        $data['user_logo'] = $this->user_logo;
        $data['menu'] = "report";
        $data['submenu'] = "";

        $data['themes_url'] = base_url() . $this->config->item('theme_backend');

        $this->load->view('backend/ucore_siteheader', $data);
        $this->load->view('backend/ucore_sitemenu', $data);
        $this->load->view('backend/ucore_sitesubheader', $data);
        $this->load->view('backend/ucore_report', $data);
        $this->load->view('backend/ucore_sitefooter', $data);
    }

    public function pembayaran()
    {
        $this->general->session_check();
        $data['user_nama'] = $this->user_nama;
        $data['user_namaagent'] = $this->user_namaagent;
        $data['user_namaperusahaan'] = $this->user_namaperusahaan;
        $data['user_logo'] = $this->user_logo;
        $data['menu'] = "report";
        $data['submenu'] = "pembayaran";

        $data['themes_url'] = base_url() . $this->config->item('theme_backend');

        $this->load->view('backend/ucore_siteheader', $data);
        $this->load->view('backend/ucore_sitemenu', $data);
        $this->load->view('backend/ucore_sitesubheader', $data);
        $this->load->view('backend/ucore_report', $data);
        $this->load->view('backend/ucore_sitefooter', $data);
    }
}
