<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("mhome");		
	 }

	public function index()
	{
		if ($this->session->userdata('status') != "Login" || !in_array($this->session->userdata("tlok"), array("RSG", "RSP", "RST", "RSMU", "URJ"))) {
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
			if ($c->ket == "Realisasi"){
				$realisasi1 = (object)[
					$k_p1 = $c->k_p1,
					$rsg1 = $c->rsg1,
					$rst1 = $c->rst1,
					$rsp1 = $c->rsp1,
					$rsmu1 = $c->rsmu1,
					$urj1 = $c->urj1,
				];
			} elseif ($c->ket == "Potensi") {
					$potensi1 = (object)[
						$k_p1 = $c->k_p1,
						$rsg1 = $c->rsg1,
						$rst1 = $c->rst1,
						$rsp1 = $c->rsp1,
						$rsmu1 = $c->rsmu1,
						$urj1 = $c->urj1,
				];
			}elseif ($c->ket == "Target") {
					$target1 = (object)[
						$k_p1 = $c->k_p1,
						$rsg1 = $c->rsg1,
						$rst1 = $c->rst1,
						$rsp1 = $c->rsp1,
						$rsmu1 = $c->rsmu1,
						$urj1 = $c->urj1,
				];
			}
			$pie1[] = $c->total;
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

		$realisasi3 = (object)[];
		$potensi3 = (object)[];
		$target3 = (object)[];
		foreach ($grafik_kunjungan->result() as $e) {
			$realisasi3->{$e->lokasi} = $e->total_rsaldosampai;
			$potensi3->{$e->lokasi} = $e->total_rsaldopotensi1;
			$target3->{$e->lokasi} = $e->total_jmltarget;
			$lokasi3 = $e->lokasi;
		}
		
		$data =  array (
			'realisasi'     => $realisasi,
			'potensi'      	=> $potensi,
			'target'      	=> $target,
			'pie'      		=> $pie,
			'realisasi1'    => $realisasi1,
			'potensi1'      => $potensi1,
			'target1'      	=> $target1,
			'pie1'      	=> $pie1,
			'realisasi2'    => $realisasi2,
			'potensi2'      => $potensi2,
			'target2'      	=> $target2,
			'pie2'      	=> $pie2,
			'lokasi3'    	=> $lokasi3,
			'realisasi3'    => $realisasi3,
			'potensi3'      => $potensi3,
			'target3'      	=> $target3,
			// 'tanggal3'      => $hasiltanggal3,
			// 'revenue3'      => $hasilrevenue3,
			// 'target3'       => $hasiltarget3,
		);
		// echo "<pre>";
		// print_r ($data);
		// die;
		
		$this->load->view('content/vunit/home', $data);
	}
}
?>