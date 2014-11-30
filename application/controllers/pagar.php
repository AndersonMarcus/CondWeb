<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pagar extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('pagar_model');
        
    }
    
    
   

    function index() {
        $data['titulo'] = "CRUD com CodeIgniter | Cadastro de Usuários";
         $data['pagar'] = $this->pagar_model->listar();
         if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'login');
		}
               
		$data['titulo'] = 'Bem-vindo';
	
        $this->load->view('pagar_view', $data);
       
      
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
                        $data['idContasPagar'] = $this->input->post('idContasPagar');
 $data['idpagarCondominio'] = $this->input->post('idpagarCondominio');

            /* Chama a função inserir do modelo */
            if ($this->pagar_model->inserir($data)) {
                redirect('pagar');
            } else {
                log_message('error', 'Erro ao inserir a conta.');
            }
        }
    }

    function editar($idContasPagar) {

        /* Aqui vamos definir o título da página de edição */
        $data['titulo'] = "CRUD com CodeIgniter | Editar Usuario";

        /* Busca os dados da usuario que será editada (id) */
        $data['dados_pagar'] = $this->pagar_model->editar($idContasPagar);

     

        /* Carrega a página de edição com os dados da usuario */
        $this->load->view('pagar_edit', $data);
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
            $this->editar($this->input->post('idContasPagar'));
        } else {
            /* Senão obtém os dados do formulário */
            $data['idContasPagar'] = $this->input->post('idContasPagar');
            $data['nome'] = $this->input->post('nome');
            $data['valor'] = $this->input->post('valor');
            $data['valorQtd'] = $this->input->post('valorQtd');
          
            $data['idContasPagar'] = $this->input->post('idContasPagar');
            $data['idpagarCondominio'] = $this->input->post('idpagarCondominio');
            
           
          
            /* Executa a função atualizar do modelo passando como parâmetro os dados obtidos do formulário */
            if ($this->pagar_model->atualizar($data)) {
                /* Caso sucesso ao atualizar, recarrega a página principal */
                redirect('pagar');
            } else {
                /* Senão exibe a mensagem de erro */
                log_message('error', 'Erro ao atualizar o usuario.');
            }
        }
    }

    function deletar($idContasPagar) {

        /* Executa a função deletar do modelo passando como parâmetro o id da usuario */
        if ($this->pagar_model->deletar($idContasPagar)) {
            /* Caso sucesso ao atualizar, recarrega a página principal */
            redirect('pagar');
        } else {
            /* Senão exibe a mensagem de erro */
            log_message('error', 'Erro ao deletar a conta.');
        }
    }

  

}

/* End of file usuarios.php */
/* Location: ./application/controllers/usuarios.php */
