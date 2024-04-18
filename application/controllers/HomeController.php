<?php

defined('BASEPATH') or exit('No direct script access allowed');

class homeController extends CI_Controller
{
 
    public function index()
    {
        if (!empty($this->session->userdata('usuarioNombre'))) {
            $view["title"] = "Total de Tareas";

            $data = array(
                "cantidades" => $this->Tarea->getCantidades(),
            );
            $view["body"] = $this->load->view("admin/home", $data, TRUE);
            $this->parser->parse("admin/home", $view);
        } else {
            echo 'no entraste';
            show_404();
        }
    }
}
