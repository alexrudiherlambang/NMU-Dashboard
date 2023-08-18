<?php

class mHCIS extends ci_model {

   public function __construct() {
      parent::__construct();
   }
   //SHOW DATA LIMBAH
   function mshow_all_mtkerja() {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('id, unit, nik, namabio, agama, alamat_asli, alamat, golkary, alamatpph, tptlahir, tgllahir, jk, nmdidik, jurusan, tahunlulus, nmsekolah, nmunit, nmfungsi, nmsub');
      $this->db->from('hcis_mtpeg');
      $this->db->order_by('namabio', 'asc');
      $this->db->group_by('namabio');
      return $this->db->get()->result();
   }
   
   function mshow_all_populasi($unit, $filter, $bulan, $tahun) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('id, unit, tggaji');
      if($unit != "KONSOLIDASI"){
         if($filter == "jk"){
         $this->db->select('jk as kategori, count(namabio) as jumlah');
         $this->db->from('hcis_mtpeg');
         $this->db->where('MONTH(tggaji)', $bulan);
         $this->db->where('YEAR(tggaji)', $tahun);
         $this->db->group_by('unit');
         $this->db->group_by($filter);
         }else if($filter == "agama"){
            $this->db->select('agama as kategori, count(namabio) as jumlah');
            $this->db->from('hcis_mtpeg');
            $this->db->where('MONTH(tggaji)', $bulan);
            $this->db->where('YEAR(tggaji)', $tahun);
            $this->db->group_by('unit');
            $this->db->group_by($filter);
         }else if($filter == "golkary"){
            $this->db->select('golkary as kategori, count(namabio) as jumlah');
            $this->db->from('hcis_mtpeg');
            $this->db->where('MONTH(tggaji)', $bulan);
            $this->db->where('YEAR(tggaji)', $tahun);
            $this->db->group_by('unit');
            $this->db->group_by($filter);
         }else if($filter == "nmfungsi"){
            $this->db->select('nmfungsi as kategori, count(namabio) as jumlah');
            $this->db->from('hcis_mtpeg');
            $this->db->where('MONTH(tggaji)', $bulan);
            $this->db->where('YEAR(tggaji)', $tahun);
            $this->db->group_by('unit');
            $this->db->group_by($filter);
         }else if($filter == "nmsub"){
            $this->db->select('nmsub as kategori, count(namabio) as jumlah');
            $this->db->from('hcis_mtpeg');
            $this->db->where('MONTH(tggaji)', $bulan);
            $this->db->where('YEAR(tggaji)', $tahun);
            $this->db->group_by('unit');
            $this->db->group_by($filter);
         }else if($filter == "nmdidik"){
            $this->db->select('nmdidik as kategori, count(namabio) as jumlah');
            $this->db->from('hcis_mtpeg');
            $this->db->where('MONTH(tggaji)', $bulan);
            $this->db->where('YEAR(tggaji)', $tahun);
            $this->db->group_by('unit');
            $this->db->group_by($filter);
         }
         $this->db->where('unit', $unit);
      }else{
         if($filter == "jk"){
            $this->db->select('jk as kategori, count(namabio) as jumlah');
            $this->db->from('hcis_mtpeg');
            $this->db->where('MONTH(tggaji)', $bulan);
            $this->db->where('YEAR(tggaji)', $tahun);
            $this->db->group_by($filter);
         }else if($filter == "agama"){
            $this->db->select('agama as kategori, count(namabio) as jumlah');
            $this->db->from('hcis_mtpeg');
            $this->db->where('MONTH(tggaji)', $bulan);
            $this->db->where('YEAR(tggaji)', $tahun);
            $this->db->group_by($filter);
         }else if($filter == "golkary"){
            $this->db->select('golkary as kategori, count(namabio) as jumlah');
            $this->db->from('hcis_mtpeg');
            $this->db->where('MONTH(tggaji)', $bulan);
            $this->db->where('YEAR(tggaji)', $tahun);
            $this->db->group_by($filter);
         }else if($filter == "nmfungsi"){
            $this->db->select('nmfungsi as kategori, count(namabio) as jumlah');
            $this->db->from('hcis_mtpeg');
            $this->db->where('MONTH(tggaji)', $bulan);
            $this->db->where('YEAR(tggaji)', $tahun);
            $this->db->group_by($filter);
         }else if($filter == "nmsub"){
            $this->db->select('nmsub as kategori, count(namabio) as jumlah');
            $this->db->from('hcis_mtpeg');
            $this->db->where('MONTH(tggaji)', $bulan);
            $this->db->where('YEAR(tggaji)', $tahun);
            $this->db->group_by($filter);
         }else if($filter == "nmdidik"){
            $this->db->select('nmdidik as kategori, count(namabio) as jumlah');
            $this->db->from('hcis_mtpeg');
            $this->db->where('MONTH(tggaji)', $bulan);
            $this->db->where('YEAR(tggaji)', $tahun);
            $this->db->group_by($filter);
         }
      }
      return $this->db->get()->result();
   }

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
   
}
?>
