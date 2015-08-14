<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Citas_model extends CI_Model {

   function __construct() {
        parent::__construct();
    }
 
	function horas_disponibles($doctor,$turno,$fecha){

		$this->db->select("hora_id");
		$this->db->from("cita_medica");
		$this->db->where("doctores_id", $doctor);
		$this->db->where('fecha',$fecha);
		
		// $horas_citas guarda las horas ya asignadas para la cita
		$horas_citas= array();
		$horas= array();
		
		$query = $this->db->get();	
		foreach($query->result_array() as $row){
			$horas_citas[] =$row["hora_id"];
		}
		
		if(count($horas_citas) > 0){
			
			$this->db->select("*");
			$this->db->from("hora_consulta");
			$this->db->where_not_in('id', $horas_citas);
			$this->db->where('turno',$turno);
			$query 	= 	$this->db->get();
			
			foreach($query->result_array() as $row_hora){
				$horas[] = array('id' => $row_hora['id'], 'hora' => $row_hora['hora_media']);			
			}		
			echo json_encode($horas);	
			
		}else{
			
			$this->db->select("*");
			$this->db->from("hora_consulta");
			$this->db->where('turno',$turno);
			$query 	= 	$this->db->get();
			
			foreach($query->result_array() as $row_hora){
				$horas[] = array('id' => $row_hora['id'], 'hora' => $row_hora['hora_media']);			
			}		
			echo json_encode($horas);	
		
		}
			
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
