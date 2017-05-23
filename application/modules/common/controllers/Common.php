<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Common extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Common_m');
        $this->load->model('noticias/Noticias_m');
        $this->load->helper('text');
    }

    public function common($slug = false)
    {
        $slug || show_404();

        $this->data['common'] = $this->Common_m->get_menu_items(array('slug' => $slug));
        
        $this->data['common'] || show_404();
        
        $this->data['description'] = $this->data['common']->description;

        $this->data['all_menus'] = $this->Common_m->get_menu_items(array('all_menus' => true));
        $this->data['all_news'] = $this->Noticias_m->get_noticias(array('limit' => 2));
        
        $this->data['partial'] = $this->load->view('commons.php', $this->data, true);
        
        $this->load->view('common/template.php', $this->data);   
    }
}