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
}
