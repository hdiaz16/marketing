<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgregarCM extends CI_Controller {

	function __construct()
    {
    	parent::__construct();
        $this->load->model('Administrador_Model');
        $this->load->model('Dashboard_Model');
        $this->load->helper('form');
        date_default_timezone_set('America/Mexico_City');
    }

	
	public function index()
	{

		 
           
      $data['CM'] = $this->Administrador_Model->getUsuarios($this->session->userdata('perfil-actual')['perfil_id'] );

      $data['rol'] = $this->Administrador_Model->roles();

			$this->load->view('core/header');
			$this->load->view('agregarCM',$data);
			$this->load->view('core/footer');

	
	}


	public function registrarUsuario()
	{
		
		   

      $data = $this->Administrador_Model->registrarUsuario(
        trim($this->session->userdata('perfil-actual')['perfil_id']),
        trim($this->input->post('correo')),
        $this->input->post('rol'),
        trim($this->input->post('nombre')),
        trim($this->input->post('contrasena')),
        trim($this->input->post('apellido'))

      );






        if($data == false)
        {
           
            echo json_encode($data = array('error' => true, 'mensaje' =>'No se pudo registrar el Community Manager'));

    	  }
        else
        {

          echo json_encode($data = array('error' => true, 'mensaje' =>'Registro completo.'));

    	 }

	}



  public function deleteCM()
  {  

      $id =  $this->input->post('id');

      $data = $this->Administrador_Model->eliminarUsuario($id);

      if($data){

           echo json_encode($data = array('error' => false, 'mensaje' =>'Se elimino correctamente'));

      }else{
          echo json_encode($data = array('error' => true, 'mensaje' =>'No se pudo eliminar'));

      }



  }



}
