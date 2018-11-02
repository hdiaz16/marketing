<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgregarAdmin extends CI_Controller {

	function __construct()
    {
    	parent::__construct();
        $this->load->model('Root_Model');
        $this->load->model('Empresa_Model');
        $this->load->helper('form');
        date_default_timezone_set('America/Mexico_City');
    }



    public function index()
    {
      $data['admins'] = $this->Root_Model->getAdministradores($this->session->userdata['perfil-actual']['perfil_id'], NULL);
    	$data['empresas'] = $this->Empresa_Model->getEmpresas($this->session->userdata['perfil-actual']['perfil_id'], NULL);
      $this->load->view('core/header');
		  $this->load->view('agregarAdmin', $data);
		  $this->load->view('core/footer');
    }


    public function addAdmin()
	{
		
    $rootID = $this->input->post('sysAdminID');
    $nombres = $this->input->post('nombres');
    $correo = $this->input->post('correo');
		$contrasenia = $this->input->post('contrasenia');

    $nuevoAdmin = $this->Root_Model->registrarAdministrador($rootID, $correo, $nombres, $contrasenia);

    if($nuevoAdmin){
      echo json_encode(['error' => false, 'mensaje' => 'Registro completo']);
    }else{
      echo json_encode(['error' => true, 'mensaje' => 'No se pudo registrar administrador']);
    }
	}

  public function editAdmin(){

  }

  public function deleteAdmin(){
    $adminID = $this->input->post('adminID');

    $deletedAdmin = $this->Root_Model->eliminarAdministrador($adminID);

    if($deletedAdmin)
      echo json_encode(['error' => false, 'mensaje' => 'borrado completo']);
    else
      echo json_encode(['error' => true, 'mensaje' => 'falla al borrar administrador']);

  }

  public function asignarAdminEmpresa(){

    $adminID = $this->input->post('adminID');
    $empresaID = $this->input->post('empresaID');

    $nuevaAsignacion = $this->Root_Model->asignarAdministradorEmpresa($adminID, $empresaID);

    if($nuevaAsignacion)
      echo json_encode(['error' => false, 'mensaje' => 'asignacion completa']);
    else
      echo json_encode(['error' => true, 'mensaje' => 'falla al asignar administrador']);

  }


}


?>    