<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends MY_RootController {

    function __construct()
	{
        parent::__construct();
        $this->__validateSession();
        $this->load->model('DAO');
    }

    public function index()
	{
            $this->load->view('includes/header');
            $data_menu['categories_selected'] = true;
            $this->load->view('includes/sidebar',$data_menu);
            $this->load->view('includes/topbar');
            $this->load->view('includes/search_menu');

            $data_container['container_data'] = $this->DAO->selectEntity('categories'); 
            $data_main['container_data'] = $this->load->view('categories/categories_data_page',$data_container,TRUE);
            $this->load->view('categories/categories_page',$data_main);
            $this->load->view('includes/footer');
            $this->load->view('categories/categories_js');

    }
    public function showCategoriesForm(){
        echo $this->load->view('categories/categories_form',null,TRUE);
    }

    public function showDataContainer()
    {        
        $data_container['container_data'] = $this->DAO->selectEntity('categories');
        echo $this->load->view('categories/categories_data_page',$data_container,TRUE);
    }

    public function saveOrUpdate(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name_category','Nombre','required[min_length[3]|max_length[50]');
        if ($this->form_validation->run()) {
            $data = array(
                "name_category" => $this->input->post('name_category'),
                "desc_category" => $this->input->post('desc_category')
            );
            $this->DAO->saveOrUpdateEntity('categories',$data);
        }
        else{
            $data['errors'] = $this->form_validation->error_array();
            echo $this->load->view('categories/categories_form',$data,TRUE);
        }
    }


}