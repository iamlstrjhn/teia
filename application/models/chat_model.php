<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class chat_model extends CI_Model {
function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->db->db_debug = FALSE;
	}
	function find_room(){
		return $this->db->where('session_status','open')->get('message_session')->row();
	}
	function join_room($data){
		var_dump($data->session_id);
		$this->db->where(array('session_id'=>$data->session_id));
		$this->db->update('message_session',array('session_status'=>'full'));
	}
	function create_room(){
		$this->db->insert('message_session',array('session_status'=>'open'));
		return $this->db->insert_id();
	}
	function close_room($data){
		$this->db->where(array('session_id'=>$data));
		$this->db->update('message_session',array('session_status'=>'close'));
	}
	function get_messages($data){
		$this->db->where($data);
		$this->db->order_by('log_dateCreated','ASC');
		return $this->db->get('message_log')->result_array();
	}
	function send_message($data){
		$this->db->insert('message_log',$data);
	}
	function trigger_finder($data){
		$triggers = $this->db->select('trigger_keyword')->get('message_trigger')->result_array();
		$triggers = ($triggers);
		$data = explode(" ", $data);
		$log = array();
		foreach ($triggers as $trigger) {
			if(in_array($trigger['trigger_keyword'], $data)){
				$log[].= $trigger['trigger_keyword'];
			}
		}
		if (empty($log)) {
			return FALSE;
		}
		else{
			return $log;
		}	
	}
	function create_report($data){



		foreach ($data as $keyword) {
			$message = "Keyword ".$keyword." has been triggered in session no. ".$this->session->userdata['chat_room']['room'];
			$this->db->insert('notification',array('notification_message'=>$message));
		}
	}


}