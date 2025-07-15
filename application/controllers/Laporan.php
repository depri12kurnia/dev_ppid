<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    // Load database
    public function __construct()
    {
        parent::__construct();
        $this->load->model('download_model');
        $this->load->model('kategori_download_model');
        $this->load->model('jenis_download_model');
    }


    public function laporan_akses()
    {
        $site = $this->konfigurasi_model->listing();
        $download = $this->download_model->listingLaporanAkses();

        $data = array(
            'title' => 'Laporan Akses Informasi Publik - ' . $site->namaweb,
            'deskripsi' => 'Laporan Akses Informasi Publik  - ' . $site->namaweb,
            'keywords' => 'Laporan Akses Informasi Publik  - ' . $site->namaweb,
            'download' => $download,
            'site' => $site,
            'isi' => 'download/list_akses'
        );
        $this->load->view('layout/wrapper', $data, false);
    }

    public function laporan_layanan()
    {
        $site = $this->konfigurasi_model->listing();
        $download = $this->download_model->listingLaporanLayanan();
        // End paginasi

        $data = array(
            'title' => 'Laporan Layanan Informasi Publik - ' . $site->namaweb,
            'deskripsi' => 'Laporan Layanan Informasi Publik  - ' . $site->namaweb,
            'keywords' => 'Laporan Layanan Informasi Publik  - ' . $site->namaweb,
            'download' => $download,
            'site' => $site,
            'isi' => 'download/list_layanan'
        );
        $this->load->view('layout/wrapper', $data, false);
    }

    public function laporan_survey()
    {
        $site = $this->konfigurasi_model->listing();
        $download = $this->download_model->listingLaporanSurvey();
        // End paginasi

        $data = array(
            'title' => 'Laporan Survey - ' . $site->namaweb,
            'deskripsi' => 'Laporan Survey - ' . $site->namaweb,
            'keywords' => 'Laporan Survey - ' . $site->namaweb,
            'download' => $download,
            'site' => $site,
            'isi' => 'download/list_survey'
        );
        $this->load->view('layout/wrapper', $data, false);
    }
}

/* End of file Download.php */
/* Location: ./application/controllers/Laporan.php */
