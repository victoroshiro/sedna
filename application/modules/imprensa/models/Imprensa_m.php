<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class Imprensa_m extends CI_Model
{

	public function get_imprensas($params = array())
	{
		$options = array(
			'slug' => false,
			'contains' => false,
			'limit' => false,
			'offset' => false,
			'count' => false,
			'id' => false,
			'first' => false
		);

		$params = array_merge($options, $params);

		if ($params['count'])
            $this->db->select('COUNT(DISTINCT id) AS count');
        else{
			$this->db->select('*');
        }

		$this->db->from('imprensa')
				 ->where('habilitado', 1);

		if($params['slug']){
			$this->db->where('slug', $params['slug']);
		}

		if($params['contains']){
			$this->db->like('titulo', $params['contains']);
			$this->db->or_like('resumo', $params['contains']);
			$this->db->or_like('descricao', $params['contains']);
		}

		if($params['limit'] !== FALSE && $params['offset'] !== FALSE){
			$this->db->limit($params['limit'], $params['offset']);
		}

		if($params['limit'] !== FALSE && $params['offset'] === FALSE){
			$this->db->limit($params['limit']);
		}

		$this->db->order_by('id','ASC');

		if($params['id']){
			$this->db->where('id !=', $params['id']);
		}

		$query = $this->db->get();

		$toReturn = false;

		if($query->num_rows()){
			if ($params['count']){
	            $data = $query->row();
	            $toReturn = (int) $data->count;
			}else if($params['slug'] || $params['first']){
				$toReturn = $query->row();
			}else{
				$toReturn = $query->result();
			}
		}

		return $toReturn;
	}
}