<?php 
class User extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['user_logged'])){
            $this->session->set_flashdata("error","Porfavor logueate");
            //redirect("user/perfil");
        }
    }
    public function perfil(){
        $this->load->view('perfil');
    }  
}


?>