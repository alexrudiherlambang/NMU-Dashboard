<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class cHCIS extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("mHCIS");
	}

	public function Master_pekerja()
	{
		if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
			redirect("clogin");
		}
		$data['mt_pekerja'] = $this->mHCIS->mshow_all_mtkerja();
		$this->load->view('content/vsuperuser/vHCIS/vmaster_pekerja', $data);
	}

	public function tabel_populasi()
	{
		if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
			redirect("clogin");
		}
		$this->load->view('content/vsuperuser/vHCIS/vtabel_populasi');
	}

	public function hasil_tabel_populasi()
	{
		if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
			redirect("clogin");
		}
        $unit = $this->input->post('unit');
        $filter = $this->input->post('filter');
        $bulan = intval(substr($this->input->post('periode'), 5, 2));
        $tahun = substr($this->input->post('periode'), 0, 4);
        $data['populasi'] = $this->mHCIS->mshow_all_populasi($unit, $filter, $bulan, $tahun);
		$totalJumlah_populasi = 0; // Membuat variabel untuk menyimpan jumlah total
        foreach ($data['populasi'] as $p) {
            $totalJumlah_populasi += $p->jumlah; // Menambahkan nilai 'jumlah' ke total
        }
        $data['total_populasi'] = $totalJumlah_populasi;
        $data['unit'] = $this->input->post('unit');
        $data['filter'] = $this->input->post('filter');
        $data['periode'] = $this->input->post('periode');
		
		$this->load->view('content/vsuperuser/vHCIS/vhasil_tabel_populasi', $data);
	}

	function export_populasi() {
        // Mengecek jenis export yang diminta
        if (isset($_POST['exportType'])) {
			$exportType = $_POST['exportType'];
			if ($exportType == 'detail') {
				$unit = $this->input->post('unit');
				$bulan = intval(substr($this->input->post('periode'), 5, 2));
				$tahun = substr($this->input->post('periode'), 0, 4);
				
				$this->load->helper('exportexcel');
				$namaFile = "Detail Data Populasi Pekerja.xls";
				$judul = "Detail Data Populasi Pekerja";
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
				xlsWriteLabel($tablehead, $kolomhead++, "Unit Kerja");
				xlsWriteLabel($tablehead, $kolomhead++, "NIP");
				xlsWriteLabel($tablehead, $kolomhead++, "Nama Pegawai");
				xlsWriteLabel($tablehead, $kolomhead++, "Agama");
				xlsWriteLabel($tablehead, $kolomhead++, "Golongan");
				xlsWriteLabel($tablehead, $kolomhead++, "Alamat Asli");
				xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
				xlsWriteLabel($tablehead, $kolomhead++, "Alamat Domisili");
				xlsWriteLabel($tablehead, $kolomhead++, "TTL");
				xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kelamin");
				xlsWriteLabel($tablehead, $kolomhead++, "Pendidikan terakhir");
				xlsWriteLabel($tablehead, $kolomhead++, "Jurusan");
				xlsWriteLabel($tablehead, $kolomhead++, "Tahun Lulus");
				xlsWriteLabel($tablehead, $kolomhead++, "Nama Sekolah");
				xlsWriteLabel($tablehead, $kolomhead++, "Jabatan");
				xlsWriteLabel($tablehead, $kolomhead++, "Fungsi");
				xlsWriteLabel($tablehead, $kolomhead++, "Sub-Divisi");
					
				foreach ($this->mHCIS->mshow_detil_populasi($unit, $bulan, $tahun) as $data) {
					$kolombody = 0;

					//ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
					xlsWriteNumber($tablebody, $kolombody++, $nourut);
					xlsWriteLabel($tablebody, $kolombody++, $data->unit);
					xlsWriteLabel($tablebody, $kolombody++, $data->nik);
					xlsWriteLabel($tablebody, $kolombody++, $data->namabio);
					xlsWriteLabel($tablebody, $kolombody++, $data->agama);
					xlsWriteLabel($tablebody, $kolombody++, $data->golkary);
					xlsWriteLabel($tablebody, $kolombody++, $data->alamat_asli);
					xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
					xlsWriteLabel($tablebody, $kolombody++, $data->alamatpph);
					xlsWriteLabel($tablebody, $kolombody++, $data->tptlahir." , ".$data->tgllahir );
					xlsWriteLabel($tablebody, $kolombody++, $data->jk);
					xlsWriteLabel($tablebody, $kolombody++, $data->nmdidik);
					xlsWriteLabel($tablebody, $kolombody++, $data->jurusan);
					xlsWriteLabel($tablebody, $kolombody++, $data->tahunlulus);
					xlsWriteLabel($tablebody, $kolombody++, $data->nmsekolah);
					xlsWriteLabel($tablebody, $kolombody++, $data->nmunit);
					xlsWriteLabel($tablebody, $kolombody++, $data->nmfungsi);
					xlsWriteLabel($tablebody, $kolombody++, $data->nmsub);
					$tablebody++;
					$nourut++;
					}			
				xlsEOF();
				exit();
			} else if ($exportType == 'tabel') {
                $unit = $this->input->post('unit');
                $filter = $this->input->post('filter');
                $periode = $this->input->post('periode');
				$bulan = intval(substr($this->input->post('periode'), 5, 2));
				$tahun = substr($this->input->post('periode'), 0, 4);
              
                $this->load->helper('exportexcel');
                $namaFile = "Tabel Data Populasi Pekerja.xls.xls";
                $judul = "Tabel Data Populasi Pekerja.xls";
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
                xlsWriteLabel($tablehead, $kolomhead++, "Kategori");
                xlsWriteLabel($tablehead, $kolomhead++, "Periode");
                xlsWriteLabel($tablehead, $kolomhead++, "Jumlah");
                
                $totalJumlah_populasi = 0;
                foreach($this->mHCIS->mshow_all_populasi($unit, $filter, $bulan, $tahun) as $data){
                    $kolombody = 0;
                    
                    //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                    xlsWriteNumber($tablebody, $kolombody++, $nourut);
					if ($unit == "KONSOLIDASI"){
						xlsWriteLabel($tablebody, $kolombody++, "KONSOLIDASI");
					}else{
						xlsWriteLabel($tablebody, $kolombody++, $data->unit);
					}
                    xlsWriteLabel($tablebody, $kolombody++, $data->kategori);
                    xlsWriteLabel($tablebody, $kolombody++, $periode);
                    xlsWriteLabel($tablebody, $kolombody++, $data->jumlah);
                    $tablebody++;
                    $nourut++;
                    $totalJumlah_populasi += $data->jumlah;
                }
                $total_populasi = $totalJumlah_populasi;
                
				$kolombody = 0;
                //Total kejadian
                xlsWriteNumber($tablebody, $kolombody++, $nourut);
                xlsWriteLabel($tablebody, $kolombody++, "");
                xlsWriteLabel($tablebody, $kolombody++, "");
                xlsWriteLabel($tablebody, $kolombody++, "Total Populasi");
                xlsWriteLabel($tablebody, $kolombody++, $total_populasi);

                xlsEOF();
                exit();
            }
        }
    }

	// public function test()
	// {
	// 	 $this->load->view('content/vsuperuser/vHCIS/save');
	// }

	// public function upload_excel()
	// {
	// 	// Pastikan library PHPExcel sudah dimuat
	// 	$this->load->library('PHPExcel');

	// 	// Konfigurasi upload
	// 	$config['upload_path'] = './assets/temp/';
	// 	$config['allowed_types'] = 'xlsx';
	// 	$config['max_size'] = 100024; // Ukuran maksimal file (dalam KB)
	// 	$this->load->library('upload', $config);

	// 	if (!$this->upload->do_upload('excel_file')) {
	// 		$error = array('error' => $this->upload->display_errors());
	// 		// Tampilkan pesan error jika upload gagal
	// 		print_r ($error);
	// 		die;
	// 	} else {
	// 		$upload_data = $this->upload->data();
	// 		$file_path = $upload_data['full_path'];

	// 		// Load file Excel yang diupload
	// 		$excel = PHPExcel_IOFactory::load($file_path);
	// 		$sheet = $excel->getSheet(0);
	// 		$totalRows = $sheet->getHighestRow();

	// 		// Folder tujuan untuk menyimpan gambar dengan path relatif
	// 		$outputFolder = './assets/hasil_unsafe/';

	// 		// Inisialisasi nomor urut file
	// 		$nomorUrut = 1;

	// 		// Loop melalui setiap baris
	// 		for ($row = 4; $row <= $totalRows; $row++) {
	// 			$gambarData = $sheet->getCell('G' . $row)->getValue();

	// 			// Jika ada data gambar, simpan dengan nama file urut
	// 			if (!empty($gambarData)) {
	// 				$imageExtension = 'jpg'; // Ganti dengan ekstensi gambar yang sesuai

	// 				// Generate nama file dan path tujuan
	// 				$namaFile = $nomorUrut . '.' . $imageExtension;
	// 				$pathTujuan = $outputFolder . $namaFile;

	// 				// Simpan gambar
	// 				file_put_contents($pathTujuan, base64_decode($gambarData));

	// 				// Tingkatkan nomor urut
	// 				$nomorUrut++;
	// 			}
	// 		}

	// 		// Hapus file sementara
	// 		unlink($file_path);

	// 		// Tampilkan pesan berhasil atau redirect ke halaman lain
	// 		echo 'Proses upload dan pengolahan data berhasil.';
	// 	}
	// }

}
?>