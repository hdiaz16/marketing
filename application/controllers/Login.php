<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


  	function __construct()
    {
    	parent::__construct();
        $this->load->model('IniciarSesion_Model');
        $this->load->helper(['form', 'url']);
        date_default_timezone_set('America/Mexico_City');
    }

	
	public function index()
	{

		$this->load->view('login');

	}


	 	public function iniciarSesion (){

		$usuario 	= $this->input->post("correo");
		$contrasena = $this->input->post("contrasenia");

    log_message('error', 'controlador. correo: '.$usuario.' contrasenia: '.$contrasena);
		$result  = $this->IniciarSesion_Model->iniciarSesion($usuario, $contrasena);
    
    if(isset($result[0])){
      $this->session->set_userdata(['usuario' => $result[0]]);
      redirect('/inicio');
    }else{
      redirect('/login');
    }
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
