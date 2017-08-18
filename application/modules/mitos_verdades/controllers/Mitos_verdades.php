<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mitos_verdades extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
        $this->load->model('Mitos_verdades_m');
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
        $this->data['title'] = 'Clínica Cimitarra - Mitos e verdades sobre a saúde da mulher.';
        $this->data['description'] = 'Clínica especializada na saúde da mulher - Dra. Flávia Fairbanks - Confira os principais mitos e verdades sobre a saúde feminina.';

        //pagination
        $limit_results = 9;
        $offset_page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $this->data["mitos_verdades"] = $this->Mitos_verdades_m->get_mitos_verdades(
            array(
                'limit' => $limit_results, 
                'offset' => $offset_page,
            )
        );

        $total_mitos_verdades = $this->Mitos_verdades_m->get_mitos_verdades(
            array(
                'count' => true,
            )
        );

        $config = array();

        $config["base_url"] = base_url() . "mitos-verdades";
        $config["total_rows"] = $total_mitos_verdades;
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
        $this->data["total_mitos_verdades"] = $total_mitos_verdades;

        $this->data['partial'] = $this->load->view('mitos_verdades.php', $this->data, true);
        $this->load->view('common/template.php', $this->data);
    }

    public function detalhe($slug = false)
    {
        $slug || show_404();

        $this->data['menu_gineco'] = $this->Ginecologia_m->get_ginecologias();
        $this->data['menu_sex'] = $this->Sexualidade_m->get_sexualidades();
        $this->data['menu_obs'] = $this->Obstetricia_m->get_obstetricias();
        $this->data['menu_imp'] = $this->Imprensa_m->get_imprensas();

        $this->data['mito_verdade'] = $this->Mitos_verdades_m->get_mitos_verdades(array('slug' => $slug));

        $this->data['mito_verdade'] || show_404();

        $this->data['description'] = $this->data["mito_verdade"]->description;

        $this->data['title'] = $this->data['mito_verdade']->title;

        $this->data['all_myths'] = $this->Mitos_verdades_m->get_mitos_verdades(array('id' => $this->data['mito_verdade']->id));

        $this->data['partial'] = $this->load->view('mito_verdade.php', $this->data, true);
        $this->load->view('common/template.php', $this->data);
    }
}