<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Fidelidades extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
        $this->load->model('Fidelidades_m');
        $this->load->model('embarcacoes/Embarcacoes_m');
    }

    public function index()
    {
        //pagination
        $limit_results = 9;
        $offset_page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $this->data["fidelidades"] = $this->Fidelidades_m->get_fidelidades(
            array(
                'limit' => $limit_results, 
                'offset' => $offset_page,
            )
        );

        $total_fidelidades = $this->Fidelidades_m->get_fidelidades(
            array(
                'count' => true,
            )
        );

        $config = array();

        $config["base_url"] = base_url() . "fidelidades";
        $config["total_rows"] = $total_fidelidades;
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
        $this->data["total_fidelidades"] = $total_fidelidades;

        $this->data["fidelidade_texto"] = $this->Fidelidades_m->get_fidelidades_texto();
        
        // Menu
        $this->data['menu_embarcacoes_cim'] = $this->Embarcacoes_m->get_embarcacoes(array('categoria' => 'Yachts'));         $this->data['menu_embarcacoes_ciy'] = $this->Embarcacoes_m->get_embarcacoes(array('categoria' => 'Sport-Fishing-Yachts'));         $this->data['menu_embarcacoes_sport'] = $this->Embarcacoes_m->get_embarcacoes(array('categoria' => 'Super-Sport-Yachts'));
         

        $this->data['partial'] = $this->load->view('fidelidades.php', $this->data, true);
        $this->load->view('common/template.php', $this->data);
    }

    public function detalhe($slug = false)
    {
        $slug || show_404();

        $this->data['fidelidade'] = $this->Fidelidades_m->get_fidelidades(array('slug' => $slug));

        $this->data['fidelidade'] || show_404();

        $this->data['description'] = $this->data["fidelidade"]->description;

        $this->data['all_news'] = $this->Fidelidades_m->get_fidelidades(array('id' => $this->data['fidelidade']->id));

        // Menu
        $this->data['menu_embarcacoes_cim'] = $this->Embarcacoes_m->get_embarcacoes(array('categoria' => 'Yachts'));         $this->data['menu_embarcacoes_ciy'] = $this->Embarcacoes_m->get_embarcacoes(array('categoria' => 'Sport-Fishing-Yachts'));         $this->data['menu_embarcacoes_sport'] = $this->Embarcacoes_m->get_embarcacoes(array('categoria' => 'Super-Sport-Yachts'));
         

        $this->data['partial'] = $this->load->view('fidelidade.php', $this->data, true);
        $this->load->view('common/template.php', $this->data);
    }
}
