<?php

class mtele_kunjung extends ci_model {

   public function __construct() {
      parent::__construct();
   }

   //sum pendapatan RSG
   function msum_rsg($tglawal, $tglakhir) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('COUNT(invoice_no) as jumlah');
      $this->db->from('trans_rsg');
      $this->db->where('status_emr', "CLOSED");
      $this->db->where('nama_layanan', "TELEKONSULTASI");
      $this->db->where('jadwal_yang_dipilih>=', $tglawal);
      $this->db->where('jadwal_yang_dipilih<=', $tglakhir);
      return $this->db->get()->row();
   }

   //sum pendapatan RST
   function msum_rst($tglawal, $tglakhir) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('COUNT(invoice_no) as jumlah');
      $this->db->from('trans_rst');
      $this->db->where('status_emr', "CLOSED");
      $this->db->where('nama_layanan', "TELEKONSULTASI");
      $this->db->where('jadwal_yang_dipilih>=', $tglawal);
      $this->db->where('jadwal_yang_dipilih<=', $tglakhir);
      return $this->db->get()->row();
   }
   //sum pendapatan RSp
   function msum_rsp($tglawal, $tglakhir) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('COUNT(invoice_no) as jumlah');
      $this->db->from('trans_rsp');
      $this->db->where('status_emr', "CLOSED");
      $this->db->where('nama_layanan', "TELEKONSULTASI");
      $this->db->where('jadwal_yang_dipilih>=', $tglawal);
      $this->db->where('jadwal_yang_dipilih<=', $tglakhir);
      return $this->db->get()->row();
   }
   //sum pendapatan RSmu
   function msum_rsmu($tglawal, $tglakhir) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('COUNT(invoice_no) as jumlah');
      $this->db->from('trans_rsmu');
      $this->db->where('status_emr', "CLOSED");
      $this->db->where('nama_layanan', "TELEKONSULTASI");
      $this->db->where('jadwal_yang_dipilih>=', $tglawal);
      $this->db->where('jadwal_yang_dipilih<=', $tglakhir);
      return $this->db->get()->row();
   }
   //sum pendapatan URJ
   function msum_urj($tglawal, $tglakhir) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('COUNT(invoice_no) as jumlah');
      $this->db->from('trans_urj');
      $this->db->where('status_emr', "CLOSED");
      $this->db->where('nama_layanan', "TELEKONSULTASI");
      $this->db->where('jadwal_yang_dipilih>=', $tglawal);
      $this->db->where('jadwal_yang_dipilih<=', $tglakhir);
      return $this->db->get()->row();
   }

   //rinci pendapatan RSG
   function mrinci_rsg($tglawal, $tglakhir) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('unit_name,COUNT(invoice_no) as jumlah');
      $this->db->from('trans_rsg');
      $this->db->where('status_emr', "CLOSED");
      $this->db->where('nama_layanan', "TELEKONSULTASI");
      $this->db->where('jadwal_yang_dipilih>=', $tglawal);
      $this->db->where('jadwal_yang_dipilih<=', $tglakhir);
      $this->db->group_by('unit_name');
      return $this->db->get()->result();
   }

   //rinci pendapatan RST
   function mrinci_rst($tglawal, $tglakhir) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('unit_name,COUNT(invoice_no) as jumlah');
      $this->db->from('trans_rst');
      $this->db->where('status_emr', "CLOSED");
      $this->db->where('nama_layanan', "TELEKONSULTASI");
      $this->db->where('jadwal_yang_dipilih>=', $tglawal);
      $this->db->where('jadwal_yang_dipilih<=', $tglakhir);
      $this->db->group_by('unit_name');
      return $this->db->get()->result();
   }
   //rinci pendapatan RSp
   function mrinci_rsp($tglawal, $tglakhir) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('unit_name,COUNT(invoice_no) as jumlah');
      $this->db->from('trans_rsp');
      $this->db->where('status_emr', "CLOSED");
      $this->db->where('nama_layanan', "TELEKONSULTASI");
      $this->db->where('jadwal_yang_dipilih>=', $tglawal);
      $this->db->where('jadwal_yang_dipilih<=', $tglakhir);
      $this->db->group_by('unit_name');
      return $this->db->get()->result();
   }
   //rinci pendapatan RSmu
   function mrinci_rsmu($tglawal, $tglakhir) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('unit_name,COUNT(invoice_no) as jumlah');
      $this->db->from('trans_rsmu');
      $this->db->where('status_emr', "CLOSED");
      $this->db->where('nama_layanan', "TELEKONSULTASI");
      $this->db->where('jadwal_yang_dipilih>=', $tglawal);
      $this->db->where('jadwal_yang_dipilih<=', $tglakhir);
      $this->db->group_by('unit_name');
      return $this->db->get()->result();
   }
   //rinci pendapatan URJ
   function mrinci_urj($tglawal, $tglakhir) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('unit_name,COUNT(invoice_no) as jumlah');
      $this->db->from('trans_urj');
      $this->db->where('status_emr', "CLOSED");
      $this->db->where('nama_layanan', "TELEKONSULTASI");
      $this->db->where('jadwal_yang_dipilih>=', $tglawal);
      $this->db->where('jadwal_yang_dipilih<=', $tglakhir);
      $this->db->group_by('unit_name');
      return $this->db->get()->result();
   }

   //Insert Log Login
   function insert_log($log) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->insert('log_aktifitas', $log);
   }
}
?>
