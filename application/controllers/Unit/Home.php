<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		// $this->load->model("mHome");		
	 }

	public function index()
	{
		if ($this->session->userdata('status') != "Login" || $this->session->userdata("level") != "Unit") {
			redirect("clogin");
		}
		$this->load->view('content/vunit/home');
	}
}
?>