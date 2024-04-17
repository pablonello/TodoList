<?php
defined('BASEPATH') or exit('No direct script access allowed');


define('METHOD', 'AES-256-CBC');
define('SECRET_KEY', '$pablonellohotmail.com');
define('SECRET_IV', '101712');
class Usuario extends CI_Model
{
    public $table = "Usuario";
    public $table_id = "id";


    public static function encryption($string)
    {
        $output = FALSE;
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);
        $output = openssl_encrypt($string, METHOD, $key, 0, $iv);
        $output = base64_encode($output);
        return $output;
    }

    public function usuario_por_nombre_contrasena($username, $pswencri)
    {

        $this->db->select('*');
        $this->db->from('Usuario');
        $this->db->where('usuarioNombre', $username);
        $this->db->where('usuarioPassword', $pswencri);
        $consulta = $this->db->get();

        $resultado = $consulta->row();

        return $resultado;
    }

    public function obtenerUsuarios()
    {
        // Ejecutar la consulta para obtener todos los usuarios
        $query = $this->db->get('Usuario');

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
