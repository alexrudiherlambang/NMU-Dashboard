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
		$this->load->view('content/vsuperuser/home');
	}

	function pendapatan(){
		
		$nama = $this->session->userdata("nama");
		$lokasi = $this->session->userdata("tlok");
		$grafik_pendapatan = $this->mhome->mshow_all_grafik_pendapatan($lokasi,$nama);
		
		$realisasi = (object)[];
		$potensi = (object)[];
		$target = (object)[];
		foreach ($grafik_pendapatan->result() as $b) {
			$realisasi->{$b->lokasi} = $b->total_rsaldosampai;
			$potensi->{$b->lokasi} = $b->total_rsaldopotensi1;
			$target->{$b->lokasi} = $b->total_jmltarget;
		}
		
		$data =  array (
			'realisasi'    	 	=> $realisasi,
			'potensi'      		=> $potensi,
			'target'      		=> $target,
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
		foreach ($grafik_labarugi->result() as $c) {
			$realisasi1->{$c->lokasi} = $c->total_rsaldosampai;
			$potensi1->{$c->lokasi} = $c->total_rsaldopotensi1;
			$target1->{$c->lokasi} = $c->total_jmltarget;
		}
		$data =  array (
			'realisasi1'     	=> $realisasi1,
			'potensi1'      	=> $potensi1,
			'target1'      		=> $target1,
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
		foreach ($grafik_biaya->result() as $c) {
			$realisasi2->{$c->lokasi} = $c->total_rsaldosampai;
			$potensi2->{$c->lokasi} = $c->total_rsaldopotensi1;
			$target2->{$c->lokasi} = $c->total_jmltarget;
		}
		
		$data =  array (
			'realisasi2'     	=> $realisasi2,
			'potensi2'      	=> $potensi2,
			'target2'      		=> $target2,
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
		foreach ($grafik_kunjungan->result() as $e) {
			$realisasi3->{$e->lokasi} = $e->total_rsaldosampai;
			$potensi3->{$e->lokasi} = $e->total_rsaldopotensi1;
			$target3->{$e->lokasi} = $e->total_jmltarget;
		}
		
		$data =  array (
			'realisasi3'     	=> $realisasi3,
			'potensi3'      	=> $potensi3,
			'target3'      		=> $target3,
		);
		return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
		
	}
}
?>