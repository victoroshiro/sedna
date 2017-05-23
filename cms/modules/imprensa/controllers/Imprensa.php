<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Imprensa extends CI_Controller {

    public $data;

    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('pagination');
        $this->load->helper('utility_helper');
        $this->load->model('usuarios/Usuarios_m');
        $this->load->model('Imprensa_m');
    }

    public function index($offset = NULL)
    {
        if ($this->Usuarios_m->logado()) {
            if($this->session->userdata('tipo') == 2){
                show_404();
            }
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

            $this->data["press_lista"] = $this->Imprensa_m->get_imprensa(
                array(
                    'texto' => $texto, 
                    'data_de' => $data_de, 
                    'data_ate' => $data_ate
                )
            );

            $this->load->view('lista', $this->data);
        } else {
            $this->load->view('admin/login/index', $this->data);
        }
        
    }

    public function cria()
    {
        if($this->session->userdata('tipo') == 2){
            show_404();
        }
        $this->load->view('cria');
    }

    public function salvar()
    {
        $data = $_POST;

        if($this->Imprensa_m->salvar($data)){
            $this->session->set_flashdata('messages', 'Registro inserido com sucesso.');
        }else{
            $this->session->set_flashdata('messages', 'Não foi possível inserir o registro. Tente novamente mais tarde.');
        }
        
        redirect('imprensa', 'location');
    }

    public function editar($id = false)
    {
        if($this->session->userdata('tipo') == 2){
            show_404();
        }

        if (!$id) {
            redirect('imprensa', 'location');
        }

        $this->data['ckeditor_descricao'] = array
        (
            //id da textarea a ser substituída pelo CKEditor
            'id' => 'descricao',
 
            // caminho da pasta do CKEditor relativo a pasta raiz do CodeIgniter
            'path' => 'assets/plugins/ckeditor',
 
            // configurações opcionais
            'config' => array
            (
                'toolbar' => "Full",
                'width'   => "700px",
                'height'  => "300px",
            )
        );

        $this->data['press'] = $this->Imprensa_m->get_imprensa(array('id' => $id));
        
        $this->load->view('edita', $this->data);
    }

    public function atualizar()
    {
        $data = $_POST;

        $dataWhere['id'] = $this->input->post("id");
        $id = $this->input->post("id");
        
        unset($data['id']);

        if ($this->Imprensa_m->atualizar($data, $dataWhere)) {
            $this->session->set_flashdata('messages', 'Registro atualizado com sucesso.');
            redirect('imprensa/editar/' .$id, 'location');
        } else {
            $this->session->set_flashdata('errors', 'Não foi possível atualizar o registro. Tente novamente.');
            redirect('imprensa/editar/' . $id, 'location');
        }
    }

    public function limpar()
    {
        $this->session->set_flashdata('texto', '');
        $this->session->set_flashdata('data_de', '');
        $this->session->set_flashdata('data_ate', '');
        $this->session->set_flashdata('id', '');
        
        redirect('imprensa');
    }

    public function excluir_selecionados()
    {
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
            redirect('imprensa');
        }

        $imprensa = explode(';', $ids);
        
        for ($i = 0; $i <= count($imprensa) - 1; $i++) {

            if (!$this->Imprensa_m->excluir($imprensa[$i])) {
                $ok = false;
                $erros[] = $imprensa[$i];
            }
        }

        if ($ok) {
            $retorno = array('status' => true, 'message' => 'Registros excluídos com sucesso');
        } else {
            $msg = '';

            for ($i = 0; $i <= count($erros) - 2; $i++) {
                $press = $this->Imprensa_m->get_imprensa(array('id' => $erros[$i]));
                if ($i < count($erros) - 2)
                    $msg .= $press->titulo . ", ";
                else
                    $msg .= $press->titulo . ".";
            }

            $retorno = array('status' => false, 'message' => 'Os seguintes registros não foram excluídos: ' . $msg);
        }

        echo json_encode($retorno);
    }
}

?>