<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Seminovos_m extends CI_Model {

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
}

?>