<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Especialidades extends CI_Controller {

	public function __construct() {
				parent::__construct();
				$this->load->library(array('session'));
				$this->load->library( 'session_php' );
				$this->load->helper(array('url','form','html','date')); 
				$this->load->model('especialidades_model');
				$this->load->model('crud_model');
				$this->load->library('bcrypt');
				$this->load->database('default'); 			
				$this->removeCache();

				$nick = $this->session_php->get();
				$rol = $this->session_php->get_rol();
				$rol = $this->session_php->get_sexo();
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
	
		
	public function index(){	
		
		$data['page_title'] = 'Especialidades';
		$data['system_title'] = 'Ver';		
		$data['borrar'] = 3;
		$data['editar'] = 2;
		$data['permisos'] = $this->permisos();
		
		$especialidades = $this->especialidades_model->get_especialidades();

		if($especialidades){
			$data['especialidades'] =  $especialidades;
		}else{
			$data['especialidades'] =  NULL;
		}
					
		$this->load->view('especialidades/lista', $data);
			
	}
	
	public function permisos() 
	{
		
		$modulo = $this->crud_model->get_id_mod("usuarios"); 
		$permisos = $this->crud_model->get_permisos($this->session->userdata('rol'),$modulo);
		return $permisos;
	}	
	
	public function crear(){	
		
		$data['page_title'] = 'Especialidades';
		$data['system_title'] = 'Crear';		
					
		$this->load->view('especialidades/crear', $data);
			
	}
	
	public function guardar(){	
		 
		 $data['nombre']= ucwords($this->input->post('nombre'));
	  
		$this->especialidades_model->guardar($data);	
	}
	
	
	public function actualizar(){
		
		 $data['nombre']= ucwords($this->input->post('nombre'));
		 $data['id']= $this->input->post('id');
		 
		$this->especialidades_model->actualizar($data);		
	}
	
    public function eliminar(){	
		
		 $id = $this->input->post('id');
		 $this->especialidades_model->eliminar($id);
		 	
	}	
	
    public function editar(){	
		
		 $id = $this->input->get('pk');
		 $value = $this->input->get('value');
		 
		 $this->db->where('id', $id);
		 $updateSQL=$this->db->update(	'especialidades', array('nombre' => $value) );	
		 
		if($updateSQL) 
        echo json_encode(array('id'=>$id));
		else 
        echo json_encode(array('id'=>$id));	
		 	
	}	
	
	
}

/* End of file usuarios.php */
/* Location: ./application/controllers/usuarios.php */