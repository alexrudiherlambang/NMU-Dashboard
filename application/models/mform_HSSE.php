<?php

class mform_HSSE extends ci_model {

   public function __construct() {
      parent::__construct();
   }
   //SHOW DATA LIMBAH
   function mshow_all_limbah() {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('id_limbah,email,unit,nip,napeg,status,fungsi,bulan,tahun,suhu,bod,cod,tss,ph,nh3,po4,coliform,lab,lastupdate');
      $this->db->from('hsse_limbah');
      $this->db->order_by('id_limbah', 'desc');
      return $this->db->get()->result();
   }

   //SHOW DATA LIMBAH YANG DIHAPUS
   function mshow_all_del_limbah() {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('id_limbah,email,unit,nip,napeg,status,fungsi,bulan,tahun,suhu,bod,cod,tss,ph,nh3,po4,coliform,lab,lastupdate');
      $this->db->from('x_after_del_hsse_limbah');
      $this->db->order_by('id_limbah', 'desc');
      return $this->db->get()->result();
   }

   //INSERT DATA LIMBAH
   function minsert_limbah($data) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->insert('hsse_limbah', $data);
   }

   //SHOW DATA LIMBAH
   function mselect_by_id_limbah($id_limbah) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('id_limbah,email,unit,nip,napeg,status,fungsi,bulan,tahun,suhu,bod,cod,tss,ph,nh3,po4,coliform,lab,lastupdate');
      $this->db->from('hsse_limbah');
      $this->db->where('id_limbah', $id_limbah);
      return $this->db->get()->row();
   }

   //UPDATE DATA LIMBAH BERDASARKAN ID
   function mupdate_limbah($update, $id_limbah){
      $this->db = $this->load->database('local', TRUE);
      $this->db->where('id_limbah', $id_limbah);
      $this->db->update('hsse_limbah', $update);
   }

   //DELETE DATA LIMBAH
   function mdelete_limbah($id_limbah){
      $this->db = $this->load->database('local', TRUE);
      $this->db->where('id_limbah', $id_limbah);
      $this->db->delete('hsse_limbah');
   }

   //SHOW DATA MAN HOUR
   function mshow_all_man_hour() {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('id_man_hour,email,unit,nip,napeg,status,fungsi,bulan,tahun,man_hour,lastupdate');
      $this->db->from('hsse_man_hour');
      $this->db->order_by('id_man_hour', 'desc');
      return $this->db->get()->result();
   }

   //SHOW DATA MAN HOUR YANG DIHAPUS
   function mshow_all_del_man_hour() {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('id_man_hour,email,unit,nip,napeg,status,fungsi,bulan,tahun,man_hour,lastupdate');
      $this->db->from('x_after_del_hsse_man_hour');
      $this->db->order_by('id_man_hour', 'desc');
      return $this->db->get()->result();
   }

   //INSERT DATA MAN HOUR
   function minsert_man_hour($data) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->insert('hsse_man_hour', $data);
   }

   //SHOW DATA MAN HOUR
   function mselect_by_id_man_hour($id_man_hour) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('id_man_hour,email,unit,nip,napeg,status,fungsi,bulan,tahun,man_hour,lastupdate');
      $this->db->from('hsse_man_hour');
      $this->db->where('id_man_hour', $id_man_hour);
      return $this->db->get()->row();
   }

   //UPDATE DATA MAN HOUR BERDASARKAN ID
   function mupdate_man_hour($update, $id_man_hour){
      $this->db = $this->load->database('local', TRUE);
      $this->db->where('id_man_hour', $id_man_hour);
      $this->db->update('hsse_man_hour', $update);
   }

   //DELETE DATA MAN HOUR
   function mdelete_man_hour($id_man_hour){
      $this->db = $this->load->database('local', TRUE);
      $this->db->where('id_man_hour', $id_man_hour);
      $this->db->delete('hsse_man_hour');
   }

   //SHOW DATA OTHER
   function mshow_all_other($jenis) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('id_other,sub_jenis,email,unit,nip,napeg,status,fungsi,nama_korban,status_korban,ktp,aktifitas,incident,tindakan,deskripsi,lokasi,tgl_waktu,bukti,lastupdate');
      $this->db->from('hsse_other');
      $this->db->where('jenis', $jenis);
      $this->db->order_by('id_other', 'desc');
      return $this->db->get()->result();
   }

   //SHOW DATA OTHER YANG DIHAPUS
   function mshow_all_del_other($jenis) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('id_other,sub_jenis,email,unit,nip,napeg,status,fungsi,nama_korban,status_korban,ktp,aktifitas,incident,tindakan,deskripsi,lokasi,tgl_waktu,bukti,lastupdate');
      $this->db->from('x_after_del_hsse_other');
      $this->db->where('jenis', $jenis);
      $this->db->order_by('id_other', 'desc');
      return $this->db->get()->result();
   }

   //SHOW DATA OTHER
   function mselect_by_id_other($id_other) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('id_other,jenis,sub_jenis,email,unit,nip,napeg,status,fungsi,nama_korban,status_korban,ktp,aktifitas,incident,tindakan,deskripsi,lokasi,tgl_waktu,bukti,lastupdate');
      $this->db->from('hsse_other');
      $this->db->where('id_other', $id_other);
      return $this->db->get()->row();
   }

   //INSERT DATA OTHER
   function minsert_other($simpan) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->insert('hsse_other', $simpan);
   }

   //UPDATE DATA OTHER BERDASARKAN ID
   function mupdate_other($update, $id_other){
      $this->db = $this->load->database('local', TRUE);
      $this->db->where('id_other', $id_other);
      $this->db->update('hsse_other', $update);
   }

   //DELETE DATA OTHER
   function mdelete_other($id_other){
      $this->db = $this->load->database('local', TRUE);
      $this->db->where('id_other', $id_other);
      $this->db->delete('hsse_other');
   }

   //SHOW DATA PROPERTY DAMAGE
   function mshow_all_property($jenis) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('id_property,sub_jenis,email,unit,nip,napeg,status,fungsi,nama_alat,detil_item,penyebab,deskripsi,lokasi,tgl_waktu,bukti,lastupdate');
      $this->db->from('hsse_property');
      $this->db->where('jenis', $jenis);
      $this->db->order_by('id_property', 'desc');
      return $this->db->get()->result();
   }

   //SHOW DATA PROPERTY DAMAGE YANG DIHAPUS
   function mshow_all_del_property($jenis) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('id_property,sub_jenis,email,unit,nip,napeg,status,fungsi,nama_alat,detil_item,penyebab,deskripsi,lokasi,tgl_waktu,bukti,lastupdate');
      $this->db->from('x_after_del_hsse_property');
      $this->db->where('jenis', $jenis);
      $this->db->order_by('id_property', 'desc');
      return $this->db->get()->result();
   }

   //SHOW DATA PROPERTY DAMAGE
   function mselect_by_id_property($id_property) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('id_property,jenis,sub_jenis,email,unit,nip,napeg,status,fungsi,nama_alat,detil_item,penyebab,deskripsi,lokasi,tgl_waktu,bukti,lastupdate');
      $this->db->from('hsse_property');
      $this->db->where('id_property', $id_property);
      return $this->db->get()->row();
   }

   //INSERT DATA PROPERTY DAMAGE
   function minsert_property($simpan) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->insert('hsse_property', $simpan);
   }

   //UPDATE DATA PROPERTY DAMAGE BERDASARKAN ID
   function mupdate_property($update, $id_property){
      $this->db = $this->load->database('local', TRUE);
      $this->db->where('id_property', $id_property);
      $this->db->update('hsse_property', $update);
   }

   //DELETE DATA PROPERTY DAMAGE
   function mdelete_property($id_property){
      $this->db = $this->load->database('local', TRUE);
      $this->db->where('id_property', $id_property);
      $this->db->delete('hsse_property');
   }

   //SHOW DATA UNSAFE ACTION UNSAFE CONDITION
   function mshow_all_unsafe($jenis) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('id_unsafe,sub_jenis,email,unit,nip,napeg,status,fungsi,deskripsi,rtl,pic,lokasi,tgl_waktu,bukti,validasi,evidence,lastupdate');
      $this->db->from('hsse_unsafe');
      $this->db->where('jenis', $jenis);
      $this->db->order_by('id_unsafe', 'desc');
      return $this->db->get()->result();
   }

   //SHOW DATA UNSAFE ACTION UNSAFE CONDITION YANG DIHAPUS
   function mshow_all_del_unsafe($jenis) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('id_unsafe,sub_jenis,email,unit,nip,napeg,status,fungsi,deskripsi,rtl,pic,lokasi,tgl_waktu,bukti,validasi,evidence,lastupdate');
      $this->db->from('x_after_del_hsse_unsafe');
      $this->db->where('jenis', $jenis);
      $this->db->order_by('id_unsafe', 'desc');
      return $this->db->get()->result();
   }

   //SHOW DATA UNSAFE ACTION UNSAFE CONDITION
   function mselect_by_id_unsafe($id_unsafe) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->select('id_unsafe,jenis,sub_jenis,email,unit,nip,napeg,status,fungsi,deskripsi,rtl,pic,lokasi,tgl_waktu,bukti,validasi,evidence,lastupdate');
      $this->db->from('hsse_unsafe');
      $this->db->where('id_unsafe', $id_unsafe);
      return $this->db->get()->row();
   }

   //INSERT DATA UNSAFE ACTION UNSAFE CONDITION
   function minsert_unsafe($simpan) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->insert('hsse_unsafe', $simpan);
   }

   //UPDATE DATA UNSAFE ACTION UNSAFE CONDITION BERDASARKAN ID
   function mupdate_unsafe($update, $id_unsafe){
      $this->db = $this->load->database('local', TRUE);
      $this->db->where('id_unsafe', $id_unsafe);
      $this->db->update('hsse_unsafe', $update);
   }

   //DELETE DATA UNSAFE ACTION UNSAFE CONDITION
   function mdelete_unsafe($id_unsafe){
      $this->db = $this->load->database('local', TRUE);
      $this->db->where('id_unsafe', $id_unsafe);
      $this->db->delete('hsse_unsafe');
   }

   //Insert Log Login
   function insert_log($log) {
      $this->db = $this->load->database('local', TRUE);
      $this->db->insert('log_aktifitas', $log);
   }
}
?>
