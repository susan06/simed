<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Pacientes_model extends CI_Model {

   function __construct() {
        parent::__construct();
    }
 
	function get_lista_pacientes(){	
		$this->db->select("*");
		$this->db->order_by("pnombre"); 
		$this->db->from('pacientes');			
		$query = $this->db->get();		
		return $query->result_array();			
	}
	
    function get_datos_paciente($pacienteId){	
		$this->db->select('*');
		$this->db->from('pacientes');
		$this->db->where('id',$pacienteId);
		$query = $this->db->get();		
		return $query->result_array();		
	}
	
    function guardar($data){
  
		$insertSQL= $this->db->insert('pacientes', $data);
		
		if($insertSQL) {
					$this->session->set_flashdata('info', 'El Paciente '.$data['pnombre'].' '.$data['papellido'].' fue registrado con éxito!');
					redirect(base_url() . 'pacientes/registrar', 'refresh');			 
        }else{
					$this->session->set_flashdata('error', '¡Error al registrar al paciente!');
					redirect(base_url() . 'pacientes/registrar', 'refresh');		
        }
						
	}

	
    function actualizar($data){	

		$this->db->where('id', $data['id']);
        $updateSQL=$this->db->update('pacientes', $data);	
		
		if($updateSQL) {								
			$this->session->set_flashdata('info', 'Se realizaron los cambios con éxito');
			redirect(base_url() . 'pacientes/editar/'.$data['id'], 'refresh');	
		}else{
			$this->session->set_flashdata('error', 'Intente actualizar los datos de nuevo');
			redirect(base_url() . 'pacientes/editar/'.$data['id'], 'refresh');	
		}
		
	}
    
	function eliminar($id_paciente){
			
		$this->db->where('id', $id_paciente);
		$this->db->delete('pacientes');	
	}
	

	
}
