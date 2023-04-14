<?php

class mimport_tele extends ci_model {

   public function __construct() {
      parent::__construct();
   }

   // untuk menampilkan semua user
   function mshow_all_riwayat() {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('kdtelemed, fx_nmuser(id) as nama, unit, file, lastupdate');
      $this->db->from('log_telemed');
      $this->db->order_by('kdtelemed', 'desc');
      return $this->db->get()->result();
   }

   // untuk menampilkan semua user untuk level unit
   function mshow_all_riwayat_unit($unit) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('kdtelemed, fx_nmuser(id) as nama, unit, file, lastupdate');
      $this->db->from('log_telemed');
      $this->db->where('unit', $unit);
      $this->db->order_by('kdtelemed', 'desc');
      return $this->db->get()->result();
   }

   // untuk menampilkan semua user
   function mshow_all_riwayat_byid($id) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('kdtelemed, fx_nmuser(id) as nama, id, unit, file, lastupdate');
      $this->db->from('log_telemed');
      $this->db->where('kdtelemed', $id);
      return $this->db->get()->row();
   }

   //sum pendapatan RSG
   function msum_rsg() {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('SUM(price) as jumlah');
      $this->db->from('trans_rsg');
      $this->db->where('year(jadwal_yang_dipilih)', date("Y"));
      $this->db->where('status_emr', "CLOSED");
      $this->db->where('nama_layanan', "TELEKONSULTASI");
      return $this->db->get()->row();
   }

   //sum pendapatan RST
   function msum_rst() {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('SUM(price) as jumlah');
      $this->db->from('trans_rst');
      $this->db->where('year(jadwal_yang_dipilih)', date("Y"));
      $this->db->where('status_emr', "CLOSED");
      $this->db->where('nama_layanan', "TELEKONSULTASI");
      return $this->db->get()->row();
   }
   //sum pendapatan RSp
   function msum_rsp() {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('SUM(price) as jumlah');
      $this->db->from('trans_rsp');
      $this->db->where('year(jadwal_yang_dipilih)', date("Y"));
      $this->db->where('status_emr', "CLOSED");
      $this->db->where('nama_layanan', "TELEKONSULTASI");
      return $this->db->get()->row();
   }
   //sum pendapatan RSmu
   function msum_rsmu() {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('SUM(price) as jumlah');
      $this->db->from('trans_rsmu');
      $this->db->where('year(jadwal_yang_dipilih)', date("Y"));
      $this->db->where('status_emr', "CLOSED");
      $this->db->where('nama_layanan', "TELEKONSULTASI");
      return $this->db->get()->row();
   }
   //sum pendapatan URJ
   function msum_urj() {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('SUM(price) as jumlah');
      $this->db->from('trans_urj');
      $this->db->where('year(jadwal_yang_dipilih)', date("Y"));
      $this->db->where('status_emr', "CLOSED");
      $this->db->where('nama_layanan', "TELEKONSULTASI");
      return $this->db->get()->row();
   }


   //INSERT DATA LOG_TELEMED
   function minsert_import($data) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->insert('log_telemed', $data);
   }

   //TRUNCATE DATA BEFORE INJECT CSV TO DB
   function mtruncate_import_csv($unit) {
      $this->db = $this->load->database('local', TRUE);
      if ($unit == "RSG"){
         $this->db->truncate('trans_rsg');
      }elseif ($unit == "RST"){
         $this->db->truncate('trans_rst');
      }elseif ($unit == "RSP"){
         $this->db->truncate('trans_rsp');
      }elseif ($unit == "RSMU"){
         $this->db->truncate('trans_rsmu');
      }elseif ($unit == "URJ"){
         $this->db->truncate('trans_urj');
      }
   }

   //INSERT DATA CSV TO DB
   function minsert_import_csv($data, $unit) {
      $this->db = $this->load->database('local', TRUE);
      if ($unit == "RSG"){
         $this->db->insert('trans_rsg', $data);
      }elseif ($unit == "RST"){
         $this->db->insert('trans_rst', $data);
      }elseif ($unit == "RSP"){
         $this->db->insert('trans_rsp', $data);
      }elseif ($unit == "RSMU"){
         $this->db->insert('trans_rsmu', $data);
      }elseif ($unit == "URJ"){
         $this->db->insert('trans_urj', $data);
      }
   }

   function minsert_batch_import_csv($data, $unit) {
      $this->db = $this->load->database('local', TRUE);
      if ($unit == "RSG"){
         $this->db->insert_batch('trans_rsg', $data);
      }elseif ($unit == "RST"){
         $this->db->insert_batch('trans_rst', $data);
      }elseif ($unit == "RSP"){
         $this->db->insert_batch('trans_rsp', $data);
      }elseif ($unit == "RSMU"){
         $this->db->insert_batch('trans_rsmu', $data);
      }elseif ($unit == "URJ"){
         $this->db->insert_batch('trans_urj', $data);
      }
   }

   //UPDATE BERDASARKAN ID
   function mupdate_user($dataUpdate, $id) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->where('id', $id);
      $this->db->update('user', $dataUpdate);
   }

   //DELETE
   function mdelete_import($kdtelemed) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->where('kdtelemed', $kdtelemed);
      $this->db->delete('log_telemed');
   }
}
?>
