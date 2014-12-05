<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Receber extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('receber_model');
        
    }
    

    function index() {
        $data['titulo'] = "CRUD com CodeIgniter | Cadastro de Contas a Receber";
        /**
         * Lista todos os registros da tabela pesssoas
         */
     
        $data['receber'] = $this->receber_model->listar();
        /**
         * Carregar combobox na view com dados do banco
         */
           $this->load->model("receber_model");
        $condominios = $this->receber_model->select_cond();

      $option="";
        foreach ($condominios->result() as $linha) {
            $option .= "\n \t<option value='$linha->condominioId'>" .$linha->condominioId . "-" . $linha->nome ."</option>";
        }
       
        $data['options_condominios'] = $option;
       
        
       
        
          if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'login');
		}
               
		$data['titulo'] = 'Bem-vindo';
	 /**
         * Carrega a view
         */
        $this->load->view('receber_view', $data);
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
        $this->form_validation->set_rules('nome', 'Nome', 'required|max_length[40]');
       

        /* Executa a validação e caso houver erro... */
        if ($this->form_validation->run() === FALSE) {
            /* Chama a função index do controlador */
            $this->index();
            /* Senão, caso sucesso na validação... */
        } else {
            /* Recebe os dados do formulário (visão) */
            $data['nome'] = $this->input->post('nome');
            $data['valor'] = $this->input->post('valor');
            $data['valorQtd'] = $this->input->post('valorQtd');
           
            $data['total'] = $this->input->post('total');
          
                        $data['idContasReceber'] = $this->input->post('idContasReceber');
 $data['RecebercondominioId'] = $this->input->post('RecebercondominioId');
 $data['RecebercondominioId'] =substr($data['RecebercondominioId'], 1);

 $data['ReceberapartamentoId'] = $this->input->post('ReceberapartamentoId');
 
            /* Chama a função inserir do modelo */
            if ($this->receber_model->inserir($data)) {
                redirect('receber');
            } else {
                log_message('error', 'Erro ao inserir a conta.');
            }
        }
    }

    function editar($idContasReceber) {

        /* Aqui vamos definir o título da página de edição */
        $data['titulo'] = "CRUD com CodeIgniter | Editar conta";

        /* Busca os dados da usuario que será editada (id) */
        $data['dados_contasReceber'] = $this->receber_model->editar($idContasReceber);

     

        /* Carrega a página de edição com os dados da usuario */
        $this->load->view('receber_edit', $data);
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
                'rules' => 'trim|required|max_length[40]'
            )
          
        );
        $this->form_validation->set_rules($validations);

        /* Executa a validação... */
        if ($this->form_validation->run() === FALSE) {
            /* Caso houver erro chama função editar do controlador novamente */
            $this->editar($this->input->post('idContasReceber'));
        } else {
            /* Senão obtém os dados do formulário */
            $data['idContasReceber'] = $this->input->post('idContasReceber');
            $data['valor'] = $this->input->post('valor');
            $data['valorQtd'] = $this->input->post('valorQtd');
            $data['total'] = $this->input->post('total');
          
            $data['idContasReceber'] = $this->input->post('idContasReceber');
          
           
          
            /* Executa a função atualizar do modelo passando como parâmetro os dados obtidos do formulário */
            if ($this->receber_model->atualizar($data)) {
                /* Caso sucesso ao atualizar, recarrega a página principal */
                redirect('receber');
            } else {
                /* Senão exibe a mensagem de erro */
                log_message('error', 'Erro ao atualizar o usuario.');
            }
        }
    }

    function deletar($idContasReceber) {

        /* Executa a função deletar do modelo passando como parâmetro o id da usuario */
        if ($this->receber_model->deletar($idContasReceber)) {
            /* Caso sucesso ao atualizar, recarrega a página principal */
            redirect('receber');
        } else {
            /* Senão exibe a mensagem de erro */
            log_message('error', 'Erro ao deletar a conta.');
        }
    }

  

}

/* End of file receber.php */
/* Location: ./application/controllers/receber.php */
