<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SerialNumber_Model extends CI_Model
{
	private $table = 'serial_numbers';
	function __construct()
	{
		parent::__construct();
		if(!isset($this->db)){
			$this->load->database();
		}        
	}

	function clear_cache()
  {
    $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    $this->output->set_header('Pragma: no-cache');
  }

	function get_all_list(){
		$data = $this->db->get($this->table)->result_array();
		return $data;
	}

	function get_serial_for_dropdown(){
		$data = $this->db->query('SELECT serial_number FROM serial_numbers WHERE serial_number NOT IN (SELECT serial_number FROM products)')->result_array();
	  return $data;
	}

	public function get_data_by_serial_number($serial_number = '-1'){
		$data = $this->db->get_where($this->table, array('serial_number' => $serial_number))->row();
		return $data;
	}

	function get_model_name_for_dropdown(){
		$data = $this->db->query('SELECT serial_number, model_name FROM serial_numbers')->result_array();
	  	return $data;
	}
}
