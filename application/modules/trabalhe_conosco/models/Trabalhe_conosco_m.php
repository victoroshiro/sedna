<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class Trabalhe_conosco_m extends CI_Model
{
	public function save_contact($dados, $origem)
	{
	    return $this->db->insert('trabalhe_conosco', array('nome' => $dados['name'], 
	                                              'email' => $dados['email'],
	                                              'assunto' => (isset($dados['subject'])) ? $dados['subject'] : null,
	                                              'telefone' => (isset($dados['telephone'])) ? $dados['telephone'] : null,
	                                              'mensagem' => (isset($dados['message'])) ? $dados['message'] : null,
	                                              'opt_in' => (isset($dados['opt_in'])) ? 1 : 0,
	                                              'origem' => $origem));
	}

	public function save_newsletter($dados)
	{
	
	    $saved = false;

	    $exist = $this->db->select('email')
	                      ->from('newsletter')
	                      ->where('email', $dados['email'])
	                      ->get()
	                      ->row();
	    
	    if(!$exist){
	        $saved = $this->db->insert('newsletter', array('email' => $dados['email']));
	    }

	    return $saved;
	}
}
