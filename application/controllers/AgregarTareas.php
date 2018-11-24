<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgregarTareas extends CI_Controller {

	function __construct()
    {
    	parent::__construct();
        $this->load->model('Tarea_Model');
        $this->load->helper('form');
        date_default_timezone_set('America/Mexico_City');
    }



    public function index()
    {
        

    	$data['tarea'] = $this->Tarea_Model->getTareas( $this->session->userdata['perfil-actual']['perfil_id'], null);

        //$data['nodos'] = $this->


    	$this->load->view('core/header');
		$this->load->view('agregarTareas', $data);
		$this->load->view('core/footer');
    }


    public function agregarTarea()
    {
        $requisitos = trim($this->input->post('req'));
        $condiciones = trim($this->input->post('con'));
        $fecha = trim($this->input->post('fecha'));
        $descripcion = trim($this->input->post('descripcion'));

        $data = $this->Tarea_Model->registrarTarea($requisitos, $condiciones,$fecha, $descripcion);

        if($data == false)
        {
   
            echo json_encode($data = array('error' => true, 'mensaje' =>'No se pudo registrar la Campaña'));

        }
        else
        {
            echo json_encode($data = array('error' => false, 'mensaje' =>'La Campaña se registro con exito.'));

        }



    }

}

?>