<?php

class cimport_tele extends CI_Controller {

   function __construct() {
      parent::__construct();
      $this->load->model('mimport_tele');
      $this->load->model('muser');
      
   }

   function index() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }

      $data['import'] = $this->mimport_tele->mshow_all_riwayat();
      $data['total_rsg'] = $this->mimport_tele->msum_rsg();
      $data['total_rst'] = $this->mimport_tele->msum_rst();
      $data['total_rsp'] = $this->mimport_tele->msum_rsp();
      $data['total_rsmu'] = $this->mimport_tele->msum_rsmu();
      $data['total_urj'] = $this->mimport_tele->msum_urj();
      $data['total_all'] = array_sum(array($data['total_rsg']->jumlah, $data['total_rst']->jumlah, $data['total_rsp']->jumlah, $data['total_rsmu']->jumlah, $data['total_urj']->jumlah));
      
      $this->load->view('content/vsuperuser/vimport_tele/vimport_tele', $data);
   }

   //function upload csv hasil pemeriksaan
   private function _uploadcsv(){
		$config['upload_path']          = './assets/media/csv/';
		$config['allowed_types']        = 'csv';
		$config['file_name']            = 'Telemed_' . date('YmdHis');
		$config['overwrite']			      = false;
		$config['max_size']             = 12400; // 10MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
 
		$this->load->library('upload', $config);
 
		if ($this->upload->do_upload('file')) {
			return $this->upload->data("file_name");
		}
      echo '<script language="javascript">alert("Mohon Upload file dengan format CSV !!!"); document.location="./ctambah_import_tele";</script>';
   }

    function ctambah_import_tele() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
         redirect("clogin");
      }

      $this->load->view('content/vsuperuser/vimport_tele/vinput_import');
   }

   function cinsert_import() {
      // Inject CSV file to db
      if (isset($_FILES['file'])) {
         $file_path = $_FILES['file']['tmp_name'];
            echo '<script language="javascript">alert("Mohon Tunggu Sebentar, Data Sedang di Proses !!!");</script>';
            if (($handle = fopen($file_path, "r")) !== FALSE) {
            $data = fgetcsv($handle, 1000, ",");
            //truncate before inject
            $this->mimport_tele->mtruncate_import_csv($this->input->post('unit'));
            $counter = 0;
            while (($row_data = fgetcsv($handle, 1000, ",")) !== FALSE) {
               $data = array(
                  'rs_yang_dituju'        => $row_data[0],
                  'jadwal_yang_dipilih'   => $row_data[1],
                  'jam_praktik'           => $row_data[2],
                  'company_type'          => $row_data[3],
                  'penjamin'              => $row_data[4],
                  'card_no'               => $row_data[5],
                  'unit_name'             => $row_data[6],
                  'nama_dokter'           => $row_data[7],
                  'nama_pasien'           => $row_data[8],
                  'faskes_perujuk'        => $row_data[9],
                  'status_registrasi'     => $row_data[10],
                  'status_emr'            => $row_data[11],
                  'tanggal_pendaftaran'   => $row_data[12],
                  'invoice_no'            => $row_data[13],
                  'category'              => $row_data[14],
                  'qty'                   => $row_data[15],
                  'nama_layanan'          => $row_data[16],
                  'coverage_limit'        => $row_data[17],
                  'price'                 => $row_data[18],
                  'jumlah_yang_dicover'   => $row_data[19],
                  'payment_status'        => $row_data[20],
                  'payment_not_covered'   => $row_data[21],
                  'invoice_created_at'    => $row_data[22],
                  'online_payments_id'    => $row_data[23],
               );
               $counter++;
               if ($counter % 1000 == 0) {
                  $this->mimport_tele->minsert_batch_import_csv($data, $this->input->post('unit'));
               } else {
                  $this->mimport_tele->minsert_import_csv($data, $this->input->post('unit'));
               }
               // // Break loop if exceeds 100000 rows
               // if ($counter >= 100000) {
               //    break;
               // }
            }
            fclose($handle);
            $file = $this->_uploadcsv();
            $simpan = array(
               'id'                  => $this->session->userdata("id"),
               'unit'                => $this->input->post('unit'),        
               'file'                => $file,
            );
            $this->mimport_tele->minsert_import($simpan);
            echo '<script language="javascript">alert("Import Data Berhasil !!!"); document.location="./";</script>';
         } else {
            echo '<script language="javascript">alert("Import Data Gagal, Periksa File Anda !!!"); document.location="./";</script>';
         }
     } else {
         echo '<script language="javascript">alert("Import Data Gagal, Periksa File Anda !!!"); document.location="./";</script>';
     }
   }

   function clihat_import() {
      if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
          redirect("clogin");
      }
        $id = $this->uri->segment(4);
        $data['import'] = $this->mimport_tele->mshow_all_riwayat_byid($id);
        $data['user'] = $this->muser->mselect_by_iduser($data['import']->id);
        
        $this->load->view('content/vsuperuser/vimport_tele/vlihat_import', $data);
     }

   function cdelete_import () {
      $idset = $this->uri->segment(4);
      $this->mimport_tele->mdelete_import($idset);
      redirect('SuperUser/cimport_tele');
   }
   
}
