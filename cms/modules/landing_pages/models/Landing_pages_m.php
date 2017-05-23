<?php

class Landing_pages_m extends CI_Model 
{

	public function get_landing_pages($params = array())
	{
		$options = array(
			"texto" => "",
			"data_de" => false,
			"data_ate" => false,
			"limit" => false,
			"offset" => false,
			"count" => false,
			"id" => false,
			"order" => false,
			"order_by" => false
		);

		$params = array_merge($options, $params);

		$this->db->select('*')
				 ->from('landing_pages');

		if ($params['texto'] != '') {
			$this->db->like('titulo', $texto)
					 ->or_like('resumo', $texto)
					 ->or_like('descricao', $texto);
		}

		if (($params['limit']) && ($params['offset'])) {
            $this->db->limit($params['limit'], $params['offset']);
        }
		
		if($params['id']){
            $this->db->where("id", $params['id']);
        }

		$this->db->order_by('data_criacao', 'DESC');
		
		$landing_pages = $this->db->get();

        if($params['count']){
            $toReturn = $landing_pages->num_rows();
        }else if($params['id']){
            $toReturn = $landing_pages->row();
        }else{
            $toReturn = $landing_pages->result();
        }

        return $toReturn;
	}

	public function get_landing_page_links($id) 
	{
		$this->db->select("*");
		$this->db->from("landing_pages_links");
		$this->db->order_by("id", "DESC");
		$this->db->where("landing_page_id", $id);

		$landing_page = $this->db->get()->result();
		return $landing_page;
	}

	public function salvar($data)
    {
        $data['slug'] = slug(array(
                                'string' => $data['titulo'],
                                'tabela' => 'landing_pages'
                                )
                            );

        $this->db->trans_start();

        $this->db->insert('landing_pages', $data);

        $this->db->trans_complete();
        
        return $this->db->trans_status();
    }

	public function atualizar($data, $dataWhere) {
        
        $data['slug'] = slug(array(
                                'string' => $data['titulo'],
                                'tabela' => 'landing_pages',
                                'id' => $dataWhere['id']
                                )
                            );

        $this->db->trans_start();

        $this->db->where('id', $dataWhere['id'])->update('landing_pages', $data);
        
        $this->db->trans_complete();

        return $this->db->trans_status();
    }

	public function excluir($id)
    {
        if ($this->db->delete('landing_pages', array('id' => $id))){
            return true;
        }else{
            return false;
        }
    }

    public function salvar_link($data)
    {
    	$this->db->trans_start();

        $this->db->insert('landing_pages_links', $data);

        $this->db->trans_complete();
        
        return $this->db->trans_status();
    }

	public function excluir_link($id) {
		if ($this->db->delete('landing_pages_links', array('id' => $id))){
            return true;
        }else{
            return false;
        }
	}
}

?>