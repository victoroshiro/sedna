<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_m');
        $this->load->model('common/Common_m');
        $this->load->model('noticias/Noticias_m');
        $this->load->model('seminovos/Seminovos_m');
        $this->load->model('embarcacoes/Embarcacoes_m');
    }

    public function index()
    {
        $this->load->helper('text');

        $this->data['active'] = 'home';
        $this->data['title'] = 'Cimitarra';
        $this->data['description'] = 'Cimitarra';

        // Menu
        $this->data['menu_embarcacoes_cim'] = $this->Embarcacoes_m->get_embarcacoes(array('categoria' => 'cimitarra'));
        $this->data['menu_embarcacoes_ciy'] = $this->Embarcacoes_m->get_embarcacoes(array('categoria' => 'cimitarra-yachts'));
        
        $limit_results = 4;

        $this->data["seminovos"] = $this->Seminovos_m->get_seminovos(
            array(
                'limit' => $limit_results
            )
        );
        
        $this->data['banners'] = $this->Home_m->get_banners();
        $this->data['all_news'] = $this->Noticias_m->get_noticias(array('limit' => 3));
        $this->data['destaques'] = $this->Home_m->get_destaques();
        $this->data['partial'] = $this->load->view('home.php', $this->data, true);
        $this->load->view('common/template.php', $this->data);
    }
}
