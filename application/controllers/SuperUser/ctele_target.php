<?php

class ctele_target extends CI_Controller {

   function __construct() {
      parent::__construct();
      $this->load->model('mtele_target');
      
   }

   function index() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $this->load->view('content/vsuperuser/vtele_target/vtele_target');
   }

   function target() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $tglawal = $this->input->post('tglawal');
      $tglakhir = $this->input->post('tglakhir');
      $lokasi = $this->input->post('lokasi');
      
      $data['interval'] = date_diff(date_create($tglawal), date_create($tglakhir));
      
      $data['total_rsg'] = $this->mtele_target->msum_rsg($tglawal, $tglakhir);
      $data['total_rst'] = $this->mtele_target->msum_rst($tglawal, $tglakhir);
      $data['total_rsp'] = $this->mtele_target->msum_rsp($tglawal, $tglakhir);
      $data['total_rsmu'] = $this->mtele_target->msum_rsmu($tglawal, $tglakhir);
      $data['total_urj'] = $this->mtele_target->msum_urj($tglawal, $tglakhir);
      $data['total_all'] = array_sum(array($data['total_rsg']->jumlah, $data['total_rst']->jumlah, $data['total_rsp']->jumlah, $data['total_rsmu']->jumlah, $data['total_urj']->jumlah));
      
      $data['target_rsg'] = $this->mtele_target->mtarget_rsg($lokasi);
      $data['target_rst'] = $this->mtele_target->mtarget_rst($lokasi);
      $data['target_rsp'] = $this->mtele_target->mtarget_rsp($lokasi);
      $data['target_rsmu'] = $this->mtele_target->mtarget_rsmu($lokasi);
      $data['target_urj'] = $this->mtele_target->mtarget_urj($lokasi);
      $data['target_pbm'] = array_sum(array($data['target_rsg']->target_pbm, $data['target_rst']->target_pbm, $data['target_rsp']->target_pbm, $data['target_rsmu']->target_pbm, $data['target_urj']->target_pbm));
      $data['target_nmu'] = array_sum(array($data['target_rsg']->target_nmu, $data['target_rst']->target_nmu, $data['target_rsp']->target_nmu, $data['target_rsmu']->target_nmu, $data['target_urj']->target_nmu));
      
      $data['rinci_rsg'] = $this->mtele_target->mrinci_rsg($tglawal, $tglakhir);
      $data['rinci_rst'] = $this->mtele_target->mrinci_rst($tglawal, $tglakhir);
      $data['rinci_rsp'] = $this->mtele_target->mrinci_rsp($tglawal, $tglakhir);
      $data['rinci_rsmu'] = $this->mtele_target->mrinci_rsmu($tglawal, $tglakhir);
      $data['rinci_urj'] = $this->mtele_target->mrinci_urj($tglawal, $tglakhir);

      $data['target_rinci_rsg'] = $this->mtele_target->mtarget_rinci_rsg($tglawal, $tglakhir);
      $data['target_rinci_rst'] = $this->mtele_target->mtarget_rinci_rst($tglawal, $tglakhir);
      $data['target_rinci_rsp'] = $this->mtele_target->mtarget_rinci_rsp($tglawal, $tglakhir);
      $data['target_rinci_rsmu'] = $this->mtele_target->mtarget_rinci_rsmu($tglawal, $tglakhir);
      $data['target_rinci_urj'] = $this->mtele_target->mtarget_rinci_urj($tglawal, $tglakhir);

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
            'action'	   => 'Show Tabel Target Telemedicine',
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
            'action'	   => 'Show Tabel Target Telemedicine',
         );
      }
      $this->mtele_target->insert_log($log);

      $data['lokasi'] = $lokasi;
      $data['tglawal'] = $tglawal;
      $data['tglakhir'] = $tglakhir;
      $this->load->view('content/vsuperuser/vtele_target/vhasil_tele_target',$data);
   }

   function get_jenis(){
      $optionSelected = $this->input->post('optionSelected');
      $result = $this->mtele_target->mshow_all_jenis($optionSelected);
      echo json_encode($result);
   }

   function grafik_kunjungan() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $this->load->view('content/vsuperuser/vtele_target/vgrafik_tele_target');
   }
   
   function grafik_hasil_kunjungan() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $tglawal = $this->input->post('tglawal');
      $tglakhir = $this->input->post('tglakhir');
      $lokasi = $this->input->post('lokasi');
      $nama = $this->session->userdata("nama");
      
      $grafik = $this->mtele_target->mshow_all_grafik($tglawal,$tglakhir,$lokasi,$nama);
      $grafik_kp = $this->mtele_target->mshow_all_grafik_kp($tglawal,$tglakhir,$lokasi,$nama);
      $target = $this->mtele_target->mshow_target($lokasi);
      
      foreach ($grafik->result() as $b){
         $hasiltanggal[] = array (
            $tanggal_baru = date('d-M', strtotime($b->tanggal)),
         );
         $price[] = $b->price;
         $target_pbm[] = number_format(($target->num_rows() > 0 ? $target->row()->target_pbm : 0)/365, 0);
         $target_nmu[] = number_format(($target->num_rows() > 0 ? $target->row()->target_nmu : 0)/365, 0);
      }
      foreach ($grafik_kp->result() as $d){
         $pie[] = $d;
      }
      $jenis2 = $this->mtele_target->mshow_all_jenis($nama);   
      if (empty($hasiltanggal)) {
         echo '<script language="javascript">alert("Data Tidak Tersedia !!!"); document.location="grafik_kunjungan";</script>';
      }else{
         $data =  array (
            'tanggal'      => $hasiltanggal,
            'price'        => $price,
            'target_pbm'   => $target_pbm,
            'target_nmu'   => $target_nmu,
            'pie'          => $pie,
            'tglawal'      => $tglawal,
            'tglakhir'     => $tglakhir,
            'lokasi'       => $lokasi,
            'jenis2'       => $jenis2,
         );
         //insert into log_aktifitas table
         if ($lokasi == ""){
            $log = array(
               'id'		   => $this->session->userdata("id"),
               'tglawal'   => $tglawal,
               'tglakhir'  => $tglakhir,
               'unit'      => 'KONSOLIDASI',
               'platform'	=> $this->agent->platform(),
               'browser'	=> $this->agent->browser().' ('.$this->agent->version().')',
               'ip'		   => $this->input->ip_address(),
               'action'	   => 'Show Grafik Target Kunjungan Telemedicine',
            );
         }else{
            $log = array(
               'id'		   => $this->session->userdata("id"),
               'tglawal'   => $tglawal,
               'tglakhir'  => $tglakhir,
               'unit'      => $lokasi,
               'platform'	=> $this->agent->platform(),
               'browser'	=> $this->agent->browser().' ('.$this->agent->version().')',
               'ip'		   => $this->input->ip_address(),
               'action'	   => 'Show Grafik Target Kunjungan Telemedicine',
            );
         }
         $this->mtele_target->insert_log($log);
         
         $this->load->view('content/vsuperuser/vtele_target/vgrafik_hasil_tele_target',$data);
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
            $namaFile = "Rekap Pendapatan BPJS / NON BPJS.xls";
            $judul = "Rekap Pendapatan BPJS / NON BPJS";
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
            xlsWriteLabel($tablehead, $kolomhead++, "Kelompok BPJS / NON BPJS");
            xlsWriteLabel($tablehead, $kolomhead++, "Revenue Yang Lalu");
            xlsWriteLabel($tablehead, $kolomhead++, "Revenue Bulan Ini");
            xlsWriteLabel($tablehead, $kolomhead++, "Total Revenue s/d Saat Ini");
            xlsWriteLabel($tablehead, $kolomhead++, "Potensial Revenue");
            xlsWriteLabel($tablehead, $kolomhead++, "Target Revenue");
            xlsWriteLabel($tablehead, $kolomhead++, "Status");

            foreach ($pilihan as $p) {
               $ket = $p;
               foreach ($this->mtele_dapat->mshow_all_detail($nama, $ket, $tglawal, $tglakhir) as $data) {
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
            $namaFile = "Tabel Pendapatan BPJS / NON BPJS.xls";
            $judul = "Tabel Pendapatan BPJS / NON BPJS";
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
            xlsWriteLabel($tablehead, $kolomhead++, "REVENUE YANG LALU");
            xlsWriteLabel($tablehead, $kolomhead++, "REVENUE BULAN INI");
            xlsWriteLabel($tablehead, $kolomhead++, "TOTAL REVENUE S/D SAAT INI");
            xlsWriteLabel($tablehead, $kolomhead++, "POTENSIAL REVENUE");
            xlsWriteLabel($tablehead, $kolomhead++, "ESTIMASI TOTAL REVENUE");
            xlsWriteLabel($tablehead, $kolomhead++, "TARGET REVENUE");
            xlsWriteLabel($tablehead, $kolomhead++, "PROSENTASE");

            foreach ($this->mtele_dapat->mshow_all_call($tglawal,$tglakhir,$nama,$lokasi) as $data) {
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
         } 
      }
   }

   function export_xlsx() {
      $nama = $this->session->userdata("nama");
      $pilihan = $this->input->post('pilihan');
      $tglawal = $this->input->post('tglawal');
      $tglakhir = $this->input->post('tglakhir');
      
      $this->load->helper('exportexcel');
      $namaFile = "Rekap Pendapatan BPJS / NON BPJS.xls";
      $judul = "Rekap Pendapatan BPJS / NON BPJS";
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
      xlsWriteLabel($tablehead, $kolomhead++, "Kelompok BPJS / NON BPJS");
      xlsWriteLabel($tablehead, $kolomhead++, "Revenue Yang Lalu");
      xlsWriteLabel($tablehead, $kolomhead++, "Revenue Bulan Ini");
      xlsWriteLabel($tablehead, $kolomhead++, "Total Revenue s/d Saat Ini");
      xlsWriteLabel($tablehead, $kolomhead++, "Potensial Revenue");
      xlsWriteLabel($tablehead, $kolomhead++, "Target Revenue");
      xlsWriteLabel($tablehead, $kolomhead++, "Status");

      foreach ($pilihan as $p) {
         $ket = $p;
         foreach ($this->mtele_dapat->mshow_all_detail($nama, $ket, $tglawal, $tglakhir) as $data) {
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
