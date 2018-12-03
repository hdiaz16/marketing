<?php 

class Subtarea_Model extends CI_Model {

  function __construct(){
    $this->load->database();
  }

  public function getSubtareas($empleadoID, $tareaID = NULL, $eliminadas = NULL){
      #$eliminadas omite a las tareas eliminadas si el valor pasado es true
      $this->db->select('campania.id as campania_id, campania.nombre as nombre_campania, red_semantica.id as red_id, tarea.id as tarea_id, tarea.descripcion as descripcion_tarea, publicacion.id as publicacion_id, subtarea.*')
      ->from('campania')
      ->join('red_semantica', "campania.id = red_semantica.campania_id")
      ->join('tarea', "tarea.red_id = red_semantica.id")
      ->join('subtarea', "subtarea.tarea_id = tarea.id")
      ->join('publicacion', "publicacion.tarea_id = tarea.id")
      ->where('subtarea.empleado_id', $empleadoID);
      
      if(!is_null($tareaID))
        $this->db->where('tarea.id', $tareaID);
      
      if($eliminadas)
        $this->db->where('subtarea._erase', NULL);

      try {
        return $this->db->get()->result_array();
      } catch (Exception $e) {
        log_message('error', "get getSubtareas:".$e);
        return false;
      }
    }

    public function getSubtarea($subtareaID, $eliminada = NULL){

      $this->db->select('*')
      ->from('subtarea')
      ->where('id', $subtareaID);

      if($eliminada)
        $this->db->where('_erase', NULL);

      try {
        return $this->db->get()->result_array();
      } catch (Exception $e) {
        log_message('error', "select getsubTarea: ".$e);
        return false;
      }


    }


  public function registrarSubtarea($tareaID, $empleadoID, $descripcion, $fechaEntrega){

    $fechaRegistro = date('Y-m-d H:i');
    $data = ['tarea_id' => $tareaID, 'empleado_id' => $empleadoID, 'estado_tarea_id' => 1, 'descripcion' => $descripcion, 'entrega' => $fechaEntrega, '_create' => $fechaRegistro, '_update' => $fechaRegistro];

    try {
      $this->db->insert('subtarea', $data);

      $nuevaSubtareaID = $this->db->insert_id();
      $this->db->select('*')
      ->from('subtarea')
      ->where('id', $nuevaSubtareaID);

      return $this->db->get()->result_array();
    } catch (Exception $e) {
      log_message('error', "insert registrarSubtarea: ".$e);
      return false;
    }
  }

  public function editarSubtarea($subtareaID, $descripcion, $estadoTareaID, $fechaEntrega){

    $fechaEdicion = date('Y-m-d H:i');
    $data = ['descripcion' => $descripcion, 'estado_tarea_id' => $estadoTareaID, 'entrega' => $fechaEntrega, '_update' => $fechaEdicion];

    try {
      $this->db->where('id', $subtareaID)
      ->update('subtarea', $data);

      $this->db->select('*')
      ->from('subtarea')
      ->where('id', $subtareaID);

      return $this->db->get()->result_array();
    } catch (Exception $e) {
      log_message('error', "update editarSubtarea: ".$e);
      return false;
    }

  }

  public function eliminarSubtarea($subtareaID){
    $fechaEliminacion = date('Y-m-d H:i');
    $data = ['_erase' => $fechaEliminacion, '_update' => $fechaEliminacion];

    try {
      $this->db->where('id', $subtareaID)
      ->update('subtarea', $data);

      $this->db->select('*')
      ->from('subtarea')
      ->where('id', $subtareaID);

      return $this->db->get()->result_array();
    } catch (Exception $e) {
      log_message('error', "update eliminarSubtarea: ".$e);
      return false;
      
    }
  }



}

?>
