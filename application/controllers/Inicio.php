<?php

class Inicio extends CI_Controller {

    function __construct() {
        parent::__construct();
       
    }

    function index() {
        // if ($this->session->userdata('login')) {
        //    $this->load->view('frontend/empleados');
        // } else {
        //$this->load->view('welcome_message');
        //     redirect(site_url(''));
        //  }
        $data = array('definir' => 1);
        $this->load->view('frontend/Head');
        $this->load->view('frontend/Inicio',$data);
        $this->load->view('frontend/Footer');
    }

   
}
