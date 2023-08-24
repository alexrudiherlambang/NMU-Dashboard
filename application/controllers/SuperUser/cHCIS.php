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

	public function get_mtpeg()
	{
		if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
			redirect("clogin");
		}
		$data['mt_import'] = $this->mHCIS->mshow_all_import_mtpeg();
		$this->load->view('content/vsuperuser/vHCIS/vimport_master_pekerja', $data);
	}

	public function insert_mtpeg()
	{
		if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
			redirect("clogin");
		}
		$unit = $this->input->post('unit');
		$bulan = intval(substr($this->input->post('periode'), 5, 2));
        $tahun = substr($this->input->post('periode'), 0, 4);
		$periode = $this->input->post('periode');
		$validasi_get = $this->mHCIS->validasi_get($unit, $bulan, $tahun)->num_rows();
		if ($validasi_get == 0) {
			$mt_peg = $this->mHCIS->mget_mtpeg($unit, $bulan, $tahun);
			if ($mt_peg) {
				foreach ($mt_peg as $cd){
					$simpan = array(
						'unit'           	=> $unit,
						'noidbio'           => $cd->noidbio,
						'nik'           	=> $cd->nik,
						'namabio'           => $cd->namabio,
						'agama'          	=> $cd->agama,
						'namabpk'           => $cd->namabpk,
						'namaibu'           => $cd->namaibu,
						'alamat_asli'       => $cd->alamat_asli,
						'alamat'           	=> $cd->alamat,
						'alamatpph'         => $cd->alamatpph,
						'tptlahir'          => $cd->tptlahir,
						'tgllahir'          => $cd->tgllahir,
						'jk'           		=> $cd->jk,
						'telepon'           => $cd->telepon,
						'goldarah'          => $cd->goldarah,
						'nonpwp'           	=> $cd->nonpwp,
						'nobpjs'           	=> $cd->nobpjs,
						'pegaktif'          => $cd->pegaktif,
						'tgmasuk'           => $cd->tgmasuk,
						'tgskkary'          => $cd->tgskkary,
						'noskkary'          => $cd->noskkary,
						'tglkary1'          => $cd->tglkary1,
						'tglkary2'          => $cd->tglkary2,
						'tgskmut1'          => $cd->tgskmut1,
						'tgskmut2'          => $cd->tgskmut2,
						'noskmut'           => $cd->noskmut,
						'golkary'           => $cd->golkary,
						'golgaji'           => $cd->golgaji,
						'tgkeluar'          => $cd->tgkeluar,
						'stspens'           => $cd->stspens,
						'noskpens'          => $cd->noskpens,
						'tgskpens'          => $cd->tgskpens,
						'tgpensiun'         => $cd->tgpensiun,
						'golpensiun'        => $cd->golpensiun,
						'noper'           	=> $cd->noper,
						'noreken'           => $cd->noreken,
						'anreken'           => $cd->anreken,
						'bkodeb'           	=> $cd->bkodeb,
						'tggaji'           	=> $cd->tggaji,
						'gaji'           	=> $cd->gaji,
						'sankhus'           => $cd->sankhus,
						'tunjjab'           => $cd->tunjjab,
						'tunjtbh'           => $cd->tunjtbh,
						'uplembur'          => $cd->uplembur,
						'tunjsos'           => $cd->tunjsos,
						'pendpphtt'         => $cd->pendpphtt,
						'tottunj'           => $cd->tottunj,
						'nmdidik'           => $cd->nmdidik,
						'jurusan'           => $cd->jurusan,
						'tahunlulus'        => $cd->tahunlulus,
						'nmsekolah'         => $cd->nmsekolah,
						'noidstsb'          => $cd->noidstsb,
						'golkary_mutasi'    => $cd->golkary,
						'statusk_mutasi'    => $cd->statusk,
						'tgskmutasi'        => $cd->tgskmutasi,
						'noskmutasi'        => $cd->noskmutasi,
						'nkdunit'           => $cd->nkdunit,
						'nmunit'           	=> $cd->nmunit,
						'nmfungsi'          => $cd->nmfungsi,
						'nmsub'           	=> $cd->nmsub,
					);
					$this->mHCIS->minsert_mtpeg($simpan);
				}
				$simpan2 = array(
					'id'           	=> $this->session->userdata('id'),
					'unit'          => $unit,
					'bulan'         => $bulan,
					'tahun'         => $tahun,
				);
				$this->mHCIS->minsert_import_mtpeg($simpan2);
				$log = array(
					'id'		=> $this->session->userdata("id"),  
					'unit'      => $this->input->post('unit'),
					'jenis'     => 'HCIS Get Master Pegawai',
					'platform'	=> $this->agent->platform(),
					'browser'	=> $this->agent->browser().' ('.$this->agent->version().')',
					'ip'		=> $this->input->ip_address(),
					'action'	=> 'Import Data Pegawai Unit : '.$unit.', Periode : '.$periode,
				 );
				 $this->mHCIS->insert_log($log);
				echo '<script language="javascript">alert("Berhasil Mengupdate Data Pekerja !!!"); window.location.href="get_mtpeg";</script>';
			} else {
				echo '<script language="javascript">alert("Data Pegawai Belum Tersedia !!!"); window.location.href="get_mtpeg";</script>';
			}
		}else {
			echo '<script language="javascript">alert("Maaf Data Pekerja : '.$unit.', Periode : '.$periode.', Sudah Terupdate !!!"); window.location.href="get_mtpeg";</script>';
		}
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
		$log = array(
			'id'		=> $this->session->userdata("id"),  
			'unit'      => $this->input->post('unit'),
			'jenis'     => 'HCIS Tabel Populasi Pekerja',
			'platform'	=> $this->agent->platform(),
			'browser'	=> $this->agent->browser().' ('.$this->agent->version().')',
			'ip'		=> $this->input->ip_address(),
			'action'	=> 'Show Tabel Populasi Pekerja Unit : '.$unit.', Periode : '.$this->input->post('periode').', Filter By  : '.$filter,
		 );
		 $this->mHCIS->insert_log($log);		
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

}
?>