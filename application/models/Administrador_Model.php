<?php 

class Administrador_Model extends CI_Model{

  function __construct(){
    $this->load->database();
  }

  public function registrarUsuario($adminID, $correo, $rolID, $nombres = "John Doe",$contrasenia = "12345678"){
    $fechaRegistro = date('Y-m-d H:i');
    $data = ['nombres' => $nombres, 'correo' => $correo, 'contrasenia' => $contrasenia, '_create' => $fechaRegistro, '_update' => $fechaRegistro];

    try {
      $this->db->insert('usuario', $data);
    } catch (Exception $e) {
      log_message('error', 'insert usuario registrarUsuario'.$e);
      return false;
    }
    
    $nuevoUsuarioID = $this->db->insert_id();
    $data = ['usuario_id' => $nuevoUsuarioID, 'rol_id' => $rolID, 'sys_admin_id' => $adminID, '_create' => $fechaRegistro, '_update' => $fechaRegistro];

    try {
      $this->db->insert('perfil', $data);
    } catch (Exception $e) {
      log_message('error', "insertar perfil registrarUsuario".$e);
      return false;
    }

    $nuevoPerfilID = $this->db->insert_id();
    $data = ['admin_id' => $adminID, 'empleado_id' => $nuevoPerfilID, '_visible' => TRUE, '_create' => $fechaRegistro, '_update' => $fechaRegistro];

    try {
      $this->db->insert('admin_empleados', $data);
    } catch (Exception $e) {
      log_message('error', "insertar admin_empleados registrarUsuario: ".$e);
      return false;
    }

    $this->db->select('*');
    $this->db->from('usuario');
    $this->db->join('perfil', 'usuario.id = perfil.usuario_id');
    $this->db->where('perfil.id', $nuevoPerfilID);

    return $this->db->get()->result_array();

  }

  
}

?>