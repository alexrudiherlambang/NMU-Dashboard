<?php

class ckunjungan_BPJS extends CI_Controller {

   function __construct() {
      parent::__construct();
      $this->load->model('mkunjungan_BPJS');
      
   }

   function index() {
      if ($this->session->userdata('status') != "Login" || !in_array($this->session->userdata("tlok"), array("RSG", "RSP", "RST", "RSMU", "URJ"))) {
			redirect("clogin");
		}
      $this->load->view('content/vunit/vkunjungan_BPJS/vkunjungan_BPJS');
   }

   function kunjungan() {
      if ($this->session->userdata('status') != "Login" || !in_array($this->session->userdata("tlok"), array("RSG", "RSP", "RST", "RSMU", "URJ"))) {
			redirect("clogin");
		}
      $tglawal = $this->input->post('tglawal');
      $tglakhir = $this->input->post('tglakhir');
      $nama = $this->session->userdata("nama");
      $lokasi = $this->input->post('lokasi');
      $kunjung = $this->mkunjungan_BPJS->mshow_all_call($tglawal,$tglakhir,$nama,$lokasi);
      
      $data = array(
         'kunjung' => $kunjung,
         'lokasi' => $lokasi,
         'tglawal' => $tglawal,
         'tglakhir' => $tglakhir,
      );
      // echo "<pre>";
      // print_r ($data);
      // die;
      $this->load->view('content/vunit/vkunjungan_BPJS/vhasil_kunjungan_BPJS',$data);
   }

   function grafik_kunjungan_bpjs() {
      if ($this->session->userdata('status') != "Login" || !in_array($this->session->userdata("tlok"), array("RSG", "RSP", "RST", "RSMU", "URJ"))) {
			redirect("clogin");
		}
      
      $this->load->view('content/vunit/vkunjungan_bpjs/vgrafik_kunjungan_bpjs');
   }   
}
