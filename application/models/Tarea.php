<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tarea extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function obtenerTareas()
    {
        $this->db->order_by('fechaCreacion', 'desc'); // Ordenar por fecha ascendente
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

    // Método para insertar un producto
    public function insert($datos)
    {
        $this->db->insert('Tarea', $datos);
        return $this->db->insert_id(); // Devuelve el ID del producto insertado
    }

    // Método para insertar un producto
    public function eliminar($tareaId)
    {
        $this->db->where_in('id', $tareaId);
        if (!$this->db->delete('Tarea')) {
            return false; // Si hay un error, devuelve false
        }
        return true;
    }

    public function completarTarea($tareaId)
    {
        $data = array('estado' => 'completada'); // Reemplaza 'nuevo_estado' por el estado que desees asignar
        $this->db->where_in('id', $tareaId);
        if (!$this->db->update('Tarea', $data)) {
            return false; // Si hay un error, devuelve false
        }
        return true;
    }
}
