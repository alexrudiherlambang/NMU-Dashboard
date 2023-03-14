<?php

class ckunjungan_jangmed extends CI_Controller {

   function __construct() {
      parent::__construct();
      $this->load->model('mkunjungan_jangmed');
      
   }

   function index() {
      if ($this->session->userdata('status') != "Login" || !in_array($this->session->userdata("tlok"), array("RSG", "RSP", "RST", "RSMU", "URJ"))) {
			redirect("clogin");
		}
      $this->load->view('content/vunit/vkunjungan_jangmed/vkunjungan_jangmed');
   }

   function kunjungan() {
      if ($this->session->userdata('status') != "Login" || !in_array($this->session->userdata("tlok"), array("RSG", "RSP", "RST", "RSMU", "URJ"))) {
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
      $this->load->view('content/vunit/vkunjungan_jangmed/vhasil_kunjungan_jangmed',$data);
   }

   function grafik_kunjungan_jangmed() {
      if ($this->session->userdata('status') != "Login" || !in_array($this->session->userdata("tlok"), array("RSG", "RSP", "RST", "RSMU", "URJ"))) {
			redirect("clogin");
		}
      $nama = $this->session->userdata("nama");
      $data['jenis'] = $this->mkunjungan_jangmed->mshow_all_jenis($nama);
      $this->load->view('content/vunit/vkunjungan_jangmed/vgrafik_kunjungan_jangmed', $data);
   }

   function grafik_hasil_kunjungan() {
      if ($this->session->userdata('status') != "Login" || !in_array($this->session->userdata("tlok"), array("RSG", "RSP", "RST", "RSMU", "URJ"))) {
			redirect("clogin");
		}
      $tglawal = $this->input->post('tglawal');
      $tglakhir = $this->input->post('tglakhir');
      $lokasi = $this->input->post('lokasi');
      $jenis = $this->input->post('jenis');
      $nama = $this->session->userdata("nama");
      
      if ($jenis == "SEMUA") {
         $grafik = $this->mkunjungan_jangmed->mshow_all_grafik_all_jenis($tglawal,$tglakhir,$lokasi,$jenis,$nama);

         foreach ($grafik->result() as $b) {
            $hasiltanggal[] = date('d-M', strtotime($b->tanggal));
            $hasilrevenue[$b->kelunit][] = $b->total_rsaldosampai;
            $hasiltarget[$b->kelunit][] = $b->total_jmltarget;
         }
         // Buat array hasil tanggal dari kunci array asosiatif
        
         foreach ($hasilrevenue as $kelunit => $revenues) {
            $hasilrevenue_data[] = array(
              'name' => $kelunit,
              'data' => $revenues
            );
         }
          
         foreach ($hasiltarget as $kelunit => $targets) {
            $hasiltarget_data[] = array(
              'name' => $kelunit,
              'data' => $targets
            );
         }
         $graf_pie = $this->mkunjungan_jangmed->mshow_all_pie_all_jenis($tglawal,$tglakhir,$lokasi,$jenis,$nama);
         foreach ($graf_pie->result() as $b){
            $pie[] = $b;
         }
         $jenis2 = $this->mkunjungan_jangmed->mshow_all_jenis($nama);   
         if (empty($hasiltanggal)) {
            echo '<script language="javascript">alert("Data Tidak Tersedia !!!"); document.location="grafik_kunjungan_jangmed";</script>';
         }else{
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

            //insert into log_aktifitas table
            if ($lokasi == ""){
               $log = array(
                  'id'		   => $this->session->userdata("id"),
                  'tglawal'   => $tglawal,
                  'tglakhir'  => $tglakhir,
                  'unit'      => 'KONSOLIDASI',
                  'jenis'     => $jenis,
                  'platform'	=> $this->agent->platform(),
                  'browser'	=> $this->agent->browser().' ('.$this->agent->version().')',
                  'ip'		   => $this->input->ip_address(),
                  'action'	   => 'Show Grafik Kegiatan Penunjang Medis',
               );
            }else{
               $log = array(
                  'id'		   => $this->session->userdata("id"),
                  'tglawal'   => $tglawal,
                  'tglakhir'  => $tglakhir,
                  'unit'      => $lokasi,
                  'jenis'     => $jenis,
                  'platform'	=> $this->agent->platform(),
                  'browser'	=> $this->agent->browser().' ('.$this->agent->version().')',
                  'ip'		   => $this->input->ip_address(),
                  'action'	   => 'Show Grafik Kegiatan Penunjang Medis',
               );
            }
            $this->mkunjungan_jangmed->insert_log($log);
            $this->load->view('content/vunit/vkunjungan_jangmed/vgrafik_hasil_kunjungan_jangmed_all',$data);
         }
      }else{
         $grafik = $this->mkunjungan_jangmed->mshow_all_grafik($tglawal,$tglakhir,$lokasi,$jenis,$nama);
         $grafik_kp = $this->mkunjungan_jangmed->mshow_all_grafik_kp($tglawal,$tglakhir,$lokasi,$jenis,$nama);

         foreach ($grafik->result() as $b){
            $hasiltanggal[] = array (
               $tanggal_baru = date('d-M', strtotime($b->tanggal)),
            );
            $hasilrevenue[] = $b->total_rsaldosampai;
            $hasiltarget[] = $b->total_jmltarget;
         }
         foreach ($grafik_kp->result() as $d){
            $pie[] = $d;
         }
         $jenis2 = $this->mkunjungan_jangmed->mshow_all_jenis($nama);   
         if (empty($hasiltanggal)) {
            echo '<script language="javascript">alert("Data Tidak Tersedia !!!"); document.location="grafik_kunjungan_jangmed";</script>';
         }else{
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

            //insert into log_aktifitas table
            if ($lokasi == ""){
               $log = array(
                  'id'		   => $this->session->userdata("id"),
                  'tglawal'   => $tglawal,
                  'tglakhir'  => $tglakhir,
                  'unit'      => 'KONSOLIDASI',
                  'jenis'     => $jenis,
                  'platform'	=> $this->agent->platform(),
                  'browser'	=> $this->agent->browser().' ('.$this->agent->version().')',
                  'ip'		   => $this->input->ip_address(),
                  'action'	   => 'Show Grafik Kegiatan Penunjang Medis',
               );
            }else{
               $log = array(
                  'id'		   => $this->session->userdata("id"),
                  'tglawal'   => $tglawal,
                  'tglakhir'  => $tglakhir,
                  'unit'      => $lokasi,
                  'jenis'     => $jenis,
                  'platform'	=> $this->agent->platform(),
                  'browser'	=> $this->agent->browser().' ('.$this->agent->version().')',
                  'ip'		   => $this->input->ip_address(),
                  'action'	   => 'Show Grafik Kegiatan Penunjang Medis',
               );
            }
            $this->mkunjungan_jangmed->insert_log($log);
            
            $this->load->view('content/vunit/vkunjungan_jangmed/vgrafik_hasil_kunjungan_jangmed',$data);
         }
      }
   }

   function export_xls() {
      $nama = $this->session->userdata("nama");
      $pilihan = $this->input->post('pilihan');
      $tglawal = $this->input->post('tglawal');
      $tglakhir = $this->input->post('tglakhir');
      
      $this->load->helper('exportexcel');
      $namaFile = "Rekap Kegiatan Penunjang Medis.xls";
      $judul = "Rekap Kegiatan Penunjang Medis";
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
      xlsWriteLabel($tablehead, $kolomhead++, "Kegiatan Yang Lalu");
      xlsWriteLabel($tablehead, $kolomhead++, "Kegiatan Bulan Ini");
      xlsWriteLabel($tablehead, $kolomhead++, "Total Kegiatan s/d Saat Ini");
      xlsWriteLabel($tablehead, $kolomhead++, "Potensial Kegiatan");
      xlsWriteLabel($tablehead, $kolomhead++, "Target Kegiatan");
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
