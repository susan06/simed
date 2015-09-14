<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Especialidades_model extends CI_Model {

   function __construct() {
        parent::__construct();
    }
 
	function get_especialidades(){	
		$this->db->select("*");
		$this->db->order_by("nombre"); 
		$this->db->from('especialidades');	
		$query = $this->db->get();		
		return $query->result_array();			
	}
	
	function get_especialidad($id){	
		$this->db->select("id,nombre");
		$this->db->from('especialidades');	
		$this->db->where('id', $id);
		$query = $this->db->get();		
		return $query->result_array();			
	}
	
   function guardar($data){
  
		$insertSQL= $this->db->insert('especialidades', $data);

		if($insertSQL) {
					$this->session->set_flashdata('especialidad', $data['nombre']);
					$this->session->set_flashdata('info', 'La especialidad '.$data['nombre'].' se guardo con éxito');
					redirect(base_url() . 'especialidades', 'refresh');		 
		}else{
					$this->session->set_flashdata('error', 'Intente guardar los datos de nuevo');
					redirect(base_url() . 'especialidades', 'refresh');	
		}
						
	}
	
    
	function eliminar($id){
			
		$this->db->where('id', $id);
		$this->db->delete('especialidades');	
	}
	

	
}
