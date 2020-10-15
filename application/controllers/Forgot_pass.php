<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot_pass extends CI_Controller {

	
	public function index()
	{
		$this->load->view('forgot_pass_view');
	}
}
