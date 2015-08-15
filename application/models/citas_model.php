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
	
	function get_citas_pac($paciente){	
		$this->db->select("*,doctores.pnombre as nombre_doc, doctores.papellido as apellido_doc, cita_medica.id as id");
		$this->db->from('cita_medica');
		$this->db->join('doctores','cita_medica.doctores_id=doctores.id','left');
		$this->db->join('especialidades','cita_medica.especialidades_id=especialidades.id','left');
		$this->db->join('pacientes','cita_medica.pacientes_id=pacientes.id','left');
		$this->db->join('hora_consulta','cita_medica.hora_id=hora_consulta.id','left');
		$this->db->where('cita_medica.pacientes_id',$paciente);	
		$this->db->like('cita_medica.status', 1);	
		$this->db->order_by('cita_medica.id', 'ASC');			
		$query = $this->db->get();	
		return $query->result_array();							
	}	
	
	function get_datos_cita($id){	
		$this->db->select("*,cita_medica.id as id,doctores.pnombre as nombre_doc, doctores.papellido as apellido_doc, pacientes.id as paciente_id, doctores.id as doctor_id, especialidades.id as especialidad_id, hora_consulta.id as hora_id");
		$this->db->from('cita_medica');
		$this->db->join('doctores','cita_medica.doctores_id=doctores.id','left');
		$this->db->join('especialidades','cita_medica.especialidades_id=especialidades.id','left');
		$this->db->join('pacientes','cita_medica.pacientes_id=pacientes.id','left');
		$this->db->join('hora_consulta','cita_medica.hora_id=hora_consulta.id','left');
		$this->db->where('cita_medica.id',$id);				
		$query = $this->db->get();	
		return $query->result_array();							
	}		
	

   function guardar($data){
  
		$insertSQL= $this->db->insert('cita_medica', $data);
		
		$cita =$this->db->insert_id();
		
		if($insertSQL) {
					$this->session->set_flashdata('cita_creada', $cita);
					$this->session->set_flashdata('cita_paciente', $data['pacientes_id']);
					redirect(base_url() . 'citas/programar', 'refresh');		 
		}else{
					$this->session->set_flashdata('error', 'Intente guardar los datos de nuevo');
					redirect(base_url() . 'citas/programar', 'refresh');	
		}
						
	}
	
     function actualizar($data,$url){	

		$this->db->where('id', $data['id']);
        $updateSQL=$this->db->update('cita_medica', $data);	
		
		if($updateSQL) {								
			$this->session->set_flashdata('cita_modificada', $data['id']);
			redirect(base_url() .$url, 'refresh');	
		}else{
			$this->session->set_flashdata('error', 'Intente actualizar los datos de nuevo');
			redirect(base_url().$url, 'refresh');	
		}
		
	}
	
	function eliminar($id){
			
		$this->db->where('id', $id);
		$this->db->delete('cita_medica');	
		
	}
	

	
}
