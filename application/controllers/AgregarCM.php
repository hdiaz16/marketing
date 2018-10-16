<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgregarCM extends CI_Controller {

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
           
           $data['CM'] = $this->Dashboard_Model->selectCM();
			

			$this->load->view('header');
			$this->load->view('agregarCM',$data);
			$this->load->view('footer');

		}else{

			 echo  "<script type='text/javascript'>alert('Por favor inice session primero.');window.location.href='".base_url('index.php/Login/index')."'</script>";
		}
	}


	public function addCM()
	{
		
		   
           $data = array(
                     
                    '"nombres"' 		=> 	trim($this->input->post('nombre')),
                    '"apellidos"'       =>	trim($this->input->post('apellido')),
                    '"correo"'       	=>	trim($this->input->post('correo')),
                    '"contrasenia"' 	=>	trim($this->input->post('contrasena')),
                    '"_create"'  		=>  date("Y/m/d H:m:s"),
                    '"_update"'  		=>  date("Y/m/d H:m:s"),
                    '"activo"'			=>  1

           );

           $this->Dashboard_Model->addCM($data);

        if($data == false)
        {
           
            echo json_encode($data = array('error' => true, 'mensaje' =>'No se pudo registrar el Community Manager'));

    	}else{
          echo json_encode($data = array('error' => true, 'mensaje' =>'Registro completo.'));

    	}

	}
}
