<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rates extends MY_RootController {

	function __construct(){
        parent::__construct();
		$this->__validateSession();
        $this->load->model('DAO');
    }


	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/navbar.php');
		$data_menu['rates_selected'] = true;
		$this->load->view('includes/sidebar',$data_menu);
		$data_menu['current_section'] = 'Rates';
		$this->load->view('includes/header_page.php',$data_menu);
		// contenido
		$data_container['games_data'] = $this->DAO->selectEntity('best_rates'); 
		echo var_dump($data_container['games_data']);
		
		$data_main['container_data'] = $this->load->view('games/games_data_page',$data_container,TRUE);
		$this->load->view('games/games_page',$data_main);
		// contenido
		$this->load->view('includes/footer_page.php');
		$this->load->view('includes/footer');
	}
}
