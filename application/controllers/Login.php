<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login');
	}


	public function inicioSesion()
	{


		if ($_POST) 
	    {
	      $usuario = $this->input->post('usuario');
	      $contrasena = $this->input->post('contrasena');

	      
	 

	        $result = $this->Inicio_model->iniciarSesion($usuario,md5($contrasena));



	      

	        if ($result != false) 
	        {

	          if ($result->activo == 1) 
	          {
	            $sesion = array(
	                              'idUsuario'     => $result->idUsuario,
	                              'idRol'         => $result->idRol,
	                              'municipio'     => $result->municipio,
	                              'estatus'       => TRUE,
	                              'nombreCliente' => $result->primer_nombre." ".$result->segundo_nombre." ".$result->ap_paterno." ".$result->ap_materno,
	                              'telefono'      => $result->telefono,
	                              'correo'        => $result->correo,
	                              'domicilio'     => $result->direccion.", #".$result->numero_Ex." ".$result->municipio.",".$result->ciudad." Col.".$result->colonia,
	                              'cp'            => $result->cp,
	                              'usuario'       => $result->usuarioLogin

	                            );

	            $this->session->set_userdata($sesion);
	            
	            if ($result->idRol != "") 
	            {
	              //header("Location: ".base_url('index.php/Administrador'));
	              $resultado = array('error' => false, 'mensaje' => 'Bienvenido al Sistema de Marketing Digital');
	              echo json_encode($resultado);

	              $datos = array(
	                              'hora'          => date('H:i:s'),
	                              'fecha'         => date('Y/m/d'),
	                              'ip'            => null,
	                              'id_usuario'    => $result->idUsuario,
	                              'accion'        => 13
	                            );

	               $res = $this->Inicio_model->agregarBitacoraLogueo($datos);

	              if ($res==false) 
	              {
	                  echo json_encode($resultado = array('error' => true, 'mensaje' => 'Hubo un problema al agregar en la bitacora'));
	              }



	            }
	            else
	            {
	             //echo "<script>alert('No existe el rol para el sistema');window.location.href='".base_url()."';</script>";
	             $resultado = array('error' => true, 'mensaje' => 'No existe el rol para el sistema');
	             echo json_encode ($resultado);
	            }
	          }
	          else
	          {
	            $resultado = array('error' => true, 'mensaje' => 'El usuario se encuentra inhabilitado, verificar su estado con el administrador');
	            echo json_encode ($resultado);
	          }
	        }
	        else
	        {
	          $resultado = array('error' => true, 'mensaje' => 'El usuario o la Contraseña no es el correcto');
	          echo json_encode ($resultado);
	        }
	      
	    }
	    else
	    {
	     $resultado = array('error' => true, 'mensaje' => 'Hubo un error al obtener los datos de usuario y contraseña');
	     echo json_encode ($resultado);


	    }
	}




}
