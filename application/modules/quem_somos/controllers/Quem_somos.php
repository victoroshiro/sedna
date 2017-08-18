<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Quem_somos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
        $this->load->model('Quem_somos_m');
        $this->load->model('ginecologia/Ginecologia_m');
        $this->load->model('sexualidade/Sexualidade_m');
        $this->load->model('obstetricia/Obstetricia_m');
        $this->load->model('imprensa/Imprensa_m');
    }

    public function index()
    {
        $this->data['menu_gineco'] = $this->Ginecologia_m->get_ginecologias();
        $this->data['menu_sex'] = $this->Sexualidade_m->get_sexualidades();
        $this->data['menu_obs'] = $this->Obstetricia_m->get_obstetricias();
        $this->data['menu_imp'] = $this->Imprensa_m->get_imprensas();

        $this->data["quem_somos"] = $this->Quem_somos_m->get_quem_somos();

        $this->data['title'] = 'Clínica especializada na saúde da mulher - Clínica Cimitarra';

        $this->data['description'] = 'Dra. Flávia Fairbanks – Ginecologia – Sexualidade – Obstetrícia – Endometriose. A saúde da mulher em primeiro lugar.';

        $this->data['partial'] = $this->load->view('quem_somos.php', $this->data, true);

        $this->load->view('common/template.php', $this->data);
    }
}