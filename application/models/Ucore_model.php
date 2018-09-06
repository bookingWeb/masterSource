<?php
class Ucore_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    } 
	
	// Login Aplikasi
    function get_login($userid,$passwd) {
    	$sql = "select a.id, a.nama_lengkap, a.email, a.telepon, a.foto, a.agent_id, b.nama_agent, b.nama_perusahaan, b.logo, b.status_agent, a.agent_level, a.user_status from t_user a inner join t_agent b on a.agent_id = b.id where a.username = ? and a.password = ? and a.user_level = 3 "; 
		$query = $this->db->query($sql,array($userid,$passwd));
		return $query->result_array();
    }  
	 
	// Home 
	function get_jmljamaah_tahun($agentid,$tahun) {
		$sql = "select a.payment_status, count(b.id) as jumlah from t_product_order a inner join t_product_order_cust b
				on b.productorder_id = a.id inner join t_product_schedule c on a.id_schedule = c.id
				where a.id_agent = ? and year(c.start_date) = ? group by a.payment_status";
		$query = $this->db->query($sql,array($agentid,$tahun));
		return $query->result_array();
	}
	
	function get_jadwal_tahun($agentid,$tahun) {
		$sql = "select a.id, a.name_product, b.start_date, b.no_flight, b.quota, b.booked, b.mata_uang, b.price4
		from t_product a inner join t_product_schedule b on a.id = b.product_id 
		where a.agent_id = ? and year(b.start_date) = ? order by b.start_date ";
		$query = $this->db->query($sql,array($agentid,$tahun));
		return $query->result_array();
	}
	
	// Mengambil List Paket
	function get_paket($agentid) {
    	$sql = "SELECT id, name_product FROM t_product WHERE agent_id = ? ORDER BY name_product ASC"; 
		$query = $this->db->query($sql,array($agentid));
		return $query->result_array();
	}
	
	// ambil id kode booking
	function get_id_kode() {
    	$sql = "SELECT id, kode FROM t_kode_booking WHERE status_book = 0 limit 1"; 
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	// update status kode telah di gunakan
	function update_kodebooking($id) {
    	$sql = "UPDATE t_kode_booking SET status_book=1, tgl_book=now() WHERE id=?"; 
		$query = $this->db->query($sql,array($id));
	}
	
	// filter tanggal berangkat untuk dropdown tambah booking
	function get_tglberangkat($paketid){
		$sql = "SELECT id, start_date FROM t_product_schedule where product_id = ? ORDER BY start_date ASC"; 
		$query = $this->db->query($sql,array($paketid));
		return $query->result_array();
	}
	
	// insert data booking
	function booking_insert($userid,$agentid,$nama,$email,$telepon,$paketid,$idschedule,$jumlah,$kode_booking) {
		$sql = "insert into t_product_order (id_user,id_agent,channel_type,date_order,payment_status, nama_kontak,email,telepon,id_prod,id_schedule,jml,kode_booking) values (?,?,'ERP',now(),0,?,?,?,?,?,?,?) ";
		$this->db->query($sql,array($userid,$agentid,$nama,$email,$telepon,$paketid,$idschedule,$jumlah,$kode_booking));
	}

	function insertkamar($jenis,$jaminan,$fasilitas,$jumlah,$harga){
		$input = array('jenis_kamar'=>$jenis,'jaminan_kenyamanan'=>$jaminan,'fasilitas'=>$fasilitas,'jumlah'=>$jumlah,'harga'=>$harga);
		$this->db->insert('t_kamar',$input);
	}
	
	// update data booking
	function booking_update($userid,$agentid,$nama,$email,$telepon,$paketid,$idschedule,$jumlah,$kode_booking)
	{
		$sql = "UPDATE t_product_order SET id_user = ?,id_agent = ?,date_order = now(), payment_status = 0, nama_kontak = ?,email = ?, telepon = ?, id_prod = ?, id_schedule = ?,jml = ? WHERE kode_booking = ?";
		$this->db->query($sql,array($userid,$agentid,$nama,$email,$telepon,$paketid,$idschedule,$jumlah,$kode_booking));
	}
	//delete data booking
	public function booking_delete($id)
	{
		$sql 		= "DELETE FROM t_product_order WHERE id = ?";
		$query		= $this->db->query($sql,array($id));
	}
	//update data booking paket
	function bookingpaket_update($userid,$agentid,$paketid,$idschedule,$kode_booking)
	{
		$sql = "UPDATE t_product_order SET id_user = ?,id_agent = ?, id_prod = ?, id_schedule = ? WHERE kode_booking = ?";
		$this->db->query($sql,array($userid,$agentid,$paketid,$idschedule,$kode_booking));
	}
	//update data booking kontak
	function bookingkontak_update($userid,$agentid,$nama,$email,$telepon,$kode_booking)
	{
		$sql = "UPDATE t_product_order SET id_user = ?,id_agent = ?, nama_kontak = ?,email = ?, telepon = ? WHERE kode_booking = ?";
		$this->db->query($sql,array($userid,$agentid,$nama,$email,$telepon,$kode_booking));
	}
	// insert data jamaah
	function jamaah_insert($noktp,$ayah,$namalengkap,$jns_kelamin,$tempat_lahir,$tanggal_lahir,$alamat,
					$propinsi,$kabupaten,$kecamatan,$kelurahan,$kodepos,$pendidikan,$pekerjaan,$statuskawin,$pernah_haji,
					$golongandarah,$ukuran_pakaian,$mahram,$hub_mahram,$alamat_surat,$bph,$rambut,$alis,$hidung,$tinggi,$berat,$muka,$agentid){
		$sql = "INSERT INTO t_customer (
				no_ktp,
				nama_ayah,
				nama_lengkap,
				jenis_kelamin,
				tempat_lahir,
				tanggal_lahir,
				alamat,
				provinsi,
				kota_kab,
				kecamatan,
				kel_desa,
				kodepos,
				pendidikan,
				pekerjaan,
				status_perkawinan,
				pergi_haji,
				golongan_darah,
				ukuran_pakaian,
				nama_mahram,
				hub_mahram,
				alamat_surat_menyurat,
				status_bph,
				ciri_rambut,
				ciri_alis,
				ciri_hidung,
				tinggi,
				berat,
				muka,
				channel_reg,
				aff_code,
				reff_code,
				agent_id,
				upline_1,
				upline_2,
				upline_3,
				upline_4,
				upline_5,
				upline_6,
				upline_7,
				upline_8,
				upline_9,
				upline_10
				)
				VALUES
				(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0, 0, 0, ?, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
		$this->db->query($sql,array($noktp,$ayah,$namalengkap,$jns_kelamin,$tempat_lahir,$tanggal_lahir,$alamat,
					$propinsi,$kabupaten,$kecamatan,$kelurahan,$kodepos,$pendidikan,$pekerjaan,$statuskawin,$pernah_haji,
					$golongandarah,$ukuran_pakaian,$mahram,$hub_mahram,$alamat_surat,$bph,$rambut,$alis,$hidung,$tinggi,$berat,$muka,$agentid));
	}

	// ambil biaya paket 
	function get_biaya_paket($bookingid)
	{
		$sql = "SELECT b.price2 FROM t_product a
				LEFT JOIN t_product_schedule b
				ON b.product_id = a.id
				LEFT JOIN t_product_order c
				ON c.id_prod = a.id
				WHERE c.id = ?";
		$query = $this->db->query($sql,array($bookingid)); 
		return $query->row_array();
	}

	// insert data ke table t_product_order_cust
	function insert_prod_order_cust($bookingid,$lastjamaahid,$biaya) {
		$sql = "insert into t_product_order_cust (productorder_id,cust_id,biaya) values (?,?,?) ";
		$this->db->query($sql,array($bookingid,$lastjamaahid,$biaya));
	}
	
	// ambil data booking by agent
	function get_booking_by_agent($agentid,$page,$limit) {
		$offset = ($page-1)*$limit; 
		$sql = "select a.id, a.id_user, a.id_agent, a.channel_type, a.total_bayar, c.nama_cabang, a.nama_kontak, a.email, a.telepon, a.jml, a.kode_booking, d.name_product, e.start_date, a.payment_status from t_product_order a inner join t_user b on a.id_user = b.id inner join t_agent_cabang c on b.cabang_id = c.id left outer join t_product d on a.id_prod = d.id left outer join t_product_schedule e on a.id_schedule = e.id where a.id_agent = ? order by a.date_order desc LIMIT ?,? ";
		$query = $this->db->query($sql,array($agentid,intval($offset),intval($limit))); 
		return $query->result_array();		
	}
	// total jumlah booking by agent
	function jml_booking_by_agent($agentid)
	{
		$sql = "SELECT COUNT(*) as jumlah FROM t_product_order where id_agent=?";
		$query = $this->db->query($sql,array($agentid));
		return $query->result_array();
	}
	// search by kode booking, nama, telepon
	function get_booking_by_search($agentid,$search)
	{
		$sql = "select a.id, a.id_user, a.id_agent, c.nama_cabang, a.nama_kontak, a.email, a.telepon, a.jml, a.kode_booking, d.name_product, e.start_date, a.payment_status from t_product_order a inner join t_user b on a.id_user = b.id inner join t_agent_cabang c on b.cabang_id = c.id left outer join t_product d on a.id_prod = d.id left outer join t_product_schedule e on a.id_schedule = e.id where a.id_agent = ? AND (a.kode_booking = ? OR a.nama_kontak LIKE '%$search%' OR a.telepon LIKE '%$search%') order by a.date_order DESC";
		$query = $this->db->query($sql,array($agentid,$search)); 
		return $query->result_array();		
	}

	function get_kamar(){
		return $this->db->get('t_kamar')->result_array();
	}

	function get_kamar_by_search($search){
		return $this->db->query("SELECT * FROM t_kamar WHERE jenis_kamar like '%$search%' OR harga LIKE '%$search%' OR fasilitas LIKE '%$search%'")->result_array();
	}
	// total hasil search
	// function jml_booking_by_search($agentid,$search)
	// {
	// 	$sql = "SELECT COUNT(*) as jumlah FROM t_product_order where id_agent= ? AND (kode_booking = ? OR nama_kontak LIKE '%$search%' OR telepon LIKE '%$search%') ";
	// 	$query = $this->db->query($sql, array($agentid,$search));
	// 	return $query->result_array();
	// }

	function jml_kamar_by_search($search){
		return $this->db->query("SELECT COUNT(*) as jumlah FROM t_kamar where jenis_kamar LIKE '%$search%' OR fasilitas LIKE '%$search%' OR harga LIKE '%$search%'")->result_array();
	}	
	
	// detail booking by id
	function get_booking_by_id($id) { 
		$sql = "select a.id_user, a.id_agent, c.nama_cabang, a.nama_kontak, a.email, a.telepon, a.jml, a.kode_booking, d.id as id_paket, d.name_product, e.id as id_schedule, e.start_date, a.payment_status from t_product_order a inner join t_user b on a.id_user = b.id inner join t_agent_cabang c on b.cabang_id = c.id left outer join t_product d on a.id_prod = d.id left outer join t_product_schedule e on a.id_schedule = e.id where a.id = ? order by a.date_order desc ";
		$query = $this->db->query($sql,array($id)); 
		return $query->result_array();		
	}
	// detail jammah by id
	function get_jamaah_by_bookingid($id) { 
		$sql = "SELECT
				a.productorder_id,
				a.cust_id,
				b.no_ktp,
				b.nama_lengkap,
				b.jenis_kelamin,
				a.biaya_paket,
				b.paspor_id,
				c.no_paspor,
                d.id_prod,
                d.id_room,
                e.room_type,
                e.jenis_kasur
				FROM
				t_product_order_cust a
				LEFT JOIN t_customer b
					ON a.cust_id = b.id
				LEFT JOIN t_pasport c
					ON b.paspor_id = c.id
                LEFT JOIN t_product_order d 
                	ON d.id = a.productorder_id
                LEFT JOIN t_hotel_room e 
                	ON d.id_room = e.id 
				WHERE a.productorder_id = ?
				ORDER by b.nama_lengkap DESC";
		$query = $this->db->query($sql,array($id)); 
		return $query->result_array();		
	}

	function jamaah_by_bookingid_delete($custid){
		$sql = "DELETE FROM t_product_order_cust WHERE cust_id = ?";
		$query = $this->db->query($sql,array($custid));
	}
	
	// generate kode booking
    function kode_insert($kode) {
    	$sql = "insert into t_kode_booking (kode,status_book) values (?,0) ";
    	$this->db->query($sql,array($kode));
    }
	
	// cek duplikat kode booking
    function kode_cekdup() {
    	$sql = "select kode, count(*) as jumlah from t_kode_booking group by kode having count(*) > 1";
			$query = $this->db->query($sql); 
			return $query->result_array();    	
	}
	
	// insert data pasport 
	function pasport_insert($jenis,$kode_negara,$no_paspor,$nama,$jenis_kelamin,$kewarganegaraan,$tgl_lahir,$tempat_lahir,$tgl_pengeluaran,$tgl_expire,$reg_no,$kantor) {
		$sql = "insert into t_pasport (jenis_type,kode_negara,no_paspor,nama_lengkap,jenis_kelamin,kewarganegaraan,tgl_lahir,tempat_lahir,tgl_pengeluaran,tgl_habisberlaku,reg_no,kantor) values (?,?,?,?,?,?,?,?,?,?,?,?) ";
		$this->db->query($sql,array($jenis,$kode_negara,$no_paspor,$nama,$jenis_kelamin,$kewarganegaraan,$tgl_lahir,$tempat_lahir,$tgl_pengeluaran,$tgl_expire,$reg_no,$kantor));
	}
	
	// update passport id di t_customer
	function update_pasportid($cust_id, $lastpasportid){
		$sql = "UPDATE t_customer SET paspor_id = ? WHERE id = ?";
		$this->db->query($sql,array($lastpasportid,$cust_id));
	}
	
	// ambil data list room berdasarkan id product order
	function get_listhotel_room($prodid){
		$sql = "SELECT
				a.id,
				a.room_type,
				a.jenis_kasur
				FROM
				t_hotel_room a 
				LEFT JOIN t_hotel b 
				ON b.id = a.hotel_id
				LEFT JOIN t_product_item c
				ON c.item_type = 2 AND c.item_id = b.id
				LEFT JOIN t_product_schedule d 
				ON d.id = c.productschedule_id 
				LEFT JOIN t_product e 
				ON e.id = d.product_id
				WHERE e.id = ?
				ORDER BY a.room_type DESC";
		$query = $this->db->query($sql, array($prodid));
		return $query->result_array();
	}
	
	// update id room ke tabel t_produk_order
	function roomid_update($room_type,$kode_booking){
		$sql = "UPDATE t_product_order SET id_room = ? WHERE kode_booking = ?";
		$this->db->query($sql,array($room_type,$kode_booking));
	}
	
	// ambil data status dokumen
	function get_status_dokumen($custid){
		$sql = "SELECT nama_lengkap, no_ktp, tempat_lahir, tanggal_lahir, paspor_id, foto FROM t_customer WHERE id = ?";
		$query = $this->db->query($sql, array($custid));
		return $query->result_array();
	}
	
		//Get data Jamaah by Agent id
		function get_jamaah_by_agent($agentid,$page,$limit)
		{
			$offset = ($page-1)*$limit;
			
			$sql = "SELECT * FROM t_customer WHERE agent_id = ? order by nama_lengkap asc LIMIT ?,?";
			$query = $this->db->query($sql, array($agentid,intval($offset),intval($limit)));
			return $query->result_array();
		}
	
		function jml_jamaah_by_agent($agentid)
		{
			
			$sql = "SELECT COUNT(*) as jumlah FROM t_customer where agent_id = ?";
			$query = $this->db->query($sql, array($agentid));
			return $query->result_array();
		}
	
		// search by nama, telepon, no ktp
		function get_jamaah_by_search($agentid,$search)
		{
			$sql = "SELECT * from t_customer where agent_id = ? AND (nama_lengkap LIKE '%$search%' OR telepon LIKE '%$search%' OR no_ktp LIKE '%$search%') order by nama_lengkap ASC";
			$query = $this->db->query($sql,array($agentid)); 
			return $query->result_array();		
		}
	
		// total hasil search
		function jml_jamaah_by_search($agentid,$search)
		{
			$sql = "SELECT COUNT(*) as jumlah FROM t_customer where agent_id = ? AND (nama_lengkap LIKE '%$search%' OR telepon LIKE '%$search%' OR no_ktp LIKE '%$search%') ";
			$query = $this->db->query($sql, array($agentid));
			return $query->result_array();
		}
	
		function get_jamaah_by_id($id)
		{
			$sql = "SELECT * from t_customer where id = ?";
			$query = $this->db->query($sql,array($id)); 
			return $query->row_array();
		}
	
		// update data jamaah
		function jamaah_update($noktp,$ayah,$namalengkap,$jns_kelamin,$tempat_lahir,$tanggal_lahir,$alamat,
		$propinsi,$kabupaten,$kecamatan,$kelurahan,$kodepos,$pendidikan,$pekerjaan,$statuskawin,$pernah_haji,
		$golongandarah,$ukuran_pakaian,$mahram,$hub_mahram,$alamat_surat,$bph,$rambut,$alis,$hidung,$tinggi,$berat,$muka,$agentid,$id)
		{
			$sql = "UPDATE t_customer SET 
					no_ktp = ?,
					nama_ayah = ?,
					nama_lengkap = ?,
					jenis_kelamin = ?,
					tempat_lahir = ?,
					tanggal_lahir = ?,
					alamat = ?,
					provinsi = ?,
					kota_kab = ?,
					kecamatan = ?,
					kel_desa = ?,
					kodepos = ?,
					pendidikan = ?,
					pekerjaan = ?,
					status_perkawinan = ?,
					pergi_haji = ?,
					golongan_darah = ?,
					ukuran_pakaian = ?,
					nama_mahram = ?,
					hub_mahram = ?,
					alamat_surat_menyurat = ?,
					status_bph = ?,
					ciri_rambut = ?,
					ciri_alis = ?,
					ciri_hidung = ?,
					tinggi = ?,
					berat = ?,
					muka = ?
			WHERE agent_id = ? and id = ?";
			$this->db->query($sql,array($noktp,$ayah,$namalengkap,$jns_kelamin,$tempat_lahir,$tanggal_lahir,$alamat,
			$propinsi,$kabupaten,$kecamatan,$kelurahan,$kodepos,$pendidikan,$pekerjaan,$statuskawin,$pernah_haji,
			$golongandarah,$ukuran_pakaian,$mahram,$hub_mahram,$alamat_surat,$bph,$rambut,$alis,$hidung,$tinggi,$berat,$muka,$agentid,$id));
		}
	
		//delete data jamaah
		function delete_jamaah($agentid,$id)
		{
			$sql = "DELETE FROM t_customer WHERE agent_id = ? and id = ?";
			$query = $this->db->query($sql,array($agentid,$id)); 
		}
	
	// Travel
	function get_data_travel($agentid) { 
		$sql = "select nama_agent, nama_perusahaan, city, alamat, phone, fax, callcenter, web, email, no_ijin_haji, no_ijin_umroh, logo from t_agent where id = ? ";
		$query = $this->db->query($sql, array($agentid));
		return $query->result_array();
	} 
	
	function update_travel($agentid,$nama,$perusahaan,$alamat,$kota,$phone,$fax,$callcenter,$web,$email,$ijinhaji,$ijinumroh) {
		$sql = "update t_agent set nama_agent = ?, nama_perusahaan = ?, alamat = ?, city = ?, phone = ?, fax = ?, callcenter = ?, web = ?, email = ?, no_ijin_haji = ?, no_ijin_umroh = ? where id = ? ";
		$this->db->query($sql, array($nama,$perusahaan,$alamat,$kota,$phone,$fax,$callcenter,$web,$email,$ijinhaji,$ijinumroh,$agentid));
	}
	
	function get_data_cabang_travel($agentid) {
		$sql = "select a.id, a.kode_cabang, a.nama_cabang, a.cabang_level, a.alamat, a.kota_id, b.nama_kota, b.propinsi, a.phone, a.fax from t_agent_cabang a inner join t_kota_id b on a.kota_id = b.id where a.agent_id = ? ";
		$query = $this->db->query($sql, array($agentid));
		return $query->result_array();
	}
	
	function get_data_cabang($cabangid,$agentid) {
		$sql = "select kode_cabang, nama_cabang, cabang_level, alamat, kota_id, phone, fax from t_agent_cabang where id = ? and agent_id = ? ";
		$query = $this->db->query($sql, array($cabangid,$agentid));
		return $query->result_array();
	}
	
	function cabang_insert($agentid,$jenis,$kode,$nama,$alamat,$kota,$phone,$fax) {
		$sql = "insert into t_agent_cabang (agent_id,cabang_level,kode_cabang,nama_cabang,alamat,kota_id,phone,fax) values (?,?,?,?,?,?,?,?) ";
		$this->db->query($sql, array($agentid,$jenis,$kode,$nama,$alamat,$kota,$phone,$fax));
	}
	
	function cabang_update($cabangid,$agentid,$jenis,$kode,$nama,$alamat,$kota,$phone,$fax) {
		$sql = "update t_agent_cabang set cabang_level = ?, kode_cabang = ?, nama_cabang = ?, alamat = ?, kota_id = ?, phone = ?, fax = ? where id = ? and agent_id = ? ";
		$this->db->query($sql, array($jenis,$kode,$nama,$alamat,$kota,$phone,$fax,$cabangid,$agentid));
	}
	
	function cabang_delete($cabangid,$agentid) {
		$sql = "delete from t_agent_cabang where id = ? and agent_id = ?";
		$this->db->query($sql, array($cabangid,$agentid));
	}
	
	function get_data_kotaid() {
		$sql = "select id, nama_kota, propinsi from t_kota_id order by nama_kota";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	 
	// User Travel
	function get_user_travel($agentid) {
		$sql = "select a.id, a.nama_lengkap, a.username, a.email, a.telepon, a.alamat, a.kota, a.agent_level, a.cabang_id, b.nama_cabang from t_user a left outer join t_agent_cabang b on a.cabang_id = b.id where a.agent_id = ? order by a.nama_lengkap ";
		$query = $this->db->query($sql,array($agentid));
		return $query->result_array();
	}
	
	function get_user_travel_detail($userid,$agentid) {
		$sql = "select nama_lengkap, username, email, telepon, alamat, kota, agent_level, cabang_id from t_user where id = ? and agent_id = ?";
		$query = $this->db->query($sql,array($userid,$agentid));
		return $query->result_array();
	}
	
	function user_insert($nama,$username,$password,$email,$telepon,$alamat,$kota,$agentid,$agentlevel,$userlevel,$userstatus,$cabang) {
		$sql = "insert into t_user (nama_lengkap,username,password,email,telepon,alamat, kota,agent_id,agent_level,user_level,user_status,cabang_id) values (?,?,?,?,?,?, ?,?,?,?,?,?)";
		$this->db->query($sql,array($nama,$username,$password,$email,$telepon,$alamat,$kota,$agentid,$agentlevel,$userlevel,$userstatus,$cabang));
	}
	
	function user_update($userid,$agentid,$nama,$email,$telepon,$alamat,$kota,$agentlevel,$cabang) {
		$sql = "update t_user set nama_lengkap = ?, email = ?, telepon = ?, alamat = ?, kota = ?, agent_level = ?, cabang_id = ? where id = ? and agent_id = ?";
		$this->db->query($sql,array($nama,$email,$telepon,$alamat,$kota,$agentlevel,$cabang,$userid,$agentid));
	}
	
	function user_delete($userid,$agentid) {
		$sql = "delete from t_user where id = ? and agent_id = ?";
		$this->db->query($sql,array($userid,$agentid));
	}
	
	// Tour Leader Travel
	function get_tourleader_travel($agentid) {
		$sql = "select id, nama, email, telepon, alamat from t_tourleader where agent_id = ? order by nama ";
		$query = $this->db->query($sql,array($agentid));
		return $query->result_array();
	}
	
	function get_tourleader_travel_detail($tlid,$agentid) {
		$sql = "select nama, telepon, email, alamat from t_tourleader where id = ? and agent_id = ?";
		$query = $this->db->query($sql,array($tlid,$agentid));
		return $query->result_array();
	}
	
	function tourleader_insert($agentid,$nama,$telepon,$email,$alamat) {
		$sql = "insert into t_tourleader (agent_id,nama,telepon,email,alamat) values (?,?,?,?,?)";
		$this->db->query($sql,array($agentid,$nama,$telepon,$email,$alamat));
	}
	
	function tourleader_update($tlid,$agentid,$nama,$telepon,$email,$alamat) {
		$sql = "update t_tourleader set nama = ?, telepon = ?, email = ?, alamat = ? where id = ? and agent_id = ?";
		$this->db->query($sql,array($nama,$telepon,$email,$alamat,$tlid,$agentid));
	}
	
	function tourleader_delete($tlid,$agentid) {
		$sql = "delete from t_tourleader where id = ? and agent_id = ?";
		$this->db->query($sql,array($tlid,$agentid));
	}

	// Supplier Persediaan
	function get_supplier($agentid) {
		$sql = "select id, nama, email, telepon, alamat, keterangan from t_persediaan_supplier where agent_id = ? order by nama ";
		$query = $this->db->query($sql,array($agentid));
		return $query->result_array();
	}
	
	function get_supplier_detail($supid,$agentid) {
		$sql = "select nama, telepon, email, alamat, keterangan from t_persediaan_supplier where id = ? and agent_id = ?";
		$query = $this->db->query($sql,array($supid,$agentid));
		return $query->result_array();
	}
	
	function supplier_insert($agentid,$nama,$telepon,$email,$alamat,$keterangan) {
		$sql = "insert into t_persediaan_supplier (agent_id,nama,telepon,email,alamat,keterangan) values (?,?,?,?,?,?)";
		$this->db->query($sql,array($agentid,$nama,$telepon,$email,$alamat,$keterangan));
	}
	
	function supplier_update($supid,$agentid,$nama,$telepon,$email,$alamat,$keterangan) {
		$sql = "update t_persediaan_supplier set nama = ?, telepon = ?, email = ?, alamat = ?, keterangan = ? where id = ? and agent_id = ?";
		$this->db->query($sql,array($nama,$telepon,$email,$alamat,$keterangan,$supid,$agentid));
	}
	
	function supplier_delete($supid,$agentid) {
		$sql = "delete from t_persediaan_supplier where id = ? and agent_id = ?";
		$this->db->query($sql,array($supid,$agentid));
	}

	// Item Persediaan
	function get_itempersediaan($agentid) {
		$sql = "select id, kode, nama from t_persediaan_item where agent_id = ? order by kode, nama ";
		$query = $this->db->query($sql,array($agentid));
		return $query->result_array();
	}
	
	function get_itempersediaan_detail($itemid,$agentid) {
		$sql = "select kode, nama from t_persediaan_item where id = ? and agent_id = ?";
		$query = $this->db->query($sql,array($itemid,$agentid));
		return $query->result_array();
	}
	
	function itempersediaan_insert($agentid,$kode,$nama) {
		$sql = "insert into t_persediaan_item (agent_id,kode,nama) values (?,?,?)";
		$this->db->query($sql,array($agentid,$kode,$nama));
	}
	 
	function itempersediaan_update($itemid,$agentid,$kode,$nama) {
		$sql = "update t_persediaan_item set kode = ?, nama = ? where id = ? and agent_id = ?";
		$this->db->query($sql,array($kode,$nama,$itemid,$agentid));
	}
	
	function itempersediaan_delete($itemid,$agentid) {
		$sql = "delete from t_persediaan_item where id = ? and agent_id = ?";
		$this->db->query($sql,array($itemid,$agentid));
	}
	
	// Paket Travel
	function get_pakettravel($agentid,$kategori) {
		$sql = "select a.id, a.name_product, a.deskripsi, a.durasi, a.pembimbing_id, b.nama from t_product a left outer join t_pembimbing b on a.pembimbing_id = b.id where a.agent_id = ? and a.productcategory_id = ? order by a.name_product ";
		$query = $this->db->query($sql,array($agentid,$kategori));
		return $query->result_array();
	}
	
	function get_pakettravel_detail($paketid,$agentid) {
		$sql = "select a.name_product, a.deskripsi, a.durasi, a.pembimbing_id, b.nama from t_product a left outer join t_pembimbing b on a.pembimbing_id = b.id where a.id = ? and a.agent_id = ? ";
		$query = $this->db->query($sql,array($paketid,$agentid));
		return $query->result_array(); 
	}
	
	function get_pembimbing() {
		$sql = "select id, nama from t_pembimbing order by nama";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function product_insert($agentid,$kategori,$nama,$slugname,$deskripsi,$durasi,$pembimbing) {
		$sql = "insert into t_product (agent_id,productcategory_id,name_product, slugname, deskripsi, durasi, pembimbing_id) values (?,?,?,?,?,?,?) ";
		$this->db->query($sql,array($agentid,$kategori,$nama,$slugname,$deskripsi,$durasi,$pembimbing));
	}
	
	function product_update($productid,$agentid,$nama,$slugname,$deskripsi,$durasi,$pembimbing) {
		$sql = "update t_product set name_product = ?, slugname = ?, deskripsi = ?, durasi = ?, pembimbing_id = ? where id = ? and agent_id = ? ";
		$this->db->query($sql,array($nama,$slugname,$deskripsi,$durasi,$pembimbing,$productid,$agentid));
	}
	
	function product_delete($productid,$agentid) {
		$sql = "delete from t_product where id = ? and agent_id = ? ";
		$this->db->query($sql,array($productid,$agentid));
	}
	
	function get_jadwal_pakettravel($productid,$agentid) {
		$sql = "select a.id, a.productschedule_status, a.no_flight, a.quota, a.mata_uang, a.price2, a.price3, a.price4, a.start_date, a.end_date from t_product_schedule a inner join t_product b on a.product_id = b.id where a.product_id = ? and b.agent_id = ? ";
		$query = $this->db->query($sql,array($productid,$agentid));
		return $query->result_array(); 
	}

	function get_jadwal_pakettravel_detail($jadwalid,$agentid) {
		$sql = "select a.productschedule_status, a.no_flight, a.quota, a.mata_uang, a.price2, a.price3, a.price4, a.start_date, a.end_date from t_product_schedule a inner join t_product b on a.product_id = b.id where a.id = ? and b.agent_id = ? ";
		$query = $this->db->query($sql,array($jadwalid,$agentid));
		return $query->result_array(); 
	}
	
	function get_pesawat() {
		$sql = "select id, nama from t_flight order by nama ";
		$query = $this->db->query($sql);
		return $query->result_array(); 
	}

	function get_hotel() {
		$sql = "select a.id, a.name, a.kotasa_id, b.nama_kota from t_hotel a inner join t_kota_sa b on a.kotasa_id = b.id order by a.name ";
		$query = $this->db->query($sql);
		return $query->result_array(); 
	}

	function history_payment($bookingid){
		$sql = "SELECT * FROM t_payment_history a
		LEFT JOIN t_product_order b
		ON a.prod_order_id = b.id
		LEFT JOIN t_product c
		ON b.id_prod = c.id
		WHERE b.id = ? AND (a.payment_status = 1 OR a.payment_status = 3)";
		$query = $this->db->query($sql,array($bookingid));
		return $query->result_array();
	}

	function history_payment_by_bookingid($bookingid){
		$sql = "SELECT *, a.id as id_payment FROM t_payment_history a
		LEFT JOIN t_product_order b
		ON a.prod_order_id = b.id
		LEFT JOIN t_product c
		ON b.id_prod = c.id
		WHERE b.id = ?";
		$query = $this->db->query($sql,array($bookingid));
		return $query->result_array();
	}

	function get_jml_jamaah_by_bookingid($bookingid)
	{
		$sql = "SELECT COUNT(*) as jumlah FROM
				t_product_order_cust a
				LEFT JOIN t_customer b
					ON a.cust_id = b.id
				LEFT JOIN t_pasport c
					ON b.paspor_id = c.id
                LEFT JOIN t_product_order d 
                	ON d.id = a.productorder_id
                LEFT JOIN t_hotel_room e 
                	ON d.id_room = e.id 
				WHERE a.productorder_id = ?
				ORDER by b.nama_lengkap DESC";
		$query = $this->db->query($sql,array($bookingid)); 
		return $query->row_array();	
	}

	function get_paket_booking($bookingid)
	{
		$sql = "SELECT * FROM t_product_order a
				LEFT JOIN t_product b
				ON a.id_prod = b.id WHERE a.id = ?";
		$query = $this->db->query($sql,array($bookingid)); 
		return $query->row_array();	
	}

	function get_history_pembayaran_byagent($agentid)
	{ 
		$sql = "SELECT a.id, a.amount, a.payment_status, a.payment_date, a.prod_order_id, 
		b.kode_booking, b.nama_kontak, b.email, b.telepon, c.name_product, d.start_date, d.end_date,
		a.rekening_id, a.keterangan FROM t_payment_history a
					LEFT JOIN t_product_order b ON a.prod_order_id = b.id
					LEFT JOIN t_product c ON b.id_prod = c.id
					left join t_product_schedule d on b.id_schedule = d.id
				WHERE b.id_agent = ?";
		$query = $this->db->query($sql,array($agentid)); 
		return $query->result_array();
	}
	
	function rekening_insert($bank_pengirim,$no_rek,$pemilik,$agentid)
	{
		$sql = "insert into t_rekening (nama_bank,no_rekening,pemilik_rekening,agent_id) values (?,?,?,?) ";
		$this->db->query($sql,array($bank_pengirim,$no_rek,$pemilik,$agentid));
	}

	function status_payment_insert($nominal,$metode,$rekening,$keterangan,$bookingid)
	{
		$sql = "INSERT INTO t_payment_history (amount,payment_status,payment_date,chanel_bayar,rekening_id,keterangan,prod_order_id,trans_type) VALUES (?,1,NOW(),?,?,?,?,1)";
		$this->db->query($sql,array($nominal,$metode,$rekening,$keterangan,$bookingid));
	}

	function payment_cash($nominal,$metode,$keterangan,$bookingid)
	{
		$sql = "insert into t_payment_history (amount,payment_status,payment_date,prod_order_id,keterangan,trans_type) values (?,?,NOW(),?,?,1) ";
		$this->db->query($sql,array($nominal,$metode,$bookingid,$keterangan));
	}

	function get_rekening_bank($agentid)
	{
		$sql = "SELECT a.id as id_rekening, a.agent_id, a.bank_id, a.mata_uang, a.no_rekening, a.pemilik_rekening, b.kode, b.nama_bank FROM t_rekening a LEFT JOIN t_bank b ON a.bank_id = b.id WHERE a.agent_id = ?";
		$query = $this->db->query($sql,array($agentid)); 
		return $query->result_array();
	}

	function get_bank()
	{
		$sql = "SELECT * FROM t_bank ORDER BY kode ASC";
		$query = $this->db->query($sql); 
		return $query->result_array();
	}

	function get_rekening_bank_byid($rekid,$agentid)
	{
		$sql = "SELECT * FROM t_rekening WHERE id = ? and agent_id = ?";
		$query = $this->db->query($sql,array($rekid,$agentid)); 
		return $query->result_array();
	}

	function rekening_agent_insert($agentid,$bank_id,$no_rekening,$pemilik_rekening,$mata_uang)
	{
		$sql = "INSERT INTO t_rekening (agent_id,bank_id,no_rekening,pemilik_rekening,mata_uang) values (?,?,?,?,?) ";
		$this->db->query($sql,array($agentid,$bank_id,$no_rekening,$pemilik_rekening,$mata_uang));
	}

	function rekening_agent_update($rekid,$agentid,$bank_id,$no_rekening,$pemilik_rekening,$mata_uang)
	{
		$sql = "UPDATE t_rekening set bank_id = ?, no_rekening = ?, pemilik_rekening = ?, mata_uang = ? where id = ? and agent_id = ?";
		$this->db->query($sql,array($bank_id,$no_rekening,$pemilik_rekening,$mata_uang,$rekid,$agentid));
	}

	function rekening_agent_delete($rekid,$agentid)
	{
		$sql = "DELETE from t_rekening where id = ? and agent_id = ? ";
		$this->db->query($sql,array($rekid,$agentid));
	}

	function get_rekening_bysearch($agentid,$search)
	{
		$sql = "SELECT * FROM t_rekening a LEFT JOIN t_bank b ON a.bank_id = b.id WHERE a.agent_id = ? AND (a.no_rekening LIKE '%$search%' OR a.pemilik_rekening LIKE '%$search%')";
		$query = $this->db->query($sql,array($agentid)); 
		return $query->result_array();
	}

	function get_booking_by_kode($kodebooking)
	{
		$sql = "select a.id, a.id_user, a.id_agent, a.channel_type, a.total_bayar, c.nama_cabang, a.nama_kontak, a.email, a.telepon, a.jml, a.kode_booking, d.name_product, e.start_date, a.payment_status from t_product_order a inner join t_user b on a.id_user = b.id inner join t_agent_cabang c on b.cabang_id = c.id left outer join t_product d on a.id_prod = d.id left outer join t_product_schedule e on a.id_schedule = e.id where a.kode_booking = ? order by a.date_order";
		$query = $this->db->query($sql,array($kodebooking)); 
		return $query->result_array();
	}

	function total_amount_by_order($bookingid)
	{
		$sql = "SELECT SUM(amount) AS total FROM t_payment_history WHERE prod_order_id = ?";
		$query = $this->db->query($sql,array($bookingid)); 
		return $query->row_array();
	}

	function total_bayar_by_order($bookingid)
	{
		$sql = "SELECT total_bayar FROM t_product_order WHERE id = ?";
		$query = $this->db->query($sql,array($bookingid)); 
		return $query->row_array();
	}

	function update_payment_status($bookingid,$agentid)
	{
		$sql = "UPDATE t_product_order set payment_status = 1 where id = ? and id_agent = ?";
		$this->db->query($sql,array($bookingid,$agentid));
	}

	function update_payment_status_refund($bookingid,$agentid)
	{
		$sql = "UPDATE t_product_order set payment_status = 2 where id = ? and id_agent = ?";
		$this->db->query($sql,array($bookingid,$agentid));
	}

	function get_userteam_byagent($agentid)
	{
		$sql = "SELECT a.id as id_userteam, a.agent_id, a.kode, a.nama as nama_userteam, a.channel_type, a.keterangan, b.kode, b.nama as nama_channel FROM t_user_team a 
				LEFT JOIN t_channel_type b 
				ON a.channel_type = b.id WHERE agent_id = ?";
		$query = $this->db->query($sql,array($agentid)); 
		return $query->result_array();
	}

	function get_channel_type()
	{
		$sql = "SELECT * FROM t_channel_type";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function get_userteam_byid($userid,$agentid)
	{
		$sql = "SELECT a.id as id_userteam, a.agent_id, a.kode, a.nama as nama_userteam, a.channel_type, a.keterangan, b.kode, b.nama as nama_channel FROM t_user_team a 
				LEFT JOIN t_channel_type b 
				ON a.channel_type = b.id WHERE a.id = ? AND a.agent_id = ?";
		$query = $this->db->query($sql,array($userid,$agentid)); 
		return $query->result_array();
	}

	function userteam_insert($agentid,$kode,$nama,$channelid,$keterangan)
	{
		$sql = "INSERT INTO t_user_team (agent_id,kode,nama,channel_type,keterangan) values (?,?,?,?,?) ";
		$this->db->query($sql,array($agentid,$kode,$nama,$channelid,$keterangan));
	}

	function userteam_update($id,$agentid,$kode,$nama,$channelid,$keterangan)
	{
		$sql = "UPDATE t_user_team set kode = ?, nama = ?, channel_type = ?, keterangan = ? where id = ? and agent_id = ?";
		$this->db->query($sql,array($kode,$nama,$channelid,$keterangan,$id,$agentid));
	}

	function userteam_delete($id,$agentid)
	{
		$sql = "DELETE from t_user_team where id = ? and agent_id = ? ";
		$this->db->query($sql,array($id,$agentid));
	}

	function get_userteam_bysearch($agentid,$search)
	{
		$sql = "SELECT a.id as id_userteam, a.agent_id, a.kode, a.nama as nama_userteam, a.channel_type, a.keterangan, b.kode, b.nama as nama_channel FROM t_user_team a 
				LEFT JOIN t_channel_type b 
				ON a.channel_type = b.id WHERE a.agent_id = ? AND (a.kode LIKE '%$search%' OR a.nama LIKE '%$search%' OR a.keterangan LIKE '%$search%')";
		$query = $this->db->query($sql,array($agentid)); 
		return $query->result_array();
	}

	function get_history_pembayaran_kode($agentid,$kodebooking)
	{
		$sql = "SELECT a.id, a.amount, a.payment_status, a.payment_date, a.prod_order_id, 
						b.kode_booking, a.chanel_bayar, a.trans_type, b.nama_kontak, b.email, b.telepon, c.name_product, d.start_date, d.end_date,
						a.rekening_id, a.keterangan, e.no_rekening, e.pemilik_rekening, f.nama_bank, f.kode FROM t_payment_history a
									LEFT JOIN t_product_order b ON a.prod_order_id = b.id
									LEFT JOIN t_product c ON b.id_prod = c.id
									left join t_product_schedule d on b.id_schedule = d.id
									LEFT JOIN t_rekening e on a.rekening_id = e.id
									LEFT JOIN t_bank f on e.bank_id = f.id
						WHERE b.id_agent = ? and b.kode_booking = ?";
		$query = $this->db->query($sql,array($agentid,$kodebooking)); 
		return $query->result_array();
	}

	function refund_pembayaran($prod_order_id,$nominal,$keterangan)
	{
		$sql = "INSERT INTO t_payment_history (amount,payment_status,payment_date,prod_order_id,keterangan,trans_type) values (?,3,NOW(),?,?,2)";
		$this->db->query($sql,array($nominal,$prod_order_id,$keterangan));
	}

	function total_bayar($agentid,$kode)
	{
		$sql = "SELECT SUM(amount) AS total_bayar FROM t_payment_history a 
					LEFT JOIN t_product_order b 
					ON a.prod_order_id = b.id
					WHERE a.trans_type = 1 and b.id_agent = ? and b.kode_booking = ?";
		$query = $this->db->query($sql,array($agentid,$kode)); 
		return $query->row_array();
	}

	function total_refund($agentid,$kode)
	{
		$sql = "SELECT SUM(amount) AS total_refund FROM t_payment_history a 
					LEFT JOIN t_product_order b 
					ON a.prod_order_id = b.id
					WHERE a.trans_type = 2 and b.id_agent = ? and b.kode_booking = ?";
		$query = $this->db->query($sql,array($agentid,$kode)); 
		return $query->row_array();
	}

	function total_bayar_byid($agentid,$id)
	{
		$sql = "SELECT SUM(amount) AS total_bayar FROM t_payment_history a 
					LEFT JOIN t_product_order b 
					ON a.prod_order_id = b.id
					WHERE a.trans_type = 1 and b.id_agent = ? and b.id = ?";
		$query = $this->db->query($sql,array($agentid,$id)); 
		return $query->row_array();
	}

	function total_refund_byid($agentid,$id)
	{
		$sql = "SELECT SUM(amount) AS total_refund FROM t_payment_history a 
					LEFT JOIN t_product_order b 
					ON a.prod_order_id = b.id
					WHERE a.trans_type = 2 and b.id_agent = ? and b.id = ?";
		$query = $this->db->query($sql,array($agentid,$id)); 
		return $query->row_array();
	}

	function get_penerbangan_byagent($agentid)
	{
		$sql = "SELECT a.id as id_schedule, a.date_arrival, a.date_depart, a.duration, a.city_arrival, a.city_depart, a.quota, a.booked, a.price, a.margin, a.is_active, b.type_pesawat, a.kode_penerbangan, c.kode_maskapai, c.nama_maskapai, d.nama_kelas, a.kategori_jual, e.nama_kelas FROM t_flight_schedule a 
				LEFT JOIN t_flight b 
				ON a.flight_id = b.id
				LEFT JOIN t_flight_maskapai c 
				ON a.flight_id = c.id
				LEFT JOIN t_flight_class d 
				ON b.kelas_id = d.id
				LEFT JOIN t_flight_class e 
				ON a.kelas_id = e.id
				WHERE a.agent_id = ?";
		$query = $this->db->query($sql,array($agentid)); 
		return $query->result_array();
	}

	function get_maskapai_byagent($agentid)
	{
		$sql = "SELECT * FROM t_flight_maskapai WHERE agent_id = ?";
		$query = $this->db->query($sql,array($agentid)); 
		return $query->result_array();
	}

	function get_city()
	{
		$sql = "SELECT * FROM t_city";
		$query = $this->db->query($sql); 
		return $query->result_array();
	}

	function get_seat_class()
	{
		$sql = "SELECT * FROM t_flight_class";
		$query = $this->db->query($sql); 
		return $query->result_array();
	}

	function stok_penerbangan_insert($maskapai,$kode_penerbangan,$date_arrival,$date_depart,$time_arrival,$time_depart,$city_arival,$city_depart,$duration,$quota,$price,$margin,$seat_class,$kategori_jual,$is_active,$agentid)
	{
		$sql = "INSERT INTO t_flight_schedule (flight_id,kode_penerbangan,date_arrival,date_depart,timezone_depart,timezone_arrival,duration,city_arrival,city_depart,quota,price,margin,kelas_id,kategori_jual,is_active,agent_id) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$this->db->query($sql,array($maskapai,$kode_penerbangan,$date_arrival,$date_depart,$time_depart,$time_arrival,$duration,$city_arival,$city_depart,$quota,$price,$margin,$seat_class,$kategori_jual,$is_active,$agentid));
	}

	function stok_penerbangan_update($maskapai,$kode_penerbangan,$date_arrival,$date_depart,$time_arrival,$time_depart,$city_arival,$city_depart,$duration,$quota,$price,$margin,$seat_class,$kategori_jual,$is_active,$idschedule,$agentid)
	{
		$sql = "UPDATE t_flight_schedule set flight_id = ?, kode_penerbangan = ?, date_arrival = ?, date_depart = ?, timezone_depart = ?,timezone_arrival = ?,duration = ?,city_arrival = ?,city_depart = ?,quota = ?,price = ?, margin = ?,kelas_id = ?, kategori_jual = ?, is_active = ? where id = ? and agent_id = ?";
		$this->db->query($sql,array($maskapai,$kode_penerbangan,$date_arrival,$date_depart,$time_arrival,$time_depart,$city_arival,$city_depart,$duration,$quota,$price,$margin,$seat_class,$kategori_jual,$is_active,$idschedule,$agentid));
	}

	function stok_penerbangan_delete($idschedule,$agentid)
	{
		$sql = "DELETE FROM t_flight_schedule where id = ? and agent_id = ?";
		$this->db->query($sql,array($idschedule,$agentid));
	}

	function get_penerbangan_byid($id,$agentid)
	{
		$sql = "SELECT a.id as id_schedule, a.flight_id as id_maskapai, d.id as id_class, a.kelas_id, a.date_arrival, a.date_depart, a.timezone_depart, a.timezone_arrival, a.duration, a.city_arrival, a.city_depart, a.quota, a.booked, a.price, a.margin, a.is_active, b.type_pesawat, a.kode_penerbangan, c.kode_maskapai, c.nama_maskapai, d.nama_kelas, a.kategori_jual, e.nama_kelas FROM t_flight_schedule a 
				LEFT JOIN t_flight b 
				ON a.flight_id = b.id
				LEFT JOIN t_flight_maskapai c 
				ON a.flight_id = c.id
				LEFT JOIN t_flight_class d 
				ON b.kelas_id = d.id
				LEFT JOIN t_flight_class e 
				ON a.kelas_id = e.id
				WHERE a.id = ? and a.agent_id = ?";
		$query = $this->db->query($sql,array($id,$agentid)); 
		return $query->result_array();
	}

	function get_hotel_schedule_agent($agentid)
	{
		$sql = "SELECT a.id, c.name, b.room_type, c.address, a.start_date, a.end_date, a.durasi, a.stock, a.price, a.margin FROM t_hotel_schedule a 
				LEFT JOIN t_hotel_room b 
				ON a.room_id = b.id
				LEFT JOIN t_hotel c 
				ON a.hotel_id = c.id
				WHERE a.agent_id = ?";
		$query = $this->db->query($sql,array($agentid)); 
		return $query->result_array();
	}

	function get_room()
	{
		$sql = "SELECT * FROM t_hotel_room";
		$query = $this->db->query($sql); 
		return $query->result_array();
	}

	function stok_hotel_insert($hotelid,$roomid,$checkin,$checkout,$durasi,$stock,$price,$margin,$agentid)
	{
		$sql = "INSERT INTO t_hotel_schedule (hotel_id,room_id,start_date,end_date,durasi,stock,price,margin,agent_id) values (?,?,?,?,?,?,?,?,?)";
		$this->db->query($sql,array($hotelid,$roomid,$checkin,$checkout,$durasi,$stock,$price,$margin,$agentid));
	}

	function stok_hotel_update($hotelid,$roomid,$checkin,$checkout,$durasi,$stock,$price,$margin,$idschedule,$agentid)
	{
		$sql = "UPDATE t_hotel_schedule set hotel_id = ?, room_id = ?, start_date = ?, end_date = ?, durasi = ?,stock = ?,price = ?, margin = ? where id = ? and agent_id = ?";
		$this->db->query($sql,array($hotelid,$roomid,$checkin,$checkout,$durasi,$stock,$price,$margin,$idschedule,$agentid));
	}

	function stok_hotel_delete($id,$agentid)
	{
		$sql = "DELETE FROM t_hotel_schedule WHERE id = ? and agent_id = ?";
		$this->db->query($sql,array($id,$agentid));
	}

	function get_hotel_scheduleid($idschedule,$agentid)
	{
		$sql = "SELECT a.id, a.hotel_id, a.room_id, a.start_date, a.end_date, a.durasi, a.stock, a.price, a.margin FROM t_hotel_schedule a 
				WHERE a.id = ? AND a.agent_id = ?";
		$query = $this->db->query($sql,array($idschedule,$agentid));
		return $query->result_array();
	}

	function get_provider_visa($agentid)
	{
		$sql = "SELECT * FROM t_pasport_provider 
				WHERE agent_id = ?";
		$query = $this->db->query($sql,array($agentid));
		return $query->result_array();
	}

	function provider_visa_insert($nama_provider,$telepon,$alamat,$harga,$agentid)
	{
		$sql = "INSERT INTO t_pasport_provider (nama_provider,no_telp,alamat,price,agent_id) values (?,?,?,?,?)";
		$this->db->query($sql,array($nama_provider,$telepon,$alamat,$harga,$agentid));
	}

	function get_provider_visaid($idprovider,$agentid)
	{
		$sql = "SELECT * FROM t_pasport_provider 
				WHERE id = ? AND agent_id = ?";
		$query = $this->db->query($sql,array($idprovider,$agentid));
		return $query->result_array();
	}

	function provider_visa_update($nama_provider,$telepon,$alamat,$harga,$idprovider,$agent_id)
	{
		$sql = "UPDATE t_pasport_provider set nama_provider = ?, no_telp = ?, alamat = ?, price = ? where id = ? and agent_id = ?";
		$this->db->query($sql,array($nama_provider,$telepon,$alamat,$harga,$idprovider,$agent_id));
	}

	function provider_visa_delete($id,$agentid)
	{
		$sql = "DELETE FROM t_pasport_provider WHERE id = ? and agent_id = ?";
		$this->db->query($sql,array($id,$agentid));
	}

	function get_persediaan_agentid($agentid)
	{
		$sql = "SELECT a.id as id_persediaan, a.jumlah, a.hpp, a.harga_jual, b.kode, b.nama, b.product_type FROM t_persediaan a 
				LEFT JOIN t_persediaan_item b 
				ON a.item_id = b.id 
				WHERE a.agent_id = ?";
		$query = $this->db->query($sql,array($agentid));
		return $query->result_array();
	}

	function get_persediaan_item($agentid)
	{
		$sql = "SELECT * FROM `t_persediaan_item` WHERE agent_id = ?";
		$query = $this->db->query($sql,array($agentid));
		return $query->result_array();
	}

	function persediaan_insert($id_barang,$harga_barang,$hpp,$qty,$idcabang,$agentid)
	{
		$sql = "INSERT INTO t_persediaan (item_id,harga_jual,hpp,jumlah,cabang_id,agent_id) values (?,?,?,?,?,?)";
		$this->db->query($sql,array($id_barang,$harga_barang,$hpp,$qty,$idcabang,$agentid));
	}

	function persediaan_update($id_barang,$harga_barang,$hpp,$qty,$idcabang,$idbarang,$agentid)
	{
		$sql = "UPDATE t_persediaan set item_id = ?, harga_jual = ?, hpp = ?, jumlah = ?, cabang_id = ? where id = ? and agent_id = ?";
		$this->db->query($sql,array($id_barang,$harga_barang,$hpp,$qty,$idcabang,$idbarang,$agentid));
	}

	function persediaan_delete($idbarang,$agentid)
	{
		$sql = "DELETE FROM t_persediaan WHERE id = ? and agent_id = ?";
		$this->db->query($sql,array($idbarang,$agentid));
	}


	function get_persediaanid($idbarang,$agentid)
	{
		$sql = "SELECT * FROM t_persediaan a 
				LEFT JOIN t_persediaan_item b 
				ON a.item_id = b.id
				WHERE a.id = ? and a.agent_id = ?";
		$query = $this->db->query($sql,array($idbarang,$agentid));
		return $query->result_array();
	}

	function get_persediaan_mutasi($agentid)
	{
		$sql = "SELECT a.id as id_mutasi, a.no_mutasi, d.nama as nama_suplier, a.tanggal, e.nama as nama_barang, b.jumlah, a.jenis, a.cabang_id, a.supplier_id, a.keterangan FROM t_persediaan_mutasi a 
				LEFT JOIN t_persediaan_mutasi_item b 
				ON a.id = b.persediaanmutasi_id
				LEFT JOIN t_persediaan c 
				ON b.persediaan_id = c.id
				LEFT JOIN t_persediaan_supplier d 
				ON a.supplier_id = d.id 
				LEFT JOIN t_persediaan_item e 
				ON c.item_id = e.id
				WHERE a.agent_id = ? and (a.jenis = 1 OR a.jenis = 2)";
		$query = $this->db->query($sql,array($agentid));
		return $query->result_array();
	}
	
	function barangmasuk_insert($no_mutasi,$id_barang,$id_suplier,$tanggal,$qty,$jenis,$keterangan,$id_cabang,$user_id,$agentid)
	{
		$sql = "INSERT INTO t_persediaan_mutasi (no_mutasi,jenis,tanggal,supplier_id,user_id,cabang_id,keterangan,agent_id) values (?,?,?,?,?,?,?,?)";
		$this->db->query($sql,array($no_mutasi,$jenis,$tanggal,$id_suplier,$user_id,$id_cabang,$keterangan,$agentid));
	}

	function persediaan_mutasi_insert($lastid,$id_barang,$qty)
	{
		$sql = "INSERT INTO t_persediaan_mutasi_item (persediaanmutasi_id,persediaan_id,jumlah) values (?,?,?)";
		$this->db->query($sql,array($lastid,$id_barang,$qty));
	}

	function barangmasuk_update($no_mutasi,$id_barang,$id_suplier,$tanggal,$qty,$jenis,$keterangan,$id_cabang,$user_id,$idmutasi)
	{
		$sql = "UPDATE t_persediaan_mutasi set no_mutasi = ?, jenis = ? , tanggal = ?, supplier_id = ?, user_id = ?, cabang_id = ? , keterangan = ? where id = ?";
		$this->db->query($sql,array($no_mutasi,$jenis,$tanggal,$id_suplier,$user_id,$id_cabang,$keterangan,$idmutasi));
	}

	function persediaan_mutasi_update($id_barang,$qty,$idmutasi)
	{
		$sql = "UPDATE t_persediaan_mutasi_item SET persediaan_id = ?, jumlah = ? where persediaanmutasi_id = ?";
		$this->db->query($sql,array($id_barang,$qty,$idmutasi));
	}

	function persediaan_mutasi_delete($id_barang,$idmutasi)
	{
		$sql = "DELETE FROM t_persediaan_mutasi_item WHERE persediaan_id = ? and persediaanmutasi_id = ?";
		$this->db->query($sql,array($id_barang,$idmutasi));
	}
	

	function get_persediaan_mutasiid($idmutasi,$agentid)
	{
		$sql = "SELECT a.id as id_mutasi, c.item_id, a.no_mutasi, d.nama as nama_suplier, a.tanggal, e.nama as nama_barang, b.jumlah, a.jenis, a.cabang_id, a.supplier_id, a.keterangan FROM t_persediaan_mutasi a 
				LEFT JOIN t_persediaan_mutasi_item b 
				ON a.id = b.persediaanmutasi_id
				LEFT JOIN t_persediaan c 
				ON b.persediaan_id = c.id
				LEFT JOIN t_persediaan_supplier d 
				ON a.supplier_id = d.id 
				LEFT JOIN t_persediaan_item e 
				ON c.item_id = e.id
				WHERE a.id = ? AND a.agent_id = ?";
		$query = $this->db->query($sql,array($idmutasi,$agentid));
		return $query->result_array();
	}

	function barangmasuk_delete($idmutasi,$agentid)
	{
		$sql = "DELETE FROM t_persediaan_mutasi WHERE id = ? and agent_id = ?";
		$this->db->query($sql,array($idmutasi,$agentid));
	}

	function get_barang_keluar($agentid)
	{
		$sql = "SELECT a.id as id_mutasi, a.no_mutasi, d.nama as nama_suplier, a.tanggal, e.nama as nama_barang, b.jumlah, a.jenis, a.cabang_id, a.supplier_id, a.keterangan FROM t_persediaan_mutasi a 
				LEFT JOIN t_persediaan_mutasi_item b 
				ON a.id = b.persediaanmutasi_id
				LEFT JOIN t_persediaan c 
				ON b.persediaan_id = c.id
				LEFT JOIN t_persediaan_supplier d 
				ON a.supplier_id = d.id 
				LEFT JOIN t_persediaan_item e 
				ON c.item_id = e.id
				WHERE a.agent_id = ? and (a.jenis = 3 OR a.jenis = 4)";
		$query = $this->db->query($sql,array($agentid));
		return $query->result_array();
	}

	function barangkeluar_insert($no_mutasi,$id_barang,$tanggal,$qty,$jenis,$keterangan,$user_id,$user_agentid)
	{
		$sql = "INSERT INTO t_persediaan_mutasi (no_mutasi,jenis,tanggal,user_id,keterangan,agent_id) values (?,?,?,?,?,?)";
		$this->db->query($sql,array($no_mutasi,$jenis,$tanggal,$user_id,$keterangan,$user_agentid));
	}

	function barangkeluar_update($no_mutasi,$id_barang,$tanggal,$qty,$jenis,$keterangan,$user_id,$idmutasi)
	{
		$sql = "UPDATE t_persediaan_mutasi set no_mutasi = ?, jenis = ? , tanggal = ?, user_id = ?, keterangan = ? where id = ?";
		$this->db->query($sql,array($no_mutasi,$jenis,$tanggal,$user_id,$keterangan,$idmutasi));
	}

	function barangkeluar_delete($idmutasi,$agentid)
	{
		$sql = "DELETE FROM t_persediaan_mutasi WHERE id = ? and agent_id = ?";
		$this->db->query($sql,array($idmutasi,$agentid));
	}

}