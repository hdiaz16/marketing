<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contenido extends CI_Controller {

	
	public function index()
	{
		$this->load->view('core/header');
		$this->load->view('contenido');
		$this->load->view('core/footer');
		
	}
}
