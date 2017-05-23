<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Noticias_m extends CI_Model {

    public function get_noticias($params = array())
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
                 ->select('DATE_FORMAT(data_noticia,"%d/%m/%Y") AS data_noticia_f', false)
                 ->from('noticias');

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

        $this->db->order_by('data_noticia', 'DESC');

        if($params['id']){
            $this->db->where("id", $params['id']);
        }

        $noticias = $this->db->get();

        if($params['count']){
            $toReturn = $noticias->num_rows();
        }else if($params['id']){
            $toReturn = $noticias->row();
        }else{
            $toReturn = $noticias->result();
        }

        return $toReturn;
    }

    public function salvar($data)
    {
        $data['slug'] = slug(array(
                                'string' => $data['titulo'],
                                'tabela' => 'noticias'
                                )
                            );

        $data['data_noticia'] = preg_replace('/(\d{2})\/(\d{2})\/(\d{4})/', '$3-$2-$1', $data['data_noticia']);

        $this->db->trans_start();

        $this->db->insert('noticias', $data);

        $this->db->trans_complete();
        
        return $this->db->trans_status();
    }

    public function atualizar($data, $dataWhere) {
        
        $data['slug'] = slug(array(
                                'string' => $data['titulo'],
                                'tabela' => 'noticias',
                                'id' => $dataWhere['id']
                                )
                            );

        if(isset($data['imagem'])){
            $link = $this->get_noticias(array('id' => $dataWhere['id']));
            $dir = dirname(getcwd()).'/userfiles/noticias/';
            
            // Remove as imagens antigas
            if($link){
                if(isset($data['imagem'])){
                    @unlink($dir.$link->imagem);
                }
            }            
        }

        $data['data_noticia'] = preg_replace('/(\d{2})\/(\d{2})\/(\d{4})/', '$3-$2-$1', $data['data_noticia']);

        $this->db->trans_start();

        $this->db->where('id', $dataWhere['id'])->update('noticias', $data);
        
        $this->db->trans_complete();

        return $this->db->trans_status();
    }


    public function excluir($id)
    {
        $noticia = $this->get_noticias(array('id' => $id));
        $dir = dirname(getcwd()).'/userfiles/noticias/';

        if ($this->db->delete('noticias', array('id' => $id))){
            @unlink($dir.$noticia->imagem);
            return true;
        }else{
            return false;
        }
    }
}

?>