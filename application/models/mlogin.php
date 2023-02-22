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
			$this->db->where('username', $username);
			return $this->db->get('user');
		}

		function cek_password($username)
		{
			$this->db->where('username', $username);
			return $this->db->get('user')->result();
		}

		//Insert Log Login
		function insert_log($log) {
			$this->db->insert('log_login', $log);
		 }
	}
?>
