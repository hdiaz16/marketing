<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

	
	public function index()
	{
		$this->load->view('header');
		$this->load->view('chat');
		$this->load->view('footer');
		
	}
}
