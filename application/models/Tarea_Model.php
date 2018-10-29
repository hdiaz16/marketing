<?php 

  class Tarea_Model extends CI_Model{

    function __construct(){
      $this->load->database();
    }

    public function getTareas($communityManID, $campaniaID = NULL, $eliminadas = NULL){
      #$eliminadas omite a las tareas eliminadas si el valor pasado es true
      $this->db->select('campania.id as campania_id, campania.nombre as nombre_campania, red_semantica.id as red_id, tarea.id as tarea_id, tarea.descripcion, tarea.condiciones_aceptacion, tarea.requisitos')
      ->from('campania')
      ->join('red_semantica', "campania.id = red_semantica.campania_id")
      ->join('tarea', 'tarea.red_id = red_semantica.id')
      ->where('community_manager_id', $communityManID);
      
      if(!is_null($campaniaID))
        $this->db->where('campania.id', $campaniaID);
      
      if($eliminadas)
        $this->db->where('tarea._erase', NULL);

      try {
        return $this->db->get()->result_array();
      } catch (Exception $e) {
        log_message('error', "get getTareas:".$e);
        return false;
      }
    }

    public function getTarea($tareaID, $eliminada = NULL){

      $this->db->select('*')
      ->from('tarea')
      ->where('id', $tareaID);

      if($eliminada)
        $this->db->where('_erase', NULL);

      try {
        return $this->db->get()->result_array();
      } catch (Exception $e) {
        log_message('error', "select getTarea: ".$e);
        return false;
      }


    }

    public function registrarTarea($redID, $nodoID, $descripcion, $condicionesAceptacion, $requisitos){
      $fechaRegistro = date('Y-m-d H:i');
      $condicionesAceptacion = json_encode($condicionesAceptacion);
      $requisitos = json_encode($requisitos);
      $data = ['red_id' => $redID, 'nodo_id' => $nodoID,'estado_tarea_id' => 1, '_create' => $fechaRegistro, '_update' => $fechaRegistro, 'condiciones_aceptacion' => $condicionesAceptacion, 'requisitos' => $requisitos];

      try {
        $this->db->insert('tarea', $data);
        $nuevaTareaID = $this->db->insert_id();
        $this->db->select('*')
        ->from('tarea')
        ->where('id', $nuevaTareaID);
        
        return $this->db->get()->result_array();
      } catch (Exception $e) {
        log_message('error', "insert tarea registrarTarea: ".$e);
        return false;
      }


    }

    public function editarTarea($tareaID, $descripcion, $condicionesAceptacion, $requisitos, $estadoTarea){

      $fechaEdicion = date('Y-m-d H:i');
      $condicionesAceptacion = json_encode($condicionesAceptacion);
      $requisitos = json_encode($requisitos);

      $data = ['_update' => $fechaEdicion, 'descripcion' => $descripcion, 'requisitos' => $requisitos, 'condiciones_aceptacion' => $condicionesAceptacion, 'estado_tarea_id' => $estadoTarea];
      try {
        $this->db->where('id', $tareaID)
        ->update('tarea', $data);

        $this->db->select('*')
        ->where('id', $tareaID)
        ->from('tarea');

        return $this->db->get()->result_array();
      } catch (Exception $e) {
        log_message('error', "update editarTarea:".$e);
        return false;
      }

    }

    public function eliminarTarea($tareaID){

      $fechaEliminacion = date('Y-m-d H:i');

      $data = ['_erase' => $fechaEliminacion, '_update' => $fechaEliminacion];

      try {
        $this->db->where('id', $tareaID)
        ->update('tarea', $data);

        $this->db->select('*')
        ->from('tarea')
        ->where('id', $tareaID);
        
        return $this->db->get()->result_array();

      } catch (Exception $e) {
        log_message('error', "eliminar eliminarTarea: ".$e);
        return false;
      }

    }

    
  }

?>