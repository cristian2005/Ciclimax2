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
		$this->load->view('plantilla/header');
		$this->load->view('Pagina_Principal');
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
		$this->load->view('plantilla/header');
		$this->load->view('PublicarAnuncio');
		$this->load->view('plantilla/footer');
	}
}
