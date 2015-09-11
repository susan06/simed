<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Procedimientos_model extends CI_Model {

   function __construct() {
        parent::__construct();
    }
 
    function guardar($data){
		
		$insertSQL= $this->db->insert('procedimientos', $data);
		
		if($insertSQL) {
					$this->session->set_flashdata('info', 'El Procedimiento '.$data['descrip_proced'].' fue registrado con éxito!');
					redirect(base_url() . 'procedimientos/registrar', 'refresh');			 
        }else{
					$this->session->set_flashdata('error', '¡Error al registrar el procedimiento!');
					redirect(base_url() . 'procedimientos/registrar', 'refresh');		
        }
						
	}
	
   function actualizar($data){	

		$this->db->where('id', $data['id']);
        $updateSQL=$this->db->update('procedimientos', $data);	

		if($updateSQL){
				$rsp['rsp'] = 1;
				$rsp['mnj'] =  "El procedimiento fue editado con éxito.";
		}else{
				$rsp['rsp'] = 0;
				$rsp['mnj'] =  "Ocurrio un error, intente de nuevo.";

		}			
		
		echo json_encode($rsp);
		
	} 
	
	function eliminar($id){
			
		$this->db->where('id', $id);
		$this->db->delete('procedimientos');	
	}
	
	function get_procedimientos_pac($expediente){	
		$this->db->select("*, procedimientos.id as id");
		$this->db->where("expediente_id",$expediente);		
		$this->db->order_by('id', 'DESC');	
		$query = $this->db->get('procedimientos');			
		return $query->result_array();	
	}

	function get_procedimiento($id){	
		$this->db->select("*, procedimientos.id as id");
		$this->db->where("id",$id);		
		$query = $this->db->get('procedimientos');			
		return $query->result_array();	
	}	
}
