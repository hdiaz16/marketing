<?php 

class Usuario_Model extends CI_Model {

  function __construct(){
    $this->load->database();
  }

  public function verificarUsuario($correo, $contrasenia){
    $this->db->select('id');
    $registrado = $this->db->get_where('usuario', ['correo' => $correo, 'contrasenia' => $contrasenia, '_erase' => NULL]);
    $registrado = $registrado->result_array();

    return count($registrado) > 0 ?
      $registrado[0] :
      false;

  }

  public function obtenerPerfiles($id){
    $this->db->select('perfil.sys_admin_id, perfil.id, rol.id, rol.nombre');
    $this->db->from('rol');
    $this->db->join('perfil', 'rol.id = perfil.rol_id');
    $this->db->where('perfil.usuario_id', $id);
    $this->db->order_by('perfil._update', 'DESC');

    return $this->db->get()->result_array();
  }

  public function registrarAdministrador($sysAdminID, $nombres = "John Doe", $correo, $contrasenia = "12345678"){
    $data = ['nombres' => $nombres, 'correo' => $correo, 'contrasenia' => $contrasenia];
    
    try {
      $this->db->insert('usuario', $data);
    } catch (Exception $e) {
      log_message('error', "registrar Administrador Usuario: ".$e);
      return false;
    }

    $nuevoUsuarioID = $this->db->insert_id();
    $fechaRegistro = date('Y-m-d H:i');
    $data = ['usuario_id' => $nuevoUsuarioID, 'rol_id' => 2, '_create' => $fechaRegistro, '_update' => $fechaRegistro];
    
    try {
      $this->db->insert('perfil', $data);
    } catch (Exception $e) {
      log_message('error', 'registrar Administrador Perfil: '.$e);
    }
    
  }


}

 ?>