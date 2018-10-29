<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


  	function __construct()
    {
    	parent::__construct();
        $this->load->model('Usuario_Model');
        $this->load->model('Root_Model');
        $this->load->model('Red_Model');
        $this->load->model('Empresa_Model');
        $this->load->model('Administrador_Model');
        $this->load->model('Campania_Model');
        $this->load->model('Tarea_Model');
        $this->load->model('Subtarea_Model');
        $this->load->model('Publicacion_Model');
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
      $red = ['id' => 1, 'nombre'=> 'nodo padre 1.1', 'hijos' => []];
      $condicionesAceptacion = ['condicion 3','minimo 100 likes', 'menor numero de comentarios negativos'];
      $requisitos = ['imagen referente a una hamburguesa en el campo', 'requisito 2', 'requisito 3'];
      $contenido = ['link' => "link@link2", 'titulo' => "1publicacion2", 'fotourl' => ["url1.com", "url2.org"], 'videourl' => "video.com", 'contenido' => "contenido omg", 'fechapublicacion' => "2018-10-30 17:30"];
      echo json_encode($this->Publicacion_Model->getPublicaciones(13,1, true));
    }



    public function cambiarPerfil($rolID){

      foreach ($this->session->userdata['perfiles'] as $key => $perfil) {
        # code...
        if($perfil['rol_id'] == $rolID){
          $this->session->set_userdata('perfil-actual', $perfil);
          return true;
        }
      }

      return false;
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
