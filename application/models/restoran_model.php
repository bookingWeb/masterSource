<?php
class restoran_model extends CI_Model  {
	function __construct() {
		parent::__construct();
	}

	//get_
	function get_restoran(){
		return $this->db->get('t_restoran')->result_array();
	}

	function get_single_restoran($idRestoran) {
		$this->db->select('*');
		$this->db->from('t_restoran');
		$this->db->where('id_restoran', $idRestoran);
		$query = $this->db->get();
		return $query->result();
	}

	function insertRestoran($nama_menu,$kategori,$satuan,$harga) {
		$input = array('nama_menu'=>$nama_menu,'kategori'=>$kategori,'satuan'=>$satuan,'harga'=>$harga);
		if($this->db->insert('t_restoran',$input)) return $msg = 'success';
		else return $msg = 'failed';
	}

	function updateRestoran($idRestoran,$nama_menu,$kategori,$satuan,$harga) {
		$input = array('nama_menu'=>$nama_menu,'kategori'=>$kategori,'satuan'=>$satuan,'harga'=>$harga);
		$this->db->where('id_restoran', $idRestoran);
		if($this->db->update('t_restoran', $input)) return $msg = 'success';
		else return $msg = 'failed';
	}

	function deleteRestoran($idRestoran){
		$this->db->where('id_restoran', $idRestoran);
		if($this->db->delete('t_restoran')) return $msg = 'success';
		else return $msg = 'failde';

	}
}