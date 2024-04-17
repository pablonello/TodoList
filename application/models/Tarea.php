<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tarea extends CI_Model
{
    public $table = "Tarea";
    public $table_id = "id";

    public function obtenerTareas()
    {
        // Ejecutar la consulta para obtener todos los usuarios
        $query = $this->db->get('Tarea');

        // Verificar si hay resultados
        if ($query->num_rows() > 0) {
            // Retornar los resultados como un arreglo de objetos
            return $query->result();
        } else {
            // Si no hay resultados, retornar un arreglo vacío
            return array();
        }
    }
}
