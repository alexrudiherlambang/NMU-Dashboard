<?php

class mbiaya extends ci_model {

   public function __construct() {
      parent::__construct();
   }

   // untuk menampilkan semua rekap
   function mshow_all_biaya($tglawal,$tglakhir,$nama,$lokasi) {
      $this->db->query("CALL dashboardnmu_new.proses_dashboard_ke2('$tglawal', '$tglakhir', '$nama', '$lokasi')");
      $this->db->select('*');
      $this->db->from('test.ra_dashdb3_'.$nama);
      $this->db->group_by('ketgrup');
      return $this->db->get()->result();
   }

   // untuk menampilkan detail
   function mshow_all_detail($nama, $ket) {
      $this->db->select('lokasi,tanggal,kelspesimen,rsaldolalu,rsaldosaatini,rsaldosampai,rsaldopotensi1,jmltarget,statuse');
      $this->db->from('test.ra_dashdb_'.$nama);
      $this->db->where('kelspesimen', $ket);
      $this->db->group_by('lokasi');
      $this->db->group_by('tanggal');
      return $this->db->get()->result();
   }

}
?>
