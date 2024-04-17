<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TareaController extends CI_Controller
{
    public function index()
    {
        if (!empty($this->session->userdata('usuarioNombre'))) {

            $this->load->model('Tarea');

            $listTareas = $this->Tarea->obtenerTareas();
            $view["title"] = "Lista de Tareas";

            if (!empty($listTareas)) {

                $data['listTareas'] = $listTareas;
                $view["body"] = $this->load->view("tareas/lista", $data, TRUE);
               
                $this->parser->parse("template/body", $view);
            } else {
                $data['listTareas'] = null;
                $view["body"] = $this->load->view("tareas/lista", $data, TRUE);
               
                $this->parser->parse("template/body", $view);
            }
        } else {
            echo 'no entraste';
            show_404();
        }
    }
}
