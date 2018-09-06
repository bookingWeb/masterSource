<?php
class Menu_model extends CI_Model {
	
	* Get menu by user id
	* 
	* @param int id
	* @return mixed menu 
	*/
	function get_menu_by_user($user_id) 
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
		$in_sql = implode(',', array_fill(0, count($group_ids), '?'));
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
		$sql = " SELECT DISTINCT menu.id, menu.parent, menu.url, menu.nama_menu, menu.status, menu.icon, menu.sequence FROM menu 
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
	function get_all_menu() 
		$sql = "  SELECT menu.id, menu.parent, menu.url, menu.nama_menu, menu.status, menu.icon, menu.sequence FROM menu
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
	function save_menu($data, $group_id) 
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
	}
}