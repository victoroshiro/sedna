<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Imprensas_m extends CI_Model {

    public function get_imprensas($params = array())
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
                 ->select('DATE_FORMAT(data_imprensa,"%d/%m/%Y") AS data_imprensa_f', false)
                 ->from('imprensas');

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

        $this->db->order_by('data_imprensa', 'DESC');

        if($params['id']){
            $this->db->where("id", $params['id']);
        }

        $imprensas = $this->db->get();

        if($params['count']){
            $toReturn = $imprensas->num_rows();
        }else if($params['id']){
            $toReturn = $imprensas->row();
        }else{
            $toReturn = $imprensas->result();
        }

        return $toReturn;
    }

    public function salvar($data)
    {
        $data['slug'] = slug(array(
                                'string' => $data['titulo'],
                                'tabela' => 'imprensas'
                                )
                            );

        $data['data_imprensa'] = preg_replace('/(\d{2})\/(\d{2})\/(\d{4})/', '$3-$2-$1', $data['data_imprensa']);

        $this->db->trans_start();

        $this->db->insert('imprensas', $data);

        $this->db->trans_complete();
        
        return $this->db->trans_status();
    }

    public function atualizar($data, $dataWhere) {
        
        $data['slug'] = slug(array(
                                'string' => $data['titulo'],
                                'tabela' => 'imprensas',
                                'id' => $dataWhere['id']
                                )
                            );

        if(isset($data['imagem'])){
            $link = $this->get_imprensas(array('id' => $dataWhere['id']));
            $dir = dirname(getcwd()).'/userfiles/imprensas/';
            
            // Remove as imagens antigas
            if($link){
                if(isset($data['imagem'])){
                    @unlink($dir.$link->imagem);
                }
            }            
        }

        $data['data_imprensa'] = preg_replace('/(\d{2})\/(\d{2})\/(\d{4})/', '$3-$2-$1', $data['data_imprensa']);

        $this->db->trans_start();

        $this->db->where('id', $dataWhere['id'])->update('imprensas', $data);
        
        $this->db->trans_complete();

        return $this->db->trans_status();
    }


    public function excluir($id)
    {
        $imprensa = $this->get_imprensas(array('id' => $id));
        $dir = dirname(getcwd()).'/userfiles/imprensas/';

        if ($this->db->delete('imprensas', array('id' => $id))){
            @unlink($dir.$imprensa->imagem);
            return true;
        }else{
            return false;
        }
    }
}

?>
