<?php

class cdetail_segmen extends CI_Controller {

   function __construct() {
      parent::__construct();
      $this->load->model('msegmen');
      
   }

   function index() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $this->load->view('content/vsuperuser/vdetail_segmen/vdetail_segmen');
   }

   function pendapatan_detail() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $tglawal = $this->input->post('tglawal');
      $tglakhir = $this->input->post('tglakhir');
      $nama = $this->session->userdata("nama");
      $lokasi = $this->input->post('lokasi');
      $data['rekap2'] = $this->msegmen->mshow_all_detailsegmen($tglawal,$tglakhir,$nama,$lokasi);
      $data['lokasi'] = $lokasi;
      $data['tglawal'] = $tglawal;
      $data['tglakhir'] = $tglakhir;
      $this->load->view('content/vsuperuser/vdetail_segmen/vhasil_segmen_detail',$data);
   }

   function grafik_detail_segmen() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $this->load->view('content/vsuperuser/vdetail_segmen/vgrafik_detail_segmen');
   }   
}
