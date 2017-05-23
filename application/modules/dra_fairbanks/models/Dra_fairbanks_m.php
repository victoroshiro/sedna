<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class Dra_fairbanks_m extends CI_Model
{

	public function get_dra_fairbanks()
	{
    	$this->db->select('*')
			     ->from('dra_fairbanks');

		$query = $this->db->get();

		$toReturn = false;

		return ($query->num_rows()) ? $query->row(): false;
	}
}