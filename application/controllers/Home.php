<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_RootController {

	function __construct(){
        parent::__construct();
        $this->__validateSession();
    }


	public function index()
	{
		$this->load->view('includes/header.php');
		$this->load->view('includes/navbar.php');
		$data_menu['home_selected'] = true;
		$this->load->view('includes/sidebar.php',$data_menu);
		$data_menu['current_section'] = 'Home';
		$this->load->view('includes/header_page.php',$data_menu);
		$this->load->view('home.php');
		$this->load->view('includes/footer_page.php');
		$this->load->view('includes/footer.php');
	}
}
