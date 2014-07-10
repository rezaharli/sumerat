<?php
class Kode_Surat extends CI_Model {

    var $table = 'kode_surat';

    function select_record($limit = null, $start = null, $key = null) {
        if( ! empty($key)) {
            $this->db->like('kode', $key);
            $this->db->or_like('uraian', $key);
        }
        if( ! (empty($limit) && empty($start))) {
            $this->db->limit($limit, $start);
        }
        $query = $this->db->get($this->table);
        return ($query->num_rows() > 0)  ? $query->result() : FALSE;
        
    }

    function record_count($key = null) {
        if(empty($key)) {
            $this->db->like('kode', $key);
            $this->db->or_like('uraian', $key);
            return $this->db->count_all_results($this->table);
        } else {
            return $this->db->count_all($this->table);
        }
    }

}

/* End of file kode_surat.php */
/* Location: ./application/models/kode_surat.php */