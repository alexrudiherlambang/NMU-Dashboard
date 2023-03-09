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
		   if ($b->ket == "Realisasi"){
				$realisasi = (object)[
					$k_p1 = $b->k_p1,
					$rsg1 = $b->rsg1,
					$rst1 = $b->rst1,
					$rsp1 = $b->rsp1,
					$rsmu1 = $b->rsmu1,
					$urj1 = $b->urj1,
				];
		   } elseif ($b->ket == "Potensi") {
				$potensi = (object)[
					$k_p1 = $b->k_p1,
					$rsg1 = $b->rsg1,
					$rst1 = $b->rst1,
					$rsp1 = $b->rsp1,
					$rsmu1 = $b->rsmu1,
					$urj1 = $b->urj1,
			];
		   }elseif ($b->ket == "Target") {
				$target = (object)[
					$k_p1 = $b->k_p1,
					$rsg1 = $b->rsg1,
					$rst1 = $b->rst1,
					$rsp1 = $b->rsp1,
					$rsmu1 = $b->rsmu1,
					$urj1 = $b->urj1,
			];
		   }
		   $pie[] = $b->total;		   
		}
		foreach ($grafik_labarugi->result() as $c){
			$hasiltanggal1[] = array (
			   $tanggal_baru = date('d-M', strtotime($c->tanggal)),
			);
			$hasilrevenue1[] = $c->total_rsaldosampai;
			$hasiltarget1[] = $c->total_jmltarget;
		}
		foreach ($grafik_biaya->result() as $d){
			if ($d->ket == "Realisasi"){
					$realisasi2 = (object)[
						$k_p1 = $d->k_p1,
						$rsg1 = $d->rsg1,
						$rst1 = $d->rst1,
						$rsp1 = $d->rsp1,
						$rsmu1 = $d->rsmu1,
						$urj1 = $d->urj1,
					];
			} elseif ($d->ket == "Potensi") {
					$potensi2 = (object)[
						$k_p1 = $d->k_p1,
						$rsg1 = $d->rsg1,
						$rst1 = $d->rst1,
						$rsp1 = $d->rsp1,
						$rsmu1 = $d->rsmu1,
						$urj1 = $d->urj1,
				];
			}elseif ($d->ket == "Target") {
					$target2 = (object)[
						$k_p1 = $d->k_p1,
						$rsg1 = $d->rsg1,
						$rst1 = $d->rst1,
						$rsp1 = $d->rsp1,
						$rsmu1 = $d->rsmu1,
						$urj1 = $d->urj1,
				];
			}
			$pie2[] = $d->total;
		}
		foreach ($grafik_kunjungan->result() as $e){
			$hasiltanggal3[] = array (
			   $tanggal_baru = date('d-M', strtotime($e->tanggal)),
			);
			$hasilrevenue3[] = $e->total_rsaldosampai;
			$hasiltarget3[] = $e->total_jmltarget;
		}
		
		$data =  array (
			'realisasi'    	 	=> $realisasi,
			'potensi'      		=> $potensi,
			'target'      		=> $target,
			'pie'      			=> $pie,
			'tanggal1'      	=> $hasiltanggal1,
			'revenue1'      	=> $hasilrevenue1,
			'target1'       	=> $hasiltarget1,
			'realisasi2'     	=> $realisasi2,
			'potensi2'      	=> $potensi2,
			'target2'      		=> $target2,
			'pie2'      		=> $pie2,
			'tanggal3'      	=> $hasiltanggal3,
			'revenue3'      	=> $hasilrevenue3,
			'target3'       	=> $hasiltarget3,
		);
		// echo "<pre>";
		// print_r ($data);
		// die;
		
		$this->load->view('content/vsuperuser/home', $data);
		// $this->load->view('content/vsuperuser/home backup with pie', $data);
	}
}
?>