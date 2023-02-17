<?php

class mdetail_revenue extends ci_model {

   public function __construct() {
      parent::__construct();
   }

   // untuk menampilkan semua rekap
   function mshow_all_call($tglawal,$tglakhir,$nama,$lokasi) {
      $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1('$tglawal', '$tglakhir', '$nama', '$lokasi')");
      $this->db->select('*');
      $this->db->from('test.ra_dashdb2_'.$nama);
      return $this->db->get()->result();
   }
   
   // untuk menampilkan Jenis
   function mshow_all_jenis($nama) {
      $this->db->select('ket');
      $this->db->from('test.ra_dashdb2_'.$nama);
      $this->db->where('flag', '0');
      return $this->db->get()->result();
   }
   // untuk menampilkan grafik
   function mshow_all_grafik($tglawal,$tglakhir,$lokasi,$jenis,$nama) {
      if ($lokasi == ''){
         $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1('$tglawal', '$tglakhir', '$nama', '$lokasi')");
         $this->db->select('periode,lokasi,tanggal,ket,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_'.$nama);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->where('kelspesimen', $jenis);
         $this->db->group_by('tanggal');
         return $this->db->get();
      }else{
         $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1('$tglawal', '$tglakhir', '$nama', '$lokasi')");
         $this->db->select('tanggal,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_'.$nama);
         $this->db->where('lokasi', $lokasi);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->where('kelspesimen', $jenis);
         $this->db->group_by('tanggal');
         return $this->db->get();
      }
   }

   // untuk menampilkan pie  per jenis
   function mshow_all_grafik_kp($tglawal,$tglakhir,$lokasi,$jenis,$nama) {
      if ($lokasi == ''){
         $this->db->select('lokasi,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_'.$nama);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->where('kelspesimen', $jenis);
         $this->db->group_by('lokasi');
         return $this->db->get();
      }else{
         $this->db->select('lokasi,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_'.$nama);
         $this->db->where('lokasi', $lokasi);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->where('kelspesimen', $jenis);
         $this->db->group_by('lokasi');
         return $this->db->get();
      }
   }
   
   // untuk menampilkan pie all
   function mshow_all_pie_all_jenis($tglawal,$tglakhir,$lokasi,$jenis,$nama) {
      if ($lokasi == ''){
         $this->db->select('kelspesimen,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_'.$nama);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->group_by('kelspesimen');
         return $this->db->get();
      }else{
         $this->db->select('kelspesimen,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_'.$nama);
         $this->db->where('lokasi', $lokasi);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->group_by('kelspesimen');
         return $this->db->get();
      }
   }

   // untuk menampilkan grafik all jenis
   function mshow_all_grafik_all_jenis($tglawal,$tglakhir,$lokasi,$jenis,$nama) {
      if ($lokasi == ''){
         $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1('$tglawal', '$tglakhir', '$nama', '$lokasi')");
         $this->db->select('kelspesimen,tanggal,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_'.$nama);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->group_by('kelspesimen');
         $this->db->group_by('tanggal');
         return $this->db->get();
      }else{
         $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1('$tglawal', '$tglakhir', '$nama', '$lokasi')");
         $this->db->select('kelspesimen,tanggal,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_'.$nama);
         $this->db->where('lokasi', $lokasi);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->group_by('kelspesimen');
         $this->db->group_by('tanggal');
         return $this->db->get();
      }
   }
   // untuk menampilkan detail
   function mshow_all_detail($nama, $ket) {
      $this->db->select('lokasi,tanggal,kelspesimen,rsaldolalu,rsaldosaatini,rsaldosampai,rsaldopotensi1,jmltarget,statuse');
      $this->db->from('test.ra_dashdb_'.$nama);
      $this->db->where('kelspesimen', $ket);
      $this->db->group_by('lokasi');
      $this->db->group_by('tanggal');
      return $this->db->get()->result();
   }
}
?>
