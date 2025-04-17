<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unduhan extends CI_Controller
{

    // Load database
    public function __construct()
    {
        parent::__construct();
        $this->load->model('download_model');
        $this->load->model('kategori_download_model');
        $this->load->model('jenis_download_model');
    }

    // Main page
    public function index()
    {
        $site = $this->konfigurasi_model->listing();
        $download = $this->download_model->download();
        // End paginasi

        $data = array(
            'title' => 'Download - ' . $site->namaweb,
            'deskripsi' => 'Download - ' . $site->namaweb,
            'keywords' => 'Download - ' . $site->namaweb,
            'download' => $download,
            'site' => $site,
            'isi' => 'download/informasi'
        );
        $this->load->view('layout/wrapper', $data, false);
    }

    public function informasi_publik()
    {
        $site = $this->konfigurasi_model->listing();
        $download = $this->download_model->download();
        // End paginasi

        $data = array(
            'title' => 'Download - ' . $site->namaweb,
            'deskripsi' => 'Download - ' . $site->namaweb,
            'keywords' => 'Download - ' . $site->namaweb,
            'download' => $download,
            'site' => $site,
            'isi' => 'download/informasi_publik'
        );
        $this->load->view('layout/wrapper', $data, false);
    }

    public function layanan_publik()
    {
        $site = $this->konfigurasi_model->listing();
        $download = $this->download_model->download();
        // End paginasi

        $data = array(
            'title' => 'Download - ' . $site->namaweb,
            'deskripsi' => 'Download - ' . $site->namaweb,
            'keywords' => 'Download - ' . $site->namaweb,
            'download' => $download,
            'site' => $site,
            'isi' => 'download/layanan_publik'
        );
        $this->load->view('layout/wrapper', $data, false);
    }

    public function organisasi()
    {
        $site = $this->konfigurasi_model->listing();
        $download = $this->download_model->download();
        // End paginasi

        $data = array(
            'title' => 'Download - ' . $site->namaweb,
            'deskripsi' => 'Download - ' . $site->namaweb,
            'keywords' => 'Download - ' . $site->namaweb,
            'download' => $download,
            'site' => $site,
            'isi' => 'download/organisasi'
        );
        $this->load->view('layout/wrapper', $data, false);
    }

    // Kategori
    public function kategori($slug_kategori_download)
    {
        $site = $this->konfigurasi_model->listing();
        $kategori_download = $this->kategori_download_model->read($slug_kategori_download);

        // if(count(array($kategori_download) < 1)) {
        //     redirect(base_url('oops'),'refresh');
        // }

        $id_kategori_download = $kategori_download->id_kategori_download;

        $download = $this->download_model->kategori($id_kategori_download);

        $data = array(
            'title' => 'Kategori download: ' .
                $kategori_download->nama_kategori_download,
            'deskripsi' => 'Kategori download: ' .
                $kategori_download->nama_kategori_download,
            'keywords' => 'Kategori download: ' .
                $kategori_download->nama_kategori_download,
            'download' => $download,
            'site' => $site,
            'kategori_download' => $kategori_download,
            'isi' => 'download/list'
        );
        $this->load->view('layout/wrapper', $data, false);
    }

    // jenis
    public function jenis($slug_jenis_download)
    {
        $site = $this->konfigurasi_model->listing();
        $jenis_download = $this->jenis_download_model->read($slug_jenis_download);

        // if(count(array($jenis_download) < 1)) {
        //     redirect(base_url('oops'),'refresh');
        // }

        $id_jenis_download = $jenis_download->id_jenis_download;

        $download = $this->download_model->jenis($id_jenis_download);

        $data = array(
            'title' => 'Jenis download: ' .
                $jenis_download->nama_jenis_download,
            'deskripsi' => 'Jenis download: ' .
                $jenis_download->nama_jenis_download,
            'keywords' => 'Jenis download: ' .
                $jenis_download->nama_jenis_download,
            'download' => $download,
            'site' => $site,
            'jenis_download' => $jenis_download,
            'isi' => 'download/list'
        );
        $this->load->view('layout/wrapper', $data, false);
    }

    // Read download detail
    public function read($slug_download)
    {
        $site = $this->konfigurasi_model->listing();
        $download = $this->download_model->read($slug_download);

        if (count(array($download)) < 1) {
            redirect(base_url('oops'), 'refresh');
        }

        $listing = $this->download_model->listing_read();
        $kategori = $this->nav_model->nav_download();

        $data = array(
            'title' => $download->judul_download,
            'deskripsi' => $download->judul_download,
            'keywords' => $download->judul_download,
            'download' => $download,
            'listing' => $listing,
            'kategori' => $kategori,
            'site' => $site,
            'isi' => 'download/read'
        );
        $this->load->view('layout/wrapper', $data, false);
    }

    // Unduh
    public function unduh($id_download)
    {
        $this->load->helper('download');
        $download = $this->download_model->detail($id_download);
        // Contents of photo.jpg will be automatically read
        force_download('./assets/upload/file/' . $download->gambar, null);
    }
    // Sorting Berdasarkan kategori
    public function sertifikat()
    {
        $site = $this->konfigurasi_model->listing();
        $download = $this->download_model->download();
        $download = $this->download_model->listingSertifikat();
        // End paginasi

        $data = array(
            'title' => 'Dokumen - ' . $site->namaweb,
            'deskripsi' => 'Dokumen - ' . $site->namaweb,
            'keywords' => 'Dokumen - ' . $site->namaweb,
            'dokumen' => $download,
            'site' => $site,
            'isi' => 'download/list_sertifikat'
        );
        $this->load->view('layout/wrapper', $data, false);
    }

    public function pedoman()
    {
        $site = $this->konfigurasi_model->listing();
        $download = $this->download_model->download();
        $download = $this->download_model->listingPedoman();
        // End paginasi

        $data = array(
            'title' => 'Dokumen - ' . $site->namaweb,
            'deskripsi' => 'Dokumen - ' . $site->namaweb,
            'keywords' => 'Dokumen - ' . $site->namaweb,
            'dokumen' => $download,
            'site' => $site,
            'isi' => 'download/list_pedoman'
        );
        $this->load->view('layout/wrapper', $data, false);
    }
}

/* End of file Download.php */
/* Location: ./application/controllers/Download.php */
