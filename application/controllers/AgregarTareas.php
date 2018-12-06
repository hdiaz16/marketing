<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgregarTareas extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Tarea_Model');
        $this->load->helper('form');
        date_default_timezone_set('America/Mexico_City');
    }

    public function index()
    {
        

        $data['tarea'] = $this->Tarea_Model->getTareas( $this->session->userdata['perfil-actual']['perfil_id'], null);
    	$data['estadosTarea'] = $this->EstadosTarea_Model->getEstados();

        //$data['nodos'] = $this->


    	$this->load->view('core/header');
		$this->load->view('agregarTareas', $data);
		$this->load->view('core/footer');
    }


    public function agregarTarea()
    {
        $requisitos     = trim($this->input->post('req'));
        $condiciones    = trim($this->input->post('con'));
        $fecha          = trim($this->input->post('fecha'));
        $descripcion    = trim($this->input->post('descripcion'));
        $nodo           = trim($this->input->post('nodo'));
        $red            = trim($this->input->post('red'));

        $data = $this->Tarea_Model->registrarTarea($red, $nodo, $descripcion, $condiciones, $requisitos, $fecha);

        if($data == false)
        {
   
            echo json_encode($data = array('error' => true, 'mensaje' =>'No se pudo registrar la Tarea'));

        }
        else
        {
            echo json_encode($data = array('error' => false, 'mensaje' =>'La Tarea se registró con éxito.'));

        }



    }

    public function editarTarea(){
        $id = $this->input->post('id');
        $descripcion = $this->input->post('descripcion');
        $condiciones = $this->input->post('condiciones');
        $requisitos = $this->input->post('requisitos');
        $fechaEntrega = $this->input->post('fechaEntrega');
        $estadoTarea = $this->input->post('estadoTarea');
        
        $tareaEditada = $this->Tarea_Model->editarTarea($id, $descripcion, $condiciones, $requisitos, $estadoTarea, $fechaEntrega);
        
        if($tareaEditada){
            echo json_encode(['error' => false, 'mensaje' => 'La tarea se editó']);
        }else{
            echo json_encode(['error' => true, 'mensaje' => 'No se editó la tarea']);
        }
    }

    public function eliminarTarea(){
        $id = $this->input->post('id');
        $tareaEliminada = $this->Tarea_Model->eliminarTarea($id);

        if($tareaEliminada){
            echo json_encode(['error' => false, 'mensaje' => 'No se eliminó la tarea']);
        }else{
            echo json_encode(['error' => true, 'mensaje' => 'La tarea se eliminó']);

        }
    }


}

?>
