<?php

class cform_HSSE extends CI_Controller {

   function __construct() {
      parent::__construct();
      $this->load->model('mform_HSSE');
      
   }

   function limbah() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $data['limbah'] = $this->mform_HSSE->mshow_all_limbah();
      $this->load->view('content/vsuperuser/vform_HSSE/vlimbah', $data);
   }

   function input_limbah() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $this->load->view('content/vsuperuser/vform_HSSE/vinput_limbah');
   }

   function insert_limbah() {
      $simpan = array(
         'jenis'            => "limbah",        
         'email'            => $this->input->post('email'),        
         'unit'             => $this->input->post('unit'), 
         'nip'              => $this->input->post('nip'),        
         'napeg'            => $this->input->post('napeg'),        
         'status'           => $this->input->post('status'),        
         'fungsi'           => $this->input->post('fungsi'),        
         'suhu'             => $this->input->post('suhu'),        
         'bod'              => $this->input->post('bod'),        
         'cod'              => $this->input->post('cod'),        
         'tss'              => $this->input->post('tss'),        
         'ph'               => $this->input->post('ph'),        
         'nh3'              => $this->input->post('nh3'),        
         'po4'              => $this->input->post('po4'),        
         'coliform'         => $this->input->post('coliform'),
      );
      $this->mform_HSSE->minsert_limbah($simpan);
      $log = array(
         'id'		   => $this->session->userdata("id"),  
         'unit'      => $this->input->post('unit'),
         'jenis'     => 'Form HSSE Limbah',
         'platform'	=> $this->agent->platform(),
         'browser'	=> $this->agent->browser().' ('.$this->agent->version().')',
         'ip'		   => $this->input->ip_address(),
         'action'	   => 'Tambah Data Limbah',
      );
      $this->mform_HSSE->insert_log($log);

      redirect('SuperUser/cform_HSSE/limbah');
   }

   function edit_limbah($id_limbah) {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
         $id_limbah = $this->uri->segment(4);
         $data['limbah'] = $this->mform_HSSE->mselect_by_id_limbah($id_limbah);
      $this->load->view('content/vsuperuser/vform_HSSE/vedit_limbah', $data);
   }

   function update_limbah() {
      $id_limbah = $this->input->post('id_limbah');
      $update = array(
         'jenis'            => "limbah",        
         'email'            => $this->input->post('email'),        
         'unit'             => $this->input->post('unit'), 
         'nip'              => $this->input->post('nip'),        
         'napeg'            => $this->input->post('napeg'),        
         'status'           => $this->input->post('status'),        
         'fungsi'           => $this->input->post('fungsi'),        
         'suhu'             => $this->input->post('suhu'),        
         'bod'              => $this->input->post('bod'),        
         'cod'              => $this->input->post('cod'),        
         'tss'              => $this->input->post('tss'),        
         'ph'               => $this->input->post('ph'),        
         'nh3'              => $this->input->post('nh3'),        
         'po4'              => $this->input->post('po4'),        
         'coliform'         => $this->input->post('coliform'),
      );
      $this->mform_HSSE->mupdate_limbah($update, $id_limbah);
      $log = array(
         'id'		   => $this->session->userdata("id"),  
         'unit'      => $this->input->post('unit'),
         'jenis'     => 'Form HSSE Limbah',
         'platform'	=> $this->agent->platform(),
         'browser'	=> $this->agent->browser().' ('.$this->agent->version().')',
         'ip'		   => $this->input->ip_address(),
         'action'	   => 'Update Data Limbah Dengan Kode : '.$id_limbah,
      );
      $this->mform_HSSE->insert_log($log);
      redirect('SuperUser/cform_HSSE/limbah');
   }

   function delete_limbah() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $id_limbah = $this->uri->segment(4);
      $this->mform_HSSE->mdelete_limbah($id_limbah);
      $log = array(
         'id'		   => $this->session->userdata("id"),  
         'unit'      => $this->session->userdata("tlok"),
         'jenis'     => 'Form HSSE Limbah',
         'platform'	=> $this->agent->platform(),
         'browser'	=> $this->agent->browser().' ('.$this->agent->version().')',
         'ip'		   => $this->input->ip_address(),
         'action'	   => 'Hapus Data Limbah Dengan Kode : '.$id_limbah,
      );
      $this->mform_HSSE->insert_log($log);
      redirect('SuperUser/cform_HSSE/limbah');
   }

   function clasification() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $jenis = "clasification";
      $data['clasification'] = $this->mform_HSSE->mshow_all_other($jenis);
      $this->load->view('content/vsuperuser/vform_HSSE/vclasification', $data);
   }

   function input_clasification() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $this->load->view('content/vsuperuser/vform_HSSE/vinput_clasification');
   }

   function personal_safety() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $jenis = "personal_safety";
      $data['personal_safety'] = $this->mform_HSSE->mshow_all_other($jenis);
      $this->load->view('content/vsuperuser/vform_HSSE/vpersonal_safety', $data);
   }

   function input_personal_safety() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $this->load->view('content/vsuperuser/vform_HSSE/vinput_personal_safety');
   }

   function property_database() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $jenis = "property_database";
      $data['property_database'] = $this->mform_HSSE->mshow_all_other($jenis);
      $this->load->view('content/vsuperuser/vform_HSSE/vproperty_database', $data);
   }

   function input_property_database() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $this->load->view('content/vsuperuser/vform_HSSE/vinput_property_database');
   }
   
   function nearmiss() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $jenis = "nearmiss";
      $data['nearmiss'] = $this->mform_HSSE->mshow_all_other($jenis);
      $this->load->view('content/vsuperuser/vform_HSSE/vnearmiss', $data);
   }

   function input_nearmiss() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $this->load->view('content/vsuperuser/vform_HSSE/vinput_nearmiss');
   }

   function unsave() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $jenis = "unsave";
      $data['unsave'] = $this->mform_HSSE->mshow_all_other($jenis);
      $this->load->view('content/vsuperuser/vform_HSSE/vunsave', $data);
   }

   function input_unsave() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $this->load->view('content/vsuperuser/vform_HSSE/vinput_unsave');
   }

   function insert_other() {
      // Unggah file KTP
      $ktp = $this->_upload_file('ktp', './assets/media/images/ktp/');

      // Unggah file Bukti
      $bukti = $this->_upload_file('bukti', './assets/media/images/bukti/');

      $simpan = array(
         'jenis'           => $this->input->post('jenis'),        
         'sub_jenis'       => $this->input->post('sub_jenis'),        
         'email'           => $this->input->post('email'),        
         'unit'            => $this->input->post('unit'), 
         'nip'             => $this->input->post('nip'),        
         'napeg'           => $this->input->post('napeg'),        
         'status'          => $this->input->post('status'),        
         'fungsi'          => $this->input->post('fungsi'),        
         'total_man_hour'  => $this->input->post('total_man_hour'),        
         'nama_korban'     => $this->input->post('nama_korban'),        
         'status_korban'   => $this->input->post('status_korban'),        
         'aktifitas'       => $this->input->post('aktifitas'),        
         'incident'        => $this->input->post('incident'),        
         'tindakan'        => $this->input->post('tindakan'),        
         'deskripsi'       => $this->input->post('deskripsi'),        
         'lokasi'          => $this->input->post('lokasi'),        
         'tgl_waktu'       => $this->input->post('tgl_waktu'),
         'ktp'             => $ktp,
         'bukti'           => $bukti,
      );
      
      $this->mform_HSSE->minsert_other($simpan);
      $log = array(
         'id'		   => $this->session->userdata("id"),  
         'unit'      => $this->input->post('unit'),
         'jenis'     => 'Form HSSE Other'.$this->input->post('jenis'),
         'platform'	=> $this->agent->platform(),
         'browser'	=> $this->agent->browser().' ('.$this->agent->version().')',
         'ip'		   => $this->input->ip_address(),
         'action'	   => 'Tambah Data '.$this->input->post('jenis'),
      );
      $this->mform_HSSE->insert_log($log);

      redirect('SuperUser/cform_HSSE/'.$this->input->post('jenis'));
   }

   function edit_other($id_other) {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
         $id_other = $this->uri->segment(4);
         $jenis = $this->uri->segment(5);
         $data['other'] = $this->mform_HSSE->mselect_by_id_other($id_other);
         $this->load->view('content/vsuperuser/vform_HSSE/vedit_'.$jenis, $data);
   }

   function update_other() {
      // Unggah file KTP
      $ktp = $this->_upload_file('ktp', './assets/media/images/ktp/');

      // Unggah file Bukti
      $bukti = $this->_upload_file('bukti', './assets/media/images/bukti/');
      $id_other = $this->input->post('id_other');
      $update = array(
         'jenis'           => $this->input->post('jenis'),        
         'sub_jenis'       => $this->input->post('sub_jenis'),        
         'email'           => $this->input->post('email'),        
         'unit'            => $this->input->post('unit'), 
         'nip'             => $this->input->post('nip'),        
         'napeg'           => $this->input->post('napeg'),        
         'status'          => $this->input->post('status'),        
         'fungsi'          => $this->input->post('fungsi'),        
         'total_man_hour'  => $this->input->post('total_man_hour'),        
         'nama_korban'     => $this->input->post('nama_korban'),        
         'status_korban'   => $this->input->post('status_korban'),        
         'aktifitas'       => $this->input->post('aktifitas'),        
         'incident'        => $this->input->post('incident'),        
         'tindakan'        => $this->input->post('tindakan'),        
         'deskripsi'       => $this->input->post('deskripsi'),        
         'lokasi'          => $this->input->post('lokasi'),        
         'tgl_waktu'       => $this->input->post('tgl_waktu'),
         'ktp'             => $ktp,
         'bukti'           => $bukti,
      );
      $this->mform_HSSE->mupdate_other($update, $id_other);
      $log = array(
         'id'		   => $this->session->userdata("id"),  
         'unit'      => $this->input->post('unit'),
         'jenis'     => 'Form HSSE other',
         'platform'	=> $this->agent->platform(),
         'browser'	=> $this->agent->browser().' ('.$this->agent->version().')',
         'ip'		   => $this->input->ip_address(),
         'action'	   => 'Update Data other Dengan Kode : '.$id_other,
      );
      $this->mform_HSSE->insert_log($log);
      redirect('SuperUser/cform_HSSE/'.$this->input->post('jenis'));
   }

   function delete_other() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $id_other = $this->uri->segment(4);
      $jenis = $this->uri->segment(5);
      $this->mform_HSSE->mdelete_other($id_other);
      $log = array(
         'id'		   => $this->session->userdata("id"),  
         'unit'      => $this->session->userdata("tlok"),
         'jenis'     => 'Form HSSE Other',
         'platform'	=> $this->agent->platform(),
         'browser'	=> $this->agent->browser().' ('.$this->agent->version().')',
         'ip'		   => $this->input->ip_address(),
         'action'	   => 'Hapus Data Other Dengan Kode : '.$id_other,
      );
      $this->mform_HSSE->insert_log($log);
      redirect('SuperUser/cform_HSSE/'.$jenis);
   }

   //function upload ktp hasil pemeriksaan
   private function _upload_file($nama_input, $path_upload){
      $nama_file = "ktp_" . uniqid() . "_" . time(); // Gabungkan uniqid() dengan time() untuk nama unik
      $config['upload_path']          = $path_upload;
      $config['allowed_types']        = 'gif|jpg|jpeg|png';
      $config['file_name']            = $nama_file;
      $config['overwrite']            = false; // Setel menjadi false agar tidak menimpa file dengan nama yang sama
      $config['max_size']             = 2480; // 2MB
      // $config['max_width']            = 1024;
      // $config['max_height']           = 768;

      $this->load->library('upload', $config);

      if ($this->upload->do_upload($nama_input)) {
         return $this->upload->data("file_name");
      }
      return "default.png";
   }
}
