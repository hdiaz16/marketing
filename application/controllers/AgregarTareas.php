<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgregarTareas extends CI_Controller {

	function __construct()
    {
    	parent::__construct();
        $this->load->model('Dashboard_Model');
        $this->load->helper('form');
        date_default_timezone_set('America/Mexico_City');
    }



    public function index()
    {

    	

    	$this->load->view('header');
		$this->load->view('agregarTareas');
		$this->load->view('footer');
    }

}

?>