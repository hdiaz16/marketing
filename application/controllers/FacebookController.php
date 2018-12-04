<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FacebookController extends CI_Controller {

	function __construct()
    {
    	parent::__construct();
        $this->load->library('facebook');
		$this->load->helper('form');

        date_default_timezone_set('America/Mexico_City');
    }



    public function index(){

    	
    	$this->load->view('core/header');
    	$this->load->view('facebook');
    	$this->load->view('core/footer');
    	//$data['accessToken'] = $accessToken;
    	//echo json_encode('value');
	
	}

	public function saveToken(){

		$fb = new Facebook\Facebook(['app_id' => '922010761336461',
		  'app_secret' => '611bc1bb1ff52963c4d237806848ae56',
		  'default_graph_version' => 'v3.2',
    	]);

    	$accessToken = $this->input->post('token');

		$this->session->set_userdata('fb_access_token', $accessToken);

		echo json_encode(['status' => true]);

	}
}


?>    