<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Games extends MY_RootController {

	function __construct()
	{
        parent::__construct();
        $this->__validateSession();
        $this->load->model('DAO');

    }
    
    public function index(){
        redirect('Games/initial');
    }

    public function initial($category_id = null){
        //Se mandó un id
        if ($category_id) {
            //Checar si el id de la categoria existe 
            $category_exists = $this->DAO->selectEntity('categories',array('id_category'=>$category_id),TRUE); 
            if ($category_exists) {
                $data_container['category_selected'] = $category_exists;
                $data_container['games_data'] = $this->DAO->selectEntity('games',array('category_id'=>$category_id));
                
                $data_js['category_selected'] = $category_id;
            }else{
                //No existe el id en la BD
                redirect('categories');
            }
            
        }else {
            //No se mandó un id 
            //Mostrar todos los productos
            $data_container['games_data'] = $this->DAO->selectEntity('games');
            $data_js['category_selected'] = null;
        }

        $this->load->view('includes/header');
		$this->load->view('includes/navbar.php');
        $data_menu['games_selected'] = true;
        $this->load->view('includes/sidebar',$data_menu);
		$data_menu['current_section'] = 'Games';
        $this->load->view('includes/header_page.php',$data_menu);
        
        $data_main['container_data'] = $this->load->view('games/games_data_page',$data_container,TRUE);
        $this->load->view('games/games_page',$data_main);
        
        $data_footer['modal_size'] = "modal-lg";
		$this->load->view('includes/footer_page.php');
        $this->load->view('includes/footer',$data_footer);
        $this->load->view('games/games_js',$data_js);	
    }

    public function showGameForm(){
        //si mando un id traer la categoria con ese id
        if ($this->input->get('category_id')) {
            $data_view['category_exists'] = $this->DAO->selectEntity('categories',array('id_category'=>$this->input->get('category_id')),TRUE);
        }else {
            //traer todas las categorias si no viene id
            $data_view['category_list'] = $this->DAO->selectEntity('categories');
        }
        $data_view['action']=$this->input->get('action') ? $this->input->get('action') : 'new';
        if ($this->input->get('key')) {
            $data  = $this->DAO->selectEntity('games',array('id_game'=>$this->input->get('key')),TRUE);
            $data_view['current_data'] = (array) $data;
        }
            echo $this->load->view('games/games_form',$data_view,TRUE);
    }

    public function saveOrUpdate(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name_game','Nombre','required|min_length[3]|max_length[60]');
        $this->form_validation->set_rules('desc_game','Descripci&oacute;n','required');

        //Pendiente validar que exista
        $this->form_validation->set_rules('category','Categor&iacute;a','required');

        $this->form_validation->set_rules('game_picture','pic','callback_valid_pic');
        if ($this->form_validation->run()) {
            //lo va a hacer new y edit
            if ($this->input->post('form_action') != "delete") {
                $uploaded_file = false;
                //si es nuevo guardar
                if ($this->input->post('form_action')== 'new') {
                    $config['upload_path']          = './uploads/games';
                    $config['allowed_types']        = 'jpg|png';
                    $config['max_size']             = 2048;
                    $config['file_name'] = time();    
                    $this->load->library('upload',$config);

                    $uploaded_file = $this->upload->do_upload('game_picture');
                }

                //Si se subio la imagen y es un nuevo registro, guardar
                if ($uploaded_file && $this->input->post('form_action')== 'new') {
                    $data = array(
                        "img_game" => $this->upload->data()['file_name'],
                        "name_game" => $this->input->post('name_game'),
                        "desc_game" => $this->input->post('desc_game'),
                        "category_id" => $this->input->post('category')
                    );
                }else if(!$uploaded_file && $this->input->post('form_action')== 'new'){
                    //si no se guardo la imagen
                    $data_response = array(
                        "status" => "error",
                        "message" => "Error al subir la foto",
                        "data" =>  $this->load->view('games/games_form',$data,TRUE)
                    );
                    echo json_encode($data_response);
                }else{
                    //Editar
                    $data = array(
                        "name_game" => $this->input->post('name_game'),
                        "desc_game" => $this->input->post('desc_game'),
                        "category_id" => $this->input->post('category')
                    );
                }
            }else {
                $data = array(
                    "status_game" => "Inactive"
                );
            }
            //Edit
            if ($this->input->post('form_action') != 'new') {
                $where_clause = array('id_game'=> $this->input->post('id_game'));
            }else {
                $where_clause=array();
            }
            $data_response = $this->DAO->saveOrUpdateEntity('games',$data,$where_clause);
            echo json_encode($data_response);
        }
        else{   

            //Para que siga apareciendo la categoria si los datos en el formulario fueron incorrectos
            if ($this->input->post('category')) {
                $data['category_exists'] = $this->DAO->selectEntity('categories',array('id_category'=>$this->input->get('category_id')),TRUE);
            }else {
                //traer todas las categorias si no viene id
                $data['category_list'] = $this->DAO->selectEntity('categories');
            }


            $data['action'] = $this->input->post('form_action');
            $data['errors'] = $this->form_validation->error_array();
            $data['current_data'] = $this->input->post();
            $data_response = array(
                "status" => "warning",
                "message" => "Información incorrecta, valida los campos!",
                "data" =>  $this->load->view('games/games_form',$data,TRUE)
            );
            echo json_encode($data_response);
        }
    }

    function valid_pic($value){
        if (empty($_FILES['game_picture']['name'])) {
            if ($this->input->post('id_game')) {
                return true;
            }else {
                $this->form_validation->set_message('valid_pic','The {field} is required');
                return false;
            }
        }
        else{
            return true;
        }
    }

    function gameInfo($game_id){
        // funcion para mandar a la pagina de informacion del juego
        if ($game_id) {
            //checar que el juego exista
            $game_exists = $this->DAO->selectEntity('games',array('id_game'=>$game_id),TRUE); 
            if ($game_exists) {
                //Cargar la informacion del juego
                //comentario(opcion de escribir un comentario), calificacion, descripcion del juego, review, trailer

                $this->load->view('includes/header.php');
                $this->load->view('includes/navbar.php');
                $data_menu['games_selected'] = true;
                $this->load->view('includes/sidebar.php',$data_menu);
                $data_menu['current_section'] = 'Games';
                $this->load->view('includes/header_page.php',$data_menu);

                // hacer la consulta para traerme los mensajes desde la base de datos, pero traerme solo 
                // los comentarios de este juego, no todos
                //usar el game_id para hacer la consulta
                //where game_id = $game_id
                $data_container['container_data'] = $this->DAO->selectEntity('comments_vw',array('game_id'=>$game_id)); 

                //cargar vista comments_data_page
                $data_main['container_data'] = $this->load->view('comments/comments_data_page',$data_container,TRUE);
                //Mandar esos datos a otra vista
                $this->load->view('games/games_info',$data_main);

            
                $this->load->view('includes/footer_page.php');
                $this->load->view('includes/footer.php');
                
            }else{
                //No existe el id en la BD
                redirect('Games');
            }
        }else{

        }
    }

}
