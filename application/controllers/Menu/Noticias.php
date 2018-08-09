<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias extends CI_Controller {

public function __construct()
{
    parent::__construct();
    if(session_status()==PHP_SESSION_NONE)
		{
		session_start();
		}
}

    public function index()
    {
        $this->load->view('plantilla/header');
		$this->load->view('Menu/Noticias/index');
		$this->load->view('plantilla/footer');
    }

}

/* End of file Noticias.php */
