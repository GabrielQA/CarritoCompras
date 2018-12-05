<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Producto_model extends CI_Model {

    private $id_producto;
    private $nombre_producto;
    private $descripcion_producto;
    private $valor_producto;
    private $imagen_producto;
    private $id_productoFK;
            
    function __construct() {
        parent::__construct();
    }
    function getId_productoFK() {
        return $this->id_productoFK;
    }

    function setId_productoFK($id_productoFK) {
        $this->id_productoFK = $id_productoFK;
    }

        
    function getId_producto() {
        return $this->id_producto;
    }

    function setId_producto($id_producto) {
        $this->id_producto = $id_producto;
    }

    function getNombre_producto() {
        return $this->nombre_producto;
    }

    function getDescripcion_producto() {
        return $this->descripcion_producto;
    }

    function getValor_producto() {
        return $this->valor_producto;
    }

    function getImagen_producto() {
        return $this->imagen_producto;
    }

    function setNombre_producto($nombre_producto) {
        $this->nombre_producto = $nombre_producto;
    }

    function setDescripcion_producto($descripcion_producto) {
        $this->descripcion_producto = $descripcion_producto;
    }

    function setValor_producto($valor_producto) {
        $this->valor_producto = $valor_producto;
    }

    function setImagen_producto($imagen_producto) {
        $this->imagen_producto = $imagen_producto;
    }

    function guardar() {
        $sql = "INSERT INTO producto (id_producto ,nombre_producto, descripcion_producto,valor_producto,imagen_producto ,id_categoriaFK)"
                . " VALUES ('null', '$this->nombre_producto', '$this->descripcion_producto','$this->valor_producto','$this->imagen_producto','$this->id_productoFK')";
        $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function mostrar_datos($inicio = FALSE, $cantidadregistro = FALSE) {
        /*
          if ($inicio !== FALSE && $cantidadregistro !== FALSE) {

          $sql = "SELECT * FROM empleados WHERE nombre_empleado LIKE '%$this->nombre%' ORDER BY id_empleado ASC LIMIT $cantidadregistro ,$inicio";
          $resultado = $this->db->query($sql);
          return $resultado->result();

          } else {
          $sql = "SELECT * FROM empleados WHERE nombre_empleado LIKE '%$this->nombre%' ORDER BY id_empleado ASC";

          $resultado = $this->db->query($sql);
          return $resultado->result();
          }
         */

        $this->db->like("nombre_producto", $this->nombre_producto);
        if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
            $this->db->limit($cantidadregistro, $inicio);
        }
        $this->db->order_by("id_producto", "desc");
        $consulta = $this->db->get("producto");
        return $consulta->result();
    }

    function actualizar_datos() {
        $sql = "UPDATE producto SET nombre_producto = '$this->nombre_producto' , descripcion_producto = '$this->descripcion_producto' "
                . " , valor_producto ='$this->valor_producto' WHERE id_producto = '$this->id_producto'";
        $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function eliminar_datos() {
        $sql = "DELETE FROM producto WHERE id_producto = $this->id_producto";
        $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    
    /**************************/
    public function mostrar_datosCategoria($inicio = FALSE, $cantidadregistro = FALSE) {
  
        $this->db->where("id_categoriaFK", $this->id_productoFK);
        if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
            $this->db->limit($cantidadregistro, $inicio);
        }
        $consulta = $this->db->get("producto");
        return $consulta->result();
    }

}
