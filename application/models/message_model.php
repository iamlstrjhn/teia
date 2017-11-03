<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->db->db_debug = FALSE;
	}
class message_model extends CI_Controller {
	function send_message($data){
		$this->db->insert('message_log',$data);
	}
	function get_message($timestamp){
		$this->db->where('timestamp >', $timestamp);
		$this->db->order_by('timestamp', 'DESC');
		$this->db->limit(10); 
		$query = $this->db->get('messages');
		return array_reverse($query->result_array());
	}
}