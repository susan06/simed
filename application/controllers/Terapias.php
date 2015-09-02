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

	public function guardar_aplicacion($orden){	
	
		date_default_timezone_set('America/Caracas');		
		
		$data['orden_id']= $orden;
		$data['fecha']= date("Y-m-d");
		$data['terapias_id']= $this->input->post('terapias_id');
		$data['terapista']= $this->input->post('terapista');

		$this->terapias_model->guardar_aplicacion($data);
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
			
        $this->load->view('terapias/ver_orden_terapia', $data);
    }
	
	public function orden_aplicacion($orden) {

		$data['page_title'] = 'Orden de terapia';
		$data['system_title'] = 'Tratamiento';
		
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

		$aplicacion = $this->terapias_model->aplicacion($orden);
			
			if($aplicacion){
				$data['aplicacion'] =  $aplicacion;
			}else{
				$data['aplicacion'] =  NULL;
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
			
        $this->load->view('terapias/orden_aplicacion', $data);
    }
	
	public function actualizar_orden($orden){	
	
			$data['id'] =  $orden;
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

		
		$this->terapias_model->actualizar_orden($data);
	}
	
	public function orden_imprimir($orden) {
		
		$orden_terapia = $this->terapias_model->get_orden_terapia($orden);
		if($orden_terapia){
				$data['orden'] =  $orden_terapia;
			}else{
				$data['orden'] =  NULL;
			}
			
		$this->load->model('centro_model');	
		$query = $this->centro_model->get_clinica();
			
		if($query){
			$data['clinica'] =  $query;
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
			
        $this->load->view('terapias/orden_imprimir', $data);
    }
	
	public function count_ordenes(){	
		
		$paciente = $this->input->get('paciente');
		
		$this->load->model('expediente_model');
		
		$expediente = $this->expediente_model->expediente($paciente);
		
		$ordenes = $this->terapias_model->get_ordenes_pac($expediente[0]['id']);

		if(count($ordenes) > 1 ){
				$rsp['orden'] = null;
				$rsp['mnj'] =  true;
			}else{
				$rsp['orden'] = $ordenes[0]['id'];
				$rsp['mnj'] =  false;
			}			
		
		echo json_encode($rsp);
	}

	public function agenda(){	
		
		date_default_timezone_set('America/Caracas');
		
		$data['page_title'] = 'Agenda';
		$data['system_title'] = 'Terapias';	
		
		$fecha = date('Y-m-d');
		
		$aplicacion = $this->terapias_model->aplicaciones_terapias($fecha);
			
			if($aplicacion){
				$data['aplicacion'] =  $aplicacion;
			}else{
				$data['aplicacion'] =  NULL;
			}
			
		$this->load->view('terapias/agenda', $data);

	}

	public function agenda_fecha(){
		
		$fecha= date("Y-m-d",strtotime($this->input->post('fecha')));
		
		$aplicacion = $this->terapias_model->aplicaciones_terapias($fecha);
			
			if($aplicacion){
				$data['aplicacion'] =  $aplicacion;
			}else{
				$data['aplicacion'] =  NULL;
			}	
		
       return $this->load->view('terapias/agenda_load', $data);	
	}
	
	public function mandar_doc(){	
		//$doc_id = id del documento
		$data['doc_id'] = $this->input->post('id');
		$data['tipo'] 	= $this->input->post('tipo');
		$data['expediente_id'] 	= $this->input->post('expediente');
		$data['ruta']	= "terapias/orden_imprimir/".$data['doc_id'];
		$nombre_doc ="la Orden de Terapia";	
		
		$this->load->model('consulta_model');
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
	
	public function busqueda(){		
		
		$data['page_title'] = 'Terapias';
		$data['system_title'] = 'Búsqueda';	
		
		$this->load->view('terapias/busqueda', $data);

	}

	public function orden_busqueda() 
	{		
		$orden= $this->input->post('orden');
		
		$ordenes = $this->terapias_model->get_orden_terapia($orden);

		if($ordenes){
			$data['ordenes'] =  $ordenes;
		}else{
			$data['ordenes'] =  NULL;
		}
		
		return $this->load->view('terapias/busqueda_ordenes', $data);		
    }
	
	public function ordenes_busqueda() 
	{		
		$expediente= $this->input->post('expediente');
		
		$ordenes = $this->terapias_model->get_ordenes_pac($expediente);

		if($ordenes){
			$data['ordenes'] =  $ordenes;
		}else{
			$data['ordenes'] =  NULL;
		}
		
		return $this->load->view('terapias/busqueda_ordenes', $data);		
    }		
}
