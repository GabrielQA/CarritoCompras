<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria_model extends CI_Model {

    private $id_categoria;
    private $nombre_categoria;

    function __construct() {
        parent::__construct();
    }

    function getId_categoria() {
        return $this->id_categoria;
    }

    function getNombre_categoria() {
        return $this->nombre_categoria;
    }

    function setId_categoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }

    function setNombre_categoria($nombre_categoria) {
        $this->nombre_categoria = $nombre_categoria;
    }

    function guardar() {
        $sql = "INSERT INTO categoria (id_categoria ,nombre_categoria)"
                . " VALUES ('null', '$this->nombre_categoria')";
        $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function mostrar_datos($inicio = FALSE, $cantidadregistro = FALSE) {

        $this->db->like("nombre_categoria", $this->nombre_categoria);
        if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
            $this->db->limit($cantidadregistro, $inicio);
        }
        $consulta = $this->db->get("categoria");
        return $consulta->result();
    }

    function actualizar_datos() {
        $sql = "UPDATE categoria SET nombre_categoria = '$this->nombre_categoria' WHERE id_categoria = '$this->id_categoria'";
        $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function eliminar_datos() {
        $sql = "DELETE FROM categoria WHERE id_categoria = $this->id_categoria";
        $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /*     * ********************* */

    public function mostrar_datos2() {
       $sql = "Select * from categoria"; 
       $resultado = $this->db->query($sql);
       return $resultado->result();
    }

    
    
    
    
}
