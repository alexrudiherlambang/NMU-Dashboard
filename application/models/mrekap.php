<?php

class mrekap extends ci_model {

   public function __construct() {
      parent::__construct();
   }

   // untuk menampilkan semua rekap
   function mshow_all_call($tglawal,$tglakhir,$nama,$lokasi) {
      $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1('$tglawal', '$tglakhir', '$nama', '$lokasi')");
      $this->db->select('*');
      $this->db->from('test.ra_dashdb1_'.$nama);
      return $this->db->get()->result();
   }
   
   // untuk menampilkan Jenis
   function mshow_all_jenis($nama) {
      $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1('" . date('Y-m-d') . "', '" . (new DateTime('-7 days'))->format('Y-m-d') . "', '$nama', '')");
      $this->db->select('ket');
      $this->db->from('test.ra_dashdb1_'.$nama);
      $this->db->where('flag', '0');
      return $this->db->get()->result();
   }
   
   // untuk menampilkan grafik
   function mshow_all_grafik($tglawal,$tglakhir,$lokasi,$jenis,$nama) {
      if ($lokasi == ''){
         //line kp
         $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1('$tglawal', '$tglakhir', '$nama', '$lokasi')");
         $this->db->select('tanggal,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_'.$nama);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->where('ket', $jenis);
         $this->db->group_by('tanggal');
         return $this->db->get();
      }else{
         //line unit
         $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1('$tglawal', '$tglakhir', '$nama', '$lokasi')");
         $this->db->select('tanggal,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_'.$nama);
         $this->db->where('lokasi', $lokasi);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->where('ket', $jenis);
         $this->db->group_by('tanggal');
         return $this->db->get();
      }
   }

   // untuk menampilkan pie
   function mshow_all_grafik_kp($tglawal,$tglakhir,$lokasi,$jenis,$nama) {
      if ($lokasi == ''){
         //pie kp
         $this->db->select('lokasi,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_'.$nama);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->where('ket', $jenis);
         $this->db->group_by('lokasi');
         return $this->db->get();
      }else{
         //pie unit
         $this->db->select('lokasi,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_'.$nama);
         $this->db->where('lokasi', $lokasi);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->where('ket', $jenis);
         $this->db->group_by('lokasi');
         return $this->db->get();
      }
   }

   // untuk menampilkan pie all jenis
   function mshow_all_pie_all_jenis($tglawal,$tglakhir,$lokasi,$jenis,$nama) {
      if ($lokasi == ''){
         //pie jenis kp
         $this->db->select('ket,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_'.$nama);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->group_by('ket');
         return $this->db->get();
      }else{
         //pie jenis unit
         $this->db->select('ket,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_'.$nama);
         $this->db->where('lokasi', $lokasi);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->group_by('ket');
         return $this->db->get();
      }
   }

    // untuk menampilkan grafik all jenis
    function mshow_all_grafik_all_jenis($tglawal,$tglakhir,$lokasi,$jenis,$nama) {
      if ($lokasi == ''){
         //line jenis kp
         $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1('$tglawal', '$tglakhir', '$nama', '$lokasi')");
         $this->db->select('ket,tanggal,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_'.$nama);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->group_by('ket');
         $this->db->group_by('tanggal');
         return $this->db->get();
      }else{
         //line jenis unit
         $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1('$tglawal', '$tglakhir', '$nama', '$lokasi')");
         $this->db->select('ket,tanggal,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_'.$nama);
         $this->db->where('lokasi', $lokasi);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->group_by('ket');
         $this->db->group_by('tanggal');
         return $this->db->get();
      }
   }

   // untuk cetak excel
   function mshow_all_detail($nama, $ket, $tglawal, $tglakhir) {
         $this->db->select('lokasi,tanggal,ket,rsaldolalu,rsaldosaatini,rsaldosampai,rsaldopotensi1,jmltarget,statuse');
         $this->db->from('test.ra_dashdb_'.$nama);
         $this->db->where('ket', $ket);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->group_by('lokasi');
         $this->db->group_by('tanggal');
         return $this->db->get()->result();
   }

   //Insert Log Login
   function insert_log($log) {
      $this->db->insert('log_aktifitas', $log);
   }
}
?>
