<?php

class ctabel_HSSE extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mtabel_HSSE'); 
    }

    function limbah() {
        if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
        redirect("clogin");
        }
      $this->load->view('content/vsuperuser/vtabel_HSSE/vlimbah');
    }

    function hasil_limbah() {
        if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
        redirect("clogin");
        }
        // $unit = $this->input->post('unit');
        $bulan = intval(substr($this->input->post('periode'), 5, 2));
        $tahun = substr($this->input->post('periode'), 0, 4);
        $data['limbah_rsg'] = $this->mtabel_HSSE->mshow_all_limbah('RSG', $bulan, $tahun);
        $data['limbah_rst'] = $this->mtabel_HSSE->mshow_all_limbah('RST', $bulan, $tahun);
        $data['limbah_rsp'] = $this->mtabel_HSSE->mshow_all_limbah('RSP', $bulan, $tahun);
        $data['limbah_rsmu'] = $this->mtabel_HSSE->mshow_all_limbah('RSMU', $bulan, $tahun);
        $data['limbah_urj'] = $this->mtabel_HSSE->mshow_all_limbah('URJ', $bulan, $tahun);
        $data['periode'] = $this->input->post('periode');
      $this->load->view('content/vsuperuser/vtabel_HSSE/vhasil_limbah', $data);
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
              
                foreach ($this->mtabel_HSSE->mshow_detil_limbah($bulan, $tahun) as $data) {
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

              $limbah_rsg = $this->mtabel_HSSE->mshow_all_limbah('RSG', $bulan, $tahun);
              $limbah_rst = $this->mtabel_HSSE->mshow_all_limbah('RST', $bulan, $tahun);
              $limbah_rsp = $this->mtabel_HSSE->mshow_all_limbah('RSP', $bulan, $tahun);
              $limbah_rsmu = $this->mtabel_HSSE->mshow_all_limbah('RSMU', $bulan, $tahun);
              $limbah_urj = $this->mtabel_HSSE->mshow_all_limbah('URJ', $bulan, $tahun);
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
      $this->load->view('content/vsuperuser/vtabel_HSSE/vkejadian_kecelakaan');
    }

    function property_damage() {
        if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
        redirect("clogin");
        }
      $this->load->view('content/vsuperuser/vtabel_HSSE/vproperty_damage');
    }

}

?>