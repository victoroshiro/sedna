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
        $this->load->model('seminovos/Seminovos_m');
    }

    public function index()
    {
        $this->load->helper('text');

        $this->data['active'] = 'home';
        $this->data['title'] = 'Cimitarra';
        $this->data['description'] = 'Cimitarra';
        
        $limit_results = 4;

        $this->data["seminovos"] = $this->Seminovos_m->get_seminovos(
            array(
                'limit' => $limit_results
            )
        );
        
        $this->data['banners'] = $this->Home_m->get_banners();
        $this->data['all_news'] = $this->Noticias_m->get_noticias(array('limit' => 3));
        $this->data['partial'] = $this->load->view('home.php', $this->data, true);
        $this->load->view('common/template.php', $this->data);
    }
}