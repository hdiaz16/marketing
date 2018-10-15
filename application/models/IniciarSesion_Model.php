
<?php

	class IniciarSesion_Model extends CI_Model {

    

    function __construct()
    {
        $this->load->database();
    }



    public function iniciarSesion($correo, $contrasenia)
    {
      log_message('error', 'modelo. correo: '.$correo.' contrasenia: '.$contrasenia);
        $query = $this->db->get_where('usuario', ['correo' => $correo, 'contrasenia' => $contrasenia]);
      log_message('error', 'query result'.json_encode($query->result()));
        return $query->result();
    }

   


    public function addUsuario($data){


      $this->db->insert('usuario',$data);
      return $this->db->insert_id();
      

    }

    public function rolUsuario(){
       
      $querySQL = 'SELECT p.*, r.*


      FROM "perfil" as p 

      INNER JOIN "rol" as r ON p."id" = r."id"

      WHERE "rol_id" in (1,2,3,4)';

      return $this->db->query($querySQL)->row();

    }



}
?>