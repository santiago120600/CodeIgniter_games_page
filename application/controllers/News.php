<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_RootController {

	function __construct(){
        parent::__construct();
        $this->__validateSession();
    }


	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/navbar.php');
		$data_menu['news_selected'] = true;
		$this->load->view('includes/sidebar',$data_menu);
		$data_menu['current_section'] = 'News';
		$this->load->view('includes/header_page.php',$data_menu);
		// contenido
		// contenido
		$this->load->view('includes/footer_page.php');
		$this->load->view('includes/footer');
	}
}
