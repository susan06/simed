<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Terapias extends CI_Controller {

	public function __construct() {
				parent::__construct();
				$this->load->library(array('session'));
				$this->load->library( 'session_php' );
				$this->load->helper(array('url','form','html','date')); 
				$this->load->model('terapias_model');
				$this->load->model('crud_model');
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
		
		$data['page_title'] = 'Terapias';
		$data['system_title'] = 'Pacientes';	
		
		$this->load->model('espera_model');
		
		$query = $this->espera_model->get_lista_terapia();
		
		if($query){
			$data['pac_terapias'] =  $query;
		}else{
			$data['pac_terapias'] =  NULL;
		}		

        $this->load->view('terapias/sala_espera', $data);

	}			
	public function crear_orden(){	

		$data['page_title'] = 'Orden de terapia';
		$data['system_title'] = 'Crear';					 

		$this->load->model('doctores_model');		
		$doctores = $this->doctores_model->get_lista_doctores();
		if($doctores){
			$data['doctores'] =  $doctores;
		}else{
			$data['doctores'] =  NULL;
		}
		
		$terapias = $this->terapias_model->get_terapias();
		
			if($terapias){
				$data['terapias'] =  $terapias;
			}else{
				$data['terapias'] =  NULL;
			}
			
		$this->load->view('terapias/crear_orden', $data);

	}

	public function guardar_orden(){	
	
		date_default_timezone_set('America/Caracas');
		
		$pacientes_id = $this->input->post('pacientes_id');
		
		$this->load->model('expediente_model');
		
		$expediente = $this->expediente_model->expediente($pacientes_id);
		
		$data['expediente_id']= $expediente[0]['id'];
		$data['fecha']= date("Y-m-d");
		$data['doctores_id']= $this->input->post('doctores_id');		
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

		$this->terapias_model->guardar_orden($data);
	}		
	
	public function orden_terapia($orden) {

		$data['page_title'] = 'Orden de terapia';
		$data['system_title'] = 'Datos';
		
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
			
        $this->load->view('terapias/orden_terapia', $data);
    }

	//ver ordenes en modal
	public function ver_ordenes($paciente) 
	{		
		$this->load->model('expediente_model');
		
		$expediente = $this->expediente_model->expediente($paciente);
		
		$ordenes = $this->terapias_model->get_ordenes_pac($expediente[0]['id']);

		if($ordenes){
			$data['ordenes'] =  $ordenes;
		}else{
			$data['ordenes'] =  NULL;
		}
		
		return $this->load->view('terapias/ver_ordenes', $data);		
    }	
	
	public function ver_orden_terapia($orden) {

		$data['page_title'] = 'Orden de terapia';
		$data['system_title'] = 'Datos';
		
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
			
		$aplicaciones = $this->terapias_model->get_aplicaciones($orden_terapia[0]['id']);
			
			if($terapias){
				$data['aplicaciones'] =  $aplicaciones;
			}else{
				$data['aplicaciones'] =  NULL;
			}
			
        $this->load->view('terapias/ver_orden_terapia', $data);
    }
	
}
