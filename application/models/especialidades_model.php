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
  
   function guardar($data){
  
		$insertSQL= $this->db->insert('especialidades', $data);

		if($insertSQL) {
					$this->session->set_flashdata('info', 'Se registraron los datos con éxito');
					redirect(base_url() . 'especialidades', 'refresh');		 
		}else{
					$this->session->set_flashdata('error', 'Intente guardar los datos de nuevo');
					redirect(base_url() . 'especialidades', 'refresh');	
		}
						
	}
	
    function actualizar($data)
	{	
	
	$this->db->where('id', $data['id']);
    $updateSQL=$this->db->update('especialidades', $data);	
		
		if($updateSQL) {
			$this->session->set_flashdata('info', 'Se realizaron los cambios con éxito');
			redirect(base_url() . 'especialidades', 'refresh');	
		}else{
			$this->session->set_flashdata('error', 'Intente actualizar los datos de nuevo');
			redirect(base_url() . 'especialidades', 'refresh');	
		}
		
	}
    
	function eliminar($id){
			
		$this->db->where('id', $id);
		$this->db->delete('especialidades');	
	}
	

	
}
