<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('DAO');
    }
	
	public function index()
	{
		$this->load->view('register_view');
	}

	public function user_register(){
		
		if ($this->input->post()){
			$this->load->library('form_validation');
			//falta validar que tenga una extension maxima y minima los campos
			$this->form_validation->set_rules('user_name', 'Username', 'required');
			$this->form_validation->set_rules('user_email', 'Email', 'required');
			$this->form_validation->set_rules('user_pass', 'Password', 'required');
			$this->form_validation->set_rules('user_pass_conf', 'Repeat Password', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('register_view');
			}
			else
			{
				//validar que el email no exista en la base de datos
				$email = $this->input->post('user_email');
				$email_exists = $this->DAO->selectEntity('users',array('user_email'=>$email),TRUE);
				if ($email_exists) {
					// el email ya existe
					//Mandar error a la vista en una alerta
					$this->session->set_flashdata('error_msg_reg','Email already exists');
					$data['current_data'] = $this->input->post();
					$this->load->view('register_view',$data);
				}else{
					// si el email aun no existe 
					//Verificar que los dos campos de contraseña sean iguales
					$password = $this->input->post('user_pass');
					$repeat_password = $this->input->post('user_pass_conf');
					if ($password == $repeat_password) {
						$data = array(
							"user_name" => $this->input->post('user_name'),
							"user_email" => $this->input->post('user_email'),
							"user_password" => $this->input->post('user_pass')
						);
						$this->DAO->saveOrUpdateEntity('users',$data);
						redirect('Login');
					}
					else{
						//Mandar error a la vista en una alerta
						$this->session->set_flashdata('error_msg_reg','Password fields do not match');
						$data['current_data'] = $this->input->post();
						$this->load->view('register_view',$data);
					}
				}

			}
		}

	}
}
