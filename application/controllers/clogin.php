<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class clogin extends CI_Controller {

	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model('mlogin');
	}

	public function index()
	{
		$this->load->view('content/vlogin/login');
	}
	function process()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$cek_username = $this->mlogin->cek_username($username)->num_rows();
		if ($cek_username > 0) {
			# code...
			$cek_password = $this->mlogin->cek_password($username);
			foreach ($cek_password as $key) {
				# code...
				if ($key->username == $username && $key->password == $password && $key->tlok == "") {
					# code...
					$data_session = array(
						'id'		=> $key->id,
						'username'	=> $key->username,
						'password'	=> $key->password,
						'nama'		=> $key->nama,
						'foto'		=> $key->foto,
						'tlok' 		=> $key->tlok,
						'eemail'	=> $key->eemail,
						'status'	=> "Login"
					);

					$this->session->set_userdata($data_session);
					redirect(site_url("SuperUser/Home"));
				} else if ($key->username == $username && $key->password == $password && $key->tlok == "RSG") {
					# code...

					$data_session = array(
						'id'		=> $key->id,
						'username'	=> $key->username,
						'password'	=> $key->password,
						'nama'		=> $key->nama,
						'foto'		=> $key->foto,
						'tlok' 		=> $key->tlok,
						'eemail'	=> $key->eemail,
						'status'	=> "Login"
					);
					$this->session->set_userdata($data_session);
					redirect(site_url("Pimpinan/Home"));
				} else if ($key->username == $username && $key->password == $password && $key->tlok == "RST") {
					# code...
						$data_session = array(
							'id'		=> $key->id,
							'username'	=> $key->username,
							'password'	=> $key->password,
							'nama'		=> $key->nama,
							'foto'		=> $key->foto,
							'tlok' 		=> $key->tlok,
							'eemail'	=> $key->eemail,
							'status'	=> "Login"
						);
					// print_r($data_session);
					$this->session->set_userdata($data_session);
					redirect(site_url("Legal/Home"));
				}else if ($key->username == $username && $key->password == $password && $key->tlok == "RSP") {
					# code...
						$data_session = array(
							'id'		=> $key->id,
							'username'	=> $key->username,
							'password'	=> $key->password,
							'nama'		=> $key->nama,
							'foto'		=> $key->foto,
							'tlok' 		=> $key->tlok,
							'eemail'	=> $key->eemail,
							'status'	=> "Login"
						);
					// print_r($data_session);
					$this->session->set_userdata($data_session);
					redirect(site_url("Rekanan/Home"));
				} else if ($key->username == $username && $key->password == $password && $key->tlok == "RSMU") {
					# code...
						$data_session = array(
							'id'		=> $key->id,
							'username'	=> $key->username,
							'password'	=> $key->password,
							'nama'		=> $key->nama,
							'foto'		=> $key->foto,
							'tlok' 		=> $key->tlok,
							'eemail'	=> $key->eemail,
							'status'	=> "Login"
						);
					// print_r($data_session);
					$this->session->set_userdata($data_session);
					redirect(site_url("Unit/Home"));
				} else {
					echo '<script language="javascript">alert("Password Anda Salah !!!"); window.location.href="./";</script>';
					// redirect(site_url("clogin"));
				}
			}
		} else {
			echo '<script language="javascript">alert("Username & Password Anda Salah !!!"); window.location.href="./";</script>';
			// redirect(site_url("clogin"));
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url("clogin"));
	}
}
?>