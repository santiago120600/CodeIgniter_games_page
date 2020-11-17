<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_RootController {

	function __construct(){
        parent::__construct();
		$this->__validateSession();
        $this->load->model('DAO');
		
    }


	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/navbar.php');
		$data_menu['users_selected'] = true;
		$this->load->view('includes/sidebar',$data_menu);
		$data_menu['current_section'] = 'Users';
		$this->load->view('includes/header_page.php',$data_menu);
		// contenido
		$data_container['container_data'] = $this->DAO->selectEntity('users'); 
		$data_main['container_data'] = $this->load->view('users/users_data_page',$data_container,TRUE);
		$this->load->view('users/user_page.php',$data_main);

		// contenido
		$this->load->view('includes/footer_page.php');
		$this->load->view('includes/footer');
	}

	public function userInfo(){
		$this->load->view('includes/header');
		$this->load->view('includes/navbar.php');
		$data_menu['users_selected'] = true;
		$this->load->view('includes/sidebar',$data_menu);
		$data_menu['current_section'] = 'Users';
		$this->load->view('includes/header_page.php',$data_menu);
		// contenido
		$data['container_data'] = $this->session->userdata('store_sess');
		$this->load->view('users/user_profile',$data);

		// contenido
		$this->load->view('includes/footer_page.php');
		$this->load->view('includes/footer');
	}

	public function editMenu($menu = null){
		$session = $this->session->userdata('store_sess');
		$data_container['container_data'] = $this->DAO->selectEntity('session_vw',array('user_id'=>$session->user_id),TRUE); 
		if($menu=='account'){
			$data_main['container_data'] = $this->load->view('users/edits/user_account_edit_view',$data_container,TRUE);
			$data_main['account_selected'] = true;
		}
		elseif($menu=='account_security'){
			$data_main['container_data'] = $this->load->view('users/edits/user_account_security_edit',$data_container,TRUE);
			$data_main['account_security_selected'] = true;
		}else{
			$data_main['container_data'] = $this->load->view('users/edits/user_profile_edit_view',$data_container,TRUE);
			$data_main['profile_selected'] = true;
		}

		$this->load->view('includes/header');
		$this->load->view('includes/navbar.php');
		$data_menu['users_selected'] = true;
		$this->load->view('includes/sidebar',$data_menu);
		$data_menu['current_section'] = 'Users';
		$this->load->view('includes/header_page.php',$data_menu);
		// contenido
		$this->load->view('users/user_edit_profile',$data_main);
		// contenido
		$this->load->view('includes/footer_page.php');
		$this->load->view('includes/footer');
	}

	public function updatePass(){
		if ($this->input->post()) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('old_pass','Old password','required');
			$this->form_validation->set_rules('new_pass','New password','required');
			$this->form_validation->set_rules('conf_new_pass','Confirm new password','required');
			$this->form_validation->set_rules('user_id','Id','required');
			if ($this->form_validation->run() == FALSE) {
				//Si no valida
				//mandar errores
				$this->session->set_flashdata('error_msg_pass_update','password was not send',1);
				$this->editMenu('account_security');
			}else {
				$old_pass = $this->input->post('old_pass');
				$new_pass = $this->input->post('new_pass');
				$confirm_new_pass = $this->input->post('conf_new_pass');
				$user_id = $this->input->post('user_id');

				$user_inf = $this->DAO->selectEntity('users',array('user_id'=>$user_id),true);
				if ($user_inf->user_password == $old_pass) {
					if ($new_pass == $confirm_new_pass) {
						$data = array(
							'user_password' => $new_pass
						);
						$data_response = $this->DAO->saveOrUpdateEntity('users',$data,$where_clause = array('user_id'=>$user_id));
						$this->session->set_flashdata('success_msg','Password updated successfully',1);
						$this->editMenu('account_security');
						//mandar mensaje de que se ha cambiado su contraseña exitosamente
					}else{
						//mandar error que no son iguales las nuevas contraseñas
						$this->session->set_flashdata('error_msg_pass_update','password do not match',1);
						$this->editMenu('account_security');
					}
				}else{
					// si la contraseña que puso como su vieja pass no es 
					$this->session->set_flashdata('error_msg_pass_update','password do not match',1);
					$this->editMenu('account_security');
				}
			}
		}else{
			//no se envio nada por post
			//Mandar error
			$this->session->set_flashdata('error_msg_pass_update','password was not send',1);
			$this->editMenu('account_security');
		}
	}

	function editUsername(){
		if ($this->input->post()) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username','New username','required');
			$this->form_validation->set_rules('user_id','user id','required');
			if ($this->form_validation->run()) {
				$data = array(
					'user_name' => $this->input->post('username')
				);
				$response = $this->DAO->saveOrUpdateEntity('users',$data,array('user_id'=>$this->input->post('user_id')));
				$this->session->set_flashdata('success_msg_username','Username updated successfully',1);
				$this->editMenu('account');
			}else{
				$this->editMenu('account');
				$this->session->set_flashdata('error_msg_username','Error updating username',1);
			}
		}else{
			$this->editMenu('account');
			$this->session->set_flashdata('error_msg_username','Error updating username',1);
		}
	}
}
