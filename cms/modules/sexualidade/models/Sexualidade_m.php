<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sexualidade_m extends CI_Model {

    public function get_sexualidades($params = array())
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
                 ->from('sexualidades');

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

        $this->db->order_by('data_criacao', 'DESC');

        if($params['id']){
            $this->db->where("id", $params['id']);
        }

        $sexualidades = $this->db->get();

        if($params['count']){
            $toReturn = $sexualidades->num_rows();
        }else if($params['id']){
            $toReturn = $sexualidades->row();
        }else{
            $toReturn = $sexualidades->result();
        }

        return $toReturn;
    }

    public function salvar($data)
    {
        $data['slug'] = slug(array(
                                'string' => $data['titulo'],
                                'tabela' => 'sexualidades'
                                )
                            );

        $this->db->trans_start();

        $this->db->insert('sexualidades', $data);

        $this->db->trans_complete();
        
        return $this->db->trans_status();
    }

    public function atualizar($data, $dataWhere) {
        
        $data['slug'] = slug(array(
                                'string' => $data['titulo'],
                                'tabela' => 'sexualidades',
                                'id' => $dataWhere['id']
                                )
                            );

        $this->db->trans_start();

        $this->db->where('id', $dataWhere['id'])->update('sexualidades', $data);
        
        $this->db->trans_complete();

        return $this->db->trans_status();
    }


    public function excluir($id)
    {
        if ($this->db->delete('sexualidades', array('id' => $id))){
            return true;
        }else{
            return false;
        }
    }
}

?>