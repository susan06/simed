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
	
	function guardar_orden($data){
			
		$insertSQL=$this->db->insert('orden_terapia', $data);
		
		$orden = $this->db->insert_id();
	
		if($insertSQL) {
					$this->session->set_flashdata('info', 'La orden de terapia fue creada con éxito');
					redirect(base_url() .'terapias/orden_terapia/'.$orden, 'refresh');		 
		}else{
					$this->session->set_flashdata('error', 'Intente guardar los datos de nuevo');
					redirect(base_url() . 'terapias/orden_terapia/'.$orden, 'refresh');	
		}

	}
	
	function actualizar_orden($data){
				
		$this->db->where('id', $data['id']);
        $updateSQL=   $this->db->update('orden_terapia', $data);
			
		if($updateSQL) {
					$this->session->set_flashdata('info', 'La orden de terapia fue actualizada con éxito');
					redirect(base_url() . 'terapias/orden_terapia/'.$data['id'], 'refresh');		 
		}else{
					$this->session->set_flashdata('error', 'Intente guardar los datos de nuevo');
					redirect(base_url() . 'terapias/orden_terapia/'.$data['id'], 'refresh');	
		}			

	}	
	
 	function get_orden_terapia($orden){	
		$this->db->select("*, orden_terapia.id as id, doctores.pnombre as nombre_doc, doctores.papellido as apellido_doc, pacientes.cedula as cedula_pac");
		$this->db->join('doctores','doctores.id=orden_terapia.doctores_id','left');
		$this->db->join('expediente_medico','expediente_medico.id=orden_terapia.expediente_id','left');
		$this->db->join('pacientes','pacientes.id=expediente_medico.pacientes_id','left');
		$this->db->where("orden_terapia.id",$orden);		
		$query = $this->db->get('orden_terapia');		
		return $query->result_array();	
	}	
	
	 function get_ordenes_pac($expediente){	
		$this->db->select("*, orden_terapia.id as id");
		$this->db->where("expediente_id",$expediente);		
		$this->db->order_by('id', 'DESC');	
		$query = $this->db->get('orden_terapia',5);			
		return $query->result_array();	
	}
	
	function aplicaciones1($orden){	
		$this->db->select("*");
		$this->db->from('aplicacion_terapia');
		$this->db->where("orden_id",$orden);
		$this->db->limit(14);		
		$query = $this->db->get();			
		return $query->result_array();	
	}
	
	function aplicaciones2($orden){	
		$this->db->select("*");
		$this->db->from('aplicacion_terapia');
		$this->db->where("orden_id",$orden);
		$this->db->limit(14,14);			
		$query = $this->db->get();			
		return $query->result_array();	
	}
	
	function aplicaciones_terapias($fecha){	
		$this->db->select("*");
		$this->db->from('aplicacion_terapia');
		$this->db->where("fecha",$fecha);
		$query = $this->db->get();			
		return $query->result_array();	
	}
}
