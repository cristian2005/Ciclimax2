<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina_Principal extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pagina_PrincipalModels');
		if(session_status()==PHP_SESSION_NONE)
		{
		session_start();
		}
	}
	
	public function index()
	{
		$anuncio=$this->Pagina_PrincipalModels->Obtener_Anuncio();
		$this->load->view('plantilla/header');
		$this->load->view('Pagina_Principal',array("anuncios"=>$anuncio));
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
		if(isset($_POST["Correo"]))
		{
			$this->Pagina_PrincipalModels->Registro();
			exit();
		}
		$this->load->view('plantilla/header');
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
			$this->Pagina_PrincipalModels->InsertarAnuncios();
			exit();
		}
		else if($_GET)
		{
			$subca=$this->Pagina_PrincipalModels->Obtener_Sub_categoria($_GET["categoria"]);
			echo json_encode($subca);
			exit();
		}
		
		$this->load->view('plantilla/header');
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
