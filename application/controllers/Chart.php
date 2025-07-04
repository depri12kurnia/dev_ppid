<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chart extends CI_Controller
{

    // Load database
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_chart');
    }

    public function chart_kategori_bidang()
    {
        $data = $this->M_chart->get_chart_kategori_bidang();

        echo json_encode([
            'status' => true,
            'data' => $data,
            'csrf_token' => $this->security->get_csrf_hash()
        ]);
    }

    public function chart_status_year()
    {
        $data = $this->M_chart->get_status_year_stats();

        echo json_encode([
            'status' => true,
            'data' => $data,
            'csrf_token' => $this->security->get_csrf_hash()
        ]);
    }
}
