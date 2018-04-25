<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Banners extends CI_Controller {
    
    public $data;

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('usuarios/usuarios_m');
        $this->load->model('banners_m');
    }

    public function index() {
        if ($this->usuarios_m->logado()) {
            if($this->session->userdata('tipo') == 2){
                show_404();
            }
            $this->data["banners"] = $this->banners_m->get_banners();
            $this->load->view('lista', $this->data);
        } else {
            $this->load->view('admin/login/index', $this->data);
        }        
    }

    public function cria() {
        if($this->session->userdata('tipo') == 2){
            show_404();
        }
        $this->data['banner'] = '';
        $this->load->view('cria', $this->data);
    }

    public function salvar() {
        $data = $_POST;
        $data['sort'] = $this->banners_m->get_sort();
        $data['habilitado'] = $this->input->post("habilitado");

        $imagem = $this->banners_m->upload_foto('imagem');
         
        if (!is_array($imagem) && isset($imagem)) {
            if (!is_array($imagem)) {
                $data['imagem'] = $imagem;
            }
        }
        
        $data['video_id'] = get_youtube_id($data['video_id']);

        $this->db->insert('banners', $data);
        $this->session->set_flashdata('messages', 'Banner inserida com sucesso.');
        redirect('banners', 'location');
    }

    public function editar($id = false) {
        if($this->session->userdata('tipo') == 2){
            show_404();
        }

        if (!$id) {
            redirect('banners', 'location');
        }

        $this->data['banner'] = $this->banners_m->get_banner($id);
        $this->load->view('edita', $this->data);
    }

    public function atualizar() {
        $data = $_POST;
        $dataWhere['id'] = $this->input->post("id");
        
        $id = $this->input->post("id");
        
        unset($data['id']);

        $img_nome = $this->banners_m->upload_foto('imagem');

        if (!is_array($img_nome) && isset($img_nome)) {
            if (!is_array($img_nome)) {
                $imagem = $this->banners_m->get_imagem_banner($id);
                // Remove a imagem antiga
                if($imagem){
                    $dir = dirname(getcwd()).'/userfiles/banners/';
                    @unlink($dir.$imagem->imagem);
                }
                
                $data['imagem'] = $img_nome;
            }
        }

        $data['video_id'] = get_youtube_id($data['video_id']);

        if ($this->banners_m->atualizar($data, $dataWhere)) {
            $this->session->set_flashdata('messages', 'Banner atualizado com sucesso.');
            redirect('banners', 'location');
        } else {
            $this->session->set_flashdata('errors', 'Não foi possível atualizar o banner. Tente novamente.');
            redirect('banners', 'location');
        }
    }

    public function limpar() {
        $this->session->set_flashdata('status', '');

        redirect('banners');
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
            redirect('banners');
        }

        $banners = explode(';', $ids);
        
        for ($i = 0; $i <= count($banners) - 1; $i++) {

            if (!$this->banners_m->excluir($banners[$i])) {
                $ok = false;
                $erros[] = $banners[$i];
            }
        }

        if ($ok) {
            $retorno = array('status' => true, 'message' => 'Banners excluídos com sucesso');
        } else {
            $msg = '';

            for ($i = 0; $i <= count($erros) - 2; $i++) {
                $banner = $this->banners_m->get_banner($erros[$i]);
                if ($i < count($erros) - 2)
                    $msg .= $banner->titulo . ", ";
                else
                    $msg .= $banner->titulo . ".";
            }

            $retorno = array('status' => false, 'message' => 'Os seguintes banners não foram excluidas: ' . $msg);
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

            $this->banners_m->atualizar_ordem($id, $sort);
        }
        
        redirect('banners', 'location');
        $this->session->set_flashdata('messages', 'Itens reordenados');
    }

}

?>