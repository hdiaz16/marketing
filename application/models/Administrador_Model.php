<?php 

class Administrador_Model extends CI_Model{

  function __construct(){
    $this->load->database();
  }

  public function registrarUsuario($adminID, $correo, $rolID, $nombres = "John Doe",$contrasenia = "12345678", $apellidos){
    $fechaRegistro = date('Y-m-d H:i');
    $data = ['nombres' => $nombres, 'correo' => $correo, 'contrasenia' => $contrasenia, '_create' => $fechaRegistro, '_update' => $fechaRegistro, 'apellidos' => $apellidos];

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

  public function editarUsuario($perfilID, $rolID, $nombres, $apellidos, $correo, $contrasenia, $imagenURL=""){

    $fechaEdicion = date('Y-m-d H:i');
    $dataUsuario = ['apellidos' => $apellidos, 'correo' => $correo, 'contrasenia' => $contrasenia, 'imagenurl' => $imagenURL, 'nombres' => $nombres, '_update' => $fechaEdicion];
    $dataPerfil = ['rol_id' => $rolID];

    try {
      $this->db->where('id', $perfilID)
      ->update('perfil', $dataPerfil);

      $this->db->select('usuario_id')
      ->from('perfil')
      ->where('id', $perfilID);

      $usuarioID = $this->db->get()->result_array()[0]['usuario_id'];

      $this->db->where('id', $usuarioID)
      ->update('usuario', $dataUsuario);

      $this->db->select('*')
      ->from('usuario')
      ->where('id', $usuarioID);

      return $this->db->get()->result_array();
    } catch (Exception $e) {
      log_message('error', "update editarUsuario: ".$e);
      return false;
    }

  }

  public function getUsuarios($userID, $all = TRUE){

    
    $this->db->select('usuario.id as usuario_id, perfil.id as perfil_id, rol.id as rol_id, rol.nombre as nombre_rol, usuario.id as usuario_id, perfil.id as perfil_id, usuario.nombres, usuario.apellidos, usuario.correo, usuario.imagenurl, perfil._create, perfil._erase, perfil._update');
    $this->db->from('usuario');
    $this->db->join('perfil', 'usuario.id = perfil.usuario_id');
    $this->db->join('rol', 'perfil.rol_id = rol.id');
    $this->db->where('perfil.sys_admin_id', $userID);
    $this->db->where('perfil.usuario_id !=', $userID);
    
    if(is_null($all))
      $this->db->where('perfil._erase', NULL);


    return $this->db->get()->result_array();
  }

  

  public function roles()
  {
    return $this->db->where('id !=', 1)->get('rol')->result_array();
  }

  public function eliminarUsuario($perfilID){
    $fechaEliminacion = date('Y-m-d H:i');
    $data = ['_erase' => $fechaEliminacion, '_update' => $fechaEliminacion];

    try {
      $this->db->where('id', $perfilID)
      ->update('perfil', $data);

      $this->db->select('*')
      ->from('perfil')
      ->where('id', $perfilID);

      return $this->db->get()->result_array();
    } catch (Exception $e) {
      log_message('error', "update/delete eliminarUsuario: ".$e);
      return false;      
    }
  }

  public function asignarCampaniaEmpleado( $empleadoID, $campaniaID){

    $fechaRegistro = date('Y-m-d H:i');
    $data = ['campania_id' => $campaniaID, 'empleado_id' => $empleadoID, '_create' => $fechaRegistro, '_update' => $fechaRegistro];

    try {
      $this->db->insert('campania_empleados', $data);

      $this->db->select('*');
      $this->db->from('campania_empleados');
      $this->db->where('empleado_id', $empleadoID);

      return $this->db->get()->result_array();
    } catch (Exception $e) {
      log_message('error', "insert asignarCampaniaEmpleado: ".$e);
      return false;
      
      
    }
  }

  public function getEmpleados($communityManagerID, $all = NULL){

    $this->db->select('usuario.nombres, usuario.apellidos, campania.nombre as campania_nombre, rol.nombre as rol_nombre');
    $this->db->from('usuario');
    $this->db->join('perfil', "usuario.id = perfil.usuario_id");
    $this->db->join('rol', "rol.id = perfil.rol_id");
    $this->db->join('campania_empleados', "campania_empleados.empleado_id = perfil.id");
    $this->db->join('campania', "campania_empleados.campania_id = campania.id");
    $this->db->where('campania.community_manager_id', $communityManagerID);


    if(!is_null($all)){
      $this->db->where('perfil._erase', NULL);
    }

    try {
      return $this->db->get()->result_array();
    } catch (Exception $e) {
      log_message('error', "get getEmpleados: ".$e);
      return false;
      
    }
  }


}


?>