<?php

class mtabel_HSSE extends ci_model {

    public function __construct() {
        parent::__construct();
    }

    //SHOW SUM DATA LIMBAH
    function mshow_all_limbah($unit, $bulan, $tahun) {
        $this->db = $this->load->database('local', TRUE);
        $this->db->select('id_limbah, jenis, unit, bulan, tahun, sum(suhu) as suhu, sum(bod) as bod, , sum(cod) as cod, sum(tss) as tss, sum(ph) as ph, sum(nh3) as nh3, sum(po4) as po4, sum(coliform) as coliform');
        $this->db->from('hsse_limbah');
        $this->db->where('bulan', $bulan);
        $this->db->where('tahun', $tahun);
        $this->db->where('unit', $unit);    
        return $this->db->get()->row();
    }

    //export excel detail limbah
    function mshow_detil_limbah($bulan, $tahun) {
        $this->db = $this->load->database('local', TRUE);
        $this->db->select('id_limbah, jenis, unit,napeg, nip, status, fungsi, bulan, tahun, sum(suhu) as suhu, sum(bod) as bod, , sum(cod) as cod, sum(tss) as tss, sum(ph) as ph, sum(nh3) as nh3, sum(po4) as po4, sum(coliform) as coliform, lastupdate');
        $this->db->from('hsse_limbah');
        $this->db->where('bulan', $bulan);
        $this->db->where('tahun', $tahun);
        $this->db->order_by('id_limbah', 'asc');
        $this->db->group_by('id_limbah');    
        return $this->db->get()->result();
    }
    
    //SHOW COUNT DATA KEJADIAN KECELAKAAN
    function mshow_all_kejadian_kecelakaan($unit, $tglawal, $tglakhir) {
        $this->db = $this->load->database('local', TRUE);
        $this->db->select('jenis,sub_jenis,unit,tgl_waktu,COUNT(id_other) as jumlah,lastupdate');
        $this->db->from('hsse_other');
        if($unit != "KONSOLIDASI"){
            $this->db->where('unit', $unit);
        }
        $this->db->where('DATE(tgl_waktu)>=', $tglawal);
        $this->db->where('DATE(tgl_waktu)<=', $tglakhir); 
        $this->db->group_by('sub_jenis');
        $this->db->order_by("CASE 
                                WHEN jenis = 'clasification' THEN 1
                                WHEN jenis = 'personal_safety' THEN 2
                                WHEN jenis = 'property_damage' THEN 3
                                WHEN jenis = 'other' THEN 4
                                ELSE 4
                            END", 'asc');
        return $this->db->get()->result();
    }

    //SHOW COUNT DATA KEJADIAN KECELAKAAN UNSAFE
    function mshow_all_unsafe($unit, $tglawal, $tglakhir) {
        $this->db = $this->load->database('local', TRUE);
        $this->db->select('jenis,sub_jenis,unit,tgl_waktu,COUNT(id_unsafe) as jumlah,lastupdate');
        $this->db->from('hsse_unsafe');
        if($unit != "KONSOLIDASI"){
            $this->db->where('unit', $unit);
        }
        $this->db->where('DATE(tgl_waktu)>=', $tglawal);
        $this->db->where('DATE(tgl_waktu)<=', $tglakhir); 
        $this->db->group_by('sub_jenis');
        return $this->db->get()->result();
    }
    
    //SHOW DATA MAN HOURS
    function mshow_man_hour($bulan, $tahun) {
        $this->db = $this->load->database('local', TRUE);
        $this->db->select('man_hour, bulan, tahun');
        $this->db->from('hsse_man_hour');
        $this->db->where('bulan', $bulan);
        $this->db->where('tahun', $tahun);  
        return $this->db->get()->row();
    }

    //export excel detail Kejadian Kecelakaan
    function mshow_detil_kejadian_kecelakaan($unit, $tglawal, $tglakhir) {
        $this->db = $this->load->database('local', TRUE);
        $this->db->select('id_other,jenis,sub_jenis,email,unit,nip,napeg,status,fungsi,nama_korban,status_korban,ktp,aktifitas,incident,tindakan,deskripsi,lokasi,tgl_waktu,bukti,lastupdate');
        $this->db->from('hsse_other');
        if($unit != "KONSOLIDASI"){
            $this->db->where('unit', $unit);
        }
        $this->db->where('DATE(tgl_waktu)>=', $tglawal);
        $this->db->where('DATE(tgl_waktu)<=', $tglakhir);
        $this->db->order_by('id_other', 'desc');
        return $this->db->get()->result();
    }

    function mshow_detil_unsafe($unit, $tglawal, $tglakhir) {
        $this->db = $this->load->database('local', TRUE);
        $this->db->select('id_unsafe,jenis,sub_jenis,email,unit,nip,napeg,status,fungsi,pic,rtl,deskripsi,lokasi,tgl_waktu,validasi,lastupdate');
        $this->db->from('hsse_unsafe');
        if($unit != "KONSOLIDASI"){
            $this->db->where('unit', $unit);
        }
        $this->db->where('DATE(tgl_waktu)>=', $tglawal);
        $this->db->where('DATE(tgl_waktu)<=', $tglakhir);
        $this->db->order_by('id_unsafe', 'desc');
        return $this->db->get()->result();
    }

    //Insert Log Login
    function insert_log($log) {
        $this->db = $this->load->database('local', TRUE);
        $this->db->insert('log_aktifitas', $log);
    }
}
?>