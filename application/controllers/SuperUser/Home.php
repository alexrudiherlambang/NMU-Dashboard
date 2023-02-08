<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("mhome");		
		$this->load->model('mnotif');
	}

	public function index()
	{
		if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
			redirect("clogin");
		}
		// $rekanan = $this->mhome->select_rekanan();
		// $pemberi = $this->mhome->select_rekanan_pemberi();
		// $penyedia = $this->mhome->select_rekanan_penyedia();
		// $user = $this->mhome->select_user();
		// $pks = $this->mhome->select_pks();
		// $pks_berakhir = $this->mhome->select_pks_berakhir();
		// $pks_berjalan = $this->mhome->select_pks_berjalan();
		// $pks_expired = $this->mhome->select_pks_expired();
		//untuk set notifikasi
		// $notif = $this->mnotif->mshow_all_notif();
		// $data =  array (
		// 	'notif'				=> $notif,
		// 	'rekanan' 			=> $rekanan[0]->rekanan,
		// 	'pemberi' 			=> $pemberi[0]->pemberi,
		// 	'penyedia' 			=> $penyedia[0]->penyedia,
		// 	'prosentase'		=> $penyedia[0]->penyedia / $rekanan[0]->rekanan * 100,			 
		// 	'user' 				=> $user[0]->user,
		// 	'pks' 				=> $pks[0]->pks,
		// 	'pks_berakhir' 		=> $pks_berakhir[0]->pks_berakhir,
		// 	'pks_berjalan' 		=> $pks_berjalan[0]->pks_berjalan,
		// 	'pks_expired' 		=> $pks_expired[0]->pks_expired,			 
		// );
	
		$this->load->view('content/vsuperuser/home');
	}
}
?>