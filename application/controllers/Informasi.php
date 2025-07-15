<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends CI_Controller
{

    // Load database
    public function __construct()
    {
        parent::__construct();
        $this->load->model('download_model');
        $this->load->model('kategori_download_model');
        $this->load->model('jenis_download_model');
    }


    public function berkala()
    {
        $site = $this->konfigurasi_model->listing();
        $download = $this->download_model->listingBerkala();

        $data = array(
            'title' => 'Informasi Berkala - ' . $site->namaweb,
            'deskripsi' => 'Informasi Berkala - ' . $site->namaweb,
            'keywords' => 'Informasi Berkala - ' . $site->namaweb,
            'download' => $download,
            'site' => $site,
            'isi' => 'download/list_berkala'
        );
        $this->load->view('layout/wrapper', $data, false);
    }

    public function serta_merta()
    {
        $site = $this->konfigurasi_model->listing();
        $download = $this->download_model->listingSertaMerta();
        // End paginasi

        $data = array(
            'title' => 'Informasi Serta Merta - ' . $site->namaweb,
            'deskripsi' => 'Informasi Serta Merta - ' . $site->namaweb,
            'keywords' => 'Informasi Serta Merta - ' . $site->namaweb,
            'download' => $download,
            'site' => $site,
            'isi' => 'download/list_sertamerta'
        );
        $this->load->view('layout/wrapper', $data, false);
    }

    public function tersedia()
    {
        $site = $this->konfigurasi_model->listing();
        $download = $this->download_model->listingTersedia();
        // End paginasi

        $data = array(
            'title' => 'Informasi Tersedia Setiap Saat - ' . $site->namaweb,
            'deskripsi' => 'Informasi Tersedia Setiap Saat - ' . $site->namaweb,
            'keywords' => 'Informasi Tersedia Setiap Saat - ' . $site->namaweb,
            'download' => $download,
            'site' => $site,
            'isi' => 'download/list_tersedia'
        );
        $this->load->view('layout/wrapper', $data, false);
    }

    public function dikecualikan()
    {
        $site = $this->konfigurasi_model->listing();
        // $download = $this->download_model->listingBerkala();

        $data = array(
            'title' => 'Informasi Berkala - ' . $site->namaweb,
            'deskripsi' => 'Informasi Berkala - ' . $site->namaweb,
            'keywords' => 'Informasi Berkala - ' . $site->namaweb,
            // 'download' => $download,
            'site' => $site,
            'isi' => 'download/list_dikecualikan'
        );
        $this->load->view('layout/wrapper', $data, false);
    }

    public function standard_pelayanan()
    {
        $site = $this->konfigurasi_model->listing();
        $download = $this->download_model->listingStandardPelayanan();
        // End paginasi

        $data = array(
            'title' => 'Standar pelayanan Informasi Publik - ' . $site->namaweb,
            'deskripsi' => 'Standar pelayanan Informasi Publik - ' . $site->namaweb,
            'keywords' => 'Standar pelayanan Informasi Publik - ' . $site->namaweb,
            'download' => $download,
            'site' => $site,
            'isi' => 'download/list_standard'
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
            'title' => 'Kategori Informasi: ' .
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
            'title' => 'Jenis Informasi: ' .
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
}

/* End of file Download.php */
/* Location: ./application/controllers/Download.php */
