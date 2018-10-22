<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


  	function __construct()
    {
    	parent::__construct();
        $this->load->model('IniciarSesion_Model');
        $this->load->model('Usuario_Model');
        $this->load->model('Root_Model');
        $this->load->model('Empresa_Model');
        $this->load->model('Administrador_Model');
        $this->load->model('Campania_Model');
        $this->load->helper(['form', 'url']);
        date_default_timezone_set('America/Mexico_City');
    }

	
	public function index()
	{
  if(/**/$this->session->userdata('perfil-actual')/**/)
    redirect('inicio');
  else
		$this->load->view('login');

	}


	 	public function iniciarSesion (){

		$usuario 	= $this->input->post("correo");
		$contrasenia = $this->input->post("contrasenia");

		$usuarioDB  = $this->Usuario_Model->verificarUsuario($usuario, $contrasenia);

    if(!$usuarioDB)
      redirect('login');
    else{
      $queryPerfiles = $this->Usuario_Model->obtenerPerfiles($usuarioDB['id']);
      try {

        $this->session->set_userdata('usuario', $usuarioDB);
        $this->session->set_userdata('perfiles', $queryPerfiles);
        $this->session->set_userdata('perfil-actual', $queryPerfiles[0]);
        redirect('inicio');
      } catch (Exception $e) {
        echo json_encode(['place' =>'login/iniciarSesion', 'error' => $e]);
      }

    }
    
   }

    
    public function test(){
      $objetivos = ["dominar al mundo", "maximizar la publicidad online"];
      $propositos = ["aumentar el engagement en fb"];
      echo json_encode($this->Campania_Model->editarCampania(1, "La coca negroloca", $objetivos, $propositos, date('Y-m-d H:i'), date('Y-m-d H:i')));
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
