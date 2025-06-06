<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nav_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Menu utama
	public function nav_menu()
	{
		$this->db->select('*');
		$this->db->from('menu');
		$this->db->order_by('urutan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Sub menu
	public function nav_sub_menu($id_menu)
	{
		$this->db->select('*');
		$this->db->from('sub_menu');
		$this->db->where('id_menu', $id_menu);
		$this->db->order_by('urutan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing
	public function nav_anggota()
	{
		$this->db->select('anggota.*,
							COUNT(staff.id_staff) AS total_staff,
							provinsi.nama_provinsi');
		$this->db->from('anggota');
		$this->db->join('provinsi', 'provinsi.id_provinsi = anggota.id_provinsi', 'left');
		$this->db->join('staff', 'staff.id_anggota = anggota.id_anggota', 'left');
		$this->db->group_by('anggota.id_anggota');
		$this->db->order_by('urutan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function nav_mitra()
	{
		$this->db->select('*');
		$this->db->from('mitra');
		$this->db->order_by('urutan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Navigasi profil
	public function nav_profil()
	{
		$this->db->select('*');
		$this->db->from('pages');
		$this->db->where(array(
			'jenis_pages'	=> 'Profil',
			'status_pages'	=> 'Publish'
		));
		$this->db->order_by('urutan', 'ASC');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}

	// Navigasi Pendidikan
	public function nav_informasi()
	{
		$this->db->select('*');
		$this->db->from('pages');
		$this->db->where(array(
			'jenis_pages'	=> 'Informasi Publik',
			'status_pages'	=> 'Publish'
		));
		$this->db->order_by('urutan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Navigasi Pelayanan
	public function nav_layanan()
	{
		$this->db->select('*');
		$this->db->from('pages');
		$this->db->where(array(
			'jenis_pages'	=> 'Layanan',
			'status_pages'	=> 'Publish'
		));
		$this->db->order_by('judul_pages', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Navigasi staff
	public function nav_staff()
	{
		$this->db->select('*');
		$this->db->from('staff');
		$this->db->where(array('status_staff'	=> 'Yes'));
		$this->db->order_by('urutan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data slider
	public function nav_galeri()
	{
		$this->db->select('galeri.*, kategori_galeri.nama_kategori_galeri, kategori_galeri.slug_kategori_galeri');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri', 'kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri', 'LEFT');
		// End join
		$this->db->where('jenis_galeri', 'Galeri');
		$this->db->group_by('galeri.id_kategori_galeri');
		$this->db->order_by('id_galeri', 'DESC');
		$this->db->limit(8);
		$query = $this->db->get();
		return $query->result();
	}

	// listing 
	public function nav_aplikasi()
	{
		$this->db->select('*');
		$this->db->from('aplikasi');
		$this->db->order_by('urutan', 'ASC');
		$this->db->limit(20);
		$query	=	$this->db->get();
		return $query->result();
	}

	// Listing
	public function nav_video()
	{
		$this->db->select('*');
		$this->db->from('video');
		$this->db->order_by('id_video', 'DESC');
		$this->db->order_by('urutan', 'DESC');
		$this->db->limit(8);
		$query = $this->db->get();
		return $query->result();
	}

	// Navigasi berita
	public function nav_berita()
	{
		$this->db->select('berita.*,kategori.nama_kategori,kategori.slug_kategori');
		$this->db->from('berita');
		$this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori');
		$this->db->where(array(
			'jenis_berita'	=> 'Berita',
			'status_berita'	=> 'Publish'
		));
		$this->db->group_by('berita.id_kategori');
		$this->db->order_by('kategori.urutan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function nav_pengumuman()
	{
		$this->db->select('berita.*,kategori.nama_kategori,kategori.slug_kategori');
		$this->db->from('berita');
		$this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori');
		$this->db->where(array(
			'jenis_berita'	=> 'Berita',
			'status_berita'	=> 'Publish'
		));
		$this->db->group_by('berita.id_kategori');
		$this->db->order_by('kategori.urutan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data
	public function nav_kategori_statistik()
	{
		$this->db->select('kategori_statistik.*, 
							statistik.id_statistik');
		$this->db->from('kategori_statistik');
		// Join dg 2 tabel
		$this->db->join('statistik', 'statistik.id_kategori_statistik = kategori_statistik.id_kategori_statistik');
		// End join
		$this->db->where('statistik.status_statistik', 'Publish');
		$this->db->group_by('kategori_statistik.id_kategori_statistik');
		$this->db->order_by('kategori_statistik.urutan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data
	public function nav_tahun_kategori_statistik($id_kategori_statistik)
	{
		$this->db->select('*');
		$this->db->from('statistik');
		$this->db->where(array(
			'status_statistik'		=> 'Publish',
			'id_kategori_statistik'	=> $id_kategori_statistik
		));
		$this->db->group_by('tahun');
		$this->db->order_by('tahun', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data
	public function nav_bulan_kategori_statistik($id_kategori_statistik, $tahun)
	{
		$this->db->select('*');
		$this->db->from('statistik');
		$this->db->where(array(
			'status_statistik'		=> 'Publish',
			'tahun'					=> $tahun,
			'id_kategori_statistik'	=> $id_kategori_statistik
		));
		$this->db->where('bulan <>', '');
		$this->db->group_by('bulan');
		$this->db->order_by('id_statistik', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data
	public function nav_statistik()
	{
		$this->db->select('statistik.*, kategori_statistik.nama_kategori_statistik, users.first_name');
		$this->db->from('statistik');
		// Join dg 2 tabel
		$this->db->join('kategori_statistik', 'kategori_statistik.id_kategori_statistik = statistik.id_kategori_statistik', 'LEFT');
		$this->db->join('users', 'users.id = statistik.id_user', 'LEFT');
		// End join
		$this->db->where('statistik.status_statistik', 'Publish');
		$this->db->limit(10);
		$this->db->order_by('id_statistik', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data
	public function nav_tahun_statistik()
	{
		$this->db->select('*');
		$this->db->from('statistik');
		$this->db->where('status_statistik', 'Publish');
		$this->db->limit(10);
		$this->db->group_by('tahun');
		$this->db->order_by('tahun', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data
	public function nav_bulan_statistik($thn)
	{
		$this->db->select('*');
		$this->db->from('statistik');
		$this->db->where('status_statistik', 'Publish');
		$this->db->where('tahun', $thn);
		$this->db->where('bulan <>', '');
		$this->db->limit(12);
		$this->db->group_by('bulan');
		$this->db->order_by('tahun', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}
}

/* End of file Nav_model.php */
/* Location: ./application/models/Nav_model.php */