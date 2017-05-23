<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public $data;
    
    public function __construct() {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Usuarios_m');
        // $this->Usuarios_m->previlegio(array(1));
        
        $this->load->model('Usuarios_m');
    }

    public function index($offset = NULL) {
        if ($this->Usuarios_m->logado()) {

            if($this->session->userdata('tipo') == 2){
                show_404();
            }

            if ($this->input->post('nome')) {
                $nome = $this->input->post('nome');
                $this->session->set_flashdata('nome', $this->input->post('nome'));
            } else {
                $nome = $this->session->flashdata('nome');
                $this->session->set_flashdata('nome', $nome);
            } 

            $this->data["usuarios"] = $this->Usuarios_m->get_usuarios(@$tipo, $nome);
            
            /*$limit = 10;
            $offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $this->data["usuarios"] = $this->Usuarios_m->get_usuarios(@$tipo, $nome, $limit, $offset, NULL);
            $total_usuarios = $this->Usuarios_m->get_usuarios(@$tipo, $nome, $limit, $offset, TRUE);
           
            $config = array();
            $config["base_url"] = base_url() . "usuarios/index/";
            $config["total_rows"] = $total_usuarios;
            $config["per_page"] = $limit;
            $config["uri_segment"] = 4;

            $this->pagination->initialize($config);
            
            $this->data["links"] = $this->pagination->create_links();
            $this->data["total_usuarios"] = $total_usuarios;*/
            
            $this->load->view('lista', $this->data);
        } else {
            $this->load->view('admin/login/index', $this->data);
        }
       
    }

    public function cria() {
        if($this->session->userdata('tipo') == 2){
            show_404();
        }
        $this->load->view('cria', $this->data);
    }

    function salvar() {
        $data = $_POST;
        $usuarioID = $this->Usuarios_m->salvar($data);

        $this->session->set_flashdata('messages', 'Usuário inserido com sucesso.');
        redirect('usuarios', 'location');
    }

    public function editar($usuarioID = false) {
        if($this->session->userdata('tipo') == 2){
            show_404();
        }
        if (!$usuarioID) {
            redirect('usuarios', 'location');
        }
        $this->data['usuario'] = $this->Usuarios_m->get_usuario($usuarioID);
        $this->load->view('edita', $this->data);
    }

    public function atualizar() {
        $data = $_POST;
        $dataWhere['adm_usuarioID'] = $this->input->post("usuarioID");
        $usuarioID = $this->input->post("usuarioID");
        unset($data['usuarioID']);
        if ($this->Usuarios_m->atualizar($data, $dataWhere)) {
            $this->session->set_flashdata('messages', 'Usuário atualizado com sucesso.');
            redirect('usuarios/editar/'.$usuarioID, 'location');
        } else {
            $this->session->set_flashdata('errors', 'Não foi possível atualizar o usuário. Tente novamente.');
            redirect('usuarios', 'location');
        }
    }

    public function limpar() {
        $this->session->set_flashdata('nome', '');
        redirect('usuarios');
    }

    public function excluir_selecionados() {

        if($this->session->userdata('tipo') == 2){
            show_404();
        }

        $ok = true;
        $erros = array();

        if (!$this->input->is_ajax_request()) {
           show_404();
        }

        $ids = $this->input->post("ids");

        if (!$ids) {
            $this->session->set_flashdata('errors', 'Você deve selecionar pelo menos um registro para excluir');
            redirect('usuarios');
        }

        $usuarios = explode(';', $ids);
        
        for ($i = 0; $i <= count($usuarios) - 1; $i++) {

            if (!$this->Usuarios_m->excluir($usuarios[$i])) {
                $ok = false;
                $erros[] = $usuarios[$i];
            }
        }

        if ($ok) {
            $retorno = array('status' => true, 'message' => 'Registros excluídos com sucesso');
        } else {
            $retorno = array('status' => false, 'message' => 'Ocorreu um erro ao excluir. Tente novamente mais tarde.');
        }

        echo json_encode($retorno);
    }
}
?>