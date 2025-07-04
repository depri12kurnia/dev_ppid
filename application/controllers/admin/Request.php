<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Request extends CI_Controller
{

    // Load database
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_information_request');
        $this->load->model('');
        $this->log_user->add_log();
        // Tambahkan proteksi halaman
        $url_pengalihan = str_replace('index.php/', '', current_url());
        $pengalihan     = $this->session->set_userdata('pengalihan', $url_pengalihan);
        // Ambil check login dari simple_login
        $this->simple_login->check_login($pengalihan);
    }

    // Index
    public function index()
    {
        $data = array(
            'title'    => 'Apps Permohonan',
            // 'formulir'    => $formulir,
            'isi'    => 'admin/formulir/list'
        );
        $this->load->view('admin/layout/wrapper', $data);
    }

    public function get_data()
    {
        $data = $this->M_information_request->get_all();
        echo json_encode([
            'data' => $data,
            'csrf_token' => $this->security->get_csrf_hash()
        ]);
    }

    public function update_status()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');

        if (!$id || !$status) {
            echo json_encode([
                'status' => false,
                'message' => 'Data tidak lengkap',
                'csrf_token' => $this->security->get_csrf_hash()
            ]);
            return;
        }

        $updated = $this->M_information_request->update_status($id, $status);

        echo json_encode([
            'status' => $updated,
            'csrf_token' => $this->security->get_csrf_hash()
        ]);
    }

    public function detail($id)
    {
        $data = $this->M_information_request->get_by_id($id);
        if ($data) {
            echo json_encode(['status' => true, 'data' => $data]);
        } else {
            echo json_encode(['status' => false]);
        }
    }
}
