<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UsuarioController extends CI_Controller
{
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


    public function guardarUsuario()
    {
        // Obtener los datos del formulario
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

    public function eliminarUsuario($id)
    {
        $this->load->model('Usuario');

        $eliminacionExitosa = $this->Usuario->eliminar($id);

        
        if ($eliminacionExitosa) {
            $this->session->set_flashdata('mensaje', 'Se elimino el usuario correctamente.');
        } else {
            $this->session->set_flashdata('mensaje', 'Error, no se elimino el usuario correctamente.');
        }

        // Redirigir a alguna vista
        redirect(base_url('usuarioController/index'));
    }
}
