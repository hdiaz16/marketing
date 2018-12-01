<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RedSemantica extends CI_Controller {

	function __construct()
    {
    	parent::__construct();
        $this->load->model('Empresa_Model');
        $this->load->model('Campania_Model');
        $this->load->model('Red_Model');

        $this->load->helper('form');
        date_default_timezone_set('America/Mexico_City');
    }


    public function index()
    {
        $data['campanias'] = $this->Campania_Model->getCampanias($this->session->userdata['perfil-actual']['perfil_id']);
    	$this->load->view('core/header');
		$this->load->view('redSemantica', $data);
		$this->load->view('core/footer');
    }

    public function getRed($campaniaID){
        echo json_encode($this->Red_Model->getRed($campaniaID));
    }


}






?>