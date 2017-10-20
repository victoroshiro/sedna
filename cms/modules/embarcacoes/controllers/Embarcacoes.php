<?php

class Embarcacoes extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper('utility_helper');
        $this->load->model('usuarios/Usuarios_m');
        $this->load->model('Embarcacoes_m');
    }

    public function index($offset = NULL) {
        if ($this->Usuarios_m->logado()) {
            if ($this->session->userdata('tipo') == 2) {
                $usuarioID = $this->session->userdata('usuarioID');
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

            $this->data["embarcacoes"] = $this->Embarcacoes_m->get_embarcacoes(
                $data_de = $data_de, 
                $data_ate = $data_ate, 
                $texto = $texto,
                $limit = NULL, 
                $count = NULL, 
                $offset = NULL,
                $menos_esta = NULL, 
                $destaque = FALSE,
                $admin = true
            );
            $this->load->view('lista', $this->data);
        } else {
            $this->load->view('admin/login/index', $this->data);
        }
        
    }

    public function cria() {
        $this->load->view('cria');
    }    
   
    public function salvar() 
    {
        $data = $this->input->post();

        /*$img_nome = $this->Embarcacoes_m->upload_foto_pequena('imagem');
        if (!is_array($img_nome) && isset($img_nome)) {
            if (!is_array($img_nome)) {

                $data['imagem'] = $img_nome; 
            }
        }*/        
        
        $img_nome2 = $this->Embarcacoes_m->upload_foto_pequena('imagem2');
        if (!is_array($img_nome2) && isset($img_nome2)) {
            if (!is_array($img_nome2)) {

                $data['imagem2'] = $img_nome2; 
            }
        }

        $img_nome3 = $this->Embarcacoes_m->upload_foto_banner('imagem3');
        if (!is_array($img_nome3) && isset($img_nome3)) {
            if (!is_array($img_nome3)) {

                $data['imagem3'] = $img_nome3; 
            }
        }

        if($this->Embarcacoes_m->salvar($data)){
            $this->session->set_flashdata('messages', 'Registro cadastrado com sucesso.');
            redirect('embarcacoes', 'location');
        }else{
            $this->session->set_flashdata('messages', 'Não foi possível atualizar o registro. Tente novamente.');
            redirect('embarcacoes', 'location');
        }
    }

    public function editar($id = false) {
        
        if (!$id) {
            redirect('embarcacoes', 'location');
        }

        $this->data['embarcacao'] = $this->Embarcacoes_m->get_embarcacao($id);
        $this->data['embarcacao_descricao'] = $this->Embarcacoes_m->get_embarcacao_descricao($id);
        $this->data['embarcacao_especificacoes'] = $this->Embarcacoes_m->get_embarcacao_especificacoes($id);
        $this->data['embarcacao_serie'] = $this->Embarcacoes_m->get_embarcacao_serie($id);
        $this->data['imagens'] = $this->Embarcacoes_m->get_imagens($id);
        $this->data['panoramas'] = $this->Embarcacoes_m->get_panoramas($id);

        if($this->data['imagens']){
            $this->data['imagens_group'] = array_chunk($this->data['imagens'], 3);
        }

        if($this->data['panoramas']){
            $this->data['panoramas_group'] = array_chunk($this->data['panoramas'], 3);
        }


        $this->load->view('edita', $this->data);
    }

    public function atualizar() {
        $data = $_POST;
        $dataWhere['id'] = $this->input->post("id");
        
        $id = $this->input->post("id");
        unset($data['id']);


        /*$img_nome = $this->Embarcacoes_m->upload_foto_pequena('imagem');
        if (!is_array($img_nome) && isset($img_nome)) {
            if (!is_array($img_nome)) {
                $data['imagem'] = $img_nome;
            }
        }*/

        $img_nome2 = $this->Embarcacoes_m->upload_foto_pequena('imagem2');
        if (!is_array($img_nome2) && isset($img_nome2)) {
            if (!is_array($img_nome2)) {
                $data['imagem2'] = $img_nome2;
            }
        }

        $img_nome3 = $this->Embarcacoes_m->upload_foto_banner('imagem3');
        if (!is_array($img_nome3) && isset($img_nome3)) {
            if (!is_array($img_nome3)) {

                $data['imagem3'] = $img_nome3; 
            }
        }

        if ($this->Embarcacoes_m->atualizar($data, $dataWhere)) {
            $this->session->set_flashdata('messages', 'Registro atualizado com sucesso.');
            redirect('embarcacoes/editar/' .$id, 'location');
        } else {
            $this->session->set_flashdata('errors', 'Não foi possível atualizar o registro. Tente novamente.');
            redirect('embarcacoes/editar/' . $id, 'location');
        }
        
    }

    public function atualiza_link()
    {
        $data = $this->input->post();

        $response = array('status' => false, 'message' => 'Ocorreu um erro no envio. Tente novamente mais tarde.');

        if($data){
            $this->Embarcacoes_m->atualiza_link($data);

            $response = array('status' => true, 'message' => 'Tipo atualizado com sucesso!');
        }

        echo json_encode($response);
    }

    public function salva_descricao() 
    {
        $data = $this->input->post();

        
        $img_nome2 = $this->Embarcacoes_m->upload_foto_grande('imagem', 570, 713);
        if (!is_array($img_nome2) && isset($img_nome2)) {
            if (!is_array($img_nome2)) {

                $data['imagem'] = $img_nome2; 
            }
        }

        $img_nome3 = $this->Embarcacoes_m->upload_foto_grande('imagem2', 1577, 1051);
        if (!is_array($img_nome3) && isset($img_nome3)) {
            if (!is_array($img_nome3)) {

                $data['imagem2'] = $img_nome3; 
            }
        }

        if($this->Embarcacoes_m->salvar_descricao($data)){
            $this->session->set_flashdata('messages', 'Registro cadastrado com sucesso.');
            redirect('embarcacoes', 'location');
        }else{
            $this->session->set_flashdata('messages', 'Não foi possível atualizar o registro. Tente novamente.');
            redirect('embarcacoes', 'location');
        }
    }

    public function salva_especificacoes() 
    {
        $data = $this->input->post();

        if($this->Embarcacoes_m->salvar_especificacoes($data)){
            $this->session->set_flashdata('messages', 'Registro cadastrado com sucesso.');
            redirect('embarcacoes', 'location');
        }else{
            $this->session->set_flashdata('messages', 'Não foi possível atualizar o registro. Tente novamente.');
            redirect('embarcacoes', 'location');
        }
    }

    public function salva_serie() 
    {
        $data = $this->input->post();

        if($this->Embarcacoes_m->salvar_serie($data)){
            $this->session->set_flashdata('messages', 'Registro cadastrado com sucesso.');
            redirect('embarcacoes', 'location');
        }else{
            $this->session->set_flashdata('messages', 'Não foi possível atualizar o registro. Tente novamente.');
            redirect('embarcacoes', 'location');
        }
    }

    function galeria(){

        $data['id_embarcacao'] = $this->input->post('id_embarcacao');

        $imagens = $this->Embarcacoes_m->upload_foto_galeria('imagem');
        
        if (isset($imagens) && $imagens != false) {
            foreach ($imagens as $nome) {
                
                $data['imagem'] = $nome;
                
                $this->Embarcacoes_m->salva_imagens($data);
            }

            if(($data['id_embarcacao'] && $data['id_embarcacao'] != 0) && isset($data['imagem'])){
                $this->session->set_flashdata('messages', 'Imagens cadastradas com sucesso.');
                $this->session->set_flashdata('tab_gal', true);
            }else{
                $this->session->set_flashdata('errors', 'Ocorreu um erro. Verifique os campos e tente novamente mais tarde.');
                $this->session->set_flashdata('tab_gal', true);
            }
        }

        $imagens = $this->Embarcacoes_m->get_imagens($data['id_embarcacao']);
        
        redirect('embarcacoes/editar/'.$data['id_embarcacao'], 'location');

    }

    function panorama(){

        $data['id_embarcacao'] = $this->input->post('id_embarcacao');

        $imagens = $this->Embarcacoes_m->upload_foto_panorama('imagem');
        
        if (isset($imagens) && $imagens != false) {
            foreach ($imagens as $nome) {
                
                $data['imagem'] = $nome;
                
                $this->Embarcacoes_m->salva_panoramas($data);
            }

            if(($data['id_embarcacao'] && $data['id_embarcacao'] != 0) && isset($data['imagem'])){
                $this->session->set_flashdata('messages', 'Imagens cadastradas com sucesso.');
                $this->session->set_flashdata('tab_pan', true);
            }else{
                $this->session->set_flashdata('errors', 'Ocorreu um erro. Verifique os campos e tente novamente mais tarde.');
                $this->session->set_flashdata('tab_pan', true);
            }
        }

        $panoramas = $this->Embarcacoes_m->get_panoramas($data['id_embarcacao']);
        
        redirect('embarcacoes/editar/'.$data['id_embarcacao'], 'location');

    }
    
    public function limpar() {
        $this->session->set_flashdata('texto', '');
        $this->session->set_flashdata('data_de', '');
        $this->session->set_flashdata('data_ate', '');
        redirect('embarcacoes');
    }

    public function excluir_selecionados() {
        $ids = $this->input->post("ids");

        $erros = array();
        $ok = true;
        
        if (!$ids) {
            $this->session->set_flashdata('errors', 'Você deve selecionar pelo menos um registro para excluir');
            redirect('embarcacoes');
        }
        
        $embarcacoes = explode(';', $ids);
        
        for ($i = 0; $i <= count($embarcacoes) - 1; $i++) {
            if (!$this->Embarcacoes_m->excluir($embarcacoes[$i])) {
                $ok = false;
                $erros[] = $embarcacoes[$i];
            }
        }

        if(!$ok){
            $this->session->set_flashdata('errors', 'Alguns registros não foram excluídos.');
        }else{
            $this->session->set_flashdata('messages', 'Registros(s) excluído(s) com sucesso.');
        }
        
        $this->session->set_flashdata('messages', 'Registros(s) excluído(s) com sucesso.');
    }


    public function exclui_imagem_galeria($id = false){
        $id || show_404();

        $imagem = $this->Embarcacoes_m->get_imagens(false, $id);

        if($this->Embarcacoes_m->exclui_imagem_galeria($id)){
            @unlink('assets/uploads/embarcacoes/'.$imagem->imagem);
        }
        
        $this->session->set_flashdata('messages', 'Imagem excluída com sucesso.');
        $this->session->set_flashdata('tab_gal', true);
        
        redirect('embarcacoes/editar/' . $imagem->id_embarcacao, 'location');
    }
    
    public function exclui_imagem_panorama($id = false){
        $id || show_404();

        $imagem = $this->Embarcacoes_m->get_panoramas(false, $id);

        if($this->Embarcacoes_m->exclui_imagem_panorama($id)){
            @unlink('assets/uploads/embarcacoes/'.$imagem->imagem);
        }
        
        $this->session->set_flashdata('messages', 'Imagem excluída com sucesso.');
        $this->session->set_flashdata('tab_pan', true);
        
        redirect('embarcacoes/editar/' . $imagem->id_embarcacao, 'location');
    }
} 
