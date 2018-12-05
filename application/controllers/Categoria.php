<?php

class Categoria extends CI_Controller {

    function __construct() {
        parent::__construct();
        // llamando al modelo para pasarle datos y realizar consultas
        $this->load->model('Categoria_model');
    }

    function index() {
        // if ($this->session->userdata('login')) {
        //    $this->load->view('frontend/empleados');
        // } else {
        //$this->load->view('welcome_message');
        //     redirect(site_url(''));
        //  }

        if ($this->session->userdata('login')) {
            $data = array('definir' => 3);
            $this->load->view('frontend/Head');
            $this->load->view('frontend/Categoria', $data);
            $this->load->view('frontend/Footer');
        } else {
            redirect(site_url('Inicio'));
        }
    }

    function guardar_datosController() {

        if ($this->input->is_ajax_request()) {
            $nombre_categoria = $this->Categoria_model->setNombre_categoria($this->input->post("nombre"));
            $datos = array(
                "nombre_categoria" => $nombre_categoria
            );

            if ($this->Categoria_model->guardar($datos)) {
                echo 'Categoria Registrada Correctamente';
            } else {
                echo 'Categoria No registrada';
            }
        } else {
            show_404();
        }
    }

    function actualizar_datosController() {
        if ($this->input->is_ajax_request()) {

            $id_categoria = $this->Categoria_model->setId_categoria($this->input->post("idsele"));
            $nombre_categoria = $this->Categoria_model->setNombre_categoria($this->input->post("nombressele"));

            $datos = array(
                'nombre_categoria' => $nombre_categoria
            );

            if ($this->Categoria_model->actualizar_datos($id_categoria, $datos)) {
                echo 'Categoria actualizada';
            } else {
                echo 'Categoria No actualizada';
            }
        } else {
            show_404();
        }
    }

    function mostrar_datosController() {
        if ($this->input->is_ajax_request()) {
            $buscar = $this->Categoria_model->setNombre_categoria($this->input->post("buscar"));
            $numeropagina = $this->input->post("nropagina");
            $cantidad = $this->input->post("cantidad");

            $inicio = ($numeropagina - 1) * $cantidad;
            $datos = array(
                "categoria" => $this->Categoria_model->mostrar_datos($inicio, $cantidad),
                "totalregistros" => count($this->Categoria_model->mostrar_datos($buscar)),
                "cantidad" => $cantidad
            );
            echo json_encode($datos);
        } else {
            show_404();
        }
    }

    function eliminar_datosController() {
        if ($this->input->is_ajax_request()) {
            $id = $this->Categoria_model->setId_categoria($this->input->post("id"));
            if ($this->Categoria_model->eliminar_datos($id)) {
                echo 'REGISTRO ELIMINADO';
            } else {
                echo 'REGISTRO NO ELIMINADO';
            }
        } else {
            show_404();
        }
    }

    /*     * ********************************** */

    function mostrar_datosController2() {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Categoria_model->mostrar_datos2();
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    
    

}
