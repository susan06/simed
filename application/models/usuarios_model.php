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
		$query = $this->db->get();		
		return $query->result_array();			
	}
	function get_clinica(){	
		$this->db->select("*");
		$this->db->from('centro_medico');			
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
	
    function guardar($data,$admin){
  
		$insertSQL= $this->db->insert('usuarios', $data);
		
		if($admin == 1){
				
				if($insertSQL) {
					$this->session->set_flashdata('flash_message', '<p class="font-16"> ¡Usuario registrado con éxito!</p>');
					redirect(base_url() . 'index.php/usuarios', 'refresh');		 
				}else{
					$this->session->set_flashdata('error_message', '<p class="font-16 rojo"> ¡Error al registrar usuario! </p>');
					redirect(base_url() . 'index.php/usuarios', 'refresh');	
				}
		
		}else{
				if($insertSQL) {
							$this->session->set_flashdata('flash_message', '<p class="font-16"> ¡Usuario registrado con éxito! Contacte al administrador para ser activado el usuario </p>');
							redirect(base_url() . 'index.php/login', 'refresh');		 
				}else{
							$this->session->set_flashdata('flash_message', '<p class="font-16 rojo"> ¡Error al registrar usuario! </p>');
							redirect(base_url() . 'index.php/login', 'refresh');	
				}
		}
						
	}
	
	
    function actualizar($data)
	{	
	
	$this->db->where('id', $data['id']);
    $updateSQL=$this->db->update('usuarios', $data);	
		
		if($updateSQL) {
					$this->session->set_flashdata('flash_message', '<p class="font-16"> ¡Datos actualizados con éxito!</p>');
					redirect(base_url() . 'index.php/usuarios', 'refresh');		 
				}else{
					$this->session->set_flashdata('flash_message', '<p class="font-16 rojo"> ¡Error al editar usuario! </p>');
					redirect(base_url() . 'index.php/usuarios', 'refresh');	
		}
		
	}

    function guardar_contrasena($data,$id)
	{		
		$this->db->where('id', $id);
		return $this->db->update('usuarios', $data);	
			
	}

	function actualizar_clinica($nombre,$rif,$tlf,$ciudad,$estado,$postal,$direccion,$lema){

		$datos_clinica = array(
			'rif_cm' => $rif,
			'tlf_cm' => $tlf,
			'ciudad_cm' => $ciudad,
			'estado_cm' => $estado,
			'zona_postal_cm' => $postal,
			'direccion_cm' => $direccion,
			'lema_cm' => $lema
		);
		
		$this->db->where('nombre_cm', $nombre);
        $updateSQL=$this->db->update('centro_medico', $datos_clinica);	
		
		if($updateSQL) {
				 ?> 
							<script language="javascript"> 
							alert("Registro de datos exitoso"); 
							location.href = '<?php echo base_url(); ?>index.php/home_admin';
							</script> 
				<?php				 
        }else{
				    ?> 
							<script language="javascript"> 
							alert("Ha ocurrido un error y no se registraron los datos."); 
							</script> 
					<?php 		
        }
	}
	
	function eliminar($id_usuario){
			
		$this->db->where('id', $id_usuario);
		$this->db->delete('usuarios');	
	}
	

	
}
