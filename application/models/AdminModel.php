<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {
    
    public function Obtener_usu()
    {
    	return $this->db->select('*')->get('usuarios')->result_array();
    }

     public function Admin($id=null)
    {
        $result = $this->db->select('Tipo_usuarios')->where('idusuarios', $id)->get('usuarios')->result_array(); 

        $cambio = ($result[0]['Tipo_usuarios'] == "admin") ? 'user' : 'admin' ;
    	$this->db->set('Tipo_usuarios', $cambio);
        $this->db->where('idusuarios', $id);
        $this->db->update('usuarios'); 
    }

    public function insertar_post($tabla, $POST)
    {
        return $this->db->insert($tabla, $POST);   
    }

    public function obtenerAll($tabla)
    { 
        return $this->db->select('*')->get($tabla)->result_array();
    }

}
        
