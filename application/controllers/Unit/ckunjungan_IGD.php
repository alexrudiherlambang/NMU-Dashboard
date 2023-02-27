<?php

class ckunjungan_IGD extends CI_Controller {

   function __construct() {
      parent::__construct();
      $this->load->model('mrekap');
      
   }

   function index() {
      if ($this->session->userdata('status') != "Login" || !in_array($this->session->userdata("tlok"), array("RSG", "RSP", "RST", "RSMU", "URJ"))) {
			redirect("clogin");
		}
      $this->load->view('content/vunit/vkunjungan_IGD/vkunjungan_IGD');
   }

   function pendapatan() {
      if ($this->session->userdata('status') != "Login" || !in_array($this->session->userdata("tlok"), array("RSG", "RSP", "RST", "RSMU", "URJ"))) {
			redirect("clogin");
		}
      $tglawal = $this->input->post('tglawal');
      $tglakhir = $this->input->post('tglakhir');
      $nama = $this->session->userdata("nama");
      $lokasi = $this->input->post('lokasi');
      $data['rekap'] = $this->mrekap->mshow_all_rekap($tglawal,$tglakhir,$nama,$lokasi);
      // $rekap = $this->mrekap->mshow_all_rekap($tglawal,$tglakhir,$nama,$lokasi);
      // foreach ($rekap as $r) {
      //    $data 	= array(
      //       'ket'			      => $r->ket,
      //       'r_saldolalu'	   => $r->r_saldolalu,
      //       'r_saldosaatini'	=> $r->r_saldosaatini,
      //    );
      //    print_r ($data);
      //    die;

      // $this->Pasienmodel->tambahdata($data);
      // }

      $data['lokasi'] = $lokasi;
      $data['tglawal'] = $tglawal;
      $data['tglakhir'] = $tglakhir;
      $this->load->view('content/vunit/vrekap/vhasil_rekap',$data);
   }

   function grafik_pendapatan() {
      if ($this->session->userdata('status') != "Login" || !in_array($this->session->userdata("tlok"), array("RSG", "RSP", "RST", "RSMU", "URJ"))) {
			redirect("clogin");
		}
      $tglawal = $this->input->post('tglawal');
      $tglakhir = $this->input->post('tglakhir');
      $nama = $this->session->userdata("nama");
      $data['rekap'] = $this->mrekap->mshow_all_rekap($tglawal,$tglakhir,$nama);
      $data['tglawal'] = $tglawal;
      $data['tglakhir'] = $tglakhir;
      $this->load->view('content/vunit/vrekap/vgrafik_rekap',$data);
   }   
}
