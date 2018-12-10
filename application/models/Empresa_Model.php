<?php 

class Empresa_Model extends CI_Model {

  function __construct(){
    $this->load->database();
  }
  
  public function getEmpresas($sysAdminID, $all = true){

    $this->db->select('empresa.id as empresa_id, empresa.razon_social, empresa.logourl, empresa.sys_admin_id, empresa.contacto, empresa._create, empresa._erase, empresa._update, perfil.id as perfil_id, usuario.nombres, usuario.apellidos');
    $this->db->from('empresa');
    $this->db->join('empresa_admin', 'empresa.id = empresa_admin.empresa_id');
    $this->db->join('perfil', 'perfil.id = empresa_admin.admin_id');
    $this->db->join('usuario', 'perfil.usuario_id = usuario.id');
    $this->db->where('empresa.sys_admin_id', $sysAdminID);
  
    if(is_null($all))
      $this->db->where('empresa._erase', NULL);


    return $this->db->get()->result_array();

  }

  public function getEmpresasNoAsignadas($rootID, $eliminadas = true){

    $consulta = 'SELECT * FROM empresa WHERE empresa.sys_admin_id = ?
      AND id NOT IN 
      (SELECT empresa_id FROM empresa_admin)';

    if (is_null($eliminadas))
      $consulta .= ' AND empresa._erase IS NULL';
    try {
      return $this->db->query($consulta, [$rootID])->result_array();
      #return $this->db->get()->result_array();
    } catch (Exception $e) {
      log_message('error', "get select empresas no asignadas: ".$e);
      return false;
    }

  }

  public function getEmpresa($empresaID, $eliminada = true){

      $this->db->select('*');
      $this->db->from('empresa');
      $this->db->join('empresa_admin', 'empresa.id = empresa_admin.empresa_id');
      $this->db->join('perfil', 'perfil.id = empresa_admin.admin_id');
      $this->db->join('usuario', 'perfil.usuario_id = usuario.id');
      $this->db->where('empresa.id', $empresaID);
    
      if(is_null($eliminada))
        $this->db->where('_erase', NULL);


      return $this->db->get()->result_array();      

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

    #print_r([$data, $empresaID]);

    try {
      $this->db->where('id', $empresaID);
      $this->db->update('empresa', $data);

      $this->db->select('*');
      $this->db->from('empresa');
      $this->db->where('id', $empresaID);
      $resultado =  $this->db->get()->result_array();
      #print_r($resultado);
      return $resultado;

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

      $this->db->where('empresa_id', $empresaID);
      $this->db->delete('empresa_admin');

      $this->db->select('_erase');
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
