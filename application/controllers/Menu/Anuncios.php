<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Anuncios extends CI_Controller {

public function __construct()
{
    parent::__construct();
       $this->load->model('Pagina_PrincipalModels');
		if(session_status()==PHP_SESSION_NONE)
		{
		session_start();
		}
}
    public function VerAnuncio($idanuncios)
    {
		$anuncio=$this->Pagina_PrincipalModels->Obtener_Anuncio();
        $this->load->view('plantilla/header');
		$this->load->view('Menu/Anuncios/Ver_Anuncios',array("anuncios"=>$anuncio));
		$this->load->view('plantilla/footer');
    }

}

/* End of file Anuncios.php */
