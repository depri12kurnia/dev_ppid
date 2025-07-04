<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kategori_pemohon extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	// =====Crud Admin========
	// Listing data
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('kategori_pemohon');
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail data
	public function detail($id)
	{
		$this->db->select('*');
		$this->db->from('kategori_pemohon');
		$this->db->where('id', $id);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('kategori_pemohon', $data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('kategori_pemohon', $data);
	}

	// Delete
	public function delete($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->delete('kategori_pemohon', $data);
	}
}

/* End of file M_kategori_pemohon.php */
/* Location: ./application/models/M_kategori_pemohon.php */