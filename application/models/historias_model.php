<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Historias_model extends CI_Model {

   function __construct() {
        parent::__construct();
    }
   
	function get_historias_pac($expediente){	
		$this->db->select("*, historia_medica.id as id, doctores.pnombre as nombre_doc, doctores.papellido as apellido_doc,");
		$this->db->join('doctores','historia_medica.doctores_id=doctores.id','left');
		$this->db->join('expediente_medico','expediente_medico.id=historia_medica.expediente_id','left');
		$this->db->join('pacientes','pacientes.id=expediente_medico.pacientes_id','left');
		$this->db->where("historia_medica.expediente_id",$expediente);		
		$query = $this->db->get('historia_medica');			
		return $query->result_array();	
	}
	
	function get_historia($id){	
		$this->db->select("*, historia_medica.id as id, doctores.pnombre as nombre_doc, doctores.papellido as apellido_doc,");
		$this->db->join('doctores','historia_medica.doctores_id=doctores.id','left');
		$this->db->join('expediente_medico','expediente_medico.id=historia_medica.expediente_id','left');
		$this->db->join('pacientes','pacientes.id=expediente_medico.pacientes_id','left');
		$this->db->where("historia_medica.id",$id);		
		$query = $this->db->get('historia_medica');			
		return $query->result_array();	
	}

}
