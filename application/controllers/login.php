<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('login_model');
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('url','form'));
		$this->load->database('default');
    }
	
	public function index()
	{	
		switch ($this->session->userdata('perfil')) {
			case '':
				
				$data['titulo'] = 'Login | ConWeb';
				$this->load->view('login_view',$data);
				break;
			case 'administrador':
				redirect(base_url().'admin');
				break;
			case 'visualizador':
				redirect(base_url().'editor');
				break;	
			
			default:		
				$data['titulo'] = 'Login | ConWeb';
				$this->load->view('login_view',$data);
				break;		
		}
	}

public function new_user()
	
		{
            $this->form_validation->set_rules('email', 'Email do usuário', 'required|trim|min_length[2]|max_length[150]|xss_clean');
            $this->form_validation->set_rules('senha', 'senha', 'required|trim|min_length[5]|max_length[150]|xss_clean');
 
            //lanzamos mensajes de error si es que los hay
            
			if($this->form_validation->run() == FALSE)
			{
				$this->index();
			}else{
				$email = $this->input->post('email');
				$senha = $this->input->post('senha');
				$check_user = $this->login_model->login_user($email,$senha);
				if($check_user == TRUE)
				{
					$data = array(
	                'is_logued_in' 	=> 		TRUE,
	                'id_usuario' 	=> 		$check_user->id,
	                'perfil'		=>		$check_user->perfil,
	                'nome' 		=> 		$check_user->nome
            		);		
					$this->session->set_userdata($data);
					$this->index();
				}
			}
		
	}
	
	
	
	public function logout_ci()
	{
		$this->session->sess_destroy();
		$this->index();
	}
}
