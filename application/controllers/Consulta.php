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





		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function historia_medica(){		
	$user = $this->session->userdata('user');
	$permiso=$user['nivel_acceso'];
	$authorizedUsers = array (1,2);	
	    if (in_array($permiso, $authorizedUsers ) ){ 
		
		$doctorId = $this->input->get('doctorID');
		$this->load->model('doctores_model');		
		$query = $this->doctores_model->get_datos_doctor($doctorId);
		if($query){
			$data['datos_doctor'] =  $query;
		}else{
			$data['datos_doctor'] =  NULL;
		}
		
		$paciente = $this->input->get('num_pac');
		$this->load->model('pacientes_model');
		$query2 = $this->pacientes_model->get_datos_paciente($paciente);
		if($query2){
			$data['datos_paciente'] =  $query2;
		}else{
			$data['datos_paciente'] =  NULL;
		}
		
		$sala_espera= $this->input->get('estado');
		$cita= $this->input->get('cita');
		$data['cita'] =  $cita;
		$data['num_espera'] =  $sala_espera;
		$data['doctor'] =  $doctorId;
		$data['paciente'] =  $paciente;	
		$data['expediente'] =  0;
		$data['historia_medica']=NULL;
		
		$this->load->model('expediente_model');
		$expediente = $this->expediente_model->expediente($paciente);
		if($expediente){
			$historia_medica=$this->consulta_model->historia_medica($expediente, $doctorId);
			$data['historia_medica'] =  $historia_medica;
		}else{
			$data['expediente'] =  1;
		}
		
		$var['header'] =$this->load->view('templates/header');
		$var['consulta'] = $this->load->view('consulta/historia_medica',$data);
		$var['footer'] =$this->load->view('templates/footer');
        $this->load->view('layouts/consulta_doc', $var);
		}else{ 
			?> 
				<script language="javascript"> 
				alert("Nivel de acceso denegado");
				location.href = '<?php echo base_url(); ?>index.php/consulta';				
				</script> 
			<?php 	
			
		}
	}
	
	
	
	
	
	public function registrar_consulta(){		
	$user = $this->session->userdata('user');
	$permiso=$user['nivel_acceso'];
	$authorizedUsers = array (1,2);	
	    if (in_array($permiso, $authorizedUsers ) ){ 
		
		$doctorId = $this->input->get('doctorID');
		$this->load->model('doctores_model');		
		$query = $this->doctores_model->get_datos_doctor($doctorId);
		if($query){
			$data['datos_doctor'] =  $query;
		}else{
			$data['datos_doctor'] =  NULL;
		}
		
		$paciente = $this->input->get('num_pac');
		$this->load->model('pacientes_model');
		$query2 = $this->pacientes_model->get_datos_paciente($paciente);
		if($query2){
			$data['datos_paciente'] =  $query2;
		}else{
			$data['datos_paciente'] =  NULL;
		}
		
		$sala_espera= $this->input->get('estado');
		$cita= $this->input->get('cita');
		$data['cita'] =  $cita;
		$data['num_espera'] =  $sala_espera;
		$data['doctor'] =  $doctorId;
		$data['paciente'] =  $paciente;

		$var['header'] =$this->load->view('templates/header');
		$var['consulta'] = $this->load->view('consulta/registrar_consulta',$data);
		$var['footer'] =$this->load->view('templates/footer');
        $this->load->view('layouts/consulta', $var);
		}else{ 
			?> 
				<script language="javascript"> 
				alert("Nivel de acceso denegado");
				location.href = '<?php echo base_url(); ?>index.php/consulta';				
				</script> 
			<?php 	
			
		}
	}	
	
	/****GESTIONAR RECIPE****/
	
	public function crear_recipe(){		
	$user = $this->session->userdata('user');
	$permiso=$user['nivel_acceso'];
	$authorizedUsers = array (1,2);	
	    if (in_array($permiso, $authorizedUsers ) ){ 
		
		$doctorId = $this->input->get('doctorID');
		$this->load->model('doctores_model');		
		$query = $this->doctores_model->get_datos_doctor($doctorId);
		if($query){
			$data['datos_doctor'] =  $query;
		}else{
			$data['datos_doctor'] =  NULL;
		}
		
		$paciente = $this->input->get('num_pac');
		$this->load->model('pacientes_model');
		$query2 = $this->pacientes_model->get_datos_paciente($paciente);
		if($query2){
			$data['datos_paciente'] =  $query2;
		}else{
			$data['datos_paciente'] =  NULL;
		}
		
		$sala_espera= $this->input->get('estado');
		$cita= $this->input->get('cita');
		$data['cita'] =  $cita;
		$data['num_espera'] =  $sala_espera;
		$data['doctor'] =  $doctorId;
		$data['paciente'] =  $paciente;
		
		$data['expediente'] =  0;
		$this->load->model('expediente_model');
		$expediente = $this->expediente_model->expediente($paciente);

		if($expediente){
			$data['expediente'] =  $expediente;
		}
		
		$var['header'] =$this->load->view('templates/header');
		$var['consulta'] = $this->load->view('consulta/crear_recipe',$data);
		$var['footer'] =$this->load->view('templates/footer');
        $this->load->view('layouts/consulta', $var);
		}else{ 
			?> 
				<script language="javascript"> 
				alert("Nivel de acceso denegado");
				location.href = '<?php echo base_url(); ?>index.php/consulta';				
				</script> 
			<?php 	
			
		}
	}	
	
	public function guardar_recipe(){		
		$doctor= ($this->input->post('id_doctor'));
		$paciente= ($this->input->post('num_pac'));
		$estado= ($this->input->post('estado'));
		$cita= ($this->input->post('cita'));
		$fecha_e= ($this->input->post('fecha_emision'));
		$fecha_v= ($this->input->post('fecha_expiracion'));
		$rp= ($this->input->post('rp'));
		$indicaciones= ($this->input->post('indicaciones'));
		$expediente= ($this->input->post('expediente'));
						   
		$this->consulta_model->guardar_recipe($doctor,$paciente,$estado,$cita,$fecha_e,$fecha_v,$rp,$indicaciones,$expediente);
	}
	
	public function recipe_anterior(){		
		$doctor= ($this->input->get('doc'));
		$paciente= ($this->input->get('pac'));
						   
		$recipe=$this->consulta_model->get_recipe_anterior($doctor,$paciente);
		
		if($recipe){
				$data['recipe'] =  $recipe;
			}else{
				$data['recipe'] =  NULL;
			}
			
        $this->load->view('consulta/recipe_anterior', $data);
		
	}
	
	/****FIN gestionar recipe****/
	
	/****GESTIONAR CONSULTAS****/
	public function autocomplete_cie(){	
		if(isset($_GET['term'])){	
		 $cie = strtolower($_GET['term']);
		 $this->consulta_model->autocompletar_cie($cie);
		}
	}
	
	public function autocomplete_motivo(){	
		if(isset($_GET['term'])){	
		 $motivo = strtolower($_GET['term']);
		 $this->consulta_model->autocompletar_motivo($motivo);
		}
	}
	
	public function guardar_consulta(){		
		$doctor= ($this->input->post('id_doctor'));
		$paciente= ($this->input->post('num_pac'));
		$estado= ($this->input->post('estado'));
		$cita= ($this->input->post('cita'));
		$fecha= ($this->input->post('fecha_consul'));
		$motivo= ($this->input->post('motivo_consul'));
		$enfer= ($this->input->post('enfermedad_actual'));
		$diag= ($this->input->post('diagnostico'));
		$trat= ($this->input->post('tratamiento'));
		$obs= ($this->input->post('observacion_consul'));	
		$tension= ($this->input->post('tension_arteria'));
		$peso= ($this->input->post('peso'));
		$temp= ($this->input->post('temp'));
		$pulso= ($this->input->post('pulso'));
		$resp= ($this->input->post('resp'));
		$cie= ($this->input->post('cod_cie_10'));
						   
		$this->consulta_model->guardar_consulta($doctor,$paciente,$estado,$fecha,$motivo,$enfer,$diag,$trat,$obs,$tension,$peso,$temp,$pulso,$resp,$cie,$cita);
	}
	
	public function historial_consulta() {
		$doctor= ($this->input->get('doctor'));
		$paciente= ($this->input->get('paciente'));		
		$query = $this->consulta_model->get_consultas($doctor,$paciente);
		if($query){
			$data['historial'] =  $query;
		}else{
			$data['historial'] =  NULL;
		}
		return $this->load->view('consulta/historial_consulta', $data);	
    }
	
	public function consulta_fecha() {
		$fecha= ($this->input->get('id'));
		$paciente= ($this->input->get('paciente'));
		$doctor= ($this->input->get('doctor'));		
		$query = $this->consulta_model->get_consulta_fecha($fecha,$paciente,$doctor);
		if($query){
			$data['consulta'] =  $query;
		}else{
			$data['consulta'] =  NULL;
		}
		return $this->load->view('consulta/ver_consulta', $data);	
    }
	
	public function buscar_consulta() {
		$consulta= ($this->input->get('id'));		
		$query = $this->consulta_model->get_consulta($consulta);
		if($query){
			$data['consulta'] =  $query;
		}else{
			$data['consulta'] =  NULL;
		}
		return $this->load->view('consulta/ver_consulta', $data);	
    }	
	public function editar_consulta(){
		$consulta= ($this->input->get('id'));	
		$query = $this->consulta_model->get_consulta_pac($consulta);
		if($query){
			$data['consulta'] =  $query;
		}else{
			$data['consulta'] =  NULL;
		}
		return $this->load->view('consulta/editar_consulta', $data);		
	}
	
	public function actualizar_consulta(){		
		$consulta= ($this->input->post('cod_consulta'));
		$motivo= ($this->input->post('motivo_consul'));
		$enfer= ($this->input->post('enfermedad_actual'));
		$diag= ($this->input->post('diagnostico'));
		$trat= ($this->input->post('tratamiento'));
		$obs= ($this->input->post('observacion_consul'));	
						   
		$this->consulta_model->actualizar_consulta($consulta,$motivo,$enfer,$diag,$trat,$obs);
	}
	
	public function borrar_consulta(){		 
		 $consulta = $this->input->get('id');
		 $this->consulta_model->borrar_consulta($consulta);
	}
	
	public function culminar_consulta(){		 
		 $espera = $this->input->get('espera');
		 $cita = $this->input->get('cita');
		 $this->consulta_model->culminar_consulta($espera,$cita);
	}
	

}

/* End of file consulta.php */
/* Location: ./application/controllers/consulta.php */