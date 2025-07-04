<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_information_request extends CI_Model
{
    public function get_all()
    {
        $this->db->select('id, ticket_number, nama_lengkap, email, status, created_at');
        $this->db->from('information_requests');
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get()->result();
    }

    public function update_status($id, $status)
    {
        return $this->db->update('information_requests', ['status' => $status], ['id' => $id]);
    }

    public function get_by_id($id)
    {
        $this->db->select('ir.*, jl.nama_layanan, kp.nama_kategori, kb.nama_bidang');
        $this->db->from('information_requests ir');
        $this->db->join('jenis_layanan jl', 'jl.id = ir.jenis_layanan_id', 'left');
        $this->db->join('kategori_pemohon kp', 'kp.id = ir.kategori_pemohon_id', 'left');
        $this->db->join('kategori_bidang kb', 'kb.id = ir.kategori_bidang_id', 'left');
        $this->db->where('ir.id', $id);
        return $this->db->get()->row();
    }
}
