<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class Embarcacoes_m extends CI_Model
{

	public function get_embarcacoes($params = array())
	{
		$options = array(
			'slug' => false,
			'contains' => false,
			'limit' => false,
			'offset' => false,
			'count' => false,
			'order_by' => false,
			'highlights' => false,
			'id' => false,
			'categoria' => false
		);

		$params = array_merge($options, $params);

		if ($params['count'])
            $this->db->select('COUNT(DISTINCT id) AS count');
        else{
			$this->db->select('*');
        }

		$this->db->from('embarcacoes')
				 ->where('habilitado', 1);

		if($params['slug']){
			$this->db->where('slug', $params['slug']);
		}

		if($params['categoria']){
			$this->db->where('categoria', $params['categoria']);
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

        public function get_imagens($id_embarcacao = false, $id_imagem = false, $tipo = false){ 
            $this->db->select('*')
                ->from('embarcacoes_imagens');

            if($id_embarcacao && $tipo){
                $this->db->where('id_embarcacao', $id_embarcacao);
                $this->db->where('titulo', $tipo);
                $imagens = $this->db->get()->result();
            }else{
                $this->db->where('id_embarcacao', $id_embarcacao);
                $imagens = $this->db->get()->result();
            }

            if($id_imagem){
                $this->db->where('id', $id_imagem);
                $imagens = $this->db->get()->row();   
            }

            return $imagens;
        }

        public function get_panoramas($id_embarcacao = false, $id_imagem = false, $tipo = false){ 
            $this->db->select('*')
                ->from('embarcacoes_panoramas');

            $this->db->where('id_embarcacao', $id_embarcacao);
            $imagens = $this->db->get()->result();

            if($id_imagem){
                $this->db->where('id', $id_imagem);
                $imagens = $this->db->get()->row();   
            }

            return $imagens;
        }
    public function get_embarcacao_descricao($id = false) {
        
        $this->db->select("*")
                 ->from("embarcacoes_descricao");

        if($id){
            $this->db->where("id_embarcacoes", $id);
        }

        $query = $this->db->get();

        return ($query->num_rows()) ? $query->row() : false;
    }

    public function get_embarcacao_especificacoes($id = false) {
        
        $this->db->select("*")
                 ->from("embarcacoes_especificacoes");

        if($id){
            $this->db->where("id_embarcacoes", $id);
        }

        $query = $this->db->get();

        return ($query->num_rows()) ? $query->row() : false;
    }

    public function get_embarcacao_serie($id = false) {
        
        $this->db->select("*")
                 ->from("embarcacoes_serie");

        if($id){
            $this->db->where("id_embarcacoes", $id);
        }

        $query = $this->db->get();

        return ($query->num_rows()) ? $query->row() : false;
    }
}
