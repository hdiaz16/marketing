<?php 

class Red_Model extends CI_Model {

  function __construct(){
    $this->load->database();
  }
  public function getRed($campaniaID, $eliminada = FALSE){

    if($eliminada){
      $this->db->select('*');
      $this->db->from('red_semantica');
      $this->db->where('campania_id', $campaniaID);
    }else{
      $this->db->select('*');
      $this->db->from('red_semantica');
      $this->db->where('campania_id', $campaniaID);
      $this->db->where('_erase', NULL);
    }

    return $this->db->get()->result_array();
  } 

  public function editarRed($redJSON, $campaniaID){
    $fechaEdicion = date('Y-m-d H:i');
    $data = ['red' => $redJSON, '_update' => $fechaEdicion];
    try {
      $this->db->where('campania_id', $campaniaID);
      $this->db->update('red_semantica', $data);
    } catch (Exception $e) {
      log_message('error', "update red editarRed: ".$e);
      return false;
    }

    $this->db->select('*');
    $this->db->from('red_semantica');
    $this->db->where('campania_id', $campaniaID);

    return $this->db->get()->result_array();
  }
}

?>