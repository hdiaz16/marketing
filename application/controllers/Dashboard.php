<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	function __construct()
    {
    	parent::__construct();
        $this->load->model('Dashboard_Model');
        $this->load->helper('form');
        date_default_timezone_set('America/Mexico_City');
    }

	
	public function index()
	{
     
     

     	$this->load->view('core/header');
		$this->load->view('dashboard');
		$this->load->view('core/footer');

     
        
	}



  

  


	public function cerrarSesion()
 	{
	  $this->session->sess_destroy();
	 
	  redirect('/login');

 	}

}

?>
