<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {

public function __construct()
{
    parent::__construct();
    $this->load->model('Pagina_PrincipalModels');
    if(session_status()==PHP_SESSION_NONE)
		{
		session_start();
		}
}

    public function Accesorios()
    {
        $num_anuncio_ca=$this->Pagina_PrincipalModels->Obtener_Anuncio_porcategoria();
		$anuncio=$this->Pagina_PrincipalModels->Obtener_Anuncio();
        $this->load->view('plantilla/header',array("Num_categoria_anuncios"=>$num_anuncio_ca));
		$this->load->view('Menu/Categoria/Accesorios',array("anuncios"=>$anuncio));
		$this->load->view('plantilla/footer');
    }
    public function Bicicleta()
    {
		$anuncio=$this->Pagina_PrincipalModels->Obtener_Anuncio();
	    $num_anuncio_ca=$this->Pagina_PrincipalModels->Obtener_Anuncio_porcategoria();
        $this->load->view('plantilla/header',array("Num_categoria_anuncios"=>$num_anuncio_ca));
		$this->load->view('Menu/Categoria/Bicicletas',array("anuncios"=>$anuncio));
		$this->load->view('plantilla/footer');
    }
}

/* End of file Categoria.php */
