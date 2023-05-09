<?php

class cbiaya extends CI_Controller {

   function __construct() {
      parent::__construct();
      $this->load->model('mbiaya');
      
   }

   function index() {
      if ($this->session->userdata('status') != "Login" || !in_array($this->session->userdata("tlok"), array("RSG", "RSP", "RST", "RSMU", "URJ"))) {
			redirect("clogin");
		}
      $this->load->view('content/vunit/vbiaya/vbiaya');
   }

   function biaya() {
      if ($this->session->userdata('status') != "Login" || !in_array($this->session->userdata("tlok"), array("RSG", "RSP", "RST", "RSMU", "URJ"))) {
			redirect("clogin");
		}
      $tglawal = $this->input->post('tglawal');
      $tglakhir = $this->input->post('tglakhir');
      $nama = $this->session->userdata("nama");
      $lokasi = $this->input->post('lokasi');
      $data['biaya'] = $this->mbiaya->mshow_all_biaya($tglawal,$tglakhir,$nama,$lokasi);

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
            'action'	   => 'Show Tabel Biaya',
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
            'action'	   => 'Show Tabel Biaya',
         );
      }
      $this->mbiaya->insert_log($log);
      
      $data['lokasi'] = $lokasi;
      $data['tglawal'] = $tglawal;
      $data['tglakhir'] = $tglakhir;
      $this->load->view('content/vunit/vbiaya/vhasil_biaya',$data);
   }

   function grafik_biaya() {
      if ($this->session->userdata('status') != "Login" || !in_array($this->session->userdata("tlok"), array("RSG", "RSP", "RST", "RSMU", "URJ"))) {
			redirect("clogin");
		}
      $nama = $this->session->userdata("nama");
      $data['jenis'] = $this->mbiaya->mshow_all_jenis($nama);
      
      $this->load->view('content/vunit/vbiaya/vgrafik_biaya', $data);
   }

   function grafik_hasil_biaya() {
      if ($this->session->userdata('status') != "Login" || !in_array($this->session->userdata("tlok"), array("RSG", "RSP", "RST", "RSMU", "URJ"))) {
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
            $hasilrevenue[$b->kelspesimen][] = $b->total_rsaldosampai;
            $hasiltarget[$b->kelspesimen][] = $b->total_jmltarget;
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
               'action'	   => 'Show Grafik Biaya',
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
               'action'	   => 'Show Grafik Biaya',
            );
         }
         $this->mbiaya->insert_log($log);

         $this->load->view('content/vunit/vbiaya/vgrafik_hasil_biaya_all',$data);

      }else{
         $grafik = $this->mbiaya->mshow_all_grafik($tglawal,$tglakhir,$lokasi,$jenis,$nama);
         $grafik_kp = $this->mbiaya->mshow_all_grafik_kp($tglawal,$tglakhir,$lokasi,$jenis,$nama);
         
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
               'action'	   => 'Show Grafik Biaya',
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
               'action'	   => 'Show Grafik Biaya',
            );
         }
         $this->mbiaya->insert_log($log);
         $this->load->view('content/vunit/vbiaya/vgrafik_hasil_biaya',$data);
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
            xlsWriteLabel($tablehead, $kolomhead++, "Kelompok Beban");
            xlsWriteLabel($tablehead, $kolomhead++, "Keterangan Beban");
            xlsWriteLabel($tablehead, $kolomhead++, "Beban Yang Lalu");
            xlsWriteLabel($tablehead, $kolomhead++, "Beban Bulan Ini");
            xlsWriteLabel($tablehead, $kolomhead++, "Total Beban s/d Saat Ini");
            xlsWriteLabel($tablehead, $kolomhead++, "Potensial Beban");
            xlsWriteLabel($tablehead, $kolomhead++, "Target Beban");
            xlsWriteLabel($tablehead, $kolomhead++, "Status");

            foreach ($pilihan as $p) {
               $ket = $p;
               
               foreach ($this->mbiaya->mshow_all_detail($nama, $ket, $tglawal, $tglakhir) as $data) {
                  
                  $kolombody = 0;

                  //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                  xlsWriteNumber($tablebody, $kolombody++, $nourut);
                  xlsWriteLabel($tablebody, $kolombody++, $data->lokasi);
                  xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
                  xlsWriteLabel($tablebody, $kolombody++, $data->kelspesimen);
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
            $lokasi = $this->input->post('lokasi');
            $tglawal = $this->input->post('tglawal');
            $tglakhir = $this->input->post('tglakhir');
            
            $this->load->helper('exportexcel');
            $namaFile = "Tabel Beban Biaya.xls";
            $judul = "Tabel Beban Biaya";
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
            xlsWriteLabel($tablehead, $kolomhead++, "BEBAN YANG LALU");
            xlsWriteLabel($tablehead, $kolomhead++, "BEBAN BULAN INI");
            xlsWriteLabel($tablehead, $kolomhead++, "TOTAL BEBAN S/D SAAT INI");
            xlsWriteLabel($tablehead, $kolomhead++, "POTENSIAL BEBAN");
            xlsWriteLabel($tablehead, $kolomhead++, "ESTIMASI TOTAL BEBAN");
            xlsWriteLabel($tablehead, $kolomhead++, "TARGET BEBAN");
            xlsWriteLabel($tablehead, $kolomhead++, "PROSENTASE");

            foreach ($this->mbiaya->mshow_all_biaya($tglawal,$tglakhir,$nama,$lokasi) as $data) {
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
      
            xlsEOF();
            exit();
         } else if ($exportType == 'potensi') {
            $nama = $this->session->userdata("nama");
            $pilihan = $this->input->post('pilihan');
            $tglawal = $this->input->post('tglawal');
            $tglakhir = $this->input->post('tglakhir');
            
            $this->load->helper('exportexcel');
            $namaFile = "Detail Potensi Beban Biaya.xls";
            $judul = "Detail Potensi Beban Biaya";
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
            xlsWriteLabel($tablehead, $kolomhead++, "Kelompok Beban");
            xlsWriteLabel($tablehead, $kolomhead++, "Keterangan Beban");
            xlsWriteLabel($tablehead, $kolomhead++, "Potensial Beban");
            xlsWriteLabel($tablehead, $kolomhead++, "Status");

            foreach ($pilihan as $p) {
               $ket = $p;
               
               foreach ($this->mbiaya->mshow_all_potensi($nama, $ket, $tglawal, $tglakhir) as $data) {
                  
                  $kolombody = 0;

                  //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                  xlsWriteNumber($tablebody, $kolombody++, $nourut);
                  xlsWriteLabel($tablebody, $kolombody++, $data->lokasi);
                  xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
                  xlsWriteLabel($tablebody, $kolombody++, $data->kelspesimen);
                  xlsWriteLabel($tablebody, $kolombody++, $data->ket);
                  xlsWriteLabel($tablebody, $kolombody++, $data->rsaldopotensi1);
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
      xlsWriteLabel($tablehead, $kolomhead++, "Kelompok Beban");
      xlsWriteLabel($tablehead, $kolomhead++, "Keterangan Beban");
      xlsWriteLabel($tablehead, $kolomhead++, "Beban Yang Lalu");
      xlsWriteLabel($tablehead, $kolomhead++, "Beban Bulan Ini");
      xlsWriteLabel($tablehead, $kolomhead++, "Total Beban s/d Saat Ini");
      xlsWriteLabel($tablehead, $kolomhead++, "Potensial Beban");
      xlsWriteLabel($tablehead, $kolomhead++, "Target Beban");
      xlsWriteLabel($tablehead, $kolomhead++, "Status");

      foreach ($pilihan as $p) {
         $ket = $p;
         
         foreach ($this->mbiaya->mshow_all_detail($nama, $ket, $tglawal, $tglakhir) as $data) {
            
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->lokasi);
            xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
            xlsWriteLabel($tablebody, $kolombody++, $data->kelspesimen);
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
