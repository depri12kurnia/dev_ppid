<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_jenis_layanan extends CI_Model
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
		$this->db->from('jenis_layanan');
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail data
	public function detail($id)
	{
		$this->db->select('*');
		$this->db->from('jenis_layanan');
		$this->db->where('id', $id);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('jenis_layanan', $data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('jenis_layanan', $data);
	}

	// Delete
	public function delete($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->delete('jenis_layanan', $data);
	}
}

/* End of file M_jenis_layanan.php */
/* Location: ./application/models/M_jenis_layanan.php */