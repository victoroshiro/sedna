<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Noticias extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
        $this->load->model('Noticias_m');
        $this->load->model('embarcacoes/Embarcacoes_m');
    }

    public function index()
    {
        //pagination
        $limit_results = 9;
        $offset_page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $this->data["noticias"] = $this->Noticias_m->get_noticias(
            array(
                'limit' => $limit_results, 
                'offset' => $offset_page,
            )
        );

        $total_noticias = $this->Noticias_m->get_noticias(
            array(
                'count' => true,
            )
        );

        $config = array();

        $config["base_url"] = base_url() . "noticias";
        $config["total_rows"] = $total_noticias;
        $config["per_page"] = $limit_results;
        $config["uri_segment"] = 2;
        //styling pagination
        $config['full_tag_open'] = '<ul class="pagination custom-pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</li></a>';
        $config['next_link'] = 'Mais';
        $config['prev_link'] = 'Menos';
        $config['last_link'] = FALSE;
        $config['first_link'] = FALSE;
        $config['last_tag_open'] = '<li>';
        $config['first_tag_open'] = '<li>';
        $config['next_tag_open'] = '<li class="pagination-next">';
        $config['prev_tag_open'] = '<li class="pagination-prev">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_close'] = '</li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_tag_close'] = '</li>';
        
        $this->pagination->initialize($config);

        $this->data["links"] = $this->pagination->create_links();
        $this->data["total_noticias"] = $total_noticias;

        // Menu
        $this->data['menu_embarcacoes_cim'] = $this->Embarcacoes_m->get_embarcacoes(array('categoria' => 'cimitarra'));
        $this->data['menu_embarcacoes_ciy'] = $this->Embarcacoes_m->get_embarcacoes(array('categoria' => 'cimitarra-yachts'));

        $this->data['partial'] = $this->load->view('noticias.php', $this->data, true);
        $this->load->view('common/template.php', $this->data);
    }

    public function detalhe($slug = false)
    {
        $slug || show_404();

        $this->data['noticia'] = $this->Noticias_m->get_noticias(array('slug' => $slug));

        $this->data['noticia'] || show_404();

        $this->data['description'] = $this->data["noticia"]->description;

        $this->data['all_news'] = $this->Noticias_m->get_noticias(array('id' => $this->data['noticia']->id));

        // Menu
        $this->data['menu_embarcacoes_cim'] = $this->Embarcacoes_m->get_embarcacoes(array('categoria' => 'cimitarra'));
        $this->data['menu_embarcacoes_ciy'] = $this->Embarcacoes_m->get_embarcacoes(array('categoria' => 'cimitarra-yachts'));

        $this->data['partial'] = $this->load->view('noticia.php', $this->data, true);
        $this->load->view('common/template.php', $this->data);
    }
}