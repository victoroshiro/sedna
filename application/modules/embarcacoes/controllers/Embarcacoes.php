<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Embarcacoes extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
        $this->load->model('Embarcacoes_m');
    }

    public function index()
    {
        //pagination
        $limit_results = 9;
        $offset_page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $this->data["embarcacoes"] = $this->Embarcacoes_m->get_embarcacoes(
            array(
                'limit' => $limit_results, 
                'offset' => $offset_page,
            )
        );

        $total_embarcacoes = $this->Embarcacoes_m->get_embarcacoes(
            array(
                'count' => true,
            )
        );

        $config = array();

        $config["base_url"] = base_url() . "embarcacoes";
        $config["total_rows"] = $total_embarcacoes;
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
        $this->data["total_embarcacoes"] = $total_embarcacoes;

        // Menu
        $this->data['menu_embarcacoes_cim'] = $this->Embarcacoes_m->get_embarcacoes(array('categoria' => 'cimitarra'));
        $this->data['menu_embarcacoes_ciy'] = $this->Embarcacoes_m->get_embarcacoes(array('categoria' => 'cimitarra-yachts'));

        $this->data['partial'] = $this->load->view('embarcacoes.php', $this->data, true);
        $this->load->view('common/template.php', $this->data);
    }

    public function detalhe($categoria = false,
                            $subcategoria = false,
                            $produto = false)
    {
        if(!$categoria || !$subcategoria || !$produto){
            show_404();
        }

        $slug = $categoria.'/'.$subcategoria.'/'.$produto;

        $this->data['embarcacao'] = $this->Embarcacoes_m->get_embarcacoes(array('slug' => $slug));

        $this->data['embarcacao'] || show_404();
        
        $this->data['active'] = 'embarcacao';

        $this->data['imagens_interior'] = $this->Embarcacoes_m->get_imagens($this->data['embarcacao']->id,false,'interior');
        $this->data['imagens_exterior'] = $this->Embarcacoes_m->get_imagens($this->data['embarcacao']->id,false,'exterior');
        $this->data['imagens_panorama'] = $this->Embarcacoes_m->get_panoramas($this->data['embarcacao']->id,false,false);
        
        $this->data['embarcacao_descricao'] = $this->Embarcacoes_m->get_embarcacao_descricao($this->data['embarcacao']->id);
        $this->data['embarcacao_especificacoes'] = $this->Embarcacoes_m->get_embarcacao_especificacoes($this->data['embarcacao']->id);
        $this->data['embarcacao_serie'] = $this->Embarcacoes_m->get_embarcacao_serie($this->data['embarcacao']->id);

        $this->data['description'] = $this->data["embarcacao"]->description;

        $this->data['all_news'] = $this->Embarcacoes_m->get_embarcacoes(array('id' => $this->data['embarcacao']->id));

        // Menu
        $this->data['menu_embarcacoes_cim'] = $this->Embarcacoes_m->get_embarcacoes(array('categoria' => 'cimitarra'));
        $this->data['menu_embarcacoes_ciy'] = $this->Embarcacoes_m->get_embarcacoes(array('categoria' => 'cimitarra-yachts'));

        $this->data['partial'] = $this->load->view('embarcacao.php', $this->data, true);
        $this->load->view('common/template.php', $this->data);
    }
}
