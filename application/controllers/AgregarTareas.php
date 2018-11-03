<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgregarTareas extends CI_Controller {

	function __construct()
    {
    	parent::__construct();
        $this->load->model('Tarea_Model');
        $this->load->helper('form');
        date_default_timezone_set('America/Mexico_City');
    }



    public function index()
    {
        

    	$data['tarea'] = $this->Tarea_Model->getTareas( $this->session->userdata['perfil-actual']['perfil_id'], null);


    	$this->load->view('core/header');
		$this->load->view('agregarTareas', $data);
		$this->load->view('core/footer');
    }

}

?>