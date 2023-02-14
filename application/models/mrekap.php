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
      $this->db->select('ket');
      $this->db->from('test.ra_dashdb1_'.$nama);
      $this->db->where('flag', '0');
      return $this->db->get()->result();
   }
   // untuk menampilkan semua rekap
   function mshow_all_rekap2($tglawal,$tglakhir,$nama,$lokasi) {
      return $this->db->query("CALL `dashboardnmu_new`.`proses_dashboard_ke4`('".$tglawal."','".$tglawal."','".$nama."','".$lokasi."');")->result();
   }
}
?>
