<?php

class muser extends ci_model {

   public function __construct() {
      parent::__construct();
   }

    // untuk menampilkan semua user
    function mshow_all_user() {
      $this->db->select('*');
      $this->db->from('user');
      $this->db->order_by('id', 'asc');
      return $this->db->get()->result();
   }

   // SELECT BERDASARKAN ID USER
   function mselect_by_iduser($id) {
      $this->db->select('*');
      $this->db->from('user');
      $this->db->where('id', $id);
      return $this->db->get()->row();
   }

   // SELECT LOG LOGIN BY ID USER
   function mselect_log_login($id) {
      $this->db->select('a.nama, b.platform, b.browser, b.ip, b.action, b.lastupdate');
      $this->db->from('log_login as b');
      $this->db->join('user as a', 'a.id = b.id', 'inner');
      $this->db->where('b.id', $id);
      $this->db->order_by('b.lastupdate', 'desc');
      return $this->db->get()->result();
   }

   //INSERT DATA USER
   function minsert_user($data) {
      $this->db->insert('user', $data);
   }

   //UPDATE BERDASARKAN ID
   function mupdate_user($dataUpdate, $id) {
      $this->db->where('id', $id);
      $this->db->update('user', $dataUpdate);
   }

   //DELETE
   function mdelete_user($id_user) {
      $this->db->where('id_user', $id_user);
      $this->db->delete('user');
   }
}
?>
