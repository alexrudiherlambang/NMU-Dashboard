<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class clogin extends CI_Controller {

	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model('mlogin');
		$this->load->model('muser');
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
					$role = $this->muser->mselect_role_user($key->id);
					$data_session = array(
						'id'		=> $key->id,
						'username'	=> $key->username,
						'password'	=> $key->password,
						'nama'		=> $key->nama,
						'foto'		=> $key->foto,
						'tlok' 		=> $key->tlok,
						'eemail'	=> $key->eemail,
						'status'	=> "Login",
						//role user
						'tum'		=> $role->tum,
						'tkok1'		=> $role->tkok1,
						'tkok2'		=> $role->tkok2,
						'tkok3'		=> $role->tkok3,
						'tkok4'		=> $role->tkok4,
						'tkok5'		=> $role->tkok5,
						'tkoksk'	=> $role->tkoksk,
						'tkoktt'	=> $role->tkoktt,
						'tkokhp'	=> $role->tkokhp,
						'tkokbor'	=> $role->tkokbor,
						'tkkp1'		=> $role->tkkp1,
						'tkkp2'		=> $role->tkkp2,
						'tkkp3'		=> $role->tkkp3,
						'tkkb'		=> $role->tkkb,
						'tkklr'		=> $role->tkklr,
						'tid'		=> $role->tid,
						'ttk'		=> $role->ttk,
						'ttt'		=> $role->ttt,
						'ttp'		=> $role->ttp,
						'gtk'		=> $role->gtk,
						'gtt'		=> $role->gtt,
						'gtp'		=> $role->gtp,
						'tmn'		=> $role->tmn,
						'tmp'		=> $role->tmp,
						'tmuk'		=> $role->tmuk,
						'tdr'		=> $role->tdr,
						'mdr'		=> $role->mdr,
						'otoritas'	=> $role->otoritas,
					);
					
					$this->session->set_userdata($data_session);

					//insert into log_login table
					$log = array(
						'id'		=> $key->id,
						'platform'	=> $this->agent->platform(),
						'browser'	=> $this->agent->browser().' ('.$this->agent->version().')',
						'ip'		=> $this->input->ip_address(),
						'action'	=> 'Login',
					);
					$this->mlogin->insert_log($log);
					redirect(site_url("SuperUser/Home"));
				} else if ($key->username == $username && $key->password == $password && $key->tlok == "RSG") {
					# code...

					$role = $this->muser->mselect_role_user($key->id);
					$data_session = array(
						'id'		=> $key->id,
						'username'	=> $key->username,
						'password'	=> $key->password,
						'nama'		=> $key->nama,
						'foto'		=> $key->foto,
						'tlok' 		=> $key->tlok,
						'eemail'	=> $key->eemail,
						'status'	=> "Login",
						//role user
						'tum'		=> $role->tum,
						'tkok1'		=> $role->tkok1,
						'tkok2'		=> $role->tkok2,
						'tkok3'		=> $role->tkok3,
						'tkok4'		=> $role->tkok4,
						'tkok5'		=> $role->tkok5,
						'tkoksk'	=> $role->tkoksk,
						'tkoktt'	=> $role->tkoktt,
						'tkokhp'	=> $role->tkokhp,
						'tkokbor'	=> $role->tkokbor,
						'tkkp1'		=> $role->tkkp1,
						'tkkp2'		=> $role->tkkp2,
						'tkkp3'		=> $role->tkkp3,
						'tkkb'		=> $role->tkkb,
						'tkklr'		=> $role->tkklr,
						'tid'		=> $role->tid,
						'ttk'		=> $role->ttk,
						'ttt'		=> $role->ttt,
						'ttp'		=> $role->ttp,
						'gtk'		=> $role->gtk,
						'gtt'		=> $role->gtt,
						'gtp'		=> $role->gtp,
						'tmn'		=> $role->tmn,
						'tmp'		=> $role->tmp,
						'tmuk'		=> $role->tmuk,
						'tdr'		=> $role->tdr,
						'mdr'		=> $role->mdr,
						'otoritas'	=> $role->otoritas,
					);
					$this->session->set_userdata($data_session);

					//insert into log_login table
					$log = array(
						'id'		=> $key->id,
						'platform'	=> $this->agent->platform(),
						'browser'	=> $this->agent->browser().' ('.$this->agent->version().')',
						'ip'		=> $this->input->ip_address(),
						'action'	=> 'Login',
					);
					$this->mlogin->insert_log($log);
					redirect(site_url("Unit/Home"));
				} else if ($key->username == $username && $key->password == $password && $key->tlok == "RST") {
					# code...
					$role = $this->muser->mselect_role_user($key->id);
					$data_session = array(
						'id'		=> $key->id,
						'username'	=> $key->username,
						'password'	=> $key->password,
						'nama'		=> $key->nama,
						'foto'		=> $key->foto,
						'tlok' 		=> $key->tlok,
						'eemail'	=> $key->eemail,
						'status'	=> "Login",
						//role user
						'tum'		=> $role->tum,
						'tkok1'		=> $role->tkok1,
						'tkok2'		=> $role->tkok2,
						'tkok3'		=> $role->tkok3,
						'tkok4'		=> $role->tkok4,
						'tkok5'		=> $role->tkok5,
						'tkoksk'	=> $role->tkoksk,
						'tkoktt'	=> $role->tkoktt,
						'tkokhp'	=> $role->tkokhp,
						'tkokbor'	=> $role->tkokbor,
						'tkkp1'		=> $role->tkkp1,
						'tkkp2'		=> $role->tkkp2,
						'tkkp3'		=> $role->tkkp3,
						'tkkb'		=> $role->tkkb,
						'tkklr'		=> $role->tkklr,
						'tid'		=> $role->tid,
						'ttk'		=> $role->ttk,
						'ttt'		=> $role->ttt,
						'ttp'		=> $role->ttp,
						'gtk'		=> $role->gtk,
						'gtt'		=> $role->gtt,
						'gtp'		=> $role->gtp,
						'tmn'		=> $role->tmn,
						'tmp'		=> $role->tmp,
						'tmuk'		=> $role->tmuk,
						'tdr'		=> $role->tdr,
						'mdr'		=> $role->mdr,
						'otoritas'	=> $role->otoritas,
					);
					// print_r($data_session);
					$this->session->set_userdata($data_session);

					//insert into log_login table
					$log = array(
						'id'		=> $key->id,
						'platform'	=> $this->agent->platform(),
						'browser'	=> $this->agent->browser().' ('.$this->agent->version().')',
						'ip'		=> $this->input->ip_address(),
						'action'	=> 'Login',
					);
					$this->mlogin->insert_log($log);
					redirect(site_url("Unit/Home"));
				}else if ($key->username == $username && $key->password == $password && $key->tlok == "RSP") {
					# code...
					$role = $this->muser->mselect_role_user($key->id);
					$data_session = array(
						'id'		=> $key->id,
						'username'	=> $key->username,
						'password'	=> $key->password,
						'nama'		=> $key->nama,
						'foto'		=> $key->foto,
						'tlok' 		=> $key->tlok,
						'eemail'	=> $key->eemail,
						'status'	=> "Login",
						//role user
						'tum'		=> $role->tum,
						'tkok1'		=> $role->tkok1,
						'tkok2'		=> $role->tkok2,
						'tkok3'		=> $role->tkok3,
						'tkok4'		=> $role->tkok4,
						'tkok5'		=> $role->tkok5,
						'tkoksk'	=> $role->tkoksk,
						'tkoktt'	=> $role->tkoktt,
						'tkokhp'	=> $role->tkokhp,
						'tkokbor'	=> $role->tkokbor,
						'tkkp1'		=> $role->tkkp1,
						'tkkp2'		=> $role->tkkp2,
						'tkkp3'		=> $role->tkkp3,
						'tkkb'		=> $role->tkkb,
						'tkklr'		=> $role->tkklr,
						'tid'		=> $role->tid,
						'ttk'		=> $role->ttk,
						'ttt'		=> $role->ttt,
						'ttp'		=> $role->ttp,
						'gtk'		=> $role->gtk,
						'gtt'		=> $role->gtt,
						'gtp'		=> $role->gtp,
						'tmn'		=> $role->tmn,
						'tmp'		=> $role->tmp,
						'tmuk'		=> $role->tmuk,
						'tdr'		=> $role->tdr,
						'mdr'		=> $role->mdr,
						'otoritas'	=> $role->otoritas,
					);
					$this->session->set_userdata($data_session);

					//insert into log_login table
					$log = array(
						'id'		=> $key->id,
						'platform'	=> $this->agent->platform(),
						'browser'	=> $this->agent->browser().' ('.$this->agent->version().')',
						'ip'		=> $this->input->ip_address(),
						'action'	=> 'Login',
					);
					$this->mlogin->insert_log($log);
					redirect(site_url("Unit/Home"));
				} else if ($key->username == $username && $key->password == $password && $key->tlok == "RSMU") {
					# code...
					$role = $this->muser->mselect_role_user($key->id);
					$data_session = array(
						'id'		=> $key->id,
						'username'	=> $key->username,
						'password'	=> $key->password,
						'nama'		=> $key->nama,
						'foto'		=> $key->foto,
						'tlok' 		=> $key->tlok,
						'eemail'	=> $key->eemail,
						'status'	=> "Login",
						//role user
						'tum'		=> $role->tum,
						'tkok1'		=> $role->tkok1,
						'tkok2'		=> $role->tkok2,
						'tkok3'		=> $role->tkok3,
						'tkok4'		=> $role->tkok4,
						'tkok5'		=> $role->tkok5,
						'tkoksk'	=> $role->tkoksk,
						'tkoktt'	=> $role->tkoktt,
						'tkokhp'	=> $role->tkokhp,
						'tkokbor'	=> $role->tkokbor,
						'tkkp1'		=> $role->tkkp1,
						'tkkp2'		=> $role->tkkp2,
						'tkkp3'		=> $role->tkkp3,
						'tkkb'		=> $role->tkkb,
						'tkklr'		=> $role->tkklr,
						'tid'		=> $role->tid,
						'ttk'		=> $role->ttk,
						'ttt'		=> $role->ttt,
						'ttp'		=> $role->ttp,
						'gtk'		=> $role->gtk,
						'gtt'		=> $role->gtt,
						'gtp'		=> $role->gtp,
						'tmn'		=> $role->tmn,
						'tmp'		=> $role->tmp,
						'tmuk'		=> $role->tmuk,
						'tdr'		=> $role->tdr,
						'mdr'		=> $role->mdr,
						'otoritas'	=> $role->otoritas,
					);
					$this->session->set_userdata($data_session);

					//insert into log_login table
					$log = array(
						'id'		=> $key->id,
						'platform'	=> $this->agent->platform(),
						'browser'	=> $this->agent->browser().' ('.$this->agent->version().')',
						'ip'		=> $this->input->ip_address(),
						'action'	=> 'Login',
					);
					$this->mlogin->insert_log($log);
					redirect(site_url("Unit/Home"));
				}else if ($key->username == $username && $key->password == $password && $key->tlok == "URJ") {
					# code...
					$role = $this->muser->mselect_role_user($key->id);
					$data_session = array(
						'id'		=> $key->id,
						'username'	=> $key->username,
						'password'	=> $key->password,
						'nama'		=> $key->nama,
						'foto'		=> $key->foto,
						'tlok' 		=> $key->tlok,
						'eemail'	=> $key->eemail,
						'status'	=> "Login",
						//role user
						'tum'		=> $role->tum,
						'tkok1'		=> $role->tkok1,
						'tkok2'		=> $role->tkok2,
						'tkok3'		=> $role->tkok3,
						'tkok4'		=> $role->tkok4,
						'tkok5'		=> $role->tkok5,
						'tkoksk'	=> $role->tkoksk,
						'tkoktt'	=> $role->tkoktt,
						'tkokhp'	=> $role->tkokhp,
						'tkokbor'	=> $role->tkokbor,
						'tkkp1'		=> $role->tkkp1,
						'tkkp2'		=> $role->tkkp2,
						'tkkp3'		=> $role->tkkp3,
						'tkkb'		=> $role->tkkb,
						'tkklr'		=> $role->tkklr,
						'tid'		=> $role->tid,
						'ttk'		=> $role->ttk,
						'ttt'		=> $role->ttt,
						'ttp'		=> $role->ttp,
						'gtk'		=> $role->gtk,
						'gtt'		=> $role->gtt,
						'gtp'		=> $role->gtp,
						'tmn'		=> $role->tmn,
						'tmp'		=> $role->tmp,
						'tmuk'		=> $role->tmuk,
						'tdr'		=> $role->tdr,
						'mdr'		=> $role->mdr,
						'otoritas'	=> $role->otoritas,
					);
					$this->session->set_userdata($data_session);

					//insert into log_login table
					$log = array(
						'id'		=> $key->id,
						'platform'	=> $this->agent->platform(),
						'browser'	=> $this->agent->browser().' ('.$this->agent->version().')',
						'ip'		=> $this->input->ip_address(),
						'action'	=> 'Login',
					);
					$this->mlogin->insert_log($log);
					redirect(site_url("Unit/Home"));
				}else {
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