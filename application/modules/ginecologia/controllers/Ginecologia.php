<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Ginecologia extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
        $this->load->model('Ginecologia_m');
        $this->load->model('ginecologia/Ginecologia_m');
        $this->load->model('sexualidade/Sexualidade_m');
        $this->load->model('obstetricia/Obstetricia_m');
        $this->load->model('imprensa/Imprensa_m');
    }

    public function index($slug = false)
    {
        $this->data['menu_gineco'] = $this->Ginecologia_m->get_ginecologias();
        $this->data['menu_sex'] = $this->Sexualidade_m->get_sexualidades();
        $this->data['menu_obs'] = $this->Obstetricia_m->get_obstetricias();
        $this->data['menu_imp'] = $this->Imprensa_m->get_imprensas();
        
        if (!$slug) {
            $this->data['ginecologia'] = $this->Ginecologia_m->get_ginecologias(array('first' => true));
        } else {
            $this->data['ginecologia'] = $this->Ginecologia_m->get_ginecologias(array('slug' => $slug));
        }

        $this->data['ginecologia'] || show_404();

        $this->data['description'] = $this->data["ginecologia"]->description;
        
        $this->data['title'] = $this->data['ginecologia']->title;

        $this->data['all_ginecologia'] = $this->Ginecologia_m->get_ginecologias();

        $this->data['partial'] = $this->load->view('ginecologia.php', $this->data, true);
        $this->load->view('common/template.php', $this->data);
    }
}
