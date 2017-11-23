<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Seminovos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
        $this->load->model('Seminovos_m');
        $this->load->model('embarcacoes/Embarcacoes_m');
    }

    public function index()
    {
        //pagination
        $limit_results = 9;
        $offset_page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $this->data["seminovos"] = $this->Seminovos_m->get_seminovos(
            array(
                'limit' => $limit_results, 
                'offset' => $offset_page,
            )
        );

        $total_seminovos = $this->Seminovos_m->get_seminovos(
            array(
                'count' => true,
            )
        );

        $config = array();

        $config["base_url"] = base_url() . "seminovos";
        $config["total_rows"] = $total_seminovos;
        $config["per_page"] = $limit_results;
        $config["uri_segment"] = 2;
        //styling pagination
        $config['full_tag_open'] = ' <div class="pager2 full-width"> ';
        $config['full_tag_close'] = '</div>';
        $config['num_tag_open'] = '';
        $config['num_tag_close'] = '';
        $config['cur_tag_open'] = '<span>';
        $config['cur_tag_close'] = '</span>';
        $config['next_link'] = 'Próximo';
        $config['prev_link'] = 'Anterior';
        $config['last_link'] = FALSE;
        $config['first_link'] = FALSE;
        $config['last_tag_open'] = '';
        $config['first_tag_open'] = '';
        $config['next_tag_open'] = '';
        $config['prev_tag_open'] = '';
        $config['next_tag_close'] = '';
        $config['last_tag_close'] = '';
        $config['first_tag_close'] = '';
        $config['prev_tag_close'] = '';
        
        $this->pagination->initialize($config);

        $this->data["links"] = $this->pagination->create_links();
        $this->data["total_seminovos"] = $total_seminovos;

        // Menu
        $this->data['menu_embarcacoes_cim'] = $this->Embarcacoes_m->get_embarcacoes(array('categoria' => 'cimitarra'));
        $this->data['menu_embarcacoes_ciy'] = $this->Embarcacoes_m->get_embarcacoes(array('categoria' => 'cimitarra-yachts'));

        $this->data['partial'] = $this->load->view('seminovos.php', $this->data, true);
        $this->load->view('common/template.php', $this->data);
    }

    public function detalhe($slug = false)
    {
        $slug || show_404();

        $this->data['active'] = 'seminovos';

        $this->data['seminovo'] = $this->Seminovos_m->get_seminovos(array('slug' => $slug));

        $this->data['seminovo'] || show_404();

        $this->data['description'] = $this->data["seminovo"]->description;

        $this->data['all_news'] = $this->Seminovos_m->get_seminovos(array('id' => $this->data['seminovo']->id));

        $this->data['imagens'] = $this->Seminovos_m->get_imagens($this->data['seminovo']->id);

        // Menu
        $this->data['menu_embarcacoes_cim'] = $this->Embarcacoes_m->get_embarcacoes(array('categoria' => 'cimitarra'));
        $this->data['menu_embarcacoes_ciy'] = $this->Embarcacoes_m->get_embarcacoes(array('categoria' => 'cimitarra-yachts'));

        $this->data['partial'] = $this->load->view('seminovo.php', $this->data, true);
        $this->load->view('common/template.php', $this->data);
    }
}
