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
      $nama = $this->session->userdata("nama");
      $data['jenis'] = $this->mdetail_revenue->mshow_all_jenis($nama);
      $this->load->view('content/vsuperuser/vdetail_revenue/vgrafik_detail_revenue',$data);
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
      
      if ($jenis == "SEMUA") {
         $grafik = $this->mdetail_revenue->mshow_all_grafik_all_jenis($tglawal,$tglakhir,$lokasi,$jenis,$nama);
         
         foreach ($grafik->result() as $b){
            if ($b->kelspesimen == "1. RAWAT JALAN"){
               $rjtanggal[] = array (
                  $tanggal_baru = date('d-M', strtotime($b->tanggal)),
               );
               $rjrevenue[] = number_format($b->total_rsaldosampai/1000000, 0, ',', '.');
               $rjtarget[] = number_format($b->total_jmltarget/1000000, 0, ',', '.');
            } elseif ($b->kelspesimen == "2. RAWAT INAP") {
               $ritanggal[] = array (
                  $tanggal_baru = date('d-M', strtotime($b->tanggal)),
               );
               $rirevenue[] = number_format($b->total_rsaldosampai/1000000, 0, ',', '.');
               $ritarget[] = number_format($b->total_jmltarget/1000000, 0, ',', '.');
            } elseif ($b->kelspesimen == "3. PENUNJANG") {
               $penunjangtanggal[] = array (
                  $tanggal_baru = date('d-M', strtotime($b->tanggal)),
               );
               $penunjangrevenue[] = number_format($b->total_rsaldosampai/1000000, 0, ',', '.');
               $penunjangtarget[] = number_format($b->total_jmltarget/1000000, 0, ',', '.');
            } elseif ($b->kelspesimen == "4. USAHA LAIN") {
               $ultanggal[] = array (
                  $tanggal_baru = date('d-M', strtotime($b->tanggal)),
               );
               $ulrevenue[] = number_format($b->total_rsaldosampai/1000000, 0, ',', '.');
               $ultarget[] = number_format($b->total_jmltarget/1000000, 0, ',', '.');
            }
         }
         $graf_pie = $this->mdetail_revenue->mshow_all_pie_all_jenis($tglawal,$tglakhir,$lokasi,$jenis,$nama);
         
         foreach ($graf_pie->result() as $c){
            $pie[] = $c;
         }
         $jenis2 = $this->mdetail_revenue->mshow_all_jenis($nama);   

         $data =  array (
            'rjtanggal'       => $rjtanggal,
            'rjrevenue'       => $rjrevenue,
            'rjtarget'        => $rjtarget,
            'ritanggal'       => $ritanggal,
            'rirevenue'       => $rirevenue,
            'ritarget'        => $ritarget,
            'penunjangtanggal'=> $penunjangtanggal,
            'penunjangrevenue'=> $penunjangrevenue,
            'penunjangtarget' => $penunjangtarget,
            'ultanggal'       => $ultanggal,
            'ulrevenue'       => $ulrevenue,
            'ultarget'        => $ultarget,
            'pie'             => $pie,
            'tglawal'         => $tglawal,
            'tglakhir'        => $tglakhir,
            'lokasi'          => $lokasi,
            'jenis'           => $jenis,
            'jenis2'          => $jenis2,
         );
         $this->load->view('content/vsuperuser/vdetail_revenue/vgrafik_hasil_detail_revenue_all',$data);

      }else{
         $grafik = $this->mdetail_revenue->mshow_all_grafik($tglawal,$tglakhir,$lokasi,$jenis,$nama);
         $grafik_kp = $this->mdetail_revenue->mshow_all_grafik_kp($tglawal,$tglakhir,$lokasi,$jenis,$nama);
         
         foreach ($grafik->result() as $b){
            $hasiltanggal[] = array (
               $tanggal_baru = date('d-M', strtotime($b->tanggal)),
            );
            $hasilrevenue[] = number_format($b->total_rsaldosampai/1000000, 0, ',', '.');
            $hasiltarget[] = number_format($b->total_jmltarget/1000000, 0, ',', '.');
         }
         foreach ($grafik_kp->result() as $d){
            $pie[] = $d;
         }
         $jenis2 = $this->mdetail_revenue->mshow_all_jenis($nama);   

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
         $this->load->view('content/vsuperuser/vdetail_revenue/vgrafik_hasil_detail_revenue',$data);
      }
   }
   function export_xls() {
      $nama = $this->session->userdata("nama");
      $pilihan = $this->input->post('pilihan');
      
      $this->load->helper('exportexcel');
      $namaFile = "Rekap Pendapatan Per-Revenue Stream.xls";
      $judul = "Rekap Pendapatan Per-Revenue Stream";
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
      xlsWriteLabel($tablehead, $kolomhead++, "Uraian");
      xlsWriteLabel($tablehead, $kolomhead++, "Revenue Yang Lalu");
      xlsWriteLabel($tablehead, $kolomhead++, "Revenue Bulan Ini");
      xlsWriteLabel($tablehead, $kolomhead++, "Total Revenue s/d Saat Ini");
      xlsWriteLabel($tablehead, $kolomhead++, "Potensial Revenue");
      xlsWriteLabel($tablehead, $kolomhead++, "Target Revenue");

      foreach ($pilihan as $p) {
         $ket = $p;
         foreach ($this->mdetail_revenue->mshow_all_detail($nama, $ket) as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->lokasi);
            xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
            xlsWriteLabel($tablebody, $kolombody++, $data->kelspesimen);
            xlsWriteLabel($tablebody, $kolombody++, $data->rsaldolalu);
            xlsWriteLabel($tablebody, $kolombody++, $data->rsaldosaatini);
            xlsWriteLabel($tablebody, $kolombody++, $data->rsaldosampai);
            xlsWriteLabel($tablebody, $kolombody++, $data->rsaldopotensi1);
            xlsWriteLabel($tablebody, $kolombody++, $data->jmltarget);
         
               $tablebody++;
            $nourut++;
         }
      }
  
      xlsEOF();
      exit();
   }
}
