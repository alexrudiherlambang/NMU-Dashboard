<?php

class cdetail_revenue extends CI_Controller {

   function __construct() {
      parent::__construct();
      $this->load->model('mdetail_revenue');
      
   }

   function index() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $this->load->view('content/vsuperuser/vdetail_revenue/vdetail_revenue');
   }

   function pendapatan_detail() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $tglawal = $this->input->post('tglawal');
      $tglakhir = $this->input->post('tglakhir');
      $nama = $this->session->userdata("nama");
      $lokasi = $this->input->post('lokasi');
      $data['rekap'] = $this->mdetail_revenue->mshow_all_call($tglawal,$tglakhir,$nama,$lokasi);
      $data['lokasi'] = $lokasi;
      $data['tglawal'] = $tglawal;
      $data['tglakhir'] = $tglakhir;
      $this->load->view('content/vsuperuser/vdetail_revenue/vhasil_revenue_detail',$data);
   }

   function grafik_detail_revenue() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      
      $this->load->view('content/vsuperuser/vdetail_revenue/vgrafik_detail_revenue');
   }   
}
