<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class authentication_model extends CI_Model {
function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->db->db_debug = FALSE;
	}
	public function register($data){
		$this->db->insert('user_credential',$data);
		return TRUE;
	}
	public function login($data){
		if ($details = $this->db->where($data)
								->join('user_profile','user_credential.credential_id = user_profile.profile_credential','left')
								->get('user_credential')->result_array()) {
			$this->session->set_userdata('logged_in',$details[0]);
		}
	}
}