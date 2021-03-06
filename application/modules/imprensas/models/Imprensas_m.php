<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class Imprensas_m extends CI_Model
{

	public function get_imprensas($params = array())
	{
		$options = array(
			'slug' => false,
			'contains' => false,
			'limit' => false,
			'offset' => false,
			'count' => false,
			'order_by' => false,
			'highlights' => false,
			'id' => false
		);

		$params = array_merge($options, $params);

		if ($params['count'])
            $this->db->select('COUNT(DISTINCT id) AS count');
        else{
			$this->db->select('*')
					 ->select('DATE_FORMAT(data_imprensa,"%d/%m/%Y") AS data_imprensa_f', false);
        }

		$this->db->from('imprensas')
				 ->where('habilitado', 1);

		if($params['slug']){
			$this->db->select('DATE_FORMAT(data_imprensa,"%Y") AS ano_imprensa', false)
					 ->select('DATE_FORMAT(data_imprensa,"%m") AS mes_imprensa', false)
					 ->select('DATE_FORMAT(data_imprensa,"%d") AS dia_imprensa', false)
					 ->where('slug', $params['slug']);
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

		if($params['order_by']){
			$this->db->order_by('data_imprensa',$params['order_by']);
		}else{
			$this->db->order_by('data_imprensa','DESC');
		}

		if($params['highlights']){
			$this->db->where('destaque', 1);
		}

		if($params['id']){
			$this->db->where('id !=', $params['id']);
		}

		$query = $this->db->get();

		$toReturn = false;

		if($query->num_rows()){
			if ($params['count']){
	            $data = $query->row();
	            $toReturn = (int) $data->count;
			}else if($params['slug']){
				$toReturn = $query->row();
			}else{
				$toReturn = $query->result();
			}
		}

		return $toReturn;
	}
}
