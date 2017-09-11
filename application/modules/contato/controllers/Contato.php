<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contato extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Contato_m');
        $this->load->model('noticias/Noticias_m');
        $this->load->model('common/Common_m');
        $this->load->model('embarcacoes/Embarcacoes_m');
    }

    public function index($slug = false)
    {
        $this->data['active'] = 'Contato';
        $this->data['title'] = 'Cimitarra Yachts.';
        $this->data['description'] = 'Cimitarra Yachts';

        // Menu
        $this->data['menu_embarcacoes_cim'] = $this->Embarcacoes_m->get_embarcacoes(array('categoria' => 'cimitarra'));
        $this->data['menu_embarcacoes_ciy'] = $this->Embarcacoes_m->get_embarcacoes(array('categoria' => 'cimitarra-yachts'));
        
        $this->data['partial'] = $this->load->view('contato.php', $this->data, true);
        
        $this->load->view('common/template.php', $this->data);
    }

    public function newsletter()
    {
        $post = $this->input->post();
        
        $return = array('status' => false, 'class' => 'danger', 'message' => 'Ocorreu um erro no cadastro, tente novamente mais tarde.');

        if($post){

            $this->load->library('form_validation');

            $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');

            if($this->form_validation->run()){
                if($this->Contato_m->save_newsletter($post)){
                    $return = array('status' => true, 'class' => 'success', 'message' => 'E-mail cadastrado com sucesso!');
                }else{
                    $return = array('status' => false, 'class' => 'warning', 'message' => 'E-mail já cadastrado.');
                }
            }else{
                $errors = array_values($this->form_validation->error_array());
                $return = array('status' => false, 'class' => 'warning', 'message' => $errors[0]);
            }
        }

        echo json_encode($return);
    }

    public function send()
    {
        $post = $this->input->post();

        $return = array('status' => false, 'message' => 'Ocorreu um erro no envio, tente novamente mais tarde.');

        if($post){

            $this->load->library('form_validation');

            $this->form_validation->set_rules('name', 'Nome', 'trim|required');
            $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
            $this->form_validation->set_rules('message', 'Mensagem', 'trim|required');

            if($this->form_validation->run()){

                $origem = (isset($post['origem'])) ? $post['origem'] : 'Contato';

                if($this->Contato_m->save_contact($post, $origem)){

                    $this->_send_notifications($post, 'Contato');

                    $return = array('status' => true, 'message' => 'Mensagem enviada com sucesso!');
                }
            }else{
                $errors = array_values($this->form_validation->error_array());
                $return = array('status' => false, 'message' => $errors[0]);
            }
        }

        echo json_encode($return);
    }

    private function _send_notifications($dados, $origem)
    {
        $mensagem  = "Nome: " . $dados['name']  . "<br>";
        $mensagem .= "E-mail: " . $dados['email'] . "<br>";
        if(isset($dados['city']) && $dados['city'] != ''){
            $mensagem .= "Cidade: " . $dados['city'] . "<br>";
        }
        if(isset($dados['telephone']) && $dados['telephone'] != ''){
            $mensagem.= "Telefone: " . $dados['telephone']."</a><br>";
        }
        $mensagem .= "Mensagem: " . $dados['message'] . "<br>";

        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';

        $this->load->library('email');

        $this->email->initialize($config);

        $this->email->from('contato@cimitarra.com.br', 'Contato');
        $this->email->to('contato@cimitarra.com.br');
        
        $this->email->subject('Contato - '.$dados['name']);
        $this->email->message($mensagem);
        
        if ($this->email->send(FALSE))
        {
            $this->email->print_debugger();
        }

        $this->email->clear(TRUE);

        $this->email->from('contato@cimitarra.com.br', 'FemCare');
        $this->email->to($dados['email']);
        $this->email->subject('Recebemos sua mensagem');

        $mensagem_cliente  = '<h3>' . $dados['name'] . ',</h3>';
        $mensagem_cliente .= '<p>';
        $mensagem_cliente .= 'Obrigado por entrar em contato com a FemCare.';
        $mensagem_cliente .= '<br>';
        $mensagem_cliente .= 'Em breve entraremos em contato.';
        $mensagem_cliente .= '<br>';
        $mensagem_cliente .= 'Tel.: 55 11 3885-3937 | 55 11 3885-4194';    
        $mensagem_cliente .= '<br>';
        $mensagem_cliente .= '<a href="http://cimitarra.com.br/">cimitarra.com.br/</a>';
        $mensagem_cliente .= '</p>';
        $mensagem_cliente .= '<img src="' . site_url('assets/images/menu/logo.png') . '" alt="FemCare">';

        $this->email->message($mensagem_cliente);
        $this->email->send();
    }
}
