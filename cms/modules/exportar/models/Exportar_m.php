<?php

class Exportar_m extends CI_Model {

	public function gerar_excel($params = array())
	{
		$options = array(
			'origem' => false
		);

		$params = array_merge($options, $params);

		$this->db->select('*')
				 ->select('DATE_FORMAT(data_criacao,"%d/%m/%Y") AS dateFormated', false);

		if($params['origem'] == 'Trabalhe Conosco'){
			$this->db->from('trabalhe_conosco');
		}else{
			$this->db->from('contato');
		}

		if($params['origem']){
			if($params['origem'] == 'Trabalhe Conosco'){
				$this->db->order_by('area_interesse','ASC')
						 ->order_by('data_criacao','DESC');
			}else if ($params['origem'] == 'Contato'){
				$this->db->where('origem', $params['origem']);			
				$this->db->order_by('nome');
			}
		}

		$query = $this->db->get();

		return ($query->num_rows()) ? $query->result() : false;
	}

}