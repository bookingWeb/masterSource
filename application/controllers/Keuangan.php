<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Ucore_model');
    }
	
	public function index()
	{
		redirect(site_url("home"));
	}
	
	public function bayar($aksi="",$kodebooking="") {
		$this->general->session_check();
		$data['user_nama']	= $this->user_nama;
		$data['user_namaagent']	= $this->user_namaagent;
		$data['user_namaperusahaan'] = $this->user_namaperusahaan;
		$data['user_logo']	= $this->user_logo;
		
		$data['menu'] 		= "keuangan";
		$data['submenu']	= "bayar";
		
		$limit = 10;
		$kode = $this->input->post("kode",true);
		if ($kode!="") { $kodebooking = $kode; }
		$data_booking = $this->Ucore_model->get_booking_by_kode($kodebooking);
		$bookingid = 0; $pesan = "";
		if (sizeof($data_booking)>0) { $bookingid = $data_booking[0]["id"]; } 
		else { 
			if ($kodebooking!="") { $pesan = "Kode Booking tidak valid"; }
			$kode = $kodebooking;
			$kodebooking = "";
		}
		
		$data['themes_url'] = base_url() . $this->config->item('theme_backend');
		if ($aksi == "tambah") {
			$tombol = $this->input->post("tombol");
			if ($tombol != "") {
				
				$metode		= $this->input->post("metode");
				$rekening 	= $this->input->post("rekening");
				$nominal 	= $this->input->post("nominal");
				$keterangan	= $this->input->post("keterangan");

				if ($metode == 1) {

					$this->Ucore_model->payment_cash($nominal,$metode,$keterangan,$bookingid);

					$total_amount 	= $this->Ucore_model->total_amount_by_order($bookingid);
					$total_bayar 	= $this->Ucore_model->total_bayar_by_order($bookingid);

					if ($total_amount['total'] >= $total_bayar['total_bayar'] ){
						$this->Ucore_model->update_payment_status($bookingid,$this->user_agentid);
					} elseif ($total_amount['total'] < $total_bayar['total_bayar'] ) {
						$this->Ucore_model->update_payment_status_refund($bookingid,$this->user_agentid);
					}

					redirect(site_url("keuangan/bayar/"));

				} elseif ($metode == 2) {

					$this->Ucore_model->status_payment_insert($nominal,$metode,$rekening,$keterangan,$bookingid);

					$total_amount 	= $this->Ucore_model->total_amount_by_order($bookingid);
					$total_bayar 	= $this->Ucore_model->total_bayar_by_order($bookingid);

					if ($total_amount['total'] >= $total_bayar['total_bayar'] ){
						$this->Ucore_model->update_payment_status($bookingid,$this->user_agentid);
					} elseif ($total_amount['total'] < $total_bayar['total_bayar'] ) {
						$this->Ucore_model->update_payment_status_refund($bookingid,$this->user_agentid);
					}

					redirect(site_url("keuangan/bayar/"));

				}
			}

			$data['site_form'] 	= "form_setor";
			$data['kode'] = $kode;
			$data['pesan'] = $pesan;
			$data['data_booking'] = $data_booking;

			$data['data_payment'] = $this->Ucore_model->history_payment($bookingid);
			$data['data_rekening'] = $this->Ucore_model->get_rekening_bank($this->user_agentid);

			$data['total_bayar'] 		= $this->Ucore_model->total_bayar_byid($this->user_agentid,$bookingid);
			$data['total_refund'] 		= $this->Ucore_model->total_refund_byid($this->user_agentid,$bookingid);

			$total_bayar 	= ($data['total_bayar']['total_bayar']);
			$total_refund 	= ($data['total_refund']['total_refund']);

			$data['total_saldo'] 	= ($total_bayar - $total_refund);

			$total_amount 	= $this->Ucore_model->total_amount_by_order($bookingid);

			if ( $data['total_saldo'] >= ((int)$total_amount['total'])){
				$this->Ucore_model->update_payment_status($bookingid,$this->user_agentid);
			} else {
				$this->Ucore_model->update_payment_status_refund($bookingid,$this->user_agentid);			
			}


		} else if (($aksi == "detail")) {
            $data['site_form'] 	= "detail_pembayaran";
			$data['bookingid'] 	= $bookingid;
			
			$data['paket_booking'] 		= $this->Ucore_model->get_paket_booking($bookingid);
			$data['history_payment'] 	= $this->Ucore_model->history_payment_by_bookingid($bookingid);
		} else {
			$data['site_form'] = "list_pembayaran";
            $data['limit'] = $limit;
			$data['data_payment'] 	= $this->Ucore_model->get_history_pembayaran_byagent($this->user_agentid);
		}
		$data['aksi'] = $aksi;
		$data['kodebooking'] = $kodebooking;
		
		$this->load->view('backend/ucore_siteheader',$data);
		$this->load->view('backend/ucore_sitemenu',$data);
		$this->load->view('backend/ucore_sitesubheader',$data);
		$this->load->view('backend/ucore_keuangan',$data);
		$this->load->view('backend/ucore_sitefooter',$data);		
	}
	
	public function uangkeluar() {
		$this->general->session_check();
		$data['user_nama']	= $this->user_nama;
		$data['user_namaagent']	= $this->user_namaagent;
		$data['user_namaperusahaan']	= $this->user_namaperusahaan;
		$data['user_logo']	= $this->user_logo;
		$data['menu'] 		= "keuangan";
		$data['submenu']	= "uangkeluar";
		
		$data['themes_url'] = base_url() . $this->config->item('theme_backend');
		$data['site_form'] = "list";
		
		$this->load->view('backend/ucore_siteheader',$data);
		$this->load->view('backend/ucore_sitemenu',$data);
		$this->load->view('backend/ucore_sitesubheader',$data);
		$this->load->view('backend/ucore_keuangan',$data);
		$this->load->view('backend/ucore_sitefooter',$data);		
	}
	
	public function refund($aksi = "", $prod_order_id = "") {
		$this->general->session_check();
		$data['user_nama']	= $this->user_nama;
		$data['user_namaagent']	= $this->user_namaagent;
		$data['user_namaperusahaan']	= $this->user_namaperusahaan;
		$data['user_logo']	= $this->user_logo;
		$data['menu'] 		= "keuangan";
		$data['submenu']	= "refund";
		
		$data['themes_url'] = base_url() . $this->config->item('theme_backend');

		$tombol = $this->input->post("tombol",true);

		
		$data['prod_order_id'] = $prod_order_id;

		if ($aksi !=""){

			if ($tombol!="") {

				$prod_order_id 	= $this->input->post("prod_order_id",true);
				$nominal 		= $this->input->post("nominal",true);
				$keterangan 	= $this->input->post("keterangan",true);

				if ($aksi=="tambah") { $this->Ucore_model->refund_pembayaran($prod_order_id,$nominal,$keterangan); }
	
				$aksi = "";
				$pesan = "Refund Pembayaran Berhasil";
				$data['pesan'] = $pesan;

				redirect('keuangan/refund');
	
			}

			$data['site_form'] 	= "form_refund";

		} else {

			$pesan = "";
			$kode = "";
			$data['site_form'] = "form";

			if ($tombol!="") {
				$kode = $this->input->post("kode",true);

				$data_booking = $this->Ucore_model->get_history_pembayaran_kode($this->user_agentid,$kode);

				if (sizeof($data_booking)>0) { 
					$pesan = "";
					$data['site_form'] 			= "list_history_payment";
					$data['history_payment'] 	= $data_booking;

					$data['prod_order_id'] 		= $data_booking[0]['prod_order_id'];
					$data['total_bayar'] 		= $this->Ucore_model->total_bayar($this->user_agentid,$kode);
					$data['total_refund'] 		= $this->Ucore_model->total_refund($this->user_agentid,$kode);

					$total_bayar 	= ($data['total_bayar']['total_bayar']);
					$total_refund 	= ($data['total_refund']['total_refund']);

					$data['total_saldo'] 	= ($total_bayar - $total_refund); 

				} else { 
					$data['site_form'] = "form";
					$pesan = "Kode Booking tidak valid";					
				}

			}

			$data['pesan'] = $pesan;
		}

		$data['aksi'] = $aksi;
		
		
		$this->load->view('backend/ucore_siteheader',$data);
		$this->load->view('backend/ucore_sitemenu',$data);
		$this->load->view('backend/ucore_sitesubheader',$data);
		$this->load->view('backend/ucore_keuangan_refund',$data);
		$this->load->view('backend/ucore_sitefooter',$data);		
	}
	
	public function rekening($page="0") {
		$this->general->session_check();
		$data['user_nama']	= $this->user_nama;
		$data['user_namaagent']	= $this->user_namaagent;
		$data['user_namaperusahaan']	= $this->user_namaperusahaan;
		$data['user_logo']	= $this->user_logo;
		$data['menu'] 		= "keuangan";
		$data['submenu']	= "rekening";
		
		$data['themes_url'] = base_url() . $this->config->item('theme_backend');
		
		$this->load->view('backend/ucore_siteheader',$data);
		$this->load->view('backend/ucore_sitemenu',$data);
		$this->load->view('backend/ucore_sitesubheader',$data);
		$this->load->view('backend/ucore_keuangan_rekening',$data);
		$this->load->view('backend/ucore_sitefooter',$data);		
	}
	
}