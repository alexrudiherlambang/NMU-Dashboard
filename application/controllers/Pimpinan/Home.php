<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		// $this->load->model("mHome");		
	 }

	public function index()
	{
		if ($this->session->userdata('status') != "Login" || $this->session->userdata("level") != "Pimpinan") {
			redirect("clogin");
		}
		$this->load->view('content/vpimpinan/home');
	}
}
?>