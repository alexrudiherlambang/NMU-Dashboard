<?php

class mkunjungan_persegmen extends ci_model {

   public function __construct() {
      parent::__construct();
   }

   // untuk menampilkan semua rekap
   function mshow_all_call($tglawal,$tglakhir,$nama,$lokasi) {
      $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1_k('$tglawal', '$tglakhir', '$nama', '$lokasi','kelsegmen')");
      $this->db->select('ket, rsaldolalu, rsaldosaatini, rsaldosampai, rsaldopotensi, jmltarget, jmlprosen');
      $this->db->from('test.ra_dashdb1_k_'.$nama);
      // $this->db->group_by('ket');
      return $this->db->get()->result();
   }
   
   // untuk menampilkan Jenis
   function mshow_all_jenis($nama) {
      $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1_k('" . date('Y-m-d') . "', '" . (new DateTime('-7 days'))->format('Y-m-d') . "', '$nama', '', 'kelsegmen')");
      $this->db->select('kelsegmen');
      $this->db->from('test.ra_dashdb_k_'.$nama);
      $this->db->group_by('kelsegmen');
      return $this->db->get()->result();
   }

   // untuk menampilkan grafik
   function mshow_all_grafik($tglawal,$tglakhir,$lokasi,$jenis,$nama) {
      if ($lokasi == ''){
         //line kp
         $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1_k('$tglawal', '$tglakhir', '$nama', '$lokasi','kelsegmen')");
         $this->db->select('tanggal,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_k_'.$nama);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->where('kelsegmen', $jenis);
         $this->db->group_by('tanggal');
         return $this->db->get();
      }else{
         //line unit
         $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1_k('$tglawal', '$tglakhir', '$nama', '$lokasi','kelsegmen')");
         $this->db->select('tanggal,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_k_'.$nama);
         $this->db->where('lokasi', $lokasi);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->where('kelsegmen', $jenis);
         $this->db->group_by('tanggal');
         return $this->db->get();
      }
   }

   // untuk menampilkan pie
   function mshow_all_grafik_kp($tglawal,$tglakhir,$lokasi,$jenis,$nama) {
      if ($lokasi == ''){
         //pie kp
         $this->db->select('lokasi,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_k_'.$nama);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->where('kelsegmen', $jenis);
         $this->db->group_by('lokasi');
         return $this->db->get();
      }else{
         //pie unit
         $this->db->select('lokasi,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_k_'.$nama);
         $this->db->where('lokasi', $lokasi);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->where('kelsegmen', $jenis);
         $this->db->group_by('lokasi');
         return $this->db->get();
      }
   }

   // untuk menampilkan pie all jenis
   function mshow_all_pie_all_jenis($tglawal,$tglakhir,$lokasi,$jenis,$nama) {
      if ($lokasi == ''){
         //pie jenis kp
         $this->db->select('kelsegmen,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_k_'.$nama);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->group_by('kelsegmen');
         return $this->db->get();
      }else{
         //pie jenis unit
         $this->db->select('kelsegmen,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_k_'.$nama);
         $this->db->where('lokasi', $lokasi);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->group_by('kelsegmen');
         return $this->db->get();
      }
   }

    // untuk menampilkan grafik all jenis
    function mshow_all_grafik_all_jenis($tglawal,$tglakhir,$lokasi,$jenis,$nama) {
      if ($lokasi == ''){
         //line jenis kp
         $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1_k('$tglawal', '$tglakhir', '$nama', '$lokasi','kelsegmen')");
         $this->db->select('kelsegmen,tanggal,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_k_'.$nama);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->group_by('kelsegmen');
         $this->db->group_by('tanggal');
         return $this->db->get();
      }else{
         //line jenis unit
         $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1_k('$tglawal', '$tglakhir', '$nama', '$lokasi','kelsegmen')");
         $this->db->select('kelsegmen,tanggal,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_k_'.$nama);
         $this->db->where('lokasi', $lokasi);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->group_by('kelsegmen');
         $this->db->group_by('tanggal');
         return $this->db->get();
      }
   }

   // untuk cetak excel
   function mshow_all_detail($nama, $ket, $tglawal, $tglakhir) {
         $this->db->select('lokasi, tanggal, kelspesimen, kelsegmen, kelsegmen_sub, ket, kelunit, kelompok, sum(rsaldolalu) as rsaldolalu, sum(rsaldosaatini) as rsaldosaatini, sum(rsaldosampai) as rsaldosampai, sum(rsaldopotensi1) as rsaldopotensi1, sum(jmltarget) as jmltarget, statuse');
         $this->db->from('test.ra_dashdb_k_'.$nama);
         $this->db->where('kelsegmen', $ket);
         // $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir); 
         $this->db->group_by('lokasi');
         // $this->db->group_by('tanggal');
         $this->db->group_by('kelspesimen');
         $this->db->group_by('kelsegmen');
         $this->db->group_by('kelsegmen_sub');
         $this->db->group_by('ket');
         $this->db->group_by('kelunit');
         return $this->db->get()->result();
   }

   //Insert Log Login
   function insert_log($log) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->insert('log_aktifitas', $log);
   }
}
?>
