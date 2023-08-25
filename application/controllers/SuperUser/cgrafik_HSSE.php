<?php

class cgrafik_HSSE extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mgrafik_HSSE'); 
    }

    function limbah() {
        if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
        redirect("clogin");
        }
      $this->load->view('content/vsuperuser/vgrafik_HSSE/vlimbah');
    }

    function hasil_limbah() {
        if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
        redirect("clogin");
        }
        // $unit = $this->input->post('unit');
        $bulan = intval(substr($this->input->post('periode'), 5, 2));
        $tahun = substr($this->input->post('periode'), 0, 4);
        $unit = $this->input->post('unit');
        $limbah = $this->mgrafik_HSSE->mshow_all_limbah($unit, $bulan, $tahun);
        foreach ($limbah->result() as $b) {
            $data =  array (
                'suhu'      => $b->suhu,
                'bod'       => $b->bod,
                'cod'       => $b->cod,
                'tss'       => $b->tss,
                'ph'        => $b->ph,
                'nh3'       => $b->nh3,
                'po4'       => $b->po4,
                'coliform'  => $b->coliform,
            );
        }
        $data['unit'] = $this->input->post('unit');
        $data['periode'] = $this->input->post('periode');
        $log = array(
            'id'		    => $this->session->userdata("id"),  
            'unit'          => $this->input->post('unit'),
            'jenis'         => 'Show Grafik HSSE',
            'platform'	    => $this->agent->platform(),
            'browser'	    => $this->agent->browser().' ('.$this->agent->version().')',
            'ip'		    => $this->input->ip_address(),
            'action'	    => 'Show Grafik HSSE Performance Data Limbah',
        );
        $this->mgrafik_HSSE->insert_log($log);
      $this->load->view('content/vsuperuser/vgrafik_HSSE/vhasil_limbah', $data);
    }

    function kejadian_kecelakaan() {
        if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
        redirect("clogin");
        }
      $this->load->view('content/vsuperuser/vgrafik_HSSE/vkejadian_kecelakaan');
    }

    function hasil_kejadian_kecelakaan() {
        if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
        redirect("clogin");
        }
        $unit = $this->input->post('unit');
        $tglawal = $this->input->post('tglawal');
        $tglakhir = $this->input->post('tglakhir');
        
        $unsafe = $this->mgrafik_HSSE->mshow_all_unsafe($unit, $tglawal, $tglakhir);
        $kejadian_kecelakaan = $this->mgrafik_HSSE->mshow_all_kejadian_kecelakaan($unit, $tglawal, $tglakhir);
        
        // Olah data menjadi format yang sesuai dengan AnyChart
        $chartData = array();
        foreach ($unsafe->result() as $item) {
            $chartData[] = array(
                'x' => "Unsafe Action/Unsafe Condition[Dalam Ratusan]",
                'value' => $item->jumlah/100
            );
        }
        foreach ($kejadian_kecelakaan as $item) {
            $chartData[] = array(
                'x' => $item['sub_jenis'],
                'value' => $item['jumlah']
            );
        }

        // Load view dengan data yang diperlukan
        $data['chartDataJSON'] = json_encode($chartData);
        $data['unit'] = $this->input->post('unit');
        $data['period'] = $this->input->post('period');
        $data['tglawal'] = $this->input->post('tglawal');
        $data['tglakhir'] = $this->input->post('tglakhir');
        $log = array(
            'id'		    => $this->session->userdata("id"),  
            'unit'          => $this->input->post('unit'),
            'jenis'         => 'Show Grafik HSSE',
            'platform'	    => $this->agent->platform(),
            'browser'	    => $this->agent->browser().' ('.$this->agent->version().')',
            'ip'		    => $this->input->ip_address(),
            'action'	    => 'Show Grafik HSSE Performance Data Kejadian Kecelakaan',
        );
        $this->mgrafik_HSSE->insert_log($log);
      $this->load->view('content/vsuperuser/vgrafik_HSSE/vhasil_kejadian_kecelakaan', $data);
    }

    function property_damage() {
        if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
        redirect("clogin");
        }
      $this->load->view('content/vsuperuser/vgrafik_HSSE/vproperty_damage');
    }

    function hasil_property_damage() {
        if ($this->session->userdata('status') != "Login" || $this->session->userdata("tlok") != "") {
        redirect("clogin");
        }
        // $unit = $this->input->post('unit');
        $unit = $this->input->post('unit');
        $tglawal = $this->input->post('tglawal');
        $tglakhir = $this->input->post('tglakhir');

        $property_damage = $this->mgrafik_HSSE->mshow_all_property_damage($unit, $tglawal, $tglakhir);

        // Process data
        $dataArray = array();
        $labels = ['KP', 'RSG', 'RST', 'RSP', 'RSMU', 'KLINIK', 'Other'];

        foreach ($property_damage->result() as $b) {
            $unit = $b->unit;
            $sub_jenis = $b->sub_jenis;
            $jumlah = $b->jumlah;

            if (!isset($dataArray[$sub_jenis])) {
                $dataArray[$sub_jenis] = array_fill(0, 7, 0);
            }

            $unitIndex = array_search($unit, $labels);
            $dataArray[$sub_jenis][$unitIndex] = $jumlah;
        }

        $datasets = array();

        foreach ($dataArray as $sub_jenis => $data) {
            $dataset = array(
                'label' => $sub_jenis,
                'data' => $data,
                'borderColor' => 'rgba(0, 0, 0, 1)',
                'backgroundColor' => 'rgba(0, 0, 0, 0.2)',
                'borderWidth' => 3
            );

            array_push($datasets, $dataset);
        }

        $chartConfig = array(
            'type' => 'bar',
            'data' => array(
                'labels' => $labels,
                'datasets' => $datasets
            ),
            'options' => array(
                'scales' => array(
                    'xAxes' => array(
                        array('gridLines' => array('display' => false))
                    ),
                    'yAxes' => array(
                        array('gridLines' => array('display' => false))
                    )
                ),
                'legend' => array('position' => 'bottom'),
                'responsive' => true
            )
        );

        $data['chartConfigJSON'] = json_encode($chartConfig);
        $data['unit'] = $this->input->post('unit');
        $data['period'] = $this->input->post('period');
        $data['tglawal'] = $this->input->post('tglawal');
        $data['tglakhir'] = $this->input->post('tglakhir');
        $log = array(
            'id'		    => $this->session->userdata("id"),  
            'unit'          => $this->input->post('unit'),
            'jenis'         => 'Show Grafik HSSE',
            'platform'	    => $this->agent->platform(),
            'browser'	    => $this->agent->browser().' ('.$this->agent->version().')',
            'ip'		    => $this->input->ip_address(),
            'action'	    => 'Show Grafik HSSE Performance Data Property Damage',
        );
        $this->mgrafik_HSSE->insert_log($log);
      $this->load->view('content/vsuperuser/vgrafik_HSSE/vhasil_property_damage', $data);
    }

}

?>