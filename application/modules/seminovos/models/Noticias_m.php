<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class Noticias_m extends CI_Model
{

	public function get_noticias($params = array())
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
					 ->select('DATE_FORMAT(data_noticia,"%d/%m/%Y") AS data_noticia_f', false);
        }

		$this->db->from('noticias')
				 ->where('habilitado', 1);

		if($params['slug']){
			$this->db->select('DATE_FORMAT(data_noticia,"%Y") AS ano_noticia', false)
					 ->select('DATE_FORMAT(data_noticia,"%m") AS mes_noticia', false)
					 ->select('DATE_FORMAT(data_noticia,"%d") AS dia_noticia', false)
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
			$this->db->order_by('data_noticia',$params['order_by']);
		}else{
			$this->db->order_by('data_noticia','DESC');
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