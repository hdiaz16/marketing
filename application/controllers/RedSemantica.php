<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RedSemantica extends CI_Controller {

	function __construct()
    {
    	parent::__construct();
        $this->load->model('Dashboard_Model');
        $this->load->model('Empresa_Model');

        $this->load->helper('form');
        date_default_timezone_set('America/Mexico_City');
    }


    public function index()
    {

    

    	$this->load->view('core/header');
		$this->load->view('redSemantica');
		$this->load->view('core/footer');
    }



}






?>