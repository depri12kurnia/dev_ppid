<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_pemohon extends CI_Controller
{

    // Load database
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kategori_pemohon');
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
            'nama_kategori',
            'Nama kategori',
            'required|is_unique[kategori_pemohon.nama_kategori]',
            array(
                'required' => 'Nama kategori harus diisi',
                'is_unique' => 'Nama kategori sudah ada. Buat Nama kategori baru!'
            )
        );

        if ($valid->run() === false) {
            // End validasi

            $data = array(
                'title' => 'Kategori Pemohon/Formulir',
                'kategori_pemohon' => $this->M_kategori_pemohon->listing(),
                'isi' => 'admin/formulir/kategori_pemohon/list'
            );
            $this->load->view('admin/layout/wrapper', $data, false);
            // Proses masuk ke database
        } else {
            $i = $this->input;

            $data = array(
                'nama_kategori' => $i->post('nama_kategori')
            );
            $this->M_kategori_pemohon->tambah($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambah');
            redirect(base_url('admin/kategori_pemohon'), 'refresh');
        }
        // End proses masuk database
    }

    // Edit kategori
    public function edit($id)
    {

        // Validasi
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_kategori',
            'Nama kategori',
            'required',
            array('required' => 'Nama kategori harus diisi')
        );

        if ($valid->run() === false) {
            // End validasi

            $data = array(
                'title' => 'Edit Jenis kategori/Formulir',
                'kategori_pemohon' => $this->M_kategori_pemohon->detail($id),
                'isi' => 'admin/formulir/kategori_pemohon/edit'
            );
            $this->load->view('admin/layout/wrapper', $data, false);
            // Proses masuk ke database
        } else {
            $i = $this->input;


            $data = array(
                'id' => $id,
                'nama_kategori' => $i->post('nama_kategori'),
            );
            $this->M_kategori_pemohon->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diedit');
            redirect(base_url('admin/kategori_pemohon'), 'refresh');
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
        $this->M_kategori_pemohon->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/kategori_pemohon'), 'refresh');
    }
}

/* End of file kategori_pemohon.php */
/* Location: ./application/controllers/admin/kategori_pemohon.php */
