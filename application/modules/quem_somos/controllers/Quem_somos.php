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

        $this->data['title'] = 'Clínica especializada na saúde da mulher - Clínica Cimitarra';

        $this->data['description'] = 'Dra. Flávia Fairbanks – Ginecologia – Sexualidade – Obstetrícia – Endometriose. A saúde da mulher em primeiro lugar.';

        // Menu
        $this->data['menu_embarcacoes_cim'] = $this->Embarcacoes_m->get_embarcacoes(array('categoria' => 'cimitarra'));
        $this->data['menu_embarcacoes_ciy'] = $this->Embarcacoes_m->get_embarcacoes(array('categoria' => 'cimitarra-yachts'));

        $this->data['partial'] = $this->load->view('quem_somos.php', $this->data, true);
        $this->load->view('common/template.php', $this->data);
    }
}