<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Produk extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Ucore_model');
    }

	public function index()
	{
		redirect(site_url("home"));
	}

	

	public function pesawat($page="1",$aksi="",$idschedule="") {

		$this->general->session_check();
		$data['user_nama']	= $this->user_nama;
		$data['user_namaagent']	= $this->user_namaagent;
		$data['user_namaperusahaan']	= $this->user_namaperusahaan;
		$data['user_logo']	= $this->user_logo;
		$data['menu'] 		= "produk";
		$data['submenu']	= "pesawat";

		$data['themes_url'] = base_url() . $this->config->item('theme_backend');

		$limit = 10;
		$pesan = "";


		if (($page == "new")) {

            $data['site_form'] 	= "form_maskapai";
            $data['pesan'] 		= $pesan;
			$data['aksi'] 		= $page;

		} 

		else if (($page == "schedule")) {

            $data['site_form'] 	= "form_schedule";
            $data['pesan'] 		= $pesan;
			$data['aksi'] 		= $aksi;
			$data['idschedule'] = $idschedule;
			
			$data['data_maskapai'] 		= $this->Ucore_model->get_maskapai_byagent($this->user_agentid);
			$data['data_city'] 			= $this->Ucore_model->get_city();
			$data['data_seat_class'] 	= $this->Ucore_model->get_seat_class();

			if( $aksi == "ubah" || $aksi == "hapus"){
				$data['data_penerbangan_byid'] = $this->Ucore_model->get_penerbangan_byid($idschedule,$this->user_agentid);
			}

			$tombol = $this->input->post("tombol",true);
		
			if ($tombol!="") {
				$maskapai 			= $this->input->post("maskapai",true);
				$kode_penerbangan 	= $this->input->post("kode_penerbangan",true);
				$date_arrival 		= $this->input->post("date_arrival",true);
				$date_depart 		= $this->input->post("date_depart",true);
				$time_arrival 		= $this->input->post("time_arrival",true);
				$time_depart 		= $this->input->post("time_depart",true);
				$city_arival 		= $this->input->post("city_arival",true);
				$city_depart 		= $this->input->post("city_depart",true);
				$duration 			= $this->input->post("duration",true);
				$quota 				= $this->input->post("quota",true);
				$price 				= $this->input->post("price",true);
				$margin 			= $this->input->post("margin",true);
				$seat_class 		= $this->input->post("seat_class",true);
				$kategori_jual 		= $this->input->post("kategori_jual",true);
				$is_active 			= $this->input->post("is_active",true);

				if ($is_active == "on") {
					$is_active = 1;
				} else {
					$is_active = 0;
				}

				if ($aksi=="") { 
					$this->Ucore_model->stok_penerbangan_insert($maskapai,$kode_penerbangan,$date_arrival,$date_depart,$time_arrival,$time_depart,$city_arival,$city_depart,$duration,$quota,$price,$margin,$seat_class,$kategori_jual,$is_active,$this->user_agentid); 
					}
				if ($aksi=="ubah") { 
					$this->Ucore_model->stok_penerbangan_update($maskapai,$kode_penerbangan,$date_arrival,$date_depart,$time_arrival,$time_depart,$city_arival,$city_depart,$duration,$quota,$price,$margin,$seat_class,$kategori_jual,$is_active,$idschedule,$this->user_agentid); 
					}
				if ($aksi=="hapus") {
					$this->Ucore_model->stok_penerbangan_delete($idschedule,$this->user_agentid); 
					}

				$aksi = "";

				redirect('produk/pesawat/');

			}

		}

		else if (($page == "detail")) {

            $data['site_form'] 	= "detail_penerbangan";
            $data['pesan'] 		= $pesan;
            $data['aksi'] 		= $page;

		} 

		else {

			$data['site_form'] = "list_stock_penerbangan";
            $data['page'] = $page;
			$data['limit'] = $limit;
			
			$data['data_penerbangan'] 	= $this->Ucore_model->get_penerbangan_byagent($this->user_agentid);
			$data['data_city'] 			= $this->Ucore_model->get_city();

		}

		$this->load->view('backend/ucore_siteheader',$data);
		$this->load->view('backend/ucore_sitemenu',$data);
		$this->load->view('backend/ucore_sitesubheader',$data);
		$this->load->view('backend/ucore_product',$data);
		$this->load->view('backend/ucore_sitefooter',$data);		

	}



	public function hotel($page="1",$idschedule="") {

		$this->general->session_check();

		$data['user_nama']	= $this->user_nama;
		$data['user_namaagent']	= $this->user_namaagent;
		$data['user_namaperusahaan']	= $this->user_namaperusahaan;
		$data['user_logo']	= $this->user_logo;
		$data['menu'] 		= "produk";
		$data['submenu']	= "hotel";

		$data['themes_url'] = base_url() . $this->config->item('theme_backend');

		if (($page == "new" || $page == "edit" || $page == "delete")) {

            $data['site_form'] 	= "form_hotel";
			$data['aksi'] 		= $page;
			$data['idschedule'] = $idschedule;
			
			$data['list_hotel'] = $this->Ucore_model->get_hotel();
			$data['list_room'] 	= $this->Ucore_model->get_room();

			if ($page == "edit" || $page == "delete") {
				$data['data_hotelid'] = $this->Ucore_model->get_hotel_scheduleid($idschedule,$this->user_agentid);
			}

			
			
			$tombol = $this->input->post("tombol",true);
		
			if ($tombol!="") {
				$hotelid 			= $this->input->post("hotelid",true);
				$roomid 			= $this->input->post("roomid",true);
				$checkin			= $this->input->post("checkin",true);
				$checkout			= $this->input->post("checkout",true);
				$durasi				= $this->input->post("durasi",true);
				$stock				= $this->input->post("stock",true);
				$price 				= $this->input->post("price",true);
				$margin 			= $this->input->post("margin",true);

				if ($page=="new") { 
					$this->Ucore_model->stok_hotel_insert($hotelid,$roomid,$checkin,$checkout,$durasi,$stock,$price,$margin,$this->user_agentid);
					}
				if ($page=="edit") { 
					$this->Ucore_model->stok_hotel_update($hotelid,$roomid,$checkin,$checkout,$durasi,$stock,$price,$margin,$idschedule,$this->user_agentid); 
					}
				if ($page=="delete") {
					$this->Ucore_model->stok_hotel_delete($idschedule,$this->user_agentid); 
					}

				redirect('produk/hotel/');
			}

			

		} else if (($page == "detail")) {

            $data['site_form'] 	= "detail_hotel";
            $data['aksi'] 		= $page;

		} else if (($page == "room")) {

            $data['site_form'] 	= "form_room";
            $data['aksi'] 		= $page;

		}

		else {

			$data['site_form'] = "list_hotel";
			$data['page'] = $page;
			
			$data['data_hotel'] = $this->Ucore_model->get_hotel_schedule_agent($this->user_agentid);

		}

		

		$this->load->view('backend/ucore_siteheader',$data);
		$this->load->view('backend/ucore_sitemenu',$data);
		$this->load->view('backend/ucore_sitesubheader',$data);
		$this->load->view('backend/ucore_product',$data);
		$this->load->view('backend/ucore_sitefooter',$data);		

	}



	public function visa($page="1",$idprovider="0") {

		$this->general->session_check();

		$data['user_nama']	= $this->user_nama;
		$data['user_namaagent']	= $this->user_namaagent;
		$data['user_namaperusahaan']	= $this->user_namaperusahaan;
		$data['user_logo']	= $this->user_logo;
		$data['menu'] 		= "produk";
		$data['submenu']	= "visa";

		$data['themes_url'] = base_url() . $this->config->item('theme_backend');


		if (($page == "new" || $page == "edit" || $page == "delete")) {

            $data['site_form'] 	= "form_visa";
			$data['aksi'] 		= $page;
			$data['idprovider'] = $idprovider;

			if ($page == "edit" || $page == "delete") {
				$data['data_providerid'] = $this->Ucore_model->get_provider_visaid($idprovider,$this->user_agentid);
			}
			
			$tombol = $this->input->post("tombol",true);
		
			if ($tombol!="") {
				$nama_provider		= $this->input->post("nama_provider",true);
				$telepon 			= $this->input->post("telepon",true);
				$alamat				= $this->input->post("alamat",true);
				$harga				= $this->input->post("harga",true);

				if ($page=="new") { 
					$this->Ucore_model->provider_visa_insert($nama_provider,$telepon,$alamat,$harga,$this->user_agentid);
					}
				if ($page=="edit") { 
					$this->Ucore_model->provider_visa_update($nama_provider,$telepon,$alamat,$harga,$idprovider,$this->user_agentid); 
					}
				if ($page=="delete") {
					$this->Ucore_model->provider_visa_delete($idprovider,$this->user_agentid); 
					}

				redirect('produk/visa/');
			}

			

		} else if (($page == "paket")) {

			if (($aksi == "entryvisa")) {
				if (($idjamaah != "0")){

					$data['site_form'] 	= "form_entryvisa";
					$data['aksi'] 		= $page;

				} else {

					$data['site_form'] 	= "entry_visa";
					$data['aksi'] 		= $page;

				}	

			} else {

					$data['site_form'] 	= "paket_perjalanan";
					$data['aksi'] 		= $page;
					
			}

		} else if (($page == "detail")) {

            $data['site_form'] 	= "detail_provider";
            $data['aksi'] 		= $page;

		} 

		else {

			$data['site_form'] = "list_visa";
			$data['page'] = $page;
			
			$data['data_provider_visa'] = $this->Ucore_model->get_provider_visa($this->user_agentid);

		}

		$this->load->view('backend/ucore_siteheader',$data);
		$this->load->view('backend/ucore_sitemenu',$data);
		$this->load->view('backend/ucore_sitesubheader',$data);
		$this->load->view('backend/ucore_product',$data);
		$this->load->view('backend/ucore_sitefooter',$data);		

	}

	

}

