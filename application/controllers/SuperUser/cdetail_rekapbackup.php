<?php

class cdetail_rekap extends CI_Controller {

   function __construct() {
      parent::__construct();
      $this->load->model('mrekap');
      
   }

   function index() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $this->load->view('content/vsuperuser/vdetail_rekap/vdetail_rekap');
   }

   function pendapatan_detail() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $tglawal = $this->input->post('tglawal');
      $tglakhir = $this->input->post('tglakhir');
      $nama = $this->session->userdata("nama");
      $lokasi = $this->input->post('lokasi');
      $data['rekap2'] = $this->mrekap->mshow_all_rekap2($tglawal,$tglakhir,$nama,$lokasi);
      
      foreach ($data['rekap2'] as $rekap) {
         switch ($rekap->kelompok) {
            case "BPJS":
               $key = "bpjs";
               break;
            case "NON BPJS":
               $key = "nonbpjs";
               break;
            case "USAHA LAIN":
               $key = "usahalain";
               break;
            case "DI LUAR USAHA":
               $key = "usahaluar";
               break;
         }
         $data[$key][] = [
            'lokasi' => $rekap->lokasi,
            'keterangan' => $rekap->ket,
            'r_saldolalu' => $rekap->r_saldolalu,
            'r_saldosaatini' => $rekap->r_saldosaatini,
            'r_saldosampai' => $rekap->r_saldosampai,
            'jmlpotensi' => $rekap->jmlpotensi,
            'r_jmltarget' => $rekap->r_jmltarget,
            'jmlprosen' => $rekap->jmlprosen,
            'flag' => $rekap->flag,
            'kelompok' => $rekap->kelompok,
         ];
      }
      
      $data['lokasi'] = $lokasi;
      $data['tglawal'] = $tglawal;
      $data['tglakhir'] = $tglakhir;
      $this->load->view('content/vsuperuser/vdetail_rekap/vhasil_rekap_detail',$data);
   }

   function grafik_pendapatan() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $tglawal = $this->input->post('tglawal');
      $tglakhir = $this->input->post('tglakhir');
      $nama = $this->session->userdata("nama");
      $data['rekap'] = $this->mrekap->mshow_all_rekap($tglawal,$tglakhir,$nama);
      $data['tglawal'] = $tglawal;
      $data['tglakhir'] = $tglakhir;
      $this->load->view('content/vsuperuser/vdetail_rekap/vgrafik_rekap',$data);
   }   
}
