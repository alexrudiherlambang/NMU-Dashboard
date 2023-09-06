<?php

class mkunjungan_RJ extends ci_model {

   public function __construct() {
      parent::__construct();
   }

   // untuk menampilkan semua rekap
   function mshow_all_call($unit,$tglawal,$tglakhir,$nama,$lokasi) {
      $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1_k('$tglawal', '$tglakhir', '$nama', '$lokasi', 'kelunit')");
      $this->db->select('kelunit as ket, sum(rsaldolalu) as rsaldolalu, sum(rsaldosaatini) as rsaldosaatini, sum(rsaldosampai) as rsaldosampai, sum(rsaldopotensi1) as rsaldopotensi, sum(jmltarget) as jmltarget, ROUND(sum(rsaldosampai)/sum(jmltarget), 2) as jmlprosen');
      $this->db->from('test.ra_dashdb_k_'.$nama);
      $this->db->where('kelspesimen', '1. RAWAT JALAN');
      if($unit != "SEMUA"){
         $this->db->where('kelunit', $unit);
      }
      $this->db->group_by('kelunit');
      $this->db->order_by("CASE 
                                 WHEN kelunit = 'POLI UMUM' THEN 1
                                 WHEN kelunit = 'POLI SPESIALIS' THEN 2
                                 WHEN kelunit = 'HAEMODIALISA' THEN 3
                                 WHEN kelunit = 'POLI GIGI' THEN 4
                                 WHEN kelunit = 'UGD' THEN 5
                                 ELSE 6
                           END", 'asc');
      return $this->db->get()->result();
   }

   // untuk menampilkan semua detail rekap
   function mshow_all_detail_call($unit,$subunit,$tglawal,$tglakhir,$nama,$lokasi) {
      // $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1_k('$tglawal', '$tglakhir', '$nama', '$lokasi', 'kelunit')");
      $this->db->select('kode1,
      IF((kelsegmen_sub="Homecare" OR kelsegmen_sub="Telemedicine" OR kelsegmen_sub="MCU"), "900000",kode1) AS urut_kode1, 
      IF((kelsegmen_sub="Homecare" OR kelsegmen_sub="Telemedicine" OR kelsegmen_sub="MCU"), kelsegmen_sub, nama_unit) AS sub_unit, 
      kelunit AS ket, kelsegmen_sub, nama_unit , SUM(rsaldolalu) AS rsaldolalu, SUM(rsaldosaatini) AS rsaldosaatini, SUM(rsaldosampai) AS rsaldosampai, SUM(rsaldopotensi1) AS rsaldopotensi, SUM(jmltarget) AS jmltarget, ROUND(SUM(rsaldosampai)/SUM(jmltarget), 2) AS jmlprosen');
      $this->db->from('test.ra_dashdb_k_'.$nama);
      $this->db->where('kelspesimen', '1. RAWAT JALAN');
      $this->db->where('jnstrans !=', 'TARGET');
      if($unit != "SEMUA"){
         $this->db->where('kelunit', $unit);
      }
      $this->db->group_by('kelunit');
      $this->db->group_by('urut_kode1');
      $this->db->group_by('sub_unit');
      $this->db->order_by('urut_kode1', 'asc');
      // Jalankan query dan ambil hasilnya
      $query_result = $this->db->get()->result();

      // Filter hasil query berdasarkan sub_unit secara manual
      $filtered_result = [];
      foreach ($query_result as $row) {
         if ($subunit == "SEMUA" || $row->sub_unit == $subunit) {
               $filtered_result[] = $row;
         }
      }

      return $filtered_result;
   }

    // untuk menampilkan semua rekap Hamecare, MCU, Telemed dan Reguler
    function mshow_all_rekap_call($unit,$subunit,$tglawal,$tglakhir,$nama,$lokasi) {
      $this->db->select('kelsegmen_sub, SUM(rsaldolalu) AS rsaldolalu, SUM(rsaldosaatini) AS rsaldosaatini, SUM(rsaldosampai) AS rsaldosampai, SUM(rsaldopotensi1) AS rsaldopotensi,SUM(jmltarget) AS jmltarget, ROUND(SUM(rsaldosampai)/SUM(jmltarget), 2) AS jmlprosen');
      $this->db->from('test.ra_dashdb_k_'.$nama);
      $this->db->where('kelspesimen', '1. RAWAT JALAN');
      if($unit != "SEMUA"){
         $this->db->where('kelunit', $unit);
         if ($subunit != "SEMUA") {
            $this->db->where('nama_unit', $subunit);
        }
      }
      $this->db->group_by('kelsegmen_sub');
      $this->db->order_by("CASE 
                                 WHEN kelunit = 'POLI UMUM' THEN 1
                                 WHEN kelunit = 'POLI SPESIALIS' THEN 2
                                 WHEN kelunit = 'HAEMODIALISA' THEN 3
                                 WHEN kelunit = 'POLI GIGI' THEN 4
                                 WHEN kelunit = 'UGD' THEN 5
                                 ELSE 6
                           END", 'asc');
      $results =  $this->db->get()->result();

      // Hitung total sum secara manual
      $total_rsaldolalu = 0;
      $total_rsaldosaatini = 0;
      $total_rsaldosampai = 0;
      $total_rsaldopotensi = 0;
      $total_jmltarget = 0;
      $total_jmlprosen = 0;

      foreach ($results as $row) {
         $total_rsaldolalu += $row->rsaldolalu;
         $total_rsaldosaatini += $row->rsaldosaatini;
         $total_rsaldosampai += $row->rsaldosampai;
         $total_rsaldopotensi += $row->rsaldopotensi;
         $total_jmltarget += $row->jmltarget;
         $total_jmlprosen += $row->jmlprosen;
      }

      // Tambahkan baris total ke hasil query
      $total_row = (object)array(
         'kelsegmen_sub' => 'Total',
         'rsaldolalu' => $total_rsaldolalu,
         'rsaldosaatini' => $total_rsaldosaatini,
         'rsaldosampai' => $total_rsaldosampai,
         'rsaldopotensi' => $total_rsaldopotensi,
         'jmltarget' => $total_jmltarget,
         'jmlprosen' => $total_jmlprosen
      );

      // Tambahkan total row ke hasil query
      $results[] = $total_row;

      return $results;
   }

   function mshow_all_unit($tglawal,$tglakhir,$nama,$lokasi) {
      $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1_k('$tglawal', '$tglakhir', '$nama', '$lokasi', 'kelunit')");
      $this->db->select('DISTINCT(kelunit)');
      $this->db->from('test.ra_dashdb_k_'.$nama);
      $this->db->where('kelspesimen', '1. RAWAT JALAN');
      $this->db->where('jnstrans !=', 'TARGET');
      $this->db->order_by('kode1', 'asc');
      return $this->db->get()->result();
   }
   
   function mshow_all_subunit($unit, $nama) {
      $this->db->select('DISTINCT(nama_unit)');
      $this->db->from('test.ra_dashdb_k_'.$nama);
      $this->db->where('kelspesimen', '1. RAWAT JALAN');
      if ($unit != "SEMUA"){
         $this->db->where('kelunit', $unit);
      }
      $this->db->where('jnstrans !=', 'TARGET');
      $this->db->order_by('kode1', 'asc');
      return $this->db->get()->result();
   }
   
   // untuk menampilkan Jenis
   function mshow_all_jenis($nama) {
      $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1_k('" . date('Y-m-d') . "', '" . (new DateTime('-7 days'))->format('Y-m-d') . "', '$nama', '', 'kelunit')");
      $this->db->select('kelunit');
      $this->db->from('test.ra_dashdb_k_'.$nama);
      $this->db->group_by('kelunit');
      $this->db->where('kelspesimen', '1. RAWAT JALAN');
      return $this->db->get()->result();
   }

   // untuk menampilkan grafik
   function mshow_all_grafik($tglawal,$tglakhir,$lokasi,$jenis,$nama) {
      if ($lokasi == ''){
         //line kp
         $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1_k('$tglawal', '$tglakhir', '$nama', '$lokasi', 'kelunit')");
         $this->db->select('tanggal,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_k_'.$nama);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->where('kelunit', $jenis);   
         $this->db->where('kelspesimen', '1. RAWAT JALAN');
         $this->db->group_by('tanggal');
         return $this->db->get();
      }else{
         //line unit
         $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1_k('$tglawal', '$tglakhir', '$nama', '$lokasi', 'kelunit')");
         $this->db->select('tanggal,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_k_'.$nama);
         $this->db->where('lokasi', $lokasi);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->where('kelunit', $jenis);
         $this->db->where('kelspesimen', '1. RAWAT JALAN');
         $this->db->group_by('tanggal');
         return $this->db->get();
      }
   }

   // untuk menampilkan pie
   function mshow_all_grafik_kp($tglawal,$tglakhir,$lokasi,$jenis,$nama) {
      if ($lokasi == ''){
         //pie kp
         $this->db->select('lokasi,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_k_'.$nama);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->where('kelunit', $jenis);
         $this->db->where('kelspesimen', '1. RAWAT JALAN');
         $this->db->group_by('lokasi');
         return $this->db->get();
      }else{
         //pie unit
         $this->db->select('lokasi,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_k_'.$nama);
         $this->db->where('lokasi', $lokasi);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->where('kelunit', $jenis);
         $this->db->where('kelspesimen', '1. RAWAT JALAN');
         $this->db->group_by('lokasi');
         return $this->db->get();
      }
   }

   // untuk menampilkan pie all jenis
   function mshow_all_pie_all_jenis($tglawal,$tglakhir,$lokasi,$jenis,$nama) {
      if ($lokasi == ''){
         //pie jenis kp
         $this->db->select('kelunit,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_k_'.$nama);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->where('kelspesimen', '1. RAWAT JALAN');
         $this->db->group_by('kelunit');
         return $this->db->get();
      }else{
         //pie jenis unit
         $this->db->select('kelunit,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_k_'.$nama);
         $this->db->where('lokasi', $lokasi);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->where('kelspesimen', '1. RAWAT JALAN');
         $this->db->group_by('kelunit');
         return $this->db->get();
      }
   }

    // untuk menampilkan grafik all jenis
    function mshow_all_grafik_all_jenis($tglawal,$tglakhir,$lokasi,$jenis,$nama) {
      if ($lokasi == ''){
         //line jenis kp
         $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1_k('$tglawal', '$tglakhir', '$nama', '$lokasi', 'kelunit')");
         $this->db->select('kelunit,tanggal,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_k_'.$nama);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->where('kelspesimen', '1. RAWAT JALAN');
         $this->db->group_by('kelunit');
         $this->db->group_by('tanggal');
         return $this->db->get();
      }else{
         //line jenis unit
         $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke1_k('$tglawal', '$tglakhir', '$nama', '$lokasi', 'kelunit')");
         $this->db->select('kelunit,tanggal,SUM(rsaldosampai) as total_rsaldosampai,SUM(jmltarget) as total_jmltarget');
         $this->db->from('test.ra_dashdb_k_'.$nama);
         $this->db->where('lokasi', $lokasi);
         $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->where('kelspesimen', '1. RAWAT JALAN');
         $this->db->group_by('kelunit');
         $this->db->group_by('tanggal');
         return $this->db->get();
      }
   }

   // untuk cetak excel
   function mshow_all_detail($nama, $ket, $tglawal, $tglakhir) {
         $this->db->select('lokasi, tanggal, kelunit, kelsegmen, kelompok, ket, nama_unit, kelsegmen_sub, sum(rsaldolalu) as rsaldolalu, sum(rsaldosaatini) as rsaldosaatini, sum(rsaldosampai) as rsaldosampai, sum(rsaldopotensi1) as rsaldopotensi1, sum(jmltarget) as jmltarget, statuse');
         $this->db->from('test.ra_dashdb_k_'.$nama);
         $this->db->where('kelunit', $ket);
         // $this->db->where('tanggal>=', $tglawal);
         $this->db->where('tanggal<=', $tglakhir);
         $this->db->where('kelspesimen', '1. RAWAT JALAN');
         $this->db->where('jnstrans!=', 'TARGET');
         $this->db->group_by('lokasi');
         $this->db->group_by('tanggal');
         return $this->db->get()->result();
   }

   // untuk cetak potensi
   function mshow_all_potensi($ket, $lokasi, $tglakhir) {
      $this->db->select('lokasi, jnstrans, sts_tutup, tgl_reg, tgl_kunjung, nobilling, countt, nomrm, nmpasien, nik, noasuransi, notelp, stspulang, 
      tgllahir, jk, alamat, nmkonsumen, Segmen, kelsegmen, kelsegmen_sub, nama_unit,tgl_masuk, tgl_pulang, tgl_kasir, norj, keterangan,
      rpbilling, statuse');
      
      if ($lokasi == "RSG"){
          $this->db->from('t02_rekap_tabel_kunjungan');
      } elseif ($lokasi == "RST"){
          $this->db->from('t03_rekap_tabel_kunjungan');
      } elseif ($lokasi == "RSP"){
          $this->db->from('t04_rekap_tabel_kunjungan');
      } elseif ($lokasi == "RSMU"){
          $this->db->from('t05_rekap_tabel_kunjungan');
      }
      
      if ($ket == "POLI UMUM"){
         $this->db->where_in('nama_unit', array('POLI UMUM', 'POLI VAKSIN', 'POLI KIA'));
      }elseif ($ket == "POLI SPESIALIS"){
         $this->db->like('nama_unit', 'SPS', 'after');
      }elseif ($ket == "HAEMODIALISA"){
         $this->db->where('nama_unit', "HEMODIALISA");
      }elseif ($ket == "POLI GIGI"){
         $this->db->where('nama_unit', "POLI GIGI TETAP");
      }elseif ($ket == "UGD"){
         $this->db->where_in('nama_unit', array('UGD', 'AMBULANCE', 'KENDARAAN JENAZAH'));
      }

      $this->db->where('tgl_kunjung <=', $tglakhir);
      $this->db->where('Segmen', '1. RAWAT JALAN');
      $this->db->where('statuse !=', 'TUTUP (AKUN)');
      $this->db->order_by('tgl_kunjung', 'asc');
      
      return $this->db->get()->result();
   }
  

   //Insert Log Login
   function insert_log($log) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->insert('log_aktifitas', $log);
   }
}
?>
