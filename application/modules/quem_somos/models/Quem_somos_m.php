<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class Quem_somos_m extends CI_Model
{

	public function get_quem_somos()
	{
    	$this->db->select('*')
			     ->from('quem_somos');

		$query = $this->db->get();

		$toReturn = false;

		return ($query->num_rows()) ? $query->row(): false;
	}
}