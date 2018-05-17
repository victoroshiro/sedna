<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Seminovos_m extends CI_Model {

    public function __construct() {
        
        parent::__construct();
        
        $this->load->library('image_lib');
        $this->load->helper('thumb');
    }

    public function get_seminovos($params = array())
    {
        $options = array(
            'texto' => "",
            'data_de' => false,
            'data_ate' => false,
            'limit' => false,
            'offset' => false,
            'count' => false,
            'ignore' => false,
            'order' => false,
            'order_by' => false,
            'slug' => false,
            'id' => false
        );

        $params = array_merge($options, $params);

        $this->db->select('*')
                 ->select('DATE_FORMAT(data_seminovo,"%d/%m/%Y") AS data_seminovo_f', false)
                 ->from('seminovos');

        if ($params['texto'] != '') {
            $this->db->like('titulo', $params['texto']);
            $this->db->or_like('descricao', $params['texto']);
        }

        if ($params['data_de']) {
            $d = get_data_for_mysql_format($params['data_de']);
            $this->db->where('data_criacao >=', $d);
        }

        if ($params['data_ate']) {
            $t = get_data_for_mysql_format($params['data_ate']);
            $this->db->where('data_criacao <=', $t);
        }

        if (($params['limit']) && ($params['offset'])) {
            $this->db->limit($params['limit'], $params['offset']);
        }

        if($params['ignore']){
            $this->db->where('id !=', $params['ignore']);
        }

        $this->db->order_by('data_seminovo', 'DESC');

        if($params['id']){
            $this->db->where("id", $params['id']);
        }

        $seminovos = $this->db->get();

        if($params['count']){
            $toReturn = $seminovos->num_rows();
        }else if($params['id']){
            $toReturn = $seminovos->row();
        }else{
            $toReturn = $seminovos->result();
        }

        return $toReturn;
    }

    public function salvar($data)
    {
        $data['slug'] = slug(array(
                                'string' => $data['titulo'],
                                'tabela' => 'seminovos'
                                )
                            );

        $data['data_seminovo'] = preg_replace('/(\d{2})\/(\d{2})\/(\d{4})/', '$3-$2-$1', $data['data_seminovo']);

        $this->db->trans_start();

        $this->db->insert('seminovos', $data);

        $this->db->trans_complete();
        
        return $this->db->trans_status();
    }

    public function atualizar($data, $dataWhere) {
        
        $data['slug'] = slug(array(
                                'string' => $data['titulo'],
                                'tabela' => 'seminovos',
                                'id' => $dataWhere['id']
                                )
                            );

        if(isset($data['imagem'])){
            $link = $this->get_seminovos(array('id' => $dataWhere['id']));
            $dir = dirname(getcwd()).'/userfiles/seminovos/';
            
            // Remove as imagens antigas
            if($link){
                if(isset($data['imagem'])){
                    @unlink($dir.$link->imagem);
                }
            }            
        }

        $data['data_seminovo'] = preg_replace('/(\d{2})\/(\d{2})\/(\d{4})/', '$3-$2-$1', $data['data_seminovo']);

        $this->db->trans_start();

        $this->db->where('id', $dataWhere['id'])->update('seminovos', $data);
        
        $this->db->trans_complete();

        return $this->db->trans_status();
    }


    public function excluir($id)
    {
        $seminovo = $this->get_seminovos(array('id' => $id));
        $dir = dirname(getcwd()).'/userfiles/seminovos/';

        if ($this->db->delete('seminovos', array('id' => $id))){
            @unlink($dir.$seminovo->imagem);
            return true;
        }else{
            return false;
        }
    }

    function upload_foto_galeria($field) {
       
        $dir = dirname(getcwd()).'/userfiles/seminovos/';
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

    function salva_imagens($data){
        $this->db->insert('seminovos_imagens', $data);
    }

    function get_imagens($id_seminovo = false, $id_imagem = false, $tipo = false){
        
        $this->db->select('*');
        $this->db->from("seminovos_imagens");

        if($id_seminovo){
            $this->db->where('id_seminovo', $id_seminovo);
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

        $this->db->where('id', $data['id_imagem'])->update('seminovos_imagens', array('titulo' => $data['titulo']));
        
        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    public function exclui_imagem_galeria($id)
    {
        $data['id'] = $id;

        $imagem = $this->get_imagens(false, $id);

        $dir = dirname(getcwd()).'/userfiles/seminovos/';

        if ($this->db->delete('seminovos_imagens', array('id' => $data['id']))){
            @unlink($dir.$imagem->imagem);
            return true;
        }else{
            return false;
        }
    }
    
    public function atualizar_ordem($id, $sort)
    {
        $this->db->set('sort', $sort);
        $this->db->where('id', $id);
        $this->db->update('banners');
        return true;
    }


}

?>
