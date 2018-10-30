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

		
           
      $data['CM'] = $this->Dashboard_Model->selectCM();



			$this->load->view('core/header');
			$this->load->view('agregarCM',$data);
			$this->load->view('core/footer');

	
	}


	public function addCM()
	{
		
		   
           $data = array(
                     
                    '"nombres"' 		=> 	trim($this->input->post('nombre')),
                    '"apellidos"'   =>	trim($this->input->post('apellido')),
                    '"correo"'      =>	trim($this->input->post('correo')),
                    '"contrasenia"' =>	trim($this->input->post('contrasena')),
                    '"_create"'  		=>  date("Y/m/d H:m:s"),
                    '"_update"'  		=>  date("Y/m/d H:m:s"),
                    '"activo"'			=>  1

           );

           $dato = $this->Dashboard_Model->addCM($data);


           $data1 = array(
                     
                    '"usuario_id"'    => $dato ,
                    '"rol_id"'        =>  2,
                    '"sys_admin_id"'  =>  1,
                    '"_create"'       =>  date("Y/m/d H:m:s"),
                    '"_update"'       =>  date("Y/m/d H:m:s"),
                    

           );

           $this->Dashboard_Model->addCMPerfil($data1);




        if($data == false)
        {
           
            echo json_encode($data = array('error' => true, 'mensaje' =>'No se pudo registrar el Community Manager'));

    	  }
        else
        {

          echo json_encode($data = array('error' => true, 'mensaje' =>'Registro completo.'));

    	 }

	}
}
