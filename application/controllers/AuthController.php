<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("Form_validation");
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function login()
    {
        $this->load->view('login/inicioSesion', null);
    }

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

    public function cerrar_sesion()
    {
        $this->session->sess_destroy();
        redirect('AuthController/login');
    }
}
