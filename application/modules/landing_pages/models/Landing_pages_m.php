<?php

class Landing_pages_m extends CI_Model 
{

	public function get_landing_pages($params = array())
	{
		$options = array(
			"slug" => false
		);

		$params = array_merge($options, $params);

		$this->db->select('*')
				 ->from('landing_pages')
				 ->order_by('titulo', 'ASC')
				 ->where('habilitado', 1);
        
        if($params['slug']){
            $this->db->where("slug", $params['slug']);
        }
		
		$landing_pages = $this->db->get();

        if($params['slug']){
            $toReturn = $landing_pages->row();
        }else{
            $toReturn = $landing_pages->result();
        }

        return $toReturn;
	}

	public function get_landing_page_links($id) 
	{
		$this->db->select("*")
				 ->from("landing_pages_links")
				 ->order_by("id", "DESC")
				 ->where("landing_page_id", $id);

		$landing_page = $this->db->get()->result();
		return $landing_page;
	}
}

?>