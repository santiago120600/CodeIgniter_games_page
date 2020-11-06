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
		if($menu=='profile'){
			$data_main['container_data'] = $this->load->view('users/edits/user_profile_edit_view',$data_container,TRUE);
		}
		elseif($menu=='account'){
			$data_main['container_data'] = $this->load->view('users/edits/user_account_edit_view',$data_container,TRUE);
		}
		elseif($menu=='account_security'){
			$data_main['container_data'] = $this->load->view('users/edits/user_account_security_edit',$data_container,TRUE);
		}else{
			$data_main['container_data'] = $this->load->view('users/edits/user_profile_edit_view',$data_container,TRUE);
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
}
