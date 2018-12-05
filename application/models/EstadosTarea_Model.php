<?php 

class EstadosTarea_Model extends CI_Model {

  function __construct(){
    $this->load->database();
  }

  public function getEstados(){
      #$eliminadas omite a las tareas eliminadas si el valor pasado es true
      $this->db->select('*')
      ->from('estado_tarea');

      try {
        return $this->db->get()->result_array();
      } catch (Exception $e) {
        log_message('error', "get estados tarea:".$e);
        return false;
      }
    }


}

?>
