<?php

class muser extends ci_model {

   public function __construct() {
      parent::__construct();
   }

    // untuk menampilkan semua user
    function mshow_all_user() {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('*');
      $this->db->from('user');
      $this->db->order_by('id', 'asc');
      return $this->db->get()->result();
   }

   // untuk menampilkan semua user level Unit
   function mshow_all_user_by_lokasi($lokasi) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('*');
      $this->db->from('user');
      $this->db->where('tlok', $lokasi);
      $this->db->order_by('id', 'asc');
      return $this->db->get()->result();
   }

   // SELECT BERDASARKAN ID USER
   function mselect_by_iduser($id) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('*');
      $this->db->from('user');
      $this->db->where('id', $id);
      return $this->db->get()->row();
   }

   // SELECT ID ID MAX USER
   function mselect_user_max() {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('id');
      $this->db->from('user');
      $this->db->order_by('id', 'DESC');
      $this->db->limit(1);
      return $this->db->get()->row();
   }

   // SELECT LOG LOGIN BY ID USER
   function mselect_log_login($id) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('fx_nmuser(id) as nama, platform, browser, ip, action, lastupdate');
      $this->db->from('log_login');
      $this->db->where('id', $id);
      $this->db->order_by('lastupdate', 'desc');
      $this->db->limit(10);
      return $this->db->get()->result();
   }

   // SELECT LOG ACTIVITY BY ID USER
   function mselect_log_activity($id) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('fx_nmuser(id) as nama, unit, jenis, action, lastupdate');
      $this->db->from('log_aktifitas');
      $this->db->where('id', $id);
      $this->db->order_by('lastupdate', 'desc');
      $this->db->limit(10);
      return $this->db->get()->result();
   }

   // SELECT ROLE USER BY ID USER
   function mselect_role_user($id) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('fx_nmuser(id) as nama, tum, tkok1, tkok2, tkok3, tkok4, tkok5, tkoksk, tkoktt, tkokhp, tkokbor, tkkp1, tkkp2, tkkp3, tkkb, tkklr, tid, ttk, ttp, gtk, gtp, tmn, tmp, tmuk, tdr, mdr');
      $this->db->from('user_role');
      $this->db->where('id', $id);
      return $this->db->get()->row();
   }

   //INSERT DATA USER
   function minsert_user($data) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->insert('user', $data);
   }

   //INSERT ROLE USER
   function minsert_role_user($data) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->insert('user_role', $data);
   }

   //UPDATE BERDASARKAN ID
   function mupdate_user($dataUpdate, $id) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->where('id', $id);
      $this->db->update('user', $dataUpdate);
   }

   //UPDATE ROLE USER BERDASARKAN ID
   function mupdate_role_user($Update, $id) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->where('id', $id);
      $this->db->update('user_role', $Update);
   }

   //DELETE
   function mdelete_user($id_user) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->where('id_user', $id_user);
      $this->db->delete('user');
   }
}
?>
