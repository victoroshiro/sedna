<?php

class Landing_pages extends CI_Controller {

	public $data;

	public function __construct() {
		parent::__construct();
		$this->load->library('pagination');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('utility_helper');
		$this->load->model('usuarios/Usuarios_m');
		$this->load->model('Landing_pages_m');

	}

	public function index($offset = NULL) 
	{
		if ($this->Usuarios_m->logado()) {
			
			if ($this->input->post('texto')) {
				$texto = $this->input->post('texto');
				$this->session->set_flashdata('texto', $this->input->post('texto'));
			} else {
				$texto = $this->session->flashdata('texto');
				$this->session->set_flashdata('texto', $texto);
			}

			$data_de = $this->input->post('data_de');
			$data_ate = $this->input->post('data_ate');
			$texto = $this->input->post('texto');

			$this->data["landing_pages"] = $this->Landing_pages_m->get_landing_pages(
				array(
					"texto" => $texto, 
				)
			);
			$this->load->view('landing_pages/lista', $this->data);
		} else {
			 $this->load->view('admin/login/index', $this->data);
		}
		
	}

	public function cria() 
	{
		$this->load->view('landing_pages/cria');
	}

	public function salvar() 
	{
		$data = $this->input->post();

		/*$img_nome = $this->_upload_foto(array('field' => 'imagem', 'width' => 600, 'height' => 600));
		if (!is_array($img_nome) && isset($img_nome)) {
			$data['imagem'] = $img_nome;
		}*/

		if($this->Landing_pages_m->salvar($data)){
            $this->session->set_flashdata('messages', 'Registro inserido com sucesso.');
        }else{
            $this->session->set_flashdata('messages', 'Não foi possível inserir o registro. Tente novamente mais tarde.');
        }
        
        redirect('landing_pages', 'location');
	}

	public function editar($id = false) 
	{
		if (!$id) {
			redirect('landing_pages', 'location');
		}

		$data['landing_page'] = $this->Landing_pages_m->get_landing_pages(array('id' => $id));
		$data['landing_page_links'] = $this->Landing_pages_m->get_landing_page_links($id);

		$this->load->view('landing_pages/edita', $data);
	}

	public function atualizar() 
	{
		
		$data = $this->input->post();

		$dataWhere['id'] = $id = $this->input->post("id");
		unset($data['id']);

		/*$img_nome = $this->_upload_foto(array('field' => 'imagem', 'width' => 600, 'height' => 600));
		if (!is_array($img_nome) && isset($img_nome)) {
			$data['imagem'] = $img_nome;
		}*/
		
		if ($this->Landing_pages_m->atualizar($data, $dataWhere)) {
			$this->session->set_flashdata('messages', 'Landing page atualizada com sucesso.');
			redirect('landing_pages/editar/' .$id, 'location');
		} else {
			$this->session->set_flashdata('errors', 'Não foi possível atualizar a landing page. Tente novamente.');
			redirect('landing_pages/editar/' . $id, 'location');
		}
	}

	public function inserir_link() 
	{
		$data = $this->input->post();

		if($this->Landing_pages_m->salvar_link($data)){
            $this->session->set_flashdata('messages', 'Registro inserido com sucesso.');
            $this->session->set_flashdata('links', "true");
        }else{
            $this->session->set_flashdata('messages', 'Não foi possível inserir o registro. Tente novamente mais tarde.');
            $this->session->set_flashdata('links', "true");
        }

		redirect('landing_pages/editar/' . $data['landing_page_id'], 'location');
	}

	public function excluir_link($id) 
	{
		$this->Landing_pages_m->excluir_link($id);
		redirect('landing_pages/', 'location');
	}

	

	public function limpar() 
	{
		$this->session->set_flashdata('texto', '');
		$this->session->set_flashdata('data_de', '');
		$this->session->set_flashdata('data_ate', '');
		redirect('landing_pages');
	}

	private function _upload_foto($params = array())
    {

        $options = array(
            'field' => false,
            'height' => false,
            'width' => false
        );

        $params = array_merge($options, $params);

        $dir = dirname(getcwd()).'/userfiles/landing_pages/';

        $config['upload_path'] = $dir;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;
        $config['maintain_ratio'] = FALSE;
        $config['max_size'] = '500000';
        $config['max_width'] = '10024';
        $config['max_height'] = '7068';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $field_name = $params['field'];

        if ($this->upload->do_upload($field_name)) {
            $dados = $this->upload->data();

            $size = getimagesize($dados['full_path']);

            $config_img['image_library'] = 'GD2';
            $config_img['source_image'] = $dados['full_path'];
            $config_img['create_thumb'] = FALSE;
            $config_img['maintain_ratio'] = FALSE;
            $config_img['encrypt_name'] = TRUE;

            $config_img['width'] = $params['width'];
            $config_img['height'] = $params['height'];

            $this->image_lib->initialize($config_img);

            $config['source_image'] = $dir.'/'.$dados['file_name'];
            $this->image_lib->resize($config['source_image']);
            // Returns the photo name
            return $dados['file_name'];
        } else {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        }
    }

	public function excluir_selecionados()
    {
        $ok = true;
        $erros = array();

        if (!$this->input->is_ajax_request()) {
           show_404();
        }

        $ids = $this->input->post("ids");

        if (!$ids) {
            $this->session->set_flashdata('errors', 'Você deve selecionar pelo menos um registro para excluir');
            redirect('landing_pages');
        }

        $landing_pages = explode(';', $ids);
        
        for ($i = 0; $i <= count($landing_pages) - 1; $i++) {

            if (!$this->Landing_pages_m->excluir($landing_pages[$i])) {
                $ok = false;
                $erros[] = $landing_pages[$i];
            }
        }

        if ($ok) {
            $retorno = array('status' => true, 'message' => 'Registros excluídos com sucesso');
        } else {
            $msg = '';

            for ($i = 0; $i <= count($erros) - 2; $i++) {
                $midia = $this->Landing_pages_m->get_landing_pages(array('id' => $erros[$i]));
                if ($i < count($erros) - 2)
                    $msg .= $midia->titulo . ", ";
                else
                    $msg .= $midia->titulo . ".";
            }

            $retorno = array('status' => false, 'message' => 'Os seguintes registros não foram excluídos: ' . $msg);
        }

        echo json_encode($retorno);
    }
}

?>