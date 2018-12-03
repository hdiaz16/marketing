<?php 

class Publicacion_Model extends CI_Model {

  function __construct(){
    $this->load->database();
  }

  public function getPublicaciones($empleadoID, $tareaID = NULL, $eliminadas = NULL){
      #$eliminadas omite a las tareas eliminadas si el valor pasado es true
      $this->db->select('tarea.id as tarea_id, publicacion.*');
      $this->db->from('tarea');
      $this->db->join('subtarea', 'tarea.id = subtarea.tarea_id');
      $this->db->join('publicacion', 'tarea.id = publicacion.tarea_id');
      $this->db->where('subtarea.empleado_id ', $empleadoID);
      $this->db->group_by('tarea.id, publicacion.id');
      
      if(!is_null($tareaID))
        $this->db->where('tarea.id', $tareaID);
      
      if($eliminadas)
        $this->db->where('publicacion._erase', NULL);

      try {
        return $this->db->get()->result_array();
      } catch (Exception $e) {
        log_message('error', "get getPublicaciones:".$e);
        return false;
      }
    }

    public function getPublicacion($publicacionID, $eliminada = NULL){

      $this->db->select("contenido ->> 'body' as body, contenido ->> 'link' as link")
      ->from('publicacion')
      ->where('id', $publicacionID);

      if($eliminada)
        $this->db->where('_erase', NULL);

      try {
        return $this->db->get()->result_array();
      } catch (Exception $e) {
        log_message('error', "select getPublicacion: ".$e);
        return false;
      }


    }


  public function registrarPublicacion($tareaID, $contenido, $FBID=''){

    $fechaRegistro = date('Y-m-d H:i');
    $contenido = $contenido;
    $data = ['tarea_id' => $tareaID, 'facebook_id' => $FBID, 'contenido' => $contenido, '_create' => $fechaRegistro, '_update' => $fechaRegistro];

    try {
      $this->db->insert('publicacion', $data);

      $nuevaPublicacionID = $this->db->insert_id();
      $this->db->select('*')
      ->from('publicacion')
      ->where('id', $nuevaPublicacionID);

      return $this->db->get()->result_array();
    } catch (Exception $e) {
      log_message('error', "insert registrarPublicacion: ".$e);
      return false;
    }
  }

  public function editarPublicacion($publicacionID, $contenido, $FBID=''){

    $fechaEdicion = date('Y-m-d H:i');
    $contenido = $contenido;
    $data = ['contenido' => $contenido, 'facebook_id' => $FBID, '_update' => $fechaEdicion];

    try {
      $this->db->where('id', $publicacionID)
      ->update('publicacion', $data);

      $this->db->select('*')
      ->from('publicacion')
      ->where('id', $publicacionID);

      return $this->db->get()->result_array();
    } catch (Exception $e) {
      log_message('error', "update editarPublicacion: ".$e);
      return false;
    }

  }

  public function eliminarPublicacion($publicacionID){
    $fechaEliminacion = date('Y-m-d H:i');
    $data = ['_erase' => $fechaEliminacion, '_update' => $fechaEliminacion];

    try {
      $this->db->where('id', $publicacionID)
      ->update('publicacion', $data);

      $this->db->select('*')
      ->from('publicacion')
      ->where('id', $publicacionID);

      return $this->db->get()->result_array();
    } catch (Exception $e) {
      log_message('error', "update/delete eliminarPublicacion: ".$e);
      return false;
      
    }
  }



}

?>
