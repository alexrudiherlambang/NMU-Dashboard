<?php

class msegmen extends ci_model {

   public function __construct() {
      parent::__construct();
   }

   // untuk menampilkan semua rekap
   function mshow_all_call($tglawal,$tglakhir,$nama,$lokasi) {
      $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1_s('$tglawal', '$tglakhir', '$nama', '$lokasi')");
      $this->db->select('*');
      $this->db->from('test.ra_dashdb1_s_'.$nama);
      return $this->db->get()->result();
   }

   // untuk menampilkan Jenis
   function mshow_all_jenis($nama) {
      $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1_s('" . date('Y-m-d') . "', '" . (new DateTime('-7 days'))->format('Y-m-d') . "', '$nama', '')");
      $this->db->select('ket');
      $this->db->from('test.ra_dashdb1_s_'.$nama);
      $this->db->where('flag', '0');
      return $this->db->get()->result();
   }

   // untuk cetak excel
   function mshow_all_detail($nama, $kelsegmen, $tglawal, $tglakhir) {
      $this->db->select('lokasi,tanggal,kelsegmen,rsaldolalu,rsaldosaatini,rsaldosampai,rsaldopotensi1,jmltarget,statuse');
      $this->db->from('test.ra_dashdb_s_'.$nama);
      $this->db->where('kelsegmen', $kelsegmen);
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
