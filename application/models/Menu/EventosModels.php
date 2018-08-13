<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EventosModels extends CI_Model {

    public function Obtener_Eventos()
    {
        return $this->db->get('eventos')->result_object();
    }
}

/* End of file Eventos.php */
