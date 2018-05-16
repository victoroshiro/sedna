<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Destaques extends CI_Controller {
    
    public $data;

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('usuarios/usuarios_m');
        $this->load->model('destaques_m');
    }

    public function index() {
        if ($this->usuarios_m->logado()) {
            if($this->session->userdata('tipo') == 2){
                show_404();
            }
            $this->data["destaques"] = $this->destaques_m->get_destaques();
            $this->load->view('lista', $this->data);
        } else {
            $this->load->view('admin/login/index', $this->data);
        }        
    }

    public function cria() {
        if($this->session->userdata('tipo') == 2){
            show_404();
        }
        $this->data['destaque'] = '';
        $this->load->view('cria', $this->data);
    }

    public function salvar() {
        $data = $_POST;
        $data['sort'] = $this->destaques_m->get_sort();
        $data['habilitado'] = $this->input->post("habilitado");

        $imagem = $this->destaques_m->upload_foto('imagem');

        if (!is_array($imagem) && isset($imagem)) {
            if (!is_array($imagem)) {
                $data['imagem'] = $imagem;
            }
        }

        $this->db->insert('destaques', $data);
        $this->session->set_flashdata('messages', 'Destaque inserida com sucesso.');
        redirect('destaques', 'location');
    }

    public function editar($id = false) {
        if($this->session->userdata('tipo') == 2){
            show_404();
        }

        if (!$id) {
            redirect('destaques', 'location');
        }

        $this->data['destaque'] = $this->destaques_m->get_destaque($id);
        $this->load->view('edita', $this->data);
    }

    public function atualizar() {
        $data = $_POST;
        $dataWhere['id'] = $this->input->post("id");
        
        $id = $this->input->post("id");
        
        unset($data['id']);

        $img_nome = $this->destaques_m->upload_foto('imagem');

        if (!is_array($img_nome) && isset($img_nome)) {
            if (!is_array($img_nome)) {
                $imagem = $this->destaques_m->get_imagem_destaque($id);
                // Remove a imagem antiga
                if($imagem){
                    $dir = dirname(getcwd()).'/userfiles/destaques/';
                    @unlink($dir.$imagem->imagem);
                }
                
                $data['imagem'] = $img_nome;
            }
        }

        if ($this->destaques_m->atualizar($data, $dataWhere)) {
            $this->session->set_flashdata('messages', 'Destaque atualizado com sucesso.');
            redirect('destaques', 'location');
        } else {
            $this->session->set_flashdata('errors', 'Não foi possível atualizar o destaque. Tente novamente.');
            redirect('destaques', 'location');
        }
    }

    public function limpar() {
        $this->session->set_flashdata('status', '');

        redirect('destaques');
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
            redirect('destaques');
        }

        $destaques = explode(';', $ids);
        
        for ($i = 0; $i <= count($destaques) - 1; $i++) {

            if (!$this->destaques_m->excluir($destaques[$i])) {
                $ok = false;
                $erros[] = $destaques[$i];
            }
        }

        if ($ok) {
            $retorno = array('status' => true, 'message' => 'Destaques excluídos com sucesso');
        } else {
            $msg = '';

            for ($i = 0; $i <= count($erros) - 2; $i++) {
                $destaque = $this->destaques_m->get_destaque($erros[$i]);
                if ($i < count($erros) - 2)
                    $msg .= $destaque->titulo . ", ";
                else
                    $msg .= $destaque->titulo . ".";
            }

            $retorno = array('status' => false, 'message' => 'Os seguintes destaques não foram excluidas: ' . $msg);
        }

        echo json_encode($retorno);
    }

    public function salvar_ordem()
    {
        $data = $this->input->post();

        $lis = explode( ';' , $data['new_order_array'] );

        foreach ( $lis as $key => $val ) {
            //explode each value found by "="...
            $pos = explode( '=' , $val );
            
            $id = $pos[0];
            $sort = $pos[1];

            $this->destaques_m->atualizar_ordem($id, $sort);
        }
        
        redirect('destaques', 'location');
        $this->session->set_flashdata('messages', 'Itens reordenados');
    }

}

?>
