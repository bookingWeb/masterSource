<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Menu extends CI_Controller {
	public $group_menu;
	/**
	* Constructor
	* Controller initialization. Load model, library, etc.
	*/
	function __construct() 	{
		parent::__construct();
		$this->load->model('Menu_model');
	}

	/**
	* Display halaman index
	*/	 
	function index()	{
		$data['themes_url'] = base_url() . $this->config->item('theme_backend');
		
		$this->load->view('backend/ucore_siteheader',$data);
		$this->load->view('backend/ucore_sitemenu',$data);
		$this->load->view('backend/ucore_sitesubheader',$data);
		$this->load->view('backend/menu/index',$data);
		$this->load->view('backend/ucore_sitefooter',$data);	
		redirect('edit_menu');
	}	
	function users()
	{
		$data['themes_url'] = base_url() . $this->config->item('theme_backend');
		
		$this->general->session_check();
		$user_id = $this->user_id;
		
		$data['user_id']				= $this->user_id;
		$data['user_nama']				= $this->user_nama;
		$data['user_namaagent']			= $this->user_namaagent;
		$data['user_namaperusahaan']	= $this->user_namaperusahaan;
		$data['user_level']				= $this->user_level;
		$data['user_logo']				= $this->user_logo;
		
		if (empty($user_id)) {
			show_error('Login please', 401);
		}
		
		$data['data_users'] = $this->Menu_model->get_data_users();
		
		$this->load->view('backend/ucore_siteheader',$data);
		$this->load->view('backend/ucore_sitemenu',$data);
		$this->load->view('backend/ucore_sitesubheader',$data);
		$this->load->view('backend/menu/ucore_users',$data);
		$this->load->view('backend/ucore_sitefooter',$data);	
	}
	
	/**
	* Display edit form
	* 
	*/	
	public function tambah_menu()
	{
		$data['themes_url'] = base_url() . $this->config->item('theme_backend');
		$data['data_parent'] = $this->Menu_model->get_id_menu();
		
		$this->general->session_check();
		$user_id = $this->user_id;
		
		$data['user_id']				= $this->user_id;
		$data['user_nama']				= $this->user_nama;
		$data['user_namaagent']			= $this->user_namaagent;
		$data['user_namaperusahaan']	= $this->user_namaperusahaan;
		$data['user_level']				= $this->user_level;
		$data['user_logo']				= $this->user_logo;
		
		if (empty($user_id)) {
			show_error('Login please', 401);
		}
		
		$pesan = "";
		$iconx = "menu-icon";
		$icony	= $this->input->post('icon');
		$iconz = "fa-lg fa-fw";
		
		$simpan = $this->input->post('simpan');
		if($simpan != ""){
			$parentx = $this->input->post('parent_id');
			if($parentx == "" || $parentx == NULL){$parent = 0;}
			$menu 	= $this->input->post('nama_menu');
			$url 	= $this->input->post('url');
			$status = $this->input->post('status');
			
			$icon	= $iconx.' '.$icony.' '.$iconz;
			$seq	= $this->input->post('sequence');
			
			$insert = $this->Menu_model->insert_menu($parent,$menu,$url,$status,$icon,$seq);
			if($insert['code'] == 1){
				redirect('menu');
			}else{
				$pesan = "Data gagal disimpan, Silahkan coba kembali !!!";
			}
		}
		$data['pesan'] = $pesan;

		$this->load->view('backend/ucore_siteheader',$data);
		$this->load->view('backend/ucore_sitemenu',$data);
		$this->load->view('backend/ucore_sitesubheader',$data);
		$this->load->view('backend/menu/ucore_tambah_menu',$data);
		$this->load->view('backend/ucore_sitefooter',$data);		
	}
	
	public function edit_groups() 
	{
		$data['themes_url'] = base_url() . $this->config->item('theme_backend');
		
		// check user login
		$this->general->session_check();
		$user_id = $this->user_id;
		
		$data['user_id']				= $this->user_id;
		$data['user_nama']				= $this->user_nama;
		$data['user_namaagent']			= $this->user_namaagent;
		$data['user_namaperusahaan']	= $this->user_namaperusahaan;
		$data['user_level']				= $this->user_level;
		$data['user_logo']				= $this->user_logo;
		
		if (empty($user_id)) {
			show_error('Login please', 401);
		}

		// get groups for select box items
		$ion_groups = $this->Menu_model->get_groups_menu();
		foreach ($ion_groups as $k => $v) {
			$groups[] = array('id' => $v['id'], 'group' => $v['nama_group'], 'deskripsi' => $v['deskripsi']);
		}
		
		// if change group button is clicked, set group_id accordingly
		if ($this->input->post('btn_select_group') != FALSE) {
			$group_id = $this->input->post('group_id'); // role from select box
		} else {
			$group_id = 1; // default group 
		}

		// if save button is clicked
		if ($this->input->post('btn_submit') != FALSE) {
			$group_id = $this->input->post('group_id'); // from select box
			$menu_id = $this->input->post('menu_id'); // array of selected menu
			if ($menu_id != FALSE) {
				foreach ($menu_id as $id) {
					$batch_data[] = array('menu_id' => $id, 'group_id' => $group_id);
				}
			} else {
				$batch_data = array();
			}

			$save_result = $this->Menu_model->save_menu($batch_data, $group_id);
			if (!$save_result) {
				$data['errors'] = 'Save Failed.';
			}

		}
	}
	
	public function edit_menu() 	{
		$data['themes_url'] = base_url() . $this->config->item('theme_backend');
		
		// check user login
		$this->general->session_check();
		$user_id = $this->user_id;
		
		$data['user_id']				= $this->user_id;
		$data['user_nama']				= $this->user_nama;
		$data['user_namaagent']			= $this->user_namaagent;
		$data['user_namaperusahaan']	= $this->user_namaperusahaan;
		$data['user_level']				= $this->user_level;
		$data['user_logo']				= $this->user_logo;
		
		if (empty($user_id)) {
			show_error('Login please', 401);
		}
		// get groups for select box items
		$ion_groups = $this->Menu_model->get_groups_menu();
		foreach ($ion_groups as $k => $v) {
			$groups[] = array('id' => $v['id'], 'group' => $v['nama_group'], 'deskripsi' => $v['deskripsi']);
		}		
		// if change group button is clicked, set group_id accordingly
		if ($this->input->post('btn_select_group') != FALSE) {
			$group_id = $this->input->post('group_id'); // role from select box
		} else {
			$group_id = 1; // default group 
		}
		// if save button is clicked
		if ($this->input->post('btn_submit') != FALSE) {
			$group_id = $this->input->post('group_id'); // from select box
			$menu_id = $this->input->post('menu_id'); // array of selected menu
			if ($menu_id != FALSE) {
				foreach ($menu_id as $id) {
					$batch_data[] = array('menu_id' => $id, 'group_id' => $group_id);
				}
			} else {
				$batch_data = array();
			}
			$save_result = $this->Menu_model->save_menu($batch_data, $group_id);
			if (!$save_result) {
				$data['errors'] = 'Save Failed.';
			}
		}
		// get menu by group id for checked menu
		$group_menu = $this->Menu_model->get_menu_by_group($group_id);
		// set property group_menu for building menu
		$this->group_menu = $group_menu;

		// all menu for check box items, 
		// ATTENTION: $this->_build_menu MUST be called after setting $this->group_menu
		$all_menu = $this->Menu_model->get_all_menu();
		$data['menu_html'] = $this->_build_menu(0, $all_menu);		
		// after all done, set template vars
		$data['groups'] = $groups;
		$data['group_id'] = $group_id;
		
		// render template/view		$this->load->view('backend/ucore_siteheader',$data);
		$this->load->view('backend/ucore_sitemenu',$data);
		$this->load->view('backend/ucore_sitesubheader',$data);
		$this->load->view('backend/menu/ucore_edit_menu',$data);
		$this->load->view('backend/ucore_sitefooter',$data);		
	}
	function _build_menu($parent, $menu) 
	{
		$data['themes_url'] = base_url() . $this->config->item('theme_backend');
		
		$html = "";
		if (isset($menu['parents'][$parent])) {
			$html .= '<ul style="list-style:none">';
			foreach ($menu['parents'][$parent] as $itemId) {
				if (!isset($menu['parents'][$itemId])) {
					if ($this->is_menu_in_group($menu['items'][$itemId]['id'], $this->group_menu))
						$checked = 'checked';
					else
						$checked = '';
					//$html .= "<li>\n  <a href='".$menu['items'][$itemId]['link']."'>".$menu['items'][$itemId]['label']."</a>\n</li> \n";
					$html .=
							'<li>       
								<div class="icheck">
									<label> 
										<input name="menu_id[]" type="checkbox" value="' . $menu['items'][$itemId]['id'] . '" ' . $checked . '> ' . $menu['items'][$itemId]['nama_menu']
									. '</label>
								</div>
							</li>';
				}
				if (isset($menu['parents'][$itemId])) {
					if ($this->is_menu_in_group($menu['items'][$itemId]['id'], $this->group_menu))
						$checked = 'checked';
					else
						$checked = '';
					//$html .= "<li>\n  <a href='".$menu['items'][$itemId]['link']."'>".$menu['items'][$itemId]['label']."</a> \n";
					$html .=
							'<li>
								<div class="icheck">
									<label>
										<input name="menu_id[]" type="checkbox" value="' . $menu['items'][$itemId]['id'] . '" ' . $checked . '> ' . $menu['items'][$itemId]['nama_menu'] .
									'</label>
								</div>';
					$html .= $this->_build_menu($itemId, $menu);
					$html .= '</li>';
				}
			}
			$html .= '</ul>';
		}
		return $html;
	}

	function is_menu_in_group($menu_id, $group_menu) 	{
		foreach ($group_menu['items'] as $item) {
			if ($menu_id == $item['id']) {
				return true;
			}
		}
		
		return false;
	}
}
