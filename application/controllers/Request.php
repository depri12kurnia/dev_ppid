<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Request extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_request');
        $this->load->helper(['form', 'url']);
        $this->load->library(['form_validation', 'upload']);
    }

    public function index()
    {
        $data['jenis_layanan'] = $this->M_request->get_jenis_layanan();
        $data['kategori_pemohon'] = $this->M_request->get_kategori_pemohon();
        $data['kategori_bidang'] = $this->M_request->get_kategori_bidang();
        $this->load->view('request/list', $data);
    }

    public function submit()
    {
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('nomor_identitas', 'Nomor Identitas', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('handphone', 'Handphone', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('kategori_pemohon_id', 'Kategori Pemohon', 'required');
        $this->form_validation->set_rules('kategori_bidang_id', 'Kategori Bidang', 'required');
        $this->form_validation->set_rules('jenis_layanan_id', 'Jenis Layanan', 'required');
        $this->form_validation->set_rules('rincian_informasi', 'Rincian Informasi', 'required');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(['status' => false, 'errors' => validation_errors()]);
            return;
        }

        // Upload file
        $upload_data = [];

        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';
        $config['max_size']      = 1048;

        if (!is_dir('./uploads')) {
            mkdir('./uploads', 0755, true);
        }

        $this->upload->initialize($config);

        $allowedMimeTypes = [
            'image/jpeg',
            'image/png',
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        ];

        $file_fields = ['file_identitas', 'file_akta', 'file_pendukung'];
        foreach ($file_fields as $field) {
            if (!empty($_FILES[$field]['name'])) {
                if (!$this->upload->do_upload($field)) {
                    echo json_encode(['status' => false, 'errors' => $this->upload->display_errors()]);
                    return;
                } else {
                    $fileData = $this->upload->data();
                    $mimeType = mime_content_type($fileData['full_path']);

                    if (!in_array($mimeType, $allowedMimeTypes)) {
                        // Delete file yang tidak sesuai MIME
                        unlink($fileData['full_path']);
                        echo json_encode([
                            'status' => false,
                            'errors' => 'Tipe file tidak diperbolehkan: ' . $mimeType
                        ]);
                        return;
                    }

                    $cleanName = basename($fileData['file_name']); // cegah path traversal
                    $upload_data[$field] = $cleanName;
                }
            }
        }

        $ticket_number = 'TIK-' . time(); // simpan dulu ke variabel

        $data = [
            'ticket_number'         => $ticket_number,
            'jenis_layanan_id'      => $this->input->post('jenis_layanan_id'),
            'kategori_pemohon_id'   => $this->input->post('kategori_pemohon_id'),
            'kategori_bidang_id'    => $this->input->post('kategori_bidang_id'),
            'nama_lengkap'          => $this->input->post('nama_lengkap'),
            'nomor_identitas'       => $this->input->post('nomor_identitas'),
            'file_identitas'        => $upload_data['file_identitas'] ?? null,
            'file_akta'             => $upload_data['file_akta'] ?? null,
            'email'                 => $this->input->post('email'),
            'handphone'             => $this->input->post('handphone'),
            'alamat'                => $this->input->post('alamat'),
            'rincian_informasi'     => $this->input->post('rincian_informasi'),
            'file_pendukung'        => $upload_data['file_pendukung'] ?? null
        ];

        $insert = $this->M_request->insert_request($data);

        if ($insert) {
            $response = [
                'status' => true,
                'message' => 'Permohonan berhasil dikirim!',
                'ticket' => $ticket_number,
                'csrf_token' => $this->security->get_csrf_hash()
            ];
            echo json_encode($response);
        } else {
            $response = [
                'status' => false,
                'errors' => 'Permohonan Anda Gagal Menyimpan',
                'csrf_token' => $this->security->get_csrf_hash()
            ];
            echo json_encode($response);
        }
    }
}
