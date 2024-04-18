<?php
defined('BASEPATH') or exit('No direct script access allowed');


define('METHOD', 'AES-256-CBC');
define('SECRET_KEY', '$pablonellohotmail.com');
define('SECRET_IV', '101712');
class Usuario extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

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

    public function buscarPorId($usuarioId)
    {

        $this->db->select('usuarioNombre');
        $this->db->from('Usuario');
        $this->db->where('id ', $usuarioId);
        $consulta = $this->db->get();
        $resultado = $consulta->row();

        return $resultado;
    }

    public function obtenerUsuarios()
    {
        $query = $this->db->get('Usuario');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function insert($datos)
    {
        $this->db->insert('Usuario', $datos);
        return $this->db->insert_id();
    }

    public function eliminar($id)
    {
        $this->db->where_in('id', $id);
        if (!$this->db->delete('Usuario')) {
            return false;
        }
        return true;
    }
}
