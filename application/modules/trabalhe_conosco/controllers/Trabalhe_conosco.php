<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Trabalhe_conosco extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Trabalhe_conosco_m');
        $this->load->model('File_upload_model');
        $this->load->model('noticias/Noticias_m');
        $this->load->model('common/Common_m');
        $this->load->model('embarcacoes/Embarcacoes_m');
    }

    public function index($slug = false)
    {
        $this->data['active'] = 'Trabalhe_conosco';
        $this->data['title'] = 'Cimitarra Yachts.';
        $this->data['description'] = 'Cimitarra Yachts';

        // Menu
        $this->data['menu_embarcacoes_cim'] = $this->Embarcacoes_m->get_embarcacoes(array('categoria' => 'cimitarra'));
        $this->data['menu_embarcacoes_ciy'] = $this->Embarcacoes_m->get_embarcacoes(array('categoria' => 'cimitarra-yachts'));
        
        $this->data['partial'] = $this->load->view('trabalhe-conosco.php', $this->data, true);
        
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
                if($this->Trabalhe_conosco_m->save_newsletter($post)){
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

                $origem = (isset($post['origem'])) ? $post['origem'] : 'Trabalhe_conosco';

                $curriculo = $this->File_upload_model->file_upload(
                    'curriculo',
                    'curriculos',
                    'pdf|doc|docx',
                    NULL,
                    NULL
                );

                if(!is_array($curriculo)){
                    $post['curriculo'] = $curriculo;
                }

                if($this->Trabalhe_conosco_m->save_contact($post, $origem)){

                    $this->_send_notifications($post, 'Trabalhe_conosco');

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
        if(isset($dados['area_interesse']) && $dados['area_interesse'] != ''){
            $mensagem .= "Área de Interesse: " . $dados['area_interesse'] . "<br>";
        }
        if(isset($dados['telephone']) && $dados['telephone'] != ''){
            $mensagem.= "Telefone: " . $dados['telephone']."</a><br>";
        }
        if (isset($dados['curriculo'])) {
            $mensagem .= "<a href='" . dirname(getcwd()).'/userfiles/curriculos/' . $dados['curriculo'] . "'>" . "Veja o currículo" . "</a>" . "<br />";
        }
        $mensagem .= "Mensagem: " . $dados['message'] . "<br>";

        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';

        $this->load->library('email');

        $this->email->initialize($config);

        $this->email->from('contato@cimitarra.com.br', 'Trabalhe Conosco');
        $this->email->to('contato@cimitarra.com.br');
        
        $this->email->subject('Trabalhe Conosco - '.$dados['name']);
        $this->email->message($mensagem);
        
        if ($this->email->send(FALSE))
        {
            $this->email->print_debugger();
        }

        $this->email->clear(TRUE);

        $this->email->from('contato@cimitarra.com.br', 'Cimitarra Yachts');
        $this->email->to($dados['email']);
        $this->email->subject('Recebemos sua mensagem');

        $mensagem_cliente  = '<h3>' . $dados['name'] . ',</h3>';
        $mensagem_cliente .= '<p>';
        $mensagem_cliente .= 'Obrigado por entrar em contato com a Cimitarra Yachts.';
        $mensagem_cliente .= '<br>';
        $mensagem_cliente .= 'Em breve entraremos em contato.';
        $mensagem_cliente .= '<br>';
        $mensagem_cliente .= 'Tel.: +55 (11) 99617.6035 / (11) 2307-7007';
        $mensagem_cliente .= '<br>';
        $mensagem_cliente .= '<a href="http://cimitarra.com.br/">cimitarra.com.br/</a>';
        $mensagem_cliente .= '</p>';
        $mensagem_cliente .= '<img src="' . site_url('assets/images/menu/logo.png') . '" alt="Cimitarra Yachts">';

        $this->email->message($mensagem_cliente);
        $this->email->send();
    }
}
