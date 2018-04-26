<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class Home_m extends CI_Model
{

    public function get_banners()
    {
        $this->db->select('*')
                 ->from('banners')
                 ->where('habilitado', 1)
                 ->order_by('sort', 'asc');
        
        $banners = $this->db->get();
        
        return ($banners->num_rows()) ? $banners->result() : false;
    }

    public function get_anuncios()
    {
        $this->db->select('*')
                 ->from('anuncios')
                 ->where('habilitado', 1)
                 ->limit(5)
                 ->order_by('id');
        
        $query = $this->db->get();

        $toReturn = false;

        if($query->num_rows()){
        	$anuncios = $query->result();

        	foreach ($anuncios as $key => $item) {
        		
        		$this->db->select('id_anuncios, imagem, link')
        				 ->from('anuncios_galeria')
        				 ->where('id_anuncios', $item->id);

        		$query_img = $this->db->get();

        		if($query_img->num_rows()){
        			$anuncios[$key]->galeria = $query_img->result();
        		}
        	}

        	$toReturn = $anuncios;
        }
        
        return $toReturn;
    }
    
    public function get_destaques()
    {
        $this->db->select('*')
                 ->from('destaques')
                 ->where('habilitado', 1)
                 ->order_by('sort', 'asc');
        
        $destaques = $this->db->get();
        
        return ($destaques->num_rows()) ? $destaques->result() : false;
    }
}
