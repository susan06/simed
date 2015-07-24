<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Usuarios_model extends CI_Model {

   function __construct() {
        parent::__construct();
		$this->load->library('bcrypt');
    }
 
	function get_lista_usuarios(){	
		$this->db->select("*");
		$this->db->order_by("pnombre"); 
		$this->db->from('usuarios');
		$this->db->where_not_in('roles_id', 1);		
		$query = $this->db->get();		
		return $query->result_array();			
	}

    function get_datos_usuario($id){	
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('id',$id);
		$query = $this->db->get();		
		return $query->result_array();		
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
	
	function cambiar_status($id){
	
		$status = array('status_id' => 1);
		
		$this->db->where('id', $id);
        $updateSQL=$this->db->update('usuarios', $status);	
		
		if($updateSQL) {
			echo true;
		}else{
			echo false;
		}
		
	}

	function cambiar_rol($id, $rol){
	
		$rol = array('roles_id' => $rol);
		
		$this->db->where('id', $id);
        $updateSQL=$this->db->update('usuarios', $rol);	
		
		if($updateSQL) {
			$this->session->set_flashdata('info', 'Se realizó el cambio de rol con éxito');
			redirect(base_url() . 'usuarios/roles', 'refresh');	
		}else{
			$this->session->set_flashdata('info', 'Intente cambiar el rol de nuevo');
			redirect(base_url() . 'usuarios/roles', 'refresh');	
		}
		
	}
	
	
    function actualizar($data)
	{	
	
	$this->db->where('id', $data['id']);
    $updateSQL=$this->db->update('usuarios', $data);	
		
		if($updateSQL) {
			$this->db->where('id',$data['id']); 
			$query = $this->db->get('usuarios');
			$user = $query->row();
			
			$data = array(
									'is_logued_in' 	=> 		TRUE,
									'id'    		=>      $user->id,
									'nombre'    	=>      $user->pnombre,
									'apellido'  	=>      $user->papellido,
									'rol'      		=>      $user->roles_id,
									'nick'      	=>      $user->nick,
									'sexo'      	=>      $user->sexo,
									'created_at' 	=>      $user->created_at,
					);	
					
					$this->session_php->set($user->nick);	
					$this->session_php->set_rol($user->roles_id);	
					$this->session_php->set_sexo($user->sexo);						
					$this->session->set_userdata($data);
					
			$this->session->set_flashdata('info', 'Se realizaron los cambios con éxito');
			redirect(base_url() . 'usuarios/perfil/'.$data['id'], 'refresh');	
		}else{
			$this->session->set_flashdata('error', 'Intente actualizar los datos de nuevo');
			redirect(base_url() . 'usuarios/perfil/'.$data['id'], 'refresh');	
		}
		
	}

    function guardar_contrasena($data,$id)
	{		
		$this->db->where('id', $id);
		return $this->db->update('usuarios', $data);	
			
	}
	
	function eliminar($id_usuario){
			
		$this->db->where('id', $id_usuario);
		$this->db->delete('usuarios');	
	}
	

	
}
