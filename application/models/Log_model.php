<?php
class Log_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function log_access($data) {
        $this->db->insert('access_logs', $data);
    }
    // Listing data
    var $table = 'access_logs';
    var $column_order = array('id', 'timestamp', 'ip_address', 'user_agent', 'uri', 'method', 'message');
    var $column_search = array('ip_address', 'user_agent', 'uri', 'method', 'message');
    var $order = array('id' => 'desc');

    private function _get_datatables_query()
    {
        //add custom filter here
        if (!empty($this->input->post('uri'))) {
            $this->db->like('uri', $this->input->post('uri'), 'both');
        }

        $this->db->from($this->table);

        $this->db->order_by('id', 'DESC');
        $i = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {
                if (
                    $i === 0
                ) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        // $dibuat = $this->session->userdata['id_user'];
        $this->_get_datatables_query();
        if (
            $_POST['length'] != -1
        )
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        // $dibuat = $this->session->userdata['id_user'];
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}
?>
