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


		$result  = $this->IniciarSesion_Model->iniciarSesion($usuario, md5($contrasena));

		$rol = $this->IniciarSesion_Model->rolUsuario($result->id);
	

      	if ($result != false) 
        {



			if($result->activo == 1){
	             
	           
	           $sesion = array(
	                     
	                    'nombres' 		=> 	$result->nombres,
	                    'apellidos' 	=> 	$result->apellidos,
	                    'correo' 		=>	$result->correo,
	                    'contrasena' 	=>	$result->contrasenia,
	                    'rol'        	=>  $rol->rol_id,
	                    'estatus'       =>  TRUE
	           );

	           $this->session->set_userdata($sesion);

	           

	          
	           	if ($rol->rol_id != "") 
            	{

            		$result = array('error' => false, 'mensaje' => 'Bienvenido al Sistema de Marketing Digital');
              		echo json_encode($result);





            	}else{

            		$result = array('error' => true, 'mensaje' => 'No existe el rol para el usuario');
             		echo json_encode($result);
            	}




			}else{

				$result = array('error' => true, 'mensaje' => 'El usuario se encuentra inhabilitado, verificar su estado con el administrador');
            	echo json_encode($result);


			}

		}
		else
		{

          $result = array('error' => true, 'mensaje' => 'El usuario o la Contraseña no es el correcto');
          echo json_encode($result);

		}

   }




   public function registro (){

		   
           $data = array(
                     
                    '"nombres"' 		=> 	trim($this->input->post('usuario1')),
                    '"contrasenia"' 	=>	md5(trim($this->input->post('contrasena1'))),
                    '"fecha_create"'  	=>  date("Y/m/d H:m:s"),
                    '"fecha_update"'  	=>  date("Y/m/d H:m:s"),
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
