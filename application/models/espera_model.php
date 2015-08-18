<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Espera_model extends CI_Model {

   function __construct() {
        parent::__construct();
    }
	
	function get_lista_consulta(){
		
		date_default_timezone_set('America/Caracas');
		
		$this->db->select("*, espera_consulta.id as id, cita_medica.id as cita_id, pacientes.pnombre as pnombre, pacientes.papellido as papellido, doctores.pnombre as nombre_doc, doctores.papellido as apellido_doc, pacientes.id as paciente_id, doctores.id as doctor_id, especialidades.id as especialidad_id");
		$this->db->from('espera_consulta');
		$this->db->join('cita_medica','espera_consulta.citas_id=cita_medica.id','left');
		$this->db->join('especialidades','cita_medica.especialidades_id=especialidades.id','left');
		$this->db->join('pacientes','cita_medica.pacientes_id=pacientes.id','left');
		$this->db->join('doctores','cita_medica.doctores_id=doctores.id','left');
		$this->db->order_by('espera_consulta.id', 'ASC');			
		$query = $this->db->get();	
		return $query->result_array();							
	}
	
	function borrar_lista_consultas(){	
	
		$deleteSQL=$this->db->empty_table('espera_consulta');
		
		if($deleteSQL) {
					$this->session->set_flashdata('info', 'La lista de sala de espera por consultas fue borrada con éxito');
					redirect(base_url() . 'sala_espera/consultas', 'refresh');		 
		}else{
					$this->session->set_flashdata('error', 'Ocurrió un error, intentelo de nuevo');
					redirect(base_url() . 'sala_espera/consultas', 'refresh');	
		}
	}
	
	function borrar_lista_terapias(){
		
		$deleteSQL=$this->db->empty_table('espera_tratamiento');
		
		if($deleteSQL) {
					$this->session->set_flashdata('info', 'La lista de sala de espera por terapias fue borrada con éxito');
					redirect(base_url() . 'sala_espera/consultas', 'refresh');		 
		}else{
					$this->session->set_flashdata('error', 'Ocurrió un error, intentelo de nuevo');
					redirect(base_url() . 'sala_espera/consultas', 'refresh');	
		}
	}	
	
	function eliminar_consulta($id){
			
		$this->db->where('id', $id);
		$this->db->delete('espera_consulta');	
		
	}
	
	function eliminar_terapia($id){
			
		$this->db->where('id', $id);
		$this->db->delete('espera_tratamiento');	
		
	}	

	function cambiar_status_consulta($data){	
			
		$this->db->where('id', $data['id']);
        $updateSQL=$this->db->update('espera_consulta', $data);	

		if($updateSQL) {
			echo true;
		}else{
			echo false;
		}	
	
	}

	function cambiar_status_terapia($data){	
			
		$this->db->where('id', $data['id']);
        $updateSQL=$this->db->update('espera_tratamiento', $data);	
		
		if($updateSQL) {
			echo true;
		}else{
			echo false;
		}	
	
	}





	
	
	
	function get_lista_terapia(){	
		$this->db->select("pacientes.primer_nom_pac, pacientes.primer_apell_pac, espera_tratamiento.cod_espera_tratam, espera_tratamiento.estado");
		$this->db->from('espera_tratamiento');
		$this->db->join('pacientes','pacientes.num_pac=espera_tratamiento.num_pac','left');
		$this->db->order_by('espera_tratamiento.cod_espera_tratam', 'ASC');			
		$query = $this->db->get();	
		return $query->result_array();							
	}
	
	
	function get_cita($cita){
		$this->db->select("cita_medica.cod_cita, cita_medica.turno_cita, cita_medica.estado, doctor.nom_doc, doctor.apell_doc, pacientes.primer_nom_pac, pacientes.primer_apell_pac, especialidad.descripcion_espec, hora_consulta.hora_media");
		$this->db->from('cita_medica');
		$this->db->join('hora_consulta','cita_medica.hora=hora_consulta.cod_hora','left');
		$this->db->join('doctor','cita_medica.id_doctor=doctor.id_doctor','left');
		$this->db->join('pacientes','pacientes.num_pac=cita_medica.num_pac','left');
		$this->db->join('especialidad','cita_medica.cod_especialidad=especialidad.cod_especialidad','left');
		$this->db->where('cita_medica.cod_cita', $cita);		
		$query = $this->db->get();	
		return $query->result_array();			
	}
	
   function lista_espera($cita,$estado,$hora,$turno){  
		$datos_cita = array(
			'cod_cita' => $cita,
			'estado' => $estado,
			'hora_llegada' => $hora
		);
		$insertSQL= $this->db->insert('espera_consulta', $datos_cita);
		$this->actualizar_estado($cita,$turno);
	}
	
	function actualizar_estado($cita,$turno){			
		$datos_cita = array(
			'turno_cita' => $turno
		);	
		$this->db->where('cod_cita', $cita);
        $this->db->update('cita_medica', $datos_cita);
	}
	
	function cambiar_estado($paciente){			
		$terapia_pac = array(
			'estado' => 'Atendido'
		);	
		$this->db->where('cod_espera_tratam', $paciente);
        $this->db->update('espera_tratamiento', $terapia_pac);
	}
	
	function borrar_pac_consulta($lista){			
		$this->db->where('cod_espera_consulta', $lista);
		$this->db->delete('espera_consulta');	
	}
	
	function borrar_pac_terapia($lista){			
		$this->db->where('cod_espera_tratam', $lista);
		$this->db->delete('espera_tratamiento');	
	}
	

	

	

	function nueva_cita($paciente,$doctor,$fecha,$especialidad,$turno,$estado,$hora){
		$cita = array(
				'num_pac' => $paciente,
				'id_doctor' => $doctor,
				'fecha_cita' => $fecha,
				'cod_especialidad' => $especialidad,
				'turno_cita' => $turno,
				'estado' => 'Pendiente'
			);

		$insertSQL=$this->db->insert('cita_medica', $cita);
		$cita=$this->db->insert_id();
		$this->lista_espera($cita,$estado,$hora,$turno);
	}

	function agregar_pac_terapia($paciente,$fecha,$estado){
		$cita_terapia = array(
				'num_pac' => $paciente,
				'fecha_actual' => $fecha,
				'estado' => $estado
			);

		$insertSQL=$this->db->insert('espera_tratamiento', $cita_terapia);
	}	
}
