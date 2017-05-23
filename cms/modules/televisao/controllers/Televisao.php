<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Televisao extends CI_Controller {

    public $data;

    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('pagination');
        $this->load->helper('utility_helper');
        $this->load->model('usuarios/Usuarios_m');
        $this->load->model('Televisao_m');
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

            $this->data["tele_lista"] = $this->Televisao_m->get_televisao(
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

        $img_nome = $this->_upload_foto(array('field' => 'imagem', 'width' => 600, 'height' => 335));
        
        if (!is_array($img_nome) && isset($img_nome)) {
            $data['imagem'] = $img_nome;
        }

        if($this->Televisao_m->salvar($data)){
            $this->session->set_flashdata('messages', 'Registro inserido com sucesso.');
        }else{
            $this->session->set_flashdata('messages', 'Não foi possível inserir o registro. Tente novamente mais tarde.');
        }
        
        redirect('televisao', 'location');
    }

    public function editar($id = false)
    {
        if($this->session->userdata('tipo') == 2){
            show_404();
        }

        if (!$id) {
            redirect('televisao', 'location');
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

        $this->data['tele'] = $this->Televisao_m->get_televisao(array('id' => $id));
        
        $this->load->view('edita', $this->data);
    }

    public function atualizar()
    {
        $data = $_POST;

        $dataWhere['id'] = $this->input->post("id");
        $id = $this->input->post("id");
        
        unset($data['id']);

        $img_nome = $this->_upload_foto(array('field' => 'imagem', 'width' => 600, 'height' => 335));
        if (!is_array($img_nome) && isset($img_nome)) {
            $data['imagem'] = $img_nome;
        }

        if ($this->Televisao_m->atualizar($data, $dataWhere)) {
            $this->session->set_flashdata('messages', 'Registro atualizado com sucesso.');
            redirect('televisao/editar/' .$id, 'location');
        } else {
            $this->session->set_flashdata('errors', 'Não foi possível atualizar o registro. Tente novamente.');
            redirect('televisao/editar/' . $id, 'location');
        }
    }

    public function limpar()
    {
        $this->session->set_flashdata('texto', '');
        $this->session->set_flashdata('data_de', '');
        $this->session->set_flashdata('data_ate', '');
        $this->session->set_flashdata('id', '');
        
        redirect('televisao');
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
            redirect('televisao');
        }

        $televisao = explode(';', $ids);
        
        for ($i = 0; $i <= count($televisao) - 1; $i++) {

            if (!$this->Televisao_m->excluir($televisao[$i])) {
                $ok = false;
                $erros[] = $televisao[$i];
            }
        }

        if ($ok) {
            $retorno = array('status' => true, 'message' => 'Registros excluídos com sucesso');
        } else {
            $msg = '';

            for ($i = 0; $i <= count($erros) - 2; $i++) {
                $tele = $this->Televisao_m->get_televisao(array('id' => $erros[$i]));
                if ($i < count($erros) - 2)
                    $msg .= $tele->titulo . ", ";
                else
                    $msg .= $tele->titulo . ".";
            }

            $retorno = array('status' => false, 'message' => 'Os seguintes registros não foram excluídos: ' . $msg);
        }

        echo json_encode($retorno);
    }

    private function _upload_foto($params = array())
    {

        $options = array(
            'field' => false,
            'height' => false,
            'width' => false
        );

        $params = array_merge($options, $params);

        $dir = dirname(getcwd()).'/userfiles/televisao/';

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
}

?>