<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DAO extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    public function login($email,$password){
        $this->db->where('user_email',$email);
        $query = $this->db->get('users');
        $user_exists = $query->row();
        if ($user_exists) {
            if ($user_exists->user_status == 'Inactive') {
                return array(
                    "status" => "error",
                    "message" => "La cuenta actualmente se encuentra inactiva, contacta al administrador para más información"
                );
            }
            if ($user_exists->user_password == $password) {
                $this->db->where('user_id',$user_exists->user_id);
                $query = $this->db->get('session_vw');
                return array(
                    'status' => 'success',
                    'message' => 'Usuario cargado correctamente',
                    'data' => $query->row()
                );
            }else {
                return array(
                    'status' => 'error',
                    'message' => 'La contraseña ingresada es incorrecta'
                );
            }
        }else{
            return array(
                'status' => 'error',
                'message' => 'correo no encontrado'
            );
        }
    }


    function selectEntity($entityName,$whereClause= array(),$isUnique = FALSE){
        if($whereClause){
            $this->db->where($whereClause);
        }
        $query = $this->db->get($entityName);
        if($this->db->error()['message'] != ''){
            return $isUnique ? null : array();
        }else{
            return $isUnique ? $query->row(): $query->result();
        }
    }

    function saveOrUpdateEntity($entityName,$data,$whereClause = array()){
        //validar que el arreglo contenga info
        if ($whereClause) {
            $this->db->where($whereClause);
            $this->db->update($entityName,$data);
        }else{
            $this->db->insert($entityName,$data);
        }
        if ($this->db->error()['message'] != '') {
            return array(
                "status" => "error",
                "message" => $this->db->error()['message']
            );
        }else{
            return array(
                "status" => "success",
                "message" => $whereClause ? 'Datos Actualizados correctamente' : 'Datos Registrados correctamente'
            );
        }

    }

    function getElement($table_name,$column_name,$value,$column_desire){
        $query = "SELECT * FROM $table_name WHERE $column_name = '$value' ";
        $result = $this->db->query($query);
        $row = $result->row();
        return $row->$column_desire;
    }

    function verify_reset_password_code($email,$code){
        $sql = "SELECT user_name, user_email FROM users WHERE user_email = '$email' LIMIT 1";
        $result = $this->db->query($sql);
        $row = $result->row();
        if ($result->num_rows()==1) {
            return ($code == md5($this->config->item('salt') . $row->user_name)) ? true : false;
        }else{
            return false;
        }
    }

    function updatePassword($newPassword,$user_email){
        $query = "UPDATE users SET user_password = '$newPassword' WHERE user_email = '$user_email' ";
        $this->db->query($query);
        if ($this->db->affected_rows() === 1 ) {
            return true;
        }else{
            return false;
        }
    }

    function deleteElement($entityName,$whereClause=array()){
        $this->db->where($whereClause);
        $this->db->delete($entityName);
    }

}