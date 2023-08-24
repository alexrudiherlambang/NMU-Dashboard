<?php

class mHCIS extends ci_model {

   public function __construct() {
      parent::__construct();
   }

   //SHOW DATA MASTER PEKERJA
   function mshow_all_mtkerja() {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('id, unit, nik, namabio, agama, alamat_asli, alamat, golkary, alamatpph, tptlahir, tgllahir, jk, nmdidik, jurusan, tahunlulus, nmsekolah, nmunit, nmfungsi, nmsub');
      $this->db->from('hcis_mtpeg');
      $this->db->order_by('namabio', 'asc');
      $this->db->group_by('namabio');
      return $this->db->get()->result();
   }

   //VALIDASI GET FROM SIMPEG
   function validasi_get($unit, $bulan, $tahun)
		{
			$this->db = $this->load->database('local', TRUE);
			$this->db->where('unit', $unit);
			$this->db->where('bulan', $bulan);
			$this->db->where('tahun', $tahun);
			return $this->db->get('hcis_import_mtpeg');
		}
   
   //SHOW IMPORT DATA MASTER PEKERJA
   function mshow_all_import_mtpeg() {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('id,fx_nmuser(id) as nama, unit, bulan, tahun, lastupdate');
      $this->db->from('hcis_import_mtpeg');
      $this->db->order_by('tahun', 'desc');
      $this->db->order_by('bulan', 'desc');
      return $this->db->get()->result();
   }

   //GET DATA MASTER PEKERJA FROM ALL RS
   function mget_mtpeg($unit, $bulan, $tahun) {
      $database = '';
      if ($unit == "KP") {
         $database = 'db_kp';
      } elseif ($unit == "RSG") {
         $database = 'db_rsg';
      } elseif ($unit == "RST") {
         $database = 'db_rst';
      } elseif ($unit == "RSP") {
         $database = 'db_rsp';
      } elseif ($unit == "RSMU") {
         $database = 'db_rsmu';
      } elseif ($unit == "URJ") {
         $database = 'db_urj';
      } else {
         return false;
      }
      if ($bulan >= 1 && $bulan <= 9) {
         $bulan = "0" . $bulan;
      }
      return $this->load->database($database, TRUE)->query
      ("
         SELECT 
               a.noidbio, a.nik, a.namabio, a.agama, a.namabpk, a.namaibu, a.alamat_asli, a.alamat, a.alamatpph, a.tptlahir, 
               a.tgllahir, a.jk, a.telepon, a.goldarah, a.nonpwp, a.nobpjs, a.pegaktif, a.tgmasuk, a.tgskkary, a.noskkary, a.tglkary1, 
               a.tglkary2, a.tgskmut1, a.tgskmut2, a.noskmut, a.golkary, a.golgaji, a.tgkeluar, a.stspens, a.noskpens, a.tgskpens, 
               a.tgpensiun, a.golpensiun, a.noper, a.noreken, a.anreken,
               b.noidsts, b.bkodeb, b.tggaji, b.gaji, b.sankhus, b.tunjjab, b.tunjtbh, b.uplembur, b.tunjsos, b.pendpphtt, b.tottunj,
               c.nmdidik, c.jurusan, c.tahunlulus, c.nmsekolah,
               d.noidstsb, d.golkary, d.statusk, d.tgskmutasi, d.noskmutasi,
               e.nkdunit, e.nama AS nmunit, e.inama AS nmfungsi, e.snama AS nmsub
         FROM 
               ptnmudbpeg.gmtbiodata1 a 
               
         INNER JOIN 
               ptnmudbpegt.trans_gaji_byr b ON a.noidbio = b.noidbio
         LEFT JOIN 
               ptnmudbpegt.trans_riwayat_didik c ON a.noidbio = c.noidbio 
         LEFT JOIN 
               ptnmudbpegt.trans_riwayat_mutasi d ON a.noidbio = d.noidbio
         LEFT JOIN 
               ptnmudbadm.viewunit0 e ON b.bkodeb = e.nkdunit 
         WHERE 
            MONTH(b.tggaji) = $bulan AND YEAR(b.tggaji) = $tahun
         ORDER BY 
               b.noidsts, b.bkodeb, a.noidbio, b.tggaji;
      ")->result();
   }

   //PARTIAL DATA MASTER PEKERJA FROM ALL RS
   // function mget_mtpeg_kp() {
   //    return $this->load->database('db_kp', TRUE)->query
   //    ("
   //       SELECT 
   //             a.noidbio, a.nik, a.namabio, a.agama, a.namabpk, a.namaibu, a.alamat_asli, a.alamat, a.alamatpph, a.tptlahir, 
   //             a.tgllahir, a.jk, a.telepon, a.goldarah, a.nonpwp, a.nobpjs, a.pegaktif, a.tgmasuk, a.tgskkary, a.noskkary, a.tglkary1, 
   //             a.tglkary2, a.tgskmut1, a.tgskmut2, a.noskmut, a.golkary, a.golgaji, a.tgkeluar, a.stspens, a.noskpens, a.tgskpens, 
   //             a.tgpensiun, a.golpensiun, a.noper, a.noreken, a.anreken,
   //             b.noidsts, b.bkodeb, b.gaji, b.sankhus, b.tunjjab, b.tunjtbh, b.uplembur, b.tunjsos, b.pendpphtt, b.tottunj,
   //             c.nmdidik, c.jurusan, c.tahunlulus, c.nmsekolah,
   //             d.noidstsb, d.golkary, d.statusk, d.tgskmutasi, d.noskmutasi,
   //             e.nkdunit, e.nama AS nmunit, e.inama AS nmfungsi, e.snama AS nmsub
   //       FROM 
   //             ptnmudbpeg.gmtbiodata1 a 
               
   //       INNER JOIN 
   //             ptnmudbpegt.trans_gaji_byr b ON a.noidbio = b.noidbio
   //       LEFT JOIN 
   //             ptnmudbpegt.trans_riwayat_didik c ON a.noidbio = c.noidbio 
   //       LEFT JOIN 
   //             ptnmudbpegt.trans_riwayat_mutasi d ON a.noidbio = d.noidbio
   //       LEFT JOIN 
   //             ptnmudbadm.viewunit0 e ON b.bkodeb = e.nkdunit 
   //       WHERE 
   //             b.tggaji >= '2023-01-01' 
   //       ORDER BY 
   //             b.noidsts, b.bkodeb, a.noidbio, b.tggaji;
   //    ")->result();
   // }
   // function mget_mtpeg_rsg() {
   //    return $this->load->database('db_rsg', TRUE)->query
   //    ("
   //       SELECT 
   //             a.noidbio, a.nik, a.namabio, a.agama, a.namabpk, a.namaibu, a.alamat_asli, a.alamat, a.alamatpph, a.tptlahir, 
   //             a.tgllahir, a.jk, a.telepon, a.goldarah, a.nonpwp, a.nobpjs, a.pegaktif, a.tgmasuk, a.tgskkary, a.noskkary, a.tglkary1, 
   //             a.tglkary2, a.tgskmut1, a.tgskmut2, a.noskmut, a.golkary, a.golgaji, a.tgkeluar, a.stspens, a.noskpens, a.tgskpens, 
   //             a.tgpensiun, a.golpensiun, a.noper, a.noreken, a.anreken,
   //             b.noidsts, b.bkodeb, b.gaji, b.sankhus, b.tunjjab, b.tunjtbh, b.uplembur, b.tunjsos, b.pendpphtt, b.tottunj,
   //             c.nmdidik, c.jurusan, c.tahunlulus, c.nmsekolah,
   //             d.noidstsb, d.golkary, d.statusk, d.tgskmutasi, d.noskmutasi,
   //             e.nkdunit, e.nama AS nmunit, e.inama AS nmfungsi, e.snama AS nmsub
   //       FROM 
   //             ptnmudbpeg.gmtbiodata1 a 
               
   //       INNER JOIN 
   //             ptnmudbpegt.trans_gaji_byr b ON a.noidbio = b.noidbio
   //       LEFT JOIN 
   //             ptnmudbpegt.trans_riwayat_didik c ON a.noidbio = c.noidbio 
   //       LEFT JOIN 
   //             ptnmudbpegt.trans_riwayat_mutasi d ON a.noidbio = d.noidbio
   //       LEFT JOIN 
   //             ptnmudbadm.viewunit0 e ON b.bkodeb = e.nkdunit 
   //       WHERE 
   //             b.tggaji >= '2023-01-01' 
   //       ORDER BY 
   //             b.noidsts, b.bkodeb, a.noidbio, b.tggaji;
   //    ")->result();
   // }
   // function mget_mtpeg_rsp() {
   //    return $this->load->database('db_rsp', TRUE)->query
   //    ("
   //       SELECT 
   //             a.noidbio, a.nik, a.namabio, a.agama, a.namabpk, a.namaibu, a.alamat_asli, a.alamat, a.alamatpph, a.tptlahir, 
   //             a.tgllahir, a.jk, a.telepon, a.goldarah, a.nonpwp, a.nobpjs, a.pegaktif, a.tgmasuk, a.tgskkary, a.noskkary, a.tglkary1, 
   //             a.tglkary2, a.tgskmut1, a.tgskmut2, a.noskmut, a.golkary, a.golgaji, a.tgkeluar, a.stspens, a.noskpens, a.tgskpens, 
   //             a.tgpensiun, a.golpensiun, a.noper, a.noreken, a.anreken,
   //             b.noidsts, b.bkodeb, b.gaji, b.sankhus, b.tunjjab, b.tunjtbh, b.uplembur, b.tunjsos, b.pendpphtt, b.tottunj,
   //             c.nmdidik, c.jurusan, c.tahunlulus, c.nmsekolah,
   //             d.noidstsb, d.golkary, d.statusk, d.tgskmutasi, d.noskmutasi,
   //             e.nkdunit, e.nama AS nmunit, e.inama AS nmfungsi, e.snama AS nmsub
   //       FROM 
   //             ptnmudbpeg.gmtbiodata1 a 
               
   //       INNER JOIN 
   //             ptnmudbpegt.trans_gaji_byr b ON a.noidbio = b.noidbio
   //       LEFT JOIN 
   //             ptnmudbpegt.trans_riwayat_didik c ON a.noidbio = c.noidbio 
   //       LEFT JOIN 
   //             ptnmudbpegt.trans_riwayat_mutasi d ON a.noidbio = d.noidbio
   //       LEFT JOIN 
   //             ptnmudbadm.viewunit0 e ON b.bkodeb = e.nkdunit 
   //       WHERE 
   //             b.tggaji >= '2023-01-01' 
   //       ORDER BY 
   //             b.noidsts, b.bkodeb, a.noidbio, b.tggaji;
   //    ")->result();
   // }
   // function mget_mtpeg_rst() {
   //    return $this->load->database('db_rst', TRUE)->query
   //    ("
   //       SELECT 
   //             a.noidbio, a.nik, a.namabio, a.agama, a.namabpk, a.namaibu, a.alamat_asli, a.alamat, a.alamatpph, a.tptlahir, 
   //             a.tgllahir, a.jk, a.telepon, a.goldarah, a.nonpwp, a.nobpjs, a.pegaktif, a.tgmasuk, a.tgskkary, a.noskkary, a.tglkary1, 
   //             a.tglkary2, a.tgskmut1, a.tgskmut2, a.noskmut, a.golkary, a.golgaji, a.tgkeluar, a.stspens, a.noskpens, a.tgskpens, 
   //             a.tgpensiun, a.golpensiun, a.noper, a.noreken, a.anreken,
   //             b.noidsts, b.bkodeb, b.gaji, b.sankhus, b.tunjjab, b.tunjtbh, b.uplembur, b.tunjsos, b.pendpphtt, b.tottunj,
   //             c.nmdidik, c.jurusan, c.tahunlulus, c.nmsekolah,
   //             d.noidstsb, d.golkary, d.statusk, d.tgskmutasi, d.noskmutasi,
   //             e.nkdunit, e.nama AS nmunit, e.inama AS nmfungsi, e.snama AS nmsub
   //       FROM 
   //             ptnmudbpeg.gmtbiodata1 a 
               
   //       INNER JOIN 
   //             ptnmudbpegt.trans_gaji_byr b ON a.noidbio = b.noidbio
   //       LEFT JOIN 
   //             ptnmudbpegt.trans_riwayat_didik c ON a.noidbio = c.noidbio 
   //       LEFT JOIN 
   //             ptnmudbpegt.trans_riwayat_mutasi d ON a.noidbio = d.noidbio
   //       LEFT JOIN 
   //             ptnmudbadm.viewunit0 e ON b.bkodeb = e.nkdunit 
   //       WHERE 
   //             b.tggaji >= '2023-01-01' 
   //       ORDER BY 
   //             b.noidsts, b.bkodeb, a.noidbio, b.tggaji;
   //    ")->result();
   // }
   // function mget_mtpeg_rsmu() {
   //    return $this->load->database('db_rsmu', TRUE)->query
   //    ("
   //       SELECT 
   //             a.noidbio, a.nik, a.namabio, a.agama, a.namabpk, a.namaibu, a.alamat_asli, a.alamat, a.alamatpph, a.tptlahir, 
   //             a.tgllahir, a.jk, a.telepon, a.goldarah, a.nonpwp, a.nobpjs, a.pegaktif, a.tgmasuk, a.tgskkary, a.noskkary, a.tglkary1, 
   //             a.tglkary2, a.tgskmut1, a.tgskmut2, a.noskmut, a.golkary, a.golgaji, a.tgkeluar, a.stspens, a.noskpens, a.tgskpens, 
   //             a.tgpensiun, a.golpensiun, a.noper, a.noreken, a.anreken,
   //             b.noidsts, b.bkodeb, b.gaji, b.sankhus, b.tunjjab, b.tunjtbh, b.uplembur, b.tunjsos, b.pendpphtt, b.tottunj,
   //             c.nmdidik, c.jurusan, c.tahunlulus, c.nmsekolah,
   //             d.noidstsb, d.golkary, d.statusk, d.tgskmutasi, d.noskmutasi,
   //             e.nkdunit, e.nama AS nmunit, e.inama AS nmfungsi, e.snama AS nmsub
   //       FROM 
   //             ptnmudbpeg.gmtbiodata1 a 
               
   //       INNER JOIN 
   //             ptnmudbpegt.trans_gaji_byr b ON a.noidbio = b.noidbio
   //       LEFT JOIN 
   //             ptnmudbpegt.trans_riwayat_didik c ON a.noidbio = c.noidbio 
   //       LEFT JOIN 
   //             ptnmudbpegt.trans_riwayat_mutasi d ON a.noidbio = d.noidbio
   //       LEFT JOIN 
   //             ptnmudbadm.viewunit0 e ON b.bkodeb = e.nkdunit 
   //       WHERE 
   //             b.tggaji >= '2023-01-01' 
   //       ORDER BY 
   //             b.noidsts, b.bkodeb, a.noidbio, b.tggaji;
   //    ")->result();
   // }
   // function mget_mtpeg_urj() {
   //    return $this->load->database('db_urj', TRUE)->query
   //    ("
   //       SELECT 
   //             a.noidbio, a.nik, a.namabio, a.agama, a.namabpk, a.namaibu, a.alamat_asli, a.alamat, a.alamatpph, a.tptlahir, 
   //             a.tgllahir, a.jk, a.telepon, a.goldarah, a.nonpwp, a.nobpjs, a.pegaktif, a.tgmasuk, a.tgskkary, a.noskkary, a.tglkary1, 
   //             a.tglkary2, a.tgskmut1, a.tgskmut2, a.noskmut, a.golkary, a.golgaji, a.tgkeluar, a.stspens, a.noskpens, a.tgskpens, 
   //             a.tgpensiun, a.golpensiun, a.noper, a.noreken, a.anreken,
   //             b.noidsts, b.bkodeb, b.gaji, b.sankhus, b.tunjjab, b.tunjtbh, b.uplembur, b.tunjsos, b.pendpphtt, b.tottunj,
   //             c.nmdidik, c.jurusan, c.tahunlulus, c.nmsekolah,
   //             d.noidstsb, d.golkary, d.statusk, d.tgskmutasi, d.noskmutasi,
   //             e.nkdunit, e.nama AS nmunit, e.inama AS nmfungsi, e.snama AS nmsub
   //       FROM 
   //             ptnmudbpeg.gmtbiodata1 a 
               
   //       INNER JOIN 
   //             ptnmudbpegt.trans_gaji_byr b ON a.noidbio = b.noidbio
   //       LEFT JOIN 
   //             ptnmudbpegt.trans_riwayat_didik c ON a.noidbio = c.noidbio 
   //       LEFT JOIN 
   //             ptnmudbpegt.trans_riwayat_mutasi d ON a.noidbio = d.noidbio
   //       LEFT JOIN 
   //             ptnmudbadm.viewunit0 e ON b.bkodeb = e.nkdunit 
   //       WHERE 
   //             b.tggaji >= '2023-01-01' 
   //       ORDER BY 
   //             b.noidsts, b.bkodeb, a.noidbio, b.tggaji;
   //    ")->result();
   // }
   //END OF PARTIAL GET DATA MASTER PEKERJA FROM ALL RS

   //INSERT ALL DATA MASTER PEKERJA
   function minsert_mtpeg($simpan) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->insert('hcis_mtpeg', $simpan);
   }

   //INSERT LOG GET DATA MASTER PEKERJA
   function minsert_import_mtpeg($simpan2) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->insert('hcis_import_mtpeg', $simpan2);
   }
   
   //SHOW DATA POPULASI
   function mshow_all_populasi($unit, $filter, $bulan, $tahun) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('id, unit, tggaji');
      if($unit != "KONSOLIDASI"){
         if($filter == "jk"){
         $this->db->select('jk as kategori, COUNT(DISTINCT namabio) as jumlah');
         $this->db->from('hcis_mtpeg');
         $this->db->where('MONTH(tggaji)', $bulan);
         $this->db->where('YEAR(tggaji)', $tahun);
         $this->db->group_by('unit');
         $this->db->group_by($filter);
         }else if($filter == "agama"){
            $this->db->select('agama as kategori, COUNT(DISTINCT namabio) as jumlah');
            $this->db->from('hcis_mtpeg');
            $this->db->where('MONTH(tggaji)', $bulan);
            $this->db->where('YEAR(tggaji)', $tahun);
            $this->db->group_by('unit');
            $this->db->group_by($filter);
         }else if($filter == "golkary"){
            $this->db->select('golkary as kategori, COUNT(DISTINCT namabio) as jumlah');
            $this->db->from('hcis_mtpeg');
            $this->db->where('MONTH(tggaji)', $bulan);
            $this->db->where('YEAR(tggaji)', $tahun);
            $this->db->group_by('unit');
            $this->db->group_by($filter);
         }else if($filter == "nmfungsi"){
            $this->db->select('nmfungsi as kategori, COUNT(DISTINCT namabio) as jumlah');
            $this->db->from('hcis_mtpeg');
            $this->db->where('MONTH(tggaji)', $bulan);
            $this->db->where('YEAR(tggaji)', $tahun);
            $this->db->group_by('unit');
            $this->db->group_by($filter);
         }else if($filter == "nmsub"){
            $this->db->select('nmsub as kategori, COUNT(DISTINCT namabio) as jumlah');
            $this->db->from('hcis_mtpeg');
            $this->db->where('MONTH(tggaji)', $bulan);
            $this->db->where('YEAR(tggaji)', $tahun);
            $this->db->group_by('unit');
            $this->db->group_by($filter);
         }else if($filter == "nmdidik"){
            $this->db->select('nmdidik as kategori, COUNT(DISTINCT namabio) as jumlah');
            $this->db->from('hcis_mtpeg');
            $this->db->where('MONTH(tggaji)', $bulan);
            $this->db->where('YEAR(tggaji)', $tahun);
            $this->db->group_by('unit');
            $this->db->group_by($filter);
         }
         $this->db->where('unit', $unit);
      }else{
         if($filter == "jk"){
            $this->db->select('jk as kategori, COUNT(DISTINCT namabio) as jumlah');
            $this->db->from('hcis_mtpeg');
            $this->db->where('MONTH(tggaji)', $bulan);
            $this->db->where('YEAR(tggaji)', $tahun);
            $this->db->group_by($filter);
         }else if($filter == "agama"){
            $this->db->select('agama as kategori, COUNT(DISTINCT namabio) as jumlah');
            $this->db->from('hcis_mtpeg');
            $this->db->where('MONTH(tggaji)', $bulan);
            $this->db->where('YEAR(tggaji)', $tahun);
            $this->db->group_by($filter);
         }else if($filter == "golkary"){
            $this->db->select('golkary as kategori, COUNT(DISTINCT namabio) as jumlah');
            $this->db->from('hcis_mtpeg');
            $this->db->where('MONTH(tggaji)', $bulan);
            $this->db->where('YEAR(tggaji)', $tahun);
            $this->db->group_by($filter);
         }else if($filter == "nmfungsi"){
            $this->db->select('nmfungsi as kategori, COUNT(DISTINCT namabio) as jumlah');
            $this->db->from('hcis_mtpeg');
            $this->db->where('MONTH(tggaji)', $bulan);
            $this->db->where('YEAR(tggaji)', $tahun);
            $this->db->group_by($filter);
         }else if($filter == "nmsub"){
            $this->db->select('nmsub as kategori, COUNT(DISTINCT namabio) as jumlah');
            $this->db->from('hcis_mtpeg');
            $this->db->where('MONTH(tggaji)', $bulan);
            $this->db->where('YEAR(tggaji)', $tahun);
            $this->db->group_by($filter);
         }else if($filter == "nmdidik"){
            $this->db->select('nmdidik as kategori, COUNT(DISTINCT namabio) as jumlah');
            $this->db->from('hcis_mtpeg');
            $this->db->where('MONTH(tggaji)', $bulan);
            $this->db->where('YEAR(tggaji)', $tahun);
            $this->db->group_by($filter);
         }
      }
      return $this->db->get()->result();
   }

   //EXPORT DETAIL TO EXCEL
   function mshow_detil_populasi($unit, $bulan, $tahun) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('id, unit, nik, namabio, agama, alamat_asli, alamat, golkary, alamatpph, tptlahir, tgllahir, jk, nmdidik, jurusan, tahunlulus, nmsekolah, nmunit, nmfungsi, nmsub');
      $this->db->from('hcis_mtpeg');
      $this->db->where('MONTH(tggaji)', $bulan);
      $this->db->where('YEAR(tggaji)', $tahun);
      if($unit != "KONSOLIDASI"){
         $this->db->where('unit', $unit);
      }
      $this->db->order_by('namabio', 'asc');
      return $this->db->get()->result();
   }

   //Insert Log Login
   function insert_log($log) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->insert('log_aktifitas', $log);
   }
   
}
?>
