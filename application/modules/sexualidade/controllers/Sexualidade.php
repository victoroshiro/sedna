<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sexualidade extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
        $this->load->model('Sexualidade_m');
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

        if(!$slug){
            $this->data['sexualidade'] = $this->Sexualidade_m->get_sexualidades(array('first' => true));
        }else{
            $this->data['sexualidade'] = $this->Sexualidade_m->get_sexualidades(array('slug' => $slug));
        }

        $this->data['sexualidade'] || show_404();

        $this->data['description'] = $this->data["sexualidade"]->description;

        $this->data['title'] = $this->data['sexualidade']->title;

        $this->data['all_sexualidade'] = $this->Sexualidade_m->get_sexualidades();

        $this->data['partial'] = $this->load->view('sexualidade.php', $this->data, true);
        $this->load->view('common/template.php', $this->data);
    }
}