<?php

class crekap extends CI_Controller {

   function __construct() {
      parent::__construct();
      $this->load->model('mrekap');
      
   }

   function index() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "CONSOLE") {
         redirect("clogin");
      }
      $this->load->view('content/vsuperuser/vrekap/vkkeuangan');
   }

   function pendapatan() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "CONSOLE") {
         redirect("clogin");
      }
      $tglawal = $this->input->post('tglawal');
      $tglakhir = $this->input->post('tglakhir');
      $nama = $this->session->userdata("nama");
      $data['rekap'] = $this->mrekap->mshow_all_rekap($tglawal,$tglakhir,$nama);
      $data['tglawal'] = $tglawal;
      $data['tglakhir'] = $tglakhir;
      $this->load->view('content/vsuperuser/vrekap/vrekap',$data);
   }

   function grafik_pendapatan() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "CONSOLE") {
         redirect("clogin");
      }
      $tglawal = $this->input->post('tglawal');
      $tglakhir = $this->input->post('tglakhir');
      $nama = $this->session->userdata("nama");
      $data['rekap'] = $this->mrekap->mshow_all_rekap($tglawal,$tglakhir,$nama);
      $data['tglawal'] = $tglawal;
      $data['tglakhir'] = $tglakhir;
      $this->load->view('content/vsuperuser/vrekap/vgrafik_rekap',$data);
   }

   function clihat_rekap() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "CONSOLE") {
          redirect("clogin");
      }
        $id = $this->uri->segment(4);
        $data['rekap'] = $this->mrekap->mselect_by_iduser($id);
        $this->load->view('content/vsuperuser/vrekap/vlihat_rekap', $data);
     }

   
}
