<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EventosModels extends CI_Model {

    public function Obtener_Eventos()
    {
        return $this->db->get('eventos')->result_object();
    }
    public function Registra_Eventos($ruta)
    {
        $this->db->insert('eventos',array_merge($_POST,array("imagen"=>$ruta)));
        echo "<script>window.location='".base_url('Menu/Eventos')."';</script>";
    }
}

/* End of file Eventos.php */
