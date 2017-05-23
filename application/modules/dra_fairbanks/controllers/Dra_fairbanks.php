<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dra_fairbanks extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
        $this->load->model('Dra_fairbanks_m');
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
        
        $this->data["dra_fairbanks"] = $this->Dra_fairbanks_m->get_dra_fairbanks();

        $this->data['description'] = $this->data["dra_fairbanks"]->description;

        $this->data['partial'] = $this->load->view('dra_fairbanks.php', $this->data, true);

        $this->load->view('common/template.php', $this->data);
    }
}