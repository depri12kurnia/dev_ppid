<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_layanan extends CI_Controller
{

    // Load database
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_jenis_layanan');
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
            'nama_layanan',
            'Nama Layanan',
            'required|is_unique[jenis_layanan.nama_layanan]',
            array(
                'required' => 'Nama Layanan harus diisi',
                'is_unique' => 'Nama layanan sudah ada. Buat Nama layanan baru!'
            )
        );

        if ($valid->run() === false) {
            // End validasi

            $data = array(
                'title' => 'Jenis Layanan/Formulir',
                'jenis_layanan' => $this->M_jenis_layanan->listing(),
                'isi' => 'admin/formulir/jenis_layanan/list'
            );
            $this->load->view('admin/layout/wrapper', $data, false);
            // Proses masuk ke database
        } else {
            $i = $this->input;

            $data = array(
                'nama_layanan' => $i->post('nama_layanan')
            );
            $this->M_jenis_layanan->tambah($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambah');
            redirect(base_url('admin/jenis_layanan'), 'refresh');
        }
        // End proses masuk database
    }

    // Edit kategori
    public function edit($id)
    {

        // Validasi
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_layanan',
            'Nama Layanan',
            'required',
            array('required' => 'Nama Layanan harus diisi')
        );

        if ($valid->run() === false) {
            // End validasi

            $data = array(
                'title' => 'Edit Jenis Layanan/Formulir',
                'jenis_layanan' => $this->M_jenis_layanan->detail($id),
                'isi' => 'admin/formulir/jenis_layanan/edit'
            );
            $this->load->view('admin/layout/wrapper', $data, false);
            // Proses masuk ke database
        } else {
            $i = $this->input;


            $data = array(
                'id' => $id,
                'nama_layanan' => $i->post('nama_layanan'),
            );
            $this->M_jenis_layanan->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diedit');
            redirect(base_url('admin/jenis_layanan'), 'refresh');
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
        $this->M_jenis_layanan->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/jenis_layanan'), 'refresh');
    }
}

/* End of file jenis_layanan.php */
/* Location: ./application/controllers/admin/jenis_layanan.php */
