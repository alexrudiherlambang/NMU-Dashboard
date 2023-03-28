<?php

class creport extends CI_Controller {

   function __construct() {
      parent::__construct();
      $this->load->model('mreport');
      
   }

   function index() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $this->load->view('content/vsuperuser/vreport/vreport');
   }

   function report() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $tglawal = $this->input->post('tglawal');
      $tglakhir = $this->input->post('tglakhir');
      $nama = $this->session->userdata("nama");
      $lokasi = $this->input->post('lokasi');
      $jenis = $this->input->post('jenis');

      //insert into log_aktifitas table
      // $log = array(
      //    'id'		   => $this->session->userdata("id"),
      //    'tglawal'   => $tglawal,
      //    'tglakhir'  => $tglakhir,
      //    'unit'      => $lokasi,
      //    'jenis'     => $jenis,
      //    'platform'	=> $this->agent->platform(),
      //    'browser'	=> $this->agent->browser().' ('.$this->agent->version().')',
      //    'ip'		   => $this->input->ip_address(),
      //    'action'	   => 'Show Data Report',
      // );
      // $this->mreport->insert_log($log);

      if ($jenis == "NILAI HARI DOKTER BERDASARKAN PERIODE"){
         //eksekusi Query
         // $data['hasil'] = $this->mreport->mshow_hasil_query1($tglawal,$tglakhir,$lokasi);
         $data['lokasi'] = $lokasi;
         $data['jenis'] = $jenis;
         $data['tglawal'] = $tglawal;
         $data['tglakhir'] = $tglakhir;
         $this->load->view('content/vsuperuser/vreport/vhasil_report1',$data);
      }elseif ($jenis == "CEK KASBON PPN"){
         //eksekusi Query
         // $data['hasil'] = $this->mreport->mshow_hasil_query2($tglawal,$tglakhir,$lokasi);
         $data['lokasi'] = $lokasi;
         $data['jenis'] = $jenis;
         $data['tglawal'] = $tglawal;
         $data['tglakhir'] = $tglakhir;
         $this->load->view('content/vsuperuser/vreport/vhasil_report2',$data);
      }elseif ($jenis == "PERHITUNGAN  BIAYA INVENTORY"){
         //eksekusi Query
         // $data['hasil'] = $this->mreport->mshow_hasil_query3($tglawal,$tglakhir,$lokasi);
         $data['lokasi'] = $lokasi;
         $data['jenis'] = $jenis;
         $data['tglawal'] = $tglawal;
         $data['tglakhir'] = $tglakhir;
         $this->load->view('content/vsuperuser/vreport/vhasil_report3',$data);
      }elseif ($jenis == "TOTAL BILLING RAWAT INAP"){
         //eksekusi Query
         // $data['hasil'] = $this->mreport->mshow_hasil_query4($tglawal,$tglakhir,$lokasi);
         $data['lokasi'] = $lokasi;
         $data['jenis'] = $jenis;
         $data['tglawal'] = $tglawal;
         $data['tglakhir'] = $tglakhir;
         $this->load->view('content/vsuperuser/vreport/vhasil_report4',$data);
      }elseif ($jenis == "TOTAL BILLING RAWAT JALAN"){
         //eksekusi Query
         // $data['hasil'] = $this->mreport->mshow_hasil_query5($tglawal,$tglakhir,$lokasi);
         $data['lokasi'] = $lokasi;
         $data['jenis'] = $jenis;
         $data['tglawal'] = $tglawal;
         $data['tglakhir'] = $tglakhir;
         $this->load->view('content/vsuperuser/vreport/vhasil_report5',$data);
      }elseif ($jenis == "REPORT RUJUKAN DOKTER KE LAB"){
         //eksekusi Query
         // $data['hasil'] = $this->mreport->mshow_hasil_query6($tglawal,$tglakhir,$lokasi);
         $data['lokasi'] = $lokasi;
         $data['jenis'] = $jenis;
         $data['tglawal'] = $tglawal;
         $data['tglakhir'] = $tglakhir;
         $this->load->view('content/vsuperuser/vreport/vhasil_report6',$data);
      }elseif ($jenis == "REPORT KUNJUNGAN KE LAB RAWAT JALAN"){
         //eksekusi Query
         // $data['hasil'] = $this->mreport->mshow_hasil_query7($tglawal,$tglakhir,$lokasi);
         $data['lokasi'] = $lokasi;
         $data['jenis'] = $jenis;
         $data['tglawal'] = $tglawal;
         $data['tglakhir'] = $tglakhir;
         $this->load->view('content/vsuperuser/vreport/vhasil_report7',$data);
      }elseif ($jenis == "KUNJUNGAN KE LAB RAWAT INAP"){
         //eksekusi Query
         // $data['hasil'] = $this->mreport->mshow_hasil_query8($tglawal,$tglakhir,$lokasi);
         $data['lokasi'] = $lokasi;
         $data['jenis'] = $jenis;
         $data['tglawal'] = $tglawal;
         $data['tglakhir'] = $tglakhir;
         $this->load->view('content/vsuperuser/vreport/vhasil_report8',$data);
      }elseif ($jenis == "MEMORIAL RAWAT INAP"){
         //eksekusi Query
         // $data['hasil'] = $this->mreport->mshow_hasil_query9($tglawal,$tglakhir,$lokasi);
         $data['lokasi'] = $lokasi;
         $data['jenis'] = $jenis;
         $data['tglawal'] = $tglawal;
         $data['tglakhir'] = $tglakhir;
         $this->load->view('content/vsuperuser/vreport/vhasil_report9',$data);
      }elseif ($jenis == "MEMORIAL RAWAT JALAN"){
         //eksekusi Query
         // $data['hasil'] = $this->mreport->mshow_hasil_query10($tglawal,$tglakhir,$lokasi);
         $data['lokasi'] = $lokasi;
         $data['jenis'] = $jenis;
         $data['tglawal'] = $tglawal;
         $data['tglakhir'] = $tglakhir;
         $this->load->view('content/vsuperuser/vreport/vhasil_report10',$data);
      }elseif ($jenis == "KUNJUNGAN DOKTER SELAIN SHIFT PAGI"){
         //eksekusi Query
         // $data['hasil'] = $this->mreport->mshow_hasil_query11($tglawal,$tglakhir,$lokasi);
         $data['lokasi'] = $lokasi;
         $data['jenis'] = $jenis;
         $data['tglawal'] = $tglawal;
         $data['tglakhir'] = $tglakhir;
         $this->load->view('content/vsuperuser/vreport/vhasil_report11',$data);
      }
   }

   // function export_xlsx() {
   //    $nama = $this->session->userdata("nama");
   //    $pilihan = $this->input->post('pilihan');
   //    $tglawal = $this->input->post('tglawal');
   //    $tglakhir = $this->input->post('tglakhir');
      
   //    $this->load->helper('exportexcel');
   //    $namaFile = "Rekap Pendapatan BPJS / NON BPJS.xls";
   //    $judul = "Rekap Pendapatan BPJS / NON BPJS";
   //    $tablehead = 0;
   //    $tablebody = 1;
   //    $nourut = 1;
   //    //penulisan header
   //    header("Pragma: public");
   //    header("Expires: 0");
   //    header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
   //    header("Content-Type: application/force-download");
   //    header("Content-Type: application/octet-stream");
   //    header("Content-Type: application/download");
   //    header("Content-Disposition: attachment;filename=" . $namaFile . "");
   //    header("Content-Transfer-Encoding: binary ");

   //    xlsBOF();

   //    $kolomhead = 0;
   //    xlsWriteLabel($tablehead, $kolomhead++, "No");
   //    xlsWriteLabel($tablehead, $kolomhead++, "Unit");
   //    xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
   //    xlsWriteLabel($tablehead, $kolomhead++, "Kelompok Spesimen");
   //    xlsWriteLabel($tablehead, $kolomhead++, "Kelompok BPJS / NON BPJS");
   //    xlsWriteLabel($tablehead, $kolomhead++, "Revenue Yang Lalu");
   //    xlsWriteLabel($tablehead, $kolomhead++, "Revenue Bulan Ini");
   //    xlsWriteLabel($tablehead, $kolomhead++, "Total Revenue s/d Saat Ini");
   //    xlsWriteLabel($tablehead, $kolomhead++, "Potensial Revenue");
   //    xlsWriteLabel($tablehead, $kolomhead++, "Target Revenue");
   //    xlsWriteLabel($tablehead, $kolomhead++, "Status");

   //    foreach ($pilihan as $p) {
   //       $ket = $p;
   //       foreach ($this->mreport->mshow_all_detail($nama, $ket, $tglawal, $tglakhir) as $data) {
   //          $kolombody = 0;

   //          //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
   //          xlsWriteNumber($tablebody, $kolombody++, $nourut);
   //          xlsWriteLabel($tablebody, $kolombody++, $data->lokasi);
   //          xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
   //          xlsWriteLabel($tablebody, $kolombody++, $data->kelspesimen);
   //          xlsWriteLabel($tablebody, $kolombody++, $data->ket);
   //          xlsWriteLabel($tablebody, $kolombody++, $data->rsaldolalu);
   //          xlsWriteLabel($tablebody, $kolombody++, $data->rsaldosaatini);
   //          xlsWriteLabel($tablebody, $kolombody++, $data->rsaldosampai);
   //          xlsWriteLabel($tablebody, $kolombody++, $data->rsaldopotensi1);
   //          xlsWriteLabel($tablebody, $kolombody++, $data->jmltarget);
   //          xlsWriteLabel($tablebody, $kolombody++, $data->statuse);
         
   //             $tablebody++;
   //          $nourut++;
   //       }
   //    }

   //    xlsEOF();
   //    exit();
   // }
}
