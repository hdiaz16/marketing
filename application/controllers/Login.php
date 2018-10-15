<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


  	function __construct()
    {
    	parent::__construct();
        $this->load->model('IniciarSesion_Model');
        $this->load->helper('form');
        date_default_timezone_set('America/Mexico_City');
    }

	
	public function index()
	{

		$this->load->view('login');

	}


	 	public function iniciarSesion (){

		$usuario 	= $this->input->post("usuario");
		$contrasena = $this->input->post("contrasena");


		$result  = $this->IniciarSesion_Model->iniciarSesion($usuario, $contrasena);
    
    
    redirect('/inicio');

   }




   public function registro (){

		   
           $data = array(
                     
                    '"nombres"' 		=> 	trim($this->input->post('usuario1')),
                    '"contrasenia"' 	=>	trim($this->input->post('contrasena1')),
                    '"_create"'  		=>  date("Y/m/d H:m:s"),
                    '"_update"'  		=>  date("Y/m/d H:m:s"),
                    '"activo"'			=>  1

           );

           $this->IniciarSesion_Model->addUsuario($data);

        if($data == false)
        {
           
            echo json_encode($data = array('error' => true, 'mensaje' =>'No se pudo registrar el usuario'));

    	}else{
          echo json_encode($data = array('error' => true, 'mensaje' =>'Registro completo.'));

    	}

		

   }



	



}
