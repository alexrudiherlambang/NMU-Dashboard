<?php

class mlaba_rugi extends ci_model {

   public function __construct() {
      parent::__construct();
   }

   // untuk menampilkan semua rekap
   function mshow_all_laba_rugi($tglawal,$tglakhir,$nama,$lokasi) {
      return $this->db->query("CALL `dashboardnmu_new`.`proses_dashboard_ke1`('".$tglawal."','".$tglawal."','".$nama."','".$lokasi."');")->result();
   }

   // untuk menampilkan semua rekap
   function mshow_all_rekap2($tglawal,$tglakhir,$nama,$lokasi) {
      return $this->db->query("CALL `dashboardnmu_new`.`proses_dashboard_ke4`('".$tglawal."','".$tglawal."','".$nama."','".$lokasi."');")->result();
   }

   //INSERT DATA USER
   function minsert_user($data) {
      $this->db->insert('user', $data);
   }

   //UPDATE BERDASARKAN ID
   function mupdate_user($dataUpdate, $id) {
      $this->db->where('id', $id);
      $this->db->update('admin', $dataUpdate);
   }

   //DELETE
   function mdelete_user($id_user) {
      $this->db->where('id_user', $id_user);
      $this->db->delete('user');
   }
}
?>
