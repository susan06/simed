<?php 

 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Expedientes extends CI_Controller {

	public function __construct() {
				parent::__construct();

				$this->load->library(array('session'));
				$this->load->library( 'session_php' );
				$this->load->helper(array('url','form','html','date')); 								
				$this->load->database('default');
				$this->load->model('crud_model');
				$this->load->model('expediente_model');				
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
	

	public function buscar(){
		
			$data['page_title'] = 'Expedientes médicos';
			$data['system_title'] = 'Buscar';		

			$this->load->view('expedientes/busqueda', $data);
		
    }	

	public function medico($id){
		
			$data['page_title'] = 'Expediente médico';
			$data['system_title'] = 'Paciente';	
			
			$data['expediente'] = $id;	
			
			$expediente = $this->expediente_model->expediente_pac($id);

			$this->load->model('pacientes_model');
			$paciente = $this->pacientes_model->get_datos_paciente($expediente[0]['pacientes_id']);
			if($paciente){
				$data['paciente'] =  $paciente;
			}else{
				$data['paciente'] =  NULL;
			}
			
			$this->load->view('expedientes/index', $data);
		
    }	

	public function historias($expediente) 
	{		
		$data['page_title'] = 'Expediente médico';
		$data['system_title'] = 'Historias';	
			
		$this->load->model('historias_model');
		$historias = $this->historias_model->get_historias_pac($expediente);
		$data['expediente'] = $expediente;	
		
		if($historias){
			$data['historias'] =  $historias;
		}else{
			$data['historias'] =  NULL;
		}
		
		return $this->load->view('expedientes/historias', $data);		
    }

	public function consultas($expediente) 
	{		
		$data['page_title'] = 'Expediente médico';
		$data['system_title'] = 'Consultas';	
		$data['expediente'] = $expediente;	
		
		$query = $this->expediente_model->get_consultas($expediente);
		if($query){
			$data['historial'] =  $query;
		}else{
			$data['historial'] =  NULL;
		}
				
		return $this->load->view('expedientes/consultas', $data);		
    }

    public function recipes($expediente) 
	{		
		$data['page_title'] = 'Expediente médico';
		$data['system_title'] = 'Recipes';	
		$data['expediente'] = $expediente;	
		
		$query = $this->expediente_model->get_recipes($expediente);
		if($query){
			$data['historial'] =  $query;
		}else{
			$data['historial'] =  NULL;
		}
				
		return $this->load->view('expedientes/recipes', $data);		
    }	
	
    public function ordenes($expediente) 
	{		
		$data['page_title'] = 'Expediente médico';
		$data['system_title'] = 'Ordenes';	
		$data['expediente'] = $expediente;	
		
		$query = $this->expediente_model->get_ordenes($expediente);
		if($query){
			$data['historial'] =  $query;
		}else{
			$data['historial'] =  NULL;
		}
				
		return $this->load->view('expedientes/ordenes', $data);		
    }	

    public function procedimientos($expediente) 
	{		
		$data['page_title'] = 'Expediente médico';
		$data['system_title'] = 'Procedimientos';	
		$data['expediente'] = $expediente;	
		
		$query = $this->expediente_model->get_procedimientos($expediente);
		if($query){
			$data['historial'] =  $query;
		}else{
			$data['historial'] =  NULL;
		}
				
		return $this->load->view('expedientes/procedimientos', $data);		
    }

    public function examenes($expediente) 
	{		
		$data['page_title'] = 'Expediente médico';
		$data['system_title'] = 'Exámenes';	
		$data['expediente'] = $expediente;	
		
		$query = $this->expediente_model->get_examenes($expediente);
		if($query){
			$data['historial'] =  $query;
		}else{
			$data['historial'] =  NULL;
		}
				
		return $this->load->view('expedientes/examenes', $data);		
    }	
	
	public function ver_orden_terapia($orden) {
		
		$this->load->model('terapias_model');
		
		$orden_terapia = $this->terapias_model->get_orden_terapia($orden);
		if($orden_terapia){
				$data['orden'] =  $orden_terapia;
			}else{
				$data['orden'] =  NULL;
			}
			
		$terapias = $this->terapias_model->get_terapias();
			
			if($terapias){
				$data['terapias'] =  $terapias;
			}else{
				$data['terapias'] =  NULL;
			}
			
		$aplicacion1 = $this->terapias_model->aplicaciones1($orden);
			
			if($aplicacion1){
				$data['aplicacion1'] =  $aplicacion1;
			}else{
				$data['aplicacion1'] =  NULL;
			}
			
		$aplicacion2 = $this->terapias_model->aplicaciones2($orden);
			
			if($aplicacion2){
				$data['aplicacion2'] =  $aplicacion2;
			}else{
				$data['aplicacion2'] =  NULL;
			}
			
        $this->load->view('expedientes/ver_orden_terapia', $data);
    }

	public function ver_recipe($recipe){	
	
		$this->load->model('consulta_model');
	
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
			
        return $this->load->view('expedientes/ver_recipe', $data);
		
	}	

	public function ver_historia($id){		
							
		$datos=$this->expediente_model->pac_historia($id);
		
		$this->load->model('pacientes_model');
		$paciente = $this->pacientes_model->get_datos_paciente($datos[0]['paciente_id']);
		if($paciente){
			$data['paciente'] =  $paciente;
		}else{
			$data['paciente'] =  NULL;
		}
		
		$historia_medica = $this->expediente_model->historia_medica($id);
			
		if($historia_medica){
			$data['historia_medica'] =  $historia_medica;
		}	
		
        return $this->load->view('expedientes/ver_historia', $data);

	}	
	
	public function eliminar_orden(){	
		
		 $id = $this->input->post('id');
		 $this->expediente_model->eliminar_orden($id);
		 	
	}
	
	public function eliminar_historia(){	
		
		 $id = $this->input->post('id');
		 $this->expediente_model->eliminar_historia($id);
		 	
	}
	
	public function eliminar_recipe(){	
		
		 $id = $this->input->post('id');
		 $this->expediente_model->eliminar_recipe($id);
		 	
	}
	
	public function eliminar_consulta(){	
		
		 $id = $this->input->post('id');
		 $this->expediente_model->eliminar_consulta($id);
		 	
	}
}


