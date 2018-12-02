<?php
class Auth extends CI_Controller
{
    public function index(){
        $this->form_validation->set_rules('username','username','required');
        $this->form_validation->set_rules('correo','correo','required');
        if($this->form_validation->run() == TRUE){
        $username=$_POST['username'];
        $correo=$_POST['correo'];
        //chequeamos el usuario de la base de datos por medio de una consulta
        if($username=="Admin" and $correo=="Admin@gmail.com"){
            redirect("auth/registro","refresh");
        }
        $this->db->select('*');
        $this->db->from('personas');
        $this->db->where(array('username'=>$username, 'correo'=>$correo));
        $query = $this->db->get();
        $user =$query->row();
        //si el usuario existe
        if($user->correo){


            $this->session->set_flashdata("success","Datos correctos");
            
            $_SESSION['user_logged']=TRUE;
            $_SESSION['username'] =$user->username;
            redirect("user/perfil","refresh");
        } else {
            $this->session->set_flashdata("error","No existe este usuario");
                redirect("auth");
        }
    }
    $this->load->view('login');
    }











    public function login(){

    }    


    
    public function Registro(){
        if(isset($_POST['iniciarsesion'])){
            $this->load_>view('login');

    }
//Validamos si los espacios estan basidos
        if(isset($_POST['Registrar'])){
            $this->form_validation->set_rules('username','username','required');
            $this->form_validation->set_rules('nombre','nombre','required');
            $this->form_validation->set_rules('correo','correo','required');
            $this->form_validation->set_rules('apellido_1','apellido_1','required');
            $this->form_validation->set_rules('apellido_2','apellido_2','required');
            $this->form_validation->set_rules('telefono','telefono','required');
            $this->form_validation->set_rules('direccion','direccion','required');
//si los datos son correctos y la validacion se cumple, insertamos la informacion 
            if($this->form_validation->run() == TRUE){
                $data = array(
                    'username'=>$_POST['username'],
                    'nombre'=>$_POST['nombre'],
                    'correo'=>$_POST['correo'],
                    'apellido_1'=>$_POST['apellido_1'],
                    'apellido_2'=>$_POST['apellido_2'],
                    'telefono'=>$_POST['telefono'],
                    'direccion'=>$_POST['direccion'],
                    'usu'=>$persona="cliente"
                );
                $this->db->insert('personas', $data);
//Si la condicion fue cierta o se hizo muestreme este comentario
                $this->session->set_flashdata("success","Has sido registrado. Ya puedes loguearte");
                redirect("Auth", "refresh");
            }
        }
 
//carga la ventana
        $this->load->view('registro');

    }



}
?>