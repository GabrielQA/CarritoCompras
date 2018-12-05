<?php

class Producto extends CI_Controller {

    function __construct() {
        parent::__construct();
        // llamando al modelo para pasarle datos y realizar consultas
        $this->load->model('Producto_model');
    }

    function index() {
        // if ($this->session->userdata('login')) {
        //    $this->load->view('frontend/empleados');
        // } else {
        //$this->load->view('welcome_message');
        //     redirect(site_url(''));
        //  }

        if ($this->session->userdata('login')) {
            $data = array('definir' => 2);
            $this->load->view('frontend/Head');
            $this->load->view('frontend/Producto', $data);
            $this->load->view('frontend/Footer');
        } else {
            redirect(site_url('Inicio'));
        }
    }

    function guardar_datosController() {

        if ($this->input->is_ajax_request()) {

            $nombre_producto = $this->Producto_model->setNombre_producto($this->input->post("nombre"));
            $descripcion_producto = $this->Producto_model->setDescripcion_producto($this->input->post("descripcion"));
            $valor_producto = $this->Producto_model->setValor_producto($this->input->post("valor"));
            $id_productoFK = $this->Producto_model->setId_productoFK($this->input->post("idCategoria"));

            
            
            $config = [
                "upload_path" => "./assets/images/uploads",
                "allowed_types" => "png|jpg"
            ];
            $this->load->library("upload", $config);

            if ($this->upload->do_upload('imagen_producto')) {
                $data = array("upload_data" => $this->upload->data());

                $imagen_producto = $this->Producto_model->setImagen_producto($data['upload_data']['file_name']);
                $datos = array(
                    "nombre_producto" => $nombre_producto,
                    "descripcion_producto" => $descripcion_producto,
                    "valor_producto" => $valor_producto,
                    "imagen_producto" => $imagen_producto,
                    "id_categoriaFK" =>$id_productoFK
                );
            } else {
                echo $this->upload->display_errors();
            }

            if ($this->Producto_model->guardar($datos)) {
                echo 'Producto Registrado Correctamente';
            } else {
                echo 'Producto No registrado';
            }
        } else {
            show_404();
        }
    }

    function actualizar_datosController() {
        if ($this->input->is_ajax_request()) {

            $id = $this->Producto_model->setId_producto($this->input->post("idsele"));
            $nombre = $this->Producto_model->setNombre_producto($this->input->post("nombressele"));
            $descripcion = $this->Producto_model->setDescripcion_producto($this->input->post("descripcionsele"));
            $valor = $this->Producto_model->setValor_producto($this->input->post("valorsele"));

            $datos = array(
                'nombre_producto' => $nombre,
                'descripcion_producto' => $descripcion,
                'valor_producto' => $valor
            );

            if ($this->Producto_model->actualizar_datos($id, $datos)) {
                echo 'Producto actualizado';
            } else {
                echo 'Producto No actualizado';
            }
        } else {
            show_404();
        }
    }

    function mostrar_datosController() {
        if ($this->input->is_ajax_request()) {
            $buscar = $this->Producto_model->setNombre_producto($this->input->post("buscar"));
            $numeropagina = $this->input->post("nropagina");
            $cantidad = $this->input->post("cantidad");

            $inicio = ($numeropagina - 1) * $cantidad;
            $datos = array(
                "producto" => $this->Producto_model->mostrar_datos($inicio, $cantidad),
                "totalregistros" => count($this->Producto_model->mostrar_datos($buscar)),
                "cantidad" => $cantidad
            );
            echo json_encode($datos);
        } else {
            show_404();
        }
    }

// Fin funcion mostrar_datos()



    function eliminar_datosController() {
        if ($this->input->is_ajax_request()) {
            $id = $this->Producto_model->setId_producto($this->input->post("id"));
            if ($this->Producto_model->eliminar_datos($id)) {
                echo 'REGISTRO ELIMINADO';
            } else {
                echo 'REGISTRO NO ELIMINADO';
            }
        } else {
            show_404();
        }
    }

    // MOSTRAR DATOS POR CATEGORIA

    function mostrarConCategoria_datosController() {
        if ($this->input->is_ajax_request()) {
            $buscar = $this->Producto_model->setId_productoFK($this->input->post("buscar"));
            
            $numeropagina = $this->input->post("nropagina");
            $cantidad = $this->input->post("cantidad");

            $inicio = ($numeropagina - 1) * $cantidad;
            $datos = array(
                "producto" => $this->Producto_model->mostrar_datosCategoria($inicio, $cantidad),
                "totalregistros" => count($this->Producto_model->mostrar_datosCategoria($buscar)),
                "cantidad" => $cantidad
            );
            echo json_encode($datos);
        } else {
            show_404();
        }
    }

}
