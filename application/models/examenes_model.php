<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Examenes_model extends CI_Model {

   function __construct() {
        parent::__construct();
    }
 
    function guardar($data){
		
		$insertSQL= $this->db->insert('examenes', $data);
		
		if($insertSQL) {
					$this->session->set_flashdata('info', 'El exámen '.$data['tipo_exam'].' fue registrado con éxito!');
					redirect(base_url() . 'examenes/registrar', 'refresh');			 
        }else{
					$this->session->set_flashdata('error', '¡Error al registrar el procedimiento!');
					redirect(base_url() . 'examenes/registrar', 'refresh');		
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
    
	function eliminar($id){
			
		$this->db->where('id', $id);
		$this->db->delete('procedimientos');	
	}

	function get_examenes_pac($expediente){	
		$this->db->select("*, examenes.id as id");
		$this->db->where("expediente_id",$expediente);		
		$this->db->order_by('id', 'DESC');	
		$query = $this->db->get('examenes');			
		return $query->result_array();	
	}	
	
}
