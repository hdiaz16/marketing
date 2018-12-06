<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subtareas extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('Subtarea_Model');
    $this->load->model('Tarea_Model');
    $this->load->helper('form');
    date_default_timezone_set('America/Mexico_City');
  }

  public function index() {
    $this->load->view('core/header');
    $this->load->view('subtareas');
    $this->load->view('core/footer');
  }

  public function show($tarea_id) {
    $data['subtareas'] = $this->Subtarea_Model->getTareaSubtareas($tarea_id);
    $data['empleados'] = $this->Tarea_Model->getEmpleados($tarea_id);


    $this->load->view('core/header');
    $this->load->view('subtareas', $data);
    $this->load->view('core/footer');
  }

  public function create() {
    $data = $this->Subtarea_Model->registrarSubtarea(
      $this->input->post('tarea_id'),
      $this->input->post('empleado_id'),
      $this->input->post('descripcion'),
      $this->input->post('entrega')
    ); 
    if($data == false) {
      echo json_encode($data = array('error' => true, 'mensaje' =>'No se pudo registrar la Campaña'));
    }else {
      echo json_encode($data = array('error' => false, 'mensaje' =>'La Campaña se registró con éxito.'));
    }
  }

  public function update() {
    $data = $this->Subtarea_Model->editarSubtarea(
      $this->input->post('tarea_id'),
      $this->input->post('descripcion'),
      $this->input->post('entrega')
    ); 
    if($data == false) {
      echo json_encode($data = array('error' => true, 'mensaje' =>'No se pudo registrar la Campaña'));
    }else {
      echo json_encode($data = array('error' => false, 'mensaje' =>'La Campaña se registró con éxito.'));
    }
  }

  public function delete() {
    $data = $this->Subtarea_Model->eliminarSubtarea(
      $this->input->post('tarea_id')
    );
    if($data == false) {
      echo json_encode($data = array('error' => true, 'mensaje' =>'No se pudo eliminar'));
    } else {
      echo json_encode($data = array('error' => false, 'mensaje' =>'Se elimino con exito'));
    }
  }
}
