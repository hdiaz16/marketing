<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contenido extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Subtarea_Model');
        $this->load->model('Publicacion_Model');
        date_default_timezone_set('America/Mexico_City');
    }

    public function index()
    {
        $data['subtareas'] = $this->Subtarea_Model->getSubtareas($this->session->userdata('perfil-actual')['perfil_id']);
        $this->load->view('core/header');
        $this->load->view('contenido', $data);
        $this->load->view('core/footer');
    }

    public function mostrarContenido() {
      $data = $this->Publicacion_Model->getPublicacion(
        $this->input->post('publicacion_id')
      );
      if ($data == false) {
        echo json_encode($data = array('error' => true, 'mensaje' =>'No se pudo cargar la publicacion'));
      }
      echo json_encode($data);
    }
    
    public function agregarContenido() {

      $data = $this->Publicacion_Model->registrarPublicacion(
        trim($this->input->post('tarea_id')),
        $this->input->post('contenido')
      );
      if ($data == false) {
        echo json_encode($data = array('error' => true, 'mensaje' =>'No se pudo guardar la publicacion'));
      } else {
        echo json_encode($data = array('error' => false, 'mensaje' =>'Publicacion guardada.'));
      }
    }

    public function editarContenido() {
      $data = $this->Publicacion_Model->editarPublicacion(
        $this->input->post('publicacion_id'),
        $this->input->post('contenido')
      );
      if ($data == false) {
        echo json_encode($data = array('error' => true, 'mensaje' =>'No se pudo guardar la publicacion'));
      } else {
        echo json_encode($data = array('error' => false, 'mensaje' =>'Publicacion guardada.'));
      }
    }
}
