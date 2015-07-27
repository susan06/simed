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
  
		$insertSQL= $this->db->insert('pacientes', $data);
		
		if($insertSQL) {
					$this->session->set_flashdata('info', 'El Paciente '.$data['pnombre'].' '.$data['papellido'].' fue registrado con éxito!');
					redirect(base_url() . 'pacientes/registrar', 'refresh');			 
        }else{
					$this->session->set_flashdata('error', '¡Error al registrar al paciente!');
					redirect(base_url() . 'pacientes/registrar', 'refresh');		
        }
						
	}

	
    function actualizar($codigo,$cedula,$nombre1,$apellido1,$nombre2,$apellido2,$edad,$sexo,$nacimiento,$fecha_nac,$profesion,$estado_civil,$edad,$direccion,$email,$tlf,$representante,$parentesco_legal){	
	
		$datos_paciente = array(
			'id_paciente' => $cedula,
			'primer_nom_pac' => $nombre1,
			'primer_apell_pac' => $apellido1,
			'segundo_nom_pac' => $nombre2,
			'segundo_apell_pac' => $apellido2,
			'edad_pac' => $edad,
			'sexo_pac' => $sexo,
			'lugar_nacim_pac' => $nacimiento,
			'fecha_nacim_pac' => $fecha_nac,
			'profesion_pac' => $profesion,
			'estado_civil_pac' => $estado_civil,
			'edad_pac' => $edad,
			'direccion_pac' => $direccion,
			'email_pac' => $email,
			'tlf_pac' => $tlf,
			'nombre_rlegal' => $representante,
			'parentesco_rlegal' => $parentesco_legal,
		);
		
		$this->db->where('num_pac', $codigo);
        $updateSQL=$this->db->update('pacientes', $datos_paciente);	
		
		if($updateSQL) {
				 ?> 
							<script language="javascript"> 
							alert("Datos actualizados exitosamente"); 
							location.href = '<?php echo base_url(); ?>index.php/pacientes';
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
    
	function eliminar($id_paciente){
			
		$this->db->where('id', $id_paciente);
		$this->db->delete('pacientes');	
	}
	

	
}
