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









 	}
?>