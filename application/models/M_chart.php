<?php
class M_log extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_chart_kategori_bidang()
    {
        return $this->db->select('kb.nama_kategori_bidang as category, COUNT(ir.id) as value')
            ->from('information_requests ir')
            ->join('kategori_bidang kb', 'kb.id = ir.kategori_bidang_id', 'left')
            ->group_by('ir.kategori_bidang_id')
            ->get()
            ->result();
    }
}
