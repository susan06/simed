<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Data
{
	public function __construct()
	{
		$this->load->library(array('session'));
		$this->load->helper(array('url')); 
	}	
 
	public function data()
	{	
		$nick = $this->ession->userdata('nick');
		$rol = $this->session->userdata('rol');
		$url = current_url();
		
		$this->session->set_flashdata('nick', $nick );
		$this->session->set_flashdata('rol',  $rol);
		$this->session->set_flashdata('url_actual', $url );
	
	}
}


/* end hooks/home.php */

