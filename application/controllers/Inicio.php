<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('Root_Model');
    $this->load->model('Empresa_Model');
  }

	public function index(){

    if(!/**/$this->session->userdata('perfil-actual')/**/)
      redirect('login');
    else{
      $perfil = $this->session->userdata['perfil-actual'];
      $administradores = $this->Root_Model->getAdministradores($perfil['perfil_id']);
      $empresas = $this->Empresa_Model->getEmpresas($perfil['perfil_id']);
      #echo json_encode(['administradores' => $administradores, 'empresas' => $empresas]);
      $data = [ 
        'administradores' => $administradores ? $administradores : false,
        'empresas' => $empresas ? $empresas : false,
      ];

  		$this->load->view('core/header');
  		$this->load->view('inicio', $data);
  		$this->load->view('core/footer');
    }

	}

}














?>