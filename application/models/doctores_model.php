<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Doctores_model extends CI_Model {

   function __construct() {
        parent::__construct();
    }
 
	function get_lista_doctores(){	
		$this->db->select("*");
		$this->db->order_by("pnombre"); 
		$this->db->from('doctores');			
		$query = $this->db->get();		
		return $query->result_array();			
	}	
	
	function especialidades_doctor($doctor){	
		$this->db->select("*");
		$this->db->from('doctor_especialidad');
		$this->db->join('especialidades','especialidades.id = doctor_especialidad.especialidades_id');
		$this->db->where('doctores_id',$doctor);		
		$query = $this->db->get();	
		return $query->result_array();		
	}
	
	function get_especialidades_doctor($doctor){	
		$this->db->select('doctor_especialidad.especialidades_id as especialidades_id, especialidades.nombre as nombre ');
		$this->db->from('doctor_especialidad');
		$this->db->join('especialidades','especialidades.id = doctor_especialidad.especialidades_id');
		$this->db->where('doctores_id',$doctor);
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){

				$results[] = array('id' => $row['especialidades_id'], 'name' => $row['nombre']);
				
			}
		}else{
			 $results[] = null;
		}
		
		echo json_encode($results);	
	}
	
    function get_datos_doctor($doctorId){	
		$this->db->select('*');
		$this->db->from('doctores');
		$this->db->where('usuarios_id',$doctorId);
		$query = $this->db->get();		
		return $query->result_array();		
	}

    function get_eventos_doctor($doctorId){	
	
	date_default_timezone_set('America/Caracas');
	
	$mes_pasado=date('m', strtotime('now - 2 month'));
	
	$this->db->where("DATE_FORMAT(start, '%m') = $mes_pasado");
	$this->db->delete('eventos');
	
		$this->db->select('*');
		$this->db->from('eventos');
		$this->db->where('usuarios_id',$doctorId);
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){

				$results[] = array('title' => $row['title'], 'start' => $row['start'], 'end' => $row['end'],'borderColor' => $row['borderColor'],'backgroundColor' => $row['backgroundColor']);
				
			}
		}else{
			 $results[] = null;
		}
		
		return json_encode($results);	
	}
	
    function get_eventos(){	
		date_default_timezone_set('America/Caracas');
		
		$mes_pasado=date('m', strtotime('now - 2 month'));
	
		$this->db->where("DATE_FORMAT(start, '%m') = $mes_pasado");
		$this->db->delete('eventos');
	
		$this->db->select('*');
		$this->db->from('eventos');
		$this->db->join('usuarios','usuarios.id = eventos.usuarios_id');
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){

				$results[] = array('title' => $row['title'].' / DR. '.$row['pnombre'].' '.$row['papellido'], 'start' => $row['start'], 'end' => $row['end'],'borderColor' => $row['borderColor'],'backgroundColor' => $row['backgroundColor']);
				
			}
		}else{
			 $results[] = null;
		}
		
		return json_encode($results);	
	}
	
    function actualizar($data){	

		$this->db->where('id', $data['id']);
        $updateSQL=$this->db->update('doctores', $data);	
		
		if($updateSQL) {								
			$this->session->set_flashdata('info', 'Se realizaron los cambios con éxito');
			redirect(base_url() . 'doctores/datos/'.$this->session->userdata('id'), 'refresh');	
		}else{
			$this->session->set_flashdata('error', 'Intente actualizar los datos de nuevo');
			redirect(base_url() . 'doctores/datos/'.$this->session->userdata('id'), 'refresh');	
		}
		
	}
		
	
	function eliminar($id_doctor){
			
		$this->db->where('id', $id_doctor);
		$this->db->delete('doctores');	
	}
	

   function get_fechas($doctorId){
   
		$this->db->select("*");
		$this->db->select("DATE_FORMAT(fecha_no_disponible, '%m-%d') as fecha", FALSE);
		$this->db->from('disponibilidad_doctor');
		$this->db->where('id_doctor',$doctorId); 
		$this->db->ORDER_BY('fecha','ASC');
		$query = $this->db->get();	
		return $query->result_array();	
		
	}
	
	
	function borrar_fechas_vencidas($doctor){
	
	$mes_pasado=date('m', strtotime('now - 1 month'));
	
	$this->db->where('id_doctor',$doctor);
	$this->db->where("DATE_FORMAT(fecha_no_disponible, '%m')=$mes_pasado");
	$this->db->delete('disponibilidad_doctor');

	}

   function guardar_espec($data,$doctor_user){
  
		$insertSQL= $this->db->insert('doctor_especialidad', $data);

		if($insertSQL) {
					$this->session->set_flashdata('info', 'Se asoció la especialidad  con éxito');
					redirect(base_url() . 'doctores/especialidades/'.$doctor_user, 'refresh');		 
		}else{
					$this->session->set_flashdata('error', 'Intente guardar los datos de nuevo');
					redirect(base_url() . 'doctores/especialidades/'.$doctor_user, 'refresh');	
		}
						
	}	
}
