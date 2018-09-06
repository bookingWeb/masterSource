<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ucore_model');
    }
	
	public function index()
	{
		redirect(site_url("home"));
	}
	
	public function prospek($aksi="") {
		$this->general->session_check();
		$data['user_nama']				= $this->user_nama;
		$data['user_namaagent']			= $this->user_namaagent;
		$data['user_namaperusahaan']	= $this->user_namaperusahaan;
		$data['user_level']				= $this->user_level;
		$data['user_logo']				= $this->user_logo;
		$data['menu'] 					= "jamaah";
		$data['submenu']				= "jmh_prospek";
		
		$data['themes_url'] = base_url() . $this->config->item('theme_backend');
		
		if ($aksi!="") {
			$site_form = "form";
		} else {
			$site_form = "list";
		}
		$data['site_form'] = $site_form; 
		
		$this->load->view('backend/ucore_siteheader',$data);
		$this->load->view('backend/ucore_sitemenu',$data);
		$this->load->view('backend/ucore_sitesubheader',$data);
		$this->load->view('backend/ucore_jamaah_prospek',$data);
		$this->load->view('backend/ucore_sitefooter',$data);		
	}
	
	public function daftar($page="1",$idjamaah="0") {
		$this->general->session_check();
		$data['user_nama']				= $this->user_nama;
		$data['user_namaagent']			= $this->user_namaagent;
		$data['user_namaperusahaan']	= $this->user_namaperusahaan;
		$data['user_level']	= $this->user_level;
		$data['user_logo']				= $this->user_logo;
		$data['menu'] 					= "jamaah";
		$data['submenu']				= "jmh_daftar";
		$data['themes_url'] = base_url() . $this->config->item('theme_backend');
		$limit = 10;
        $pesan = "";
		if (($page == "add") || ($page == "edit") || ($page == "rem")) {
			$data['site_form'] 	= "form2";
            $data['pesan'] 		= $pesan;
            $data['aksi'] 		= $page;
			$data['idjamaah'] 	= $idjamaah;
			
        } else {
			$data['site_form'] = "form2";
            $data['page'] = $page;
            $data['limit'] = $limit;
		}
		
		$this->load->view('backend/ucore_siteheader',$data);
		$this->load->view('backend/ucore_sitemenu',$data);
		$this->load->view('backend/ucore_sitesubheader',$data);
		$this->load->view('backend/ucore_jamaah_data',$data);
		$this->load->view('backend/ucore_sitefooter',$data);
	}
	
	public function kamar($page="1",$bookingid="0",$profileid="0") {
		$this->general->session_check();
		$data['user_id']	= $this->user_id;
		$data['user_nama']	= $this->user_nama;
		$data['user_agentid']	= $this->user_agentid;
		$data['user_namaagent']	= $this->user_namaagent;
		//$data['user_namaperusahaan'] = $this->user_namaperusahaan;
		$data['user_logo']	= $this->user_logo;
		$agentid 						= $this->session->userdata('agent_id');
		
		$limit = 10;
		$pesan = "";
		
		$data['menu'] 					= "jamaah";
		$data['submenu']				= "jmh_booking";
		$data['page'] 					= $page;
		$data['limit'] 					= $limit;
		
		$data['themes_url'] = base_url() . $this->config->item('theme_backend');
		$tombol = $this->input->post("tombol",true);
		if ($tombol!="") {
			$jenis 			= $this->input->post("jenis",true);
			$jaminan 		= $this->input->post("jaminan",true);
			$fasilitas		= $this->input->post("fasilitas",true);
			$jumlah 		= $this->input->post("jumlah",true);
			$harga	 		= $this->input->post("harga",true);
			// $idschedule 	= $this->input->post("tglberangkat",true);
			
			//$kode_booking = "000";
			// $data_kode	= $this->Ucore_model->get_id_kode();
			// if (sizeof($data_kode)>0) {
			// 	$this->Ucore_model->update_kodebooking($data_kode[0]["id"]);
			// 	$kode_booking 	= $data_kode[0]["kode"];
			// }
			
			//$this->Ucore_model->booking_insert($this->user_id,$this->user_agentid,$nama,$email,$telepon,$paketid,$idschedule,$jumlah,$kode_booking);
			$this->Ucore_model->insertkamar($jenis,$jaminan,$fasilitas,$jumlah,$harga);
			return redirect(site_url('master/kamar'));
		}
		$page_view = "kamar_list";
		//tambah peserta jamaah by kode booking
		if ($page == "kamar" && $bookingid == "new") {
			$page_view = "kamar_input";
			
			$data['site_form'] 	= "tambahjamaah";
			$data['profileid'] 	= $profileid;
		}
		
		//detail peserta
		// else if ($page == "jamaah" && $bookingid == "detail") {
		// 	$page_view = "jamaah_profile";

			
		// 	$data['site_form'] 	= "jamaahdetail";
		// 	$data['profileid'] 	= $profileid;

		// 	$data['detail_jamaah'] = $this->Ucore_model->get_jamaah_by_id($profileid);
		// }

		//ubah peserta
		else if ($page == "kamar" && $bookingid == "ubah") {
			$page_view = "kamar_input";
			
			$data['site_form'] 	= "kamarubah";
			$data['profileid'] 	= $profileid;

			$data['detail_jamaah'] = $this->Ucore_model->get_jamaah_by_id($profileid);
		}

		//hapus peserta
		else if ($page == "jamaah" && $bookingid == "hapus") {
			$this->Ucore_model->jamaah_by_bookingid_delete($profileid);
			redirect(site_url('jamaah/booking/'));
		}

		//search by kode booking, nama kontak, no telp
		else if ($page == "filter") {
			$search 	= $this->input->post('search');
			$data['page'] 				= 1;
			//$data['data_booking'] 		= $this->Ucore_model->get_booking_by_search($this->user_agentid,$search);
			$data['data_booking'] 		= $this->Ucore_model->get_kamar_by_search($search);

			// $data['data_jml_booking']	= $this->Ucore_model->jml_booking_by_search($this->user_agentid,$search);
			$data['data_jml_booking']	= $this->Ucore_model->jml_kamar_by_search($search);
			$data['site_form'] 			= "list";
		}

		//input tambah data jamaah
		else if ($page == "new") {			
			$data['site_form'] = "formkamar";
			$data['list_paket'] = $this->Ucore_model->get_paket($agentid);
			$tombol = $this->input->post("tombol2");
			if($tombol != ""){
					$namalengkap 	= $this->input->post("namalengkap",true);
					$noktp 			= $this->input->post("noktp",true);
					$ayah 			= $this->input->post("ayah",true);
					$tempat_lahir	= $this->input->post("tempat_lahir",true);
					$tanggal_lahir	= $this->input->post("tanggal_lahir",true);
					$jns_kelamin	= $this->input->post("jns_kelamin",true);
					$alamat			= $this->input->post("alamat",true);
					$alamat_surat	= $this->input->post("alamat_surat",true);
					$kelurahan		= $this->input->post("kelurahan",true);
					$kecamatan		= $this->input->post("kecamatan",true);
					$kabupaten		= $this->input->post("kabupaten",true);
					$propinsi		= $this->input->post("propinsi",true);
					$kodepos		= $this->input->post("kodepos",true);
					$pendidikan		= $this->input->post("pendidikan",true);
					$pekerjaan		= $this->input->post("pekerjaan",true);
					$statuskawin	= $this->input->post("statuskawin",true);
					$pernah_haji	= $this->input->post("pernah_haji",true);
					$mahram			= $this->input->post("mahram",true);
					$hub_mahram		= $this->input->post("hub_mahram",true);
					$golongandarah	= $this->input->post("golongandarah",true);
					$bph			= $this->input->post("bph",true);
					$rambut			= $this->input->post("rambut",true);
					$alis			= $this->input->post("alis",true);
					$hidung			= $this->input->post("hidung",true);
					$tinggi			= $this->input->post("tinggi",true);
					$berat			= $this->input->post("berat",true);
					$muka			= $this->input->post("muka",true);
					$ukuran_pakaian	= $this->input->post("ukuran_pakaian",true);

					// insert jamaah
					$this->Ucore_model->jamaah_insert($noktp,$ayah,$namalengkap,$jns_kelamin,$tempat_lahir,$tanggal_lahir,$alamat,
					$propinsi,$kabupaten,$kecamatan,$kelurahan,$kodepos,$pendidikan,$pekerjaan,$statuskawin,$pernah_haji,
					$golongandarah,$ukuran_pakaian,$mahram,$hub_mahram,$alamat_surat,$bph,$rambut,$alis,$hidung,$tinggi,$berat,$muka,$this->user_agentid);

					// last insert idjamaah 
					$lastjamaahid = $this->db->insert_id();

					//ambil biaya penawaran paket
					$biaya = $this->Ucore_model->get_biaya_paket($bookingid);

					// insert ke t_product_order_cust
					$this->Ucore_model->insert_prod_order_cust($bookingid,$lastjamaahid,$biaya);
					
					redirect(site_url('jamaah/booking/detail/'.$bookingid));
			}
		}
		//ubah data booking
		else if ($page == "ubah") {
			$data['site_form'] 	= "ubahbooking";
			$data['list_paket'] = $this->Ucore_model->get_paket($agentid);
			$data['booking_byid'] = $this->Ucore_model->get_booking_by_id($bookingid);
			
			$tombol = $this->input->post("tombol_ubahbooking");

			if($tombol != ""){
					$nama 			= $this->input->post("nama",true);
					$telepon 		= $this->input->post("telepon",true);
					$email 			= $this->input->post("email",true);
					$jumlah 		= $this->input->post("jumlah",true);
					$paketid 		= $this->input->post("paket",true);
					$idschedule 	= $this->input->post("tglberangkat",true);
					$kode_booking 	= $this->input->post("kode_booking",true);

					// update data ke tabel booking
					$this->Ucore_model->booking_update($this->user_id,$this->user_agentid,$nama,$email,$telepon,$paketid,$idschedule,$jumlah,$kode_booking);
					
					redirect(site_url('jamaah/booking/'));
			}
		}

		//ubah data booking paket
		else if ($page == "ubahpaket") {
			$data['site_form'] 	= "ubahpaket";
			$data['list_paket'] = $this->Ucore_model->get_paket($agentid);
			$data['booking_byid'] = $this->Ucore_model->get_booking_by_id($bookingid);
			
			$tombol = $this->input->post("tombol_ubahpaket");
			if($tombol != ""){
					$paketid 		= $this->input->post("paket",true);
					$idschedule 	= $this->input->post("tglberangkat",true);
					$kode_booking 	= $this->input->post("kode_booking",true);
					$this->Ucore_model->bookingpaket_update($this->user_id,$this->user_agentid,$paketid,$idschedule,$kode_booking);
					
					redirect(site_url('jamaah/booking/'));
			}
		}

		//ubah data booking kontak 
		else if ($page == "ubahkontak") {
			$data['site_form'] 	= "ubahkontak";
			$data['list_paket'] = $this->Ucore_model->get_paket($agentid);
			$data['booking_byid'] = $this->Ucore_model->get_booking_by_id($bookingid);

			
			$tombol = $this->input->post("tombol_ubahkontak");

			if($tombol != ""){
					$nama 			= $this->input->post("nama",true);
					$telepon 		= $this->input->post("telepon",true);
					$email 			= $this->input->post("email",true);
					$kode_booking 	= $this->input->post("kode_booking",true);

					// update data ke tabel booking
					$this->Ucore_model->bookingkontak_update($this->user_id,$this->user_agentid,$nama,$email,$telepon,$kode_booking);
					
					redirect(site_url('jamaah/booking/'));
			}
		}

		// hapus / batal booking
		else if ($page == "hapus") {
			$this->Ucore_model->booking_delete($bookingid);
			redirect(site_url('jamaah/booking/'));
		}

		// detail data booking per id
		else if ($page=="detail") {
			$data['data_booking'] 		= $this->Ucore_model->get_booking_by_id($bookingid);
			$data['data_jamaah'] 		= $this->Ucore_model->get_jamaah_by_bookingid($bookingid);
			$data['jml_jamaah'] 		= $this->Ucore_model->get_jml_jamaah_by_bookingid($bookingid);
			$data['history_payment'] 	= $this->Ucore_model->history_payment($bookingid);
			
			$data['bookingid'] = $bookingid;
			$data['site_form'] 	= "formdetail";
			$page_view = "jamaah_detail";
		}

		// input data visa
		else if ($page=="inputvisa") {
			$data['site_form'] 		= "inputvisa";
			$data['data_jamaahid'] 	= $this->Ucore_model->get_paket($profileid);
			$data['cust_id'] 		= $bookingid;
			$tombol = $this->input->post("tombol_inputvisa");
			if($tombol != ""){
					$jenis 			= $this->input->post("jenis",true);
					$kode_negara 	= $this->input->post("kode_negara",true);
					$no_paspor		= $this->input->post("no_paspor",true);
					$nama		 	= $this->input->post("nama",true);
					$jenis_kelamin	= $this->input->post("jenis_kelamin",true);
					$kewarganegaraan = $this->input->post("kewarganegaraan",true);
					$tgl_lahir 		= $this->input->post("tgl_lahir",true);
					$tempat_lahir 	= $this->input->post("tempat_lahir",true);
					$tgl_pengeluaran	= $this->input->post("tgl_pengeluaran",true);
					$tgl_expire		= $this->input->post("tgl_expire",true);
					$reg_no			= $this->input->post("reg_no",true);
					$kantor		 	= $this->input->post("kantor",true);
					$cust_id 		= $this->input->post("cust_id",true);
					
					// insert data ke tabel passport
					$this->Ucore_model->pasport_insert($jenis,$kode_negara,$no_paspor,$nama,$jenis_kelamin,$kewarganegaraan,$tgl_lahir,$tempat_lahir,$tgl_pengeluaran,$tgl_expire,$reg_no,$kantor);
					// last insert idpasport
					$lastpasportid = $this->db->insert_id();

					// insert ke t_cusomer / jamaah
					$this->Ucore_model->update_pasportid($cust_id, $lastpasportid);
					redirect(site_url('jamaah/booking/'));
			}
		}
		// input kamar ke produk order
		else if ($page=="inputkamar") {
			$data['site_form'] 		= "inputkamar";
			$data['list_room'] 		= $this->Ucore_model->get_listhotel_room($bookingid);
			$data['kode_booking'] 	= $profileid;
			$tombol = $this->input->post("tombol_inputkamar");
			if($tombol != ""){
					$kode_booking 	= $this->input->post("kode_booking");
					$room_type 		= $this->input->post("room");

					// insert room id ke tabel t_prod_order
					$this->Ucore_model->roomid_update($room_type,$kode_booking);
					
					redirect(site_url('jamaah/booking/'));
			}
		}

		// input foto kelengkapan dokumen
		else if ($page=="inputfoto") {
			$data['site_form'] 		= "inputfoto";
			$data['list_room'] 		= $this->Ucore_model->get_listhotel_room($bookingid);
			$data['kode_booking'] 	= $profileid;
			$tombol = $this->input->post("tombol_inputkamar");
			if($tombol != ""){
					$kode_booking 	= $this->input->post("kode_booking");
					$room_type 		= $this->input->post("room");

					// insert room id ke tabel t_prod_order
					$this->Ucore_model->roomid_update($room_type,$kode_booking);
					
					redirect(site_url('jamaah/booking/'));
			}
		}

		// pengecekan kelengkapan dokumen
		else if ($page=="cekdok") {
			$data['site_form'] 		= "cekdok";
			
			$data['cust_id'] 		= $bookingid;
			$custid = $bookingid;
			$data['status_dokumen'] 	= $this->Ucore_model->get_status_dokumen($bookingid);
			$tombol = $this->input->post("tombol_inputvisa");
			if($tombol != ""){
					$jenis 			= $this->input->post("jenis",true);
					$kode_negara 	= $this->input->post("kode_negara",true);
					$no_paspor		= $this->input->post("no_paspor",true);
					$nama		 	= $this->input->post("nama",true);
					$jenis_kelamin	= $this->input->post("jenis_kelamin",true);
					$kewarganegaraan = $this->input->post("kewarganegaraan",true);
					$tgl_lahir 		= $this->input->post("tgl_lahir",true);
					$tempat_lahir 	= $this->input->post("tempat_lahir",true);
					$tgl_pengeluaran	= $this->input->post("tgl_pengeluaran",true);
					$tgl_expire		= $this->input->post("tgl_expire",true);
					$reg_no			= $this->input->post("reg_no",true);
					$kantor		 	= $this->input->post("kantor",true);
					$cust_id 		= $this->input->post("cust_id",true);
					
					// insert data ke tabel passport
					$this->Ucore_model->pasport_insert($jenis,$kode_negara,$no_paspor,$nama,$jenis_kelamin,$kewarganegaraan,$tgl_lahir,$tempat_lahir,$tgl_pengeluaran,$tgl_expire,$reg_no,$kantor);
					// last insert idpasport
					$lastpasportid = $this->db->insert_id();

					// insert ke t_cusomer / jamaah
					$this->Ucore_model->update_pasportid($cust_id, $lastpasportid);
					redirect(site_url('jamaah/booking/'));
			}
		}
		else {
			$data['page'] = $page;
            $data['limit'] = $limit;
			//$data['data_booking'] 		= $this->Ucore_model->get_booking_by_agent($this->user_agentid,$page,$limit);
			$data['data_kamar'] 		= $this->Ucore_model->get_kamar();
			$data['data_jml_booking']	= $this->Ucore_model->jml_booking_by_agent($this->user_agentid);
			$data['site_form'] 			= "list";
		}
		 
		$this->load->view('backend/ucore_siteheader',$data);
		$this->load->view('backend/ucore_sitemenu',$data);
		$this->load->view('backend/ucore_sitesubheader',$data);
		$this->load->view('backend/'.$page_view,$data);
		$this->load->view('backend/ucore_sitefooter',$data);
	}
	
	public function getpaketid()
	{
		$paketid = $this->input->post('listpaket');
		$result = $this->Ucore_model->get_tglberangkat($paketid);
		
		if ($result == NULL){
			echo "<option value=''>Tidak ada jadwal keberangkatan</option>"; 
		} else {
			for($i=0;$i<sizeof($result);$i++){ 
				$format_date = date('d F Y', strtotime($result[$i]["start_date"]));
				echo "<option value='".$result[$i]["id"]. "'>".$format_date."</option>";  
			}
		}
	}
	
	public function data($page="1",$jamaahid="") {
		$this->general->session_check();
		$data['user_nama']	= $this->user_nama;
		$data['user_namaagent']	= $this->user_namaagent;
		$data['user_namaperusahaan']	= $this->user_namaperusahaan;
		$data['user_level']	= $this->user_level;
		$data['user_logo']	= $this->user_logo;
		$data['agentid'] 	= $this->session->userdata('agent_id');
		$data['menu'] 		= "jamaah";
		$data['submenu']	= "jmh_data";
		$limit = 10;
		$pesan = "";
		$data['page'] 		= $page;
		$data['limit'] 		= $limit;
		
		$data['themes_url'] = base_url() . $this->config->item('theme_backend');
		if (($page == "new") || ($page == "edit") || ($page == "rem")) {
            $data['site_form'] 	= "form";
			$data['page'] 		= $page;
			
			if ($page == "new")
			{
				$data['get_jamaah_by_id'] = "";
				$tombol = $this->input->post("tombol2");
				if($tombol != ""){
						$namalengkap 	= $this->input->post("namalengkap",true);
						$noktp 			= $this->input->post("noktp",true);
						$ayah 			= $this->input->post("ayah",true);
						$tempat_lahir	= $this->input->post("tempat_lahir",true);
						$tanggal_lahir	= $this->input->post("tanggal_lahir",true);
						$jns_kelamin	= $this->input->post("jns_kelamin",true);
						$alamat			= $this->input->post("alamat",true);
						$alamat_surat	= $this->input->post("alamat_surat",true);
						$kelurahan		= $this->input->post("kelurahan",true);
						$kecamatan		= $this->input->post("kecamatan",true);
						$kabupaten		= $this->input->post("kabupaten",true);
						$propinsi		= $this->input->post("propinsi",true);
						$kodepos		= $this->input->post("kodepos",true);
						$pendidikan		= $this->input->post("pendidikan",true);
						$pekerjaan		= $this->input->post("pekerjaan",true);
						$statuskawin	= $this->input->post("statuskawin",true);
						$pernah_haji	= $this->input->post("pernah_haji",true);
						$mahram			= $this->input->post("mahram",true);
						$hub_mahram		= $this->input->post("hub_mahram",true);
						$golongandarah	= $this->input->post("golongandarah",true);
						$bph			= $this->input->post("bph",true);
						$rambut			= $this->input->post("rambut",true);
						$alis			= $this->input->post("alis",true);
						$hidung			= $this->input->post("hidung",true);
						$tinggi			= $this->input->post("tinggi",true);
						$berat			= $this->input->post("berat",true);
						$muka			= $this->input->post("muka",true);
						$ukuran_pakaian	= $this->input->post("ukuran_pakaian",true);
						
						// insert jamaah
						$this->Ucore_model->jamaah_insert($noktp,$ayah,$namalengkap,$jns_kelamin,$tempat_lahir,$tanggal_lahir,$alamat,
						$propinsi,$kabupaten,$kecamatan,$kelurahan,$kodepos,$pendidikan,$pekerjaan,$statuskawin,$pernah_haji,
						$golongandarah,$ukuran_pakaian,$mahram,$hub_mahram,$alamat_surat,$bph,$rambut,$alis,$hidung,$tinggi,$berat,$muka,$this->user_agentid);
						
						redirect(site_url('jamaah/data/'));
				}
			}
			
			if($page == "edit")
			{
				$data['get_jamaah_by_id'] = $this->Ucore_model->get_jamaah_by_id($jamaahid);
				$tombol = $this->input->post("tombol2");
				if($tombol != ""){
						$id 			= $this->input->post("id",true);
						$namalengkap 	= $this->input->post("namalengkap",true);
						$noktp 			= $this->input->post("noktp",true);
						$ayah 			= $this->input->post("ayah",true);
						$tempat_lahir	= $this->input->post("tempat_lahir",true);
						$tanggal_lahir	= $this->input->post("tanggal_lahir",true);
						$jns_kelamin	= $this->input->post("jns_kelamin",true);
						$alamat			= $this->input->post("alamat",true);
						$alamat_surat	= $this->input->post("alamat_surat",true);
						$kelurahan		= $this->input->post("kelurahan",true);
						$kecamatan		= $this->input->post("kecamatan",true);
						$kabupaten		= $this->input->post("kabupaten",true);
						$propinsi		= $this->input->post("propinsi",true);
						$kodepos		= $this->input->post("kodepos",true);
						$pendidikan		= $this->input->post("pendidikan",true);
						$pekerjaan		= $this->input->post("pekerjaan",true);
						$statuskawin	= $this->input->post("statuskawin",true);
						$pernah_haji	= $this->input->post("pernah_haji",true);
						$mahram			= $this->input->post("mahram",true);
						$hub_mahram		= $this->input->post("hub_mahram",true);
						$golongandarah	= $this->input->post("golongandarah",true);
						$bph			= $this->input->post("bph",true);
						$rambut			= $this->input->post("rambut",true);
						$alis			= $this->input->post("alis",true);
						$hidung			= $this->input->post("hidung",true);
						$tinggi			= $this->input->post("tinggi",true);
						$berat			= $this->input->post("berat",true);
						$muka			= $this->input->post("muka",true);
						$ukuran_pakaian	= $this->input->post("ukuran_pakaian",true);
						
						// insert jamaah
						$this->Ucore_model->jamaah_update($noktp,$ayah,$namalengkap,$jns_kelamin,$tempat_lahir,$tanggal_lahir,$alamat,
						$propinsi,$kabupaten,$kecamatan,$kelurahan,$kodepos,$pendidikan,$pekerjaan,$statuskawin,$pernah_haji,
						$golongandarah,$ukuran_pakaian,$mahram,$hub_mahram,$alamat_surat,$bph,$rambut,$alis,$hidung,$tinggi,$berat,$muka,$this->user_agentid,$id);
						
						redirect(site_url('jamaah/data/'));
				}
			}
			if($page == "rem")
			{
				$this->Ucore_model->delete_jamaah($this->user_agentid,$jamaahid);
				redirect("jamaah/data");
			}
			
        } else {
			$data['site_form'] = "list";
			$data['page'] = $page;
			$data['limit'] = $limit;
			//search by kode booking, nama kontak, no telp
			if ($page == "filter") {
				$search 	= $this->input->post('search');
				$data['page'] 				= 1;
				$data['data_jamaah'] 		= $this->Ucore_model->get_jamaah_by_search($data['agentid'],$search);
				$data['data_jml_jamaah']	= $this->Ucore_model->jml_jamaah_by_search($data['agentid'],$search);
			} else {
				$data['data_jamaah'] = $this->Ucore_model->get_jamaah_by_agent($data['agentid'],$page,$limit);
				$data['data_jml_jamaah']	= $this->Ucore_model->jml_jamaah_by_agent($data['agentid']);
			}
			// var_dump($data['data_jml_jamaah']);die;
		}
		$this->load->view('backend/ucore_siteheader',$data);
		$this->load->view('backend/ucore_sitemenu',$data);
		$this->load->view('backend/ucore_sitesubheader',$data);
		$this->load->view('backend/ucore_jamaah_data',$data);
		$this->load->view('backend/ucore_sitefooter',$data);		
	}
	
	public function gen_kode() {
		$kar = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		for ($i=0;$i<10000;$i++) {
			$kode = "";
			for ($j=0;$j<5;$j++) {
				$kode .= $kar[rand(0,strlen($kar)-1)];
			}
			echo ($i+1) . ". " . $kode . "<br>";
			$this->Ucore_model->kode_insert($kode);
		}
		
	}
}