<?php
class inventory_model extends CI_Model  {
	function __construct() {
		parent::__construct();
	}

	//get_
	function get_inventory(){
		return $this->db->get('t_inventory')->result_array();
	}

	function get_single_inventory($idInventory) {
		$this->db->select('*');
		$this->db->from('t_inventory');
		$this->db->where('id_inventory', $idInventory);
		$query = $this->db->get();
		return $query->result();
	}

	function insertInventory($nama,$kategori,$jenis,$satuan) {
		$input = array('nama_inventory'=>$nama,'kategori_inventory'=>$kategori,'jenis_inventory'=>$jenis,'satuan'=>$satuan);
		if($this->db->insert('t_inventory',$input)) return $msg = 'success';
		else return $msg = 'failed';
	}

	function updateInventory($idInventory,$nama,$kategori,$jenis,$satuan) {
		$input = array('nama_inventory'=>$nama,'kategori_inventory'=>$kategori,'jenis_inventory'=>$jenis,'satuan'=>$satuan);
		$this->db->where('id_inventory', $idInventory);
		if($this->db->update('t_inventory', $input)) return $msg = 'success';
		else return $msg = 'failed';
	}

	function deleteInventory($idInventory){
		$this->db->where('id_inventory', $idInventory);
		if($this->db->delete('t_inventory')) return $msg = 'success';
		else return $msg = 'failde';

	}
}