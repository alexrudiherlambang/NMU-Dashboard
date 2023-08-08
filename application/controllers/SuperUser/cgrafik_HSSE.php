<?php

class cgrafik_HSSE extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mgrafik_HSSE'); 
    }

    function limbah() {
        if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
        redirect("clogin");
        }
      $this->load->view('content/vsuperuser/vgrafik_HSSE/vlimbah');
    }

    function hasil_limbah() {
        if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
        redirect("clogin");
        }
        // $unit = $this->input->post('unit');
        $bulan = intval(substr($this->input->post('periode'), 5, 2));
        $tahun = substr($this->input->post('periode'), 0, 4);
        $unit = $this->input->post('unit');
        $limbah = $this->mgrafik_HSSE->mshow_all_limbah($unit, $bulan, $tahun);
        foreach ($limbah->result() as $b) {
            $data =  array (
                'suhu'      => $b->suhu,
                'bod'       => $b->bod,
                'cod'       => $b->cod,
                'tss'       => $b->tss,
                'ph'        => $b->ph,
                'nh3'       => $b->nh3,
                'po4'       => $b->po4,
                'coliform'  => $b->coliform,
            );
        }
        $data['unit'] = $this->input->post('unit');
        $data['periode'] = $this->input->post('periode');
      $this->load->view('content/vsuperuser/vgrafik_HSSE/vhasil_limbah', $data);
    }

    function export_limbah() {
        // Mengecek jenis export yang diminta
        if (isset($_POST['exportType'])) {
           $exportType = $_POST['exportType'];
           if ($exportType == 'detail') {
              $bulan = $this->input->post('bulan');
              $tahun = $this->input->post('tahun');
              
              $this->load->helper('exportexcel');
              $namaFile = "Detail Data Limbah.xls";
              $judul = "Detail Data Limbah";
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
              xlsWriteLabel($tablehead, $kolomhead++, "Jenis");
              xlsWriteLabel($tablehead, $kolomhead++, "Nama Pelapor");
              xlsWriteLabel($tablehead, $kolomhead++, "Unit");
              xlsWriteLabel($tablehead, $kolomhead++, "NIP");
              xlsWriteLabel($tablehead, $kolomhead++, "Status Pelapor");
              xlsWriteLabel($tablehead, $kolomhead++, "Bagian/Fungsi/Nama Klinik");
              xlsWriteLabel($tablehead, $kolomhead++, "Bulan Lapor");
              xlsWriteLabel($tablehead, $kolomhead++, "Tahun Lapor");
              xlsWriteLabel($tablehead, $kolomhead++, "Suhu (oC)");
              xlsWriteLabel($tablehead, $kolomhead++, "BOD(mg/L)");
              xlsWriteLabel($tablehead, $kolomhead++, "COD(mg/L)");
              xlsWriteLabel($tablehead, $kolomhead++, "TSS(mg/L)");
              xlsWriteLabel($tablehead, $kolomhead++, "PH");
              xlsWriteLabel($tablehead, $kolomhead++, "NH3(mg/L)");
              xlsWriteLabel($tablehead, $kolomhead++, "PO4(mg/L)");
              xlsWriteLabel($tablehead, $kolomhead++, "Coliform (MPN/100ml)");
              xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Update");
              
                foreach ($this->mgrafik_HSSE->mshow_detil_limbah($bulan, $tahun) as $data) {
                $kolombody = 0;

                //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                xlsWriteNumber($tablebody, $kolombody++, $nourut);
                xlsWriteLabel($tablebody, $kolombody++, $data->jenis);
                xlsWriteLabel($tablebody, $kolombody++, $data->napeg);
                xlsWriteLabel($tablebody, $kolombody++, $data->unit);
                xlsWriteLabel($tablebody, $kolombody++, $data->nip);
                xlsWriteLabel($tablebody, $kolombody++, $data->status);
                xlsWriteLabel($tablebody, $kolombody++, $data->fungsi);
                xlsWriteLabel($tablebody, $kolombody++, $data->bulan);
                xlsWriteLabel($tablebody, $kolombody++, $data->tahun);
                xlsWriteLabel($tablebody, $kolombody++, $data->suhu);
                xlsWriteLabel($tablebody, $kolombody++, $data->bod);
                xlsWriteLabel($tablebody, $kolombody++, $data->cod);
                xlsWriteLabel($tablebody, $kolombody++, $data->tss);
                xlsWriteLabel($tablebody, $kolombody++, $data->ph);
                xlsWriteLabel($tablebody, $kolombody++, $data->nh3);
                xlsWriteLabel($tablebody, $kolombody++, $data->po4);
                xlsWriteLabel($tablebody, $kolombody++, $data->coliform);
                xlsWriteLabel($tablebody, $kolombody++, $data->lastupdate);
                $tablebody++;
                $nourut++;
                }
        
              xlsEOF();
              exit();
           } else if ($exportType == 'tabel') {
                $bulan = $this->input->post('bulan');
                $tahun = $this->input->post('tahun');
              
              $this->load->helper('exportexcel');
              $namaFile = "Tabel Data Limbah.xls.xls";
              $judul = "Tabel Data Limbah.xls";
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
              xlsWriteLabel($tablehead, $kolomhead++, "Jenis");
              xlsWriteLabel($tablehead, $kolomhead++, "Parameter");
              xlsWriteLabel($tablehead, $kolomhead++, "Baku Mutu");
              xlsWriteLabel($tablehead, $kolomhead++, "Hasil RSG");
              xlsWriteLabel($tablehead, $kolomhead++, "Hasil RST");
              xlsWriteLabel($tablehead, $kolomhead++, "Hasil RSP");
              xlsWriteLabel($tablehead, $kolomhead++, "Hasil RSMU");
              xlsWriteLabel($tablehead, $kolomhead++, "Hasil Klinik");
              xlsWriteLabel($tablehead, $kolomhead++, "Total Konsolidasi");

                $limbah_rsg = $this->mgrafik_HSSE->mshow_all_limbah('RSG', $bulan, $tahun);
                $limbah_rst = $this->mgrafik_HSSE->mshow_all_limbah('RST', $bulan, $tahun);
                $limbah_rsp = $this->mgrafik_HSSE->mshow_all_limbah('RSP', $bulan, $tahun);
                $limbah_rsmu = $this->mgrafik_HSSE->mshow_all_limbah('RSMU', $bulan, $tahun);
                $limbah_urj = $this->mgrafik_HSSE->mshow_all_limbah('URJ', $bulan, $tahun);
                $kolombody = 0;
  
                //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                xlsWriteNumber($tablebody, $kolombody++, $nourut);
                xlsWriteLabel($tablebody, $kolombody++, "Limbah");
                xlsWriteLabel($tablebody, $kolombody++, "Suhu");
                xlsWriteLabel($tablebody, $kolombody++, "30");
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsg->suhu);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rst->suhu);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsp->suhu);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsmu->suhu);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_urj->suhu);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsg->suhu+$limbah_rst->suhu+$limbah_rsp->suhu+$limbah_rsmu->suhu+$limbah_urj->suhu); 
                $tablebody++;
                $nourut++;

                $kolombody = 0;
  
                //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                xlsWriteNumber($tablebody, $kolombody++, $nourut);
                xlsWriteLabel($tablebody, $kolombody++, "Limbah");
                xlsWriteLabel($tablebody, $kolombody++, "BOD (mg/L)");
                xlsWriteLabel($tablebody, $kolombody++, "30");
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsg->bod);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rst->bod);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsp->bod);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsmu->bod);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_urj->bod);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsg->bod+$limbah_rst->bod+$limbah_rsp->bod+$limbah_rsmu->bod+$limbah_urj->bod);
                $tablebody++;
                $nourut++;

                $kolombody = 0;
  
                //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                xlsWriteNumber($tablebody, $kolombody++, $nourut);
                xlsWriteLabel($tablebody, $kolombody++, "Limbah");
                xlsWriteLabel($tablebody, $kolombody++, "COD (mg/L)");
                xlsWriteLabel($tablebody, $kolombody++, "80");
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsg->cod);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rst->cod);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsp->cod);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsmu->cod);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_urj->cod);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsg->cod+$limbah_rst->cod+$limbah_rsp->cod+$limbah_rsmu->cod+$limbah_urj->cod);
                $tablebody++;
                $nourut++;

                $kolombody = 0;
  
                //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                xlsWriteNumber($tablebody, $kolombody++, $nourut);
                xlsWriteLabel($tablebody, $kolombody++, "Limbah");
                xlsWriteLabel($tablebody, $kolombody++, "TSS (mg/L)");
                xlsWriteLabel($tablebody, $kolombody++, "30");
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsg->tss);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rst->tss);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsp->tss);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsmu->tss);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_urj->tss);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsg->tss+$limbah_rst->tss+$limbah_rsp->tss+$limbah_rsmu->tss+$limbah_urj->tss);
                $tablebody++;
                $nourut++;

                $kolombody = 0;
  
                //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                xlsWriteNumber($tablebody, $kolombody++, $nourut);
                xlsWriteLabel($tablebody, $kolombody++, "Limbah");
                xlsWriteLabel($tablebody, $kolombody++, "PH");
                xlsWriteLabel($tablebody, $kolombody++, "9");
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsg->ph);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rst->ph);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsp->ph);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsmu->ph);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_urj->ph);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsg->ph+$limbah_rst->ph+$limbah_rsp->ph+$limbah_rsmu->ph+$limbah_urj->ph);
                $tablebody++;
                $nourut++;

                $kolombody = 0;
  
                //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                xlsWriteNumber($tablebody, $kolombody++, $nourut);
                xlsWriteLabel($tablebody, $kolombody++, "Limbah");
                xlsWriteLabel($tablebody, $kolombody++, "NH3 (mg/L)");
                xlsWriteLabel($tablebody, $kolombody++, "0.1");
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsg->nh3);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rst->nh3);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsp->nh3);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsmu->nh3);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_urj->nh3);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsg->nh3+$limbah_rst->nh3+$limbah_rsp->nh3+$limbah_rsmu->nh3+$limbah_urj->nh3);
                $tablebody++;
                $nourut++;

                $kolombody = 0;
  
                //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                xlsWriteNumber($tablebody, $kolombody++, $nourut);
                xlsWriteLabel($tablebody, $kolombody++, "Limbah");
                xlsWriteLabel($tablebody, $kolombody++, "PO4 (mg/L)");
                xlsWriteLabel($tablebody, $kolombody++, "2");
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsg->po4);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rst->po4);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsp->po4);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsmu->po4);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_urj->po4);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsg->po4+$limbah_rst->po4+$limbah_rsp->po4+$limbah_rsmu->po4+$limbah_urj->po4);
                $tablebody++;
                $nourut++;

                $kolombody = 0;
  
                //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                xlsWriteNumber($tablebody, $kolombody++, $nourut);
                xlsWriteLabel($tablebody, $kolombody++, "Limbah");
                xlsWriteLabel($tablebody, $kolombody++, "Coliform (MPN/100ml)");
                xlsWriteLabel($tablebody, $kolombody++, "10000");
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsg->coliform);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rst->coliform);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsp->coliform);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsmu->coliform);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_urj->coliform);
                xlsWriteLabel($tablebody, $kolombody++, $limbah_rsg->coliform+$limbah_rst->coliform+$limbah_rsp->coliform+$limbah_rsmu->coliform+$limbah_urj->coliform);
              xlsEOF();
              exit();
           }
        }
    }

    function kejadian_kecelakaan() {
        if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
        redirect("clogin");
        }
      $this->load->view('content/vsuperuser/vgrafik_HSSE/vkejadian_kecelakaan');
    }

    function hasil_kejadian_kecelakaan() {
        if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
        redirect("clogin");
        }
        $bulan = intval(substr($this->input->post('periode'), 5, 2));
        $tahun = substr($this->input->post('periode'), 0, 4);
        $unit = $this->input->post('unit');
        
        $unsafe = $this->mgrafik_HSSE->mshow_all_unsafe($unit, $bulan, $tahun);
        $kejadian_kecelakaan = $this->mgrafik_HSSE->mshow_all_kejadian_kecelakaan($unit, $bulan, $tahun);
        // Olah data menjadi format yang sesuai dengan AnyChart
        $chartData = array();
        foreach ($unsafe->result() as $item) {
            $chartData[] = array(
                'x' => "Unsafe Action/Unsafe Condition",
                'value' => $item->jumlah
            );
        }
        foreach ($kejadian_kecelakaan->result() as $item) {
            $chartData[] = array(
                'x' => $item->sub_jenis,
                'value' => $item->jumlah
            );
        }

        // Load view dengan data yang diperlukan
        $data['chartDataJSON'] = json_encode($chartData);
        $data['unit'] = $this->input->post('unit');
        $data['periode'] = $this->input->post('periode');
      $this->load->view('content/vsuperuser/vgrafik_HSSE/vhasil_kejadian_kecelakaan', $data);
    }

    function export_kejadian_kecelakaan() {
        // Mengecek jenis export yang diminta
        if (isset($_POST['exportType'])) {
           $exportType = $_POST['exportType'];
           if ($exportType == 'detail') {
              $unit = $this->input->post('unit');
              $tglawal = $this->input->post('tglawal');
              $tglakhir = $this->input->post('tglakhir');
              
              $this->load->helper('exportexcel');
              $namaFile = "Detail Data Kejadian Kecelakaan.xls";
              $judul = "Detail Data Kejadian Kecelakaan";
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
              xlsWriteLabel($tablehead, $kolomhead++, "Jenis");
              xlsWriteLabel($tablehead, $kolomhead++, "Kategori");
              xlsWriteLabel($tablehead, $kolomhead++, "Nama Pelapor");
              xlsWriteLabel($tablehead, $kolomhead++, "Unit");
              xlsWriteLabel($tablehead, $kolomhead++, "NIP");
              xlsWriteLabel($tablehead, $kolomhead++, "Status Pelapor");
              xlsWriteLabel($tablehead, $kolomhead++, "Bagian/Fungsi/Nama Klinik");
              xlsWriteLabel($tablehead, $kolomhead++, "Nama Korban / PIC");
              xlsWriteLabel($tablehead, $kolomhead++, "Status Korban / Status Laporan");
              xlsWriteLabel($tablehead, $kolomhead++, "Aktifitas");
              xlsWriteLabel($tablehead, $kolomhead++, "Incident/Event Categories");
              xlsWriteLabel($tablehead, $kolomhead++, "Corporate Life Saving Rules");
              xlsWriteLabel($tablehead, $kolomhead++, "Deskripsi Kejadian");
              xlsWriteLabel($tablehead, $kolomhead++, "Lokasi");
              xlsWriteLabel($tablehead, $kolomhead++, "Tanggal & Waktu");
                
                foreach ($this->mgrafik_HSSE->mshow_detil_kejadian_kecelakaan($unit, $tglawal, $tglakhir) as $data) {
                $kolombody = 0;

                //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                xlsWriteNumber($tablebody, $kolombody++, $nourut);
                xlsWriteLabel($tablebody, $kolombody++, $data->jenis);
                xlsWriteLabel($tablebody, $kolombody++, $data->sub_jenis);
                xlsWriteLabel($tablebody, $kolombody++, $data->napeg);
                xlsWriteLabel($tablebody, $kolombody++, $data->unit);
                xlsWriteLabel($tablebody, $kolombody++, $data->nip);
                xlsWriteLabel($tablebody, $kolombody++, $data->status);
                xlsWriteLabel($tablebody, $kolombody++, $data->fungsi);
                xlsWriteLabel($tablebody, $kolombody++, $data->nama_korban);
                xlsWriteLabel($tablebody, $kolombody++, $data->status_korban);
                xlsWriteLabel($tablebody, $kolombody++, $data->aktifitas);
                xlsWriteLabel($tablebody, $kolombody++, $data->incident);
                xlsWriteLabel($tablebody, $kolombody++, $data->tindakan);
                xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi);
                xlsWriteLabel($tablebody, $kolombody++, $data->lokasi);
                xlsWriteLabel($tablebody, $kolombody++, $data->tgl_waktu);
                $tablebody++;
                $nourut++;
                }

                foreach ($this->mgrafik_HSSE->mshow_detil_unsafe($unit, $tglawal, $tglakhir) as $data) {                      
                    $kolombody = 0;

                    //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                    xlsWriteNumber($tablebody, $kolombody++, $nourut);
                    xlsWriteLabel($tablebody, $kolombody++, $data->jenis);
                    xlsWriteLabel($tablebody, $kolombody++, $data->sub_jenis);
                    xlsWriteLabel($tablebody, $kolombody++, $data->napeg);
                    xlsWriteLabel($tablebody, $kolombody++, $data->unit);
                    xlsWriteLabel($tablebody, $kolombody++, $data->nip);
                    xlsWriteLabel($tablebody, $kolombody++, $data->status);
                    xlsWriteLabel($tablebody, $kolombody++, $data->fungsi);
                    xlsWriteLabel($tablebody, $kolombody++, $data->pic);
                    xlsWriteLabel($tablebody, $kolombody++, $data->validasi);
                    xlsWriteLabel($tablebody, $kolombody++, "NULL");
                    xlsWriteLabel($tablebody, $kolombody++, "NULL");
                    xlsWriteLabel($tablebody, $kolombody++, $data->rtl);
                    xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi);
                    xlsWriteLabel($tablebody, $kolombody++, $data->lokasi);
                    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_waktu);
                    $tablebody++;
                    $nourut++;
                    }
        
              xlsEOF();
              exit();
           } else if ($exportType == 'tabel') {
                $unit = $this->input->post('unit');
                $tglawal = $this->input->post('tglawal');
                $tglakhir = $this->input->post('tglakhir');
                //untuk man hours
                $bulan = intval(substr($this->input->post('period'), 5, 2));
                $tahun = substr($this->input->post('period'), 0, 4);
                $man_hour = $this->mgrafik_HSSE->mshow_man_hour($bulan, $tahun);
              
                $this->load->helper('exportexcel');
                $namaFile = "Tabel Data Kejadian kecelakaan.xls.xls";
                $judul = "Tabel Data Kejadian kecelakaan.xls";
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
                xlsWriteLabel($tablehead, $kolomhead++, "Unit");
                xlsWriteLabel($tablehead, $kolomhead++, "Jenis");
                xlsWriteLabel($tablehead, $kolomhead++, "Kategori");
                xlsWriteLabel($tablehead, $kolomhead++, "Periode");
                xlsWriteLabel($tablehead, $kolomhead++, "Status YTD");
                
                $totalJumlah_kejadian_kecelakaan = 0;
                foreach($this->mgrafik_HSSE->mshow_all_kejadian_kecelakaan($unit, $tglawal, $tglakhir) as $data){
                    $kolombody = 0;
                    
                    //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                    xlsWriteNumber($tablebody, $kolombody++, $nourut);
                    xlsWriteLabel($tablebody, $kolombody++, $data->unit);
                    xlsWriteLabel($tablebody, $kolombody++, $data->jenis);
                    xlsWriteLabel($tablebody, $kolombody++, $data->sub_jenis);
                    xlsWriteLabel($tablebody, $kolombody++, date("M Y", strtotime($data->tgl_waktu)));
                    xlsWriteLabel($tablebody, $kolombody++, $data->jumlah);
                    $tablebody++;
                    $nourut++;
                    $totalJumlah_kejadian_kecelakaan += $data->jumlah;
                }
                $total_kejadian_kecelakaan = $totalJumlah_kejadian_kecelakaan;
                $totalJumlah_unsafe = 0;
                foreach($this->mgrafik_HSSE->mshow_all_unsafe($unit, $tglawal, $tglakhir) as $data){
                    $kolombody = 0;
                    
                    //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                    xlsWriteNumber($tablebody, $kolombody++, $nourut);
                    xlsWriteLabel($tablebody, $kolombody++, $data->unit);
                    xlsWriteLabel($tablebody, $kolombody++, $data->jenis);
                    xlsWriteLabel($tablebody, $kolombody++, $data->sub_jenis);
                    xlsWriteLabel($tablebody, $kolombody++, date("M Y", strtotime($data->tgl_waktu)));
                    xlsWriteLabel($tablebody, $kolombody++, $data->jumlah);
                    $tablebody++;
                    $nourut++;
                    $totalJumlah_unsafe += $data->jumlah;
                }
                $total_unsafe = $totalJumlah_unsafe;

                $tablebody++;
                $kolombody = 0;
                    
                //Total kejadian
                xlsWriteNumber($tablebody, $kolombody++, $nourut);
                xlsWriteLabel($tablebody, $kolombody++, "");
                xlsWriteLabel($tablebody, $kolombody++, "");
                xlsWriteLabel($tablebody, $kolombody++, "");
                xlsWriteLabel($tablebody, $kolombody++, "Total Kejadian");
                xlsWriteLabel($tablebody, $kolombody++, $total_kejadian_kecelakaan + $total_unsafe);
                $tablebody++;
                $nourut++;

                $kolombody = 0;
                    
                //Total Man Hours
                xlsWriteNumber($tablebody, $kolombody++, $nourut);
                xlsWriteLabel($tablebody, $kolombody++, "");
                xlsWriteLabel($tablebody, $kolombody++, "");
                xlsWriteLabel($tablebody, $kolombody++, "");
                xlsWriteLabel($tablebody, $kolombody++, "Total Man Hours");
                xlsWriteLabel($tablebody, $kolombody++, $man_hour->man_hour);
                $tablebody++;
                $nourut++;

                xlsEOF();
                exit();
            }
        }
    }

    function property_damage() {
        if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
        redirect("clogin");
        }
      $this->load->view('content/vsuperuser/vgrafik_HSSE/vproperty_damage');
    }

    function hasil_property_damage() {
        if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
        redirect("clogin");
        }
        // $unit = $this->input->post('unit');
        $bulan = intval(substr($this->input->post('periode'), 5, 2));
        $tahun = substr($this->input->post('periode'), 0, 4);
        $unit = $this->input->post('unit');
        $property_damage = $this->mgrafik_HSSE->mshow_all_property_damage($unit, $bulan, $tahun);

        // Process data
        $dataArray = array();
        $labels = ['KP', 'RSG', 'RST', 'RSP', 'RSMU', 'KLINIK', 'Other'];

        foreach ($property_damage->result() as $b) {
            $unit = $b->unit;
            $sub_jenis = $b->sub_jenis;
            $jumlah = $b->jumlah;

            if (!isset($dataArray[$sub_jenis])) {
                $dataArray[$sub_jenis] = array_fill(0, 7, 0);
            }

            $unitIndex = array_search($unit, $labels);
            $dataArray[$sub_jenis][$unitIndex] = $jumlah;
        }

        $datasets = array();

        foreach ($dataArray as $sub_jenis => $data) {
            $dataset = array(
                'label' => $sub_jenis,
                'data' => $data,
                'borderColor' => 'rgba(0, 0, 0, 1)',
                'backgroundColor' => 'rgba(0, 0, 0, 0.2)',
                'borderWidth' => 3
            );

            array_push($datasets, $dataset);
        }

        $chartConfig = array(
            'type' => 'bar',
            'data' => array(
                'labels' => $labels,
                'datasets' => $datasets
            ),
            'options' => array(
                'scales' => array(
                    'xAxes' => array(
                        array('gridLines' => array('display' => false))
                    ),
                    'yAxes' => array(
                        array('gridLines' => array('display' => false))
                    )
                ),
                'legend' => array('position' => 'bottom'),
                'responsive' => true
            )
        );

        $data['chartConfigJSON'] = json_encode($chartConfig);
        $data['unit'] = $this->input->post('unit');
        $data['periode'] = $this->input->post('periode');
      $this->load->view('content/vsuperuser/vgrafik_HSSE/vhasil_property_damage', $data);
    }

}

?>