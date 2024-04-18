<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $this->load->view('login/inicioSesion', null);
    }

    /*
    **
    Realizo la validacion de ususario para lo cual capturo el usuario de la vista y los busco 
    en mi base de datos, si existe dicho usuario permito el ingreso al sistema, y lo cargo en sesion,
    encripto la contraseña que ingrese el usuario para que coincida con la de la base de datos
    */
    public function validarUsuario()
    {
        if ($this->input->post()) {
            $username = $this->input->post('login_string');
            $passwd = $this->input->post('login_pass');
            $this->load->model('Usuario');
            $pswencri = $this->Usuario->encryption($passwd);
            $usuario = $this->Usuario->usuario_por_nombre_contrasena($username, $pswencri);
            if (!empty($usuario)) {
                $usuario_data = array(
                    'id' => $usuario->id,
                    'usuarioNombre' => $usuario->usuarioNombre,
                    'usuarioPassword' => $usuario->usuarioPassword,
                    'email' => $usuario->email,
                );
                $this->session->set_userdata($usuario_data);
                redirect('homeController');
            } else {
                $this->session->set_flashdata('Login_fallido', 'Usuario o contraseña incorrectos');
                redirect('AuthController/login');
            }
        } else {
            $this->session->set_flashdata('Login_fallido', 'Usuario o contraseña incorrectos');
            redirect('AuthController/login');
        }
    }

    /*
    Metodo para cerrar session una vez que el ususario quiera irse, todos los controladores
    controlan que se encuentre una sesion iniciada, para una mayor seguridad
    */
    public function cerrar_sesion()
    {
        $this->session->sess_destroy();
        redirect('AuthController/login');
    }
}
