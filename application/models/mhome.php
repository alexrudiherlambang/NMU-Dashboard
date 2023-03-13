<?php

class mhome extends ci_model {

   public function __construct() {
      parent::__construct();
   }
   // untuk menampilkan grafik
   function mshow_all_grafik_pendapatan($lokasi,$nama) {
      $tglawal = date('Y') . '-01-01'; // tanggal 1 Januari tahun ini
      // $tglawal = date('Y-m-d', strtotime('-7 days')); // tanggal 7 hari yang lalu
      $tglakhir = date('Y-m-d'); // tanggal hari ini
      // if ($lokasi == ''){
      //    //line kp
      //    $this->db->query("CALL dashboardnmu_new.proses_rekap_dapatdash('$tglawal', '$tglakhir', '$nama', '$lokasi')");
      //    // $this->db->select('tanggal,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
      //    $this->db->select('ket, k_p1, rsg1, rst1, rsp1, rsmu1, urj1, total');
      //    $this->db->from('test.ra_dash_db3_'.$nama);
      //    return $this->db->get();
      // }else{
      //    //line unit
      //    $this->db->query("CALL dashboardnmu_new.proses_rekap_dapatdash('$tglawal', '$tglakhir', '$nama', '$lokasi')");
      //    // $this->db->select('tanggal,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
      //    $this->db->select('ket, k_p1, rsg1, rst1, rsp1, rsmu1, urj1, total');
      //    $this->db->from('test.ra_dash_db3_'.$nama);
      //    return $this->db->get();
      // }
      if ($lokasi == ''){
         //line kp
         $this->db->query("CALL dashboardnmu_new.proses_rekap_dapatdash('$tglawal', '$tglakhir', '$nama', '$lokasi')");
         $this->db->select('lokasi,SUM(rsaldosampai) as total_rsaldosampai,SUM(saldotarget) as total_jmltarget, SUM(rsaldopotensi1) as total_rsaldopotensi1');
         $this->db->from('test.ra_dash_db0_'.$nama);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->group_by('lokasi');
         return $this->db->get();
      }else{
         //line unit
         $this->db->query("CALL dashboardnmu_new.proses_rekap_dapatdash('$tglawal', '$tglakhir', '$nama', '$lokasi')");
         $this->db->select('lokasi,SUM(rsaldosampai) as total_rsaldosampai,SUM(saldotarget) as total_jmltarget, SUM(rsaldopotensi1) as total_rsaldopotensi1');
         $this->db->from('test.ra_dash_db0_'.$nama);
         $this->db->where('lokasi', $lokasi);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->group_by('lokasi');
         return $this->db->get();
      }
   }
   
   function mshow_all_grafik_labarugi($lokasi,$nama) {
      $tglawal = date('Y') . '-01-01'; // tanggal 1 Januari tahun ini
      // $tglawal = date('Y-m-d', strtotime('-7 days')); // tanggal 7 hari yang lalu
      $tglakhir = date('Y-m-d'); // tanggal hari ini
      // if ($lokasi == ''){
      //    //line kp
      //    $this->db->query("CALL dashboardnmu_new.proses_rekap_labadash('$tglawal', '$tglakhir', '$nama', '$lokasi')");
      //    // $this->db->select('tanggal,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
      //    $this->db->select('ket, k_p1, rsg1, rst1, rsp1, rsmu1, urj1, total');
      //    $this->db->from('test.ra_dash_db_lr3_'.$nama);
      //    return $this->db->get();
      // }else{
      //    //line unit
      //    $this->db->query("CALL dashboardnmu_new.proses_rekap_labadash('$tglawal', '$tglakhir', '$nama', '$lokasi')");
      //    // $this->db->select('tanggal,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
      //    $this->db->select('ket, k_p1, rsg1, rst1, rsp1, rsmu1, urj1, total');
      //    $this->db->from('test.ra_dash_db_lr3_'.$nama);
      //    return $this->db->get();
      // }
      if ($lokasi == ''){
         //line kp
         $this->db->query("CALL dashboardnmu_new.proses_rekap_labadash('$tglawal', '$tglakhir', '$nama', '$lokasi')");
         $this->db->select('lokasi,SUM(rsaldosampai) as total_rsaldosampai,SUM(saldotarget) as total_jmltarget, SUM(rsaldopotensi1) as total_rsaldopotensi1');
         $this->db->from('test.ra_dash_db_lr0_'.$nama);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->group_by('lokasi');
         return $this->db->get();
      }else{
         //line unit
         $this->db->query("CALL dashboardnmu_new.proses_rekap_labadash('$tglawal', '$tglakhir', '$nama', '$lokasi')");
         $this->db->select('lokasi,SUM(rsaldosampai) as total_rsaldosampai,SUM(saldotarget) as total_jmltarget, SUM(rsaldopotensi1) as total_rsaldopotensi1');
         $this->db->from('test.ra_dash_db_lr0_'.$nama);
         $this->db->where('lokasi', $lokasi);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->group_by('lokasi');
         return $this->db->get();
      }
   }

   function mshow_all_grafik_biaya($lokasi,$nama) {
      $tglawal = date('Y') . '-01-01'; // tanggal 1 Januari tahun ini
      // $tglawal = date('Y-m-d', strtotime('-7 days')); // tanggal 7 hari yang lalu
      $tglakhir = date('Y-m-d'); // tanggal hari ini
      // if ($lokasi == ''){
      //    //line kp
      //    $this->db->query("CALL dashboardnmu_new.proses_rekap_bebandash('$tglawal', '$tglakhir', '$nama', '$lokasi')");
      //    // $this->db->select('tanggal,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
      //    $this->db->select('ket, k_p1, rsg1, rst1, rsp1, rsmu1, urj1, total');
      //    $this->db->from('test.ra_dash_db_b3_'.$nama);
      //    return $this->db->get();
      // }else{
      //    //line unit
      //    $this->db->query("CALL dashboardnmu_new.proses_rekap_bebandash('$tglawal', '$tglakhir', '$nama', '$lokasi')");
      //    // $this->db->select('tanggal,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
      //    $this->db->select('ket, k_p1, rsg1, rst1, rsp1, rsmu1, urj1, total');
      //    $this->db->from('test.ra_dash_db_b3_'.$nama);
      //    return $this->db->get();
      // }
      if ($lokasi == ''){
         //line kp
         $this->db->query("CALL dashboardnmu_new.proses_rekap_bebandash('$tglawal', '$tglakhir', '$nama', '$lokasi')");
         $this->db->select('lokasi,SUM(rsaldosampai) as total_rsaldosampai,SUM(saldotarget) as total_jmltarget, SUM(rsaldopotensi1) as total_rsaldopotensi1');
         $this->db->from('test.ra_dash_db_b0_'.$nama);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->group_by('lokasi');
         return $this->db->get();
      }else{
         //line unit
         $this->db->query("CALL dashboardnmu_new.proses_rekap_bebandash('$tglawal', '$tglakhir', '$nama', '$lokasi')");
         $this->db->select('lokasi,SUM(rsaldosampai) as total_rsaldosampai,SUM(saldotarget) as total_jmltarget, SUM(rsaldopotensi1) as total_rsaldopotensi1');
         $this->db->from('test.ra_dash_db_b0_'.$nama);
         $this->db->where('lokasi', $lokasi);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->group_by('lokasi');
         return $this->db->get();
      }
   }

   function mshow_all_grafik_kunjungan($lokasi,$nama) {
      $tglawal = date('Y') . '-01-01'; // tanggal 1 Januari tahun ini
      // $tglawal = date('Y-m-d', strtotime('-7 days')); // tanggal 7 hari yang lalu
      $tglakhir = date('Y-m-d'); // tanggal hari ini
      if ($lokasi == ''){
         //line kp
         $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1_k('$tglawal', '$tglakhir', '$nama', '$lokasi','ket')");
         $this->db->select('lokasi,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget, SUM(rsaldopotensi1) as total_rsaldopotensi1');
         $this->db->from('test.ra_dashdb_k_'.$nama);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->group_by('lokasi');
         return $this->db->get();
      }else{
         //line unit
         $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1_k('$tglawal', '$tglakhir', '$nama', '$lokasi','ket')");
         $this->db->select('lokasi,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget, SUM(rsaldopotensi1) as total_rsaldopotensi1');
         $this->db->from('test.ra_dashdb_k_'.$nama);
         $this->db->where('lokasi', $lokasi);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->group_by('lokasi');
         return $this->db->get();
      }
   }
}
?>
