<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UsuarioController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (!empty($this->session->userdata('usuarioNombre'))) {
            $this->load->model('Usuario');
            $listUsuarios = $this->Usuario->obtenerUsuarios();
            $view["title"] = "Lista de usuarios";
            $data['scripts'] = '<script src="' . base_url('assets/js/usuario.js') . '"></script>';
            $data['usuarioNombre'] = $data['usuarioPassword'] = $data['email'] = '';
            if (!empty($listUsuarios)) {
                $data['listUsuarios'] = $listUsuarios;
                $view["body"] = $this->load->view("usuarios/lista", $data, TRUE);
                $this->parser->parse("template/body", $view);
            } else {
                $view["listaUsuarios"] = null;
                $view["body"] = $this->load->view("usuarios/lista", $data, TRUE);
                $this->parser->parse("template/body", $view);
            }
        } else {
            echo 'no entraste';
            show_404();
        }
    }

    /*
Realizo la carga de usuarios en la base de datos
si el proceso puede cargar un usuario en la base de datos
entonces me devuelve su id o registros, y yo respondo a la vista que esta esperando mi respues 
que todo anduvo correcto
*/
    public function guardarUsuario()
    {
        $usuario = $this->input->post();
        if (!empty($usuario)) {
            $this->load->model('Usuario');
            $pswEncriptado = $this->Usuario->encryption($usuario['usuarioPassword']);
            $save = array(
                'usuarioNombre' => $usuario['usuarioNombre'],
                'usuarioPassword' => $pswEncriptado,
                'email' => $usuario['email'],
            );
            $idtarea = $this->Usuario->insert($save);
            if ($idtarea > 0) {
                $response = array(
                    'success' => true,
                    'message' => 'Usuario guardada exitosamente.'
                );
                echo json_encode($response);
            } else {
                $response = array(
                    'success' => false,
                );
                echo json_encode($response);
            }
        } else {
            $response = array(
                'success' => false,
            );
            echo json_encode($response);
        }
    }

    /*Realizo la eliminacion de un susario de la base de datos
    */
    public function eliminarUsuario($id)
    {
        $this->load->model('Usuario');
        $eliminacionExitosa = $this->Usuario->eliminar($id);
        if ($eliminacionExitosa) {
            $this->session->set_flashdata('mensaje', 'Se elimino el usuario correctamente.');
        } else {
            $this->session->set_flashdata('mensaje', 'Error, no se elimino el usuario correctamente.');
        }
        redirect('usuarioController/index');
    }
}
