<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campanas extends CI_Controller {

	function __construct()
    {
    	parent::__construct();
        $this->load->model('Campania_Model');
        $this->load->helper('form');
        date_default_timezone_set('America/Mexico_City');
    }

	
	public function index()
	{

		

			$data['campanas'] = $this->Campania_Model->getCampanias($this->session->userdata['perfil-actual']['id']);


			$this->load->view('header');
			$this->load->view('campanas',$data);
			$this->load->view('footer');


	}



	public function addCampanas()
    {


    	if($this->session->userdata['perfil-actual']['id'] != "")
    	{


              $data = array(
                      '"community_manager_id"'   => $this->session->userdata['perfil-actual']['id'],
              			  '"nombre"' 		             => trim($this->input->post('nombre')),
              			  '"objetivos"' 	           => trim($this->input->post('objetivo')),
                      '"propositos"'             => trim($this->input->post('proposito')),
              			  '"fecha_inicio"'           => trim($this->input->post('fechaIn')),
              			  '"fecha_cierre"'           => trim($this->input->post('fechaFn')),
                      '"_create"'                => date("Y/m/d H:m:s"),
                      '"_update"'                => date("Y/m/d H:m:s")

              					);

              $this->Campania_Model->registrarCampania($data);

              	if($data == false)
        	  	{
           
              		echo json_encode($data = array('error' => true, 'mensaje' =>'No se pudo registrar la Campaña'));

    		  	}else{
          			echo json_encode($data = array('error' => false, 'mensaje' =>'La Campaña se registro con exito.'));

    			}

     		

     	}
     	else{
        
        	echo  "<script type='text/javascript'>alert('Por favor inice session primero.');window.location.href='".base_url('index.php/Login/index')."'</script>";

     	}
    
    }




















}
