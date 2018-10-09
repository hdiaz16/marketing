
<?php

	class IniciarSesion_Model extends CI_Model {

    

    function __construct()
    {
        $this->load->database();
    }



    public function iniciarSesion($usuario,$contrasena)
    {
        $querySQL = 'SELECT * FROM "usuario" WHERE "nombres" = \''.$usuario.'\' AND "contrasenia" = \''.$contrasena.'\'';
        return $this->db->query($querySQL)->row();
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