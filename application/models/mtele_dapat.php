<?php

class mtele_dapat extends ci_model {

   public function __construct() {
      parent::__construct();
   }

   //sum pendapatan RSG
   function msum_rsg($tglawal, $tglakhir) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('SUM(price) as jumlah');
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
      $this->db->select('SUM(price) as jumlah');
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
      $this->db->select('SUM(price) as jumlah');
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
      $this->db->select('SUM(price) as jumlah');
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
      $this->db->select('SUM(price) as jumlah');
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
      $this->db->select('unit_name,SUM(price) as jumlah');
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
      $this->db->select('unit_name,SUM(price) as jumlah');
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
      $this->db->select('unit_name,SUM(price) as jumlah');
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
      $this->db->select('unit_name,SUM(price) as jumlah');
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
      $this->db->select('unit_name,SUM(price) as jumlah');
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

   //Show all jenis telemed grafik 
   function mshow_all_jenis($lokasi){
      $this->db = $this->load->database('local', TRUE);
      if ($lokasi == "RSG"){
         $this->db->select('unit_name');
         $this->db->from('trans_rsg');
         $this->db->group_by('unit_name');
         $this->db->where('unit_name !=', "null");
         return $this->db->get()->result();
      }elseif ($lokasi == "RST") {
         $this->db->select('unit_name');
         $this->db->from('trans_rst');
         $this->db->group_by('unit_name');
         $this->db->where('unit_name !=', "null");
         return $this->db->get()->result();
      }elseif ($lokasi == "RSP") {
         $this->db->select('unit_name');
         $this->db->from('trans_rsp');
         $this->db->group_by('unit_name');
         $this->db->where('unit_name !=', "null");
         return $this->db->get()->result();
      }elseif ($lokasi == "RSMU") {
         $this->db->select('unit_name');
         $this->db->from('trans_rsmu');
         $this->db->group_by('unit_name');
         $this->db->where('unit_name !=', "null");
         return $this->db->get()->result();
      }elseif ($lokasi == "URJ") {
         $this->db->select('unit_name');
         $this->db->from('trans_urj');
         $this->db->group_by('unit_name');
         $this->db->where('unit_name !=', "null");
         return $this->db->get()->result();
      }
   }

   // untuk menampilkan grafik
   function mshow_all_grafik($tglawal,$tglakhir,$lokasi,$jenis,$nama) {
      $this->db = $this->load->database('local', TRUE);
      if ($lokasi == "RSG"){
         $this->db->select('unit_name');
         $this->db->select('jadwal_yang_dipilih as tanggal,SUM(price) as price,');
         $this->db->from('trans_rsg');
         $this->db->group_by('day(jadwal_yang_dipilih)');
         $this->db->where('jadwal_yang_dipilih >=', $tglawal);
         $this->db->where('status_emr', "CLOSED");
         $this->db->where('nama_layanan', "TELEKONSULTASI");
         $this->db->where('jadwal_yang_dipilih <=', $tglakhir);
         $this->db->where('unit_name', $jenis);
         return $this->db->get();
      }elseif ($lokasi == "RST") {
         $this->db->select('jadwal_yang_dipilih as tanggal,SUM(price) as price,');
         $this->db->from('trans_rst');
         $this->db->group_by('day(jadwal_yang_dipilih)');
         $this->db->where('jadwal_yang_dipilih >=', $tglawal);
         $this->db->where('status_emr', "CLOSED");
         $this->db->where('nama_layanan', "TELEKONSULTASI");
         $this->db->where('jadwal_yang_dipilih <=', $tglakhir);
         $this->db->where('unit_name', $jenis);
         return $this->db->get();
      }elseif ($lokasi == "RSP") {
         $this->db->select('jadwal_yang_dipilih as tanggal,SUM(price) as price,');
         $this->db->from('trans_rsp');
         $this->db->group_by('day(jadwal_yang_dipilih)');
         $this->db->where('jadwal_yang_dipilih >=', $tglawal);
         $this->db->where('status_emr', "CLOSED");
         $this->db->where('nama_layanan', "TELEKONSULTASI");
         $this->db->where('jadwal_yang_dipilih <=', $tglakhir);
         $this->db->where('unit_name', $jenis);
         return $this->db->get();
      }elseif ($lokasi == "RSMU") {
         $this->db->select('jadwal_yang_dipilih as tanggal,SUM(price) as price,');
         $this->db->from('trans_rsmu');
         $this->db->group_by('day(jadwal_yang_dipilih)');
         $this->db->where('jadwal_yang_dipilih >=', $tglawal);
         $this->db->where('status_emr', "CLOSED");
         $this->db->where('nama_layanan', "TELEKONSULTASI");
         $this->db->where('jadwal_yang_dipilih <=', $tglakhir);
         $this->db->where('unit_name', $jenis);
         return $this->db->get();
      }elseif ($lokasi == "URJ") {
         $this->db->select('jadwal_yang_dipilih as tanggal,SUM(price) as price,');
         $this->db->from('trans_urj');
         $this->db->group_by('day(jadwal_yang_dipilih)');
         $this->db->where('jadwal_yang_dipilih >=', $tglawal);
         $this->db->where('status_emr', "CLOSED");
         $this->db->where('nama_layanan', "TELEKONSULTASI");
         $this->db->where('jadwal_yang_dipilih <=', $tglakhir);
         $this->db->where('unit_name', $jenis);
         return $this->db->get();
      }
   }

   // untuk menampilkan pie
   function mshow_all_grafik_kp($tglawal,$tglakhir,$lokasi,$jenis,$nama) {
      $this->db = $this->load->database('local', TRUE);
      if ($lokasi == "RSG"){
         $this->db->select('unit_name as tanggal,SUM(price) as price,');
         $this->db->from('trans_rsg');
         $this->db->group_by('unit_name');
         $this->db->where('status_emr', "CLOSED");
         $this->db->where('nama_layanan', "TELEKONSULTASI");
         $this->db->where('jadwal_yang_dipilih >=', $tglawal);
         $this->db->where('jadwal_yang_dipilih <=', $tglakhir);
         return $this->db->get();
      }elseif ($lokasi == "RST") {
         $this->db->select('unit_name as tanggal,SUM(price) as price,');
         $this->db->from('trans_rst');
         $this->db->group_by('unit_name');
         $this->db->where('status_emr', "CLOSED");
         $this->db->where('nama_layanan', "TELEKONSULTASI");
         $this->db->where('jadwal_yang_dipilih >=', $tglawal);
         $this->db->where('jadwal_yang_dipilih <=', $tglakhir);
         return $this->db->get();
      }elseif ($lokasi == "RSP") {
         $this->db->select('unit_name as tanggal,SUM(price) as price,');
         $this->db->from('trans_rsp');
         $this->db->group_by('unit_name');
         $this->db->where('status_emr', "CLOSED");
         $this->db->where('nama_layanan', "TELEKONSULTASI");
         $this->db->where('jadwal_yang_dipilih >=', $tglawal);
         $this->db->where('jadwal_yang_dipilih <=', $tglakhir);
         return $this->db->get();
      }elseif ($lokasi == "RSMU") {
         $this->db->select('unit_name as tanggal,SUM(price) as price,');
         $this->db->from('trans_rsmu');
         $this->db->group_by('unit_name');
         $this->db->where('status_emr', "CLOSED");
         $this->db->where('nama_layanan', "TELEKONSULTASI");
         $this->db->where('jadwal_yang_dipilih >=', $tglawal);
         $this->db->where('jadwal_yang_dipilih <=', $tglakhir);
         return $this->db->get();
      }elseif ($lokasi == "URJ") {
         $this->db->select('unit_name as tanggal,SUM(price) as price,');
         $this->db->from('trans_urj');
         $this->db->group_by('unit_name');
         $this->db->where('status_emr', "CLOSED");
         $this->db->where('nama_layanan', "TELEKONSULTASI");
         $this->db->where('jadwal_yang_dipilih >=', $tglawal);
         $this->db->where('jadwal_yang_dipilih <=', $tglakhir);
         return $this->db->get();
      }
   }
}
?>
