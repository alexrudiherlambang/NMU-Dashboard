<?php

class crekap extends CI_Controller {

   function __construct() {
      parent::__construct();
      $this->load->model('mrekap');
      
   }

   function index() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $this->load->view('content/vsuperuser/vrekap/vrekap');
   }

   function pendapatan() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $tglawal = $this->input->post('tglawal');
      $tglakhir = $this->input->post('tglakhir');
      $nama = $this->session->userdata("nama");
      $lokasi = $this->input->post('lokasi');
      
      //eksekusi prosedure & Call Tabel Container
      $data['rekap'] = $this->mrekap->mshow_all_call($tglawal,$tglakhir,$nama,$lokasi);    
      
      $data['lokasi'] = $lokasi;
      $data['tglawal'] = $tglawal;
      $data['tglakhir'] = $tglakhir;
      $this->load->view('content/vsuperuser/vrekap/vhasil_rekap',$data);
   }

   function grafik_pendapatan() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $nama = $this->session->userdata("nama");
      $data['jenis'] = $this->mrekap->mshow_all_jenis($nama);   
      $this->load->view('content/vsuperuser/vrekap/vgrafik_rekap',$data);
   }
   
   function grafik_hasil_pendapatan() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $tglawal = $this->input->post('tglawal');
      $tglakhir = $this->input->post('tglakhir');
      $lokasi = $this->input->post('lokasi');
      $jenis = $this->input->post('jenis');
      $nama = $this->session->userdata("nama");
      
      $grafik = $this->mrekap->mshow_all_grafik($tglawal,$tglakhir,$lokasi,$jenis,$nama);
      
      foreach ($grafik->result() as $b){
         $hasiltanggal[] = array (
            $tanggal_baru = date('d m Y', strtotime($b->tanggal)),
         );
         $hasilrevenue[] = $b->total_rsaldosampai;
         $hasiltarget[] = $b->total_jmltarget;
         $pie[] = $b;
      }
      $jenis2 = $this->mrekap->mshow_all_jenis($nama);   

      $data =  array (
         'tanggal'      => $hasiltanggal,
         'revenue'      => $hasilrevenue,
         'target'       => $hasiltarget,
         'pie'          => $pie,
         'tglawal'      => $tglawal,
         'tglakhir'     => $tglakhir,
         'lokasi'       => $lokasi,
         'jenis'        => $jenis,
         'jenis2'       => $jenis2,
      );
      $this->load->view('content/vsuperuser/vrekap/vgrafik_hasil_rekap',$data);
   }
}
