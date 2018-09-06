<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Persediaan extends CI_Controller {

    public function __construct()

    {
        parent::__construct();
        $this->load->model('Ucore_model');
    }

	public function index()
	{
		redirect(site_url("home"));
	}

	public function data($page="0",$idbarang="") {

		$this->general->session_check();

		$data['user_id']	= $this->user_id;
		$data['user_nama']	= $this->user_nama;
		$data['user_agentid']	= $this->user_agentid;
		$data['user_namaagent']	= $this->user_namaagent;
		$data['user_namaperusahaan']	= $this->user_namaperusahaan;
		$data['user_logo']	= $this->user_logo;

		$data['menu'] 		= "persediaan";
		$data['submenu']	= "data";

		$data['themes_url'] = base_url() . $this->config->item('theme_backend');

		if (($page == "new" || $page == "edit" || $page == "delete")) {

            $data['site_form'] 	= "form_barang";
			$data['aksi'] 		= $page;
			$data['idbarang'] 	= $idbarang;

			$data['data_cabang'] 	= $this->Ucore_model->get_data_cabang_travel($this->user_agentid);
			$data['data_item'] 		= $this->Ucore_model->get_persediaan_item($this->user_agentid);

			if ($page == "edit" || $page == "delete") {
				$data['data_persediaan'] = $this->Ucore_model->get_persediaanid($idbarang,$this->user_agentid);
			}
			
			$tombol = $this->input->post("tombol",true);
		
			if ($tombol!="") {

				$id_barang			= $this->input->post("idbarang",true);
				$harga_barang		= $this->input->post("harga_barang",true);
				$hpp				= $this->input->post("hpp",true);
				$qty 				= $this->input->post("qty",true);
				$idcabang 			= $this->input->post("idcabang",true);

				if ($page=="new") { 
					$this->Ucore_model->persediaan_insert($id_barang,$harga_barang,$hpp,$qty,$idcabang,$this->user_agentid);
					}
				if ($page=="edit") { 
					$this->Ucore_model->persediaan_update($id_barang,$harga_barang,$hpp,$qty,$idcabang,$idbarang,$this->user_agentid); 
					}
				if ($page=="delete") {
					$this->Ucore_model->persediaan_delete($idbarang,$this->user_agentid); 
					}

				redirect('persediaan/data/');

			}
			
		} else if (($page == "import")) {

			$data['site_form'] 	= "form_importcsv";
			$data['aksi'] 		= $page;

		} else if (($page == "detail")) {

            $data['site_form'] 	= "detail_barang";
            $data['aksi'] 		= $page;

		}
		
		else {

			$data['site_form'] = "list_persediaan";

			$data['page'] = $page;
			$data['data_persediaan'] = $this->Ucore_model->get_persediaan_agentid($this->user_agentid);

		}

		$this->load->view('backend/ucore_siteheader',$data);
		$this->load->view('backend/ucore_sitemenu',$data);
		$this->load->view('backend/ucore_sitesubheader',$data);
		$this->load->view('backend/ucore_persediaan',$data);
		$this->load->view('backend/ucore_sitefooter',$data);
		
		

	}



	public function barangmasuk($page="0",$idmutasi="") {

		$this->general->session_check();
		$data['user_nama']	= $this->user_nama;
		$data['user_namaagent']	= $this->user_namaagent;
		$data['user_namaperusahaan']	= $this->user_namaperusahaan;
		$data['user_logo']	= $this->user_logo;

		$data['menu'] 		= "persediaan";
		$data['submenu']	= "barangmasuk";

		$data['themes_url'] = base_url() . $this->config->item('theme_backend');

		if (($page == "new" || $page == "edit" || $page == "delete")) {

            $data['site_form'] 	= "form_barangmasuk";
			$data['aksi'] 		= $page;
			$data['idmutasi'] 	= $idmutasi;

			$data['data_cabang'] 	= $this->Ucore_model->get_data_cabang_travel($this->user_agentid);
			$data['data_item'] 		= $this->Ucore_model->get_persediaan_item($this->user_agentid);
			$data['data_supplier'] 	= $this->Ucore_model->get_supplier($this->user_agentid);

			if ($page == "edit" || $page == "delete") {
				$data['data_persediaan'] = $this->Ucore_model->get_persediaan_mutasiid($idmutasi,$this->user_agentid);
			}
			
			$tombol = $this->input->post("tombol",true);
		
			if ($tombol!="") {
				
				$no_mutasi 			= $this->input->post("no_mutasi",true);
				$id_barang			= $this->input->post("idbarang",true);
				$id_suplier			= $this->input->post("idsuplier",true);
				$tanggal			= $this->input->post("tanggal",true);
				$qty 				= $this->input->post("qty",true);
				$jenis 				= $this->input->post("jenis",true);
				$keterangan			= $this->input->post("keterangan",true);
				$id_cabang 			= $this->input->post("idcabang",true);


				if ($page=="new") { 

					$this->Ucore_model->barangmasuk_insert($no_mutasi,$id_barang,$id_suplier,$tanggal,$qty,$jenis,$keterangan,$id_cabang,$this->user_id,$this->user_agentid);
					$lastid = $this->db->insert_id();
					$this->Ucore_model->persediaan_mutasi_insert($lastid,$id_barang,$qty);

					}
				if ($page=="edit") { 
					$this->Ucore_model->barangmasuk_update($no_mutasi,$id_barang,$id_suplier,$tanggal,$qty,$jenis,$keterangan,$id_cabang,$this->user_id,$idmutasi);
					$this->Ucore_model->persediaan_mutasi_update($id_barang,$qty,$idmutasi); 
					}
				if ($page=="delete") {
					$this->Ucore_model->barangmasuk_delete($idmutasi,$this->user_agentid);
					$this->Ucore_model->persediaan_mutasi_delete($id_barang,$idmutasi);
					}

				redirect('persediaan/barangmasuk/');

			}
			
		} else if (($page == "import")) {
			$data['site_form'] 	= "form_importcsv";
			$data['aksi'] 		= $page;

		} else if (($page == "detail")) {
            $data['site_form'] 	= "detail_barang";
            $data['aksi'] 		= $page;
		} else {

			$data['site_form'] = "list_barang_masuk";
			$data['page'] = $page;
			
			$data['data_persediaan_mutasi'] = $this->Ucore_model->get_persediaan_mutasi($this->user_agentid);

		}

		$this->load->view('backend/ucore_siteheader',$data);
		$this->load->view('backend/ucore_sitemenu',$data);
		$this->load->view('backend/ucore_sitesubheader',$data);
		$this->load->view('backend/ucore_persediaan',$data);
		$this->load->view('backend/ucore_sitefooter',$data);		

	}



	public function barangkeluar($page="0",$idmutasi="") {

		$this->general->session_check();

		$data['user_nama']	= $this->user_nama;
		$data['user_namaagent']	= $this->user_namaagent;
		$data['user_namaperusahaan']	= $this->user_namaperusahaan;
		$data['user_logo']	= $this->user_logo;

		$data['menu'] 		= "persediaan";
		$data['submenu']	= "barangkeluar";

		$data['themes_url'] = base_url() . $this->config->item('theme_backend');

		if (($page == "new" || $page == "edit" || $page == "delete")) {

            $data['site_form'] 	= "form_barangkeluar";
			$data['aksi'] 		= $page;
			$data['idmutasi'] 	= $idmutasi;

			$data['data_item'] 		= $this->Ucore_model->get_persediaan_item($this->user_agentid);

			if ($page == "edit" || $page == "delete") {
				$data['data_persediaan'] = $this->Ucore_model->get_persediaan_mutasiid($idmutasi,$this->user_agentid);
			}
			
			$tombol = $this->input->post("tombol",true);

			
		
			if ($tombol!="") {
				
				$no_mutasi 			= $this->input->post("no_mutasi",true);
				$id_barang			= $this->input->post("idbarang",true);
				$tanggal			= $this->input->post("tanggal",true);
				$qty 				= $this->input->post("qty",true);
				$jenis 				= $this->input->post("jenis",true);
				$keterangan			= $this->input->post("keterangan",true);

				if ($page=="new") { 

					$this->Ucore_model->barangkeluar_insert($no_mutasi,$id_barang,$tanggal,$qty,$jenis,$keterangan,$this->user_id,$this->user_agentid);
					$lastid = $this->db->insert_id();
					$this->Ucore_model->persediaan_mutasi_insert($lastid,$id_barang,$qty);

					}
				if ($page=="edit") { 
					$this->Ucore_model->barangkeluar_update($no_mutasi,$id_barang,$tanggal,$qty,$jenis,$keterangan,$this->user_id,$idmutasi);
					$this->Ucore_model->persediaan_mutasi_update($id_barang,$qty,$idmutasi); 
					}
				if ($page=="delete") {
					$this->Ucore_model->barangkeluar_delete($idmutasi,$this->user_agentid);
					$this->Ucore_model->persediaan_mutasi_delete($id_barang,$idmutasi);
					}

				redirect('persediaan/barangkeluar/');

			}

		} else if (($page == "import")) {

			$data['site_form'] 	= "form_importcsv";
			$data['aksi'] 		= $page;

			

		} else if (($page == "detail")) {

            $data['site_form'] 	= "detail_barang";
            $data['aksi'] 		= $page;

		} else {

			$data['site_form'] = "list_barang_keluar";
			$data['page'] = $page;
			
			$data['data_persediaan_keluar'] = $this->Ucore_model->get_barang_keluar($this->user_agentid);
		}

		$this->load->view('backend/ucore_siteheader',$data);
		$this->load->view('backend/ucore_sitemenu',$data);
		$this->load->view('backend/ucore_sitesubheader',$data);
		$this->load->view('backend/ucore_persediaan',$data);
		$this->load->view('backend/ucore_sitefooter',$data);		

	}

	

	public function item($aksi="",$itemid="") {

		$this->general->session_check();

		$data['user_id']	= $this->user_id;

		$data['user_nama']	= $this->user_nama;

		$data['user_agentid']	= $this->user_agentid;

		$data['user_namaagent']	= $this->user_namaagent;

		$data['user_namaperusahaan']	= $this->user_namaperusahaan;

		$data['user_logo']	= $this->user_logo;



		$data['menu'] 		= "persediaan";

		$data['submenu']	= "item";

		

		$tombol = $this->input->post("tombol",true);

		if ($tombol!="") {

			$kode = $this->input->post("kode",true);

			$nama = $this->input->post("nama",true);

			

			if ($aksi=="tambah") { $this->Ucore_model->itempersediaan_insert($this->user_agentid,$kode,$nama); }

			if ($aksi=="ubah") { $this->Ucore_model->itempersediaan_update($itemid,$this->user_agentid,$kode,$nama); }

			if ($aksi=="hapus") { $this->Ucore_model->itempersediaan_delete($itemid,$this->user_agentid); }



			$aksi = "";

		}

		

		$data['themes_url'] = base_url() . $this->config->item('theme_backend');

		if ($aksi != "") {

            $data['site_form'] 	= "form";

			$data['data_item'] = $this->Ucore_model->get_itempersediaan_detail($itemid,$this->user_agentid);

		} else {

			$data['site_form'] = "list";

			$data['data_item'] = $this->Ucore_model->get_itempersediaan($this->user_agentid);

		}

        $data['aksi'] = $aksi;

        $data['itemid'] = $itemid;

		

		$this->load->view('backend/ucore_siteheader',$data);

		$this->load->view('backend/ucore_sitemenu',$data);

		$this->load->view('backend/ucore_sitesubheader',$data);

		$this->load->view('backend/ucore_persediaan_item',$data);

		$this->load->view('backend/ucore_sitefooter',$data);		

	}



	public function supplier($aksi="",$supid="") {

		$this->general->session_check();

		$data['user_id']	= $this->user_id;

		$data['user_nama']	= $this->user_nama;

		$data['user_agentid']	= $this->user_agentid;

		$data['user_namaagent']	= $this->user_namaagent;

		$data['user_namaperusahaan']	= $this->user_namaperusahaan;

		$data['user_logo']	= $this->user_logo;



		$data['menu'] 		= "persediaan";

		$data['submenu']	= "supplier";

		

		$tombol = $this->input->post("tombol",true);

		if ($tombol!="") {

			$nama = $this->input->post("nama",true);

			$telepon = $this->input->post("telepon",true);

			$email = $this->input->post("email",true);

			$alamat = $this->input->post("alamat",true);

			$keterangan = $this->input->post("keterangan",true);

			

			if ($aksi=="tambah") { $this->Ucore_model->supplier_insert($this->user_agentid,$nama,$telepon,$email,$alamat,$keterangan); }

			if ($aksi=="ubah") { $this->Ucore_model->supplier_update($supid,$this->user_agentid,$nama,$telepon,$email,$alamat,$keterangan); }

			if ($aksi=="hapus") { $this->Ucore_model->supplier_delete($supid,$this->user_agentid); }



			$aksi = "";

		}

		

		$data['themes_url'] = base_url() . $this->config->item('theme_backend');

		if ($aksi != "") {

            $data['site_form'] 	= "form";

			$data['data_supplier'] = $this->Ucore_model->get_supplier_detail($supid,$this->user_agentid);

		} else {

			$data['site_form'] = "list";

			$data['data_supplier'] = $this->Ucore_model->get_supplier($this->user_agentid);

		}

        $data['aksi'] = $aksi;

        $data['supid'] = $supid;

		

		$this->load->view('backend/ucore_siteheader',$data);

		$this->load->view('backend/ucore_sitemenu',$data);

		$this->load->view('backend/ucore_sitesubheader',$data);

		$this->load->view('backend/ucore_persediaan_supplier',$data);

		$this->load->view('backend/ucore_sitefooter',$data);		

	}

}

