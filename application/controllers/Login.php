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

		$correo 	= $this->input->post("correo");
		$contrasenia = $this->input->post("contrasenia");

		$usuarioDB  = $this->Usuario_Model->verificarUsuario($correo, $contrasenia);
    echo json_encode($usuarioDB);
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
      echo json_encode($this->Administrador_Model->eliminarUsuario(13));
    }



    public function cambiarPerfil($rolID){

      foreach ($this->session->userdata['perfiles'] as $key => $perfil) {
        # code...
        
        if($perfil['rol_id'] == $rolID){
          $this->session->set_userdata('perfil-actual', $perfil);
        }
      }
        redirect('inicio');
    }
    
   public function registro (){

		   
           $data = array(
                     

                    '"nombres"' 		=> 	trim($this->input->post('nombre')),
                    '"apellidos"' 	=>	trim($this->input->post('apellido')),
                    '"correo"' 			=> 	trim($this->input->post('correo1')),
                    '"contrasenia"' =>	trim($this->input->post('contrasena1')),
                    '"_create"'  		=>  date("Y/m/d H:m:s"),
                    '"_update"'  		=>  date("Y/m/d H:m:s"),
                    '"activo"'			=>  1

           );

           $dato=$this->IniciarSesion_Model->addUsuario($data);
        

           $data1 = array(
                     
                    '"usuario_id"'    => $dato,
                    '"rol_id"'        =>  1,
                    '"sys_admin_id"'  =>  1,
                    '"_create"'       =>  date("Y/m/d H:m:s"),
                    '"_update"'       =>  date("Y/m/d H:m:s"),

           );

           $this->IniciarSesion_Model->addUsuario1($data1);

        if($data !=  "")
        {

        	$data = array('error' => true, 'mensaje' =>'Registro completo.');
            echo json_encode($data);

           
            

    	}else
    	{
           

           $data = array('error' => false, 'mensaje' =>'No se pudo registrar el usuario');
            echo json_encode($data);

    	}

		

   }



	



}
