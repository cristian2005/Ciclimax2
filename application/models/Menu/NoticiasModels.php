<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class NoticiasModels extends CI_Model {

    public function Registra_Noticias($ruta)
    {
        $this->db->insert('noticias',array_merge($_POST,array("imagen"=>$ruta,'Id_usuarios'=>$_SESSION["idusuarios"])));
        echo "<script>window.location='".base_url('Menu/Noticias')."';</script>";
    }
    public function Obtener_Noticias()
    {
        return $this->db->get('noticias')->result_object();
    }
}

/* End of file NoticiasModels.php */
