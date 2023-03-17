<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blank extends CI_Controller {

	function __construct() {
		parent::__construct();
		// $this->load->model("mhome");
	}

	public function index()
	{
		if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
			redirect("clogin");
		}
		$this->load->view('content/vsuperuser/blank');
	}
}
?>