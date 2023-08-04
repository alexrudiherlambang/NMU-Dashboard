<?php

class mtabel_HSSE extends ci_model {

    public function __construct() {
        parent::__construct();
    }

    //SHOW COUNT DATA LIMBAH
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
        $this->db->select('id_limbah,jenis,unit,nip,napeg,status,fungsi,bulan,tahun,suhu,bod,cod,tss,ph,nh3,po4,coliform,lastupdate');
        $this->db->from('hsse_limbah');
        $this->db->where('bulan', $bulan);
        $this->db->where('tahun', $tahun);
        $this->db->order_by('id_limbah', 'asc');
        return $this->db->get()->result();
     }    
}
?>