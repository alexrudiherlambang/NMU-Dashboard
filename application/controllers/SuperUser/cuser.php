<?php

class cuser extends CI_Controller {

   function __construct() {
      parent::__construct();
      $this->load->model('muser');
      
   }

   function index() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      
      if ($this->session->userdata('otoritas') == "admin"){
         $data['user'] = $this->muser->mshow_all_user();
      }elseif($this->session->userdata('otoritas') == "non"){
         $id = $this->session->userdata('id');
         $data['user'] = $this->muser->mshow_all_user_nonadmin($id);
      }
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

    function ctambah_user() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }

      $this->load->view('content/vsuperuser/vuser/vinput_user');
   }

   function cinsert_user() {
      $id = $this->input->post('nama_user');
      $foto = $this->_uploadgambar($id);

      $simpan = array(
         'username'            => $this->input->post('email'),
         // 'password'            => $this->input->post('password'),
         'password_hash'       => password_hash($this->input->post("password"), PASSWORD_DEFAULT),
         'nama'                => str_replace(' ', '_', strtoupper($this->input->post('nama_user'))),
         'gender'              => $this->input->post('gender'),
         'job_title'           => $this->input->post('job_title'),
         'phone'               => $this->input->post('phone'),
         'alamat'              => $this->input->post('alamat'),
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
      redirect('SuperUser/cuser');
   }

   function clihat_user() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
          redirect("clogin");
      }
        $id_user = $this->uri->segment(4);
        $data['user'] = $this->muser->mselect_by_iduser($id_user);
        $data['log'] = $this->muser->mselect_log_login($id_user);
        $data['activity'] = $this->muser->mselect_log_activity($id_user);
        $data['role'] = $this->muser->mselect_role_user($id_user);
        $this->load->view('content/vsuperuser/vuser/vlihat_user', $data);
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
      redirect('SuperUser/cuser/clihat_user/'.$id);
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
         'tid'		         => isset($_POST['tid']) ? '1' : '0',
         'ttk'		         => isset($_POST['ttk']) ? '1' : '0',
         'ttt'		         => isset($_POST['ttt']) ? '1' : '0',
         'ttp'		         => isset($_POST['ttp']) ? '1' : '0',
         'gtk'		         => isset($_POST['gtk']) ? '1' : '0',
         'gtt'		         => isset($_POST['gtt']) ? '1' : '0',
         'gtp'		         => isset($_POST['gtp']) ? '1' : '0',
         'tmn'		         => isset($_POST['tmn']) ? '1' : '0',
         'tmp'		         => isset($_POST['tmp']) ? '1' : '0',
         'tmuk'		      => isset($_POST['tmuk']) ? '1' : '0',
         'tdr'		         => isset($_POST['tdr']) ? '1' : '0',
         'imp'		         => isset($_POST['imp']) ? '1' : '0',
         'tpp'		         => isset($_POST['tpp']) ? '1' : '0',
         'gpp'		         => isset($_POST['gpp']) ? '1' : '0',
         'ffl'		         => isset($_POST['ffl']) ? '1' : '0',
         'tmh'		         => isset($_POST['tmh']) ? '1' : '0',
         'foc'		         => isset($_POST['foc']) ? '1' : '0',
         'fops'		      => isset($_POST['fops']) ? '1' : '0',
         'fopd'		      => isset($_POST['fopd']) ? '1' : '0',
         'fon'		         => isset($_POST['fon']) ? '1' : '0',
         'fouac'		      => isset($_POST['fouac']) ? '1' : '0',
         'tpl'		         => isset($_POST['tpl']) ? '1' : '0',
         'tpkk'		      => isset($_POST['tpkk']) ? '1' : '0',
         'tppd'		      => isset($_POST['tppd']) ? '1' : '0',
         'gpl'		         => isset($_POST['gpl']) ? '1' : '0',
         'gpkk'		      => isset($_POST['gpkk']) ? '1' : '0',
         'gppd'		      => isset($_POST['gppd']) ? '1' : '0',
         'mdr'		         => isset($_POST['mdr']) ? '1' : '0',
      );
      
      $this->muser->mupdate_role_user($Update, $id);
      redirect('SuperUser/cuser/clihat_user/'.$id);
   }

   function cupdate_pass(){
      $id = $this->input->post('id');
      $Update = array(
         'username'            => $this->input->post('username'),
         // 'password'            => $this->input->post('password'),
         'password_hash'       => password_hash($this->input->post("password"), PASSWORD_DEFAULT),
      );
      
      $this->muser->mupdate_user($Update, $id);
      echo '<script language="javascript">alert("Berhasil Mengubah Data !!!"); document.location="./";</script>';
      // redirect('SuperUser/cuser/clihat_user/'.$id);
   }

   
}
