<?php 

class Empresa_Model extends CI_Model {

  function __construct(){
    $this->load->database();
  }
  
  public function getEmpresas($sysAdminID, $all = TRUE){

    $this->db->select('*');
    $this->db->from('empresa');
    $this->db->join('empresa_admin', 'empresa.id = empresa_admin.empresa_id');
    $this->db->where('empresa.sys_admin_id', $sysAdminID);
  
    if(is_null($all))
      $this->db->where('empresa._erase', NULL);


    return $this->db->get()->result_array();

  }

  public function getEmpresasNoAsignadas($rootID, $all = TRUE){

    try {
      $query = $this->db->query('SELECT *
        FROM empresa 
        WHERE sys_admin_id = ?
        AND id NOT IN (
          SELECT empresa_id FROM empresa_admin
          WHERE empresa_id IS NOT NULL
        )', [$rootID]);
      return $query->result_array(); 
    } catch (Exception $e) {
      log_message('error', "select getAdministradoresNoAsignados".$e);
      return false;
    }
   
  }

  public function getEmpresa($empresaID, $eliminada = FALSE){

    if($eliminada){
      $this->db->select('*');
      $this->db->from('empresa');
      $this->db->where('id', $empresaID);

      return $this->db->get()->result_array();
    }else{
      $this->db->select('*');
      $this->db->from('empresa');
      $this->db->where('id', $empresaID);
      $this->db->where('_erase', NULL);

      return $this->db->get()->result_array();      
    }

  }

  public function registrarEmpresa($sysAdminID, $razonSocial, $contacto){

    $fechaRegistro = date('Y-m-d H:i');
    $data = ['razon_social' => $razonSocial, 'sys_admin_id' => $sysAdminID, 'contacto' => $contacto, '_create' => $fechaRegistro, '_update' => $fechaRegistro];

    try {
      $this->db->insert('empresa', $data);
      $nuevaEmpresaID = $this->db->insert_id();
      $this->db->select('*');
      $this->db->from('empresa');
      $this->db->where('id', $nuevaEmpresaID);

      return $this->db->get()->result_array();
    } catch (Exception $e) {
      log_message('error', "registrar registrarEmpresa: ".$e );
      return false;
    }

  }

  public function editarEmpresa($empresaID, $razonSocial, $contacto, $logoURL = "logo-gen.png"){

    $fechaEdicion = date('Y-m-d H:i');
    $data = ['razon_social' => $razonSocial, 'contacto' => $contacto, 'logourl' => $logoURL, '_update' => $fechaEdicion];

    try {
      $this->db->where('id', $empresaID);
      $this->db->update('empresa', $data);

      $this->db->select('*');
      $this->db->from('empresa');
      $this->db->where('id', $empresaID);

      return $this->db->get()->result_array();

    } catch (Exception $e) {
      log_message('error', "editar editarEmpresa:".$e);
      return false;
    }
  }

  public function eliminarEmpresa($empresaID){
    $fechaEliminacion = date('Y-m-d H:i');
    $data = ['_erase' => $fechaEliminacion];

    try {
      $this->db->where('id', $empresaID);
      $this->db->update('empresa', $data);

      $this->db->select('*');
      $this->db->from('empresa');
      $this->db->where('id', $empresaID);

      return $this->db->get()->result_array();
    } catch (Exception $e) {
      log_message('error', "eliminar eliminarEmpresa: ".$e);
      return false;
    }
  }

}

?>
