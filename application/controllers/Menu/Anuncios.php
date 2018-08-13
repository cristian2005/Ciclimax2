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
		$temp=$this->Pagina_PrincipalModels->Obtener_Anuncio();
		$num_anuncio_ca=$this->Pagina_PrincipalModels->Obtener_Anuncio_porcategoria();
		$anuncio=null;
		for ($i=0; $i < count($temp["Anuncios"]); $i++) { 
			if($temp["Anuncios"][$i]->idanuncios==$idanuncios)
			{
				$anuncio=$temp["Anuncios"][$i];
			}
		}
		$imagenes=$this->Pagina_PrincipalModels->Obtener_imagen();
        $this->load->view('plantilla/header',array("Num_categoria_anuncios"=>$num_anuncio_ca));
		$this->load->view('Menu/Anuncios/Ver_Anuncios',array("anuncios"=>$anuncio,"imagenes"=>$imagenes));
		$this->load->view('plantilla/footer');
    }

}

/* End of file Anuncios.php */
