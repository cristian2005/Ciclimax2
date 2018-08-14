<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->view("admin/header");
        $contenedor['pagina_actual'] = "Anuncios";
        $this->load->view("admin/menu", $contenedor);

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

        function usuarios() {
        $this->load->view("admin/header");
        $contenedor['pagina_actual'] = "Usuarios";
        $this->load->view("admin/menu", $contenedor);

        $this->load->view("admin/footer");
    }

}
        
