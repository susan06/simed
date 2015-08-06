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
		
    function get_datos_doctor($doctorId){	
		$this->db->select('*');
		$this->db->from('doctores');
		$this->db->where('usuarios_id',$doctorId);
		$query = $this->db->get();		
		return $query->result_array();		
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
		
	function asociar_especialidad($doctor,$especialidad){
  
		$asociar_especialidad = array(
			'id_doctor'=> $doctor,
			'cod_espec' => $especialidad
		);
		
		$insertSQL= $this->db->insert('doctor_especialidad', $asociar_especialidad);
		
		header("Location:especialidad");					
	}
	
	function eliminar($id_doctor){
			
		$this->db->where('id', $id_doctor);
		$this->db->delete('doctores');	
	}
	
	function dias_no_disponibles($doctorId){
	
	$fechas=array();
		
		$this->db->select('id_doctor, fecha_no_disponible');
		$this->db->where('id_doctor',$doctorId);
		$query = $this->db->get('disponibilidad_doctor');	
		
		foreach($query->result_array() as $row){
		$fechas[] = $row['fecha_no_disponible'];
		}
	
	echo json_encode($fechas);

	}
	
	function guardar_fecha($doctorId,$fecha){

	$disponibilidad = array(
			'id_doctor' => $doctorId,
			'fecha_no_disponible' => $fecha,
		);
		
	$this->db->insert('disponibilidad_doctor', $disponibilidad );
		
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
	
	function borrar_fecha($fecha){
		$this->db->where('cod_disponible', $fecha);
		$this->db->delete('disponibilidad_doctor');
	}
	
	function borrar_fechas_vencidas($doctor){
	
	$mes_pasado=date('m', strtotime('now - 1 month'));
	
	$this->db->where('id_doctor',$doctor);
	$this->db->where("DATE_FORMAT(fecha_no_disponible, '%m')=$mes_pasado");
	$this->db->delete('disponibilidad_doctor');

	}
	
}
