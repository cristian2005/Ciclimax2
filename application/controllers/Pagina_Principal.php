<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina_Principal extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if(session_status()==PHP_SESSION_NONE)
		{
		   session_start();
		}
		$this->load->model('Pagina_PrincipalModels');
		$this->Pagina_PrincipalModels->Middleware('vencimiento');
	}
		
	public function index()
	{

		if($_GET)
		{
		 $anun=$this->Pagina_PrincipalModels->Obtener_Anuncio($_GET['buscador']);
		echo $html= $this->load->view('Menu/Inicio/Obtener_anuncios',array("anuncios"=>$anun),true);
		exit();
		}
		$num_anuncio_ca=$this->Pagina_PrincipalModels->Obtener_Anuncio_porcategoria();
		$anuncio=$this->Pagina_PrincipalModels->Obtener_Anuncio();
		$this->load->view('plantilla/header',array("Num_categoria_anuncios"=>$num_anuncio_ca));

		$this->load->view('Pagina_Principal',array("anuncios"=>$anuncio));
		$this->load->view('plantilla/cargando',array("cargando"=>"Buscando anuncio..."));
		$this->load->view('plantilla/paginacion');
		$this->load->view('plantilla/footer');
		
	}
	public function login()
	{
		extract($_POST);
		$this->Pagina_PrincipalModels->IniciarSesion($email,$clave);
		exit();
	}
	public function Registro()
	{
		$num_anuncio_ca=$this->Pagina_PrincipalModels->Obtener_Anuncio_porcategoria();
		if(isset($_POST["Correo"]))
		{
			$this->Pagina_PrincipalModels->Registro();
			exit();
		}
		$this->load->view('plantilla/header',array("Num_categoria_anuncios"=>$num_anuncio_ca));
		$this->load->view('registro');
		$this->load->view('plantilla/footer');
	}
	public function Cerrar_Sesion()
	{
      session_destroy();
      echo "<script>window.location='".base_url('Pagina_Principal')."';</script>";
	}
	public function Publicar_Anuncio()
	{
		if($_POST)
		{
			print_r($_POST);
			$this->Pagina_PrincipalModels->InsertarAnuncios();
			exit();
		}
		else if($_GET)
		{
			$subca=$this->Pagina_PrincipalModels->Obtener_Sub_categoria($_GET["categoria"]);
			echo json_encode($subca);
			exit();
		}
		$num_anuncio_ca=$this->Pagina_PrincipalModels->Obtener_Anuncio_porcategoria();
		$this->load->view('plantilla/header',array("Num_categoria_anuncios"=>$num_anuncio_ca));
		$this->load->view('PublicarAnuncio');
		$this->load->view('plantilla/cargando',array("cargando"=>"Publicando anuncio..."));
		$this->load->view('plantilla/footer');
	}
	public function upload_imagen()
	{
		$ruta='./assets/img/img_anuncios/';
		$ruta=$ruta.basename($_FILES['file']['name']);
		move_uploaded_file($_FILES['file']['tmp_name'],$ruta);
		$this->Pagina_PrincipalModels->GuardarImagen($ruta);
	}
}
