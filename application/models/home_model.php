<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Home_model extends CI_Model {

   function __construct() {
        parent::__construct();
    }
 
	function get_pacientes(){	
		$this->db->select("*");
		$this->db->from('pacientes');			
		$query = $this->db->get();		
		return $query->result_array();			
	}

	function get_doctores(){	
		$this->db->select("*");
		$this->db->from('doctores');			
		$query = $this->db->get();		
		return $query->result_array();			
	}	

	function get_enfermeras(){	
		$this->db->select("*");
		$this->db->from('usuarios');	
        $this->db->where('roles_id',2);		
		$query = $this->db->get();		
		return $query->result_array();			
	}
	
	function get_terapistas(){	
		$this->db->select("*");
		$this->db->from('usuarios');
		$this->db->where('roles_id',4);			
		$query = $this->db->get();		
		return $query->result_array();			
	}		
}
