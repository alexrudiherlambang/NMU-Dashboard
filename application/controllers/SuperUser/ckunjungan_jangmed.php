<?php

class ckunjungan_jangmed extends CI_Controller {

   function __construct() {
      parent::__construct();
      $this->load->model('mkunjungan_jangmed');
      
   }

   function index() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $this->load->view('content/vsuperuser/vkunjungan_jangmed/vkunjungan_jangmed');
   }

   function kunjungan() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $tglawal = $this->input->post('tglawal');
      $tglakhir = $this->input->post('tglakhir');
      $nama = $this->session->userdata("nama");
      $lokasi = $this->input->post('lokasi');
      $kunjung = $this->mkunjungan_jangmed->mshow_all_call($tglawal,$tglakhir,$nama,$lokasi);

      //insert into log_aktifitas table
      if ($lokasi == ""){
         $log = array(
            'id'		   => $this->session->userdata("id"),
            'tglawal'   => $tglawal,
            'tglakhir'  => $tglakhir,
            'unit'      => 'KONSOLIDASI',
            'jenis'     => 'SEMUA',
            'platform'	=> $this->agent->platform(),
            'browser'	=> $this->agent->browser().' ('.$this->agent->version().')',
            'ip'		   => $this->input->ip_address(),
            'action'	   => 'Show Tabel Kunjungan Penunjang Medis',
         );
      }else{
         $log = array(
            'id'		   => $this->session->userdata("id"),
            'tglawal'   => $tglawal,
            'tglakhir'  => $tglakhir,
            'unit'      => $lokasi,
            'jenis'     => 'SEMUA',
            'platform'	=> $this->agent->platform(),
            'browser'	=> $this->agent->browser().' ('.$this->agent->version().')',
            'ip'		   => $this->input->ip_address(),
            'action'	   => 'Show Tabel Kunjungan Penunjang Medis',
         );
      }
      $this->mkunjungan_jangmed->insert_log($log);

      $data = array(
         'kunjung' => $kunjung,
         'lokasi' => $lokasi,
         'tglawal' => $tglawal,
         'tglakhir' => $tglakhir,
      );
      $this->load->view('content/vsuperuser/vkunjungan_jangmed/vhasil_kunjungan_jangmed',$data);
   }

   function grafik_kunjungan_jangmed() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $this->load->view('content/vsuperuser/vkunjungan_jangmed/vgrafik_kunjungan_jangmed');
   }

   function export_xls() {
      $nama = $this->session->userdata("nama");
      $pilihan = $this->input->post('pilihan');
      $tglawal = $this->input->post('tglawal');
      $tglakhir = $this->input->post('tglakhir');
      
      $this->load->helper('exportexcel');
      $namaFile = "Rekap Kunjungan Penunjang Medis.xls";
      $judul = "Rekap Kunjungan Penunjang Medis";
      $tablehead = 0;
      $tablebody = 1;
      $nourut = 1;
      //penulisan header
      header("Pragma: public");
      header("Expires: 0");
      header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
      header("Content-Type: application/force-download");
      header("Content-Type: application/octet-stream");
      header("Content-Type: application/download");
      header("Content-Disposition: attachment;filename=" . $namaFile . "");
      header("Content-Transfer-Encoding: binary ");
  
      xlsBOF();
  
      $kolomhead = 0;
      xlsWriteLabel($tablehead, $kolomhead++, "No");
      xlsWriteLabel($tablehead, $kolomhead++, "Unit");
      xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
      xlsWriteLabel($tablehead, $kolomhead++, "Kelompok Unit");
      xlsWriteLabel($tablehead, $kolomhead++, "Kelompok Segmen");
      // xlsWriteLabel($tablehead, $kolomhead++, "Kelompok Layanan");
      xlsWriteLabel($tablehead, $kolomhead++, "Kelompok BPJS / NON BPJS");
      xlsWriteLabel($tablehead, $kolomhead++, "Revenue Yang Lalu");
      xlsWriteLabel($tablehead, $kolomhead++, "Revenue Bulan Ini");
      xlsWriteLabel($tablehead, $kolomhead++, "Total Revenue s/d Saat Ini");
      xlsWriteLabel($tablehead, $kolomhead++, "Potensial Revenue");
      xlsWriteLabel($tablehead, $kolomhead++, "Target Revenue");
      xlsWriteLabel($tablehead, $kolomhead++, "Status");

      foreach ($pilihan as $p) {
         $ket = $p;
         foreach ($this->mkunjungan_jangmed->mshow_all_detail($nama, $ket, $tglawal, $tglakhir) as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->lokasi);
            xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
            xlsWriteLabel($tablebody, $kolombody++, $data->kelunit);
            xlsWriteLabel($tablebody, $kolombody++, $data->kelsegmen);
            // xlsWriteLabel($tablebody, $kolombody++, $data->kelompok);
            xlsWriteLabel($tablebody, $kolombody++, $data->ket);
            xlsWriteLabel($tablebody, $kolombody++, $data->rsaldolalu);
            xlsWriteLabel($tablebody, $kolombody++, $data->rsaldosaatini);
            xlsWriteLabel($tablebody, $kolombody++, $data->rsaldosampai);
            xlsWriteLabel($tablebody, $kolombody++, $data->rsaldopotensi1);
            xlsWriteLabel($tablebody, $kolombody++, $data->jmltarget);
            xlsWriteLabel($tablebody, $kolombody++, $data->statuse);
         
               $tablebody++;
            $nourut++;
         }
      }
  
      xlsEOF();
      exit();
   }
}
