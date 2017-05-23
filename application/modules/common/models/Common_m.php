<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class Common_m extends CI_Model
{

	public function get_menu_items($params = array())
	{
		$options = array(
			'slug' => false,
			'menu' => false,
			'all_menus' => false
		);

		$params = array_merge($options, $params);

		$this->db->select('*')
				 ->from('links')
				 ->where('habilitado', 1);

		if($params['slug']){
			$this->db->where('slug', $params['slug']);
		}

		if($params['menu']){
			$this->db->where('menu', $params['menu']);
		}

		if($params['all_menus']){
			$this->db->where('menu !=', 'sem-menu');
		}

		$query = $this->db->get();

		$toReturn = false;

		if($params['all_menus']){
			if($query->num_rows()){
				$menus = $query->result();
				$toReturn = array();
				foreach ($menus as $key => $item) {
					$toReturn[$item->menu][] = $item;
				}
			}
		}else{
			$toReturn = $query->row();
		}

		return $toReturn;
	}
}