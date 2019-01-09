<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Quem_somos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
        $this->load->model('Quem_somos_m');
        $this->load->model('embarcacoes/Embarcacoes_m');
    }

    public function index()
    {
        $this->data["quem_somos"] = $this->Quem_somos_m->get_quem_somos();

        $this->data['title'] = 'Sedna Group Yachts';

        $this->data['description'] = 'Sedna Group Yachts';

        // Menu
        $this->data['menu_embarcacoes_cim'] = $this->Embarcacoes_m->get_embarcacoes(array('categoria' => 'Yachts'));         $this->data['menu_embarcacoes_ciy'] = $this->Embarcacoes_m->get_embarcacoes(array('categoria' => 'Sport-Fishing-Yachts'));         $this->data['menu_embarcacoes_sport'] = $this->Embarcacoes_m->get_embarcacoes(array('categoria' => 'Super-Sport-Yachts'));
         

        $this->data['partial'] = $this->load->view('quem_somos.php', $this->data, true);
        $this->load->view('common/template.php', $this->data);
    }
}