<?php

class ckunjungan_RJ extends CI_Controller {

   function __construct() {
      parent::__construct();
      $this->load->model('mkunjungan_RJ');
      
   }

   function index() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $this->load->view('content/vsuperuser/vkunjungan_RJ/vkunjungan_RJ');
   }

   function get_unit(){
      $tglawal = (new DateTime())->modify('-7 days')->format('Y-m-d');
      $tglakhir = date("Y-m-d");
      $nama = $this->session->userdata("nama");
      $lokasi = $this->session->userdata("tlok");
      
      $result = $this->mkunjungan_RJ->mshow_all_unit($tglawal,$tglakhir,$nama,$lokasi);
      echo json_encode($result);
   }

   function get_subunit(){
      $optionSelected = $this->input->post('optionSelected');
      $nama = $this->session->userdata("nama");
      $result = $this->mkunjungan_RJ->mshow_all_subunit($optionSelected,$nama);
      echo json_encode($result);
   }

   function kunjungan() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $tglawal = $this->input->post('tglawal');
      $tglakhir = $this->input->post('tglakhir');
      $unit = $this->input->post('unit');
      $subunit = $this->input->post('subunit');
      $nama = $this->session->userdata("nama");
      $lokasi = $this->input->post('lokasi');

      $kunjung = $this->mkunjungan_RJ->mshow_all_call($unit,$tglawal,$tglakhir,$nama,$lokasi);
      $detail_kunjung = $this->mkunjungan_RJ->mshow_all_detail_call($unit,$subunit,$tglawal,$tglakhir,$nama,$lokasi);
      $rekap = $this->mkunjungan_RJ->mshow_all_rekap_call($unit,$subunit,$tglawal,$tglakhir,$nama,$lokasi);

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
            'action'	   => 'Show Tabel Kunjungan Rawat Jalan',
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
            'action'	   => 'Show Tabel Kunjungan Rawat Jalan',
         );
      }
      $this->mkunjungan_RJ->insert_log($log);

      $data = array(
         'kunjung' => $kunjung,
         'detail_kunjung' => $detail_kunjung,
         'rekap' => $rekap,
         'lokasi' => $lokasi,
         'periode' => $this->input->post('periode'),
         'tglawal' => $tglawal,
         'tglakhir' => $tglakhir,
         'unit' => $unit,
         'subunit' => $subunit,
      );
      $this->load->view('content/vsuperuser/vkunjungan_RJ/vhasil_kunjungan_RJ',$data);
   }

   function grafik_kunjungan_RJ() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      
      $nama = $this->session->userdata("nama");
      $data['jenis'] = $this->mkunjungan_RJ->mshow_all_jenis($nama);
      $this->load->view('content/vsuperuser/vkunjungan_RJ/vgrafik_kunjungan_RJ', $data);
   }

   function grafik_hasil_kunjungan() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $tglawal = $this->input->post('tglawal');
      $tglakhir = $this->input->post('tglakhir');
      $lokasi = $this->input->post('lokasi');
      $jenis = $this->input->post('jenis');
      $nama = $this->session->userdata("nama");
      
      if ($jenis == "SEMUA") {
         $grafik = $this->mkunjungan_RJ->mshow_all_grafik_all_jenis($tglawal,$tglakhir,$lokasi,$jenis,$nama);

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
         $graf_pie = $this->mkunjungan_RJ->mshow_all_pie_all_jenis($tglawal,$tglakhir,$lokasi,$jenis,$nama);
         foreach ($graf_pie->result() as $b){
            $pie[] = $b;
         }
         $jenis2 = $this->mkunjungan_RJ->mshow_all_jenis($nama);   
         if (empty($hasiltanggal)) {
            echo '<script language="javascript">alert("Data Tidak Tersedia !!!"); document.location="grafik_kunjungan_RJ";</script>';
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
                  'action'	   => 'Show Grafik Kunjungan Rawat Jalan',
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
                  'action'	   => 'Show Grafik Kunjungan Rawat Jalan',
               );
            }
            $this->mkunjungan_RJ->insert_log($log);
            $this->load->view('content/vsuperuser/vkunjungan_RJ/vgrafik_hasil_kunjungan_RJ_all',$data);
         }
      }else{
         $grafik = $this->mkunjungan_RJ->mshow_all_grafik($tglawal,$tglakhir,$lokasi,$jenis,$nama);
         $grafik_kp = $this->mkunjungan_RJ->mshow_all_grafik_kp($tglawal,$tglakhir,$lokasi,$jenis,$nama);

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
         $jenis2 = $this->mkunjungan_RJ->mshow_all_jenis($nama);   
         if (empty($hasiltanggal)) {
            echo '<script language="javascript">alert("Data Tidak Tersedia !!!"); document.location="grafik_kunjungan_RJ";</script>';
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
                  'action'	   => 'Show Grafik Kunjungan Rawat Jalan',
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
                  'action'	   => 'Show Grafik Kunjungan Rawat Jalan',
               );
            }
            $this->mkunjungan_RJ->insert_log($log);
            
            $this->load->view('content/vsuperuser/vkunjungan_RJ/vgrafik_hasil_kunjungan_RJ',$data);
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
            $namaFile = "Rekap Kunjungan Rawat Jalan.xls";
            $judul = "Rekap Kunjungan Rawat Jalan";
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
            xlsWriteLabel($tablehead, $kolomhead++, "Kelompok Sub-Unit");
            xlsWriteLabel($tablehead, $kolomhead++, "Kelompok Segmen");
            xlsWriteLabel($tablehead, $kolomhead++, "Kelompok Sub-Segmen");
            // xlsWriteLabel($tablehead, $kolomhead++, "Kelompok Layanan");
            xlsWriteLabel($tablehead, $kolomhead++, "Kelompok BPJS / NON BPJS");
            xlsWriteLabel($tablehead, $kolomhead++, "Kunjungan Yang Lalu");
            xlsWriteLabel($tablehead, $kolomhead++, "Kunjungan Bulan Ini");
            xlsWriteLabel($tablehead, $kolomhead++, "Total Kunjungan s/d Saat Ini");
            xlsWriteLabel($tablehead, $kolomhead++, "Potensial Kunjungan");
            xlsWriteLabel($tablehead, $kolomhead++, "Target Kunjungan");
            xlsWriteLabel($tablehead, $kolomhead++, "Status");

            foreach ($pilihan as $p) {
               $ket = $p;
               foreach ($this->mkunjungan_RJ->mshow_all_detail($nama, $ket, $tglawal, $tglakhir) as $data) {
                  $kolombody = 0;

                  //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                  xlsWriteNumber($tablebody, $kolombody++, $nourut);
                  xlsWriteLabel($tablebody, $kolombody++, $data->lokasi);
                  xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
                  xlsWriteLabel($tablebody, $kolombody++, $data->kelunit);
                  xlsWriteLabel($tablebody, $kolombody++, $data->nama_unit);
                  xlsWriteLabel($tablebody, $kolombody++, $data->kelsegmen);
                  xlsWriteLabel($tablebody, $kolombody++, $data->kelsegmen_sub);
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
         } else if ($exportType == 'tabel') {
            $nama = $this->session->userdata("nama");
            $unit = $this->input->post('unit');
            $subunit = $this->input->post('subunit');
            $lokasi = $this->input->post('lokasi');
            $tglawal = $this->input->post('tglawal');
            $tglakhir = $this->input->post('tglakhir');
            
            $this->load->helper('exportexcel');
            $namaFile = "Tabel Kunjungan Rawat Jalan.xls";
            $judul = "Tabel Kunjungan Rawat Jalan.xls";
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
            foreach ($this->mkunjungan_RJ->mshow_all_call($unit,$tglawal,$tglakhir,$nama,$lokasi) as $data) {
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
               xlsWriteLabel($tablebody, $kolombody++, $data->jmlprosen*100 ." %");
            
               $tablebody++;
               $nourut++;
               foreach ($this->mkunjungan_RJ->mshow_all_detail_call($unit,$subunit,$tglawal,$tglakhir,$nama,$lokasi) as $data2) {
                  if ($data2->ket == $data->ket){
                     $kolombody = 0;
                     xlsWriteLabel($tablebody, $kolombody++, "*");
                     xlsWriteLabel($tablebody, $kolombody++, $data2->sub_unit);
                     xlsWriteLabel($tablebody, $kolombody++, $data2->rsaldolalu);
                     xlsWriteLabel($tablebody, $kolombody++, $data2->rsaldosaatini);
                     xlsWriteLabel($tablebody, $kolombody++, $data2->rsaldosampai);
                     xlsWriteLabel($tablebody, $kolombody++, $data2->rsaldopotensi);
                     xlsWriteLabel($tablebody, $kolombody++, $data2->rsaldosampai+$data2->rsaldopotensi);
                     xlsWriteLabel($tablebody, $kolombody++, "NULL");
                     xlsWriteLabel($tablebody, $kolombody++, "NULL");
                  
                     $tablebody++;
                  }
               }
            }
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, "TOTAL KUNJ. RJ & UGD");
            xlsWriteLabel($tablebody, $kolombody++, $total_rsaldolalu);
            xlsWriteLabel($tablebody, $kolombody++, $total_rsaldosaatini);
            xlsWriteLabel($tablebody, $kolombody++, $total_rsaldosampai);
            xlsWriteLabel($tablebody, $kolombody++, $total_rsaldopotensi);
            xlsWriteLabel($tablebody, $kolombody++, $total_rsaldosampai+$total_rsaldopotensi);
            xlsWriteLabel($tablebody, $kolombody++, $total_jmltarget);
            xlsWriteLabel($tablebody, $kolombody++, number_format($total_rsaldosampai/$total_jmltarget*100, 0, ',', '.')." %");

            $tablebody++;
            $nourut++;
            foreach ($this->mkunjungan_RJ->mshow_all_rekap_call($unit,$subunit,$tglawal,$tglakhir,$nama,$lokasi) as $data3) {
               if ($data3->kelsegmen_sub == "Total"){
                  $kolombody = 0;
                  xlsWriteNumber($tablebody, $kolombody++, $nourut);
                  xlsWriteLabel($tablebody, $kolombody++, "Rekap Kunj. Telemed, Homecare");
                  xlsWriteLabel($tablebody, $kolombody++, $data3->rsaldolalu);
                  xlsWriteLabel($tablebody, $kolombody++, $data3->rsaldosaatini);
                  xlsWriteLabel($tablebody, $kolombody++, $data3->rsaldosampai);
                  xlsWriteLabel($tablebody, $kolombody++, $data3->rsaldopotensi);
                  xlsWriteLabel($tablebody, $kolombody++, $data3->rsaldosampai+$data3->rsaldopotensi);
                  xlsWriteLabel($tablebody, $kolombody++, $data3->jmltarget);
                  xlsWriteLabel($tablebody, $kolombody++, $data3->jmlprosen*100 ." %");
               
                  $tablebody++;
                  $nourut++;
               }
            }
            foreach ($this->mkunjungan_RJ->mshow_all_rekap_call($unit,$subunit,$tglawal,$tglakhir,$nama,$lokasi) as $data3) {
               if ($data3->kelsegmen_sub != "Total"){
                  $kolombody = 0;
                  xlsWriteLabel($tablebody, $kolombody++, "*");
                  xlsWriteLabel($tablebody, $kolombody++, $data3->kelsegmen_sub);
                  xlsWriteLabel($tablebody, $kolombody++, $data3->rsaldolalu);
                  xlsWriteLabel($tablebody, $kolombody++, $data3->rsaldosaatini);
                  xlsWriteLabel($tablebody, $kolombody++, $data3->rsaldosampai);
                  xlsWriteLabel($tablebody, $kolombody++, $data3->rsaldopotensi);
                  xlsWriteLabel($tablebody, $kolombody++, $data3->rsaldosampai+$data3->rsaldopotensi);
                  xlsWriteLabel($tablebody, $kolombody++, $data3->jmltarget);
                  xlsWriteLabel($tablebody, $kolombody++, $data3->jmlprosen*100 ." %");

                  $tablebody++;
               }
            }
      
            xlsEOF();
            exit();
         } else if ($exportType == 'potensi'){
            $pilihan = $this->input->post('pilihan');
            $lokasi = $this->input->post('lokasi');
            $tglakhir = $this->input->post('tglakhir');
           
            $this->load->helper('exportexcel');
            $namaFile = "Detail Potensi Kunjungan Rawat Jalan.xls";
            $judul = "Detail Potensi Kunjungan Rawat Jalan.xls";
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
            xlsWriteLabel($tablehead, $kolomhead++, "LOKASI");
            xlsWriteLabel($tablehead, $kolomhead++, "TANGGAL");
            xlsWriteLabel($tablehead, $kolomhead++, "NO BILLING");
            xlsWriteLabel($tablehead, $kolomhead++, "NO RM");
            xlsWriteLabel($tablehead, $kolomhead++, "NAMA PASIEN");
            xlsWriteLabel($tablehead, $kolomhead++, "NIK");
            xlsWriteLabel($tablehead, $kolomhead++, "JENIS KELAMIN");
            xlsWriteLabel($tablehead, $kolomhead++, "NO TELP");
            xlsWriteLabel($tablehead, $kolomhead++, "TGL. LAHIR");
            xlsWriteLabel($tablehead, $kolomhead++, "ALAMAT");
            xlsWriteLabel($tablehead, $kolomhead++, "NAMA KONSUMEN");
            xlsWriteLabel($tablehead, $kolomhead++, "UNIT");
            xlsWriteLabel($tablehead, $kolomhead++, "SUB-UNIT");
            xlsWriteLabel($tablehead, $kolomhead++, "KELOMPOK SEGMEN");
            xlsWriteLabel($tablehead, $kolomhead++, "KELOMPOK SUB-SEGMEN");
            xlsWriteLabel($tablehead, $kolomhead++, "KELOMPOK BPJS");
            xlsWriteLabel($tablehead, $kolomhead++, "TGL. MASUK");
            xlsWriteLabel($tablehead, $kolomhead++, "TGL. PULANG");
            xlsWriteLabel($tablehead, $kolomhead++, "TGL. KASIR");
            xlsWriteLabel($tablehead, $kolomhead++, "NOMINAL BILLING");
            xlsWriteLabel($tablehead, $kolomhead++, "STATUS");

               if ($lokasi==""){
                  foreach ($this->mkunjungan_RJ->mshow_all_potensi("RSG", $tglakhir) as $data) {
                     $kolombody = 0;
      
                     //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                     xlsWriteNumber($tablebody, $kolombody++, $nourut);
                     xlsWriteLabel($tablebody, $kolombody++, $data->lokasi);
                     xlsWriteLabel($tablebody, $kolombody++, $data->tgl_kunjung);
                     xlsWriteLabel($tablebody, $kolombody++, $data->nobilling);
                     xlsWriteLabel($tablebody, $kolombody++, $data->nomrm);
                     xlsWriteLabel($tablebody, $kolombody++, $data->nmpasien);
                     xlsWriteLabel($tablebody, $kolombody++, $data->nik);
                     xlsWriteLabel($tablebody, $kolombody++, $data->jk);
                     xlsWriteLabel($tablebody, $kolombody++, $data->notelp);
                     xlsWriteLabel($tablebody, $kolombody++, $data->tgllahir);
                     xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
                     xlsWriteLabel($tablebody, $kolombody++, $data->nmkonsumen);
                     xlsWriteLabel($tablebody, $kolombody++, $data->Segmen);
                     xlsWriteLabel($tablebody, $kolombody++, $data->nama_unit);
                     xlsWriteLabel($tablebody, $kolombody++, $data->kelsegmen);
                     xlsWriteLabel($tablebody, $kolombody++, $data->kelsegmen_sub);
                     xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
                     xlsWriteLabel($tablebody, $kolombody++, $data->tgl_masuk);
                     xlsWriteLabel($tablebody, $kolombody++, $data->tgl_pulang);
                     xlsWriteLabel($tablebody, $kolombody++, $data->tgl_kasir);
                     xlsWriteLabel($tablebody, $kolombody++, $data->rpbilling);
                     xlsWriteLabel($tablebody, $kolombody++, $data->statuse);
                  
                     $tablebody++;
                     $nourut++;
                  }
                  foreach ($this->mkunjungan_RJ->mshow_all_potensi("RST", $tglakhir) as $data) {
                     $kolombody = 0;
      
                     //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                     xlsWriteNumber($tablebody, $kolombody++, $nourut);
                     xlsWriteLabel($tablebody, $kolombody++, $data->lokasi);
                     xlsWriteLabel($tablebody, $kolombody++, $data->tgl_kunjung);
                     xlsWriteLabel($tablebody, $kolombody++, $data->nobilling);
                     xlsWriteLabel($tablebody, $kolombody++, $data->nomrm);
                     xlsWriteLabel($tablebody, $kolombody++, $data->nmpasien);
                     xlsWriteLabel($tablebody, $kolombody++, $data->nik);
                     xlsWriteLabel($tablebody, $kolombody++, $data->jk);
                     xlsWriteLabel($tablebody, $kolombody++, $data->notelp);
                     xlsWriteLabel($tablebody, $kolombody++, $data->tgllahir);
                     xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
                     xlsWriteLabel($tablebody, $kolombody++, $data->nmkonsumen);
                     xlsWriteLabel($tablebody, $kolombody++, $data->Segmen);
                     xlsWriteLabel($tablebody, $kolombody++, $data->nama_unit);
                     xlsWriteLabel($tablebody, $kolombody++, $data->kelsegmen);
                     xlsWriteLabel($tablebody, $kolombody++, $data->kelsegmen_sub);
                     xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
                     xlsWriteLabel($tablebody, $kolombody++, $data->tgl_masuk);
                     xlsWriteLabel($tablebody, $kolombody++, $data->tgl_pulang);
                     xlsWriteLabel($tablebody, $kolombody++, $data->tgl_kasir);
                     xlsWriteLabel($tablebody, $kolombody++, $data->rpbilling);
                     xlsWriteLabel($tablebody, $kolombody++, $data->statuse);
                  
                     $tablebody++;
                     $nourut++;
                  }
                  foreach ($this->mkunjungan_RJ->mshow_all_potensi("RSP", $tglakhir) as $data) {
                     $kolombody = 0;
      
                     //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                     xlsWriteNumber($tablebody, $kolombody++, $nourut);
                     xlsWriteLabel($tablebody, $kolombody++, $data->lokasi);
                     xlsWriteLabel($tablebody, $kolombody++, $data->tgl_kunjung);
                     xlsWriteLabel($tablebody, $kolombody++, $data->nobilling);
                     xlsWriteLabel($tablebody, $kolombody++, $data->nomrm);
                     xlsWriteLabel($tablebody, $kolombody++, $data->nmpasien);
                     xlsWriteLabel($tablebody, $kolombody++, $data->nik);
                     xlsWriteLabel($tablebody, $kolombody++, $data->jk);
                     xlsWriteLabel($tablebody, $kolombody++, $data->notelp);
                     xlsWriteLabel($tablebody, $kolombody++, $data->tgllahir);
                     xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
                     xlsWriteLabel($tablebody, $kolombody++, $data->nmkonsumen);
                     xlsWriteLabel($tablebody, $kolombody++, $data->Segmen);
                     xlsWriteLabel($tablebody, $kolombody++, $data->nama_unit);
                     xlsWriteLabel($tablebody, $kolombody++, $data->kelsegmen);
                     xlsWriteLabel($tablebody, $kolombody++, $data->kelsegmen_sub);
                     xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
                     xlsWriteLabel($tablebody, $kolombody++, $data->tgl_masuk);
                     xlsWriteLabel($tablebody, $kolombody++, $data->tgl_pulang);
                     xlsWriteLabel($tablebody, $kolombody++, $data->tgl_kasir);
                     xlsWriteLabel($tablebody, $kolombody++, $data->rpbilling);
                     xlsWriteLabel($tablebody, $kolombody++, $data->statuse);
                  
                     $tablebody++;
                     $nourut++;
                  }
                  foreach ($this->mkunjungan_RJ->mshow_all_potensi("RSMU", $tglakhir) as $data) {
                     $kolombody = 0;
      
                     //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                     xlsWriteNumber($tablebody, $kolombody++, $nourut);
                     xlsWriteLabel($tablebody, $kolombody++, $data->lokasi);
                     xlsWriteLabel($tablebody, $kolombody++, $data->tgl_kunjung);
                     xlsWriteLabel($tablebody, $kolombody++, $data->nobilling);
                     xlsWriteLabel($tablebody, $kolombody++, $data->nomrm);
                     xlsWriteLabel($tablebody, $kolombody++, $data->nmpasien);
                     xlsWriteLabel($tablebody, $kolombody++, $data->nik);
                     xlsWriteLabel($tablebody, $kolombody++, $data->jk);
                     xlsWriteLabel($tablebody, $kolombody++, $data->notelp);
                     xlsWriteLabel($tablebody, $kolombody++, $data->tgllahir);
                     xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
                     xlsWriteLabel($tablebody, $kolombody++, $data->nmkonsumen);
                     xlsWriteLabel($tablebody, $kolombody++, $data->Segmen);
                     xlsWriteLabel($tablebody, $kolombody++, $data->nama_unit);
                     xlsWriteLabel($tablebody, $kolombody++, $data->kelsegmen);
                     xlsWriteLabel($tablebody, $kolombody++, $data->kelsegmen_sub);
                     xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
                     xlsWriteLabel($tablebody, $kolombody++, $data->tgl_masuk);
                     xlsWriteLabel($tablebody, $kolombody++, $data->tgl_pulang);
                     xlsWriteLabel($tablebody, $kolombody++, $data->tgl_kasir);
                     xlsWriteLabel($tablebody, $kolombody++, $data->rpbilling);
                     xlsWriteLabel($tablebody, $kolombody++, $data->statuse);
                  
                     $tablebody++;
                     $nourut++;
                  }
               }else{
                  foreach ($this->mkunjungan_RJ->mshow_all_potensi($lokasi, $tglakhir) as $data) {
                     $kolombody = 0;
      
                     //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                     xlsWriteNumber($tablebody, $kolombody++, $nourut);
                     xlsWriteLabel($tablebody, $kolombody++, $data->lokasi);
                     xlsWriteLabel($tablebody, $kolombody++, $data->tgl_kunjung);
                     xlsWriteLabel($tablebody, $kolombody++, $data->nobilling);
                     xlsWriteLabel($tablebody, $kolombody++, $data->nomrm);
                     xlsWriteLabel($tablebody, $kolombody++, $data->nmpasien);
                     xlsWriteLabel($tablebody, $kolombody++, $data->nik);
                     xlsWriteLabel($tablebody, $kolombody++, $data->jk);
                     xlsWriteLabel($tablebody, $kolombody++, $data->notelp);
                     xlsWriteLabel($tablebody, $kolombody++, $data->tgllahir);
                     xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
                     xlsWriteLabel($tablebody, $kolombody++, $data->nmkonsumen);
                     xlsWriteLabel($tablebody, $kolombody++, $data->Segmen);
                     xlsWriteLabel($tablebody, $kolombody++, $data->nama_unit);
                     xlsWriteLabel($tablebody, $kolombody++, $data->kelsegmen);
                     xlsWriteLabel($tablebody, $kolombody++, $data->kelsegmen_sub);
                     xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
                     xlsWriteLabel($tablebody, $kolombody++, $data->tgl_masuk);
                     xlsWriteLabel($tablebody, $kolombody++, $data->tgl_pulang);
                     xlsWriteLabel($tablebody, $kolombody++, $data->tgl_kasir);
                     xlsWriteLabel($tablebody, $kolombody++, $data->rpbilling);
                     xlsWriteLabel($tablebody, $kolombody++, $data->statuse);
                  
                     $tablebody++;
                     $nourut++;
                  }
               }

            xlsEOF();
            exit();
         }
      }
   }

   function export_xlsx() {
      // Mengecek jenis export yang diminta
      $nama = $this->session->userdata("nama");
      $pilihan = $this->input->post('pilihan');
      $tglawal = $this->input->post('tglawal');
      $tglakhir = $this->input->post('tglakhir');
      
      $this->load->helper('exportexcel');
      $namaFile = "Rekap Kunjungan Rawat Jalan.xls";
      $judul = "Rekap Kunjungan Rawat Jalan";
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
      xlsWriteLabel($tablehead, $kolomhead++, "Kelompok Sub-Unit");
      xlsWriteLabel($tablehead, $kolomhead++, "Kelompok Segmen");
      xlsWriteLabel($tablehead, $kolomhead++, "Kelompok Sub-Segmen");
      // xlsWriteLabel($tablehead, $kolomhead++, "Kelompok Layanan");
      xlsWriteLabel($tablehead, $kolomhead++, "Kelompok BPJS / NON BPJS");
      xlsWriteLabel($tablehead, $kolomhead++, "Kunjungan Yang Lalu");
      xlsWriteLabel($tablehead, $kolomhead++, "Kunjungan Bulan Ini");
      xlsWriteLabel($tablehead, $kolomhead++, "Total Kunjungan s/d Saat Ini");
      xlsWriteLabel($tablehead, $kolomhead++, "Potensial Kunjungan");
      xlsWriteLabel($tablehead, $kolomhead++, "Target Kunjungan");
      xlsWriteLabel($tablehead, $kolomhead++, "Status");

      foreach ($pilihan as $p) {
         $ket = $p;
         foreach ($this->mkunjungan_RJ->mshow_all_detail($nama, $ket, $tglawal, $tglakhir) as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->lokasi);
            xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
            xlsWriteLabel($tablebody, $kolombody++, $data->kelunit);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_unit);
            xlsWriteLabel($tablebody, $kolombody++, $data->kelsegmen);
            xlsWriteLabel($tablebody, $kolombody++, $data->kelsegmen_sub);
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
