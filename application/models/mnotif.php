<?php

class mnotif extends ci_model {

   public function __construct() {
      parent::__construct();
   }

    // untuk menampilkan semua notif
    function mshow_all_notif() {
      $this->db->select('a.id,a.nosurat,fx_nmrekanan(a.idreken) AS nmrekanan,b.tglnotif');
      $this->db->from('pks as a');
      $this->db->join('notif as b', 'a.nosurat = b.nosurat', 'Inner');
      $this->db->order_by('tglnotif', 'dsc');
      return $this->db->get()->result();
   }
   
}
?>
