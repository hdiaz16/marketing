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

		$correo 	= $this->input->post("correo");
		$contrasena = $this->input->post("contrasena");


		$result  = $this->IniciarSesion_Model->iniciarSesion($correo, $contrasena);

		$rol = $this->IniciarSesion_Model->rolUsuario($result->id);
	

      	if ($result != false) 
        {



			if($result->activo == 1){
	             
	           
	           $sesion = array(
	                    'id'            =>  $result->id,
	                    'nombres' 		=> 	$result->nombres,
	                    'apellidos' 	=> 	$result->apellidos,
	                    'correo' 		=>	$result->correo,
	                    'contrasena' 	=>	$result->contrasenia,
	                    'rol'        	=>  $rol->rol_id,
	                    'rol_nom'       =>  $rol->nombre,
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
