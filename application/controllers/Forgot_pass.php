<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot_pass extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('DAO');
		$this->load->config('email');
		$this->_isLoggin();
    }
	
	public function index()
	{
		$this->load->view('forgot_pass_view');
	}

	public function reset_password(){
		//Validar que el email exista y si existe entonces mandar a pantalla de mensaje de que se envio el link a su correo
		//por el contrario mandar alerta
		if ($this->input->post()) {
			$email = $this->input->post('user_email');
			$email_exists = $this->DAO->selectEntity('users',array('user_email'=>$email),TRUE);
			if ($email_exists) {
				//Obtener user_name 
				$result = $this->DAO->getElement('users','user_email',$email,'user_name');
				if ($result) {
					//Almacenar la respuesta de si se envio el correo
					$email_sent = $this->send_reset_password_email($email,$result);
					if ($email_sent) {
						$data['email'] = $email;
						//cargar vista de se envio mensaje
						$this->load->view('forgot_pass_msg',$data);
					}else{
						//Cargar vista de hubo error al mandar el correo
						$this->session->set_flashdata('error_msg_forgot','An error occurred sending email');
						$this->load->view('forgot_pass_view');
					}
				}else{
					// si no se obtiene el user_name
					$this->session->set_flashdata('error_msg_forgot','An error occurred');
					$this->load->view('forgot_pass_view');
				}
			}else{
				$this->session->set_flashdata('error_msg_forgot','Email do not exists');
				$this->load->view('forgot_pass_view');
			}
			
		}
	}

	public function reset_password_form($email,$email_code){
		if (isset($email,$email_code)) {
			$email_hash = sha1($email . $email_code);
			//checamos que el codigo si sea el user_name con el salt
			$verified = $this->DAO->verify_reset_password_code($email,$email_code);
			if ($verified) {
				$data['email'] = $email;
				$data['email_code'] = $email_code;
				$data['email_hash'] = $email_hash;
				$this->load->view('reset_pass_form',$data);
			}else{
				//Si el codigo es incorrecto
				$this->session->set_flashdata('error_msg_forgot','An error occurred');
				$this->load->view('forgot_pass_view');
			}
		}else{
			//Si no manda las variables
			$this->session->set_flashdata('error_msg_forgot','An error occurred');
			$this->load->view('forgot_pass_view');
		}
	}

	private function send_reset_password_email($email,$user_name){
		$this->load->library('email');
		$this->email->from('santiagodev12@gmail.com', 'Santiago Castañón');
		$this->email->to($email);
		$this->email->subject('Reset your password');
		$data['email'] = $email;
		$data['user_name'] = $user_name;
		$data['email_code'] = md5($this->config->item('salt') . $user_name);
		$this->email->message($this->load->view('email_template', $data, true));
		if ($this->email->send()) {
			return true;
		}else{
			return false;
			echo $this->email->print_debugger();
		}
	}
	
	
	
	public function update_password(){
		$this->_isLoggin();
		if ($this->input->post()){
			//checar que se envie el hash y el email, además que el hash sea el sha1 de email y email_code
			if (!isset($_POST['email'],$_POST['email_hash']) || $_POST['email_hash'] !== sha1($_POST['email'] . $_POST['email_code'])) {
				die("Error updating your password");
			}
			// validar los campos
			$this->load->library('form_validation');
			$this->form_validation->set_rules('email_hash','Email hash','required');
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('pass','Password','required');
			$this->form_validation->set_rules('Cpass','Confirm Password','required');

			$data['email'] = $this->input->post('email');

			if ($this->form_validation->run() == FALSE){
				//no valido enviar de nuevo a resert_pass_form
				$this->session->set_flashdata('error_msg_update','Uno de los campos no fue enviado');
				$this->load->view('reset_pass_form',$data);
			}else{
				//validar que los dos campos de password sean iguales
				$password = $this->input->post('pass');
				$repeat_password = $this->input->post('Cpass');
				if ($password == $repeat_password) {
					//update pass
					$email = $this->input->post('email');
					$update = $this->DAO->updatePassword($this->input->post('pass'),$email);
					if ($update) {
						// si se actualizo la pass
						$this->load->view('update_password_success_view');
					}else{
						$this->session->set_flashdata('error_msg_update','Error updating password');
						$data['email_hash'] = $this->input->post('email_hash');
						$data['email_code'] = $this->input->post('email_code');
						$this->load->view('reset_pass_form',$data);
					}
				}
				else{
					//Mandar error a la vista en una alerta
					$this->session->set_flashdata('error_msg_update','Password fields do not match');
					//Mandar las variables email, email_hash y email_code para que no haya un error si no son iguales las password
					$data['email_hash'] = $this->input->post('email_hash');
					$data['email_code'] = $this->input->post('email_code');
					$this->load->view('reset_pass_form',$data);
				}
			}
		}
	}

	function _isLoggin(){
		$session = $this->session->userdata('store_sess');
		if (@$session->user_email) {
			redirect('home');
		}
	}
}



