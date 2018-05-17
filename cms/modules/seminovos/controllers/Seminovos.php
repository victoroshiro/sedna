<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Seminovos extends CI_Controller {

    public $data;

    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('pagination');
        $this->load->helper('utility_helper');
        $this->load->model('usuarios/Usuarios_m');
        $this->load->model('Seminovos_m');
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

            $this->data["seminovos_lista"] = $this->Seminovos_m->get_seminovos(
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

        $img_nome = $this->_upload_foto(array('field' => 'imagem', 'width' => 870, 'height' => 485));
        
        if (!is_array($img_nome) && isset($img_nome)) {
            $data['imagem'] = $img_nome;
        }

        if($this->Seminovos_m->salvar($data)){
            $this->session->set_flashdata('messages', 'Registro inserido com sucesso.');
        }else{
            $this->session->set_flashdata('messages', 'Não foi possível inserir o registro. Tente novamente mais tarde.');
        }
        
        redirect('seminovos', 'location');
    }

    public function editar($id = false)
    {
        if($this->session->userdata('tipo') == 2){
            show_404();
        }

        if (!$id) {
            redirect('seminovos', 'location');
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

        $this->data['imagens'] = $this->Seminovos_m->get_imagens($id);

        if($this->data['imagens']){
            $this->data['imagens_group'] = array_chunk($this->data['imagens'], 3);
        }

        $this->data['seminovo'] = $this->Seminovos_m->get_seminovos(array('id' => $id));
        
        $this->load->view('edita', $this->data);
    }

    public function atualizar()
    {
        $data = $_POST;

        $dataWhere['id'] = $this->input->post("id");
        $id = $this->input->post("id");
        
        unset($data['id']);

        $img_nome = $this->_upload_foto(array('field' => 'imagem', 'width' => 870, 'height' => 485));
        if (!is_array($img_nome) && isset($img_nome)) {
            $data['imagem'] = $img_nome;
        }

        if ($this->Seminovos_m->atualizar($data, $dataWhere)) {
            $this->session->set_flashdata('messages', 'Registro atualizado com sucesso.');
            redirect('seminovos/editar/' .$id, 'location');
        } else {
            $this->session->set_flashdata('errors', 'Não foi possível atualizar o registro. Tente novamente.');
            redirect('seminovos/editar/' . $id, 'location');
        }
    }

    public function limpar()
    {
        $this->session->set_flashdata('texto', '');
        $this->session->set_flashdata('data_de', '');
        $this->session->set_flashdata('data_ate', '');
        $this->session->set_flashdata('id', '');
        
        redirect('seminovos');
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
            redirect('seminovos');
        }

        $seminovos = explode(';', $ids);
        
        for ($i = 0; $i <= count($seminovos) - 1; $i++) {

            if (!$this->Seminovos_m->excluir($seminovos[$i])) {
                $ok = false;
                $erros[] = $seminovos[$i];
            }
        }

        if ($ok) {
            $retorno = array('status' => true, 'message' => 'Registros excluídos com sucesso');
        } else {
            $msg = '';

            for ($i = 0; $i <= count($erros) - 2; $i++) {
                $seminovo = $this->Seminovos_m->get_seminovos(array('id' => $erros[$i]));
                if ($i < count($erros) - 2)
                    $msg .= $seminovo->titulo . ", ";
                else
                    $msg .= $seminovo->titulo . ".";
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

        $dir = dirname(getcwd()).'/userfiles/seminovos/';

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

    public function atualiza_link()
    {
        $data = $this->input->post();

        $response = array('status' => false, 'message' => 'Ocorreu um erro no envio. Tente novamente mais tarde.');

        if($data){
            $this->Seminovos_m->atualiza_link($data);

            $response = array('status' => true, 'message' => 'Tipo atualizado com sucesso!');
        }

        echo json_encode($response);
    }

    function galeria(){

        $data['id_seminovo'] = $this->input->post('id_seminovo');

        $imagens = $this->Seminovos_m->upload_foto_galeria('imagem');
        
        if (isset($imagens) && $imagens != false) {
            foreach ($imagens as $nome) {
                
                $data['imagem'] = $nome;
                
                $this->Seminovos_m->salva_imagens($data);
            }

            if(($data['id_seminovo'] && $data['id_seminovo'] != 0) && isset($data['imagem'])){
                $this->session->set_flashdata('messages', 'Imagens cadastradas com sucesso.');
                $this->session->set_flashdata('tab_gal', true);
            }else{
                $this->session->set_flashdata('errors', 'Ocorreu um erro. Verifique os campos e tente novamente mais tarde.');
                $this->session->set_flashdata('tab_gal', true);
            }
        }

        $imagens = $this->Seminovos_m->get_imagens($data['id_seminovo']);
        
        redirect('seminovos/editar/'.$data['id_seminovo'], 'location');

    }

    public function exclui_imagem_galeria($id = false){
        $id || show_404();

        $imagem = $this->Seminovos_m->get_imagens(false, $id);

        if($this->Seminovos_m->exclui_imagem_galeria($id)){
            @unlink(dirname('userfiles/seminovos/'.$imagem->imagem));
        }
        
        $this->session->set_flashdata('messages', 'Imagem excluída com sucesso.');
        $this->session->set_flashdata('tab_gal', true);
        
        redirect('seminovos/editar/' . $imagem->id_seminovo, 'location');
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

            $this->Seminovos_m->atualizar_ordem($id, $sort);
        }
        
        redirect('seminovos', 'location');
        $this->session->set_flashdata('messages', 'Itens reordenados');
    }
}

?>
