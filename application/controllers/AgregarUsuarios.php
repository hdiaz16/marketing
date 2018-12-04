<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgregarUsuarios extends CI_Controller {

	function __construct()
    {
    	parent::__construct();
        $this->load->model('Administrador_Model');
        $this->load->model('Campania_Model');
        $this->load->helper('form');
        date_default_timezone_set('America/Mexico_City');
    }


    public function index()
    {

        $data['campanas'] = $this->Campania_Model->getCampanias($this->session->userdata('perfil-actual')['perfil_id'], NULL);

        $data['user'] = $this->Administrador_Model->getEmpleados($this->session->userdata('perfil-actual')['sys_admin_id'], NULL );

        $data['userCamania'] = $this->Administrador_Model->getEmpleadosNoAsignados($this->session->userdata('perfil-actual')['sys_admin_id'], NULL);
    	
      	$this->load->view('core/header');
		$this->load->view('agregarUs', $data);
		$this->load->view('core/footer');


    }


    public function campaniaUser()
    {

        $data  = $this->Administrador_Model->asignarCampaniaEmpleado(
            trim($this->input->post('user')),
            trim($this->input->post('campania'))

        );


        if($data == false)
        {
           
            echo json_encode($data = array('error' => true, 'mensaje' =>'No se pudo registrar la Empresa'));

        }else{
          echo json_encode($data = array('error' => true, 'mensaje' =>'Registro completo.'));

        }
       
    }


    public function DesasignarEmpleado()
    {

        $data  = $this->Administrador_Model->desasignar(
            trim($this->input->post('id')


        ));


        if($data == false)
        {
           
            echo json_encode($data = array('error' => true, 'mensaje' =>'No se pudo registrar la desasignar'));

        }else{
          echo json_encode($data = array('error' => true, 'mensaje' =>'Se desasigno correctamente.'));

        }


        
    }













}


?>