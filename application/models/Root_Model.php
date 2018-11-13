<?php 

class Root_Model extends CI_Model {

  function __construct(){
    $this->load->database();
  }

  public function getAdministradores($rootID, $eliminado = TRUE){

    $this->db->select('usuario.id as usuario_id, perfil.id as perfil_id, usuario.nombres, usuario.apellidos, usuario.correo, usuario.imagenurl, perfil._create, perfil._erase, perfil._update, empresa.razon_social as empresa_nombre');
    $this->db->from('usuario');
    $this->db->join('perfil', 'usuario.id = perfil.usuario_id');
    $this->db->join('empresa_admin', 'perfil.id = empresa_admin.admin_id');
    $this->db->join('empresa', 'empresa_admin.empresa_id = empresa.id');
    $this->db->where('perfil.sys_admin_id', $rootID);
    $this->db->where('perfil.usuario_id !=', $rootID);
    
    if(is_null($eliminado))
      $this->db->where('perfil._erase', NULL);


    return $this->db->get()->result_array();
  }

  public function getAdministradoresNoAsignados($rootID, $eliminado = TRUE){

    $consulta = 'SELECT usuario.id as usuario_id, perfil.id as perfil_id, usuario.nombres, usuario.apellidos, usuario.correo, usuario.imagenurl, perfil._create, perfil._erase, perfil._update
      FROM usuario join perfil on usuario.id = perfil.usuario_id
      WHERE perfil.sys_admin_id = ?
      AND perfil.id NOT IN 
      (SELECT admin_id FROM empresa_admin)';

    if (is_null($eliminado))
      $consulta .= ' AND perfil._erase IS NULL';
    try {
      return $this->db->query($consulta, [$rootID])->result_array();
      #return $this->db->get()->result_array();
    } catch (Exception $e) {
      log_message('error', "get select Administrador Usuario: ".$e);
      return false;
    }

  }

  public function getAdministrador($adminID, $eliminado = FALSE){
    
    $this->db->select('usuario.id as usuario_id, perfil.id as perfil_id, usuario.nombres, usuario.apellidos, usuario.correo, usuario.imagenurl');
    $this->db->from('usuario');
    $this->db->join('perfil', 'usuario.id = perfil.usuario_id');
    $this->db->where('perfil.id', $adminID);
    
    if($eliminado)
      $this->db->where('perfil._erase', NULL);

    return $this->db->get()->result_array();
  }

  public function registrarAdministrador($sysAdminID, $correo, $nombres = "John Doe", $contrasenia = "12345678"){

    $fechaRegistro = date('Y-m-d H:i');
    $data = ['nombres' => $nombres, 'correo' => $correo, 'contrasenia' => $contrasenia, '_create' => $fechaRegistro, '_update' => $fechaRegistro];
    
    try {
      $this->db->insert('usuario', $data);
      $nuevoUsuarioID = $this->db->insert_id();
      $data = ['usuario_id' => $nuevoUsuarioID, 'rol_id' => 2, '_create' => $fechaRegistro, '_update' => $fechaRegistro, 'sys_admin_id' => $sysAdminID];
      $this->db->insert('perfil', $data);
      $nuevoPerfilID = $this->db->insert_id();
      $this->db->select('*');
      $this->db->from('usuario');
      $this->db->join('perfil', 'usuario.id = perfil.usuario_id');
      $this->db->where('perfil.id', $nuevoPerfilID);
      return $this->db->get()->result_array();
    } catch (Exception $e) {
      log_message('error', "registrar Administrador Usuario: ".$e);
      return false;
    }
    
  }

  public function editarAdministrador($adminID, $nombres, $correo, $apellidos = "", $imagenURL = "usuario.png"){

    $fechaEdicion = date('Y-m-d H:i');
    $data = ['nombres' => $nombres, 'apellidos' => $apellidos, 'correo' => $correo, 'imagenurl' => $imagenURL];

    try {

      $this->db->where('id', $adminID);
      $this->db->update('usuario', $data);

      return $this->db->get_where('usuario', ['id' => $adminID])->result_array();
    } catch (Exception $e) {
      log_message('error', "editar editarAdministrador: ".$e);
      return false;
    }
  }

  public function eliminarAdministrador($adminID){

    $fechaEliminacion = date('Y-m-d H:i');

    $data = ['_erase' => $fechaEliminacion];

    try {
      $this->db->where('id', $adminID);
      $this->db->update('perfil', $data);

      $this->db->select('_erase');
      $this->db->from('perfil');
      $this->db->where('id', $adminID);

      return $this->db->get()->result_array();
    } catch (Exception $e) {
      log_message('error', "eliminar eliminarAdministrador: ".$e);
      return false;
    }
  }

  public function asignarAdministradorEmpresa($adminID, $empresaID){
    $fechaAsignacion = date('Y-m-d H:i');
    $data = ['admin_id' => $adminID, 'empresa_id' => $empresaID, '_create' => $fechaAsignacion, '_update' => $fechaAsignacion];

    try {
      $this->db->insert('empresa_admin', $data);

      $this->db->select('*');
      $this->db->from('empresa_admin');
      $this->db->where('admin_id', $adminID);
      $this->db->where('empresa_id', $empresaID);

      return $this->db->get()->result_array();
    } catch (Exception $e) {
      log_message('error', "asignar asignarAdministradorEmpresa:".$e);
      return false;
    }
  }



}

?>