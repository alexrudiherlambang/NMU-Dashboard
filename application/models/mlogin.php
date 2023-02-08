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
			return $this->db->get('admin');
		}

		function cek_password($username)
		{
			$this->db->where('username', $username);
			return $this->db->get('admin')->result();
		}
	}
?>
