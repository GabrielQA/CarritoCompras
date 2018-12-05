<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
    }

    public function index() {

        if ($this->session->userdata('Login')) {
            $this->load->view('frontend/Producto');
        } else {
            $this->load->view('welcome_message');
        }
    }

    public function ingresar_controller() {
        if ($this->input->is_ajax_request()) {

            $email = $this->Login_model->setEmail($this->input->post('email'));
            $password = $this->Login_model->setPassword($this->input->post('password'));
            $respuesta = $this->Login_model->login_modelo($email, $password);

            if ($respuesta) {
                $datos = [
                    "id" => $respuesta->id_usuario,
                    "name" => $respuesta->nombre_usuario,
                    "login" => TRUE
                ];

                $this->session->set_userdata($datos);
            } else {
                echo 'error';
            }
        } else {
            show_404();
        }
    }
    
    public function cerrar_controller() {
        $this->session->sess_destroy();
    }
}
