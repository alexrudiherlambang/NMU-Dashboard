<?php

class ckunjungan_persegmen extends CI_Controller {

   function __construct() {
      parent::__construct();
      $this->load->model('mkunjungan_persegmen');
      
   }

   function index() {
      if ($this->session->userdata('status') != "Login" || !in_array($this->session->userdata("tlok"), array("RSG", "RSP", "RST", "RSMU", "URJ"))) {
			redirect("clogin");
		}
      $this->load->view('content/vunit/vkunjungan_persegmen/vkunjungan_persegmen');
   }

   function kunjungan() {
      if ($this->session->userdata('status') != "Login" || !in_array($this->session->userdata("tlok"), array("RSG", "RSP", "RST", "RSMU", "URJ"))) {
			redirect("clogin");
		}
      $tglawal = $this->input->post('tglawal');
      $tglakhir = $this->input->post('tglakhir');
      $nama = $this->session->userdata("nama");
      $lokasi = $this->input->post('lokasi');
      $kunjung = $this->mkunjungan_persegmen->mshow_all_call($tglawal,$tglakhir,$nama,$lokasi);

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
            'action'	   => 'Show Tabel Kunjungan Per-Segmen',
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
            'action'	   => 'Show Tabel Kunjungan Per-Segmen',
         );
      }
      $this->mkunjungan_persegmen->insert_log($log);
      
      $data = array(
         'kunjung' => $kunjung,
         'lokasi' => $lokasi,
         'tglawal' => $tglawal,
         'tglakhir' => $tglakhir,
      );
      $this->load->view('content/vunit/vkunjungan_persegmen/vhasil_kunjungan_persegmen',$data);
   }

   function grafik_persegmen() {
      if ($this->session->userdata('status') != "Login" || !in_array($this->session->userdata("tlok"), array("RSG", "RSP", "RST", "RSMU", "URJ"))) {
			redirect("clogin");
		}
      $nama = $this->session->userdata("nama");
      $data['jenis'] = $this->mkunjungan_persegmen->mshow_all_jenis($nama);
      $this->load->view('content/vunit/vkunjungan_persegmen/vgrafik_kunjungan_persegmen', $data);
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
         $grafik = $this->mkunjungan_persegmen->mshow_all_grafik_all_jenis($tglawal,$tglakhir,$lokasi,$jenis,$nama);
         
         foreach ($grafik->result() as $b) {
            $hasiltanggal[] = date('d-M', strtotime($b->tanggal));
            $hasilrevenue[$b->kelsegmen][] = $b->total_rsaldosampai;
            $hasiltarget[$b->kelsegmen][] = $b->total_jmltarget;
         }
          
         foreach ($hasilrevenue as $kelsegmen => $revenues) {
            $hasilrevenue_data[] = array(
              'name' => $kelsegmen,
              'data' => $revenues
            );
         }
          
         foreach ($hasiltarget as $kelsegmen => $targets) {
            $hasiltarget_data[] = array(
              'name' => $kelsegmen,
              'data' => $targets
            );
         }
         $graf_pie = $this->mkunjungan_persegmen->mshow_all_pie_all_jenis($tglawal,$tglakhir,$lokasi,$jenis,$nama);
         
         foreach ($graf_pie->result() as $c){
            $pie[] = $c;
         }
         $jenis2 = $this->mkunjungan_persegmen->mshow_all_jenis($nama);
         if (empty($hasiltanggal)) {
            echo '<script language="javascript">alert("Data Tidak Tersedia !!!"); document.location="grafik_persegmen";</script>';
         }else{
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
                  'action'	   => 'Show Grafik Kunjungan Per-Segmen',
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
                  'action'	   => 'Show Grafik Kunjungan Per-Segmen',
               );
            }
            $this->mkunjungan_persegmen->insert_log($log);

            $this->load->view('content/vunit/vkunjungan_persegmen/vgrafik_hasil_kunjungan_persegmen_all',$data);
         }
      }else{
         $grafik = $this->mkunjungan_persegmen->mshow_all_grafik($tglawal,$tglakhir,$lokasi,$jenis,$nama);
         $grafik_kp = $this->mkunjungan_persegmen->mshow_all_grafik_kp($tglawal,$tglakhir,$lokasi,$jenis,$nama);

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
         $jenis2 = $this->mkunjungan_persegmen->mshow_all_jenis($nama);  
         if (empty($hasiltanggal)) {
            echo '<script language="javascript">alert("Data Tidak Tersedia !!!"); document.location="grafik_persegmen";</script>';
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
                  'action'	   => 'Show Grafik Kunjungan Per-Segmen',
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
                  'action'	   => 'Show Grafik Kunjungan Per-Segmen',
               );
            }
            $this->mkunjungan_persegmen->insert_log($log);
            
            $this->load->view('content/vunit/vkunjungan_persegmen/vgrafik_hasil_kunjungan_persegmen',$data);
         }
      }
   }

   function export_xls() {
      // Mengecek jenis export yang diminta
      if (isset($_POST['exportType'])) {
         $exportType = $_POST['exportType'];
         if ($exportType == 'detail') {
            $nama = $this->session->userdata("nama");
            $pilihan = $this->input->post('pilihan');
            $tglawal = $this->input->post('tglawal');
            $tglakhir = $this->input->post('tglakhir');
            
            $this->load->helper('exportexcel');
            $namaFile = "Rekap Kunjungan Per-Segmen.xls";
            $judul = "Rekap Kunjungan Per-Segmen";
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
            xlsWriteLabel($tablehead, $kolomhead++, "Kelompok Spesimen");
            xlsWriteLabel($tablehead, $kolomhead++, "Kelompok Segmen");
            xlsWriteLabel($tablehead, $kolomhead++, "Kelompok Sub-Segmen");
            xlsWriteLabel($tablehead, $kolomhead++, "Kelompok Layanan");
            xlsWriteLabel($tablehead, $kolomhead++, "Kelompok BPJS / NON BPJS");
            xlsWriteLabel($tablehead, $kolomhead++, "Kelompok Unit");
            xlsWriteLabel($tablehead, $kolomhead++, "Kunjungan Yang Lalu");
            xlsWriteLabel($tablehead, $kolomhead++, "Kunjungan Bulan Ini");
            xlsWriteLabel($tablehead, $kolomhead++, "Total Kunjungan s/d Saat Ini");
            xlsWriteLabel($tablehead, $kolomhead++, "Potensial Kunjungan");
            xlsWriteLabel($tablehead, $kolomhead++, "Target Kunjungan");
            xlsWriteLabel($tablehead, $kolomhead++, "Status");

            foreach ($pilihan as $p) {
               $ket = $p;
               foreach ($this->mkunjungan_persegmen->mshow_all_detail($nama, $ket, $tglawal, $tglakhir) as $data) {
                  $kolombody = 0;

                  //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                  xlsWriteNumber($tablebody, $kolombody++, $nourut);
                  xlsWriteLabel($tablebody, $kolombody++, $data->lokasi);
                  xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
                  xlsWriteLabel($tablebody, $kolombody++, $data->kelspesimen);
                  xlsWriteLabel($tablebody, $kolombody++, $data->kelsegmen);
                  xlsWriteLabel($tablebody, $kolombody++, $data->kelsegmen_sub);
                  xlsWriteLabel($tablebody, $kolombody++, $data->kelompok);
                  xlsWriteLabel($tablebody, $kolombody++, $data->ket);
                  xlsWriteLabel($tablebody, $kolombody++, $data->kelunit);
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
         } else if ($exportType == 'tabel') {
            $nama = $this->session->userdata("nama");
            $lokasi = $this->input->post('lokasi');
            $tglawal = $this->input->post('tglawal');
            $tglakhir = $this->input->post('tglakhir');
            
            $this->load->helper('exportexcel');
            $namaFile = "Tabel Kunjungan Per-Segmen.xls";
            $judul = "Tabel Kunjungan Per-Segmen.xls";
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
            xlsWriteLabel($tablehead, $kolomhead++, "NO");
            xlsWriteLabel($tablehead, $kolomhead++, "URAIAN");
            xlsWriteLabel($tablehead, $kolomhead++, "KUNJUNGAN YANG LALU");
            xlsWriteLabel($tablehead, $kolomhead++, "KUNJUNGAN BULAN INI");
            xlsWriteLabel($tablehead, $kolomhead++, "TOTAL KUNJUNGAN S/D SAAT INI");
            xlsWriteLabel($tablehead, $kolomhead++, "POTENSIAL KUNJUNGAN");
            xlsWriteLabel($tablehead, $kolomhead++, "ESTIMASI TOTAL KUNJUNGAN");
            xlsWriteLabel($tablehead, $kolomhead++, "TARGET KUNJUNGAN");
            xlsWriteLabel($tablehead, $kolomhead++, "PROSENTASE");

            $total_rsaldolalu = 0;
            $total_rsaldosaatini = 0;
            $total_rsaldosampai = 0;
            $total_rsaldopotensi = 0;
            $total_jmltarget = 0;
            $total_jmlprosen = 0;
            foreach ($this->mkunjungan_persegmen->mshow_all_call($tglawal,$tglakhir,$nama,$lokasi) as $data) {
               $total_rsaldolalu += $data->rsaldolalu;
               $total_rsaldosaatini += $data->rsaldosaatini;
               $total_rsaldosampai += $data->rsaldosampai;
               $total_rsaldopotensi += $data->rsaldopotensi;
               $total_jmltarget += $data->jmltarget;
               $total_jmlprosen += $data->jmlprosen;
               $kolombody = 0;

               //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
               xlsWriteNumber($tablebody, $kolombody++, $nourut);
               xlsWriteLabel($tablebody, $kolombody++, $data->ket);
               xlsWriteLabel($tablebody, $kolombody++, $data->rsaldolalu);
               xlsWriteLabel($tablebody, $kolombody++, $data->rsaldosaatini);
               xlsWriteLabel($tablebody, $kolombody++, $data->rsaldosampai);
               xlsWriteLabel($tablebody, $kolombody++, $data->rsaldopotensi);
               xlsWriteLabel($tablebody, $kolombody++, $data->rsaldosampai+$data->rsaldopotensi);
               xlsWriteLabel($tablebody, $kolombody++, $data->jmltarget);
               xlsWriteLabel($tablebody, $kolombody++, $data->jmlprosen*100);
            
               $tablebody++;
               $nourut++;
            }
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, "TOTAL");
            xlsWriteLabel($tablebody, $kolombody++, $total_rsaldolalu);
            xlsWriteLabel($tablebody, $kolombody++, $total_rsaldosaatini);
            xlsWriteLabel($tablebody, $kolombody++, $total_rsaldosampai);
            xlsWriteLabel($tablebody, $kolombody++, $total_rsaldopotensi);
            xlsWriteLabel($tablebody, $kolombody++, $total_rsaldosampai+$total_rsaldopotensi);
            xlsWriteLabel($tablebody, $kolombody++, $total_jmltarget);
            xlsWriteLabel($tablebody, $kolombody++, number_format($total_rsaldosampai/$total_jmltarget*100, 0, ',', '.'));
      
            xlsEOF();
            exit();
         } 
      }
   }
}
