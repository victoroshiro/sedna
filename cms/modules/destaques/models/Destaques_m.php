<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Destaques_m extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function get_destaque_sort($sort){
        $this->db->select('*');
        $this->db->from('destaques');
        $this->db->where('sort', $sort);
        
        return $this->db->get()->result();
    }

    public function get_sort() {
        $this->db->select('sort');
        $this->db->from('destaques');

        $result = $this->db->get()->num_rows();
        return $result + 1;
    }

    public function count_destaques(){
        return $this->db->count_all('destaques');
    }

    public function get_destaques($status = "") {
        $this->db->select('*');
        $this->db->from('destaques');

        if ($status != '') {
            $this->db->where('habilitado', $status);
        }

        $this->db->order_by('sort', 'ASC');

        return $this->db->get()->result();
    }

    public function upload_foto($field) {
        $dir = dirname(getcwd()).'/userfiles/destaques/';


        $config['upload_path'] = $dir;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = '500000';
        $config['max_width'] = '10024';
        $config['max_height'] = '7068';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $field_name = $field;

        if ($this->upload->do_upload($field_name)) {
            $dados = $this->upload->data();

            $this->load->library('image_lib');

            $size = getimagesize($dados['full_path']);

            $config_img['image_library'] = 'GD2';
            $config_img['source_image'] = $dados['full_path'];
            $config_img['create_thumb'] = FALSE;
            $config_img['maintain_ratio'] = FALSE;
            $config_img['encrypt_name'] = TRUE;

            $config_img['width'] = 410;
            $config_img['height'] = 280;


            $this->image_lib->initialize($config_img);
            $this->image_lib->resize($config['source_image']);

            // Returns the photo name
            return $dados['file_name'];
        } else {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        }
    }

    public function get_destaque($id) {
        $this->db->select("*");
        $this->db->from("destaques");
        $this->db->where("id", $id);
        return $this->db->get()->row();
    }

    public function salvar($data) {
        $this->db->insert('destaques', $data);
        return true;
    }

    public function atualizar($data, $dataWhere) {
        $this->db->update('destaques', $data, $dataWhere);
        return true;
    }

    public function excluir($id) {
        $destaque = $this->get_destaque($id);
        $dir = dirname(getcwd()).'/userfiles/destaques/';

        if ($this->db->delete('destaques', array('id' => $id))){
            @unlink($dir.$destaque->imagem);
            return true;
        }else{
            return false;
        }
    }

    public function get_imagem_destaque($id) {
        $this->db->select('imagem');
        $this->db->from('destaques');
        $this->db->where('id', $id);       

        $query = $this->db->get();

        return ($query->num_rows()) ? $query->row() : false;
    }

    public function get_imagem_destaque2($id) {
        $this->db->select('imagem2');
        $this->db->from('destaques');
        $this->db->where('id', $id);       

        return $this->db->get()->row();
    }

    public function rearrange()
    {
        $result = $this->db->get('destaques')->result();
        $x = 1;
        foreach ($result as $destaque) {
            $this->db->where('id', $destaque->id);
            $this->db->set('sort', $x);
            $this->db->update('destaques');
            $x++;
        }        
        echo 'valeu! >:)';
    }

    public function atualizar_ordem($id, $sort)
    {
        $this->db->set('sort', $sort);
        $this->db->where('id', $id);
        $this->db->update('destaques');
        return true;
    }


}
?>
