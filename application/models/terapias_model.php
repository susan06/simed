<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Terapias_model extends CI_Model {

   function __construct() {
        parent::__construct();
    }
 
	function get_terapias(){	
		$this->db->select("*");		
		$query = $this->db->get('terapias');		
		return $query->result_array();	
	}
	
	function sueros_basicos(){	
		$this->db->select("*");
		$this->db->where("tipo",1);			
		$query = $this->db->get('terapias');		
		return $query->result_array();	
	}

	function sueros(){	
		$this->db->select("*");
		$this->db->where("tipo",3);			
		$query = $this->db->get('terapias');		
		return $query->result_array();	
	}

	function terapias(){	
		$this->db->select("*");
		$this->db->where("tipo",3);			
		$query = $this->db->get('terapias');		
		return $query->result_array();	
	}
	
}
