<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    private $email;
    private $password;

    public function __construct() {
        parent::__construct();
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    public function login_modelo() {
        $contador = 0;
        $sql = "SELECT * FROM usuario WHERE email = '$this->email'";
        $resultado = $this->db->query($sql)->row();
       
        if (isset($resultado)) {

            $a = $resultado->password;
            
            if (password_verify($this->password, $a)) {
                $contador++;
            }
        }

         /* $resultado->num_rows() */
        if ($contador > 0) {

            return $resultado;
        } else {
           
            return false;
        }
    }

}
