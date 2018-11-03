<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campanas extends CI_Controller {

	function __construct()
    {
    	parent::__construct();
        $this->load->model('Campania_Model');
        $this->load->helper('form');
        date_default_timezone_set('America/Mexico_City');
    }

	
	public function index()
	{

		

			$data['campanas'] = $this->Campania_Model->getCampanias($this->session->userdata['perfil-actual']['perfil_id'], false );


			$this->load->view('core/header');
			$this->load->view('campanas',$data);
			$this->load->view('core/footer');


	}



	public function addCampanas()
  { 			

      $data = $this->Campania_Model->registrarCampania(
        $this->session->userdata['perfil-actual']['perfil_id'],
        trim($this->input->post('nombre')),
        trim($this->input->post('objetivo')), 
        trim($this->input->post('proposito')),
        trim($this->input->post('fechaIn')),
        trim($this->input->post('fechaFn'))
    );

      	if($data == false)
	  	  {
   
      		echo json_encode($data = array('error' => true, 'mensaje' =>'No se pudo registrar la Campaña'));

  	     }else{
  			   echo json_encode($data = array('error' => false, 'mensaje' =>'La Campaña se registro con exito.'));

	       }

     		

     
    
  }


    public function deleteCampanias()
    {

      $id =  $this->input->post('id');

      $data = $this->Campania_Model->eliminarCampania($id);

      if($data){

           echo json_encode($data = array('error' => false, 'mensaje' =>'Se elimino correctamente'));

      }else{
          echo json_encode($data = array('error' => true, 'mensaje' =>'No se pudo eliminar'));

      }
      


    }


     public function editarCam()
    {

      

      $data = $this->Campania_Model->editarCampania(
        trim($this->input->post('idCamp')),
        trim($this->input->post('nombre')),
        trim($this->input->post('objetivo')), 
        trim($this->input->post('proposito')),
        trim($this->input->post('fechaIn')),
        trim($this->input->post('fechaFn')));



      if($data){

           echo json_encode($data = array('error' => false, 'mensaje' =>'Se edito correctamente'));

      }else{

          echo json_encode($data = array('error' => true, 'mensaje' =>'No se pudo edito'));



      }
      


    }




















}
