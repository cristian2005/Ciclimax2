<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Eventos extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pagina_PrincipalModels');
        $this->load->model('Menu/EventosModels');
        if(session_status()==PHP_SESSION_NONE)
		{
		session_start();
		}
    }
    public function index()
    {
        $num_anuncio_ca=$this->Pagina_PrincipalModels->Obtener_Anuncio_porcategoria();
        $eventos=$this->EventosModels->Obtener_Eventos();
        $this->load->view('plantilla/header',array("Num_categoria_anuncios"=>$num_anuncio_ca));
        $this->load->view('Menu/Eventos/Index',array("Eventos"=>$eventos));
        $this->load->view('plantilla/footer');
    }
    public function Agregar_Eventos()
    {
        if ($_FILES['imagen']['error']==0) {
            $ruta= './assets/img/img_eventos/'.$_FILES['imagen']["name"];
            move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta);
           $this->EventosModels->Registra_Eventos($ruta);
            exit();
        }
    }
  
}

/* End of file Eventos.php */
