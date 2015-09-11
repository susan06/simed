<?php 

 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Historias extends CI_Controller {

	public function __construct() {
				parent::__construct();

				$this->load->library(array('session'));
				$this->load->library( 'session_php' );
				$this->load->helper(array('url','form','html','date')); 								
				$this->load->database('default');
				$this->load->model('crud_model');
				$this->load->model('historias_model');				
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
		
			$data['page_title'] = 'Historia médica';
			$data['system_title'] = 'Buscar';		

			$this->load->view('historias/busqueda', $data);
		
    }	
	
	public function historias_busqueda() 
	{		
		$expediente= $this->input->post('expediente');
		
		$historias = $this->historias_model->get_historias_pac($expediente);
		
		if($historias){
			$data['historias'] =  $historias;
		}else{
			$data['historias'] =  NULL;
		}
		
		return $this->load->view('historias/busqueda_historias', $data);		
    }

	public function ubicacion($id) 
	{		

		$historia = $this->historias_model->get_historia($id);
		
		if($historia){
			$data['historia'] =  $historia;
		}else{
			$data['historia'] =  NULL;
		}
		
		return $this->load->view('historias/ubicacion', $data);		
    }

	public function actualizar_ubicacion(){		

		 $data['id']= $this->input->post('id');
		 $data['ubicacion']= $this->input->post('ubicacion');	 
		 
		$this->db->where('id', $data['id']);
        $updateSQL=$this->db->update('historia_medica', $data);	

		if($updateSQL){
				$rsp['rsp'] = 1;
				$rsp['mnj'] =  "La ubicación de la historia médica fue registrada con éxito.";
		}else{
				$rsp['rsp'] = 0;
				$rsp['mnj'] =  "Ocurrio un error, intente de nuevo.";

		}			
		
		echo json_encode($rsp);
	}
		
}


