<?php

class mquery extends ci_model {

   public function __construct() {
      parent::__construct();
   }

    // untuk menampilkan semua QUERY
    function mshow_all_query() {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('a.id,a.unit,a.kdjns,b.jenis');
      $this->db->from('query as a');
      $this->db->join('mquery as b', 'b.kdjns = a.kdjns', 'left');
      $this->db->order_by('id', 'asc');
      return $this->db->get()->result();
   }

    // untuk menampilkan semua master query
    function mshow_all_masterquery() {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('kdjns,jenis,query');
      $this->db->from('mquery');
      $this->db->order_by('kdjns', 'asc');
      return $this->db->get()->result();
   }

   // untuk menampilkan semua QUERY level Unit
   function mshow_all_query_by_lokasi($lokasi) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('*');
      $this->db->from('query');
      $this->db->where('unit', $lokasi);
      $this->db->order_by('id', 'asc');
      return $this->db->get()->result();
   }

   // SELECT BERDASARKAN ID QUERY
   function mselect_by_idquery($id) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('a.*,b.jenis');
      $this->db->from('query as a');
      $this->db->join('mquery as b', 'b.kdjns = a.kdjns', 'left');
      $this->db->where('id', $id);
      return $this->db->get()->row();
   }

   //INSERT DATA QUERY
   function minsert_query($data) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->insert('query', $data);
   }

   //UPDATE BERDASARKAN ID
   function mupdate_query($Update, $id) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->where('id', $id);
      $this->db->update('query', $Update);
   }

   //DELETE
   function mdelete_query($id) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->where('id', $id);
      $this->db->delete('query');
   }
}
?>
