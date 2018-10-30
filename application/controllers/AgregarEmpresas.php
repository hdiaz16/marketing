<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgregarEmpresas extends CI_Controller {

	function __construct()
    {
    	parent::__construct();
        $this->load->model('Dashboard_Model');
        $this->load->helper('form');
        date_default_timezone_set('America/Mexico_City');
    }



    public function index()
    {

    	$data['Empresa'] = $this->Dashboard_Model->selectEmpresa();

    	$this->load->view('header');
		$this->load->view('agregarEmpresas', $data);
		$this->load->view('footer');
    }


    public function addEmpresa()
	{
		
		   
           $data = array(
                     
                    '"razon_social"' 	=> 	trim($this->input->post('razon')),
                    '"sys_admin_id"'    =>	trim($this->session->userdata['perfil-actual']['sys_admin_id']),
                    '"contacto"'       	=>	trim($this->input->post('contacto')),
                    '"_create"'  		=>  date("Y/m/d H:m:s"),
                    '"_update"'  		=>  date("Y/m/d H:m:s")

           );

           $this->Dashboard_Model->addEmpresa($data);

        if($data == false)
        {
           
            echo json_encode($data = array('error' => true, 'mensaje' =>'No se pudo registrar la Empresa'));

    	}else{
          echo json_encode($data = array('error' => true, 'mensaje' =>'Registro completo.'));

    	}

	}

}


?>    