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
			
			$this->session->set_flashdata('info', 'La consulta fue actualizada con éxito');
			redirect(base_url() . 'consulta/historial/'.$cita, 'refresh');	
			
        }else{
			
			$this->session->set_flashdata('error', 'Error al intentar actualizar la consulta, intente de nuevo');
			redirect(base_url() . 'consulta/historial/'.$cita, 'refresh');	
			
        }		
	}
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
	function get_recipe_anterior($doctor,$paciente){	
		$this->db->select("*");
		$this->db->join('centro_medico','centro_medico.id=recipe.centro_medico','left');
		$this->db->join('doctor','doctor.id_doctor=recipe.id_doctor','left');
		$this->db->join('pacientes','pacientes.num_pac=recipe.num_pac','left');
		$this->db->where("recipe.num_pac",$paciente);
		$this->db->where("recipe.id_doctor",$doctor);	
		$this->db->order_by('recipe.cod_recipe', 'DESC');		
		$query = $this->db->get('recipe',1);		
		return $query->result_array();	
	}
	

	
	function get_consulta_fecha($fecha,$paciente,$doctor){		
		$this->db->select("*");
		$this->db->from('consulta');
		$this->db->join('signos_vitales','signos_vitales.cod_consulta=consulta.cod_consulta','left');
		$this->db->join('diagnostico_cie10','diagnostico_cie10.cod_consulta=consulta.cod_consulta','left');
		$this->db->join('cie10','cie10.cod_cie_10=diagnostico_cie10.cod_cie_10','left');
		$this->db->like('consulta.fecha_consul',$fecha);
		$this->db->where('consulta.num_pac',$paciente);
		$this->db->where('consulta.id_doctor',$doctor);
		$query = $this->db->get();				
		return $query->result_array();				
	}
	
	function get_consulta_pac($consulta){		
		$this->db->select("*");
		$this->db->from('consulta');
		$this->db->where('cod_consulta',$consulta);	
		$query = $this->db->get();				
		return $query->result_array();				
	}
	
 
	
	function autocompletar_cie($cie){
		
		$this->db->distinct();	
		$this->db->select("descripcion_cie, cod_cie_10");
		$this->db->like('descripcion_cie',$cie);		
		$query = $this->db->get('cie10',8);		
		
		if($query-> num_rows > 0){
			
			foreach($query->result_array() as $row){
			$resultado[] =  array('id'=>$row['cod_cie_10'],'label'=>utf8_decode($row['descripcion_cie']));
			}
		 echo json_encode($resultado);
		}	
	} 
	
	function autocompletar_motivo($motivo){
		
		$this->db->distinct();	
		$this->db->select("*");
		$this->db->like('motivo_consul',$motivo);		
		$query = $this->db->get('consulta',5);		
		
		if($query-> num_rows > 0){		
			foreach($query->result_array() as $row){
			$resultado[] =  array('id'=>$row['cod_consulta'],'label'=>$row['motivo_consul']);
			}
		 echo json_encode($resultado);
		}	
	}  
	
 
	
	function guardar_recipe($doctor,$paciente,$estado,$cita,$fecha_e,$fecha_v,$rp,$indicaciones,$expediente){
	
	if($expediente==0){
	
	$datos_expediente = array(
			'num_pac' => $paciente,
			'fecha' => $fecha_e
		);
		
	$insertSQL= $this->db->insert('expediente_medico', $datos_expediente);
	$expediente=$this->db->insert_id();
	}
	
	$datos_recipe = array(
			'cod_exp_med' => $expediente,
			'fecha_emision' => $fecha_e,
			'fecha_expiracion' => $fecha_v,
			'num_pac' => $paciente,
			'id_doctor' => $doctor,
			'rp' => nl2br($rp),
			'indicaciones' => nl2br($indicaciones)
		);	
		
	$insertSQL2= $this->db->insert('recipe', $datos_recipe);
	
	if($insertSQL2) {
				 ?> 
							<script language="javascript"> 
							alert("Datos del recipe guardados exitosamente"); 
							window.parent.location = '<?php echo base_url(); ?>index.php/consulta/historia_medica?num_pac=<?php echo $paciente; ?>&doctorID=<?php echo $doctor; ?>&estado=<?php echo $estado; ?>&cita=<?php echo $cita; ?>';
							</script> 							
				<?php
        }else{
				    ?> 
							<script language="javascript"> 
							alert("Ha ocurrido un error y no se registraron los datos."); 
							</script> 
					<?php 		
        }
	}	
	
   
	


	function culminar_consulta($espera,$cita){	
	
		$datos_espera = array('estado' => 'Atendido',);	
		
		$this->db->where('cod_espera_consulta', $espera);
        $this->db->update('espera_consulta', $datos_espera);	

		$datos_cita = array('estado' => 'Atendido');	
		
		$this->db->where('cod_cita', $cita);
        $this->db->update('cita_medica', $datos_cita);		
	}

	
}
