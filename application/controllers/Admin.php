<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->view("admin/header");
        $contenedor['pagina_actual'] = "Noticias";
        $this->load->view("admin/menu", $contenedor);
        $this->load->view("admin/noticias");
        $this->load->view("admin/footer");
    }

        function eventos() {
        $this->load->view("admin/header");
        $contenedor['pagina_actual'] = "Eventos";
        $this->load->view("admin/menu", $contenedor);
        $this->load->view("admin/eventos");
        $this->load->view("admin/footer");
    }

        function banners() {
        $this->load->view("admin/header");
        $contenedor['pagina_actual'] = "Banners";
        $this->load->view("admin/menu", $contenedor);

        $this->load->view("admin/footer");
    }

        function usuarios($id = null) {
        $this->load->view("admin/header");
        $contenedor['pagina_actual'] = "Usuarios";
        $this->load->view("admin/menu", $contenedor);
        $this->load->model('AdminModel');
        if ($id<>null) {
        	$this->AdminModel->Admin($id);
        }
        $contenedor['usuarios'] = $this->AdminModel->Obtener_usu();

        $this->load->view("admin/usuarios",$contenedor);
        $this->load->view("admin/footer");
    }

}
        
