<?php

defined('BASEPATH') or exit('No direct script access allowed');

class homeController extends CI_Controller
{
    public function index()
    {
        if (!empty($this->session->userdata('usuarioNombre'))) {
            $view["title"] = "Inicio del sistemas";

            $this->parser->parse("admin/home", $view);
        } else {
            echo 'no entraste';
            show_404();
        }
    }
}
