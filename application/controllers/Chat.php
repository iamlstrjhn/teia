<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chat extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('chat_model');
	}
	public function index(){
		$this->load->view('chat_view');
	}
	public function start_session(){
		$this->load->model('chat_model');
		if($room = $this->chat_model->find_room()){
			$this->chat_model->join_room($room);
			$this->session->set_userdata('chat_room',array('room'=>$room->session_id));
			header('location:/');
		}
		else{
			$room = array("room"=>$this->chat_model->create_room());
			$this->session->set_userdata('chat_room',$room);
			header('location:/');
		}

	}
	public function end_session(){
		$this->load->model('chat_model');
		$this->chat_model->close_room($this->session->userdata['chat_room']['room']) ;
		$this->session->unset_userdata('chat_room');
		header('location:/');
	}

	public function send_message()
	{
		$message = $this->input->post('message');
		if($trigger = $this->chat_model->trigger_finder($message)){
			$this->chat_model->create_report($trigger);
		}


		$data = array(
			'log_session'	=>	$this->session->userdata['chat_room']['room'],
			'log_sender'	=>	$this->session->userdata['logged_in']['credential_id'],
			'log_message'	=>	$message,
			'log_dateCreated'=>	time()
		);
		$this->chat_model->send_message($data);
		$this->_setOutput($data['log_message']);
	}
	public function get_messages()
	{
		if ($this->session->userdata('logged_in') && $this->session->userdata('chat_room')) {
		$data = array('log_session'=>$this->session->userdata['chat_room']['room']);
		$messages = $this->chat_model->get_messages($data);
		
		$string = null;
		foreach ($messages as $m) {
			if ($m['log_sender']==$this->session->userdata['logged_in']['credential_id']) {
				echo "<div class='message col s12'>
							<div class='card card-for-chat-1'>
								<p>".$m['log_message']."</p>
							</div>
						</div>";
			}
			else{
				echo "<div class='message col s12'>
							<div class='card card-for-chat white-text'>
								<p>".$m['log_message']."</p>
							</div>
						</div>";
			}
			
		}
	

		
		}
		// header('location:/');

	}
	private function _setOutput($data)
	{
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');
		echo json_encode($data);
	}
}