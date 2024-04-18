<?php

use function PHPUnit\Framework\returnSelf;

defined('BASEPATH') or exit('No direct script access allowed');

class TareaController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (!empty($this->session->userdata('usuarioNombre'))) {

            $this->load->model('Tarea');

            $listTareas = $this->Tarea->obtenerTareas();
            $view["title"] = "Lista de Tareas";
            $data['scripts'] = '<script src="' . base_url('assets/js/tareas.js') . '"></script>';
            $data['titulo'] = $data['descripcion'] = $data['fechaFin'] = $data['estado'] = $data['usuarioId'] = '';
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


    public function guardarTarea()
    {
        // Obtener los datos del formulario
        $tarea = $this->input->post();

        if (!empty($tarea)) {

            $save = array(
                'titulo' => $tarea['titulo'],
                'descripcion' => $tarea['descripcion'],
                'fechaCreacion' => date('Y-m-d H:i:s'),
                'fechaFin' => $tarea['fechaFin'],
                'estado' => $tarea['estado'],
                'usuarioId' => $tarea['usuarioId']
            );

            $this->load->model('Tarea');
            $idtarea = $this->Tarea->insert($save);

            if ($idtarea > 0) {
                $response = array(
                    'success' => true,
                    'message' => 'Tarea guardada exitosamente.'
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

    public function eliminarTarea()
    {
        $tareaId = $this->input->post('ids');
        if (!empty($tareaId)) {
            $this->load->model('Tarea');
            $resultado = $this->Tarea->eliminar($tareaId);
            if ($resultado) {
                $response = array(
                    'success' => true,
                    'message' => 'Tarea(s) eliminada(s) exitosamente.'
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Error al eliminar la(s) tarea(s).'
                );
            }
        } else {
            $response = array(
                'success' => false,
                'message' => 'No se proporcionaron ID de tarea(s) para eliminar.'
            );
        }
        echo json_encode($response);
    }


    public function completarTarea()
    {
        $tareaId = $this->input->post('ids');
        if (!empty($tareaId)) {
            $this->load->model('Tarea');
            $resultado = $this->Tarea->completarTarea($tareaId);
            if ($resultado) {
                $response = array(
                    'success' => true,
                    'message' => 'Estado de la(s) tarea(s) actualizado correctamente.'
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Error al actualizar el estado de la(s) tarea(s).'
                );
            }
        } else {
            $response = array(
                'success' => false,
                'message' => 'No se proporcionaron ID de tarea(s) para actualizar el estado.'
            );
        }
        echo json_encode($response);
    }
}
