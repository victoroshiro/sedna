<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        $this->load->model('usuarios/usuarios_m');
    }

    public function index() {
        if ($this->usuarios_m->logado()) {
            if ($this->session->userdata('tipo') == 2) {
                $usuarioID = $this->session->userdata('usuarioID');
            }
            $this->load->view('admin/admin/index', $this->data);
        } else {
            $this->load->view('admin/login/index', $this->data);
        }
    }

    public function logar() {
        if ($_POST) {
            $usuario = $this->input->post("usuario");
            $senha = $this->input->post("senha");
            
            if($this->usuarios_m->login($usuario, $senha)){
                redirect("admin/index");
            } else {
                $data["msg"] = "Usuário ou senha inválida";
                $this->load->view("admin/login/index", $data);
            }
        } else {
            return false;
        }
    }

    function sair() {
        $this->session->sess_destroy();
        redirect("admin");
    }
}

?>