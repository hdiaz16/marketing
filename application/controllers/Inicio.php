<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {


	public function index(){

    if(!/**/$this->session->userdata('perfil-actual')/**/)
      redirect('login');
    else{
      $perfil = $this->session->userdata['perfil-actual'];
  		$this->load->view('core/header');
  		$this->load->view('inicio');
  		$this->load->view('core/footer');
    }

	}











}














?>