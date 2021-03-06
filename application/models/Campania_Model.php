<?php 

class Campania_Model extends CI_Model{

  function __construct(){
    $this->load->database();
  }

  public function getCampanias($communityManID, $all = TRUE){

    if($all){
      $this->db->select('*');
      $this->db->from('campania');
      $this->db->where('community_manager_id', $communityManID);
    }else{
      $this->db->select('*');
      $this->db->from('campania');
      $this->db->where('community_manager_id', $communityManID);
      $this->db->where('_erase', NULL);
    }

    return $this->db->get()->result_array();
  }

  public function getCampania($campaniaID, $eliminada = FALSE){
    
    if($eliminada){
      $this->db->select('*');
      $this->db->from('campania');
      $this->db->where('id', $campaniaID);
    }else{
      $this->db->select('*');
      $this->db->from('campania');
      $this->db->where('id', $campaniaID);
      $this->db->where('_erase', NULL);
    }

    return $this->db->get()->result_array();
  }

  public function registrarCampania($communityManID, $nombre, $objetivos, $propositos, $fechaInicio, $fechaCierre){

    $fechaRegistro = date('Y-m-d H:i');
    $objetivosString = json_encode($objetivos);
    $propositosString = json_encode($propositos);
    $data = ['community_manager_id' => $communityManID, 'nombre' => $nombre, 'objetivos' => $objetivosString, 'propositos' => $propositosString,'fecha_inicio' => $fechaInicio, 'fecha_cierre' => $fechaCierre, '_create' => $fechaRegistro, '_update' => $fechaRegistro];

    try {
      $this->db->insert('campania', $data);
    } catch (Exception $e) {
      log_message('error', "insertar campania registrarCampania:".$e);
      return false;
    }
    $nuevaCampaniaID = $this->db->insert_id();
    $data = ['campania_id' => $nuevaCampaniaID, '_create' => $fechaRegistro, '_update' => $fechaRegistro];
    try {
      $this->db->insert('red_semantica', $data);
    } catch (Exception $e) {
      log_message('error', "insertar red registrarCampania: ".$e);
      return false;
    }
    $this->db->select('*');
    $this->db->from('campania');
    $this->db->join('red_semantica', 'campania.id = red_semantica.campania_id');
    $this->db->where('campania.id', $nuevaCampaniaID);

    return $this->db->get()->result_array();

  }

  public function editarCampania($campaniaID, $nombre, $objetivos, $propositos, $fechaInicio, $fechaCierre){
    $fechaEdicion = date('Y-m-d H:i');
    $objetivosString = json_encode($objetivos);
    $propositosString = json_encode($propositos);
    $data = ['nombre' => $nombre, 'objetivos' => $objetivosString, 'propositos' => $propositosString,'fecha_inicio' => $fechaInicio, 'fecha_cierre' => $fechaCierre];

    try {
      $this->db->where('id', $campaniaID);
      $this->db->update('campania', $data);
    } catch (Exception $e) {
      log_message('error', "update campania editarCampania:".$e);
      return false;
    }

    $this->db->select('*');
    $this->db->from('campania');
    $this->db->where('id', $campaniaID);

    return $this->db->get()->result_array();
  }

  public function eliminarCampania($campaniaID){
    $fechaEliminacion = date('Y-m-d H:i');
    $data = ['_erase' => $fechaEliminacion];

    try {
      $this->db->where('id', $campaniaID);
      $this->db->update('campania', $data);
    } catch (Exception $e) {
      log_message('error', "update _erase eliminarCampania:".$e);
      return false;
    }

    try {
      $this->db->where('campania_id', $campaniaID);
      $this->db->update('red_semantica', $data);
    } catch (Exception $e) {
      log_message('error', "update _erase red eliminarCampania:".$e);
      return false;
      
    }

    $this->db->select('*');
    $this->db->from('campania');
    $this->db->where('id', $campaniaID);

    return $this->db->get()->result_array();
  }

}

?>