<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Expediente_model extends CI_Model {

   function __construct() {
        parent::__construct();
    }
 
	function expediente($paciente){	
		$this->db->select("*");
		$this->db->from('expediente_medico');
		$this->db->where("pacientes_id",$paciente);				
		$query = $this->db->get();		
		return $query->result_array();
	}

}
