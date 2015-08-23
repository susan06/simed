<?php 
/* file consulta.php */
/* Location: ./application/controllers/consulta.php 
* @autor: susan medina
* version 1.0
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consulta extends CI_Controller {

	public function __construct() {
				parent::__construct();

				$this->load->library(array('session'));
				$this->load->library( 'session_php' );
				$this->load->helper(array('url','form','html','date')); 				
				$this->load->model('crud_model');
				$this->load->model('consulta_model');
				$this->load->model('citas_model');
				$this->load->library('bcrypt');
				$this->load->database('default'); 			
				$this->removeCache();

				$nick = $this->session_php->get();
				$rol = $this->session_php->get_rol();
				$sexo = $this->session_php->get_sexo();
				$url = current_url();
				
				if($this->session->userdata('is_logued_in') == FALSE)
				{
					$this->session->set_flashdata('nick', $nick );
					$this->session->set_flashdata('rol',  $rol);
					$this->session->set_flashdata('sexo',  $sexo);
					$this->session->set_flashdata('url_actual', $url );
					redirect(base_url() . 'login/lock_screen', 'refresh' );
				}
			}
		
	public function removeCache()
	{
		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
		$this->output->set_header('Pragma: no-cache');
	}
	
	public function permisos() 
	{
		
		$modulo = $this->crud_model->get_id_mod("Consulta"); 
		$permisos = $this->crud_model->get_permisos($this->session->userdata('rol'),$modulo);
		return $permisos;
	}	

	public function sala_espera(){		
		
		$data['page_title'] = 'Consulta';
		$data['system_title'] = 'Pacientes';
		
		$doctor_user= $this->session->userdata('id'); 
		
		$this->load->model('doctores_model');
		
		$doctor = $this->doctores_model->get_datos_doctor($doctor_user);	
		
		$this->load->model('espera_model');
		
		$query = $this->espera_model->get_lista_consulta_doc($doctor[0]['id']);
		
		if($query){
			$data['pac_consultas'] =  $query;
		}else{
			$data['pac_consultas'] =  NULL;
		}		

        $this->load->view('consulta/sala_espera', $data);

	}	
	
	public function medica($cita){		
		
		$data['page_title'] = 'Consulta';
		$data['system_title'] = 'Historia médica';
		$data['cita'] =  $cita;
							
		$cita_datos = $this->citas_model->get_datos_cita($cita);
		
		$this->load->model('doctores_model');		
		$doctor = $this->doctores_model->get_datos_doctor($cita_datos[0]['doctores_id']);
		if($doctor){
			$data['doctor'] =  $doctor;
		}else{
			$data['doctor'] =  NULL;
		}
		
		$this->load->model('pacientes_model');
		$paciente = $this->pacientes_model->get_datos_paciente($cita_datos[0]['pacientes_id']);
		if($paciente){
			$data['paciente'] =  $paciente;
		}else{
			$data['paciente'] =  NULL;
		}
		
		$this->load->model('expediente_model');
		
		$expediente = $this->expediente_model->expediente($cita_datos[0]['pacientes_id']);
		
		$data['historia_medica']= 0;

		$historia_medica = $this->consulta_model->historia_medica($expediente[0]['id'], $cita_datos[0]['doctores_id']);
			
		if($historia_medica){
			$data['historia_medica'] =  $historia_medica;
		}	
		
        $this->load->view('consulta/index', $data);

	}	

	public function crear_historia($cita){	
	
		$data['page_title'] = 'Historia médica';
		$data['system_title'] = 'Crear';
		$data['cita'] =  $cita;
		
		$cita_datos = $this->citas_model->get_datos_cita($cita);
	
		$this->load->model('doctores_model');		
		$doctor = $this->doctores_model->get_datos_doctor($cita_datos[0]['doctores_id']);
		if($doctor){
			$data['doctor'] =  $doctor;
		}else{
			$data['doctor'] =  NULL;
		}
		
		$this->load->model('pacientes_model');
		$paciente = $this->pacientes_model->get_datos_paciente($cita_datos[0]['pacientes_id']);
		if($paciente){
			$data['paciente'] =  $paciente;
		}else{
			$data['paciente'] =  NULL;
		}
			
        $this->load->view('consulta/crear_historia', $data);		
	}
		
	public function registrar_historia($cita){
		
		date_default_timezone_set('America/Caracas');
		
		$cita_datos = $this->citas_model->get_datos_cita($cita);
		
		$this->load->model('expediente_model');
		
		$expediente = $this->expediente_model->expediente($cita_datos[0]['pacientes_id']);
		
		$data['expediente_id']= $expediente[0]['id'];
		$data['doctores_id']= $cita_datos[0]['doctores_id'];
		$data['fecha']= date('Y-m-d');
		
		$gine['menarquia'] = $this->input->post('menarquia');
		$gine['menstruacion'] = $this->input->post('menstruacion');
		$gine['regularidad_menst'] = $this->input->post('regularidad_menst');
		$gine['partos'] = $this->input->post('partos');
		$gine['cesarias'] = $this->input->post('cesarias');
		$gine['abortos'] = $this->input->post('abortos');
		$gine['embarazos'] = $this->input->post('embarazos');
		
		$fam['med_cabecera'] = $this->input->post('med_cabecera');
		$fam['alergias'] = $this->input->post('alergias');
		$fam['antec_flia'] = $this->input->post('antec_flia');
		$fam['qx'] = $this->input->post('qx');

		$fun['evacuacion'] = $this->input->post('evacuacion');
		$fun['miccion'] = $this->input->post('miccion');
		$fun['obs'] = $this->input->post('obs');
		
		$alim['leche'] = $this->input->post('leche');
		$alim['cereales'] = $this->input->post('cereales');
		$alim['vegetales'] = $this->input->post('vegetales');
		$alim['frutas'] = $this->input->post('frutas');
		$alim['carnes'] = $this->input->post('carnes');
		$alim['grasas'] = $this->input->post('grasas');
		$alim['almidones'] = $this->input->post('almidones');
		$alim['dulces'] = $this->input->post('dulces');
		$alim['cafe_leche'] = $this->input->post('cafe_leche');
		$alim['granos'] = $this->input->post('granos');


		$psico['alcohol'] = $this->input->post('alcohol');
		$psico['tabaquicos'] = $this->input->post('tabaquicos');
		$psico['cafeicos'] = $this->input->post('cafeicos');
		$psico['medicamentos'] = $this->input->post('medicamentos');
		$psico['otros'] = $this->input->post('otros');

		$this->consulta_model->guardar_historia($cita,$data,$gine,$fam,$fun,$alim,$psico);
		
	}	


	public function actualizar_historia($cita){
		
		$historia = $this->input->post('id');
		
		$gine['menarquia'] = $this->input->post('menarquia');
		$gine['menstruacion'] = $this->input->post('menstruacion');
		$gine['regularidad_menst'] = $this->input->post('regularidad_menst');
		$gine['partos'] = $this->input->post('partos');
		$gine['cesarias'] = $this->input->post('cesarias');
		$gine['abortos'] = $this->input->post('abortos');
		$gine['embarazos'] = $this->input->post('embarazos');
		
		$fam['med_cabecera'] = $this->input->post('med_cabecera');
		$fam['alergias'] = $this->input->post('alergias');
		$fam['antec_flia'] = $this->input->post('antec_flia');
		$fam['qx'] = $this->input->post('qx');

		$fun['evacuacion'] = $this->input->post('evacuacion');
		$fun['miccion'] = $this->input->post('miccion');
		$fun['obs'] = $this->input->post('obs');

		
		$alim['leche'] = $this->input->post('leche');
		$alim['cereales'] = $this->input->post('cereales');
		$alim['vegetales'] = $this->input->post('vegetales');
		$alim['frutas'] = $this->input->post('frutas');
		$alim['carnes'] = $this->input->post('carnes');
		$alim['grasas'] = $this->input->post('grasas');
		$alim['almidones'] = $this->input->post('almidones');
		$alim['dulces'] = $this->input->post('dulces');
		$alim['cafe_leche'] = $this->input->post('cafe_leche');
		$alim['granos'] = $this->input->post('granos');


		$psico['alcohol'] = $this->input->post('alcohol');
		$psico['tabaquicos'] = $this->input->post('tabaquicos');
		$psico['cafeicos'] = $this->input->post('cafeicos');
		$psico['medicamentos'] = $this->input->post('medicamentos');
		$psico['otros'] = $this->input->post('otros');
		
		$this->consulta_model->actualizar_historia($cita,$historia,$gine,$fam,$fun,$alim,$psico);
		
	}	

	public function registrar($cita){	
	
		$data['page_title'] = 'Consulta';
		$data['system_title'] = 'Datos';
		$data['cita'] =  $cita;
		
		$cita_datos = $this->citas_model->get_datos_cita($cita);
	
		$this->load->model('doctores_model');		
		$doctor = $this->doctores_model->get_datos_doctor($cita_datos[0]['doctores_id']);
		if($doctor){
			$data['doctor'] =  $doctor;
		}else{
			$data['doctor'] =  NULL;
		}
		
		$this->load->model('pacientes_model');
		$paciente = $this->pacientes_model->get_datos_paciente($cita_datos[0]['pacientes_id']);
		if($paciente){
			$data['paciente'] =  $paciente;
		}else{
			$data['paciente'] =  NULL;
		}
			
        $this->load->view('consulta/crear_consulta', $data);
		
	}	

	public function historial($cita) {
		
		$data['page_title'] = 'Consulta';
		$data['system_title'] = 'Datos';
		$data['cita'] =  $cita;
		$data['editar'] = 2;
		$data['borrar'] = 3;
		$data['permisos'] = $this->permisos();
		
		$cita_datos = $this->citas_model->get_datos_cita($cita);
	
		$this->load->model('doctores_model');		
		$doctor = $this->doctores_model->get_datos_doctor($cita_datos[0]['doctores_id']);
		if($doctor){
			$data['doctor'] =  $doctor;
		}else{
			$data['doctor'] =  NULL;
		}
		
		$this->load->model('pacientes_model');
		$paciente = $this->pacientes_model->get_datos_paciente($cita_datos[0]['pacientes_id']);
		if($paciente){
			$data['paciente'] =  $paciente;
		}else{
			$data['paciente'] =  NULL;
		}
				
		$this->load->model('expediente_model');
		
		$expediente = $this->expediente_model->expediente($cita_datos[0]['pacientes_id']);
		
		$query = $this->consulta_model->get_consultas($cita_datos[0]['doctores_id'],$expediente[0]['id']);
		if($query){
			$data['historial'] =  $query;
		}else{
			$data['historial'] =  NULL;
		}
		$this->load->view('consulta/historial_consulta', $data);
    }
		
	
	//ver consulta en modal
	public function ver($id) 
	{		
		$consulta = $this->consulta_model->get_consulta($id);
		if($consulta){
			$data['consulta'] =  $consulta;
		}else{
			$data['consulta'] =  NULL;
		}
		
		return $this->load->view('consulta/ver_consulta', $data);		
    }	
	
	public function registrar_consulta($cita){

		date_default_timezone_set('America/Caracas');
		
		$cita_datos = $this->citas_model->get_datos_cita($cita);
		
		$this->load->model('expediente_model');
		
		$expediente = $this->expediente_model->expediente($cita_datos[0]['pacientes_id']);
		
		$data['expediente_id']= $expediente[0]['id'];
		$data['doctores_id']= $cita_datos[0]['doctores_id'];
		$data['fecha']= date('Y-m-d');
		$data['motivo_consul']= $this->input->post('motivo_consul');
		$data['enfermedad_actual']= $this->input->post('enfermedad_actual');
		$data['diagnostico']= $this->input->post('diagnostico');
		$data['tratamiento']= $this->input->post('tratamiento');
		$data['observacion_consul']= $this->input->post('observacion_consul');
		
		$signos['tension_arteria']= $this->input->post('tension_arteria');
		$signos['peso']= $this->input->post('peso');
		$signos['temp']= $this->input->post('temp');
		$signos['pulso']= $this->input->post('pulso');
		$signos['resp']= $this->input->post('resp');
						   
		$this->consulta_model->guardar_consulta($cita,$data,$signos);
	}	
		
   public function eliminar(){	

		$consulta = $this->input->post('id');
		$this->consulta_model->borrar_consulta($consulta);
		 	
	}		
	
	public function editar($consulta,$cita){
		
		$data['page_title'] = 'Consulta';
		$data['system_title'] = 'Editar';
		$data['cita'] =  $cita;
		
		$cita_datos = $this->citas_model->get_datos_cita($cita);
	
		$this->load->model('doctores_model');		
		$doctor = $this->doctores_model->get_datos_doctor($cita_datos[0]['doctores_id']);
		if($doctor){
			$data['doctor'] =  $doctor;
		}else{
			$data['doctor'] =  NULL;
		}
		
		$this->load->model('pacientes_model');
		$paciente = $this->pacientes_model->get_datos_paciente($cita_datos[0]['pacientes_id']);
		if($paciente){
			$data['paciente'] =  $paciente;
		}else{
			$data['paciente'] =  NULL;
		}

		$consulta1 = $this->consulta_model->get_consulta($consulta);
		if($consulta1){
			$data['consulta'] =  $consulta1;
		}else{
			$data['consulta'] =  NULL;
		}
		
		return $this->load->view('consulta/editar_consulta', $data);		
	}
		
	public function actualizar_consulta($cita){	
		
		$consulta =$this->input->post('id');
		
		$data['motivo_consul']= $this->input->post('motivo_consul');
		$data['enfermedad_actual']= $this->input->post('enfermedad_actual');
		$data['diagnostico']= $this->input->post('diagnostico');
		$data['tratamiento']= $this->input->post('tratamiento');
		$data['observacion_consul']= $this->input->post('observacion_consul');
		
		$signos['tension_arteria']= $this->input->post('tension_arteria');
		$signos['peso']= $this->input->post('peso');
		$signos['temp']= $this->input->post('temp');
		$signos['pulso']= $this->input->post('pulso');
		$signos['resp']= $this->input->post('resp');
						   
		$this->consulta_model->actualizar_consulta($cita,$consulta,$data,$signos);
	}	
	
	public function culminar($cita){
		
		$cita_datos = $this->citas_model->get_datos_cita($cita);

		$this->load->model('pacientes_model');
		$paciente = $this->pacientes_model->get_datos_paciente($cita_datos[0]['pacientes_id']);
		
		$this->db->select("*");
		$this->db->from('espera_consulta');
		$this->db->where('citas_id',$cita);			
		$query = $this->db->get();	
		$espera= $query->result_array();

		$this->db->where('id', $cita);
        $updateSQL=$this->db->update('cita_medica', array('status' => 2));	

		$this->db->where('id', $espera[0]['id']);
        $updateSQL2=$this->db->update('espera_consulta', array('estado' => 2));	

		$this->session->set_flashdata('info', 'Ha culminado la cita con el paciente: '.$paciente[0]['pnombre'].' '.$paciente[0]['papellido']);
		redirect(base_url() . 'consulta/sala_espera', 'refresh');	
		
	}	
	
	public function recipe($cita) {
		
		date_default_timezone_set('America/Caracas');
		
		$data['page_title'] = 'Recipe';
		$data['system_title'] = 'Datos';
		$data['cita'] =  $cita;
		
		$cita_datos = $this->citas_model->get_datos_cita($cita);
	
		$this->load->model('doctores_model');		
		$doctor = $this->doctores_model->get_datos_doctor($cita_datos[0]['doctores_id']);
		if($doctor){
			$data['doctor'] =  $doctor;
		}else{
			$data['doctor'] =  NULL;
		}
		
		$this->load->model('pacientes_model');
		$paciente = $this->pacientes_model->get_datos_paciente($cita_datos[0]['pacientes_id']);
		if($paciente){
			$data['paciente'] =  $paciente;
		}else{
			$data['paciente'] =  NULL;
		}
		
		$this->load->model('expediente_model');
		
		$data['expediente']  = $this->expediente_model->expediente($cita_datos[0]['pacientes_id']);
		
		$recipe = $this->consulta_model->get_recipe($cita);
		if($recipe){
			$data['recipe'] =  $recipe;
		}else{
			$data['recipe'] =  NULL;
		}		

		$this->load->view('consulta/recipe', $data);
    }	
	
	public function recipe_anterior(){	
	
		$doctor= $this->input->post('doctor');
		$expediente= $this->input->post('expediente');
						   
		$recipe=$this->consulta_model->get_recipe_anterior($doctor,$expediente);
		
		if($recipe){
				$data['recipe'] =  $recipe;
			}else{
				$data['recipe'] =  NULL;
			}
			
		$this->load->model('centro_model');	
		$query = $this->centro_model->get_clinica();
			
		if($query){
			$data['clinica'] =  $query;
		}
			
        $this->load->view('consulta/recipe_anterior', $data);
		
	}	
	
	public function guardar_recipe($cita){	
	
		date_default_timezone_set('America/Caracas');
		
		$cita_datos = $this->citas_model->get_datos_cita($cita);
		
		$this->load->model('expediente_model');
		
		$expediente = $this->expediente_model->expediente($cita_datos[0]['pacientes_id']);
		
		$recipe = $this->consulta_model->get_recipe($cita);
		
		if($recipe){
			$data['id'] =  $recipe[0]['id'];
			$data['fecha_expiracion']= date("Y-m-d",strtotime($this->input->post('fecha_expiracion')));
			$data['rp']= $this->input->post('rp');
			$data['indicaciones']= $this->input->post('indicaciones');
		}else{
			$data['id'] =  NULL;
			$data['expediente_id']= $expediente[0]['id'];
			$data['doctores_id']= $cita_datos[0]['doctores_id'];
			$data['fecha_emision']= date('Y-m-d');
			$data['citas_id']= $cita;
			$data['fecha_expiracion']= date("Y-m-d",strtotime($this->input->post('fecha_expiracion')));
			$data['rp']= $this->input->post('rp');
			$data['indicaciones']= $this->input->post('indicaciones');
		}
		
		$this->consulta_model->guardar_recipe($cita,$data);
	}	
	
	public function recipe_imprimir($recipe){	
	
		$recipe = $this->consulta_model->get_recipe_imprimir($recipe);
		if($recipe){
				$data['recipe'] =  $recipe;
			}else{
				$data['recipe'] =  NULL;
			}
			
		$this->load->model('centro_model');	
		$query = $this->centro_model->get_clinica();
			
		if($query){
			$data['clinica'] =  $query;
		}
			
        $this->load->view('consulta/recipe_imprimir', $data);
		
	}		

	public function mandar_doc(){	
		//$doc_id = id del documento
		$data['doc_id'] = $this->input->post('id');
		$data['tipo'] 	= $this->input->post('tipo');
		if($data['tipo'] == 1){
			$data['ruta']	= "consulta/recipe_imprimir/".$data['doc_id'];
			$nombre_doc ="el Récipe";			
		}else{
			if($data['tipo'] == 2){
			$data['ruta']	= "consulta/orden_imprimir/".$data['doc_id'];
			$nombre_doc ="la Orden de Terapia";	
			}else{
				$data['ruta']	= "consulta/historia_imprimir/".$data['doc_id'];
				$nombre_doc ="la Historia médica";	
			}			
		}
		
		
		$doc = $this->consulta_model->get_imprimir($data['tipo'],$data['doc_id']);
		
		if($doc){
				$rsp['exist'] = 1;
				$rsp['mnj'] =  "Ya fue enviado ".$nombre_doc." a la secretaria";
			}else{
				$insertSQL=$this->db->insert('impresiones', $data);
				if($insertSQL){
					$rsp['exist'] = 0;
					$rsp['mnj'] =  "Ha sido enviado ".$nombre_doc." a la secretaria";
				}
			}			
		
		echo json_encode($rsp);
	}	

		public function orden_terapia($cita) {
		
		date_default_timezone_set('America/Caracas');
		
		$data['page_title'] = 'Orden de terapia';
		$data['system_title'] = 'Datos';
		$data['cita'] =  $cita;
		
		$cita_datos = $this->citas_model->get_datos_cita($cita);
	
		$this->load->model('doctores_model');		
		$doctor = $this->doctores_model->get_datos_doctor($cita_datos[0]['doctores_id']);
		if($doctor){
			$data['doctor'] =  $doctor;
		}else{
			$data['doctor'] =  NULL;
		}
		
		$this->load->model('pacientes_model');
		$paciente = $this->pacientes_model->get_datos_paciente($cita_datos[0]['pacientes_id']);
		if($paciente){
			$data['paciente'] =  $paciente;
		}else{
			$data['paciente'] =  NULL;
		}
		
		$this->load->model('expediente_model');
		
		$data['expediente']  = $this->expediente_model->expediente($cita_datos[0]['pacientes_id']);
		
		$orden = $this->consulta_model->get_orden($cita);
		if($orden){
			$data['orden'] =  $orden;
		}else{
			$data['orden'] =  NULL;
		}	
		
		$this->load->model('terapias_model');
		$terapias = $this->terapias_model->get_terapias();
			
			if($terapias){
				$data['terapias'] =  $terapias;
			}else{
				$data['terapias'] =  NULL;
			}
			
		$this->load->view('consulta/orden_terapia', $data);
    }	

	public function guardar_orden($cita){	
	
		date_default_timezone_set('America/Caracas');
		
		$cita_datos = $this->citas_model->get_datos_cita($cita);
		
		$this->load->model('expediente_model');
		
		$expediente = $this->expediente_model->expediente($cita_datos[0]['pacientes_id']);
		
		$orden = $this->consulta_model->get_orden($cita);

		if($orden){
			$data['id'] =  $orden[0]['id'];
			$data['obs']= $this->input->post('obs');
			$data['frecuencia']= $this->input->post('frecuencia');
			
			if(!$data['frecuencia']){
				$data['frecuencia']="1/semana";
			}
			
			$data['terapias']="";
			if($this->input->post('terapias')){
			$data['terapias']=implode(',',$this->input->post('terapias'));
			$terapias= $this->input->post('terapias');			
			}

			$aplicacion="";
			if($this->input->post('aplicacion')){
			$aplicacion= $this->input->post('aplicacion');			
			}	
			
            $data['aplicaciones']=json_encode(array_combine($terapias,$aplicacion));

		}else{
			$data['id'] =  NULL;
			$data['expediente_id']= $expediente[0]['id'];
			$data['citas_id']= $cita;
			$data['fecha']= date("Y-m-d");
			$data['doctores_id']= $cita_datos[0]['doctores_id'];		
			$data['obs']= $this->input->post('obs');
			$data['frecuencia']= $this->input->post('frecuencia');
			
			if(!$data['frecuencia']){
				$data['frecuencia']="1/semana";
			}
						
			$data['terapias']="";
			if($this->input->post('terapias')){
			$data['terapias']=implode(',',$this->input->post('terapias'));
			$terapias= $this->input->post('terapias');			
			}

			$aplicacion="";
			if($this->input->post('aplicacion')){
			$aplicacion= $this->input->post('aplicacion');			
			}	
			
            $data['aplicaciones']=json_encode(array_combine($terapias,$aplicacion));
			
		}

		$this->consulta_model->guardar_orden($cita,$data);
	}	
		
}

/* End of file consulta.php */
/* Location: ./application/controllers/consulta.php */