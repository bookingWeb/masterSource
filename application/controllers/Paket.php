<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ucore_model');
    }
	
	public function index()
	{
		redirect(site_url("home"));
	}
	
	public function haji($page="",$aksi="",$itemid="") {
		$this->general->session_check();
		$data['user_id']	= $this->user_id;
		$data['user_nama']	= $this->user_nama;
		$data['user_agentid']	= $this->user_agentid;
		$data['user_namaagent']	= $this->user_namaagent;
		$data['user_namaperusahaan']	= $this->user_namaperusahaan;
		$data['user_logo']	= $this->user_logo;
		$data['menu'] 		= "paket";
		$data['submenu']	= "haji";
		
		$data['themes_url'] = base_url() . $this->config->item('theme_backend');

		$pesan = "";
		$kategori = "1";
		$tipe_paket = "Haji";
		$slug_paket = "haji";
		
		$tombol = $this->input->post("tombol",true);
		if ($tombol!="") {
			$nama = $this->input->post("nama",true);
			$deskripsi = $this->input->post("deskripsi",true);
			$durasi = $this->input->post("durasi",true);
			$pembimbing = $this->input->post("pembimbing",true);
			
			$slugname = $nama;
			
			if ($page=="tambah") { $this->Ucore_model->product_insert($this->user_agentid,$kategori,$nama,$slugname,$deskripsi,$durasi,$pembimbing); }
			if ($page=="ubah") { $this->Ucore_model->product_update($aksi,$this->user_agentid,$nama,$slugname,$deskripsi,$durasi,$pembimbing); }
			if ($page=="hapus") { $this->Ucore_model->product_delete($aksi,$this->user_agentid); }
			
			$page = "";
		}
		
		if ($page != "") {
			if (($page=="tambah") || ($page=="ubah") || ($page=="hapus")) {
				$data_paket = array();
				if ($page!="tambah") {
					$data_paket = $this->Ucore_model->get_pakettravel_detail($aksi,$this->user_agentid);
					if (sizeof($data_paket)==0) { redirect("paket/".$slug_paket); }
				}
				$data['site_form'] 	= "form_paket";
				$data['data_paket'] = $data_paket;
				$data['data_pembimbing'] = $this->Ucore_model->get_pembimbing();
			} else if (($page=="jtambah") || ($page=="jubah") || ($page=="jhapus")) {
				if ($aksi=="") { redirect("paket/".$slug_paket); } 
				$data_paket = $this->Ucore_model->get_pakettravel_detail($aksi,$this->user_agentid);
				if (sizeof($data_paket)==0) { redirect("paket/".$slug_paket); }

				$data_jadwal = array();
				if ($page!="jtambah") {
					$data_jadwal = $this->Ucore_model->get_jadwal_pakettravel_detail($itemid,$this->user_agentid);
					if (sizeof($data_paket)==0) { redirect("paket/".$slug_paket."/".$aksi); }
				}
				
				$data['data_paket'] = $data_paket;
				$data['data_jadwal'] = $data_jadwal;
				$data['site_form'] 	= "form_jadwal"; 
			} else {
				$data_paket = $this->Ucore_model->get_pakettravel_detail($page,$this->user_agentid);
				if (sizeof($data_paket)==0) { redirect("paket/".$slug_paket); }
				$data['site_form'] 	= "detail_paket"; 
				$data['data_paket'] = $data_paket;
				$data['data_jadwal'] = $this->Ucore_model->get_jadwal_pakettravel($page,$this->user_agentid);
			}
		} else {
			$data['site_form'] 	= "list";
			$data['data_paket'] = $this->Ucore_model->get_pakettravel($this->user_agentid,$kategori);
		}
		$data['pesan'] 		= $pesan;
		$data['tipe_paket'] = $tipe_paket;
		$data['slug_paket'] = $slug_paket;
		$data['page'] 		= $page;
		$data['aksi'] 		= $aksi;
		$data['itemid'] 	= $itemid;
		
		$this->load->view('backend/ucore_siteheader',$data);
		$this->load->view('backend/ucore_sitemenu',$data);
		$this->load->view('backend/ucore_sitesubheader',$data);
		$this->load->view('backend/ucore_paket',$data);
		$this->load->view('backend/ucore_sitefooter',$data);		
	}

	public function umroh($page="",$aksi="",$itemid="") {
		$this->general->session_check();
		$data['user_id']	= $this->user_id;
		$data['user_nama']	= $this->user_nama;
		$data['user_agentid']	= $this->user_agentid;
		$data['user_namaagent']	= $this->user_namaagent;
		$data['user_namaperusahaan']	= $this->user_namaperusahaan;
		$data['user_logo']	= $this->user_logo;
		$data['menu'] 		= "paket";
		$data['submenu']	= "umroh";
		
		$data['themes_url'] = base_url() . $this->config->item('theme_backend');

		$pesan = "";
		$kategori = "2";
		$tipe_paket = "Umroh";
		$slug_paket = "umroh";
		
		$tombol = $this->input->post("tombol",true);
		if ($tombol!="") {
			$nama = $this->input->post("nama",true);
			$deskripsi = $this->input->post("deskripsi",true);
			$durasi = $this->input->post("durasi",true);
			$pembimbing = $this->input->post("pembimbing",true);
			
			$slugname = $nama;
			
			if ($page=="tambah") { $this->Ucore_model->product_insert($this->user_agentid,$kategori,$nama,$slugname,$deskripsi,$durasi,$pembimbing); }
			if ($page=="ubah") { $this->Ucore_model->product_update($aksi,$this->user_agentid,$nama,$slugname,$deskripsi,$durasi,$pembimbing); }
			if ($page=="hapus") { $this->Ucore_model->product_delete($aksi,$this->user_agentid); }
			
			$page = "";
		}
		
		if ($page != "") {
			if (($page=="tambah") || ($page=="ubah") || ($page=="hapus")) {
				$data_paket = array();
				if ($page!="tambah") {
					$data_paket = $this->Ucore_model->get_pakettravel_detail($aksi,$this->user_agentid);
					if (sizeof($data_paket)==0) { redirect("paket/".$slug_paket); }
				}
				$data['site_form'] 	= "form_paket";
				$data['data_paket'] = $data_paket;
				$data['data_pembimbing'] = $this->Ucore_model->get_pembimbing();
			} else if (($page=="jtambah") || ($page=="jubah") || ($page=="jhapus")) {
				if ($aksi=="") { redirect("paket/".$slug_paket); } 
				$data_paket = $this->Ucore_model->get_pakettravel_detail($aksi,$this->user_agentid);
				if (sizeof($data_paket)==0) { redirect("paket/".$slug_paket); }

				$data_jadwal = array();
				if ($page!="jtambah") {
					$data_jadwal = $this->Ucore_model->get_jadwal_pakettravel_detail($itemid,$this->user_agentid);
					if (sizeof($data_paket)==0) { redirect("paket/".$slug_paket."/".$aksi); }
				}
				
				$data['data_paket'] = $data_paket;
				$data['data_jadwal'] = $data_jadwal;
				$data['site_form'] 	= "form_jadwal"; 
			} else {
				$data_paket = $this->Ucore_model->get_pakettravel_detail($page,$this->user_agentid);
				if (sizeof($data_paket)==0) { redirect("paket/".$slug_paket); }
				$data['site_form'] 	= "detail_paket"; 
				$data['data_paket'] = $data_paket;
				$data['data_jadwal'] = $this->Ucore_model->get_jadwal_pakettravel($page,$this->user_agentid);
			}
		} else {
			$data['site_form'] 	= "list";
			$data['data_paket'] = $this->Ucore_model->get_pakettravel($this->user_agentid,$kategori);
		}
		$data['pesan'] 		= $pesan;
		$data['tipe_paket'] = $tipe_paket;
		$data['slug_paket'] = $slug_paket;
		$data['page'] 		= $page;
		$data['aksi'] 		= $aksi;
		$data['itemid'] 	= $itemid;
		
		$this->load->view('backend/ucore_siteheader',$data);
		$this->load->view('backend/ucore_sitemenu',$data);
		$this->load->view('backend/ucore_sitesubheader',$data);
		$this->load->view('backend/ucore_paket',$data);
		$this->load->view('backend/ucore_sitefooter',$data);		
	}

	public function wisata($page="",$aksi="",$itemid="") {
		$this->general->session_check();
		$data['user_id']	= $this->user_id;
		$data['user_nama']	= $this->user_nama;
		$data['user_agentid']	= $this->user_agentid;
		$data['user_namaagent']	= $this->user_namaagent;
		$data['user_namaperusahaan']	= $this->user_namaperusahaan;
		$data['user_logo']	= $this->user_logo;
		$data['menu'] 		= "paket";
		$data['submenu']	= "wisata";
		
		$data['themes_url'] = base_url() . $this->config->item('theme_backend');

		$pesan = "";
		$kategori = "3";
		$tipe_paket = "Wisata";
		$slug_paket = "wisata";
		
		$tombol = $this->input->post("tombol",true);
		if ($tombol!="") {
			$nama = $this->input->post("nama",true);
			$deskripsi = $this->input->post("deskripsi",true);
			$durasi = $this->input->post("durasi",true);
			$pembimbing = $this->input->post("pembimbing",true);
			
			$slugname = $nama;
			
			if ($page=="tambah") { $this->Ucore_model->product_insert($this->user_agentid,$kategori,$nama,$slugname,$deskripsi,$durasi,$pembimbing); }
			if ($page=="ubah") { $this->Ucore_model->product_update($aksi,$this->user_agentid,$nama,$slugname,$deskripsi,$durasi,$pembimbing); }
			if ($page=="hapus") { $this->Ucore_model->product_delete($aksi,$this->user_agentid); }
			
			$page = "";
		}
		
		if ($page != "") {
			if (($page=="tambah") || ($page=="ubah") || ($page=="hapus")) {
				$data_paket = array();
				if ($page!="tambah") {
					$data_paket = $this->Ucore_model->get_pakettravel_detail($aksi,$this->user_agentid);
					if (sizeof($data_paket)==0) { redirect("paket/".$slug_paket); }
				}
				$data['site_form'] 	= "form_paket";
				$data['data_paket'] = $data_paket;
				$data['data_pembimbing'] = $this->Ucore_model->get_pembimbing();
			} else if (($page=="jtambah") || ($page=="jubah") || ($page=="jhapus")) {
				if ($aksi=="") { redirect("paket/".$slug_paket); } 
				$data_paket = $this->Ucore_model->get_pakettravel_detail($aksi,$this->user_agentid);
				if (sizeof($data_paket)==0) { redirect("paket/".$slug_paket); }

				$data_jadwal = array();
				if ($page!="jtambah") {
					$data_jadwal = $this->Ucore_model->get_jadwal_pakettravel_detail($itemid,$this->user_agentid);
					if (sizeof($data_paket)==0) { redirect("paket/".$slug_paket."/".$aksi); }
				}
				
				$data['data_paket'] = $data_paket;
				$data['data_jadwal'] = $data_jadwal;
				$data['site_form'] 	= "form_jadwal"; 
			} else {
				$data_paket = $this->Ucore_model->get_pakettravel_detail($page,$this->user_agentid);
				if (sizeof($data_paket)==0) { redirect("paket/".$slug_paket); }
				$data['site_form'] 	= "detail_paket"; 
				$data['data_paket'] = $data_paket;
				$data['data_jadwal'] = $this->Ucore_model->get_jadwal_pakettravel($page,$this->user_agentid);
			}
		} else {
			$data['site_form'] 	= "list";
			$data['data_paket'] = $this->Ucore_model->get_pakettravel($this->user_agentid,$kategori);
		}
		$data['pesan'] 		= $pesan;
		$data['tipe_paket'] = $tipe_paket;
		$data['slug_paket'] = $slug_paket;
		$data['page'] 		= $page;
		$data['aksi'] 		= $aksi;
		$data['itemid'] 	= $itemid;
		
		$this->load->view('backend/ucore_siteheader',$data);
		$this->load->view('backend/ucore_sitemenu',$data);
		$this->load->view('backend/ucore_sitesubheader',$data);
		$this->load->view('backend/ucore_paket',$data);
		$this->load->view('backend/ucore_sitefooter',$data);			
	}
	
	public function jadwal() {
		$this->general->session_check();
		$data['user_nama']	= $this->user_nama;
		$data['user_namaagent']	= $this->user_namaagent;
		$data['user_namaperusahaan']	= $this->user_namaperusahaan;
		$data['user_logo']	= $this->user_logo;
		$data['menu'] 		= "paket";
		$data['submenu']	= "jadwal";
		
		$data['themes_url'] = base_url() . $this->config->item('theme_backend');

		$data['site_form'] = "list";
		
		$this->load->view('backend/ucore_siteheader',$data);
		$this->load->view('backend/ucore_sitemenu',$data);
		$this->load->view('backend/ucore_sitesubheader',$data);
		$this->load->view('backend/ucore_paket_calendar',$data);
		$this->load->view('backend/ucore_sitefooter',$data);		
	}

	public function manifest() {
		$this->general->session_check();
		$data['user_nama']	= $this->user_nama;
		$data['user_namaagent']	= $this->user_namaagent;
		$data['user_namaperusahaan']	= $this->user_namaperusahaan;
		$data['user_logo']	= $this->user_logo;
		$data['menu'] 		= "paket";
		$data['submenu']	= "manifest";
		
		$data['themes_url'] = base_url() . $this->config->item('theme_backend');

		$data['site_form'] = "list";
		
		$this->load->view('backend/ucore_siteheader',$data);
		$this->load->view('backend/ucore_sitemenu',$data);
		$this->load->view('backend/ucore_sitesubheader',$data);
		$this->load->view('backend/ucore_jamaah_data',$data);
		$this->load->view('backend/ucore_sitefooter',$data);		
	}	
}
