<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_bidang extends CI_Controller
{

    // Load database
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kategori_bidang');
        $this->log_user->add_log();
        // Tambahkan proteksi halaman
        $url_pengalihan = str_replace('index.php/', '', current_url());
        $pengalihan = $this->session->set_userdata('pengalihan', $url_pengalihan);
        // Ambil check login dari simple_login
        $this->simple_login->check_login($pengalihan);
    }

    // Halaman utama
    public function index()
    {

        // Validasi
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_bidang',
            'Nama kategori',
            'required|is_unique[kategori_bidang.nama_bidang]',
            array(
                'required' => 'Nama kategori harus diisi',
                'is_unique' => 'Nama kategori sudah ada. Buat Nama kategori baru!'
            )
        );

        if ($valid->run() === false) {
            // End validasi

            $data = array(
                'title' => 'Kategori Bidang/Formulir',
                'kategori_bidang' => $this->M_kategori_bidang->listing(),
                'isi' => 'admin/formulir/kategori_bidang/list'
            );
            $this->load->view('admin/layout/wrapper', $data, false);
            // Proses masuk ke database
        } else {
            $i = $this->input;

            $data = array(
                'nama_bidang' => $i->post('nama_bidang')
            );
            $this->M_kategori_bidang->tambah($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambah');
            redirect(base_url('admin/kategori_bidang'), 'refresh');
        }
        // End proses masuk database
    }

    // Edit kategori
    public function edit($id)
    {

        // Validasi
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_bidang',
            'Nama kategori',
            'required',
            array('required' => 'Nama kategori harus diisi')
        );

        if ($valid->run() === false) {
            // End validasi

            $data = array(
                'title' => 'Edit Jenis kategori/Formulir',
                'kategori_bidang' => $this->M_kategori_bidang->detail($id),
                'isi' => 'admin/formulir/kategori_bidang/edit'
            );
            $this->load->view('admin/layout/wrapper', $data, false);
            // Proses masuk ke database
        } else {
            $i = $this->input;


            $data = array(
                'id' => $id,
                'nama_bidang' => $i->post('nama_bidang'),
            );
            $this->M_kategori_bidang->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diedit');
            redirect(base_url('admin/kategori_bidang'), 'refresh');
        }
        // End proses masuk database
    }

    // Delete user
    public function delete($id)
    {
        // Proteksi proses delete harus login
        // Tambahkan proteksi halaman
        $url_pengalihan = str_replace('index.php/', '', current_url());
        $pengalihan = $this->session->set_userdata('pengalihan', $url_pengalihan);
        // Ambil check login dari simple_login
        $this->simple_login->check_login($pengalihan);

        $data = array('id' => $id);
        $this->M_kategori_bidang->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/kategori_bidang'), 'refresh');
    }
}

/* End of file kategori_bidang.php */
/* Location: ./application/controllers/admin/kategori_bidang.php */
