<?php

class cuser extends CI_Controller {

   function __construct() {
      parent::__construct();
      $this->load->model('muser');
      
   }

   function index() {
      if ($this->session->userdata('status') != "Login" || !in_array($this->session->userdata("tlok"), array("RSG", "RSP", "RST", "RSMU", "URJ"))) {
			redirect("clogin");
		}
      $lokasi = $this->session->userdata("tlok");
      $data['user'] = $this->muser->mshow_all_user_by_lokasi($lokasi);
      $this->load->view('content/vunit/vuser/vuser', $data);
   }

   //function upload gambar hasil pemeriksaan
   private function _uploadgambar($id){
		$config['upload_path']          = './assets/media/images/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		$config['file_name']            = $id;
		$config['overwrite']			      = true;
		$config['max_size']             = 1240; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
 
		$this->load->library('upload', $config);
 
		if ($this->upload->do_upload('foto')) {
			return $this->upload->data("file_name");
		}
      // return $this->upload->data("file_name");
		return "default.png";
	 }

    function ctambah_user() {
      if ($this->session->userdata('status') != "Login" || !in_array($this->session->userdata("tlok"), array("RSG", "RSP", "RST", "RSMU", "URJ"))) {
			redirect("clogin");
		}

      $this->load->view('content/vunit/vuser/vinput_user');
   }

   function cinsert_user() {
      $id = $this->input->post('nama_user');
      $foto = $this->_uploadgambar($id);

      $simpan = array(
         'username'            => $this->input->post('username'),
         'password'            => $this->input->post('password'),
         'nama'                => strtoupper($this->input->post('nama_user')),
         'foto'                => $foto,
         'eemail'              => $this->input->post('email'),
         'tlok'                => $this->input->post('level'),        
      );
      $this->muser->minsert_user($simpan);

      $id_max = $this->muser->mselect_user_max();
      //simpan id role user
      $simpan_role = array(
         'id'            => $id_max->id,
      );
      $this->muser->minsert_role_user($simpan_role);
      redirect('Unit/cuser');
   }

   function clihat_user() {
      if ($this->session->userdata('status') != "Login" || !in_array($this->session->userdata("tlok"), array("RSG", "RSP", "RST", "RSMU", "URJ"))) {
			redirect("clogin");
		}
        $id_user = $this->uri->segment(4);
        $data['user'] = $this->muser->mselect_by_iduser($id_user);
        $data['log'] = $this->muser->mselect_log_login($id_user);
        $data['activity'] = $this->muser->mselect_log_activity($id_user);
        $data['role'] = $this->muser->mselect_role_user($id_user);
        $this->load->view('content/vunit/vuser/vlihat_user', $data);
     }

     function cupdate_foto() {
      $id = $this->input->post('id');
      $nama = $this->input->post('nama');
      $foto = $this->_uploadgambar($nama);

      $simpan = array(
        'foto'                => $foto,
      );
      if ($id == $this->session->userdata("id"))
      {
         $this->session->set_userdata($simpan);
      }

      $this->muser->mupdate_user($simpan, $id);
      redirect('Unit/cuser/clihat_user/'.$id);
   }

   function cupdate_role_user(){
      $id = $this->input->post('id');
      $Update = array(
         'tum'             => isset($_POST['tum']) ? '1' : '0',
         'tkok1'		      => isset($_POST['tkok1']) ? '1' : '0',
         'tkok2'		      => isset($_POST['tkok2']) ? '1' : '0',
         'tkok3'		      => isset($_POST['tkok3']) ? '1' : '0',
         'tkok4'		      => isset($_POST['tkok4']) ? '1' : '0',
         'tkok5'		      => isset($_POST['tkok5']) ? '1' : '0',
         'tkoksk'	         => isset($_POST['tkoksk']) ? '1' : '0',
         'tkoktt'	         => isset($_POST['tkoktt']) ? '1' : '0',
         'tkokhp'	         => isset($_POST['tkokhp']) ? '1' : '0',
         'tkokbor'	      => isset($_POST['tkokbor']) ? '1' : '0',
         'tkkp1'		      => isset($_POST['tkkp1']) ? '1' : '0',
         'tkkp2'		      => isset($_POST['tkkp2']) ? '1' : '0',
         'tkkp3'		      => isset($_POST['tkkp3']) ? '1' : '0',
         'tkkb'		      => isset($_POST['tkkb']) ? '1' : '0',
         'tkklr'		      => isset($_POST['tkklr']) ? '1' : '0',
      );
      
      $this->muser->mupdate_role_user($Update, $id);
      redirect('Unit/cuser/clihat_user/'.$id);
   }

   
}
