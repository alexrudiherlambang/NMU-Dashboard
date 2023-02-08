<?php

class mhome extends ci_model {

   public function __construct() {
      parent::__construct();
   }

   //select jumlah rekanan
   function select_rekanan() {
      $this->db->select('COUNT(*) as rekanan');
      $this->db->from('mrekanan');
      return $this->db->get()->result();
   }
   //select jumlah rekanan penyedia jasa
   function select_rekanan_penyedia() {
      $this->db->select('COUNT(*) as penyedia');
      $this->db->from('mrekanan');
      $this->db->where('jenis', 'Penyedia Jasa');
      return $this->db->get()->result();
   }
   //select jumlah rekanan pemberi jasa
   function select_rekanan_pemberi() {
      $this->db->select('COUNT(*) as pemberi');
      $this->db->from('mrekanan');
      $this->db->where('jenis', 'Pemberi Jasa');
      return $this->db->get()->result();
   }
   //select jumlah user
   function select_user() {
      $this->db->select('COUNT(*) as user');
      $this->db->from('user');
      return $this->db->get()->result();
   }
   //select jumlah pks
   function select_pks() {
      $this->db->select('COUNT(*) as pks');
      $this->db->from('pks');
      return $this->db->get()->result();
   }
   //select jumlah pks berakhir
   function select_pks_berakhir() {
      $this->db->select('COUNT(*) as pks_berakhir');
      $this->db->from('pks');
      $this->db->where('status', 'IJIN BERAKHIR');
      return $this->db->get()->result();
   }
   //select jumlah pks berjalan
   function select_pks_berjalan() {
      $this->db->select('COUNT(*) as pks_berjalan');
      $this->db->from('pks');
      $this->db->where('status', 'IJIN BERJALAN');
      return $this->db->get()->result();
   }
   //select jumlah pks expired
   function select_pks_expired() {
      $this->db->select('COUNT(*) as pks_expired');
      $this->db->from('pks');
      $this->db->where('status', 'IJIN EXPIRED');
      return $this->db->get()->result();
   }
}
?>
