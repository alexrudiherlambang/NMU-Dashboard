<?php

class mgrafik_HSSE extends ci_model {

    public function __construct() {
        parent::__construct();
    }

    //SHOW SUM DATA LIMBAH
    function mshow_all_limbah($unit, $bulan, $tahun) {
        $this->db = $this->load->database('local', TRUE);
        $this->db->select('jenis, unit, bulan, tahun, sum(suhu) as suhu, sum(bod) as bod, , sum(cod) as cod, sum(tss) as tss, sum(ph) as ph, sum(nh3) as nh3, sum(po4) as po4, sum(coliform) as coliform');
        $this->db->from('hsse_limbah');
        $this->db->where('bulan', $bulan);
        $this->db->where('tahun', $tahun);
        if($unit != "KONSOLIDASI"){
            $this->db->where('unit', $unit);
        }  
        return $this->db->get();
    }

    //SHOW SUM DATA PROPERTY DAMAGE
    function mshow_all_property_damage($unit, $bulan, $tahun) {
        $this->db = $this->load->database('local', TRUE);
        $this->db->select('jenis,sub_jenis,unit,COUNT(id_other) as jumlah ');
        $this->db->select("DATE_FORMAT(tgl_waktu, '%Y-%m') as periode");
        $this->db->from('hsse_other');
        $this->db->where('MONTH(tgl_waktu)', $bulan);
        $this->db->where('YEAR(tgl_waktu)', $tahun);
        if($unit != "KONSOLIDASI"){
            $this->db->where('unit', $unit);
        }  
        $this->db->group_by('unit');
        $this->db->group_by('sub_jenis');
        $this->db->where('jenis', 'property_damage');
        $this->db->order_by('unit', 'asc');
        return $this->db->get();
    }

    //export excel detail limbah
    function mshow_detil_limbah($bulan, $tahun) {
        $this->db = $this->load->database('local', TRUE);
        $this->db->select('id_limbah, jenis, unit, napeg, nip, status, fungsi, bulan, tahun, sum(suhu) as suhu, sum(bod) as bod, , sum(cod) as cod, sum(tss) as tss, sum(ph) as ph, sum(nh3) as nh3, sum(po4) as po4, sum(coliform) as coliform, lastupdate');
        $this->db->from('hsse_limbah');
        $this->db->where('bulan', $bulan);
        $this->db->where('tahun', $tahun);
        $this->db->order_by('id_limbah', 'asc');
        $this->db->group_by('id_limbah');    
        return $this->db->get()->result();
    }
    
    //SHOW COUNT DATA KEJADIAN KECELAKAAN
    function mshow_all_kejadian_kecelakaan($unit, $bulan, $tahun) {
        $this->db = $this->load->database('local', TRUE);
        $this->db->select('jenis,sub_jenis,COUNT(id_other) as jumlah ');
        $this->db->select("DATE_FORMAT(tgl_waktu, '%Y-%m') as periode");
        $this->db->from('hsse_other');
        $this->db->where('MONTH(tgl_waktu)', $bulan);
        $this->db->where('YEAR(tgl_waktu)', $tahun);
        if($unit != "KONSOLIDASI"){
            $this->db->where('unit', $unit);
        }
        $this->db->group_by('sub_jenis');
        $this->db->where('jenis !=', 'property_damage');
        $this->db->where('jenis !=', 'clasification');
        $this->db->order_by("CASE 
                                WHEN sub_jenis = 'Fatality' THEN 1
                                WHEN sub_jenis = 'Days Away From Work/Lost Time Incident' THEN 2
                                WHEN sub_jenis = 'Restricted Work Day Case' THEN 3
                                WHEN sub_jenis = 'Medical Treatment Case' THEN 4
                                WHEN sub_jenis = 'First Aid' THEN 5
                                WHEN sub_jenis = 'Nearmiss' THEN 6
                                ELSE 4
                            END", 'desc');
        return $this->db->get();
    }

    //SHOW COUNT DATA KEJADIAN KECELAKAAN UNSAFE
    function mshow_all_unsafe($unit, $bulan, $tahun) {
        $this->db = $this->load->database('local', TRUE);
        $this->db->select('jenis,sub_jenis,COUNT(id_unsafe) as jumlah ');
        $this->db->select("DATE_FORMAT(tgl_waktu, '%Y-%m') as periode");
        $this->db->from('hsse_unsafe');
        $this->db->where('MONTH(tgl_waktu)', $bulan);
        $this->db->where('YEAR(tgl_waktu)', $tahun);
        if($unit != "KONSOLIDASI"){
            $this->db->where('unit', $unit);
        }
        return $this->db->get();
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
}
?>