<?php 

class Usuario_Model extends CI_Model {

  function __construct(){
    $this->load->database();
  }

  public function verificarUsuario($correo, $contrasenia){
    $this->db->select('*');
    $registrado = $this->db->get_where('usuario', ['correo' => $correo, 'contrasenia' => $contrasenia, '_erase' => NULL]);
    $registrado = $registrado->result_array();

    return count($registrado) > 0 ?
      $registrado[0] :
      false;

  }

  public function obtenerPerfiles($id){
    $this->db->select('perfil.sys_admin_id, perfil.id as perfil_id, rol.id as rol_id, rol.nombre');
    $this->db->from('rol');
    $this->db->join('perfil', 'rol.id = perfil.rol_id');
    $this->db->where('perfil.usuario_id', $id);
    $this->db->where('perfil._erase', NULL);
    $this->db->order_by('perfil._update', 'DESC');

    return $this->db->get()->result_array();
  }



}

 ?>