<?php

class Embarcacoes_m extends CI_Model {

    public function __construct() {
        
        parent::__construct();
        
        $this->load->database();
        $this->load->library('image_lib');
        $this->load->helper('thumb');
    }

    public function get_marcas()
    {
        $this->db->select('DISTINCT(marca)')
                 ->from('embarcacoes')
                 ->order_by('marca', 'ASC')
                 ->where('marca !=', '');

        $query = $this->db->get();

        return ($query->num_rows()) ? $query->result() : false;
    }

    public function get_modelos($marca)
    {
        $this->db->select('DISTINCT(modelo)')
                 ->from('embarcacoes')
                 ->order_by('modelo', 'ASC')
                 ->where('modelo !=', '')
                 ->where('marca', $marca);

        $query = $this->db->get();

        return ($query->num_rows()) ? $query->result() : false;
    }

    public function get_ano() {
        
        $this->db->select('DISTINCT(ano)')
                 ->from('embarcacoes')
                 ->order_by('ano', 'DESC')
                 ->where('ano !=','');

        $query = $this->db->get();

        return $query->num_rows() ? $query->result() : false;
    }
    
    public function busca_embarcacoes(
        $dados,
        $limit = false, 
        $offset = false,
        $count = false
    ){
        $toReturn = false;

        $this->db->select('*')
                 ->from('embarcacoes')
                 ->where('habilitado', 1);

        if(isset($dados['area']) && $dados['area'] != ''){
            if (strpos($dados['area'], ',') !== false){
                $area = explode(',', $dados['area']);

                $this->db->where('area >= '.(int)$area[0].' AND area <= '.(int)$area[1]);
            }else{
                if($dados['area'] == '24'){
                    $this->db->where('area <=', (int)$dados['area']);
                }else{
                    $this->db->where('area >=', (int)$dados['area']);
                }
            }
        }

        if(isset($dados['valor']) && $dados['valor'] != '' && $dados['valor'] != 'false'){
            if (strpos($dados['valor'], ',') !== false){
                $valor = explode(',', $dados['valor']);

                $this->db->where('valor >= '.(int)$valor[0].' AND valor <= '.(int)$valor[1]);
            }else{
                if($dados['valor'] == '50000'){
                    $this->db->where('valor <=', (int)$dados['valor']);
                }else{
                    $this->db->where('valor >=', (int)$dados['valor']);
                }
            }
        }

        if(isset($dados['marca']) && $dados['marca'] != '' && $dados['marca'] != 'false'){
            $this->db->where('marca', $dados['marca']);
        }

        if(isset($dados['ano']) && !empty($dados['ano'])){
            foreach ($dados['ano'] as $key => $value) {
                if($key == 0){
                    $ano = "(ano = '".$value."'";
                }else{
                    $ano .= " OR ano = '".$value."'";
                }
            }
            $ano .= ")";

            $this->db->where($ano);
        }

        if($limit && $offset){
            $this->db->limit($limit,$offset);
        }

        if($limit && !$offset){
            $this->db->limit($limit);
        }

        $query = $this->db->get();

        if($query->num_rows()){
            $embarcacoes = $query->result();

            if($count){
                $toReturn = count($embarcacoes);
            }else{
                foreach ($embarcacoes as $key => $item) {
                    $this->db->select('*')
                             ->from('embarcacoes_imagens')
                             ->where('id_embarcacao', $item->id);

                    $imagens = $this->db->get();

                    if($imagens->num_rows()){
                        $embarcacoes[$key]->galeria = $imagens->result();
                    }
                }

                $toReturn = $embarcacoes;
            }
        }

        return $toReturn;
    }

    public function get_embarcacoes(
        $data_de = NULL, 
        $data_ate = NULL, 
        $texto = '', 
        $limit = NULL, 
        $count = NULL, 
        $offset = NULL, 
        $menos_esta = NULL, 
        $destaque = FALSE,
        $admin = false,
        $group_by = false
    ){
        $this->db->select('*')
                 ->from('embarcacoes')
                 ->order_by('data_criacao', 'DESC');

        if ($texto != '') {
            $this->db->like('titulo', $texto);
            $this->db->or_like('descricao', $texto);
        }

        if ($data_de != '') {
            $d = get_data_for_mysql_format($data_de);
            $this->db->where('data_criacao >=', $d);
        }

        if ($data_ate != '') {
            $t = get_data_for_mysql_format($data_ate);
            $this->db->where('data_criacao <=', $t);
        }

        if ($destaque != FALSE) {
            $this->db->where('destaque', '1');
        }

        $this->db->order_by('data_criacao', 'DESC');

        //paginação
        if (($limit) && (!$offset)) {
           $this->db->limit($limit);
        }else if(($limit) && ($offset)){
           $this->db->limit($limit, $offset);
        }

        if($menos_esta != ''){
            $this->db->where('id != ', $menos_esta);
            $this->db->order_by('id', 'DESC');
        }

        if(!$admin){
            $this->db->where('habilitado', 1);
        }

        if($group_by){
            $this->db->group_by($group_by);
        }
        
        $embarcacoes = $this->db->get()->result();

        if ($count != TRUE) {
           return $embarcacoes;
        } else {
           return count($embarcacoes);
        }

        return $embarcacoes;
    }

    public function get_embarcacao($id = false, $slug = false) {
        
        $this->db->select("*")
                 ->from("embarcacoes");

        if($slug){
            $this->db->where("slug", $slug);
        }

        if($id){
            $this->db->where("id", $id);
        }

        $query = $this->db->get();

        return ($query->num_rows()) ? $query->row() : false;
    }

    function upload_foto_galeria($field) {
       
        $dir = dirname(getcwd()).'/userfiles/embarcacoes/';
        $config['upload_path'] = $dir;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['encrypt_name'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['max_size'] = '500000';
        $config['max_width'] = '10024';
        $config['max_height'] = '7068';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_multi_upload($field)) {
            $dados = $this->upload->get_multi_upload_data();            

            $files = array();
            foreach ($dados as $file) {
                $size = getimagesize($file['full_path']);

                $img_width = $size[0];
                $img_height = $size[1];

                $img_ideal_width = 800;
                $img_ideal_heigh = 600;

                $config_img['image_library'] = 'GD2';
                $config_img['source_image'] = $file['full_path'];
                $config_img['create_thumb'] = FALSE;
                $config_img['maintain_ratio'] = TRUE;
                $config_img['encrypt_name'] = TRUE;   

                if ($img_width > $img_ideal_width || $img_height > $img_ideal_heigh) {
                    
                    if ($img_width >= $img_height) {
                        $config_img['width'] = $img_ideal_width;
                        $this->image_lib->initialize($config_img);
                        $config['source_image'] = $dir.'/'.$file['file_name'];
                        $this->image_lib->resize($config['source_image']);
                    }
                    elseif ($img_width < $img_height) {
                        $config_img['height'] = $img_ideal_heigh;
                        $this->image_lib->initialize($config_img);
                        $config['source_image'] = $dir.'/'.$file['file_name'];
                        $this->image_lib->resize($config['source_image']);
                    }
                }
                else {
                    $config_img['width'] = $img_ideal_width;
                    $config_img['height'] = $img_ideal_heigh;
                    $config_img['x_axis'] = ($img_width);
                    $config_img['y_axis'] = ($img_height / 2) - ($img_ideal_heigh / 2);

                    $this->image_lib->initialize($config_img);
                    $config['source_image'] = $dir.'/'.$file['file_name'];
                    $this->image_lib->crop($config['source_image']);
                }

                //thumbnail

                $file_parts = explode('.', $file['file_name']);
                $thumb = $dir.'/'.$file_parts[0].'_thumb.'.$file_parts[1];

                thumb($config['source_image'], 600, 400, $thumb);

                $files[] = $file['file_name'];
            }

            return $files;

        } else {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        }
    }

    function upload_foto_pequena($field) {
        $dir = dirname(getcwd()).'/userfiles/embarcacoes/';
        $config['upload_path'] = $dir;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['max_size'] = '500000';
        $config['max_width'] = '10024';
        $config['max_height'] = '7068';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $field_name = $field;

        if ($this->upload->do_upload($field_name)) {
            $dados = $this->upload->data();
            
            $size = getimagesize($dados['full_path']);

            $img_width = $size[0];
            $img_height = $size[1];

            $img_ideal_width = 860;
            $img_ideal_heigh = 485;


            $config_img['image_library'] = 'GD2';
            $config_img['source_image'] = $dados['full_path'];
            $config_img['create_thumb'] = FALSE;
            $config_img['maintain_ratio'] = TRUE;
            $config_img['encrypt_name'] = TRUE;   

            if ($img_width > $img_ideal_width || $img_height > $img_ideal_heigh) {
                
                if ($img_width > $img_height) {
                    $config_img['width'] = $img_ideal_width;
                    $this->image_lib->initialize($config_img);
                    $this->image_lib->resize($config['source_image']);
                }
                elseif ($img_width < $img_height) {
                    $config_img['height'] = $img_ideal_heigh;
                    $this->image_lib->initialize($config_img);
                    $this->image_lib->resize($config['source_image']);
                }
            }
            else {
                $config_img['width'] = $img_ideal_width;
                $config_img['height'] = $img_ideal_heigh;
                $config_img['x_axis'] = floor($img_width / 2) - floor($img_ideal_width / 2);
                $config_img['y_axis'] = floor($img_height / 2) - floor($img_ideal_heigh / 2);
                $this->image_lib->initialize($config_img);
                $this->image_lib->crop($config['source_image']);
            }
            return $dados['file_name'];
            
        } else {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        }
    }

    function upload_foto_grande($field) {
        $dir = dirname(getcwd()).'/userfiles/embarcacoes/';
        
        $config['upload_path'] = $dir;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['max_size'] = '500000';
        $config['max_width'] = '10024';
        $config['max_height'] = '7068';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $field_name = $field;

        if ($this->upload->do_upload($field_name)) {
            $dados = $this->upload->data();
            $size = getimagesize($dados['full_path']);

            $config_img['image_library'] = 'GD2';
            $config_img['source_image'] = $dados['full_path'];
            $config_img['create_thumb'] = FALSE;
            $config_img['maintain_ratio'] = FALSE;
            $config_img['encrypt_name'] = TRUE;

            /*$config_img['wm_type'] = 'overlay';
            $config_img['wm_overlay_path'] = 'assets/admin/images/watermark.png';
            $config_img['wm_vrt_alignment'] = 'top'; 
            $config_img['wm_hor_alignment'] = 'right';
            $config_img['wm_hor_offset'] = '10';
            $config_img['wm_vrt_offset'] = '10';*/

            $config_img['width'] = '497';
            $config_img['height'] = '331';

            $this->image_lib->initialize($config_img);

            $config['source_image'] = $dir.'/'.$dados['file_name'];
            
            if (!$this->image_lib->resize($config['source_image'])) {
                echo $this->image_lib->display_errors();
            }else{
                $this->image_lib->watermark();
            }
           
            // Returns the photo name
            return $dados['file_name'];
        } else {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        }
    }

    function upload_foto_banner($field) {
        $dir = dirname(getcwd()).'/userfiles/embarcacoes/';
        $config['upload_path'] = $dir;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['max_size'] = '500000';
        $config['max_width'] = '10024';
        $config['max_height'] = '7068';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $field_name = $field;

        if ($this->upload->do_upload($field_name)) {
            $dados = $this->upload->data();
            $size = getimagesize($dados['full_path']);

            $config_img['image_library'] = 'GD2';
            $config_img['source_image'] = $dados['full_path'];
            $config_img['create_thumb'] = FALSE;
            $config_img['maintain_ratio'] = FALSE;
            $config_img['encrypt_name'] = TRUE;   

            $config_img['width'] = '1580';
            $config_img['height'] = '744';

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


    public function salvar($data) {

        $data['slug'] = $this->slug($data['titulo']).'-'.rand(0,100);

        $data['valor'] = (strstr($data['valor'],'R$')) ? moneyToDouble($data['valor']) : $data['valor'];

        $data['thumb'] = youtube_thumbnail_url($data['link']);
        
        $data['link'] = get_youtube_id($data['link']);

        $this->db->insert('embarcacoes', $data);

        return $this->db->insert_id();
    }

    public function atualizar($data, $dataWhere) {

        $embarcacao = $this->get_embarcacao($dataWhere['id']);

        $data['valor'] = moneyToDouble($data['valor']);

        $data['thumb'] = youtube_thumbnail_url($data['link']);
        
        $data['link'] = get_youtube_id($data['link']);

        if($embarcacao && (!is_null($embarcacao->slug))){
            $slug_array = explode('-',$embarcacao->slug);
            $number = array_pop($slug_array);

            if(is_numeric($number)){
                $data['slug'] = $this->slug($data['titulo']).'-'.$number;
            }else{
                $data['slug'] = $this->slug($data['titulo']).'-'.rand(0,100);
            }
        }


        $this->db->update('embarcacoes', $data, $dataWhere);
        
        return true;
    }

    function excluir($id) {

        return $this->db->delete('embarcacoes',array("id" => $id));
    }

    function salva_imagens($data){
        $this->db->insert('embarcacoes_imagens', $data);
    }

    function get_imagens($id_embarcacao = false, $id_imagem = false, $tipo = false){
        
        $this->db->select('*');
        $this->db->from("embarcacoes_imagens");

        if($id_embarcacao){
            $this->db->where('id_embarcacao', $id_embarcacao);
            $imagens = $this->db->get()->result();
        }

        if($tipo){
            $this->db->where('titulo', $tipo);
            $imagens = $this->db->get()->result();
        }

        if($id_imagem){
            $this->db->where('id', $id_imagem);
            $imagens = $this->db->get()->row();   
        }

        return $imagens;
    }

    public function atualiza_link($data) 
    {
        
        $this->db->trans_start();

        $this->db->where('id', $data['id_imagem'])->update('embarcacoes_imagens', array('titulo' => $data['titulo']));
        
        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    public function exclui_imagem_galeria($id)
    {
        $data['id'] = $id;

        $imagem = $this->get_imagens(false, $id);

        $dir = dirname(getcwd()).'/userfiles/embarcacoes/';

        if ($this->db->delete('embarcacoes_imagens', array('id' => $data['id']))){
            @unlink($dir.$imagem->imagem);
            return true;
        }else{
            return false;
        }
    }

    function get_related($categoria, $limit, $id){
        $this->db->select('*');
        $this->db->from('embarcacoes');
        $this->db->where('categoria', $categoria);
        $this->db->where('id != ', $id);
        $this->db->where('habilitado', 1);
        $this->db->limit($limit);
        $this->db->order_by('id', 'DESC');
       
        return $this->db->get()->result();
    }

    function slug($string, $type = '-') {
        $a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
        $b = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';

        $string = utf8_decode($string);
        $string = str_replace('?', '', $string);
        $string = str_replace('&', '', $string);
        $string = str_replace('(', '', $string);
        $string = str_replace(')', '', $string);
        $string = str_replace('.', '', $string);
        $string = str_replace(' – ', '-', $string);
        $string = str_replace('%', 'porcento', $string);
        $string = strtr($string, utf8_decode($a), $b);
        $string = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $string);
        $string = str_replace(' - ', '-', $string);
        $string = str_replace(' ', '-', $string);
        $string = strtolower($string);
        return utf8_encode($string);
    }
}