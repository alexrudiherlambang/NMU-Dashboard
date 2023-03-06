<?php

class mhome extends ci_model {

   public function __construct() {
      parent::__construct();
   }
   // untuk menampilkan grafik
   function mshow_all_grafik_pendapatan($lokasi,$nama) {
      $tglawal = date('Y') . '-01-01'; // tanggal 1 Januari tahun ini
      $tglakhir = date('Y-m-d'); // tanggal hari ini
      if ($lokasi == ''){
         //line kp
         $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1('$tglawal', '$tglakhir', '$nama', '$lokasi')");
         $this->db->select('tanggal,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_'.$nama);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
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
         $this->db->group_by('tanggal');
         return $this->db->get();
      }
   }
   
   function mshow_all_grafik_labarugi($lokasi,$nama) {
      $tglawal = date('Y') . '-01-01'; // tanggal 1 Januari tahun ini
      $tglakhir = date('Y-m-d'); // tanggal hari ini
      if ($lokasi == ''){
         //line kp
         $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke3('$tglawal', '$tglakhir', '$nama', '$lokasi')");
         $this->db->select('tanggal,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_'.$nama);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->group_by('tanggal');
         return $this->db->get();
      }else{
         //line unit
         $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke3('$tglawal', '$tglakhir', '$nama', '$lokasi')");
         $this->db->select('tanggal,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_'.$nama);
         $this->db->where('lokasi', $lokasi);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->group_by('tanggal');
         return $this->db->get();
      }
   }

   function mshow_all_grafik_biaya($lokasi,$nama) {
      $tglawal = date('Y') . '-01-01'; // tanggal 1 Januari tahun ini
      $tglakhir = date('Y-m-d'); // tanggal hari ini
      if ($lokasi == ''){
         //line kp
         $this->db->query("CALL dashboardnmu_new.proses_dashboard_byy('$tglawal', '$tglakhir', '$nama', '$lokasi')");
         $this->db->select('tanggal,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_'.$nama);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->group_by('tanggal');
         return $this->db->get();
      }else{
         //line unit
         $this->db->query("CALL dashboardnmu_new.proses_dashboard_byy('$tglawal', '$tglakhir', '$nama', '$lokasi')");
         $this->db->select('tanggal,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_'.$nama);
         $this->db->where('lokasi', $lokasi);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->group_by('tanggal');
         return $this->db->get();
      }
   }

   function mshow_all_grafik_kunjungan($lokasi,$nama) {
      $tglawal = date('Y') . '-01-01'; // tanggal 1 Januari tahun ini
      $tglakhir = date('Y-m-d'); // tanggal hari ini
      if ($lokasi == ''){
         //line kp
         $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1_k('$tglawal', '$tglakhir', '$nama', '$lokasi','ket')");
         $this->db->select('tanggal,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_k_'.$nama);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->group_by('tanggal');
         return $this->db->get();
      }else{
         //line unit
         $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1_k('$tglawal', '$tglakhir', '$nama', '$lokasi','ket')");
         $this->db->select('tanggal,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_k_'.$nama);
         $this->db->where('lokasi', $lokasi);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->group_by('tanggal');
         return $this->db->get();
      }
   }
}
?>
