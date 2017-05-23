<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Landing_pages extends CI_Controller {

	public function __construct() 
    {
		parent::__construct();
        $this->load->model('Landing_pages_m');
	}

	public function index($slug = false)
    {
        $slug || show_404();

        $this->data['active'] = 'landing-pages';
        
        $this->data['landing_pages'] = $this->Landing_pages_m->get_landing_pages();
        $this->data['landing_page'] = $this->Landing_pages_m->get_landing_pages(array('slug' => $slug));

        $this->data['landing_page'] || show_404();

        $this->data['description'] = $this->data['landing_page']->description;

        $this->data['landing_page_links'] = $this->Landing_pages_m->get_landing_page_links($this->data['landing_page']->id);

        $this->data['partial'] = $this->load->view('landing_page.php', $this->data, true);
        $this->load->view('common/template.php', $this->data);
    }
}