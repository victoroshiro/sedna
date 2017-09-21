<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Fidelidades_m extends CI_Model {

    public function get_fidelidades($params = array())
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
                 ->select('DATE_FORMAT(data_fidelidade,"%d/%m/%Y") AS data_fidelidade_f', false)
                 ->from('fidelidades');

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

        $this->db->order_by('data_fidelidade', 'DESC');

        if($params['id']){
            $this->db->where("id", $params['id']);
        }

        $fidelidades = $this->db->get();

        if($params['count']){
            $toReturn = $fidelidades->num_rows();
        }else if($params['id']){
            $toReturn = $fidelidades->row();
        }else{
            $toReturn = $fidelidades->result();
        }

        return $toReturn;
    }

    public function salvar($data)
    {
        $data['slug'] = slug(array(
                                'string' => $data['titulo'],
                                'tabela' => 'fidelidades'
                                )
                            );

        $data['data_fidelidade'] = preg_replace('/(\d{2})\/(\d{2})\/(\d{4})/', '$3-$2-$1', $data['data_fidelidade']);

        $this->db->trans_start();

        $this->db->insert('fidelidades', $data);

        $this->db->trans_complete();
        
        return $this->db->trans_status();
    }

    public function atualizar($data, $dataWhere) {
        
        $data['slug'] = slug(array(
                                'string' => $data['titulo'],
                                'tabela' => 'fidelidades',
                                'id' => $dataWhere['id']
                                )
                            );

        if(isset($data['imagem'])){
            $link = $this->get_fidelidades(array('id' => $dataWhere['id']));
            $dir = dirname(getcwd()).'/userfiles/fidelidades/';
            
            // Remove as imagens antigas
            if($link){
                if(isset($data['imagem'])){
                    @unlink($dir.$link->imagem);
                }
            }            
        }

        $data['data_fidelidade'] = preg_replace('/(\d{2})\/(\d{2})\/(\d{4})/', '$3-$2-$1', $data['data_fidelidade']);

        $this->db->trans_start();

        $this->db->where('id', $dataWhere['id'])->update('fidelidades', $data);
        
        $this->db->trans_complete();

        return $this->db->trans_status();
    }


    public function excluir($id)
    {
        $fidelidade = $this->get_fidelidades(array('id' => $id));
        $dir = dirname(getcwd()).'/userfiles/fidelidades/';

        if ($this->db->delete('fidelidades', array('id' => $id))){
            @unlink($dir.$fidelidade->imagem);
            return true;
        }else{
            return false;
        }
    }
}

?>
