<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Home_model extends CI_Model {

   function __construct() {
        parent::__construct();
    }
 
	function get_pacientes(){	
		$this->db->select("*");
		$this->db->from('pacientes');			
		$query = $this->db->get();		
		return $query->result_array();			
	}

	function get_doctores(){	
		$this->db->select("*");
		$this->db->from('doctores');			
		$query = $this->db->get();		
		return $query->result_array();			
	}	

	function get_enfermeras(){	
		$this->db->select("*");
		$this->db->from('usuarios');	
        $this->db->where('roles_id',2);		
		$query = $this->db->get();		
		return $query->result_array();			
	}
	
	function get_terapistas(){	
		$this->db->select("*");
		$this->db->from('usuarios');
		$this->db->where('roles_id',4);			
		$query = $this->db->get();		
		return $query->result_array();			
	}	

	function get_sexo(){	
		$this->db->select("sexo, COUNT(sexo) as sexo_total");
		$this->db->from('pacientes');
		$this->db->group_by("sexo"); 		
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){
				
				if($row['sexo'] == 'F'){ $label_sexo = 'Femenino';	$color= '#f56954';  $highlight= '#f56954'; };
				if($row['sexo'] == 'M'){ $label_sexo = 'Masculino';	$color= '#00c0ef';  $highlight= '#00c0ef';}
				
				$results[] = array('data' => $row['sexo_total'], 'color' => $color, 'highlight' => $highlight,'label' => $label_sexo);
				
			}
		}else{
			 $results[] = null;
		}
		
		return json_encode($results);			
	}	
	
	function get_edad(){
		
		$this->db->select("edad, COUNT(edad) as edad_total");
		$this->db->from('pacientes');
		$this->db->where("edad >= ", 1);
		$this->db->where("edad <=", 12);		
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){

				$results[] = array('value' => $row['edad_total'], 'color' => '#f56954', 'highlight' => '#f56954','label' => '1 a 12 años');
				
			}
		}
		
	
		$this->db->select("edad, COUNT(edad) as edad_total");
		$this->db->from('pacientes');
		$this->db->where("edad >= ", 13);
		$this->db->where("edad <=", 17);		
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){

				$results[] = array('value' => $row['edad_total'], 'color' => '#3c8dbc', 'highlight' => '#3c8dbc','label' => '13 a 17 años');
				
			}
		}
		
		$this->db->select("edad, COUNT(edad) as edad_total");
		$this->db->from('pacientes');
		$this->db->where("edad >= ", 18);
		$this->db->where("edad <=", 65);		
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){

				$results[] = array('value' => $row['edad_total'], 'color' => '#00a65a', 'highlight' => '#00a65a','label' => '18 a 65 años');
				
			}
		}
	
		
		return json_encode($results);			
	}
	
	function get_consulta(){
	
		/*Rango de fechas*/
		$mes10=date('Y').'-01-01';
		$mes11=date('Y').'-01-31';

		$mes20=date('Y').'-02-01';
		$mes21=date('Y').'-02-29';

		$mes30=date('Y').'-03-01';
		$mes31=date('Y').'-03-31';

		$mes40=date('Y').'-04-01';
		$mes41=date('Y').'-04-31';

		$mes50=date('Y').'-05-01';
		$mes51=date('Y').'-05-31';

		$mes60=date('Y').'-06-01';
		$mes61=date('Y').'-06-31';

		$mes70=date('Y').'-07-01';
		$mes71=date('Y').'-07-31';

		$mes80=date('Y').'-08-01';
		$mes81=date('Y').'-08-31';

		$mes90=date('Y').'-09-01';
		$mes91=date('Y').'-09-31';

		$mes100=date('Y').'-10-01';
		$mes101=date('Y').'-10-31';

		$mes110=date('Y').'-11-01';
		$mes111=date('Y').'-11-31';

		$mes120=date('Y').'-12-01';
		$mes121=date('Y').'-12-31';
		

		$this->db->select("fecha,expediente_id, COUNT(expediente_id) as consulta_total");
		$this->db->from('consulta');					
		$this->db->where("fecha >= ", $mes10);
		$this->db->where("fecha <=", $mes11);		
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){

				$results[] = $row['consulta_total'];
				
			}
		}	
	
		$this->db->select("fecha,expediente_id, COUNT(expediente_id) as consulta_total");
		$this->db->from('consulta');	
		$this->db->where("fecha >= ", $mes20);
		$this->db->where("fecha <=", $mes21);		
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){

				$results[] = $row['consulta_total'];
				
			}
		}

		$this->db->select("fecha,expediente_id, COUNT(expediente_id) as consulta_total");
		$this->db->from('consulta');	
		$this->db->where("fecha >= ", $mes30);
		$this->db->where("fecha <=", $mes31);		
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){

				$results[] = $row['consulta_total'];
				
			}
		}	

		$this->db->select("fecha,expediente_id, COUNT(expediente_id) as consulta_total");
		$this->db->from('consulta');	
		$this->db->where("fecha >= ", $mes40);
		$this->db->where("fecha <=", $mes41);		
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){

				$results[] = $row['consulta_total'];
				
			}
		}	

		$this->db->select("fecha,expediente_id, COUNT(expediente_id) as consulta_total");
		$this->db->from('consulta');	
		$this->db->where("fecha >= ", $mes50);
		$this->db->where("fecha <=", $mes51);		
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){

				$results[] = $row['consulta_total'];
				
			}
		}	

		$this->db->select("fecha,expediente_id, COUNT(expediente_id) as consulta_total");
		$this->db->from('consulta');	
		$this->db->where("fecha >= ", $mes60);
		$this->db->where("fecha <=", $mes61);		
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){

				$results[] = $row['consulta_total'];
				
			}
		}

		$this->db->select("fecha,expediente_id, COUNT(expediente_id) as consulta_total");
		$this->db->from('consulta');	
		$this->db->where("fecha >= ", $mes70);
		$this->db->where("fecha <=", $mes71);		
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){

				$results[] = $row['consulta_total'];
				
			}
		}

		$this->db->select("fecha,expediente_id, COUNT(expediente_id) as consulta_total");
		$this->db->from('consulta');	
		$this->db->where("fecha >= ", $mes80);
		$this->db->where("fecha <=", $mes81);		
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){

				$results[] = $row['consulta_total'];
				
			}
		}

		$this->db->select("fecha,expediente_id, COUNT(expediente_id) as consulta_total");
		$this->db->from('consulta');	
		$this->db->where("fecha >= ", $mes90);
		$this->db->where("fecha <=", $mes91);		
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){

				$results[] = $row['consulta_total'];
				
			}
		}
		
	$this->db->select("fecha,expediente_id, COUNT(expediente_id) as consulta_total");
		$this->db->from('consulta');	
		$this->db->where("fecha >= ", $mes100);
		$this->db->where("fecha <=", $mes101);		
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){

				$results[] = $row['consulta_total'];
				
			}
		}

	$this->db->select("fecha,expediente_id, COUNT(expediente_id) as consulta_total");
		$this->db->from('consulta');	
		$this->db->where("fecha >= ", $mes110);
		$this->db->where("fecha <=", $mes111);		
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){

				$results[] = $row['consulta_total'];
				
			}
		}

	$this->db->select("fecha,expediente_id, COUNT(expediente_id) as consulta_total");
		$this->db->from('consulta');	
		$this->db->where("fecha >= ", $mes120);
		$this->db->where("fecha <=", $mes121);		
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){

				$results[] = $row['consulta_total'];
				
			}
		}
		
		return json_encode($results);			
	}

		function get_terapia(){
	
		/*Rango de fechas*/
		$mes10=date('Y').'-01-01';
		$mes11=date('Y').'-01-31';

		$mes20=date('Y').'-02-01';
		$mes21=date('Y').'-02-29';

		$mes30=date('Y').'-03-01';
		$mes31=date('Y').'-03-31';

		$mes40=date('Y').'-04-01';
		$mes41=date('Y').'-04-31';

		$mes50=date('Y').'-05-01';
		$mes51=date('Y').'-05-31';

		$mes60=date('Y').'-06-01';
		$mes61=date('Y').'-06-31';

		$mes70=date('Y').'-07-01';
		$mes71=date('Y').'-07-31';

		$mes80=date('Y').'-08-01';
		$mes81=date('Y').'-08-31';

		$mes90=date('Y').'-09-01';
		$mes91=date('Y').'-09-31';

		$mes100=date('Y').'-10-01';
		$mes101=date('Y').'-10-31';

		$mes110=date('Y').'-11-01';
		$mes111=date('Y').'-11-31';

		$mes120=date('Y').'-12-01';
		$mes121=date('Y').'-12-31';
		

		$this->db->select("fecha,orden_id, COUNT(orden_id) as total");
		$this->db->from('aplicacion_terapia');	
		$this->db->where("fecha >= ", $mes10);
		$this->db->where("fecha <=", $mes11);		
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){

				$results[] = $row['total'];
				
			}
		}	
	
		$this->db->select("fecha,orden_id, COUNT(orden_id) as total");
		$this->db->from('aplicacion_terapia');	
		$this->db->where("fecha >= ", $mes20);
		$this->db->where("fecha <=", $mes21);		
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){

				$results[] = $row['total'];
				
			}
		}

		$this->db->select("fecha,orden_id, COUNT(orden_id) as total");
		$this->db->from('aplicacion_terapia');	
		$this->db->where("fecha >= ", $mes30);
		$this->db->where("fecha <=", $mes31);		
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){

				$results[] = $row['total'];
				
			}
		}	

		$this->db->select("fecha,orden_id, COUNT(orden_id) as total");
		$this->db->from('aplicacion_terapia');	
		$this->db->where("fecha >= ", $mes40);
		$this->db->where("fecha <=", $mes41);		
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){

				$results[] = $row['total'];
				
			}
		}	

		$this->db->select("fecha,orden_id, COUNT(orden_id) as total");
		$this->db->from('aplicacion_terapia');	
		$this->db->where("fecha >= ", $mes50);
		$this->db->where("fecha <=", $mes51);		
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){

				$results[] = $row['total'];
				
			}
		}	

		$this->db->select("fecha,orden_id, COUNT(orden_id) as total");
		$this->db->from('aplicacion_terapia');	
		$this->db->where("fecha >= ", $mes60);
		$this->db->where("fecha <=", $mes61);		
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){

				$results[] = $row['total'];
				
			}
		}

		$this->db->select("fecha,orden_id, COUNT(orden_id) as total");
		$this->db->from('aplicacion_terapia');	
		$this->db->where("fecha >= ", $mes70);
		$this->db->where("fecha <=", $mes71);		
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){

				$results[] = $row['total'];
				
			}
		}

		$this->db->select("fecha,orden_id, COUNT(orden_id) as total");
		$this->db->from('aplicacion_terapia');	
		$this->db->where("fecha >= ", $mes80);
		$this->db->where("fecha <=", $mes81);		
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){

				$results[] = $row['total'];
				
			}
		}

		$this->db->select("fecha,orden_id, COUNT(orden_id) as total");
		$this->db->from('aplicacion_terapia');	
		$this->db->where("fecha >= ", $mes90);
		$this->db->where("fecha <=", $mes91);		
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){

				$results[] = $row['total'];
				
			}
		}
		
	$this->db->select("fecha,orden_id, COUNT(orden_id) as total");
		$this->db->from('aplicacion_terapia');	
		$this->db->where("fecha >= ", $mes100);
		$this->db->where("fecha <=", $mes101);		
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){

				$results[] = $row['total'];
				
			}
		}

	$this->db->select("fecha,orden_id, COUNT(orden_id) as total");
		$this->db->from('aplicacion_terapia');	
		$this->db->where("fecha >= ", $mes110);
		$this->db->where("fecha <=", $mes111);		
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){

				$results[] = $row['total'];
				
			}
		}

	$this->db->select("fecha,orden_id, COUNT(orden_id) as total");
		$this->db->from('aplicacion_terapia');	
		$this->db->where("fecha >= ", $mes120);
		$this->db->where("fecha <=", $mes121);		
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){

				$results[] = $row['total'];
				
			}
		}
			
		return json_encode($results);			
	}
	
	function get_terapias(){

		$this->db->select("terapias.descripcion as terapia, aplicacion_terapia.terapias_id, COUNT(aplicacion_terapia.terapias_id) as total");
		$this->db->join('terapias','terapias.id=aplicacion_terapia.terapias_id','left');
		$this->db->from('aplicacion_terapia');
		$this->db->group_by("aplicacion_terapia.terapias_id"); 
		$query 	= 	$this->db->get();
		$res	=	$query->result_array();			

		if($query->num_rows() > 0){
			
			foreach($res as $row){

				$results[] = array($row['terapia'],$row['total']);
				
			}
		}else{
				$results[] =array(0,0);
			}	
		
		return json_encode($results);			
	}
	

}
