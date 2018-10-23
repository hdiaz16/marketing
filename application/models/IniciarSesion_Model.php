
<?php

	class IniciarSesion_Model extends CI_Model {

    

    function __construct()
    {
        $this->load->database();
    }



    public function iniciarSesion($correo,$contrasena)
    {
        $querySQL = 'SELECT * FROM "usuario" WHERE "correo" = \''.$correo.'\' AND "contrasenia" = \''.$contrasena.'\'';
        return $this->db->query($querySQL)->row();
    }

   


    public function addUsuario($data){


      $this->db->insert('usuario',$data);
      return $this->db->insert_id();
      

    }

    public function addUsuario1($data1){


      $this->db->insert('perfil',$data1);
      return $this->db->insert_id();
      

    }

    public function rolUsuario($id){
       
      $querySQL = 'SELECT p.*, r.*


      FROM "perfil" as p 

      INNER JOIN "rol" as r ON p."rol_id" = r."id"

      WHERE "rol_id" in (1,2,3,4) and p."usuario_id" = \''.$id.'\'' ;

      return $this->db->query($querySQL)->row();

    }




}
?>