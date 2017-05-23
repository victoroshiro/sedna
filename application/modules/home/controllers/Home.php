<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_m');
        $this->load->model('common/Common_m');
        $this->load->model('noticias/Noticias_m');
        $this->load->model('ginecologia/Ginecologia_m');
        $this->load->model('sexualidade/Sexualidade_m');
        $this->load->model('obstetricia/Obstetricia_m');
        $this->load->model('imprensa/Imprensa_m');
    }

    public function index()
    {
        $this->load->helper('text');

        $this->data['active'] = 'home';
        $this->data['title'] = 'Clínica Femcare – A saúde da mulher em primeiro lugar.';
        $this->data['description'] = 'Clínica Femcare – A saúde da mulher em primeiro lugar.';
        
        $this->data['menu_gineco'] = $this->Ginecologia_m->get_ginecologias();
        $this->data['menu_sex'] = $this->Sexualidade_m->get_sexualidades();
        $this->data['menu_obs'] = $this->Obstetricia_m->get_obstetricias();
        $this->data['menu_imp'] = $this->Imprensa_m->get_imprensas();
        
        $this->data['banners'] = $this->Home_m->get_banners();
        $this->data['all_news'] = $this->Noticias_m->get_noticias(array('limit' => 3));
        $this->data['partial'] = $this->load->view('home.php', $this->data, true);
        $this->load->view('common/template.php', $this->data);
    }
}