<?php

class cbiaya extends CI_Controller {

   function __construct() {
      parent::__construct();
      $this->load->model('mbiaya');
      
   }

   function index() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $this->load->view('content/vsuperuser/vbiaya/vbiaya');
   }

   function biaya() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $tglawal = $this->input->post('tglawal');
      $tglakhir = $this->input->post('tglakhir');
      $nama = $this->session->userdata("nama");
      $lokasi = $this->input->post('lokasi');
      $data['biaya'] = $this->mbiaya->mshow_all_biaya($tglawal,$tglakhir,$nama,$lokasi);
      
      $data['lokasi'] = $lokasi;
      $data['tglawal'] = $tglawal;
      $data['tglakhir'] = $tglakhir;
      $this->load->view('content/vsuperuser/vbiaya/vhasil_biaya',$data);
   }

   function grafik_biaya() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $nama = $this->session->userdata("nama");
      $data['jenis'] = $this->mbiaya->mshow_all_jenis($nama);
      
      $this->load->view('content/vsuperuser/vbiaya/vgrafik_biaya', $data);
   }

   function grafik_hasil_biaya() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $tglawal = $this->input->post('tglawal');
      $tglakhir = $this->input->post('tglakhir');
      $lokasi = $this->input->post('lokasi');
      $jenis = $this->input->post('jenis');
      $nama = $this->session->userdata("nama");
      
      if ($jenis == "SEMUA") {
         $grafik = $this->mbiaya->mshow_all_grafik_all_jenis($tglawal,$tglakhir,$lokasi,$jenis,$nama);
         
         foreach ($grafik->result() as $b) {
            $hasiltanggal[] = date('d-M', strtotime($b->tanggal));
            $hasilrevenue[$b->kelspesimen][] = number_format($b->total_rsaldosampai/1000000, 0, ',', '.');
            $hasiltarget[$b->kelspesimen][] = number_format($b->total_jmltarget/1000000, 0, ',', '.');
         }
          
         foreach ($hasilrevenue as $kelspesimen => $revenues) {
            $hasilrevenue_data[] = array(
              'name' => $kelspesimen,
              'data' => $revenues
            );
         }
          
         foreach ($hasiltarget as $kelspesimen => $targets) {
            $hasiltarget_data[] = array(
              'name' => $kelspesimen,
              'data' => $targets
            );
         }
         $graf_pie = $this->mbiaya->mshow_all_pie_all_jenis($tglawal,$tglakhir,$lokasi,$jenis,$nama);
         
         foreach ($graf_pie->result() as $c){
            $pie[] = $c;
         }
         $jenis2 = $this->mbiaya->mshow_all_jenis($nama);   

         $data =  array (
            'tanggal'         => $hasiltanggal,
            'revenue'         => $hasilrevenue,
            'target'          => $hasiltarget,
            'pie'             => $pie,
            'tglawal'         => $tglawal,
            'tglakhir'        => $tglakhir,
            'lokasi'          => $lokasi,
            'jenis'           => $jenis,
            'jenis2'          => $jenis2,
         );
         $this->load->view('content/vsuperuser/vbiaya/vgrafik_hasil_biaya_all',$data);

      }else{
         $grafik = $this->mbiaya->mshow_all_grafik($tglawal,$tglakhir,$lokasi,$jenis,$nama);
         $grafik_kp = $this->mbiaya->mshow_all_grafik_kp($tglawal,$tglakhir,$lokasi,$jenis,$nama);
         
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
         $jenis2 = $this->mbiaya->mshow_all_jenis($nama);   

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
         $this->load->view('content/vsuperuser/vbiaya/vgrafik_hasil_biaya',$data);
      }
   }

   function export_xls() {
      $nama = $this->session->userdata("nama");
      $pilihan = $this->input->post('pilihan');
      
      $this->load->helper('exportexcel');
      $namaFile = "Rekap Beban Biaya.xls";
      $judul = "Rekap Beban Biaya";
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
      xlsWriteLabel($tablehead, $kolomhead++, "Beban Yang Lalu");
      xlsWriteLabel($tablehead, $kolomhead++, "Beban Bulan Ini");
      xlsWriteLabel($tablehead, $kolomhead++, "Total Beban s/d Saat Ini");
      xlsWriteLabel($tablehead, $kolomhead++, "Potensial Beban");
      xlsWriteLabel($tablehead, $kolomhead++, "Target Beban");

      foreach ($pilihan as $p) {
         $ket = $p;
         
         foreach ($this->mbiaya->mshow_all_detail($nama, $ket) as $data) {
            
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
