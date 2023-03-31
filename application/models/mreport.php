<?php

class mreport extends ci_model {

   public function __construct() {
      parent::__construct();
   }

   // Untuk Query 1
   function mshow_hasil_query1($tglawal, $tglakhir, $lokasi) {
      if ($lokasi == "RSG"){
         return $this->load->database('db_rsg', TRUE)->query("
            SELECT a.norj, a.nomrm, a.tanggal, b.nmpasien, c.nmkons, d.nama AS nm_unit, a.keterangan, a.jmlharga, a.hrdr, e.nmdokter FROM klnota2 a
            LEFT JOIN pasien b
            ON a.nomrm = b.nomrm
            LEFT JOIN konsumen c
            ON a.kdkons = c.kdkons
            LEFT JOIN tindakan1 d
            ON a.kode1 = d.kode1
            LEFT JOIN mtdokter e
            ON a.kddokter = e.kddokter
            WHERE a.tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
            UNION ALL
            SELECT a.nori, a.nomrm, a.tgltin AS tgl_tindakan, b.nmpasien, c.nmkons, d.nama AS nm_unit, a.keterangan, a.jmltotal, a.hrdr, e.nmdokter FROM notainap2 a
            LEFT JOIN pasien b
            ON a.nomrm = b.nomrm
            LEFT JOIN konsumen c
            ON a.kdkons = c.kdkons
            LEFT JOIN tindakan1 d
            ON a.kode1 = d.kode1
            LEFT JOIN mtdokter e
            ON a.kddokter = e.kddokter
            WHERE a.tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
         ")->result();
      }elseif ($lokasi == "RST") {
         return $this->load->database('db_rst', TRUE)->query("
            SELECT a.norj, a.nomrm, a.tanggal, b.nmpasien, c.nmkons, d.nama AS nm_unit, a.keterangan, a.jmlharga, a.hrdr, e.nmdokter FROM klnota2 a
            LEFT JOIN pasien b
            ON a.nomrm = b.nomrm
            LEFT JOIN konsumen c
            ON a.kdkons = c.kdkons
            LEFT JOIN tindakan1 d
            ON a.kode1 = d.kode1
            LEFT JOIN mtdokter e
            ON a.kddokter = e.kddokter
            WHERE a.tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
            UNION ALL
            SELECT a.nori, a.nomrm, a.tgltin AS tgl_tindakan, b.nmpasien, c.nmkons, d.nama AS nm_unit, a.keterangan, a.jmltotal, a.hrdr, e.nmdokter FROM notainap2 a
            LEFT JOIN pasien b
            ON a.nomrm = b.nomrm
            LEFT JOIN konsumen c
            ON a.kdkons = c.kdkons
            LEFT JOIN tindakan1 d
            ON a.kode1 = d.kode1
            LEFT JOIN mtdokter e
            ON a.kddokter = e.kddokter
            WHERE a.tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
         ")->result();
      }elseif ($lokasi == "RSP") {
         return $this->load->database('db_rsp', TRUE)->query("
            SELECT a.norj, a.nomrm, a.tanggal, b.nmpasien, c.nmkons, d.nama AS nm_unit, a.keterangan, a.jmlharga, a.hrdr, e.nmdokter FROM klnota2 a
            LEFT JOIN pasien b
            ON a.nomrm = b.nomrm
            LEFT JOIN konsumen c
            ON a.kdkons = c.kdkons
            LEFT JOIN tindakan1 d
            ON a.kode1 = d.kode1
            LEFT JOIN mtdokter e
            ON a.kddokter = e.kddokter
            WHERE a.tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
            UNION ALL
            SELECT a.nori, a.nomrm, a.tgltin AS tgl_tindakan, b.nmpasien, c.nmkons, d.nama AS nm_unit, a.keterangan, a.jmltotal, a.hrdr, e.nmdokter FROM notainap2 a
            LEFT JOIN pasien b
            ON a.nomrm = b.nomrm
            LEFT JOIN konsumen c
            ON a.kdkons = c.kdkons
            LEFT JOIN tindakan1 d
            ON a.kode1 = d.kode1
            LEFT JOIN mtdokter e
            ON a.kddokter = e.kddokter
            WHERE a.tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
         ")->result();
      }elseif ($lokasi == "RSMU") {
         return $this->load->database('db_rsmu', TRUE)->query("
            SELECT a.norj, a.nomrm, a.tanggal, b.nmpasien, c.nmkons, d.nama AS nm_unit, a.keterangan, a.jmlharga, a.hrdr, e.nmdokter FROM klnota2 a
            LEFT JOIN pasien b
            ON a.nomrm = b.nomrm
            LEFT JOIN konsumen c
            ON a.kdkons = c.kdkons
            LEFT JOIN tindakan1 d
            ON a.kode1 = d.kode1
            LEFT JOIN mtdokter e
            ON a.kddokter = e.kddokter
            WHERE a.tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
            UNION ALL
            SELECT a.nori, a.nomrm, a.tgltin AS tgl_tindakan, b.nmpasien, c.nmkons, d.nama AS nm_unit, a.keterangan, a.jmltotal, a.hrdr, e.nmdokter FROM notainap2 a
            LEFT JOIN pasien b
            ON a.nomrm = b.nomrm
            LEFT JOIN konsumen c
            ON a.kdkons = c.kdkons
            LEFT JOIN tindakan1 d
            ON a.kode1 = d.kode1
            LEFT JOIN mtdokter e
            ON a.kddokter = e.kddokter
            WHERE a.tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
         ")->result();
      }
   }

   // Untuk Query 2
   function mshow_hasil_query2($tglawal, $tglakhir, $lokasi) {
      if ($lokasi == "RSG"){
         return $this->load->database('db_rsg', TRUE)->query("
            SELECT a.nobilling, a.jnstrans, a.nobukti, a.noposting, b.nmpasien, c.nmkons,  a.debet, a.kredit FROM ptnmuakunbk.jurnaldtlfk_ppn a
            LEFT JOIN paslama b
            ON a.nobilling = b.norj
            LEFT JOIN konsumen c
            ON a.kdkons = c.kdkons
            WHERE tgltrans BETWEEN '".$tglawal."' AND '".$tglakhir."'
            UNION ALL
            SELECT a.nobilling, a.jnstrans, a.nobukti, a.noposting, b.nmpasien, c.nmkons,  a.debet, a.kredit FROM ptnmuakunbk.jurnaldtlfm_ppn a
            LEFT JOIN paslama b
            ON a.nobilling = b.norj
            LEFT JOIN konsumen c
            ON a.kdkons = c.kdkons
            WHERE tgltrans BETWEEN '".$tglawal."' AND '".$tglakhir."'
         ")->result();
      }elseif ($lokasi == "RST") {
         return $this->load->database('db_rst', TRUE)->query("
            SELECT a.nobilling, a.jnstrans, a.nobukti, a.noposting, b.nmpasien, c.nmkons,  a.debet, a.kredit FROM ptnmuakunbk.jurnaldtlfk_ppn a
            LEFT JOIN paslama b
            ON a.nobilling = b.norj
            LEFT JOIN konsumen c
            ON a.kdkons = c.kdkons
            WHERE tgltrans BETWEEN '".$tglawal."' AND '".$tglakhir."'
            UNION ALL
            SELECT a.nobilling, a.jnstrans, a.nobukti, a.noposting, b.nmpasien, c.nmkons,  a.debet, a.kredit FROM ptnmuakunbk.jurnaldtlfm_ppn a
            LEFT JOIN paslama b
            ON a.nobilling = b.norj
            LEFT JOIN konsumen c
            ON a.kdkons = c.kdkons
            WHERE tgltrans BETWEEN '".$tglawal."' AND '".$tglakhir."'
         ")->result();
      }elseif ($lokasi == "RSP") {
         return $this->load->database('db_rsp', TRUE)->query("
            SELECT a.nobilling, a.jnstrans, a.nobukti, a.noposting, b.nmpasien, c.nmkons,  a.debet, a.kredit FROM ptnmuakunbk.jurnaldtlfk_ppn a
            LEFT JOIN paslama b
            ON a.nobilling = b.norj
            LEFT JOIN konsumen c
            ON a.kdkons = c.kdkons
            WHERE tgltrans BETWEEN '".$tglawal."' AND '".$tglakhir."'
            UNION ALL
            SELECT a.nobilling, a.jnstrans, a.nobukti, a.noposting, b.nmpasien, c.nmkons,  a.debet, a.kredit FROM ptnmuakunbk.jurnaldtlfm_ppn a
            LEFT JOIN paslama b
            ON a.nobilling = b.norj
            LEFT JOIN konsumen c
            ON a.kdkons = c.kdkons
            WHERE tgltrans BETWEEN '".$tglawal."' AND '".$tglakhir."'
         ")->result();
      }elseif ($lokasi == "RSMU") {
         return $this->load->database('db_rsmu', TRUE)->query("
            SELECT a.nobilling, a.jnstrans, a.nobukti, a.noposting, b.nmpasien, c.nmkons,  a.debet, a.kredit FROM ptnmuakunbk.jurnaldtlfk_ppn a
            LEFT JOIN paslama b
            ON a.nobilling = b.norj
            LEFT JOIN konsumen c
            ON a.kdkons = c.kdkons
            WHERE tgltrans BETWEEN '".$tglawal."' AND '".$tglakhir."'
            UNION ALL
            SELECT a.nobilling, a.jnstrans, a.nobukti, a.noposting, b.nmpasien, c.nmkons,  a.debet, a.kredit FROM ptnmuakunbk.jurnaldtlfm_ppn a
            LEFT JOIN paslama b
            ON a.nobilling = b.norj
            LEFT JOIN konsumen c
            ON a.kdkons = c.kdkons
            WHERE tgltrans BETWEEN '".$tglawal."' AND '".$tglakhir."'
         ")->result();
      }
   }

   // Untuk Query 3
   function mshow_hasil_query3($tglawal, $tglakhir, $lokasi) {
      if ($lokasi == "RSG"){
         return $this->load->database('db_rsg', TRUE)->query("
            SELECT tanggal, noper, naper, debet, kredit, jmluang FROM jurnalposting
            WHERE tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
         ")->result();
      }elseif ($lokasi == "RST") {
         return $this->load->database('db_rst', TRUE)->query("
            SELECT tanggal, noper, naper, debet, kredit, jmluang FROM jurnalposting
            WHERE tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
         ")->result();
      }elseif ($lokasi == "RSP") {
         return $this->load->database('db_rsp', TRUE)->query("
            SELECT tanggal, noper, naper, debet, kredit, jmluang FROM jurnalposting
            WHERE tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
         ")->result();
      }elseif ($lokasi == "RSMU") {
         return $this->load->database('db_rsmu', TRUE)->query("
            SELECT tanggal, noper, naper, debet, kredit, jmluang FROM jurnalposting
            WHERE tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
         ")->result();
      }
   }

   // Untuk Query 4
   function mshow_hasil_query4($tglawal, $tglakhir, $lokasi) {
      if ($lokasi == "RSG"){
         return $this->load->database('db_rsg', TRUE)->query("
            SELECT a.nori, a.nomrm, a.tanggal, b.nmpasien, c.nmkons, SUM(a.jmltotal) AS total FROM notainap2 a
            LEFT JOIN pasien b
            ON a.nomrm = b.nomrm
            LEFT JOIN konsumen c
            ON a.kdkons = c.kdkons
            WHERE a.tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
            GROUP BY a.nori
         ")->result();
      }elseif ($lokasi == "RST") {
         return $this->load->database('db_rst', TRUE)->query("
            SELECT a.nori, a.nomrm, a.tanggal, b.nmpasien, c.nmkons, SUM(a.jmltotal) AS total FROM notainap2 a
            LEFT JOIN pasien b
            ON a.nomrm = b.nomrm
            LEFT JOIN konsumen c
            ON a.kdkons = c.kdkons
            WHERE a.tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
            GROUP BY a.nori
         ")->result();
      }elseif ($lokasi == "RSP") {
         return $this->load->database('db_rsp', TRUE)->query("
            SELECT a.nori, a.nomrm, a.tanggal, b.nmpasien, c.nmkons, SUM(a.jmltotal) AS total FROM notainap2 a
            LEFT JOIN pasien b
            ON a.nomrm = b.nomrm
            LEFT JOIN konsumen c
            ON a.kdkons = c.kdkons
            WHERE a.tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
            GROUP BY a.nori
         ")->result();
      }elseif ($lokasi == "RSMU") {
         return $this->load->database('db_rsmu', TRUE)->query("
            SELECT a.nori, a.nomrm, a.tanggal, b.nmpasien, c.nmkons, SUM(a.jmltotal) AS total FROM notainap2 a
            LEFT JOIN pasien b
            ON a.nomrm = b.nomrm
            LEFT JOIN konsumen c
            ON a.kdkons = c.kdkons
            WHERE a.tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
            GROUP BY a.nori
         ")->result();
      }
   }

   // Untuk Query 5
   function mshow_hasil_query5($tglawal, $tglakhir, $lokasi) {
      if ($lokasi == "RSG"){
         return $this->load->database('db_rsg', TRUE)->query("
            SELECT a.norj, a.nomrm, a.tanggal, b.nmpasien, c.nmkons, SUM(a.jmlharga) AS total FROM klnota2 a
            LEFT JOIN pasien b
            ON a.nomrm = b.nomrm
            LEFT JOIN konsumen c
            ON a.kdkons = c.kdkons
            WHERE a.tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
            GROUP BY a.norj
         ")->result();
      }elseif ($lokasi == "RST") {
         return $this->load->database('db_rst', TRUE)->query("
            SELECT a.norj, a.nomrm, a.tanggal, b.nmpasien, c.nmkons, SUM(a.jmlharga) AS total FROM klnota2 a
            LEFT JOIN pasien b
            ON a.nomrm = b.nomrm
            LEFT JOIN konsumen c
            ON a.kdkons = c.kdkons
            WHERE a.tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
            GROUP BY a.norj
         ")->result();
      }elseif ($lokasi == "RSP") {
         return $this->load->database('db_rsp', TRUE)->query("
            SELECT a.norj, a.nomrm, a.tanggal, b.nmpasien, c.nmkons, SUM(a.jmlharga) AS total FROM klnota2 a
            LEFT JOIN pasien b
            ON a.nomrm = b.nomrm
            LEFT JOIN konsumen c
            ON a.kdkons = c.kdkons
            WHERE a.tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
            GROUP BY a.norj
         ")->result();
      }elseif ($lokasi == "RSMU") {
         return $this->load->database('db_rsmu', TRUE)->query("
            SELECT a.norj, a.nomrm, a.tanggal, b.nmpasien, c.nmkons, SUM(a.jmlharga) AS total FROM klnota2 a
            LEFT JOIN pasien b
            ON a.nomrm = b.nomrm
            LEFT JOIN konsumen c
            ON a.kdkons = c.kdkons
            WHERE a.tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
            GROUP BY a.norj
         ")->result();
      }
   }

   // Untuk Query 6
   function mshow_hasil_query6($tglawal, $tglakhir, $lokasi) {
      if ($lokasi == "RSG"){
         return $this->load->database('db_rsg', TRUE)->query("
            SELECT b.nmdokter, b.nmahli, COUNT(DISTINCT a.nomrm) AS jumlah FROM klnota2 AS a
            LEFT JOIN mtdokter AS b
            ON a.kddokter = b.kddokter
            LEFT JOIN tindakan1 AS c
            ON a.kode1 = c.kode1
            WHERE a.kode4 = 'h001'
            AND a.tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
            GROUP BY b.nmdokter DESC
         ")->result();
      }elseif ($lokasi == "RST") {
         return $this->load->database('db_rst', TRUE)->query("
            SELECT b.nmdokter, b.nmahli, COUNT(DISTINCT a.nomrm) AS jumlah FROM klnota2 AS a
            LEFT JOIN mtdokter AS b
            ON a.kddokter = b.kddokter
            LEFT JOIN tindakan1 AS c
            ON a.kode1 = c.kode1
            WHERE a.kode4 = 'h001'
            AND a.tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
            GROUP BY b.nmdokter DESC
         ")->result();
      }elseif ($lokasi == "RSP") {
         return $this->load->database('db_rsp', TRUE)->query("
            SELECT b.nmdokter, b.nmahli, COUNT(DISTINCT a.nomrm) AS jumlah FROM klnota2 AS a
            LEFT JOIN mtdokter AS b
            ON a.kddokter = b.kddokter
            LEFT JOIN tindakan1 AS c
            ON a.kode1 = c.kode1
            WHERE a.kode4 = 'h001'
            AND a.tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
            GROUP BY b.nmdokter DESC
         ")->result();
      }elseif ($lokasi == "RSMU") {
         return $this->load->database('db_rsmu', TRUE)->query("
            SELECT b.nmdokter, b.nmahli, COUNT(DISTINCT a.nomrm) AS jumlah FROM klnota2 AS a
            LEFT JOIN mtdokter AS b
            ON a.kddokter = b.kddokter
            LEFT JOIN tindakan1 AS c
            ON a.kode1 = c.kode1
            WHERE a.kode4 = 'h001'
            AND a.tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
            GROUP BY b.nmdokter DESC
         ")->result();
      }
   }

   // Untuk Query 7
   function mshow_hasil_query7($tglawal, $tglakhir, $lokasi) {
      if ($lokasi == "RSG"){
         return $this->load->database('db_rsg', TRUE)->query("
            SELECT b.nmdokter, b.nmahli, a.tanggal, d.nmkons, a.keterangan, SUM(a.jmlharga) AS harga FROM klnota2 a
            LEFT JOIN mtdokter b
            ON a.kddokter = b.kddokter
            LEFT JOIN tindakan1 c
            ON a.kode1 = c.kode1
            LEFT JOIN konsumen d
            ON a.kdkons = d.kdkons
            WHERE a.kode4 = 'h001'
            AND a.tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
            GROUP BY b.nmdokter DESC
         ")->result();
      }elseif ($lokasi == "RST") {
         return $this->load->database('db_rst', TRUE)->query("
            SELECT b.nmdokter, b.nmahli, a.tanggal, d.nmkons, a.keterangan, SUM(a.jmlharga) AS harga FROM klnota2 a
            LEFT JOIN mtdokter b
            ON a.kddokter = b.kddokter
            LEFT JOIN tindakan1 c
            ON a.kode1 = c.kode1
            LEFT JOIN konsumen d
            ON a.kdkons = d.kdkons
            WHERE a.kode4 = 'h001'
            AND a.tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
            GROUP BY b.nmdokter DESC
         ")->result();
      }elseif ($lokasi == "RSP") {
         return $this->load->database('db_rsp', TRUE)->query("
            SELECT b.nmdokter, b.nmahli, a.tanggal, d.nmkons, a.keterangan, SUM(a.jmlharga) AS harga FROM klnota2 a
            LEFT JOIN mtdokter b
            ON a.kddokter = b.kddokter
            LEFT JOIN tindakan1 c
            ON a.kode1 = c.kode1
            LEFT JOIN konsumen d
            ON a.kdkons = d.kdkons
            WHERE a.kode4 = 'h001'
            AND a.tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
            GROUP BY b.nmdokter DESC
         ")->result();
      }elseif ($lokasi == "RSMU") {
         return $this->load->database('db_rsmu', TRUE)->query("
            SELECT b.nmdokter, b.nmahli, a.tanggal, d.nmkons, a.keterangan, SUM(a.jmlharga) AS harga FROM klnota2 a
            LEFT JOIN mtdokter b
            ON a.kddokter = b.kddokter
            LEFT JOIN tindakan1 c
            ON a.kode1 = c.kode1
            LEFT JOIN konsumen d
            ON a.kdkons = d.kdkons
            WHERE a.kode4 = 'h001'
            AND a.tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
            GROUP BY b.nmdokter DESC
         ")->result();
      }
   }

   // Untuk Query 8
   function mshow_hasil_query8($tglawal, $tglakhir, $lokasi) {
      if ($lokasi == "RSG"){
         return $this->load->database('db_rsg', TRUE)->query("
            SELECT b.nmdokter, b.nmahli, a.tanggal, d.nmkons, a.keterangan, SUM(a.jmltotal) AS harga FROM notainap2 a
            LEFT JOIN mtdokter b
            ON a.kddokter = b.kddokter
            LEFT JOIN tindakan1 c
            ON a.kode1 = c.kode1
            LEFT JOIN konsumen d
            ON a.kdkons = d.kdkons
            WHERE a.kode4 = 'h001'
            AND a.tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
            GROUP BY b.nmdokter DESC
         ")->result();
      }elseif ($lokasi == "RST") {
         return $this->load->database('db_rst', TRUE)->query("
            SELECT b.nmdokter, b.nmahli, a.tanggal, d.nmkons, a.keterangan, SUM(a.jmltotal) AS harga FROM notainap2 a
            LEFT JOIN mtdokter b
            ON a.kddokter = b.kddokter
            LEFT JOIN tindakan1 c
            ON a.kode1 = c.kode1
            LEFT JOIN konsumen d
            ON a.kdkons = d.kdkons
            WHERE a.kode4 = 'h001'
            AND a.tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
            GROUP BY b.nmdokter DESC
         ")->result();
      }elseif ($lokasi == "RSP") {
         return $this->load->database('db_rsp', TRUE)->query("
            SELECT b.nmdokter, b.nmahli, a.tanggal, d.nmkons, a.keterangan, SUM(a.jmltotal) AS harga FROM notainap2 a
            LEFT JOIN mtdokter b
            ON a.kddokter = b.kddokter
            LEFT JOIN tindakan1 c
            ON a.kode1 = c.kode1
            LEFT JOIN konsumen d
            ON a.kdkons = d.kdkons
            WHERE a.kode4 = 'h001'
            AND a.tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
            GROUP BY b.nmdokter DESC
         ")->result();
      }elseif ($lokasi == "RSMU") {
         return $this->load->database('db_rsmu', TRUE)->query("
            SELECT b.nmdokter, b.nmahli, a.tanggal, d.nmkons, a.keterangan, SUM(a.jmltotal) AS harga FROM notainap2 a
            LEFT JOIN mtdokter b
            ON a.kddokter = b.kddokter
            LEFT JOIN tindakan1 c
            ON a.kode1 = c.kode1
            LEFT JOIN konsumen d
            ON a.kdkons = d.kdkons
            WHERE a.kode4 = 'h001'
            AND a.tanggal BETWEEN '".$tglawal."' AND '".$tglakhir."'
            GROUP BY b.nmdokter DESC
         ")->result();
      }
   }

   // Untuk Query 9
   function mshow_hasil_query9($tglawal, $tglakhir, $lokasi) {
      if ($lokasi == "RSG"){
         return $this->load->database('db_rsg', TRUE)->query("
            SELECT 
               a.`tgltrans`,
               b.nmpasien,
               a.nori, 
               a.`noposting`,
               c.nmkons,
               a.jnstrans,
               (SELECT SUM(debet-kredit) FROM ptnmuakunbk.`jurnaldtlfm` WHERE nori = a.nori AND noper LIKE '1%') AS piutang,
               (SELECT SUM(kredit) FROM ptnmuakunbk.`jurnaldtlfm` WHERE nori = a.nori AND noper LIKE '2%') AS hrdr,
               (SELECT SUM(debet) FROM ptnmuakunbk.`jurnaldtlfm` WHERE nori = a.nori AND noper LIKE '4%') AS debet,
               (SELECT SUM(kredit) FROM ptnmuakunbk.`jurnaldtlfm` WHERE nori = a.nori AND noper LIKE '4%') AS kredit
            FROM ptnmuakunbk.jurnaldtlfm a
            LEFT JOIN ptnmusimrs_rsg.dafinap b ON (a.nori = b.`nori`)
            LEFT JOIN ptnmusimrs_rsg.`konsumen` c ON (a.kdkons = c.kdkons)
            WHERE 
                     a.tgltrans BETWEEN '".$tglawal."' AND '".$tglakhir."'
                     AND a.jnstrans = 'RI'
            GROUP BY a.nori
            ORDER BY a.tgltrans, a.nori
         ")->result();
      }elseif ($lokasi == "RST") {
         return $this->load->database('db_rst', TRUE)->query("
            SELECT 
               a.`tgltrans`,
               b.nmpasien,
               a.nori, 
               a.`noposting`,
               c.nmkons,
               a.jnstrans,
               (SELECT SUM(debet-kredit) FROM ptnmuakunbk.`jurnaldtlfm` WHERE nori = a.nori AND noper LIKE '1%') AS piutang,
               (SELECT SUM(kredit) FROM ptnmuakunbk.`jurnaldtlfm` WHERE nori = a.nori AND noper LIKE '2%') AS hrdr,
               (SELECT SUM(debet) FROM ptnmuakunbk.`jurnaldtlfm` WHERE nori = a.nori AND noper LIKE '4%') AS debet,
               (SELECT SUM(kredit) FROM ptnmuakunbk.`jurnaldtlfm` WHERE nori = a.nori AND noper LIKE '4%') AS kredit
            FROM ptnmuakunbk.jurnaldtlfm a
            LEFT JOIN ptnmusimrs_rst.dafinap b ON (a.nori = b.`nori`)
            LEFT JOIN ptnmusimrs_rst.`konsumen` c ON (a.kdkons = c.kdkons)
            WHERE 
                     a.tgltrans BETWEEN '".$tglawal."' AND '".$tglakhir."'
                     AND a.jnstrans = 'RI'
            GROUP BY a.nori
            ORDER BY a.tgltrans, a.nori
         ")->result();
      }elseif ($lokasi == "RSP") {
         return $this->load->database('db_rsp', TRUE)->query("
            SELECT 
               a.`tgltrans`,
               b.nmpasien,
               a.nori, 
               a.`noposting`,
               c.nmkons,
               a.jnstrans,
               (SELECT SUM(debet-kredit) FROM ptnmuakunbk.`jurnaldtlfm` WHERE nori = a.nori AND noper LIKE '1%') AS piutang,
               (SELECT SUM(kredit) FROM ptnmuakunbk.`jurnaldtlfm` WHERE nori = a.nori AND noper LIKE '2%') AS hrdr,
               (SELECT SUM(debet) FROM ptnmuakunbk.`jurnaldtlfm` WHERE nori = a.nori AND noper LIKE '4%') AS debet,
               (SELECT SUM(kredit) FROM ptnmuakunbk.`jurnaldtlfm` WHERE nori = a.nori AND noper LIKE '4%') AS kredit
            FROM ptnmuakunbk.jurnaldtlfm a
            LEFT JOIN ptnmusimrs.dafinap b ON (a.nori = b.`nori`)
            LEFT JOIN ptnmusimrs.`konsumen` c ON (a.kdkons = c.kdkons)
            WHERE 
                     a.tgltrans BETWEEN '".$tglawal."' AND '".$tglakhir."'
                     AND a.jnstrans = 'RI'
            GROUP BY a.nori
            ORDER BY a.tgltrans, a.nori
         ")->result();
      }elseif ($lokasi == "RSMU") {
         return $this->load->database('db_rsmu', TRUE)->query("
            SELECT 
               a.`tgltrans`,
               b.nmpasien,
               a.nori, 
               a.`noposting`,
               c.nmkons,
               a.jnstrans,
               (SELECT SUM(debet-kredit) FROM ptnmuakunbk.`jurnaldtlfm` WHERE nori = a.nori AND noper LIKE '1%') AS piutang,
               (SELECT SUM(kredit) FROM ptnmuakunbk.`jurnaldtlfm` WHERE nori = a.nori AND noper LIKE '2%') AS hrdr,
               (SELECT SUM(debet) FROM ptnmuakunbk.`jurnaldtlfm` WHERE nori = a.nori AND noper LIKE '4%') AS debet,
               (SELECT SUM(kredit) FROM ptnmuakunbk.`jurnaldtlfm` WHERE nori = a.nori AND noper LIKE '4%') AS kredit
            FROM ptnmuakunbk.jurnaldtlfm a
            LEFT JOIN ptnmusimrs_rsmu.dafinap b ON (a.nori = b.`nori`)
            LEFT JOIN ptnmusimrs_rsmu.`konsumen` c ON (a.kdkons = c.kdkons)
            WHERE 
                     a.tgltrans BETWEEN '".$tglawal."' AND '".$tglakhir."'
                     AND a.jnstrans = 'RI'
            GROUP BY a.nori
            ORDER BY a.tgltrans, a.nori
         ")->result();
      }
   }

   // Untuk Query 10
   function mshow_hasil_query10($tglawal, $tglakhir, $lokasi) {
      if ($lokasi == "RSG"){
         return $this->load->database('db_rsg', TRUE)->query("
            SELECT 
                     a.`tgltrans`,
                     b.nmpasien,
                     a.norj, 
                     a.`noposting`,
                     c.nmkons,
                     a.jnstrans,
                     (SELECT SUM(debet-kredit) FROM ptnmuakunbk.`jurnaldtlfm` WHERE norj = a.norj AND noper LIKE '1%') AS piutang,
                     (SELECT SUM(kredit) FROM ptnmuakunbk.`jurnaldtlfm` WHERE norj = a.norj AND noper LIKE '2%') AS hrdr,
                     (SELECT SUM(debet) FROM ptnmuakunbk.`jurnaldtlfm` WHERE norj = a.norj AND noper LIKE '4%') AS debet,
                     (SELECT SUM(kredit) FROM ptnmuakunbk.`jurnaldtlfm` WHERE norj = a.norj AND noper LIKE '4%') AS kredit
            FROM ptnmuakunbk.jurnaldtlfm a
            LEFT JOIN ptnmusimrs_rsg.paslama b ON (a.norj = b.`norj`)
            LEFT JOIN ptnmusimrs_rsg.`konsumen` c ON (a.kdkons = c.kdkons)
            WHERE 
                     a.tgltrans BETWEEN '".$tglawal."' AND '".$tglakhir."'
                     AND a.jnstrans = 'RJ'
            GROUP BY a.norj
            ORDER BY a.tgltrans, a.norj
         ")->result();
      }elseif ($lokasi == "RST") {
         return $this->load->database('db_rst', TRUE)->query("
            SELECT 
                     a.`tgltrans`,
                     b.nmpasien,
                     a.norj, 
                     a.`noposting`,
                     c.nmkons,
                     a.jnstrans,
                     (SELECT SUM(debet-kredit) FROM ptnmuakunbk.`jurnaldtlfm` WHERE norj = a.norj AND noper LIKE '1%') AS piutang,
                     (SELECT SUM(kredit) FROM ptnmuakunbk.`jurnaldtlfm` WHERE norj = a.norj AND noper LIKE '2%') AS hrdr,
                     (SELECT SUM(debet) FROM ptnmuakunbk.`jurnaldtlfm` WHERE norj = a.norj AND noper LIKE '4%') AS debet,
                     (SELECT SUM(kredit) FROM ptnmuakunbk.`jurnaldtlfm` WHERE norj = a.norj AND noper LIKE '4%') AS kredit
            FROM ptnmuakunbk.jurnaldtlfm a
            LEFT JOIN ptnmusimrs_rst.paslama b ON (a.norj = b.`norj`)
            LEFT JOIN ptnmusimrs_rst.`konsumen` c ON (a.kdkons = c.kdkons)
            WHERE 
                     a.tgltrans BETWEEN '".$tglawal."' AND '".$tglakhir."'
                     AND a.jnstrans = 'RJ'
            GROUP BY a.norj
            ORDER BY a.tgltrans, a.norj
         ")->result();
      }elseif ($lokasi == "RSP") {
         return $this->load->database('db_rsp', TRUE)->query("
            SELECT 
                     a.`tgltrans`,
                     b.nmpasien,
                     a.norj, 
                     a.`noposting`,
                     c.nmkons,
                     a.jnstrans,
                     (SELECT SUM(debet-kredit) FROM ptnmuakunbk.`jurnaldtlfm` WHERE norj = a.norj AND noper LIKE '1%') AS piutang,
                     (SELECT SUM(kredit) FROM ptnmuakunbk.`jurnaldtlfm` WHERE norj = a.norj AND noper LIKE '2%') AS hrdr,
                     (SELECT SUM(debet) FROM ptnmuakunbk.`jurnaldtlfm` WHERE norj = a.norj AND noper LIKE '4%') AS debet,
                     (SELECT SUM(kredit) FROM ptnmuakunbk.`jurnaldtlfm` WHERE norj = a.norj AND noper LIKE '4%') AS kredit
            FROM ptnmuakunbk.jurnaldtlfm a
            LEFT JOIN ptnmusimrs.paslama b ON (a.norj = b.`norj`)
            LEFT JOIN ptnmusimrs.`konsumen` c ON (a.kdkons = c.kdkons)
            WHERE 
                     a.tgltrans BETWEEN '".$tglawal."' AND '".$tglakhir."'
                     AND a.jnstrans = 'RJ'
            GROUP BY a.norj
            ORDER BY a.tgltrans, a.norj
         ")->result();
      }elseif ($lokasi == "RSMU") {
         return $this->load->database('db_rsmu', TRUE)->query("
            SELECT 
                     a.`tgltrans`,
                     b.nmpasien,
                     a.norj, 
                     a.`noposting`,
                     c.nmkons,
                     a.jnstrans,
                     (SELECT SUM(debet-kredit) FROM ptnmuakunbk.`jurnaldtlfm` WHERE norj = a.norj AND noper LIKE '1%') AS piutang,
                     (SELECT SUM(kredit) FROM ptnmuakunbk.`jurnaldtlfm` WHERE norj = a.norj AND noper LIKE '2%') AS hrdr,
                     (SELECT SUM(debet) FROM ptnmuakunbk.`jurnaldtlfm` WHERE norj = a.norj AND noper LIKE '4%') AS debet,
                     (SELECT SUM(kredit) FROM ptnmuakunbk.`jurnaldtlfm` WHERE norj = a.norj AND noper LIKE '4%') AS kredit
            FROM ptnmuakunbk.jurnaldtlfm a
            LEFT JOIN ptnmusimrs_rsmu.paslama b ON (a.norj = b.`norj`)
            LEFT JOIN ptnmusimrs_rsmu.`konsumen` c ON (a.kdkons = c.kdkons)
            WHERE 
                     a.tgltrans BETWEEN '".$tglawal."' AND '".$tglakhir."'
                     AND a.jnstrans = 'RJ'
            GROUP BY a.norj
            ORDER BY a.tgltrans, a.norj
         ")->result();
      }
   }

   // Untuk Query 11
   function mshow_hasil_query11($tglawal, $tglakhir, $lokasi) {
      if ($lokasi == "RSG"){
         return $this->load->database('db_rsg', TRUE)->query("
            SELECT a.* FROM ptnmusimrs_rsg.PASLAMA a
            LEFT JOIN ptnmuantri.mst_jadwal_dok b
            ON a.noidj = b.noid
            WHERE MONTH(a.tanggal) = '".date('m', strtotime($tglakhir))."'
            AND YEAR(a.tanggal) = '".date('Y', strtotime($tglakhir))."'
            AND a.noidj IN ('1971','1819','2584','1363','299')
         ")->result();
      }elseif ($lokasi == "RST") {
         return $this->load->database('db_rst', TRUE)->query("
            SELECT a.* FROM ptnmusimrs_rst.PASLAMA a
            LEFT JOIN ptnmuantri.mst_jadwal_dok b
            ON a.noidj = b.noid
            WHERE MONTH(a.tanggal) = '".date('m', strtotime($tglakhir))."'
            AND YEAR(a.tanggal) = '".date('Y', strtotime($tglakhir))."'
            AND a.noidj IN ('1971','1819','2584','1363','299')
         ")->result();
      }elseif ($lokasi == "RSP") {
         return $this->load->database('db_rsp', TRUE)->query("
            SELECT a.* FROM ptnmusimrs.PASLAMA a
            LEFT JOIN ptnmuantri.mst_jadwal_dok b
            ON a.noidj = b.noid
            WHERE MONTH(a.tanggal) = '".date('m', strtotime($tglakhir))."'
            AND YEAR(a.tanggal) = '".date('Y', strtotime($tglakhir))."'
            AND a.noidj IN ('1971','1819','2584','1363','299')
         ")->result();
      }elseif ($lokasi == "RSMU") {
         return $this->load->database('db_rsmu', TRUE)->query("
            SELECT a.* FROM ptnmusimrs_rsmu.PASLAMA a
            LEFT JOIN ptnmuantri.mst_jadwal_dok b
            ON a.noidj = b.noid
            WHERE MONTH(a.tanggal) = '".date('m', strtotime($tglakhir))."'
            AND YEAR(a.tanggal) = '".date('Y', strtotime($tglakhir))."'
            AND a.noidj IN ('1971','1819','2584','1363','299')
         ")->result();
      }
   }

   //Insert Log Login
   function insert_log($log) {
      $this->db->insert('log_aktifitas', $log);
   }
}
?>
