<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
	class mlogin extends CI_Model
	{

		function __construct()
		{
			# code...
			parent::__construct();
		}

		function cek_username($username)
		{
			$this->load->database('local', TRUE)->where('username', $username);
			return $this->load->database('local', TRUE)->get('user');
		}

		function cek_password($username)
		{
			$this->load->database('local', TRUE)->where('username', $username);
			return $this->load->database('local', TRUE)->get('user')->result();
		}

		//Insert Log Login
		function insert_log($log) {
			$this->load->database('local', TRUE)->insert('log_login', $log);
		 }
	}
?>
