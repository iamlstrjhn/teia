<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Authentication extends CI_Controller {
	public function index(){
		if($this->session->has_userdata('logged_in')){
			// var_dump($this->session->userdata('logged_in'));
			if ($this->session->userdata['logged_in']['credential_type']=='student'){
				if (!$this->session->has_userdata('chat_room')) {
					$this->load->view('chat-home_view');
				}
				else{
					
					$this->load->view('chat_view');
				}
			}
			else{
				$this->load->view('dashboard_view');
			}
		}
		else{
			$this->load->view('login_view');
		}
	}
	public function login(){
		if ($this->input->post()){
			$data = array(
				'credential_username'=>$this->input->post('username'),
				'credential_password'=>$this->input->post('password')
			);
			$this->load->model('authentication_model');
			$this->authentication_model->login($data);
			header('location:/');
		}
		else{
			$this->load->view('login_view');
		}
	}
	public function register(){
		$this->load->view('register_view');
		if ($this->input->post()){
			$data = array(
				'credential_username'=>$this->input->post('username'),
				'credential_password'=>$this->input->post('password'),
				'credential_type'=>$this->input->post('type')
			);
			$this->load->model('authentication_model');
			$this->authentication_model->register($data);
		}
	}
	public function logout(){
		if($this->session->has_userdata('logged_in')) {
			$this->session->sess_destroy();
			header('location:/');
		}
		else{
			echo "no one is logged in";
		}
	}
}
