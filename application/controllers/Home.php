<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_RootController {

	function __construct(){
        parent::__construct();
        $this->__validateSession();
    }


	public function index()
	{
        $this->load->view('includes/header');
		$this->load->view('includes/sidebar');
		$this->load->view('includes/topbar');
		$this->load->view('includes/search_menu');
		$this->load->view('includes/content');
		$this->load->view('includes/footer');
	}
}
