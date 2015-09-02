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
		
		date_default_timezone_set('America/Caracas');
		
		$insertSQL= $this->db->insert('pacientes', $data);
		
		$paciente = $this->db->insert_id();
		
		$exp['pacientes_id'] = $paciente;
		$exp['fecha']  = date('Y-m-d');
		
		$this->db->insert('expediente_medico', $exp);
		
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
	
	function autocomplete($paciente){
		
		$this->db->distinct();	
		$this->db->select("*");
		$this->db->like('pnombre',$paciente);
		$this->db->or_like('papellido',$paciente);
		$this->db->or_like('cedula',$paciente);
		
		$query = $this->db->get('pacientes',10);		
		
		if($query->num_rows > 0){			
			foreach($query->result_array() as $row){
			$resultado[] =  array('id'=>$row['id'],'label'=>$row['pnombre'].' '.$row['papellido'].' '.$row['snombre'].' '.$row['sapellido'], 'ci'=>$row['cedula']);
			}
		 echo json_encode($resultado);
		}	
	}	

		function autocomplete_exp($paciente){
		
		$this->db->distinct();	
		$this->db->select("*, expediente_medico.id as expediente_id");
		$this->db->join('expediente_medico','expediente_medico.pacientes_id=pacientes.id','left');
		$this->db->like('pacientes.pnombre',$paciente);
		$this->db->or_like('pacientes.papellido',$paciente);
		$this->db->or_like('pacientes.cedula',$paciente);
		
		$query = $this->db->get('pacientes',10);		
		
		if($query->num_rows > 0){			
			foreach($query->result_array() as $row){
			$resultado[] =  array('id'=>$row['expediente_id'],'label'=>$row['pnombre'].' '.$row['papellido'].' '.$row['snombre'].' '.$row['sapellido'], 'ci'=>$row['cedula']);
			}
		 echo json_encode($resultado);
		}	
	}	
	
}
