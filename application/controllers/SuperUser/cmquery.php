<?php

class cmquery extends CI_Controller {

   function __construct() {
      parent::__construct();
      $this->load->model('mquery');
      
   }

   function index() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      
      $data['query'] = $this->mquery->mshow_all_query();

      $this->load->view('content/vsuperuser/vquery/vquery', $data);
   }

   function ctambah_query() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }
      $data['mquery'] = $this->mquery->mshow_all_masterquery();
      $this->load->view('content/vsuperuser/vquery/vinput_query', $data);
   }

   function cinsert_query() {
      $simpan = array(
         'unit'            => $this->input->post('unit'),
         'kdjns'         => $this->input->post('kdjns'), 
      );
      $this->mquery->minsert_query($simpan);
      redirect('SuperUser/cmquery');
   }

   function cedit_query() {
      $id = $this->uri->segment(4);
      $data['query'] = $this->mquery->mselect_by_idquery($id);
      $data['mquery'] = $this->mquery->mshow_all_masterquery();
      $this->load->view('content/vsuperuser/vquery/vedit_query', $data);
   }

   function cupdate_query(){
      $id = $this->input->post('id');
      $Update = array(
         'unit'            => $this->input->post('unit'),
         'kdjns'         => $this->input->post('kdjns'),
      );
      
      $this->mquery->mupdate_query($Update, $id);
      redirect('SuperUser/cmquery');
   }

   function cdelete_query() {
      $id = $this->uri->segment(4);
      $this->mquery->mdelete_query($id);
      redirect('SuperUser/cmquery');
   }
}
