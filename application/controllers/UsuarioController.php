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

            if (!empty($listUsuarios)) {

                $data['listUsuarios'] = $listUsuarios;
                $view["body"] = $this->load->view("usuarios/lista", $data, TRUE);
               
                $this->parser->parse("template/body", $view);
            } else {
                $view["listaUsuarios"] = null;
                $this->parser->parse("usuarios/lista", $view);
            }
        } else {
            echo 'no entraste';
            show_404();
        }
    }
}
