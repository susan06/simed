<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Doctores_model extends CI_Model {

   function __construct() {
        parent::__construct();
    }
 
	function get_lista_doctores(){	
		$this->db->select("*");
		$this->db->from('doctor');			
		$query = $this->db->get();		
		return $query->result_array();			
	}	
	
	function get_especialidades(){	
		$this->db->select("*");
		$this->db->from('especialidad');			
		$query = $this->db->get();
		
		echo "<option value=''>--Seleccione especialidad--</option>";
				 
		foreach($query->result_array() as $row){
		 
		 echo "<option value='".$row["cod_especialidad"]."'>".$row["descripcion_espec"]."</option>"; 
		}
		
	}
	
	function especialidades_doctor($doctor){	
		$this->db->select("*");
		$this->db->from('doctor_especialidad');
		$this->db->join('especialidad','especialidad.cod_especialidad=doctor_especialidad.cod_espec');
		$this->db->where('id_doctor',$doctor);		
		$query = $this->db->get();	

		foreach($query->result_array() as $row){
		
		 echo "<option value='".$row["cod_espec"]."'>".$row["descripcion_espec"]."</option>"; 
		}		
					
	}
		
    function get_datos_doctor($doctorId){	
		$this->db->select('*');
		$this->db->from('doctor');
		$this->db->where('id_doctor',$doctorId);
		$query = $this->db->get();		
		return $query->result_array();		
	}
	

    function actualizar($doctorId,$nombre,$apellido,$rif,$mpps){	
	
		$datos_doctor = array(
			'nom_doc' => $nombre,
			'apell_doc' => $apellido,
			'rif_doc' => $rif,
			'mpps_doc' => $mpps
		);
		
		$this->db->where('id_doctor', $doctorId);
        $updateSQL=$this->db->update('doctor', $datos_doctor);	
		
		if($updateSQL) {
				 ?> 
							<script language="javascript"> 
							alert("Datos actualizados exitosamente"); 
							location.href = '<?php echo base_url(); ?>index.php/doctores';
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
	
    function agregar_especialidad($especialidad){
  
		$datos_especialidad = array(
			'descripcion_espec' => $especialidad,
		);
		
		$insertSQL= $this->db->insert('especialidad', $datos_especialidad);
						
	}
	
	function asociar_especialidad($doctor,$especialidad){
  
		$asociar_especialidad = array(
			'id_doctor'=> $doctor,
			'cod_espec' => $especialidad
		);
		
		$insertSQL= $this->db->insert('doctor_especialidad', $asociar_especialidad);
		
		header("Location:especialidad");					
	}
	
	function borrar_doctor($id_doctor){			
		$this->db->where('id_doctor', $id_doctor);
		$this->db->delete('doctor');	
	}
	
	function buscar_doctor($id_doctor){
		
		$doctor=array();
		
		$this->db->select('nombre_usuario, apellido_usuario');
		$this->db->where('ci_usuario',$id_doctor);
		$query = $this->db->get('usuario');	
		
		foreach($query->result_array() as $row){
		$doctor['nombre'] =  utf8_decode($row['nombre_usuario']);
		$doctor['apellido'] = utf8_decode($row['apellido_usuario']);
		}
		echo json_encode($doctor);
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