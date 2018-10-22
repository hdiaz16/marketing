<?php 

class Root_Model extends CI_Model {

  function __construct(){
    $this->load->database();
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