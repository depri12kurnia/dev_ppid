<?php
class M_chart extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_chart_kategori_bidang()
    {
        return $this->db->select('kb.nama_bidang as category, COUNT(ir.id) as value')
            ->from('information_requests ir')
            ->join('kategori_bidang kb', 'kb.id = ir.kategori_bidang_id', 'left')
            ->group_by('ir.kategori_bidang_id')
            ->get()
            ->result();
    }

    public function get_status_year_stats()
    {
        $this->db->select("
        YEAR(created_at) AS year,
        SUM(CASE WHEN status = 'Diterima' THEN 1 ELSE 0 END) AS Diterima,
        SUM(CASE WHEN status = 'Disetujui' THEN 1 ELSE 0 END) AS Disetujui,
        SUM(CASE WHEN status = 'Ditolak' THEN 1 ELSE 0 END) AS Ditolak,
        SUM(CASE WHEN status = 'Keberatan' THEN 1 ELSE 0 END) AS Keberatan,
        COUNT(*) AS Total
        ");
        $this->db->from('information_requests');
        $this->db->group_by('YEAR(created_at)');
        $this->db->order_by('year', 'ASC');

        return $this->db->get()->result_array();
    }
}
