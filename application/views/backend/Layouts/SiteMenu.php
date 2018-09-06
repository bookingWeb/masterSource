<?php

class Menu_tree {

	private $menu_data;

	function __construct() {

		$ci = & get_instance();
		// Get logged in user
		
		$user_id = $ci->session->userdata('id');
		$ci->load->model('Menu_model');
		
		$this->menu_data = $ci->Menu_model->get_menu_by_user($user_id);
		//print_r($this->menu_data);exit();
	}

	function generate_html() {
		if (!empty($this->menu_data['parents'])) {
			$min_parent = min(array_keys($this->menu_data['parents']));
			return $this->_build_menu($min_parent, $this->menu_data);
		} else {
			return FALSE;
		}
	}
	private function _build_menu($parent, $menu) {
		$html = '';
		if (isset($menu['parents'][$parent])) {
			//$html .= '<li class="treeview">';
			foreach ($menu['parents'][$parent] as $itemId) {
				if (!isset($menu['parents'][$itemId])) {
					$html .=
							'<li class="menu-dropdown" id="menu">
								<a href="' . site_url() . $menu['items'][$itemId]['url'] . '" >
									<i class="' . $menu['items'][$itemId]['icon'] . '"></i>' .
									'<span class="nav-label">' . $menu['items'][$itemId]['nama_menu'] . '</span>' .
								'</a>
							</li>';
				}
				if (isset($menu['parents'][$itemId])) {

					$html .=
							'<li class="menu-dropdown" id="menu">
								<a href="' . site_url() . $menu['items'][$itemId]['url'] . '" >
									<i class="' . $menu['items'][$itemId]['icon'] . '"></i>' .
									'<span class="nav-label">' . $menu['items'][$itemId]['nama_menu'] . '</span>' .
									'<span class="fa arrow"></span>
								</a>
								<ul class="nav nav-second-level collapse">';

					$html .= $this->_build_menu($itemId, $menu);

					$html .= '</ul></li>';
				}
			}
		}
		//var_dump($html);die;
		return $html;
	}
}
?>
<nav class="navbar-default navbar-static-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav metismenu" id="side-menu">
			<li class="nav-header">
				<div class="dropdown profile-element"> 
					<span><img alt="image" src="<?php echo $themes_url . "img/" . $user_logo; ?>" width="100"/></span>
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<span class="clear"><span class="block m-t-xs"><strong class="font-bold"><?php echo $user_nama; ?></strong></span> 
						<span class="text-muted text-xs block">Director <b class="caret"></b></span> </span> 
					</a>
					<ul class="dropdown-menu animated fadeInRight m-t-xs">
						<li><a href="<?php echo site_url("ucore/profile"); ?>">Profile</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo site_url("ucore/logout"); ?>">Logout</a></li>
					</ul>
				</div>
				<div class="logo-element">UCore</div>
			</li>
			<li>
				<?php
					$menu_tree = new Menu_tree();
					echo $menu_tree->generate_html();
				?>
			</li>
		</ul>
		<!-- / .navigation -->
	</div><!-- menu -->
</nav>
    