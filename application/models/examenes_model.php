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
        $updateSQL=$this->db->update('examenes', $data);	

		if($updateSQL){
				$rsp['rsp'] = 1;
				$rsp['mnj'] =  "El exámen fue editado con éxito.";
		}else{
				$rsp['rsp'] = 0;
				$rsp['mnj'] =  "Ocurrio un error, intente de nuevo.";

		}			
		
		echo json_encode($rsp);
		
	} 

	function eliminar($id){
			
		$this->db->where('id', $id);
		$this->db->delete('examenes');	
	}

	function get_examenes_pac($expediente){	
		$this->db->select("*, examenes.id as id");
		$this->db->where("expediente_id",$expediente);		
		$this->db->order_by('id', 'DESC');	
		$query = $this->db->get('examenes');			
		return $query->result_array();	
	}	

	function get_examen($id){	
		$this->db->select("*, examenes.id as id");
		$this->db->where("id",$id);		
		$query = $this->db->get('examenes');			
		return $query->result_array();	
	}		
}
