<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgregarEmpresas extends CI_Controller {

	function __construct()
    {
    	parent::__construct();
        $this->load->model('Dashboard_Model');
        $this->load->model('Empresa_Model');
        $this->load->model('Root_Model');
        $this->load->helper('form');
        date_default_timezone_set('America/Mexico_City');
    }



    public function index()
    {

      $data['adminsNoAsignados'] = $this->Root_Model->getAdministradoresNoAsignados($this->session->userdata['perfil-actual']['perfil_id']);
      $data['empresas'] = $this->Empresa_Model->getEmpresas($this->session->userdata['perfil-actual']['perfil_id']);
    	$data['empresasNoAsignadas'] = $this->Empresa_Model->getEmpresasNoAsignadas($this->session->userdata['perfil-actual']['perfil_id']);

    $this->load->view('core/header');
		$this->load->view('agregarEmpresas', $data);
		$this->load->view('core/footer');
    }


    public function addEmpresa(){
		
      $razonSocial = trim($this->input->post('razon'));
      $adminID = trim($this->session->userdata['perfil-actual']['sys_admin_id']);
      $contacto = json_encode($this->input->post('contacto'));
      
      $nuevaEmpresa = $this->Empresa_Model->registrarEmpresa($adminID, $razonSocial, $contacto);

      if($nuevaEmpresa){
      echo json_encode(['error' => false, 'mensaje' => 'Registro completo']);
      }else{
      echo json_encode(['error' => true, 'mensaje' => 'No se pudo registrar administrador']);
      }

	}


    public function deleteEmpresa()
    {

      $id =  $this->input->post('id');

      $data = $this->Empresa_Model->eliminarEmpresa($id);

      if($data){

           echo json_encode($data = array('error' => false, 'mensaje' =>'Se eliminó correctamente'));

      }else{
          echo json_encode($data = array('error' => true, 'mensaje' =>'No se pudo eliminar'));

      }
      


    }















}



   

?>    