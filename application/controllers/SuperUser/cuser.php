<?php

class cuser extends CI_Controller {

   function __construct() {
      parent::__construct();
      $this->load->model('muser');
      $this->load->model('mnotif');
      
   }

   function index() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "CONSOLE") {
         redirect("clogin");
      }
      //untuk set notifikasi
      // $data['notif'] = $this->mnotif->mshow_all_notif();

      $data['user'] = $this->muser->mshow_all_user();
      $this->load->view('content/vsuperuser/vuser/vuser', $data);
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

   function clihat_user() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "CONSOLE") {
          redirect("clogin");
      }
        $id_user = $this->uri->segment(4);
        $data['user'] = $this->muser->mselect_by_iduser($id_user);
        $this->load->view('content/vsuperuser/vuser/vlihat_user', $data);
     }

     function cupdate_foto() {
      $id = $this->input->post('kduser');
      $id = $this->input->post('id');
      $foto = $this->_uploadgambar($id);

      $simpan = array(
        'foto'                => $foto,
      );
      if ($id == $this->session->userdata("id"))
      {
         $this->session->set_userdata($simpan);
      }

      $this->muser->mupdate_user($simpan, $id);
      redirect('SuperUser/cuser/clihat_user/'.$id);
   }

   
}
