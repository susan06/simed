<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Cuenta_model extends CI_Model {

   function __construct() {
        parent::__construct();
		$this->load->library('bcrypt');
    }
 
	function get_nick($nick){
		
		$this->db->select('nick');
		$this->db->where('nick',$nick);
		$query = $this->db->get("usuarios");			
		
		if($query->num_rows > 0){
			echo true;
			}
			echo false;
	}
	
	function get_pregunta($email){
		
		$this->db->select('preguntas.name');
		$this->db->from('usuarios');
		$this->db->join('preguntas', 'usuarios.pregunta_s = preguntas.id','left');
		$this->db->where('usuarios.email',$email);
		$query = $this->db->get();			
		
		foreach($query->result_array() as $row){
			echo $row['name'];
			}
	}
	
	function get_usuario($email){
		
		$this->db->select('id');
		$this->db->from('usuarios');
		$this->db->where('email',$email);
		$query = $this->db->get();			
		
		foreach($query->result_array() as $row){
			echo $row['id'];
			}

	}
	
	function validar_respuesta($rsp,$email){
		
		$this->db->where('email',$email); 
		$query = $this->db->get('usuarios');
			
			$user = $query->row();
			$respuesta = $user->respuesta_s;
			if($this->bcrypt->check_password($rsp, $respuesta))
			{
			echo true;
			}
			echo false;
			
	}
	
	function get_email($email){
		
		$this->db->select('email');
		$this->db->where('email',$email);
		$query = $this->db->get("usuarios");			
		
		if($query->num_rows > 0){
			echo true;
			}
			echo false;
	}
	
	
    function guardar_usuario($data){
  
		$insertSQL= $this->db->insert('usuarios', $data);

		if($insertSQL) {
			$this->session->set_flashdata('info', '¡Usuario registrado con éxito! Contacte al administrador para ser activado el usuario');
			redirect(base_url() . 'index.php/login', 'refresh');		 
		}else{
			$this->session->set_flashdata('error', 'No se registro el usuario');
			redirect(base_url() . 'index.php/login', 'refresh');	
		}
				
	}

    function guardar_contrasena($id,$data)
	{	
	
	$this->db->where('id', $id);
		
		if($this->db->update('usuarios', $data)) {
					$this->session->set_flashdata('flash_message', '<p class="font-16"> ¡Se cambio su contraseña!</p>');
					redirect(base_url() . 'index.php/login', 'refresh');		 
				}else{
					$this->session->set_flashdata('flash_message', '<p class="font-16 rojo"> ¡Error al tratar de cambiar contraseña! </p>');
					redirect(base_url() . 'index.php/usuarios', 'refresh');	
		}
		
	}


	
}
