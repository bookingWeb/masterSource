<?php
class Menu_model extends CI_Model {
		/**
	* Get menu by user id
	* 
	* @param int id
	* @return mixed menu 
	*/		function get_data_users()	{		$sql = "SELECT a.id AS iduser,a.nama_lengkap,a.username,a.email,a.user_status,b.group_id,c.nama_group FROM t_user a					LEFT JOIN user_group b ON a.id = b.user_id					LEFT JOIN groups c ON b.group_id = c.id";		$query = $this->db->query($sql);		return $query->result_array();	}		function get_user_group($user_id=FALSE)	{		// if no id was passed use the current users id		$user_id || $user_id = $this->user_id;				$sql = "SELECT a.user_id,b.id AS idgroup,c.id AS iduser,b.nama_group,b.deskripsi FROM user_group a				LEFT JOIN groups b ON a.group_id = b.id				LEFT JOIN t_user c ON a.user_id = c.id				WHERE a.user_id = ?";		$query = $this->db->query($sql,array($user_id));		return $query->result_array();	}		function get_groups_menu()	{		$sql = "SELECT id,nama_group,deskripsi FROM groups";		$query = $this->db->query($sql);		return $query->result_array();	}	
	function get_menu_by_user($user_id) 	{
		if (empty($user_id)) {
			return FALSE;
		}		
		// get groups of logged in user
		$user_group = $this->get_user_group($user_id);
		foreach ($user_group as $group) {
			$group_ids[] = (int) $group['user_id'];
		}		
		if (empty($group_ids)) {
			return FALSE;
		}		
		$in_sql = implode(',', array_fill(0, count($group_ids), '?'));				$sql = " SELECT DISTINCT menu.id, menu.parent, menu.url, menu.nama_menu, menu.status, menu.icon, menu.sequence FROM menu 					INNER JOIN menu_group ON menu_group.menu_id = menu.id					INNER JOIN user_group ON user_group.group_id = menu_group.group_id 				WHERE menu.status = TRUE AND user_group.user_id IN($in_sql) 				ORDER BY menu.id, menu.parent, menu.sequence";		$query = $this->db->query($sql, $group_ids);		$result = $query->result_array();		$menu = array(			'items' => array(),			'parents' => array()		);				// Builds the array lists with data from the menu table		foreach ($result as $items) {			// Creates entry into items array with current menu item id ie. $menu['items'][1]			$menu['items'][$items['id']] = $items;			// Creates entry into parents array. Parents array contains a list of all items with children			$menu['parents'][$items['parent']][] = $items['id'];		}		//echo 'menu: '; var_dump($menu);		return $menu;
	}
	/**
	* Get menu by user group id
	* 
	* @param int $group_id
	* @return mixed menu 
	*/
	function get_menu_by_group($group_id) {
		if (empty($group_id)) {
			return FALSE;
		}		
		$sql = " SELECT DISTINCT menu.id, menu.parent, menu.url, menu.nama_menu, menu.status, menu.icon, menu.sequence FROM menu 					INNER JOIN menu_group ON menu_group.menu_id = menu.id					WHERE menu.status = TRUE 						AND menu_group.group_id = ?					ORDER BY menu.parent, menu.sequence";
		$query = $this->db->query($sql, array($group_id));
		$result = $query->result_array();
		$menu = array(
			'items' => array(),
			'parents' => array()
		);		
		// Builds the array lists with data from the menu table
		foreach ($result as $items) {
			// Creates entry into items array with current menu item id ie. $menu['items'][1]
			$menu['items'][$items['id']] = $items;
			// Creates entry into parents array. Parents array contains a list of all items with children
			$menu['parents'][$items['parent']][] = $items['id'];
		}
		return $menu;
	}
	/**
	* Get all menu
	* 
	* @return array
	*/	
	function get_all_menu() 	{
		$sql = "  SELECT menu.id, menu.parent, menu.url, menu.nama_menu, menu.status, menu.icon, menu.sequence FROM menu					WHERE menu.status = TRUE					ORDER BY menu.parent, menu.sequence";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		$menu = array(
			'items' => array(),
			'parents' => array()
		);
		// Builds the array lists with data from the menu table
		foreach ($result as $items) {
			// Creates entry into items array with current menu item id ie. $menu['items'][1]
			$menu['items'][$items['id']] = $items;
			// Creates entry into parents array. Parents array contains a list of all items with children
			$menu['parents'][$items['parent']][] = $items['id'];
		}
		//echo 'menu: '; var_dump($menu);
		return $menu;
	}
	/**
	* Save menu for a user group
	* 
	* @param array $data
	* @param int $group_id
	* @return boolean
	*/
	function save_menu($data, $group_id) 	{
		//var_dump($data);	exit();
		$this->db->trans_start();
		// delete
		$this->db->where('group_id', $group_id);
		$this->db->delete('menu_group');		
		// insert batch
		if (!empty($data)) {
			$this->db->insert_batch('menu_group', $data);
		}

		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return false;
		} else {
			return true;
		}
	}		function get_id_menu(){		$sql = "SELECT id AS idmenu,nama_menu FROM menu";		$query = $this->db->query($sql);		return $query->result_array();	}		function insert_menu($parent,$menu,$url,$status,$icon,$seq){		$sql = "INSERT INTO menu (parent,nama_menu,url,status,icon,sequence) VALUES (?,?,?,?,?,?)";		$query = $this->db->query($sql,array($parent,$menu,$url,$status,$icon,$seq));		if($this->db->affected_rows() > 0){			$data=array(				  'code' => '1'				);			return $data;		} else {			$data=array(				  'code' => '0'				);			return $data;		}	}
}
