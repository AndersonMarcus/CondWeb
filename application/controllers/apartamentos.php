<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Apartamentos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('apartamentos_model');
        
    }

    function index() {
        $data['titulo'] = "CRUD com CodeIgniter | Cadastro de Usuários";
          $data['apartamentos'] = $this->apartamentos_model->listar();
         if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'login');
		}
               
		$data['titulo'] = 'Bem-vindo';
	
        $this->load->view('apartamentos_view', $data);
        
     
    }

    public function info() {
        phpinfo();
        exit();
    }

    function inserir() {

        /* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
        $this->load->library('form_validation');

        /* Define as tags onde a mensagem de erro será exibida na página */
        $this->form_validation->set_error_delimiters('<span>', '</span>');

        /* Define as regras para validação */
        $this->form_validation->set_rules('numero', 'Numero', 'required|max_length[5]');
       

        /* Executa a validação e caso houver erro... */
        if ($this->form_validation->run() === FALSE) {
            /* Chama a função index do controlador */
            $this->index();
            /* Senão, caso sucesso na validação... */
        } else {
            /* Recebe os dados do formulário (visão) */
            $data['numero'] = $this->input->post('numero');
            
            

           

            /* Chama a função inserir do modelo */
            if ($this->apartamentos_model->inserir($data)) {
                redirect('apartamentos');
            } else {
                log_message('error', 'Erro ao inserir o usuario.');
            }
        }
    }

    function editar($apartamentoId) {

        /* Aqui vamos definir o título da página de edição */
        $data['titulo'] = "CRUD com CodeIgniter | Editar Usuario";

        /* Busca os dados da usuario que será editada (id) */
        $data['dados_apartamento'] = $this->apartamentos_model->editar($apartamentoId);



        /* Carrega a página de edição com os dados da usuario */
        $this->load->view('apartamentos_edit', $data);
    }

    function atualizar() {

        /* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
        $this->load->library('form_validation');

        /* Define as tags onde a mensagem de erro será exibida na página */
        $this->form_validation->set_error_delimiters('<span>', '</span>');

        /* Aqui estou definindo as regras de validação do formulário, assim como 
          na função inserir do controlador, porém estou mudando a forma de escrita */
        $validations = array(
            array(
                'field' => 'numero',
                'label' => 'Numero',
                'rules' => 'trim|required|max_length[5]'
            )
           
        );
        $this->form_validation->set_rules($validations);

        /* Executa a validação... */
        if ($this->form_validation->run() === FALSE) {
            /* Caso houver erro chama função editar do controlador novamente */
            $this->editar($this->input->post('apartamentoId'));
        } else {
            /* Senão obtém os dados do formulário */
            $data['apartamentoId'] = $this->input->post('apartamentoId');
            $data['numero'] = ucwords($this->input->post('numero'));
           $data['idcondominio'] =($this->input->post('idcondominio'));


            /* Executa a função atualizar do modelo passando como parâmetro os dados obtidos do formulário */
            if ($this->apartamentos_model->atualizar($data)) {
                /* Caso sucesso ao atualizar, recarrega a página principal */
                redirect('apartamentos');
            } else {
                /* Senão exibe a mensagem de erro */
                log_message('error', 'Erro ao atualizar o apartamento.');
            }
        }
    }

    function deletar($apartamentoId) {

        /* Executa a função deletar do modelo passando como parâmetro o id da usuario */
        if ($this->apartamentos_model->deletar($apartamentoId)) {
            /* Caso sucesso ao atualizar, recarrega a página principal */
            redirect('apartamentos');
        } else {
            /* Senão exibe a mensagem de erro */
            log_message('error', 'Erro ao deletar o apartamento.');
        }
    }

    

}

/* End of file usuarios.php */
/* Location: ./application/controllers/usuarios.php */


