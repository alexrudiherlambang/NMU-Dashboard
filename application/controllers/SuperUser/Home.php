<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("mhome");
	}

	public function index()
	{
		if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
			redirect("clogin");
		}
	
		$nama = $this->session->userdata("nama");
		$lokasi = $this->session->userdata("tlok");
		$grafik_pendapatan = $this->mhome->mshow_all_grafik_pendapatan($lokasi,$nama);
		$grafik_labarugi = $this->mhome->mshow_all_grafik_labarugi($lokasi,$nama);
		$grafik_biaya = $this->mhome->mshow_all_grafik_biaya($lokasi,$nama);
		$grafik_kunjungan = $this->mhome->mshow_all_grafik_kunjungan($lokasi,$nama);
		
		foreach ($grafik_pendapatan->result() as $b){
		   $hasiltanggal[] = array (
			  $tanggal_baru = date('d-M', strtotime($b->tanggal)),
		   );
		   $hasilrevenue[] = $b->total_rsaldosampai;
		   $hasiltarget[] = $b->total_jmltarget;
		}
		foreach ($grafik_labarugi->result() as $c){
			$hasiltanggal1[] = array (
			   $tanggal_baru = date('d-M', strtotime($c->tanggal)),
			);
			$hasilrevenue1[] = $c->total_rsaldosampai;
			$hasiltarget1[] = $c->total_jmltarget;
		}
		foreach ($grafik_biaya->result() as $d){
			$hasiltanggal2[] = array (
			   $tanggal_baru = date('d-M', strtotime($d->tanggal)),
			);
			$hasilrevenue2[] = $d->total_rsaldosampai;
			$hasiltarget2[] = $d->total_jmltarget;
		}
		foreach ($grafik_kunjungan->result() as $e){
			$hasiltanggal3[] = array (
			   $tanggal_baru = date('d-M', strtotime($e->tanggal)),
			);
			$hasilrevenue3[] = $e->total_rsaldosampai;
			$hasiltarget3[] = $e->total_jmltarget;
		}
		
		$data =  array (
		   'tanggal'      => $hasiltanggal,
		   'revenue'      => $hasilrevenue,
		   'target'       => $hasiltarget,
		   'tanggal1'      => $hasiltanggal1,
		   'revenue1'      => $hasilrevenue1,
		   'target1'       => $hasiltarget1,
		   'tanggal2'      => $hasiltanggal2,
		   'revenue2'      => $hasilrevenue2,
		   'target2'       => $hasiltarget2,
		   'tanggal3'      => $hasiltanggal3,
		   'revenue3'      => $hasilrevenue3,
		   'target3'       => $hasiltarget3,
		);
		
		$this->load->view('content/vsuperuser/home', $data);
	}
}
?>