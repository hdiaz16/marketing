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

      $data['empresas'] = $this->Empresa_Model->getEmpresas($this->session->userdata['perfil-actual']['perfil_id']);
      $data['adminsNoAsignados'] = $this->Root_Model->getAdministradoresNoAsignados($this->session->userdata['perfil-actual']['perfil_id']);
    	$data['empresasNoAsignadas'] = $this->Empresa_Model->getEmpresasNoAsignadas($this->session->userdata['perfil-actual']['perfil_id']);

    $this->load->view('core/header');
		$this->load->view('agregarEmpresas', $data);
		$this->load->view('core/footer');
    }

    public function addEmpresa(){
    
       
    $adminID = $this->input->post('adminID');
    $razonSocial = $this->input->post('razonSocial');
    $contacto = $this->input->post('contacto');
    
    $nuevaEmpresa = $this->Empresa_Model->registrarEmpresa($adminID, $razonSocial, $contacto);

    if($nuevaEmpresa){
      echo json_encode(['error' => false, 'mensaje' => 'Registro completo']);
    }else{
      echo json_encode(['error' => true, 'mensaje' => 'No se pudo registrar administrador']);
    }
  }

  public function editEmpresa(){
		
		   
    $empresaID = $this->input->post('empresaID');
    $razonSocial = $this->input->post('razonSocial');
    $contacto = $this->input->post('contacto');
    
    $empresaEditada = $this->Empresa_Model->editarEmpresa($empresaID, $razonSocial, $contacto);

    if($empresaEditada){
      echo json_encode(['error' => false, 'mensaje' => 'Edición completa']);
    }else{
      echo json_encode(['error' => true, 'mensaje' => 'No se pudo editar empresa']);
    }
	}



    public function deleteEmpresa()
    {

      $id =  $this->input->post('empresaID');

      $data = $this->Empresa_Model->eliminarEmpresa($id);
      if($data){
           echo json_encode($data = array('error' => false, 'mensaje' =>'Se eliminó correctamente la empresa'));
      }else{
          echo json_encode($data = array('error' => true, 'mensaje' =>'No se pudo eliminar la empresa'));

      }
      


    }















}



   

?>    