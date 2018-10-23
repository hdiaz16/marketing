<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campanas extends CI_Controller {

	function __construct()
    {
    	parent::__construct();
        $this->load->model('Dashboard_Model');
        $this->load->helper('form');
        date_default_timezone_set('America/Mexico_City');
    }

	
	public function index()
	{

		if($this->session->estatus == TRUE){

			$data['campanas'] = $this->Dashboard_Model->selectCampanas();


			$this->load->view('header');
			$this->load->view('campanas',$data);
			$this->load->view('footer');

		}else{

			 echo  "<script type='text/javascript'>alert('Por favor inice session primero.');window.location.href='".base_url('index.php/Login/index')."'</script>";
		}
	}



	public function addCampanas()
    {


    	if($this->session->estatus == TRUE)
    	{


              $data = array(
                          '"community_manager_id"'   => $this->session->id,
              			  '"nombre"' 		         => trim($this->input->post('nombre')),
              			  '"objetivos"' 	         => trim($this->input->post('objetivo')),
                          '"propositos"'             => trim($this->input->post('proposito')),
              			  '"fecha_inicio"'           => trim($this->input->post('fechaIn')),
              			  '"fecha_cierre"'           => trim($this->input->post('fechaFn')),
                          '"_create"'                => date("Y/m/d H:m:s"),
                          '"_update"'                => date("Y/m/d H:m:s")

              					);

              $this->Dashboard_Model->addCampanas($data);

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
