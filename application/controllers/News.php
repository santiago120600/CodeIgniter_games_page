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
		$data_menu['news_selected'] = true;
		$this->load->view('includes/sidebar',$data_menu);
		$this->load->view('includes/topbar');
		$this->load->view('includes/search_menu');
		$this->load->view('includes/content');
		$this->load->view('includes/footer');
	}
}
