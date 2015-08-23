<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Consulta_model extends CI_Model {

   function __construct() {
        parent::__construct();
    }
 
 	function historia_medica($expediente, $doctorId){		
		$this->db->select("*, historia_medica.id as id");
		$this->db->from('historia_medica');
		$this->db->join('antec_gineco_obstetro','antec_gineco_obstetro.cod_hm=historia_medica.id','left');
		$this->db->join('antec_personales','antec_personales.cod_hm=historia_medica.id','left');
		$this->db->join('examen_funcional','examen_funcional.cod_hm=historia_medica.id','left');
		$this->db->join('hab_psicobiologicos','hab_psicobiologicos.cod_hm=historia_medica.id','left');
		$this->db->join('hab_alimenticios','hab_alimenticios.cod_hm=historia_medica.id','left');
		$this->db->join('doctores','doctores.id=historia_medica.doctores_id','left');
		$this->db->where('expediente_id',$expediente);
		$this->db->where('doctores_id',$doctorId);				
		$query = $this->db->get();		
		return $query->result_array();				
	}
 
 	function guardar_historia($cita,$data,$gine,$fam,$fun,$alim,$psico){
		
	$insertSQL2= $this->db->insert('historia_medica', $data);
	$id_historia=$this->db->insert_id();
		
		if($insertSQL2) {

		$gine['cod_hm']  = $id_historia;
		$fam['cod_hm']   = $id_historia;
		$fun['cod_hm']   = $id_historia;
		$alim['cod_hm']  = $id_historia;
		$psico['cod_hm'] = $id_historia;
		
		$insertSQL3= $this->db->insert('antec_gineco_obstetro', $gine);
		$insertSQL4= $this->db->insert('antec_personales', $fam);
		$insertSQL5= $this->db->insert('examen_funcional', $fun);
		$insertSQL6= $this->db->insert('hab_psicobiologicos',$psico);
		$insertSQL7= $this->db->insert('hab_alimenticios', $alim);
			
			$this->session->set_flashdata('info', 'La historia médica fue registrada con éxito');
			redirect(base_url() . 'consulta/medica/'.$cita, 'refresh');	
			
		}else{
			
			$this->session->set_flashdata('error', 'Error al registrar la historia médica');
			redirect(base_url() . 'consulta/medica/'.$cita, 'refresh');
		}
			
	}
 
   function actualizar_historia($cita,$historia,$gine,$fam,$fun,$alim,$psico){		
		
		$this->db->where('cod_hm', $historia);
        $update_gineco=$this->db->update('antec_gineco_obstetro', $gine);	

		$this->db->where('cod_hm', $historia);
        $update_personal=$this->db->update('antec_personales', $fam);
		
		$this->db->where('cod_hm', $historia);
        $update_funcional=$this->db->update('examen_funcional', $fun);
		
		$this->db->where('cod_hm', $historia);
        $update_alim=$this->db->update('hab_alimenticios', $alim);

		$this->db->where('cod_hm', $historia);
        $update_psico=$this->db->update('hab_psicobiologicos', $psico);		
		
		if($update_gineco && $update_personal && $update_funcional && $update_alim && $update_psico) {
			
			$this->session->set_flashdata('info', 'La historia médica fue actualizada con éxito');
			redirect(base_url() . 'consulta/medica/'.$cita, 'refresh');	
			
        }else{
			
			$this->session->set_flashdata('error', 'Error al intentar actualizar la historia médica, intente de nuevo');
			redirect(base_url() . 'consulta/medica/'.$cita, 'refresh');	
			
        }
		
	}
 
 	function get_consultas($doctor,$expediente){		
		$this->db->select("*, consulta.id as id");
		$this->db->join('signos_vitales','signos_vitales.consulta_id=consulta.id','left');
		$this->db->where('expediente_id',$expediente);
		$this->db->where('doctores_id',$doctor);
		$this->db->order_by('consulta.id', 'DESC');	
		$query = $this->db->get('consulta',10);				
		return $query->result_array();				
	}
 
 	function get_consulta($consulta){		
		$this->db->select("*, consulta.id as id");
		$this->db->from('consulta');
		$this->db->join('signos_vitales','signos_vitales.consulta_id=consulta.id','left');
		$this->db->join('expediente_medico','expediente_medico.id=consulta.expediente_id','left');
		$this->db->join('pacientes','pacientes.id=expediente_medico.pacientes_id','left');
		$this->db->where('consulta.id',$consulta);
		$query = $this->db->get();				
		return $query->result_array();				
	}
 
	function guardar_consulta($cita,$data,$signos){
	
	$insertSQL= $this->db->insert('consulta', $data);
	$id_consulta=$this->db->insert_id();
	
	$signos['consulta_id'] = $id_consulta;

		if($insertSQL) {
		
			$this->db->insert('signos_vitales', $signos);
			$this->session->set_flashdata('resumen', $id_consulta);	
			$this->session->set_flashdata('info', 'La informacón de la consulta fue guardada con éxito');
			redirect(base_url() . 'consulta/historial/'.$cita, 'refresh');	
			
		}else{
			$this->session->set_flashdata('error', 'Error al intentar guardar datos, intente de nuevo');
			redirect(base_url() . 'consulta/historial/'.$cita, 'refresh');	
        }
	
	} 
 
 	function borrar_consulta($consulta){			
		$this->db->where('id', $consulta);
		$this->db->delete('consulta');	
	}
	
   function actualizar_consulta($cita,$consulta,$data,$signos){	
	
		$this->db->where('id', $consulta);
        $updateSQL=$this->db->update('consulta', $data);

		$this->db->where('consulta_id', $consulta);
        $update_signo=$this->db->update('signos_vitales', $signos);		
		
		if($updateSQL && $update_signo) {
			$this->session->set_flashdata('consulta_modificada', $consulta);
			$this->session->set_flashdata('info', 'La consulta fue actualizada con éxito');
			redirect(base_url() . 'consulta/historial/'.$cita, 'refresh');	
			
        }else{
			
			$this->session->set_flashdata('error', 'Error al intentar actualizar la consulta, intente de nuevo');
			redirect(base_url() . 'consulta/historial/'.$cita, 'refresh');	
			
        }		
	}
	
 	function get_recipe($cita){	
		$this->db->select("*");
		$this->db->where("citas_id",$cita);		
		$query = $this->db->get('recipe');		
		return $query->result_array();	
	}
	
	function get_orden($cita){	
		$this->db->select("*, orden_terapia.id as id, doctores.pnombre as nombre_doc, doctores.papellido as apellido_doc");
		$this->db->join('doctores','doctores.id=orden_terapia.doctores_id','left');
		$this->db->where("citas_id",$cita);		
		$query = $this->db->get('orden_terapia');		
		return $query->result_array();	
	}
	
 	function get_imprimir($tipo,$doc_id){	
		$this->db->select("*");
		$this->db->where("doc_id",$doc_id);	
		$this->db->where("tipo",$tipo);		
		$query = $this->db->get('impresiones');		
		return $query->result_array();	
	}
	
 	function get_recipe_imprimir($recipe){	
		$this->db->select("*,doctores.pnombre as nombre_doc, doctores.papellido as apellido_doc, pacientes.cedula as cedula_pac");
		$this->db->join('doctores','doctores.id=recipe.doctores_id','left');
		$this->db->join('expediente_medico','expediente_medico.id=recipe.expediente_id','left');
		$this->db->join('pacientes','pacientes.id=expediente_medico.pacientes_id','left');
		$this->db->where("recipe.id",$recipe);		
		$query = $this->db->get('recipe');		
		return $query->result_array();	
	} 
	
	function get_recipe_anterior($doctor,$expediente){	
		$this->db->select("*,doctores.pnombre as nombre_doc, doctores.papellido as apellido_doc, pacientes.cedula as cedula_pac");
		$this->db->join('doctores','doctores.id=recipe.doctores_id','left');
		$this->db->join('expediente_medico','expediente_medico.id=recipe.expediente_id','left');
		$this->db->join('pacientes','pacientes.id=expediente_medico.pacientes_id','left');
		$this->db->where("recipe.expediente_id",$expediente);
		$this->db->where("recipe.doctores_id",$doctor);	
		$this->db->order_by('recipe.id', 'DESC');		
		$query = $this->db->get('recipe',1);		
		return $query->result_array();	
	} 
 

	function guardar_recipe($cita,$data){
	
		if($data['id']==NULL){
			
			$this->db->insert('recipe', $data);
			
			$this->session->set_flashdata('info', 'La informacón del récipe fue guardada con éxito');
			redirect(base_url() . 'consulta/recipe/'.$cita, 'refresh');
			
		}else{
			
			$this->db->where('id', $data['id']);
            $this->db->update('recipe', $data);
			
			$this->session->set_flashdata('info', 'El récipe fue actualizado con éxito');
			redirect(base_url() . 'consulta/recipe/'.$cita, 'refresh');	
		}

	}	
	
 	function guardar_orden($cita,$data){
	
		if($data['id']==NULL){
			
			$this->db->insert('orden_terapia', $data);
			
			$this->session->set_flashdata('info', 'La informacón de la orden de terapia fue guardada con éxito');
			redirect(base_url() . 'consulta/orden_terapia/'.$cita, 'refresh');
			
		}else{
			
			$this->db->where('id', $data['id']);
            $this->db->update('orden_terapia', $data);
			
			$this->session->set_flashdata('info', 'La orden de terapia fue actualizada con éxito');
			redirect(base_url() . 'consulta/orden_terapia/'.$cita, 'refresh');	
		}

	}	
	 
	
}
