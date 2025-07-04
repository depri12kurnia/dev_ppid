<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_request extends CI_Model
{


    public function insert_request($data)
    {
        return $this->db->insert('information_requests', $data);
    }

    public function get_jenis_layanan()
    {
        return $this->db->get('jenis_layanan')->result();
    }

    public function get_kategori_pemohon()
    {
        return $this->db->get('kategori_pemohon')->result();
    }

    public function get_kategori_bidang()
    {
        return $this->db->get('kategori_bidang')->result();
    }
}
