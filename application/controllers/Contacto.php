<?php

class Contacto extends CI_Controller {

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

        $data = array('definir' => 4);
        $this->load->view('frontend/Head');
        $this->load->view('frontend/Contacto', $data);
        $this->load->view('frontend/Footer');
    }

    function enviarCorreo() {

        $nombre = $this->input->post("nombre");
        $email = $this->input->post("correo");
        $mensaje = $this->input->post("mensaje");

       // $cabeceras = "Desde: www.webpruebas.com";
        $asunto = "ASUNTO :D";
        $email_to = "oscar.acunna@gmail.com";
        $contenido = "Nombre : " . $nombre .
                "\r\n".
                "Correo : " . $email .
                "\r\n".
                "Mensaje de consulta : " . $mensaje .
                "\r\n";

        if (mail($email_to, $asunto, $contenido)) {
            echo "envio";
        } else {
            echo "noenvio";
        }
    }

}
