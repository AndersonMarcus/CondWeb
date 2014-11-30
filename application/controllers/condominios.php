<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Condominios extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('condominios_model');
        
    }

    function index() {
        $data['titulo'] = "CRUD com CodeIgniter | Cadastro de Usuários";
         $data['condominios'] = $this->condominios_model->listar();
        
         if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'login');
		}
               
		$data['titulo'] = 'Bem-vindo';
	 /**
         * Carrega a view
         */
        $this->load->view('condominios_view', $data);
        /**
         * Lista todos os registros da tabela condominios
         */
       
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
        $this->form_validation->set_rules('nome', 'Nome', 'required|max_length[100]');
      

        /* Executa a validação e caso houver erro... */
        if ($this->form_validation->run() === FALSE) {
            /* Chama a função index do controlador */
            $this->index();
            /* Senão, caso sucesso na validação... */
        } else {
            /* Recebe os dados do formulário (visão) */
            $data['nome'] = $this->input->post('nome');
           

            /* Chama a função inserir do modelo */
            if ($this->condominios_model->inserir($data)) {
                redirect('condominios');
            } else {
                log_message('error', 'Erro ao inserir o condominio.');
            }
        }
    }

    function editar($condominioId) {

        /* Aqui vamos definir o título da página de edição */
        $data['titulo'] = "CRUD com CodeIgniter | Editar Condominio";

        /* Busca os dados da usuario que será editada (id) */
        $data['dados_condominio'] = $this->condominios_model->editar($condominioId);

     

        /* Carrega a página de edição com os dados da usuario */
        $this->load->view('condominios_edit', $data);
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
                'field' => 'nome',
                'label' => 'Nome',
                'rules' => 'trim|required|max_length[100]'
            )
           
        );
        $this->form_validation->set_rules($validations);

        /* Executa a validação... */
        if ($this->form_validation->run() === FALSE) {
            /* Caso houver erro chama função editar do controlador novamente */
            $this->editar($this->input->post('condominioId'));
        } else {
            /* Senão obtém os dados do formulário */
            $data['condominioId'] = $this->input->post('condominioId');
            $data['nome'] = $this->input->post('nome');
           
          
            /* Executa a função atualizar do modelo passando como parâmetro os dados obtidos do formulário */
            if ($this->condominios_model->atualizar($data)) {
                /* Caso sucesso ao atualizar, recarrega a página principal */
                redirect('condominios');
            } else {
                /* Senão exibe a mensagem de erro */
                log_message('error', 'Erro ao atualizar o condominio.');
            }
        }
    }

    function deletar($condominioId) {

        /* Executa a função deletar do modelo passando como parâmetro o id da usuario */
        if ($this->condominios_model->deletar($condominioId)) {
            /* Caso sucesso ao atualizar, recarrega a página principal */
            redirect('condominios');
        } else {
            /* Senão exibe a mensagem de erro */
            log_message('error', 'Erro ao deletar o usuario.');
        }
    }

  

}

/* End of file condominios.php */
/* Location: ./application/controllers/condominios.php */
