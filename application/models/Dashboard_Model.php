<?php

	class Dashboard_Model extends CI_Model 
	{

    

	    function __construct()
	    {
	        $this->load->database();
	    }


        public function addCampanas($data){


      		$this->db->insert('campania',$data);
      		return $this->db->insert_id();
      

    	}

    	public function selectCampanas()
    	{

    		$querySQL = 'SELECT * FROM campania';
    		return $this->db->query($querySQL)->result();
    		
    	}

        public function addCM($data){
            
            $this->db->insert('usuario',$data);
            return $this->db->insert_id();
        }

        public function addCMPerfil($data)
        {
            
            $this->db->insert('perfil',$data);
            return $this->db->insert_id();
        }

        public function selectCM()
        {

            $querySQL = 'SELECT p.*, u.*
            FROM "perfil" as p 
            left JOIN "usuario" as u ON p."id" = u."id"
            WHERE "rol_id" = 2';
            return $this->db->query($querySQL)->result();
        }

        public function selectEmpresa()
        {

            $querySQL = 'SELECT * FROM empresa';
            return $this->db->query($querySQL)->result();
        }


         public function addEmpresa($data){
            
            $this->db->insert('empresa',$data);

            return $this->db->insert_id();
        }


        public function getEmpleadoNoAsignados($rootID, $eliminado = TRUE){

            $consulta = 'SELECT usuario.id as usuario_id, perfil.id as perfil_id, usuario.nombres, usuario.apellidos, usuario.correo, usuario.imagenurl, perfil._create, perfil._erase, perfil._update
              FROM usuario join perfil on usuario.id = perfil.usuario_id
              WHERE perfil.sys_admin_id = ?
              AND perfil.id NOT IN 
              (SELECT empleado_id FROM campania_empleados)';

            if (is_null($eliminado))
              $consulta .= ' AND perfil._erase IS NULL';
            try {
              return $this->db->query($consulta, [$rootID])->result_array();
              #return $this->db->get()->result_array();
            } catch (Exception $e) {
              log_message('error', "get select Usuarios no asigndos a campañas: ".$e);
              return false;
            }

        }


        









 	}
?>