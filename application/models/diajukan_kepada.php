<?php
class Diajukan_Kepada extends CI_Model {

    var $table = 'diajukan_kepada';

    function select_by_id_surat_masuk($id_surat_masuk) {
        $this->db->from($this->table);
        $this->db->where('id_surat_masuk', $id_surat_masuk);
        $query = $this->db->get();
        return ($query->num_rows() > 0)  ? $query->result() : FALSE;
    }

}

/* End of file diajukan_kepada.php */
/* Location: ./application/models/diajukan_kepada.php */