<?php

class mkunjungan_BPJS extends ci_model {

   public function __construct() {
      parent::__construct();
   }

   // untuk menampilkan semua rekap
   function mshow_all_call($tglawal,$tglakhir,$nama,$lokasi) {
      $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1_k('$tglawal', '$tglakhir', '$nama', '$lokasi')");
      $this->db->select('ket, sum(rsaldolalu) as rsaldolalu, sum(rsaldosaatini) as rsaldosaatini, sum(rsaldosampai) as rsaldosampai, sum(rsaldopotensi1) as rsaldopotensi1, sum(jmltarget) as jmltarget');
      $this->db->from('test.ra_dashdb_k_'.$nama);
      $this->db->group_by('ket');
      $this->db->where_in('ket', array('BPJS', 'NON BPJS'));
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

   // untuk cetak excel
   function mshow_all_detail($nama, $ket, $tglawal, $tglakhir) {
         $this->db->select('lokasi, tanggal, kelspesimen, kelsegmen, kelompok, ket, sum(rsaldolalu) as rsaldolalu, sum(rsaldosaatini) as rsaldosaatini, sum(rsaldosampai) as rsaldosampai, sum(rsaldopotensi1) as rsaldopotensi1, sum(jmltarget) as jmltarget, statuse');
         $this->db->from('test.ra_dashdb_k_'.$nama);
         $this->db->where('ket', $ket);
         // $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->where_in('ket', array('BPJS', 'NON BPJS'));
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
