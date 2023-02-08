<?php

class mrekap extends ci_model {

   public function __construct() {
      parent::__construct();
   }

    // untuk menampilkan semua rekap
    function mshow_all_rekap($tglawal,$tglakhir,$nama) {
      return $this->db->query("CALL `dashboardnmu_new`.`proses_dashboard_ke1`('".$tglawal."','".$tglawal."','".$nama."');")->result();
   }

   // SELECT BERDASARKAN ID USER
   function mselect_by_iduser($id) {
      $this->db->select('*');
      $this->db->from('admin');
      $this->db->where('id', $id);
      return $this->db->get()->row();
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
