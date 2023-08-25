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
    function mshow_all_property_damage($unit, $tglawal, $tglakhir) {
        $this->db = $this->load->database('local', TRUE);
        $this->db->select('jenis,sub_jenis,unit,COUNT(id_other) as jumlah ');
        $this->db->select("DATE_FORMAT(tgl_waktu, '%Y-%m') as periode");
        $this->db->from('hsse_other');
        $this->db->where('DATE(tgl_waktu)>=', $tglawal);
        $this->db->where('DATE(tgl_waktu)<=', $tglakhir);
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
    
    function mshow_all_kejadian_kecelakaan($unit, $tglawal, $tglakhir) {
        $this->db = $this->load->database('local', TRUE);
        
        // Get all distinct sub_jenis values from hcis_sub_jenis_table
        $sub_jenis_values = array(
            'Fatality',
            'Days Away From Work/Lost Time Incident',
            'Restricted Work Day Case',
            'Medical Treatment Case',
            'First Aid',
            'Nearmiss'
        );
    
        // Query to count data from hsse_other for each sub_jenis
        $this->db->select('sub_jenis, COUNT(id_other) as jumlah');
        $this->db->from('hsse_other');
        $this->db->where('DATE(tgl_waktu) >=', $tglawal);
        $this->db->where('DATE(tgl_waktu) <=', $tglakhir);
        if($unit != "KONSOLIDASI"){
            $this->db->where('unit', $unit);
        }
        $this->db->group_by('sub_jenis');
        $sub_jenis_count_result = $this->db->get()->result_array();
    
        // Create a result array with all sub_jenis values and their counts
        $result = array();
        foreach ($sub_jenis_values as $sub_jenis) {
            $found = false;
            foreach ($sub_jenis_count_result as $row) {
                if ($row['sub_jenis'] == $sub_jenis) {
                    $result[] = array(
                        'sub_jenis' => $row['sub_jenis'],
                        'jumlah' => $row['jumlah']
                    );
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                // If sub_jenis not found in result, add it with jumlah 0
                $result[] = array(
                    'sub_jenis' => $sub_jenis,
                    'jumlah' => 0
                );
            }
        }
    
        // Sort the result array based on sub_jenis order
        usort($result, function($a, $b) {
            $order = array(
                'Fatality' => 6,
                'Days Away From Work/Lost Time Incident' =>5,
                'Restricted Work Day Case' => 4,
                'Medical Treatment Case' => 3,
                'First Aid' => 2,
                'Nearmiss' => 1
            );
            return $order[$a['sub_jenis']] - $order[$b['sub_jenis']];
        });
    
        return $result;
    }   

    //SHOW COUNT DATA KEJADIAN KECELAKAAN UNSAFE
    function mshow_all_unsafe($unit, $tglawal, $tglakhir) {
        $this->db = $this->load->database('local', TRUE);
        $this->db->select('jenis,sub_jenis,COUNT(id_unsafe) as jumlah ');
        $this->db->select("DATE_FORMAT(tgl_waktu, '%Y-%m') as periode");
        $this->db->from('hsse_unsafe');
        $this->db->where('DATE(tgl_waktu)>=', $tglawal);
        $this->db->where('DATE(tgl_waktu)<=', $tglakhir);
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

    //Insert Log Login
    function insert_log($log) {
        $this->db = $this->load->database('local', TRUE);
        $this->db->insert('log_aktifitas', $log);
    }
}
?>