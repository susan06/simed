<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Expediente_model extends CI_Model {

   function __construct() {
        parent::__construct();
    }
 
	function expediente($paciente){	
		$this->db->select("*");
		$this->db->from('expediente_medico');
		$this->db->where("pacientes_id",$paciente);				
		$query = $this->db->get();		
		return $query->result_array();
	}

	function expediente_pac($expediente){	
		$this->db->select("*");
		$this->db->from('expediente_medico');
		$this->db->where("id",$expediente);				
		$query = $this->db->get();		
		return $query->result_array();
	}
	
	function get_consultas($expediente){		
		$this->db->select("*, consulta.id as id, doctores.pnombre as nombre_doc, doctores.papellido as apellido_doc");
		$this->db->join('signos_vitales','signos_vitales.consulta_id=consulta.id','left');
		$this->db->join('especialidades','especialidades.id = consulta.especialidades_id');
		$this->db->join('doctores','doctores.id=consulta.doctores_id','left');
		$this->db->join('expediente_medico','expediente_medico.id=consulta.expediente_id','left');
		$this->db->join('pacientes','pacientes.id=expediente_medico.pacientes_id','left');
		$this->db->where('consulta.expediente_id',$expediente);
		$this->db->order_by('consulta.id', 'DESC');	
		$query = $this->db->get('consulta');				
		return $query->result_array();				
	}

	function get_recipes($expediente){		
		$this->db->select("*, recipe.id as id, doctores.pnombre as nombre_doc, doctores.papellido as apellido_doc");
		$this->db->join('doctores','doctores.id=recipe.doctores_id','left');
		$this->db->join('expediente_medico','expediente_medico.id=recipe.expediente_id','left');
		$this->db->join('pacientes','pacientes.id=expediente_medico.pacientes_id','left');
		$this->db->where('recipe.expediente_id',$expediente);
		$this->db->order_by('recipe.id', 'DESC');	
		$query = $this->db->get('recipe');				
		return $query->result_array();				
	}

	function get_ordenes($expediente){		
		$this->db->select("*, orden_terapia.id as id, doctores.pnombre as nombre_doc, doctores.papellido as apellido_doc");
		$this->db->join('doctores','doctores.id=orden_terapia.doctores_id','left');
		$this->db->join('expediente_medico','expediente_medico.id=orden_terapia.expediente_id','left');
		$this->db->join('pacientes','pacientes.id=expediente_medico.pacientes_id','left');
		$this->db->where('orden_terapia.expediente_id',$expediente);
		$this->db->order_by('orden_terapia.id', 'DESC');	
		$query = $this->db->get('orden_terapia');				
		return $query->result_array();				
	}

	function get_procedimientos($expediente){	
		$this->db->select("*, procedimientos.id as id");
		$this->db->join('expediente_medico','expediente_medico.id=procedimientos.expediente_id','left');
		$this->db->join('pacientes','pacientes.id=expediente_medico.pacientes_id','left');
		$this->db->where("procedimientos.expediente_id",$expediente);		
		$this->db->order_by('procedimientos.id', 'DESC');	
		$query = $this->db->get('procedimientos');			
		return $query->result_array();	
	}		

	function get_examenes($expediente){	
		$this->db->select("*, examenes.id as id");
		$this->db->join('expediente_medico','expediente_medico.id=examenes.expediente_id','left');
		$this->db->join('pacientes','pacientes.id=expediente_medico.pacientes_id','left');
		$this->db->where("examenes.expediente_id",$expediente);		
		$this->db->order_by('examenes.id', 'DESC');	
		$query = $this->db->get('examenes');			
		return $query->result_array();	
	}		

  	function historia_medica($id){		
		$this->db->select("*, historia_medica.id as id");
		$this->db->from('historia_medica');
		$this->db->join('antec_gineco_obstetro','antec_gineco_obstetro.cod_hm=historia_medica.id','left');
		$this->db->join('antec_personales','antec_personales.cod_hm=historia_medica.id','left');
		$this->db->join('examen_funcional','examen_funcional.cod_hm=historia_medica.id','left');
		$this->db->join('hab_psicobiologicos','hab_psicobiologicos.cod_hm=historia_medica.id','left');
		$this->db->join('hab_alimenticios','hab_alimenticios.cod_hm=historia_medica.id','left');
		$this->db->join('doctores','doctores.id=historia_medica.doctores_id','left');
		$this->db->where('historia_medica.id',$id);			
		$query = $this->db->get();		
		return $query->result_array();				
	}

	function pac_historia($historia){		
		$this->db->select("*, historia_medica.id as id, pacientes.id as paciente_id");
		$this->db->from('historia_medica');
		$this->db->join('expediente_medico','expediente_medico.id=historia_medica.expediente_id','left');
		$this->db->join('pacientes','pacientes.id=expediente_medico.pacientes_id','left');
		$this->db->where('historia_medica.id',$historia);			
		$query = $this->db->get();		
		return $query->result_array();				
	}	
	function eliminar_orden($id){
			
		$this->db->where('id', $id);
		$this->db->delete('orden_terapia');	
	}

	function eliminar_historia($id){
			
		$this->db->where('id', $id);
		$this->db->delete('historia_medica');	
	}	

	function eliminar_recipe($id){
			
		$this->db->where('id', $id);
		$this->db->delete('recipe');	
	}

	function eliminar_consulta($id){
			
		$this->db->where('id', $id);
		$this->db->delete('consulta');	
	}	
}
