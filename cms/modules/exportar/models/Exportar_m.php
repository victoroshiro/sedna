<?php

class Exportar_m extends CI_Model {

	public function gerar_excel($params = array())
	{
		$options = array(
			'origem' => false
		);

		$params = array_merge($options, $params);

		$this->db->select('*');

		if($params['origem'] == 'Newsletter'){
			$this->db->from('newsletter');
		}else{
			$this->db->select('DATE_FORMAT(data_criacao,"%d/%m/%Y") AS dateFormated', false)
					 ->from('contato');
		}

		if($params['origem']){
			if($params['origem'] != 'Todos' && $params['origem'] != 'Newsletter'){
				$this->db->where('origem', $params['origem']);			
			}else if ($params['origem'] == 'Contato'){
				$this->db->order_by('nome');
			}
		}

		$query = $this->db->get();

		return ($query->num_rows()) ? $query->result() : false;
	}

}