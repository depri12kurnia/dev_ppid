<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Download_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Listing data
    public function listing()
    {
        $this->db->select('download.*, kategori_download.nama_kategori_download, jenis_download.nama_jenis_download, users.nama');
        $this->db->from('download');
        // Join dg 3 tabel
        $this->db->join('kategori_download', 'kategori_download.id_kategori_download = download.id_kategori_download', 'LEFT');
        $this->db->join('jenis_download', 'jenis_download.id_jenis_download = download.id_jenis_download', 'LEFT');
        $this->db->join('users', 'users.id_user = download.id_user', 'LEFT');
        // End join
        $this->db->order_by('id_download', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    // Listing data
    public function populer()
    {
        $this->db->select('*');
        $this->db->from('download');
        $this->db->order_by('hits', 'DESC');
        $this->db->limit(20);
        $query = $this->db->get();
        return $query->result();
    }

    // Listing data slider
    public function slider()
    {
        $this->db->select('download.*, kategori_download.nama_kategori_download, users.nama');
        $this->db->from('download');
        // Join dg 2 tabel
        $this->db->join('kategori_download', 'kategori_download.id_kategori_download = download.id_kategori_download', 'LEFT');
        $this->db->join('users', 'users.id_user = download.id_user', 'LEFT');
        // End join
        $this->db->where('type_download', 'Homepage');
        $this->db->order_by('id_download', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result();
    }

    // Listing data download
    public function download()
    {
        $this->db->select('download.*, kategori_download.nama_kategori_download, jenis_download.nama_jenis_download, users.nama, kategori_download.slug_kategori_download, jenis_download.slug_jenis_download');
        $this->db->from('download');
        // Join dg 3 tabel
        $this->db->join('kategori_download', 'kategori_download.id_kategori_download = download.id_kategori_download', 'LEFT');
        $this->db->join('jenis_download', 'jenis_download.id_jenis_download = download.id_jenis_download', 'LEFT');
        $this->db->join('users', 'users.id_user = download.id_user', 'LEFT');
        // End join
        $this->db->where('id_download', 'Download');
        $this->db->order_by('id_download', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    // Listing data download total
    public function total()
    {
        $this->db->select('download.*, kategori_download.nama_kategori_download, jenis_download.nama_jenis_download, users.nama');
        $this->db->from('download');
        // Join dg 3 tabel
        $this->db->join('kategori_download', 'kategori_download.id_kategori_download = download.id_kategori_download', 'LEFT');
        $this->db->join('jenis_download', 'jenis_download.id_jenis_download = download.id_jenis_download', 'LEFT');
        $this->db->join('users', 'users.id_user = download.id_user', 'LEFT');
        // End join
        $this->db->where('type_download', 'Download');
        $this->db->order_by('id_download', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    // Kategori
    public function kategori()
    {
        $this->db->select('*');
        $this->db->from('kategori_download');
        $this->db->order_by('id_kategori_download', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    // Jenis

    public function get_subkategori_download($id_kategori_download)
    {
        $this->db->select('jenis_download.*, kategori_download.nama_kategori_download, kategori_download.slug_kategori_download');
        $this->db->from('jenis_download');
        // Join
        $this->db->join('kategori_download', 'kategori_download.id_kategori_download = jenis_download.id_subkategori_download');
        // End Join
        $this->db->where(array('jenis_download', 'kategori_download.id_kategori_download' => $id_kategori_download));
        $this->db->order_by('nama_kategori_download', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function jenis()
    {
        $this->db->select('*');
        $this->db->from('jenis_download');
        $this->db->order_by('id_jenis_download', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    // Detail data
    public function detail($id_download)
    {
        $this->db->select('*');
        $this->db->from('download');
        $this->db->where('id_download', $id_download);
        $this->db->order_by('id_download', 'DESC');
        $query = $this->db->get();
        return $query->row();
    }

    // Read data
    public function read($slug_download)
    {
        $this->db->select('download.*, kategori_download.nama_kategori_download, jenis_download.nama_jenis_download, users.nama');
        $this->db->from('download');
        // Join dg 2 tabel
        $this->db->join('kategori_download', 'kategori_download.id_kategori_download = download.id_kategori_download', 'LEFT');
        $this->db->join('jenis_download', 'jenis_download.id_jenis_download = download.id_jenis_download', 'LEFT');
        $this->db->join('users', 'users.id_user = download.id_user', 'LEFT');
        $this->db->where('id_download', $slug_download);
        $this->db->order_by('id_download', 'DESC');
        $query = $this->db->get();
        return $query->row();
    }

    // crud
    // Tambah
    public function tambah($data)
    {
        $this->db->insert('download', $data);
    }

    // Edit
    public function edit($data)
    {
        $this->db->where('id_download', $data['id_download']);
        $this->db->update('download', $data);
    }

    // Edit
    public function edit2($data2)
    {
        $this->db->where('id_download', $data2['id_download']);
        $this->db->update('download', $data2);
    }

    // Delete
    public function delete($data)
    {
        $this->db->where('id_download', $data['id_download']);
        $this->db->delete('download', $data);
    }

    public function listingSertifikat()
    {
        $this->db->select('download.*, kategori_download.nama_kategori_download, jenis_download.nama_jenis_download, users.nama');
        $this->db->from('download');
        // Join dg 3 tabel
        $this->db->join('kategori_download', 'kategori_download.id_kategori_download = download.id_kategori_download', 'LEFT');
        $this->db->join('jenis_download', 'jenis_download.id_jenis_download = download.id_jenis_download', 'LEFT');
        $this->db->join('users', 'users.id_user = download.id_user', 'LEFT');
        // End join
        $this->db->like('nama_jenis_download', 'Sertifikat');
        $this->db->order_by('judul_download', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function listingPedoman()
    {
        $this->db->select('download.*, kategori_download.nama_kategori_download, jenis_download.nama_jenis_download, users.nama');
        $this->db->from('download');
        // Join dg 3 tabel
        $this->db->join('kategori_download', 'kategori_download.id_kategori_download = download.id_kategori_download', 'LEFT');
        $this->db->join('jenis_download', 'jenis_download.id_jenis_download = download.id_jenis_download', 'LEFT');
        $this->db->join('users', 'users.id_user = download.id_user', 'LEFT');
        // End join
        $this->db->like('nama_jenis_download', 'Pedoman');
        $this->db->order_by('judul_download', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
}

/* End of file Download_model.php */
/* Location: ./application/models/Download_model.php */
