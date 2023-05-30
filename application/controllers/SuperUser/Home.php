<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("mhome");
		$this->load->model("mrekap");
		$this->load->model("mbiaya");
		$this->load->model("mlaba_rugi");
	}

	public function index()
	{
		if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
			redirect("clogin");
		}
		// $tglawal = date('Y') . '-01-01';
		// $tglakhir = date('Y-m-d');;
		// $nama = $this->session->userdata("nama");
		// $lokasi = $this->session->userdata("tlok");
		
		// //eksekusi prosedure & Call Tabel Container
		// $rekap = $this->mrekap->mshow_all_call($tglawal,$tglakhir,$nama,$lokasi);
		// foreach ($rekap as $r)
		// if ($r->flag == 1){
		// 	$total_pendapatan = $r->rsaldosampai;
		// }
		// $biaya = $this->mbiaya->mshow_all_biaya($tglawal,$tglakhir,$nama,$lokasi);
		// foreach ($biaya as $b)
		// if ($b->flag == 1){
		// 	$total_biaya = $b->rsaldosampai;
		// }
		// $laba_rugi = $this->mlaba_rugi->mshow_all_call($tglawal,$tglakhir,$nama,$lokasi);
		// foreach ($laba_rugi as $lr)
		// if ($lr->flag == 1){
		// 	$total_laba_rugi = ($lr->rsaldosampai) - ($lr->rsaldosampai*22/100);
		// }
		// $kunjung = $this->mkunjungan_BPJS->mshow_all_call($tglawal,$tglakhir,$nama,$lokasi);

		// echo "<pre>";
		// print_r ($laba_rugi);
		// print_r ($total_laba_rugi);
		// die;
		$this->load->view('content/vsuperuser/home');
	}

	function pendapatan(){
		
		$nama = $this->session->userdata("nama");
		$lokasi = $this->session->userdata("tlok");
		$grafik_pendapatan = $this->mhome->mshow_all_grafik_pendapatan($lokasi,$nama);
		
		$realisasi = (object)[];
		$potensi = (object)[];
		$target = (object)[];
		$total_realisasi = 0;
		$total_potensi = 0;
		$total_target = 0;
		foreach ($grafik_pendapatan->result() as $b) {
			$realisasi->{$b->lokasi} = $b->total_rsaldosampai;
			$potensi->{$b->lokasi} = $b->total_rsaldopotensi1;
			$target->{$b->lokasi} = $b->total_jmltarget;
			$total_realisasi += $b->total_rsaldosampai;
			$total_potensi += $b->total_rsaldopotensi1;
			$total_target += $b->total_jmltarget;
		}
		
		$data =  array (
			'realisasi'    	 	=> $realisasi,
			'potensi'      		=> $potensi,
			'target'      		=> $target,
			'total_realisasi' 	=> $total_realisasi,
			'total_potensi' 	=> $total_potensi,
			'total_target' 		=> $total_target,
			// 'pie'      			=> $pie,
		);
		return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
		
	}

	function labarugi(){
		
		$nama = $this->session->userdata("nama");
		$lokasi = $this->session->userdata("tlok");
		$grafik_labarugi = $this->mhome->mshow_all_grafik_labarugi($lokasi,$nama);
		
		$realisasi1 = (object)[];
		$potensi1 = (object)[];
		$target1 = (object)[];
		$total_realisasi1 = 0;
		$total_potensi1 = 0;
		$total_target1 = 0;
		foreach ($grafik_labarugi->result() as $c) {
			$realisasi1->{$c->lokasi} = $c->total_rsaldosampai-($c->total_rsaldosampai*22/100);
			$potensi1->{$c->lokasi} = $c->total_rsaldopotensi1-($c->total_rsaldopotensi1*22/100);
			$target1->{$c->lokasi} = $c->total_jmltarget-($c->total_jmltarget*22/100);
			$total_realisasi1 += $c->total_rsaldosampai-($c->total_rsaldosampai*22/100);
			$total_potensi1 += $c->total_rsaldopotensi1-($c->total_rsaldopotensi1*22/100);
			$total_target1 += $c->total_jmltarget-($c->total_jmltarget*22/100);
		}
		$data =  array (
			'realisasi1'     	=> $realisasi1,
			'potensi1'      	=> $potensi1,
			'target1'      		=> $target1,
			'total_realisasi1' 	=> $total_realisasi1,
			'total_potensi1' 	=> $total_potensi1,
			'total_target1' 	=> $total_target1,
			// 'pie1'      		=> $pie1,
		);
		return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
		
	}

	function beban(){
		
		$nama = $this->session->userdata("nama");
		$lokasi = $this->session->userdata("tlok");
		$grafik_biaya = $this->mhome->mshow_all_grafik_biaya($lokasi,$nama);
		
		$realisasi2 = (object)[];
		$potensi2 = (object)[];
		$target2 = (object)[];
		$total_realisasi2 = 0;
		$total_potensi2 = 0;
		$total_target2 = 0;
		foreach ($grafik_biaya->result() as $c) {
			$realisasi2->{$c->lokasi} = $c->total_rsaldosampai;
			$potensi2->{$c->lokasi} = $c->total_rsaldopotensi1;
			$target2->{$c->lokasi} = $c->total_jmltarget;
			$total_realisasi2 += $c->total_rsaldosampai;
			$total_potensi2 += $c->total_rsaldopotensi1;
			$total_target2 += $c->total_jmltarget;
		}
		
		$data =  array (
			'realisasi2'     	=> $realisasi2,
			'potensi2'      	=> $potensi2,
			'target2'      		=> $target2,
			'total_realisasi2' 	=> $total_realisasi2,
			'total_potensi2'	=> $total_potensi2,
			'total_target2' 	=> $total_target2,
			// 'pie2'      		=> $pie2,
		);
		return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
		
	}

	function kunjungan(){
		
		$nama = $this->session->userdata("nama");
		$lokasi = $this->session->userdata("tlok");
		$grafik_kunjungan = $this->mhome->mshow_all_grafik_kunjungan($lokasi,$nama);
		
		$realisasi3 = (object)[];
		$potensi3 = (object)[];
		$target3 = (object)[];
		$total_realisasi3 = 0;
		$total_potensi3 = 0;
		$total_target3 = 0;
		foreach ($grafik_kunjungan->result() as $e) {
			$realisasi3->{$e->lokasi} = $e->total_rsaldosampai;
			$potensi3->{$e->lokasi} = $e->total_rsaldopotensi1;
			$target3->{$e->lokasi} = $e->total_jmltarget;
			$total_realisasi3 += $e->total_rsaldosampai;
			$total_potensi3 += $e->total_rsaldopotensi1;
			$total_target3 += $e->total_jmltarget;
		}
		
		$data =  array (
			'realisasi3'     	=> $realisasi3,
			'potensi3'      	=> $potensi3,
			'target3'      		=> $target3,
			'total_realisasi3' 	=> $total_realisasi3,
			'total_potensi3' 	=> $total_potensi3,
			'total_target3' 	=> $total_target3,
		);
		return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
		
	}
}
?>