<?php 

  class Tarea_Model extends CI_Model{

    function __construct(){
      $this->load->database();
    }

    public function registrarTarea($redID, $nodoID, $descripcion, $condicionesAceptacion, $requisitos){
      $fechaRegistro = date('Y-m-d H:i');
      $data = ['estado_tarea_id' => 1, '_create' => $fechaRegistro, '_update' => $fechaRegistro, 'condiciones_aceptacion' => $condicionesAceptacion, 'requisitos' => $requisitos];

      try {
        $this->db->insert('tarea', $data);
      } catch (Exception $e) {
        log_message('error', "insert tarea registrarTarea: ".$e);
        return false;
      }
      $nuevaTareaID = $this->db->insert_id();
      $this->db->select('*');
      $this->db->from('tarea');
      $this->db->where('id', $nuevaTareaID);

      return $this->db->get()->result_array();

    }

    
  }

?>