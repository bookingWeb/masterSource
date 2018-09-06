<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Setting extends CI_Controller {



    public function __construct()
    {

        parent::__construct();

        $this->load->model('Ucore_model');

    }

	

	public function index()

	{

		redirect(site_url("home"));

	}

	

	public function travel($page="",$aksi="tambah",$cabangid="") {

		$this->general->session_check();

		$data['user_id']	= $this->user_id;
		$data['user_nama']	= $this->user_nama;
		$data['user_agentid']	= $this->user_agentid;
		$data['user_namaagent']	= $this->user_namaagent;
		$data['user_namaperusahaan'] = $this->user_namaperusahaan;
		$data['user_logo']	= $this->user_logo;

		$data['menu'] 		= "setting";
		$data['submenu']	= "travel";

		
		$data['themes_url'] = base_url() . $this->config->item('theme_backend');

		

		$tombol = $this->input->post("tombol",true);

		if ($tombol!="") {
			$nama = $this->input->post("nama",true);
			$perusahaan = $this->input->post("perusahaan",true);
			$alamat = $this->input->post("alamat",true);
			$kota = $this->input->post("kota",true);
			$telepon = $this->input->post("telepon",true);
			$fax = $this->input->post("fax",true);
			$callcenter = $this->input->post("callcenter",true);
			$email = $this->input->post("email",true);
			$web = $this->input->post("web",true);
			$ijinhaji = $this->input->post("ijinhaji",true);
			$ijinumroh = $this->input->post("ijinumroh",true);

			$this->Ucore_model->update_travel($this->user_agentid,$nama,$perusahaan,$alamat,$kota,$telepon,$fax,$callcenter,$web,$email,$ijinhaji,$ijinumroh);

			$page = "";

		}

		

		$ctombol = $this->input->post("ctombol",true);

		if ($ctombol!="") {
			$jenis = $this->input->post("jenis",true);
			$kode = $this->input->post("kode",true);
			$nama = $this->input->post("nama",true);
			$alamat = $this->input->post("alamat",true);
			$kota = $this->input->post("kota",true);
			$phone = $this->input->post("phone",true);
			$fax = $this->input->post("fax",true);

			if ($aksi=="tambah") { $this->Ucore_model->cabang_insert($this->user_agentid,$jenis,$kode,$nama,$alamat,$kota,$phone,$fax); }
			if ($aksi=="ubah") { $this->Ucore_model->cabang_update($cabangid,$this->user_agentid,$jenis,$kode,$nama,$alamat,$kota,$phone,$fax); }
			if ($aksi=="hapus") { $this->Ucore_model->cabang_delete($cabangid,$this->user_agentid); }			

			$page = "";
		}



		if (($page == "update")) {
            $data['site_form'] 	= "form_travel";
			$data['data_travel'] = $this->Ucore_model->get_data_travel($this->user_agentid); 

		} else if ($page == "cabang") {

            $data['site_form'] 	= "form_cabang";
			$data_cabang = array();

			if ($cabangid!="") {
				$data_cabang = $this->Ucore_model->get_data_cabang($cabangid,$this->user_agentid);
				if (sizeof($data_cabang)==0) { redirect(site_url("setting/travel")); }
			}

			$data['data_cabang'] = $data_cabang;
			$data['data_kota'] = $this->Ucore_model->get_data_kotaid();

		} else {

			$data['site_form'] = "detail_travel";
			$data['data_travel'] = $this->Ucore_model->get_data_travel($this->user_agentid);
			$data['data_cabang'] = $this->Ucore_model->get_data_cabang_travel($this->user_agentid);

		}

		$data['page'] = $page;
		$data['aksi'] = $aksi;
		$data['cabangid'] = $cabangid;

		$this->load->view('backend/ucore_siteheader',$data);
		$this->load->view('backend/ucore_sitemenu',$data);
		$this->load->view('backend/ucore_sitesubheader',$data);
		$this->load->view('backend/ucore_setting_travel',$data);
		$this->load->view('backend/ucore_sitefooter',$data);		

	}



	public function user($aksi="",$userid="") {

		$this->general->session_check();

		$data['user_id']	= $this->user_id;

		$data['user_nama']	= $this->user_nama;

		$data['user_agentid']	= $this->user_agentid;

		$data['user_namaagent']	= $this->user_namaagent;

		$data['user_namaperusahaan']	= $this->user_namaperusahaan;

		$data['user_logo']	= $this->user_logo;



		$data['menu'] 		= "setting";

		$data['submenu']	= "user";

		

		$data['themes_url'] = base_url() . $this->config->item('theme_backend');

		

		$tombol = $this->input->post("tombol",true);

		if ($tombol!="") {

			$username = $this->input->post("username",true);

			$jenis = $this->input->post("jenis",true);

			$nama = $this->input->post("nama",true);

			$cabang = $this->input->post("cabang",true);

			$telepon = $this->input->post("telepon",true);

			$email = $this->input->post("email",true);

			$alamat = $this->input->post("alamat",true);

			$kota = $this->input->post("kota",true);

			

			$password = "123456";

			$mpasswd = hash('sha256', $password);

			

			if ($aksi=="tambah") { $this->Ucore_model->user_insert($nama,$username,$mpasswd,$email,$telepon,$alamat,$kota,$this->user_agentid,$jenis,"2","1",$cabang); }

			if ($aksi=="ubah") { $this->Ucore_model->user_update($userid,$this->user_agentid,$nama,$email,$telepon,$alamat,$kota,$jenis,$cabang); }

			if ($aksi=="hapus") { $this->Ucore_model->user_delete($userid,$this->user_agentid); }



			$aksi = "";

		}



		if ($aksi != "") {

            $data['site_form'] 	= "form_user";

			$data['data_user'] = $this->Ucore_model->get_user_travel_detail($userid,$this->user_agentid);

			$data['data_cabang'] = $this->Ucore_model->get_data_cabang_travel($this->user_agentid);

		} else {

			$data['site_form'] = "list_agent";

			$data['data_user'] = $this->Ucore_model->get_user_travel($this->user_agentid);

		}

        $data['aksi'] = $aksi;

        $data['userid'] = $userid;

		

		$this->load->view('backend/ucore_siteheader',$data);

		$this->load->view('backend/ucore_sitemenu',$data);

		$this->load->view('backend/ucore_sitesubheader',$data);

		$this->load->view('backend/ucore_setting_user',$data);

		$this->load->view('backend/ucore_sitefooter',$data);		

	}



	public function tourleader($aksi="",$tlid="") {

		$this->general->session_check();

		$data['user_id']	= $this->user_id;

		$data['user_nama']	= $this->user_nama;

		$data['user_agentid']	= $this->user_agentid;

		$data['user_namaagent']	= $this->user_namaagent;

		$data['user_namaperusahaan']	= $this->user_namaperusahaan;

		$data['user_logo']	= $this->user_logo;



		$data['menu'] 		= "setting";

		$data['submenu']	= "tourleader";

		

		$tombol = $this->input->post("tombol",true);

		if ($tombol!="") {

			$nama = $this->input->post("nama",true);

			$telepon = $this->input->post("telepon",true);

			$email = $this->input->post("email",true);

			$alamat = $this->input->post("alamat",true);

			

			if ($aksi=="tambah") { $this->Ucore_model->tourleader_insert($this->user_agentid,$nama,$telepon,$email,$alamat); }

			if ($aksi=="ubah") { $this->Ucore_model->tourleader_update($tlid,$this->user_agentid,$nama,$telepon,$email,$alamat); }

			if ($aksi=="hapus") { $this->Ucore_model->tourleader_delete($tlid,$this->user_agentid); }



			$aksi = "";

		}		

		

		$data['themes_url'] = base_url() . $this->config->item('theme_backend');

		if ($aksi != "") {

            $data['site_form'] 	= "form";

			$data['data_tourleader'] = $this->Ucore_model->get_tourleader_travel_detail($tlid,$this->user_agentid);

		} else {

			$data['site_form'] = "list";

			$data['data_tourleader'] = $this->Ucore_model->get_tourleader_travel($this->user_agentid);

		}

        $data['aksi'] = $aksi;

        $data['tlid'] = $tlid;

		

		$this->load->view('backend/ucore_siteheader',$data);

		$this->load->view('backend/ucore_sitemenu',$data);

		$this->load->view('backend/ucore_sitesubheader',$data);

		$this->load->view('backend/ucore_setting_tourleader',$data);

		$this->load->view('backend/ucore_sitefooter',$data);		

	}

	public function rekening($aksi="",$rekid="")
	{
		$this->general->session_check();
		$data['user_nama']	= $this->user_nama;
		$data['user_namaagent']	= $this->user_namaagent;
		$data['user_namaperusahaan']	= $this->user_namaperusahaan;
		$data['user_logo']	= $this->user_logo;
		$data['menu'] 		= "setting";
		$data['submenu']	= "rekening";

		$data['themes_url'] = base_url() . $this->config->item('theme_backend');

		$tombol = $this->input->post("tombol",true);

		if ($tombol!="") {
			$bank_id = $this->input->post("bank_id",true);
			$no_rekening = $this->input->post("no_rekening",true);
			$pemilik_rekening = $this->input->post("pemilik_rekening",true);
			$mata_uang = $this->input->post("mata_uang",true);

			// var_dump($bank_id,$no_rekening,$pemilik_rekening,$mata_uang);die;

			if ($aksi=="tambah") { $this->Ucore_model->rekening_agent_insert($this->user_agentid,$bank_id,$no_rekening,$pemilik_rekening,$mata_uang); }
			if ($aksi=="ubah") { $this->Ucore_model->rekening_agent_update($rekid,$this->user_agentid,$bank_id,$no_rekening,$pemilik_rekening,$mata_uang); }
			if ($aksi=="hapus") { $this->Ucore_model->rekening_agent_delete($rekid,$this->user_agentid); }

			$aksi = "";

			redirect('setting/rekening');

		}

		if ($aksi !=""){

			$data['bankid'] 		= 0;
			$data['site_form'] 		= "form";
			$data['data_bank'] 		= $this->Ucore_model->get_bank();
			$data['data_rekening'] 	= $this->Ucore_model->get_rekening_bank_byid($rekid,$this->user_agentid);

			if ($aksi == "ubah") {
				$data['bankid']		= $data['data_rekening'][0]['bank_id'];
				$data['matauang'] 	= $data['data_rekening'][0]['mata_uang'];
			}

			if ($aksi == "filter") {
				$search 	= $this->input->post("search",true);

				$data['site_form'] = "list_rekening";
				$data['data_rekening']	= $this->Ucore_model->get_rekening_bysearch($this->user_agentid,$search);
			}

		} else {

			$data['site_form'] = "list_rekening";
			$data['data_rekening'] = $this->Ucore_model->get_rekening_bank($this->user_agentid);

		}
		
		$data['aksi'] = $aksi;
		$data['rekid'] = $rekid;
		
		$this->load->view('backend/ucore_siteheader',$data);
		$this->load->view('backend/ucore_sitemenu',$data);
		$this->load->view('backend/ucore_sitesubheader',$data);
		$this->load->view('backend/ucore_setting_rekening',$data);
		$this->load->view('backend/ucore_sitefooter',$data);
	}

	public function userteam($aksi="",$userid="")
	{
		$this->general->session_check();
		$data['user_nama']	= $this->user_nama;
		$data['user_namaagent']	= $this->user_namaagent;
		$data['user_namaperusahaan']	= $this->user_namaperusahaan;
		$data['user_logo']	= $this->user_logo;
		$data['menu'] 		= "setting";
		$data['submenu']	= "userteam";

		$data['themes_url'] = base_url() . $this->config->item('theme_backend');

		$tombol = $this->input->post("tombol",true);

		if ($tombol!="") {
			$kode = $this->input->post("kode",true);
			$nama = $this->input->post("nama",true);
			$channelid = $this->input->post("channelid",true);
			$keterangan = $this->input->post("keterangan",true);

			if ($aksi=="tambah") { $this->Ucore_model->userteam_insert($this->user_agentid,$kode,$nama,$channelid,$keterangan); }
			if ($aksi=="ubah") { $this->Ucore_model->userteam_update($userid,$this->user_agentid,$kode,$nama,$channelid,$keterangan); }
			if ($aksi=="hapus") { $this->Ucore_model->userteam_delete($userid,$this->user_agentid); }

			$aksi = "";

			redirect('setting/userteam');

		}

		if ($aksi !=""){

			$data['idchannel'] 				= 0;
			$data['site_form'] 				= "form";
			$data['data_channel_type'] 		= $this->Ucore_model->get_channel_type();

			$data['data_teamuser'] 	= $this->Ucore_model->get_userteam_byid($userid,$this->user_agentid);

			if ($aksi == "filter") {
				$search 	= $this->input->post("search",true);

				$data['site_form'] = "list_teamuser";
				$data['data_userteam']	= $this->Ucore_model->get_userteam_bysearch($this->user_agentid,$search);
			}

		} else {

			$data['site_form'] = "list_teamuser";
			$data['data_userteam'] = $this->Ucore_model->get_userteam_byagent($this->user_agentid);

		}
		
		$data['aksi'] = $aksi;
		$data['userid'] = $userid;
		
		$this->load->view('backend/ucore_siteheader',$data);
		$this->load->view('backend/ucore_sitemenu',$data);
		$this->load->view('backend/ucore_sitesubheader',$data);
		$this->load->view('backend/ucore_setting_userteam',$data);
		$this->load->view('backend/ucore_sitefooter',$data);
	}

	

}

